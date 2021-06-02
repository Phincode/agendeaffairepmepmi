<?php

namespace App\Http\Controllers;
use App\Models\Rdvs;

use Illuminate\Http\Request;
use App\Http\Requests\pmeTakeRDVRequest;
use App\Http\Requests\particulierTakeRDVRequest;
use App\Models\ClientSDC;
use App\Models\Pme;
use Illuminate\Support\Facades\Crypt;

class Rdv extends Controller
{
    public function checkTimeForRdv(Request $request){
      //;
      if($request->has('date')){
          $date=$request->input('date');
          //$lastrdv=Rdvs::select()->where('dateRdv',$date)->orderBy('id','desc')->first();
          $number=Rdvs::select()->where('dateRdv',$date)->where('horaire',1)->count();
          if($number<1){
            return json_encode(['error'=>false,'data'=>[1,2,3,4]]);
          }
          $number=Rdvs::select()->where('dateRdv',$date)->where('horaire',2)->count();
          if($number<1){
            return json_encode(['error'=>false,'data'=>[2,3,4]]);
          }
          $number=Rdvs::select()->where('dateRdv',$date)->where('horaire',3)->count();
          if($number<1){
            return json_encode(['error'=>false,'data'=>[3,4]]);
          }
          $number=Rdvs::select()->where('dateRdv',$date)->where('horaire',4)->count();
          if($number<1){
            return json_encode(['error'=>false,'data'=>[4]]);
          }else{
            return json_encode(['error'=>false,'data'=>[0]]);
          }

      }else{
        return json_encode(['error'=>true]);
      }
    }

    public function takeAppointment(pmeTakeRDVRequest $request)
    {
      //dd($request->all());
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
            $pme->localisation=$data['localisation'];
            $pme->besoinenfinancement=$data['besoinFinancement'];
            $pme->filledUserId=$data['filledUserId'];
            $pme->dateCreation=$data['dateCreation'];

            $check=$pme->save();

            if($check){
              $rdv=new Rdvs();
              $id=Pme::select()->where('codePme',$data['codePme'])->first()->id;
              $rdv->pmeId=$id;
              $rdv->horaire=intval($data['plageHoraire']);
              $rdv->clientSimpleDcId=null;
              $rdv->dateRdv=$data['dateRdv'];
              $rdv->state='PENDING';
              if($rdv->save()){
                return back()->with('succes','Nous avons bien reçu votre soumission, notre équipe commerciale vous contactera');
              }else{
                return back()->with('error','Données non sauvegardé merci de réessayer!');
              }
            }else{
              return back()->with('error','Données non sauvegardé merci de réessayer!');

            }

    }

    public function particulerTakeAppointment(Request $request){
     $client=new ClientSDC();
     $client->nomPrenom=$request['nom'];
     $client->age=$request['age'];
     $client->tel1=$request['numerotel'];
     $client->tel2=$request['numerotel2'];
     $client->niveauDiplome=$request['niveau'];
     $client->nomEcoleDernierDiplome=$request['ecole'];
     $client->localisation=$request['localisation'];
     //$client->activite=$request['activite'];
     $client->ancienNouveau=$request['ancienNouveau'];
     $client->periode=$request['periode'];
     //dd($request);
     //$client->daterdv1=$data['daterdv1'];
    // $client->plageHoraire=$data['plageHoraire'];
    if($client->save()){
      $id=ClientSDC::select()->orderBy('id','desc')->first()->id;
      $rdv=new Rdvs();
      $rdv->pmeId=null;
      $rdv->horaire=intval($request['plageHoraire']);
      $rdv->clientSimpleDcId=$id;
      $rdv->dateRdv=$request['dateRdv1'];
      $rdv->state='PENDING';
      if($rdv->save()){
        return back()->with('succes','Nous avons bien reçu votre soumission, notre équipe commerciale vous contactera');
      }else{
        return back()->with('error','Données non sauvegardé merci de réessayer!');
      }

    }else{
      return back()->with('error','Données non sauvegardé merci de réessayer!');

    }



    }

    public function sheduleappointment(Request $request)
    {
     // dd($request->all());
      $id=$request->id;
      Rdvs::where('id',intval($id))->update(['dateRdv'=>$request->date,'state'=>'PENDING','horaire'=>intval($request->plageHoraire)]);
      return redirect('/dashboard/rdvlist');

    }

    public function rdvstate(Request $request)
    {
      $id=intval(Crypt::decryptString($request->id));
      $state=Crypt::decryptString($request->state);
      if($state=='ABS'){
          $date = strtotime(date("Y-m-d", strtotime(date('Y-m-d'))) . " +1 week");
          $datereal=date("Y-m-d",$date);
          Rdvs::where('id',$id)->update(['dateRdv'=>$datereal]);
        return redirect('/dashboard/rdvlist');
      }
      Rdvs::where('id',$id)->update(['state'=>$state]);
      return redirect('/dashboard/rdvlist');




    }


}
