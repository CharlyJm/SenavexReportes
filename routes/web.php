<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RrcoController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


 Route::get('filtrar','RrcoController@filtrar')->name('filtrar');
Route::get('form', [App\Http\Controllers\formularioController::class,'indexCITE']);
Route::get('formpdf', [App\Http\Controllers\formularioController::class,'imprimirCITE']);


////// RRCO 
Route::get('/rrco','RrcoController@getProcesos')->name('rrco');
Route::post('/rrco','RrcoController@postProcesosbuscar')->name('repRRCO.rrco');

Route::get('rrcoEXCEL', [App\Http\Controllers\RrcoController::class,'export']);