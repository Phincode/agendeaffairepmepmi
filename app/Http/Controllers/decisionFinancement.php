<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class decisionFinancement extends Controller
{
    public function index(Request $request){
          return view('home.decisionFinancement');
    }
}
