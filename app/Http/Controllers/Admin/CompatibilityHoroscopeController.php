<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompatibilityHoroscopeController extends Controller
{
    //
//    public function show() {
//        if(view()->exists('admin.horoscopes')) {
//            $horoscopes = Content::all();
//            $data = [
//                'title'=>'Горосокпы',
//                'horoscopes'=> $horoscopes
//            ];
//            return view("admin.horoscopes", $data);
//        }
//        abort(404);
//    }
}
