<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use App\Zadiak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HoroscopeEditController extends Controller
{
    //
    public function execute(Request $request, $id) {
        if($request->has('delete')) {
            Content::destroy($id);
            return redirect()->route('adminHoroscope');
        } elseif ($request->has('edit') && $request->isMethod('GET')) {
            $content = Content::find($id);
            $zadiaks = Zadiak::all();
            return view('admin.horoscopes.horoscopes_edit',['content'=>$content, 'zadiaks'=>$zadiaks]);
        } elseif($request->has('submitEdit') && $request->isMethod('POST')){
            $content = Content::find($id);
            $content-> zadiak_id = $request->input('zadiak_id');
            $content-> type = $request->input('type');
            $content-> content = $request->input('content');
            $content-> love = $request->input('love');
            $content-> business = $request->input('business');
            $content-> health = $request->input('health');
            $content-> start =$request->input('start');
            $content->save();
            return redirect()->route('adminHoroscope');
        } else{
            abort(404);
        }
    }
}
