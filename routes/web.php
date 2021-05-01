<?php

use App\Http\Controllers\AppAccess;
use App\Http\Controllers\decisionFinancement;
use App\Http\Controllers\soucriptionDossier;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;

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
        });

    });


    
   

});
