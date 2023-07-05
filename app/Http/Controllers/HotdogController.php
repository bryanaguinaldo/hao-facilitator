<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotdogController extends Controller
{
    public function index()
    {
        return view('hotdog-ni-aljur');
    }
}
