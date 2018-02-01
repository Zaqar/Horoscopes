<?php

namespace App\Http\Controllers;

use App\CompatibilityHoroscope;
use App\Zadiak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class IndexController extends Controller
{

    private $months = ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];

    public function index() {
       return $this->contentShow('Для всех знаков','today');
    }

    public function zadiakByBirhData(Request $request) {

        if($request->has('birthDay') && $request->has('birthMonth') && $request->has('birthYear')) {
            $zadiakByYearName = [
                '0'=>'Крыса',
                '1'=>'Бык',
                '2'=>'Тигр',
                '3'=>'Кролик',
                '4'=>'Дракон',
                '5'=>'Змея',
                '6'=>'Лошадь',
                '7'=>'Коза',
                '8'=>'Обезьяна',
                '9'=>'Петух',
                '10'=>'Собака',
                '11'=>'Свинья',
            ];
            $birthYear = $request->input('birthYear');
            $birthDay = $request->input('birthDay');
            $birthMonth = $request->input('birthMonth');
            $zadiakYearName = $zadiakByYearName[abs((int)$birthYear-1924)%12];
            $dayCountBeforeBirthday = (int) $birthDay;
            for ($i = 1; $i<(int) $birthMonth; ++$i) {
                $dayCountBeforeBirthday+=(int)cal_days_in_month(CAL_GREGORIAN, $i, (int) $birthYear);
            }
            $dayCountBeforeBirthday %=356;
            if($dayCountBeforeBirthday<=19) {
                $zadiakByMonth = Zadiak::where('end_month','<=',19)->first();
            }
            else {
                $zadiakByMonth = Zadiak::where('end_month','>=',$dayCountBeforeBirthday)->where('start_month','<=',$dayCountBeforeBirthday)->first();
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
