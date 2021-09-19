<?php

namespace App\Http\Controllers;
use App\Models\MinhaUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UrlController extends Controller
{
    public function index(){
        $mUrl = MinhaUrl::get();
        return view('Url.list', ['mUrl' => $mUrl]);
    }

    public function formNew(){
        return view('Url.formAdd');
    }

    public function add( Request $request){
        $request->validate([
            'url' => 'required|url'
        ]);

        $cUrl = new MinhaUrl;
        $cUrl = $cUrl->create( $request->all());
        return Redirect::to('/ListUrl');

    }

    public function formEdit( $id ){
        $eUrl = MinhaUrl::findOrFail( $id );
        return view('Url.formEdit', ['eUrl' => $eUrl]);
    }

    public function edit ( $id, Request $request){
        $request->validate([
            'url' => 'required|url'
        ]);
        $eUrl = MinhaUrl::findOrFail( $id );
        $eUrl->update($request->all());
        
        return Redirect::to('/ListUrl');
    }

    public function delete ( $id ){
        $eUrl = MinhaUrl::findOrFail( $id );
        $eUrl->delete();

        return Redirect::to('/ListUrl');
    }
}
