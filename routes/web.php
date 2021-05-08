<?php

use App\Http\Controllers\AppAccess;
use App\Http\Controllers\decisionFinancement;
use App\Http\Controllers\soucriptionDossier;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Rdv;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>['web']],function(){

    Route::get('/', function () {
        return view('home/index');
    })->name('home');


    Route::group(['prefix'=>'/souscriptionDossier'],function(){
         Route::get('/index',[soucriptionDossier::class,'index'])->name('souscriptionDossier');
    });

    Route::group(['prefix'=>'/decisionFinancement'],function(){
         Route::get('/index',[decisionFinancement::class,'index'])->name('decisionFinancement');
    });

    Route::group(['prefix'=>'connexion'],function(){
        Route::get('/index',[AppAccess::class,'connexionview'])->name('loginview');
         Route::post('/index',[AppAccess::class,'connexion'])->name('connecte');
    });

    Route::group(['middleware'=>'auth'],function(){
        Route::group(['prefix'=>'/dashboard'],function(){
        Route::get('/index',[Dashboard::class,'index'])->name('dashboardView');
        Route::post('/addpme',[Dashboard::class,'addPme'])->name('addPME');
        Route::post('/addpmedossiers',[Dashboard::class,'addDossier'])->name('adDossier');
        Route::post('/addDossierAnalyste',[Dashboard::class,'addDossierbyAnalyste'])->name('adDossierAn');
        Route::get('/dossierGeneral/{iddossier?}',[Dashboard::class,'dossierGeneral'])->name('dossierGeneral');
        Route::get('/ranlyste/{iddossier?}',[Dashboard::class,'ranalystecreate'])->name('rAnalyste');
        Route::get('/anlyste',[Dashboard::class,'analystecreate'])->name('analyste');
        Route::post('/transfertdossieranalyste}',[Dashboard::class,'ranalysteTransfert'])->name('transfertDossierAnalyste');
        Route::post('/transfertDossierGeneral}',[Dashboard::class,'transfertDossierGeneral'])->name('transfertDossierGeneral');
        Route::post('/scoring}',[Dashboard::class,'scorepme'])->name('scoring');
        Route::get('/retourAnalyste}',[Dashboard::class,'retourAnalysteCreate'])->name('retourAnalyste');
        route::post('/transfertBanque',[Dashboard::class,'sendToBank'])->name('sendTobank');
        route::get('/dashboardBank/{iddossier?}',[Dashboard::class,'partenairecreate'])->name('dashboardBank');
        route::post('/decisionBanque',[Dashboard::class,'decisionBanque'])->name('decisionBanque');
        route::get('/rdvlist/{date?}',[Dashboard::class,'rdvListCreate'])->name('rdvlist');
        route::get('/rdvstate/{id}/{state}',[Rdv::class,'rdvstate'])->name('rdvstate');
        route::post('/sheduleappointment',[Rdv::class,'sheduleappointment'])->name('shedule');
        route::get('/retourAccordBanque',[Dashboard::class,'retourBanqueCreate'])->name('retourAccordBanque');
        route::get('/retourBanqueRejet',[Dashboard::class,'retourBanqueRejet'])->name('retourBanqueRejet');



        


     });

    });

});

//free route
Route::post('/checkDate',[Rdv::class,'checkTimeForRdv'])->name('checkT');
//free route
Route::post('/takeappointment',[Rdv::class,'takeAppointment'])->name('takeApoint');
//free route
Route::post('/takeappointmentPerso',[Rdv::class,'particulerTakeAppointment'])->name('particuliertakeApoint');

