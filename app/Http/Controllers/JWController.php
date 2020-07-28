<?php

namespace App\Http\Controllers;

use App\Totaljw;
use App\Totalojw;
use Illuminate\Http\Request;

class JWController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');   
    }
    function increasold(Request $request)
    {
        $old = new Totalojw();
        $old->increase($request);
        
        return back();
    }

    function decold(Request $request)
    {
        $old = new Totalojw();
        $old->descrise($request);
        return back();
    }

    function newinc(Request $request)
    {
        Totaljw::NewInc($request->newin);
        return back();
    }

    function newdec()
    {
        $jw = session()->get('jw');
        Totaljw::Newdec($jw);
        return back();
    }
}
