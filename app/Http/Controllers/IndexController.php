<?php

namespace App\Http\Controllers;

use App\CompatibilityHoroscope;
use App\Zadiak;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class IndexController extends Controller
{

    private function getRusMonth($date) {
        $month = strftime('%B',Carbon::createFromFormat('Y-m-d',$date)->timestamp);
        return iconv("windows-1251", "UTF-8", $month);
    }

    public function index() {
        return $this->contentShow('Для всех знаков', Config::get('constants.TODAY'));
    }

    public function zadiakByBirhData(Request $request) {

        if($request->has('birthDay') && $request->has('birthMonth') && $request->has('birthYear')) {
            $zadiakByYearName = ['Крыса', 'Бык', 'Тигр', 'Кролик', 'Дракон', 'Змея', 'Лошадь', 'Коза', 'Обезьяна', 'Петух', 'Собака', 'Свинья'];
            $birthYear = $request->input('birthYear');
            $birthDay = $request->input('birthDay');
            $birthMonth = $request->input('birthMonth');
            $zadiakYearName = $zadiakByYearName[abs((int)$birthYear-1924)%12];

            $date = Carbon::createFromFormat('Y-m-d',"2018-$birthMonth-$birthDay")->toDateString();
            if($birthMonth==1 || $birthMonth==12) {
                $zadiakByMonth = Zadiak::where('end_month','<=','2018-01-19')->first();
            } else {
                $zadiakByMonth = Zadiak::whereDate('end_month','>=',$date)->whereDate('start_month','<=',$date)->first();
            }
            $birthInfo = ['zadiakYearName'=>$zadiakYearName, 'birthMonth'=>$this->getRusMonth($date) ,'birthDay'=> $birthDay,'birthYear'=> $birthYear];
            session(['birthInfo'=>$birthInfo, 'zadiakName'=>$zadiakByMonth->name]);
           return $this->contentShow($zadiakByMonth, Config::get('constants.TODAY'));
        }
    }

    public function contentShow($zadiakName, $day, $checkFromIcon=1) {
        session(['day'=>$day]);

        if(($zadiakName == session('zadiakName')&&(session('birthInfo')!=[]) && $checkFromIcon!=0) || is_object($zadiakName)) {
            $birthInfo = session('birthInfo');
        } else {
            session(['birthInfo'=>[],'zadiakName'=>'']);
            $birthInfo = null;
        }

        $zadiaks = Zadiak::all();

        foreach ($zadiaks as $zadiak) {
            $start_month = $zadiak->start_month;
            $end_month = $zadiak->end_month;
            $start_day = Carbon::createFromFormat('Y-m-d',$start_month)->day;
            $end_day = Carbon::createFromFormat('Y-m-d',$end_month)->day;
            $zadiakDaysMonths [] = "$start_day ".$this->getRusMonth($start_month)." - "."$end_day ".$this->getRusMonth($end_month);
        }

        if(!is_object($zadiakName)) {
            $findZadiak =  $zadiaks->where('name',$zadiakName)->first();
        } else {
            $findZadiak = $zadiakName;
        }
        switch ($day) {
            case Config::get('constants.YESTERDAY') :
                $date = ['day'=> Carbon::today()->subDay()->day,'month'=>$this->getRusMonth(Carbon::today()->subDay()->toDateString())];
                $content = $findZadiak->contents()->where('start',Carbon::today()->subDay()->toDateString())->first();
                break;
            case Config::get('constants.TODAY') :
                $date = ['day'=> Carbon::today()->day, 'month'=>$this->getRusMonth(Carbon::today()->toDateString())];
                $content = $findZadiak->contents()->where('start',Carbon::today()->toDateString())->first();
             break;
            case Config::get('constants.TOMORROW') :
                $date = ['day'=> Carbon::today()->addDay()->day,'month'=>$this->getRusMonth(Carbon::today()->tomorrow()->toDateString())];
                $content = $findZadiak->contents()->where('start',Carbon::today()->addDay()->toDateString())->first();
                break;
            case Config::get('constants.WEEK') :
                $date = ['start_week'=>Carbon::today()->startOfWeek()->day,'end_week'=>Carbon::today()->endOfWeek()->day,'month'=>$this->getRusMonth(Carbon::today()->endOfWeek()->toDateString())];
                       $content = $findZadiak->contents()->where('start',Carbon::today()->startOfWeek()->toDateString())->offset(1)->first();
                break;
            case Config::get('constants.MONTH') :
                $date = ['month'=>$this->getRusMonth(Carbon::today()->toDateString()), 'year'=>Carbon::today()->year];
                $query =$findZadiak->contents()->where('start',Carbon::today()->startOfMonth()->toDateString());
                $count = $query->count();
                $content = $query->offset($count-1)->first();
                break;
            case Config::get('constants.YEAR') :
                $date = ['year'=>Carbon::today()->year];
                $query =$findZadiak->contents()->where('start',Carbon::today()->toDateString());
                $count = $query->count();
                $content = $query->offset($count-1)->first();
                break;
        }
        return view('site.index',['zadiaks'=>$zadiaks, 'content'=>$content,'thisZadiak'=>$findZadiak, 'birthInfo'=>$birthInfo, 'day'=>$day,'date'=>$date, 'zodiakListData'=>$zadiakDaysMonths]);
    }


    public function compatibilityHoroscopeShow(Request $request) {
        $content = CompatibilityHoroscope::where('first_id',(int)$request->input('first_id'))->where('second_id',(int)$request->input('second_id'))->first();
        $zadiaksName [] = Zadiak::where('id',(int)$request->input('first_id'))->value('name');
        $zadiaksName [] = Zadiak::where('id',(int)$request->input('second_id'))->value('name');
        return view('site.index_page3',['content'=>$content, 'zadiaksName'=>$zadiaksName]);
    }
}
