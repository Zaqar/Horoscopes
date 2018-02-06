<?php

namespace App\Http\Controllers\Admin;

use App\CompatibilityHoroscope;
use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompatibilityHoroscopeController extends Controller
{

    public function show(Request $request) {
        if(view()->exists('admin.compatibilityHoroscopes.contents')) {
            $_SESSION['btn']=2;
            $count = CompatibilityHoroscope::count();
            if($request->has('countOfRows')) {
                $contents = CompatibilityHoroscope::skip($request->input('countOfRows'))->take(21)->get();
                $startOfRow = $request->input('countOfRows');
            } else {
                $contents = CompatibilityHoroscope::take(50)->get();
                $startOfRow = null;
            }
            return view("admin.compatibilityHoroscopes.contents", ['count'=>$count, 'horoscopes'=>$contents, 'startOfRow'=>$startOfRow]);
        }
        abort(404);
    }
}
