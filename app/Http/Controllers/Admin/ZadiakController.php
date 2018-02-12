<?php

namespace App\Http\Controllers\Admin;

use App\Zadiak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ZadiakController extends Controller
{

    public function index() {
        $zadiaks = DB::table('zadiaks')->paginate(15);
        $_SESSION['btn']=3;
        return view('admin.zadiaks.contents', ['zadiaks' => $zadiaks]);
    }

    public function create() {
        $zadiaks = DB::table('zadiaks')->select('name')->distinct()->get();
        return view("admin.zadiaks.zadiaks_add", ['zadiaks'=>$zadiaks]);
    }

    public function store(Request $request) {
        $zadiak = new Zadiak();
        $zadiak-> name = $request->input('name');
        $zadiak-> image = $request->input('image');
        $zadiak-> start_month = $request->input('start_month');
        $zadiak-> end_month = $request->input('end_month');
        $zadiak->save();
        return redirect()->route('adminZadiak');
    }

    public function destroy($id) {
        Zadiak::destroy($id);
        return redirect()->route('adminZadiak');
    }

    public function edit($id) {
        $oldZadiak = Zadiak::find($id);
        $zadiaks = DB::table('zadiaks')->select('name')->distinct()->get();
        return view('admin.zadiaks.zadiaks_edit',['oldZadiak'=>$oldZadiak, 'zadiaks'=>$zadiaks]);
    }

    public function update(Request $request, $id) {
        $zadiak = Zadiak::find($id);
        $zadiak-> name = $request->input('name');
        $zadiak-> image = $request->input('image');
        $zadiak-> start_month = $request->input('start_month');
        $zadiak-> end_month = $request->input('end_month');
        $zadiak-> save();
        return redirect()->route('adminZadiak');
    }
}
