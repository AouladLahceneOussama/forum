<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LangController extends Controller
{
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('lang'))) {
            // App::setLocale($lang);
            Session::put('applocale', $lang);
            
        }

        // dd(Session()->get('applocale'), app()->getlocale());
        return Redirect::back();
    }
}
