<?php

namespace App\Http\Controllers\Admin;

use App\CompatibilityHoroscope;
use App\Zadiak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompatibilityHoroscopeEditController extends Controller
{
    //
    public function execute(Request $request,$id) {
        if($request->has('delete')) {
            CompatibilityHoroscope::destroy($id);
            return redirect()->route('adminCompatibilityHoroscope');
        } elseif ($request->has('edit') && $request->isMethod('GET')) {
            $horoscope= CompatibilityHoroscope::find($id);
            $zadiaks = Zadiak::all();
            return view('admin.compatibilityHoroscopes.compatibility_horoscopes_edit',['horoscope'=>$horoscope, 'zadiaks'=>$zadiaks]);
        } elseif($request->has('submitEdit') && $request->isMethod('POST')){
            $object = CompatibilityHoroscope::find($id);
            $object->first_id = $request->input('first_id');
            $object->second_id = $request->input('second_id');
            $object->percent = (($request->input('percent')>=0)&&($request->input('percent')<=100))?$request->input('percent'):null;
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
        } else{
            abort(404);
        }
    }
}
