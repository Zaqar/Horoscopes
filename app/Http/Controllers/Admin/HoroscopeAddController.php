<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use App\Zadiak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HoroscopeAddController extends Controller
{
    //
    public function add(Request $request) {
        if($request->isMethod('POST')) {
            $content = new Content();
            $content-> zadiak_id = $request->input('zadiak_id');
            $content-> type = $request->input('type');
            $content-> content = $request->input('content');
            $content-> love = $request->input('love');
            $content-> business = $request->input('business');
            $content-> health = $request->input('health');
            $content-> start =$request->input('start');
            $content->save();
            return redirect()->route('adminHoroscope');
        } elseif(view()->exists('admin.horoscopes_add')) {
            $zadiaks = Zadiak::all();
            return view("admin.horoscopes_add", ['zadiaks'=>$zadiaks]);
        } else {
            abort(404);
        }
    }
}
