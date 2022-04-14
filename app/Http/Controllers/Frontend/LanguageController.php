<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function english()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'english');
        return redirect()->back();
    }

    public function hindi()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'hindi');
        return redirect()->back();
    }
}
