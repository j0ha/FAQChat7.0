<?php

namespace App\Http\Controllers;

use App\Frage;
use Illuminate\Http\Request;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;

class FragenstellenController extends Controller
{
    public function index(){
        return view('fragestellen');
    }
    public function fragestellen(Request $request) {
        Bugsnag::leaveBreadcrumb($request);
        if(config('faq.anonymous') == true) {
            $request->validate([
                'autor' => 'min:1 | max:255',
                'frage' => 'required | max:450',
            ]);
        } else {
            $request->validate([
                'autor' => 'min:1 | max:255 | required',
                'frage' => 'required | max:450',
            ]);
        }
        
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
