<?php

namespace App\Http\Controllers\Admin;

use App\Zadiak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ZadiakAddController extends Controller
{
    public function add(Request $request) {
        if($request->isMethod('POST')) {
            $zadiak = new Zadiak();
            $zadiak-> name = $request->input('name');
            $zadiak-> image = $request->input('image');
            $zadiak-> start_month = $request->input('start_month');
            $zadiak-> end_month = $request->input('end_month');
            $zadiak->save();
            return redirect()->route('adminZadiak');
        } elseif(view()->exists('admin.zadiaks.zadiaks_add')) {
            $zadiaks = DB::table('zadiaks')->select('name')->distinct()->get();
            return view("admin.zadiaks.zadiaks_add", ['zadiaks'=>$zadiaks]);
        } else {
            abort(404);
        }
    }
}
