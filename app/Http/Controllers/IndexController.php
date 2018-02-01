<?php

namespace App\Http\Controllers;

use App\CompatibilityHoroscope;
use App\Zadiak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;

class IndexController extends Controller
{

    private $months = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];

    public function index() {
       return $this->contentShow('Для всех знаков','today');
    }

    public function zadiakByBirhData(Request $request) {

        if($request->has('birthDay') && $request->has('birthMonth') && $request->has('birthYear')) {
            $zadiakByYearName = ['Крыса', 'Бык', 'Тигр', 'Кролик', 'Дракон', 'Змея', 'Лошадь', 'Коза', 'Обезьяна', 'Петух', 'Собака', 'Свинья'];
            $birthYear = $request->input('birthYear');
            $birthDay = $request->input('birthDay');
            $birthMonth = $request->input('birthMonth');
            $zadiakYearName = $zadiakByYearName[abs((int)$birthYear-1924)%12];

            $date = Carbon::createFromFormat('Y-m-d',"2018-$birthMonth-$birthDay")->toDateString();
            if($birthDay<=19) {
                $zadiakByMonth = Zadiak::where('end_month','<=','2018-01-19')->first();
            } else {
                $zadiakByMonth = DB::table('zadiaks')->whereDate('end_month','>=',$date)->whereDate('start_month','<=',$date)->first();
            }
            $birthInfo = ['zadiakYearName'=>$zadiakYearName, 'birthMonth'=>$this->months[(int) $birthMonth-1] ,'birthDay'=> $birthDay,'birthYear'=> $birthYear];
            session(['birthInfo'=>$birthInfo, 'zadiakName'=>$zadiakByMonth->name]);
           return $this->contentShow($zadiakByMonth, 'today');
        }
    }

    public function contentShow($zadiakName, $day) {
        $zadiakDaysMonths = [
            '21 марта — 19 апреля',
            '20 апреля — 20 мая',
            '21 мая — 20 июня',
            '21 июня — 22 июля',
            '23 июля — 22 августа',
            '23 августа — 22 сентября',
            '23 сентября — 22 октября',
            '23 октября — 21 ноября',
            '22 ноября — 21 декабря'
            ,'22 декабря — 19 января',
            '20 января — 18 февраля',
            '19 февраля — 20 марта'
        ];

        if($zadiakName == session('zadiakName')&&(session(['birthInfo'])!=[]) || is_object($zadiakName)) {
            $birthInfo = session('birthInfo');
        } else {
            session(['birthInfo'=>[],'zadiakName'=>'']);
            $birthInfo = null;
        }

        $zadiaks = Zadiak::all();
        if(!is_object($zadiakName)) {
            $findZadiak =  $zadiaks->where('name',$zadiakName)->first();
        } else {
            $findZadiak = $zadiakName;
        }
        switch ($day) {
            case 'today' :
                $date = ['day'=> Carbon::today()->day, 'month'=>$this->months[Carbon::today()->month-1]];
                $content = $findZadiak->contents()->where('type','d_'.$date['day'])->first();
             break;
            case 'yesterday' :
                 $date = ['day'=> Carbon::today()->subDay()->day,'month'=>$this->months[Carbon::today()->subDay()->month-1]];
                 $content = $findZadiak->contents()->where('type','d_'. ($date['day']==31)?0:$date['day'])->first();
                break;
            case 'tomorrow' :
                $date = ['day'=> Carbon::today()->tomorrow()->day,'month'=>$this->months[Carbon::today()->tomorrow()->month-1]];
                if (Carbon::today()->daysInMonth!=31 && $date['day']==Carbon::today()->daysInMonth) {
                    $content = $findZadiak->contents()->where('type','d_'. 32)->first();
                } else {
                    $content = $findZadiak->contents()->where('type','d_'. $date['day'])->first();
                }
                break;
            case 'week' :
                $date = ['start_week'=>Carbon::today()->startOfWeek()->day,'end_week'=>Carbon::today()->endOfWeek()->day,'month'=>$this->months[Carbon::today()->endOfWeek()->month-1]];
                       $content = $findZadiak->contents()->where('type','w_'.Carbon::today()->weekOfMonth)->first();
                break;
            case 'month' :
                $date = ['month'=>$this->months[Carbon::today()->month-1], 'year'=>Carbon::today()->year];
                        $content =$findZadiak->contents()->where('type','m_'.Carbon::today()->month)->first();
                break;
            case 'year' :
                $date = ['year'=>Carbon::today()->year];
                      $content = $findZadiak->contents()->where('type','y')->first();
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
