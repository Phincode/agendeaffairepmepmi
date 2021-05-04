<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypePme;
use App\Http\Requests\AddPmeRequest;
use App\Http\Requests\AddPmeFilesRequest;
use App\Http\Requests\ScorePmeRequest;

use App\Models\DossierPme;
use App\Models\Pme;
use App\Models\User;
use App\Models\Role;
use App\Models\DossierPmeTransfert;
use Exception;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\DocTransfertdRequest;
use App\Models\PmeScoring;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        //Get pmeType liste
        $pmeTypeList=TypePme::all();

        //Get pmeList
        $pmeList=Pme::all();
        return view('dashboard.dashb',['pmeTypeList'=>$pmeTypeList,'pmeList'=>$pmeList]);
    }

    public function addPme(AddPmeRequest $request ){
        $data=$request->validated();
        //dd($data);
        
            $pme=new Pme();
            $pme->nom=$data['nom'];
            $pme->nomProprietaire=$data['nomProprietaire'];
            $pme->emailProprietaire=$data['emailProprietaire'];
            $pme->numeroProprietaire=$data['numeroProprietaire'];
            $pme->nomGerant=$data['nomGerant'];
            $pme->emailGerant=$data['emailGerant'];
            $pme->numeroGerant=$data['numeroGerant'];
            $pme->activite=$data['activite'];
            $pme->codePme=$data['codePme'];
            $pme->typePme=$data['typePme'];
            $pme->filledUserId=$data['filledUserId'];
            $pme->save();
            return back()->with('succes','Pme Enregistrée avec succès!');
    }

    public function addDossier(AddPmeFilesRequest $file)
    {
        $data=$file->validated();
        //dd($data);
        $images = $data['filenames'];
        $pmeID=$data['Pme'];
        
        $req=Pme::select()->where('id',$pmeID)->first();
        //dd($req);
        $v=Role::select()->where('name','RAN')->first();

        $npme=$req->nom;
        foreach($images as $image) {
            $name = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs('uploads/'.$npme, $name, 'public');
            $path2=Storage::url($path);
            //store
            $dossierPme=new DossierPme();
            $dossierPme->pmeId=$pmeID;
            $dossierPme->docPath=$path2;
            $dossierPme->validation=$v->id;
            $dossierPme->etat="ANALYSE1";
            $dossierPme->nomFichier=$image->getClientOriginalName();
            $dossierPme->save();
            //var_dump($path2);

        }
        return back()->with('succes','dossier ajouté!');

    }

    public function ranalystecreate(Request $request)
    {
        //get pme to score
        $dossierpme=DossierPme::select('pmeId')    
                                        ->where('validation',2)
                                        ->where('etat','ANALYSE1')
                                        ->distinct()
                                        ->get(); 
        //echo($dossierpme->first->pmeId); 
        $pmeList=Array();
        foreach ($dossierpme as $key => $value) {
           $data=Pme::Where('id',$value['pmeId'])->first();
           array_push($pmeList,$data);
        } 
        
        $pmeFiles=Array();

        //selection des analystes
        $analysteList=User::select()->Where('role_id',3)->get();
        
        if($request->iddossier!=null){
            
            $iddossier=intval($request->iddossier);
            array_push($pmeFiles,DossierPme::select()->Where('pmeId',$iddossier)->get());
            $pmeName=Pme::select('nom')->where('id', $iddossier)->first();
            return view('dashboard.rAnalyste',['listPmetoScore'=>$pmeList,'pmeFiles'=>$pmeFiles[0],'currentPme'=>intval($request->iddossier),'currentPmeName'=>$pmeName->nom,'ListeAnalyste'=>$analysteList]);

        }
        
        //dd($request->iddossier);
        //dd($pmeFiles[0]);

        return view('dashboard.rAnalyste',['listPmetoScore'=>$pmeList,'pmeFiles'=>[],'currentPme'=>0,'currentPmeName'=>"",'ListeAnalyste'=>$analysteList]);

    }

    public function ranalysteTransfert(DocTransfertdRequest $request)
    {
        $data=$request->validated();
        $transfert=new DossierPmeTransfert();
        $transfert->to=$data['analysteId'];
        $transfert->pmeId=$data['pmeId'];
        $transfert->from=$data['ranalysteId'];
        $transfert->etape=3;
        $transfert->Observation=$data['observation'];
        $transfert->save();
        return back()->with('succes','Dossier Partagé avec succès');
    }

    public function analystecreate(Request $request)
    {
        $myId=Auth::user()->id;
        $myFiles=DossierPmeTransfert::select()->where('to',$myId)
                                              ->where('etape',3)
                                              ->join('pmes','pmes.id','=','dossier_pme_transferts.pmeId')      
                                              ->get();
       // dd($myFiles->first);
        return view('dashboard.analyste',['pmeDossiers'=>$myFiles]);
    }

    public function scorepme(ScorePmeRequest $request)
    {
        $data=$request->validated();
        $scoring=new PmeScoring();
        $scoring->score=$data['score'];
        $scoring->pmeId=$data['pmeId'];
        $scoring->analysteId=$data['analysteId'];
        $scoring->Observation=$data['observation'];
        $scoring->save();
        //udpade docfile table
        $dossierPme=DossierPme::where('pmeId',$data['pmeId'])
                                    ->update(['etat'=>'ANALYSE2','validation'=>'4']);

        DossierPmeTransfert::where('pmeId',$data['pmeId'])  
                                    ->update(['etape'=>4]);                          
        
        return back()->with('succes','Pme scoré avec succés!');

    }

    public function retourAnalysteCreate(Request $request)
    {
        $myId=Auth::user()->id;
        $myFiles=PmeScoring::select()->where('Observation','!=','BANQUE')
                                     ->join('pmes','pmes.id','=','pme_scorings.pmeId')
                                     ->join('users','users.id','=','pme_scorings.analysteId')         
                                     ->get();
       // dd($myFiles->first);
        return view('dashboard.retourAnalyste',['pmeDossiers'=>$myFiles]);
    }



}
