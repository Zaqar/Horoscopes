<?php

namespace App\Http\Controllers\Admin;

use App\CompatibilityHoroscope;
use App\Zadiak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CompatibilityHoroscopeAddController extends Controller
{
    //
    public function add(Request $request) {
        if($request->isMethod('POST')) {
            $object = new CompatibilityHoroscope();
            $object->first_id = $request->input('first_id');
            $object->second_id = $request->input('second_id');
            $object->percent = $request->input('percent');
            $object->content_1 = $request->input('content_1');
            $object->content_2 = $request->input('content_2');
            $object->content_3 = $request->input('content_3');
            $object->content_4 = $request->input('content_4');
            $object->content_5 = $request->input('content_5');
            $object->point_1 = $request->input('point_1');
            $object->point_2 = $request->input('point_2');
            $object->point_3 = $request->input('point_3');
            $object->point_4 = $request->input('point_4');
            $object->point_5 = $request->input('point_5');
            $object->save();
            return redirect()->route('adminCompatibilityHoroscope');
        } elseif($request->isMethod('GET')) {
            $zadiaks = DB::table('zadiaks')->select('id','name')->where('name','<>','Для всех знаков')->groupBy('name')->orderBy('id')->get();
            return view("admin.compatibilityHoroscopes.compatibility_horoscopes_add", ['zadiaks'=>$zadiaks]);
        } else {
            abort(404);
        }
    }
}
