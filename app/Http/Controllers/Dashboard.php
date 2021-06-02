<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypePme;
use App\Http\Requests\AddPmeRequest;
use App\Http\Requests\AddPmeFilesRequest;
use App\Http\Requests\ScorePmeRequest;
use App\Http\Requests\AddDossier;

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
use App\Http\Requests\SendToBankRequest;
use App\Models\DossierGeneral;
use App\Models\FichierDossierGeneral;
use Illuminate\Support\Facades\Date;
use App\Models\Rdvs;
use App\Service\mailing;


class Dashboard extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('web');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
      }

    public function index(Request $request){
        //Get pmeType liste
        $pmeTypeList=TypePme::all();

        //Get pmeList
        $pmeList=Pme::all();
        return view('dashboard.dashb',['pmeTypeList'=>$pmeTypeList,'pmeList'=>$pmeList]);
    }

    public function addPme(AddPmeRequest $request )
    {
        $mailing=new mailing();
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
            $pme->besoinenfinancement=$data['besoin'];
            $pme->localisation=$data['localisation'];
            $pme->save();
            $pmeId= Pme::select('id')->where('codePme',$data['codePme'])->first();
            //send notification to pme
            // $mailing::sendNotification($data['emailProprietaire'],"Votre code PME est le: ".$pmeId->id);
            // //send notification to AG
            // $mails=User::select('email')->where('role_id',1)->get();
            // foreach ($mails as $key => $adress) {
            //     mailing::sendNotification($adress->email,"Une nouvelle Pme viens de s'enregistrer,le code PME est le: ".$pmeId->id);

            // }

            return back()->with('succes','Pme Enregistrée avec succès!');
    }

    public function addDossier(AddPmeFilesRequest $file)
    {
        $mailing=new mailing();
        $data=$file->validated();
        //dd($data);
        $images = $data['filenames'];
        $pmeID=$data['Pme'];
        
        $req=Pme::select()->where('id',$pmeID)->first();
        //dd($req);
        if($req==null){
            return back()->with('error','Pme non trouvé');
        }
        $pmeMail=$req->emailProprietaire;
        $v=Role::select()->where('name','RAN')->first();
        $state='ANALYSE1';
       if(Auth::check()==false){
           //utilisateur non authentifié
        $v=Role::select()->where('name','AG')->first();
        $state='ANALYSE';
       }
        $npme=$req->nom;
       //on vérifie si un dossier n'existe pas déjà
       $checking=DossierPme::select()->where('pmeId',$pmeID)->get();
      // dd($checking);
       if(sizeof($checking)!=0){
        return back()->with('error','Un dossier existe déjà pour cette Pme');
       }


        foreach($images as $image) {
            $name = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs('uploads/'.$npme, $name, 'public');
            $path2=Storage::url($path);
            //store
            $dossierPme=new DossierPme();
            $dossierPme->pmeId=$pmeID;
            $dossierPme->docPath=$path2;
            $dossierPme->validation=$v->id;
            $dossierPme->etat=$state;
            $dossierPme->nomFichier=$image->getClientOriginalName();
            $dossierPme->save();
            //var_dump($path2);

        }
        //$pmeMail
        //send notification to pme owner
    //    $mailing::sendNotification($pmeMail,"Nous accusons reception de votre dossier,nous vous ferons un retour incessamment");
    //     if(Auth::check()==false){
    //          send notification to AG
    //         $mails=User::select('email')->where('role_id',1)->get();
    //         foreach ($mails as $key => $adress) {
    //            $mailing::sendNotification($adress->email,"Une pme viens de soumettre son dossier, Merci de le consulter dans votre TB");
    //        }
    //     }
        return back()->with('succes','dossier ajouté!');

    }

    public function addFiles(Request $request){
        $files=$request->filenames;
        $pmeId=$request->pmeId;
        $npme=Pme::select('nom')->where('id',$pmeId)->get()->first->nom->nom;
       // var_dump($npme->nom->nom);
       
        foreach($files as $file) {
            $name = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('uploads/'.$npme, $name, 'public');
            $path2=Storage::url($path);
            //store
            $dossierPme=new DossierPme();
            $dossierPme=new DossierPme();
            $dossierPme->pmeId=$pmeId;
            $dossierPme->docPath=$path2;
            $dossierPme->validation=2;
            $dossierPme->etat="ANALYSE1";
            $dossierPme->nomFichier=$file->getClientOriginalName();
            $dossierPme->save();
            //var_dump($path2);
        }
        return redirect()->back()->with('succes','dossier ajouté!');

    }

    public function sendDossierToRanalyste(Request $request)
    {
        $v=Role::select()->where('name','RAN')->first();
        $state='ANALYSE1';
        $pmeId=$request->pmeId;
        DossierPme::where('pmeId',$pmeId)->update(['etat'=>$state,'validation'=>$v->id]);
        PmeScoring::where('pmeId',$pmeId)->delete();
         
        //send notification to RAN
        //  $mails=User::select('email')->where('role_id',2)->get();
        //  foreach ($mails as $key => $adress) {
        //     mailing::sendNotification($adress->email,"Nouveau dossier à analyser dans votre TB");
        // }
        return redirect('/dashboard/index')->with('succes','Dossier transmis!');  
      }
    
    public function delDossier(Request $request)
    {
          $pmeId=$request->pmeId;
          DossierPme::where('pmeId',$pmeId)->delete();
          PmeScoring::where('pmeId',$pmeId)->delete();
          return redirect('/dashboard/index')->with('succes','Dossier retiré!');  
    }  

    public function delFile(Request $request)
    {
        $docId=$request->docId;
        DossierPme::where('id',$docId)->delete();
        return redirect('/dashboard/index')->with('succes','Fichier  retiré!');  
      } 

    public function addDossierbyAnalyste(AddDossier $file)
    {
        $data=$file->validated();
        //dd($data);
        $images = $data['filenames'];
        $dossierName=$data['nomDossier'];
        $observation=$data['observations'];
        //create dossier
        //store
        $dossier=new DossierGeneral();
        $dossier->nom=$dossierName;
        $dossier->transmission='AG';
        $dossier->etat='PENDING';
        $dossier->analysteName=Auth::user()->name;
        $dossier->observations=$observation;
        $dossier->save();
        $idDossier=DossierGeneral::select()->orderBy('id','desc')->first()->id;

        //$npme=$req->nom;
        foreach($images as $image) {
            $name = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs('uploads/'.$dossierName, $name, 'public');
            $path2=Storage::url($path);
              $fichiers= new FichierDossierGeneral();
              $fichiers->idDossier=$idDossier;
              $fichiers->nomFichier=$image->getClientOriginalName();
              $fichiers->pathFichier=$path2;
              $fichiers->save();
            //var_dump($path2);
        }
        
        //send notification to RAN
        // $mails=User::select('email')->where('role_id',1)->get();
        // foreach ($mails as $key => $adress) {
        //            mailing::sendNotification($adress->email,"Un analyste viens de vous transmettre un  dossier à analyser dans votre TB CAPITAL");
        //        }
        return back()->with('succes','dossier ajouté!');

    }

    //new dossier to check and transfert 
    public function newDossiercreate(Request $request)
    {
        //get pme to analyse
        $dossierpme=DossierPme::select('pmeId')    
                                        ->where('validation',1)
                                        ->where('etat','ANALYSE')
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
        $analysteList=User::select()->Where('role_id',2)->get();
        
        if($request->iddossier!=null){
            $iddossier=intval($request->iddossier);
            array_push($pmeFiles,DossierPme::select()->Where('pmeId',$iddossier)->get());
            $pmeName=Pme::select('nom')->where('id', $iddossier)->first();
            return view('dashboard.nouveauDossier',['listPmetoScore'=>$pmeList,'pmeFiles'=>$pmeFiles[0],'currentPme'=>intval($request->iddossier),'currentPmeName'=>$pmeName->nom,'ListeAnalyste'=>$analysteList]);

        }
        
        //dd($request->iddossier);
        //dd($pmeFiles[0]);

        return view('dashboard.nouveauDossier',['listPmetoScore'=>$pmeList,'pmeFiles'=>[],'currentPme'=>0,'currentPmeName'=>"",'ListeAnalyste'=>$analysteList]);

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





    public function dossierGeneral(Request $request)
    {
        //get pme to score
        $dossier=DossierGeneral::select()    
                                        ->where('transmission','AS')
                                        ->get();        
        $dossierFiles=Array();
        if($request->iddossier!=null){
            $iddossier=intval($request->iddossier);
            array_push($dossierFiles,FichierDossierGeneral::select()->Where('idDossier',$iddossier)->get());
            $dossierName=DossierGeneral::select('nom')->where('id', $iddossier)->first();
            return view('dashboard.dossierRetourner',['listDossier'=>$dossier,'dossierFiles'=>$dossierFiles[0],'currentDossier'=>intval($request->iddossier),'currentdossierName'=>$dossierName->nom]);
        }
        
        //dd($request->iddossier);
        //dd($pmeFiles[0]);

        return view('dashboard.dossierRetourner',['listDossier'=>$dossier,'dossierFiles'=>[],'currentDossier'=>0,'currentdossierName'=>'']);

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
         //send notification to RAN
        //  $mails=User::select('email')->where('id',$data['analysteId'])->get();
        //  foreach ($mails as $key => $adress) {
        //     mailing::sendNotification($adress->email,"Votre responsable viens de vous soumettre un dossier à analyser");
        // }
        return redirect('/dashboard/index');

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
        
        // $mails=User::select('email')->where('role_id',1)->get();
        //     foreach ($mails as $key => $adress) {
        //             mailing::sendNotification($adress->email,"Un nouveau dossier est disponible dans votre TB option: Retour Analyste");
        //             }                            
        
        return redirect('/dashboard/index');


    }

    public function retourAnalysteCreate(Request $request)
    {
        $myId=Auth::user()->id;
        $myFiles=PmeScoring::select()->where('Observation','!=','BANQUE')
                                    ->Where('Observation','not like','%ACCORD_FINANCEMENT%')
                                    ->Where('Observation','not like','%REFUS_FINANCEMENT%')
                                     ->join('pmes','pmes.id','=','pme_scorings.pmeId')
                                     ->join('users','users.id','=','pme_scorings.analysteId')         
                                     ->get();
        //var_dump($myFiles->first->pmeId);

       //séléct bank
       $bank=User::select()->where('role_id',4)->get();
       return view('dashboard.retourAnalyste',['pmeDossiers'=>$myFiles,'Banks'=>$bank]);

    }

    public function retourBanqueCreate(Request $request)
    {
        $myId=Auth::user()->id;
        $myFiles=PmeScoring::select()->where('Observation','LIKE','%ACCORD_FINANCEMENT%')
                                     ->join('pmes','pmes.id','=','pme_scorings.pmeId')
                                     ->join('users','users.id','=','pme_scorings.analysteId')         
                                     ->get();
       // dd($myFiles->first->pmeId);

       //séléct bank
       $bank=User::select()->where('role_id',4)->get();
       return view('dashboard.retourBanque',['pmeDossiers'=>$myFiles,'Banks'=>$bank]);

    }

    public function retourBanqueRejet(Request $request)
    {
        $myId=Auth::user()->id;
        $myFiles=PmeScoring::select()->where('Observation','LIKE','%REFUS_FINANCEMENT%')
                                     ->join('pmes','pmes.id','=','pme_scorings.pmeId')
                                     ->join('users','users.id','=','pme_scorings.analysteId')         
                                     ->get();
        //var_dump($myFiles->first->pmeId);

       //séléct bank
       $bank=User::select()->where('role_id',4)->get();
       return view('dashboard.dossierRejete',['pmeDossiers'=>$myFiles,'Banks'=>$bank]);

    }

    public function sendToBank(SendToBankRequest $request){

        $data=$request->validated();
        //dd($data);
        //dd($data);

        $check=DossierPmeTransfert::select()->where('pmeId',$data['pmId'])->get();
        
        if(sizeof($check)==0){
            $transfert=new DossierPmeTransfert();
            $transfert->to=0;
            $transfert->pmeId=$data['pmId'];
            $transfert->from=0;
            $transfert->etape=4;
            $transfert->Observation='RAS';
            $transfert->save();
        }
       // dd($data['pmId']);
    
        $a=DossierPmeTransfert::where('pmeId',$data['pmId'])
                              ->update(['from'=>$data['from'],'to'=>$data['bankid'],'Observation'=>$data['observation']]);
       
        $b=DossierPme::where('pmeId',$data['pmId'])
                              ->update(['etat'=>'ANALYSE3','validation'=>4]);
       
        $c=PmeScoring::where('pmeId',$data['pmId'])
                    ->update(['Observation'=>'BANQUE']);
        
                    return redirect('/dashboard/index');


    }


    public function partenairecreate(Request $request){

        $userId=Auth::user()->id;

        //get transfert pme to analyse
        $pmeList=DossierPmeTransfert::select()->where('to',$userId)
                                    ->where('etape',4)
                                    ->join('pmes','pmes.id','=','dossier_pme_transferts.pmeId')
                                    ->get();        
        $pmeFiles=Array();
        if($request->iddossier!=null){
            
            $iddossier=intval($request->iddossier);
            array_push($pmeFiles,DossierPme::select()->Where('pmeId',$iddossier)->get());
            $pmeName=Pme::select('nom')->where('id', $iddossier)->first();
            return view('dashboard.banqueAnalyse',['listPmetoScore'=>$pmeList,'pmeFiles'=>$pmeFiles[0],'currentPme'=>intval($request->iddossier),'currentPmeName'=>$pmeName->nom]);

        }
        //dd($request->iddossier);
        //dd($pmeFiles[0]);

        return view('dashboard.banqueAnalyse',['listPmetoScore'=>$pmeList,'pmeFiles'=>[],'currentPme'=>0,'currentPmeName'=>""]);


    }

    public function rdvListCreate(Request $request)
    {
        $liste=Array();
        if($request->date!=null){
            //dd($request->date);
            $time = strtotime($request->date);
            $date = date('Y-m-d',$time);
            //dd($request->date);
            $data=Rdvs::select()->where('state','=','PENDING')
            ->where('dateRdv','=',  $date)
            ->Where('rdvs.clientSimpleDcId','!=',null)
            ->join('client_s_d_c_s','client_s_d_c_s.id','=','rdvs.clientSimpleDcId')
            ->get();

            $data1=Rdvs::select()->where('state','=','PENDING')
            ->where('dateRdv','=', $date)
            ->where('rdvs.pmeId','!=',null)
            ->join('pmes','pmes.id','=','rdvs.pmeId')
            ->get();
            array_push($liste,$data);
            array_push($liste,$data1);
            return view('dashboard.rdvList',['listrdv'=>$liste]);


        }
        $liste=Array();
        $data=Rdvs::select()->where('state','=','PENDING')
        //->where('dateRdv','>=', Date('Y-m-d'))
        ->where('rdvs.clientSimpleDcId','!=',null)
        ->join('client_s_d_c_s','client_s_d_c_s.id','=','rdvs.clientSimpleDcId')
        ->select('rdvs.*','client_s_d_c_s.nomPrenom','client_s_d_c_s.tel1','client_s_d_c_s.tel2','client_s_d_c_s.niveauDiplome','client_s_d_c_s.localisation','client_s_d_c_s.ancienNouveau')
        ->orderBy('rdvs.dateRdv','DESC')
        ->paginate(3);

        $data1=Rdvs::select()->where('state','=','PENDING')
       // ->where('dateRdv','>=', Date('Y-m-d'))
        ->where('rdvs.pmeId','!=',null)
        ->join('pmes','pmes.id','=','rdvs.pmeId')
        ->select('rdvs.*','pmes.nom','pmes.nomProprietaire','pmes.numeroProprietaire','pmes.emailProprietaire','pmes.besoinenfinancement')
        ->orderBy('rdvs.dateRdv','DESC')
        ->paginate(3);
        array_push($liste,$data);// pro list
        array_push($liste,$data1);// pme pmi list


      //dd($liste);
        return view('dashboard.rdvList',['listrdv'=>$liste]);
    }

    public function transfertDossierGeneral(Request $request){
        $observations=$request->observations;
        $idDossier=$request->idDossier;
        $validation='AG';
        DossierGeneral::where('id',$idDossier)->update(['analysteName'=>Auth::user()->name,'observations'=>$observations,'transmission'=>$validation]);
        // $mails=User::select('email')->where('role_id',1)->get();
        //     foreach ($mails as $key => $adress) {
        //             mailing::sendNotification($adress->email,"Un nouveau dossier est disponible dans votre TB CAPITAL");
        //             }   
        return redirect('/dashboard/dossierGeneral/');
    }



}
