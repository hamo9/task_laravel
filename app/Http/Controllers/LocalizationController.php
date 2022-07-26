<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LocalizationController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function lang_change($lang)
    {
        App::setLocale($lang);
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
