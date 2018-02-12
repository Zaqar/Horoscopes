<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HoroscopeController extends Controller
{
    //

    public function index() {
        $contents = DB::table('contents')->paginate(15);
        $_SESSION['btn']=1;
        return view('admin.horoscopes.contents', ['horoscopes' => $contents]);
    }

    public function create() {
         $zadiaks = DB::table('zadiaks')->select('id','name')->groupBy('name')->orderBy('id')->get();
          return view("admin.horoscopes.horoscopes_add", ['zadiaks'=>$zadiaks]);
    }

    public function store(Request $request) {
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
    }

    public function destroy($id) {
        Content::destroy($id);
        return redirect()->route('adminHoroscope');
    }

    public function edit($id) {
        $content = Content::find($id);
        $zadiaks = DB::table('zadiaks')->select('id','name')->groupBy('name')->orderBy('id')->get();
        return view('admin.horoscopes.horoscopes_edit',['content'=>$content, 'zadiaks'=>$zadiaks]);
    }

    public function update(Request $request, $id) {
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
    }

}
