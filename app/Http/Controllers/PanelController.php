<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('CheckIP');
    }
    public function index()
    {
        return view('panel.panel');
    }
}
