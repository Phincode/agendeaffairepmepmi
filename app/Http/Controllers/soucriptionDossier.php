<?php

namespace App\Http\Controllers;

use App\Models\TypePme as ModelsTypePme;
use Illuminate\Http\Request;
use App\Models\TypePme;
use App\Models\Pme;

class soucriptionDossier extends Controller
{
    
    public function index(Request $request){
        $typepme=TypePme::select()->get();
         //Get pmeType liste
         $pmeTypeList=TypePme::all();

         //Get pmeList
         $pmeList=Pme::all();
        return view('home.soucriptionDossiers',['pmeTypeList'=>$typepme,'pmeList'=>$pmeList]);
    }

}
