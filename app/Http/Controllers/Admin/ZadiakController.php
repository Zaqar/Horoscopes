<?php

namespace App\Http\Controllers\Admin;

use App\Zadiak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZadiakController extends Controller
{
    public function show(Request $request) {
        if(view()->exists('admin.zadiaks.contents')) {
          $_SESSION['btn']=3;
          $count = Zadiak::count();
        if($request->has('countOfRows')) {
            $zadiaks = Zadiak::skip($request->input('countOfRows'))->take(20)->get();
            $startOfRow = $request->input('countOfRows');
        } else {
            $zadiaks = Zadiak::take(50)->get();
            $startOfRow = null;
        }
           return view("admin.zadiaks.contents", ['count'=>$count, 'zadiaks'=>$zadiaks, 'startOfRow'=>$startOfRow]);
        }
        abort(404);
    }
}
