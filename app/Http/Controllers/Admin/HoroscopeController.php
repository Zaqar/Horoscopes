<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HoroscopeController extends Controller
{
    //
    public function show(Request $request) {
        if(view()->exists('admin.horoscopes.contents')) {
            $count = Content::count();
            if($request->has('countOfRows')) {
                $contents = Content::skip($request->input('countOfRows'))->take(20)->get();
                $startOfRow = $request->input('countOfRows');
            } else {
                $contents = Content::take(50)->get();
                $startOfRow = null;
            }
            return view("admin.horoscopes.contents", ['count'=>$count, 'horoscopes'=>$contents, 'startOfRow'=>$startOfRow]);
        }
        abort(404);
    }
}
