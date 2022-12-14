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
// Route::get('/sddjj','SddjjController@getProcesos')->name('sddjj');
// Route::post('/sddjj','SddjjController@postProcesosbuscar')->name('repSDDJJ.sddjj');

// Route::get('/exce','SddjjController@get')->name('exce');
// Route::post('/exce','SddjjController@postProcesos')->name('repSDDJJ.excel');

////// SEGUIMIENTO a certificadore de origen
Route::get('/sco','ScoController@getProcesos')->name('sco');
Route::post('/sco','ScoController@postProcesosbuscar')->name('repSCO.sco');

Route::get('scoEXCEL', [App\Http\Controllers\ScoController::class,'export']);

/////// SOLICITUD DE SOLICITUDES DDJJ
Route::get('/sgcddjj','SgcddjjController@getProcesos')->name('sgcddjj');
Route::post('/sgcddjj','SgcddjjController@postProcesosbuscar')->name('repSGCDDJJ.sgcddjj');

Route::get('sgcddjjEXCEL', [App\Http\Controllers\SgcddjjController::class,'export']);

Route::get('/excel','SgcddjjController@get')->name('excel');
Route::post('/excel','SgcddjjController@postProcesos')->name('repSGCDDJJ.excel');
/////// SOLICITUD DE SOLICITUDES CO
Route::get('/sgcco','SgccoController@getProcesos')->name('sgcco');
Route::post('/sgcco','SgccoController@postProcesosbuscar')->name('repSGCCO.sgcco');

Route::get('sgccoEXCEL', [App\Http\Controllers\SgccoController::class,'export']);


///////REPORTE DE EMISION DE CERTIFOCADO DE CAFE
Route::get('/oic','OicController@getProcesos')->name('oic');
Route::post('/oic','OicController@postProcesosbuscar')->name('repOIC.oic');

Route::get('oicEXCEL', [App\Http\Controllers\OicController::class,'export']);


// /////// REPORTES E DECLARACIONES JURADAS 
// Route::get('/ddjj','RddjjController@getProcesos')->name('ddjj');
// Route::post('/ddjj','RddjjController@postProcesosbuscar')->name('repDDJJ.ddjj');

// Route::get('/ddjjexcel','RddjjController@get')->name('ddjjexcel');
// Route::post('/ddjjexcel','RddjjController@postProcesos')->name('repDDJJ.excel');

// Route::get('ddjjEXCEL', [App\Http\Controllers\RddjjController::class,'export']);

/////// ventas  de certificados oic
// Route::get('/voic','VoicController@getProcesos')->name('voic');
// Route::post('/voic','VoicController@postProcesosbuscar')->name('repVOIC.voic');

// Route::get('voicEXCEL', [App\Http\Controllers\VoicController::class,'export']);

// // Route::get('/excel','VoicController@get')->name('excel');
// // Route::post('/excel','VoicController@postProcesos')->name('repVOIC.excel');


/////// REPORTE  DE ANULACIONES  DE SETIFICADOS DE ORIGEN
Route::get('/raco','RacoController@getProcesos')->name('raco');
Route::post('/raco','RacoController@postProcesosbuscar')->name('repRACO.raco');


Route::get('/racoexcel','RacoController@get')->name('racoexcel');
Route::post('/racoexcel','RacoController@postProcesos')->name('repRACO.excel');


/////// REPORTES de emisin de certificado de origen
Route::get('/reco','RecoController@getProcesos')->name('reco');
Route::post('/reco','RecoController@postProcesosbuscar')->name('repRECO.reco');

Route::get('recoEXCEL', [App\Http\Controllers\RecoController::class,'export']);
