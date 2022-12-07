<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RrcoController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//  Route::get('filtrar','RrcoController@filtrar')->name('filtrar');
// Route::get('form', [App\Http\Controllers\formularioController::class,'indexCITE']);
// Route::get('formpdf', [App\Http\Controllers\formularioController::class,'imprimirCITE']);


// ////// RRCO 
// Route::get('/rrco','RrcoController@getProcesos')->name('rrco');
// Route::post('/rrco','RrcoController@postProcesosbuscar')->name('repRRCO.rrco');

// Route::get('rrcoEXCEL', [App\Http\Controllers\RrcoController::class,'export']);




////// SEGUIMIENTO DE DECLARACIONES JURADAS
Route::get('/sddjj','SddjjController@getProcesos')->name('sddjj');
Route::post('/sddjj','SddjjController@postProcesosbuscar')->name('repSDDJJ.sddjj');

Route::get('sddjjEXCEL', [App\Http\Controllers\SddjjController::class,'export']);

////// SEGUIMIENTO a certificadore de origen
Route::get('/sco','ScoController@getProcesos')->name('sco');
Route::post('/sco','ScoController@postProcesosbuscar')->name('repSCO.sco');

Route::get('scoEXCEL', [App\Http\Controllers\ScoController::class,'export']);

/////// SOLICITUD DE SOLICITUDES DDJJ
Route::get('/sgcddjj','SgcddjjController@getProcesos')->name('sgcddjj');
Route::post('/sgcddjj','SgcddjjController@postProcesosbuscar')->name('repSGCDDJJ.sgcddjj');

Route::get('sgcddjjEXCEL', [App\Http\Controllers\SgcddjjController::class,'export']);
/////// SOLICITUD DE SOLICITUDES CO
Route::get('/sgcco','SgccoController@getProcesos')->name('sgcco');
Route::post('/sgcco','SgccoController@postProcesosbuscar')->name('repSGCCO.sgcco');

Route::get('sgccoEXCEL', [App\Http\Controllers\SgccoController::class,'export']);


///////REPORTE DE EMISION DE CERTIFOCADO DE CAFE
Route::get('/oic','OicController@getProcesos')->name('oic');
Route::post('/oic','OicController@postProcesosbuscar')->name('repOIC.oic');

Route::get('oicEXCEL', [App\Http\Controllers\OicController::class,'export']);


/////// REPORTES E DECLARACIONES JURADAS 
Route::get('/ddjj','RddjjController@getProcesos')->name('ddjj');
Route::post('/ddjj','RddjjController@postProcesosbuscar')->name('repDDJJ.ddjj');

Route::get('ddjjEXCEL', [App\Http\Controllers\RddjjController::class,'export']);

