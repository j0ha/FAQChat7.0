<?php

namespace App\Http\Controllers;

use App\Frage;
use Illuminate\Http\Request;

class FragenstellenController extends Controller
{
    public function index(){
        return view('fragestellen');
    }
    public function fragestellen(Request $request) {
        $frage = new Frage();
        if ($request->autor == null){
            $frage->autor = 'Anonym';
        } else {
            $frage->autor = $request->autor;
        }
        $frage->frage = $request->frage;
        $frage->save();
        return back()->with('success', 'Danke! Wir haben Ihre Frage erhalten und werden diese im Livestream beantworten. Sie können nun eine weitere Frage stellen!');
    }
}
