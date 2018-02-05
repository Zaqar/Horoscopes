<?php

namespace App\Http\Controllers\Admin;

use App\Zadiak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ZadiakEditController extends Controller
{
    public function execute(Request $request, $id) {
        if($request->has('delete')) {
            Zadiak::destroy($id);
            return redirect()->route('adminZadiak');
        } elseif ($request->has('edit') && $request->isMethod('GET')) {
            $oldZadiak = Zadiak::find($id);
            $zadiaks = DB::table('zadiaks')->select('name')->distinct()->get();
            return view('admin.zadiaks.zadiaks_edit',['oldZadiak'=>$oldZadiak, 'zadiaks'=>$zadiaks]);
        } elseif($request->has('submitEdit') && $request->isMethod('POST')){
            $zadiak = Zadiak::find($id);
            $zadiak-> name = $request->input('name');
            $zadiak-> image = $request->input('image');
            $zadiak-> start_month = $request->input('start_month');
            $zadiak-> end_month = $request->input('end_month');
            $zadiak->save();
            return redirect()->route('adminZadiak');
        } else{
            abort(404);
        }
    }
}
