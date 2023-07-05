<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvincialDataController extends Controller
{
    public function index()
    {
        return view('provincial-data');
    }
}
