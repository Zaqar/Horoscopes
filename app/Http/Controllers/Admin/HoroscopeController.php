<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HoroscopeController extends Controller
{
    //
    public function show() {
        if(view()->exists('admin.contents')) {
            $contents = Content::where('id','>',5000)->get();
            $date = [
                'horoscopes'  => $contents
            ];
            return view("admin.contents", $date);
        }
        abort(404);
    }
}
