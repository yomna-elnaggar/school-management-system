<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function setLang($lang, Request $request){
        
        $acceptedLang=['ar','en'];
        if(! in_array($lang,$acceptedLang)){
            $lang='en';
        }

    $request->session()->put('lang',$lang);
    return back();
    }
}
