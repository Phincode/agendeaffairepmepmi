<?php

use App\Http\Controllers\decisionFinancement;
use App\Http\Controllers\soucriptionDossier;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home/index');
})->name('home');

Route::group(['prefix'=>'/souscriptionDossier'],function(){
    Route::get('/index',[soucriptionDossier::class,'index'])->name('souscriptionDossier');
} 
);

Route::group(['prefix'=>'/decisionFinancement'],function(){
    Route::get('/index',[decisionFinancement::class,'index'])->name('decisionFinancement');
} 
);
