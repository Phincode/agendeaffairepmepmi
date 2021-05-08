<?php

namespace App\Http\Controllers;

use App\Models\TypePme as ModelsTypePme;
use Illuminate\Http\Request;
use App\Models\TypePme;

class soucriptionDossier extends Controller
{
    
    public function index(Request $request){
        $typepme=TypePme::select()->get();
        return view('home.soucriptionDossiers',['pmeTypeList'=>$typepme]);
    }

}
