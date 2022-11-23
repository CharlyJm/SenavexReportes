<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RrcoController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\UserController::class,'index']);
Route::get('/paises', [App\Http\Controllers\PaisController::class,'index']);
Route::get('/empresass', [App\Http\Controllers\EmpresasController::class,'index']);
Route::get('/paises/export/', [App\Http\Controllers\PaisController::class, 'export']);
Route::get('/empresass/export/', [App\Http\Controllers\EmpresasController::class,'export']);
 /// para pdf
 //Route::get('/imprimir', [App\Http\Controllers\PaisController::class, 'imprimir']);

//Route::get('index', [App\Http\Controllers\ImprimirController::class, 'index']);
//::get('imprimir', [App\Http\Controllers\ImprimirController::class, 'imprimir']);


Route::get('index', [App\Http\Controllers\DdjjsenavexController::class,'index']);
Route::get('PDF', [App\Http\Controllers\DdjjsenavexController::class,'imprimir']);
Route::get('export', [App\Http\Controllers\DdjjsenavexController::class,'export']);
 ///Route::get('PDF', [App\Http\Controllers\ImprimirController::class, 'imprimir']);
///Route::get('imprimir/{id_empresa}', [App\Http\Controllers\ImprimirController::class, 'show']);

/////rrco
// Route::get('index/RRCO', [App\Http\Controllers\RrcoController::class,'index']);
// Route::get('index/RRCO', [App\Http\Controllers\RrcoController::class,'reports_date']);
// Route::get('report_results', [App\Http\Controllers\RrcoController::class,'report_results']);
// Route::get('PDF/RRCO', [App\Http\Controllers\RrcoController::class,'imprimir']);
// Route::get('export/RRCO', [App\Http\Controllers\RrcoController::class,'export']);
 Route::get('index/RRCO','RrcoController@reports_date')->name('reports.date');
// Route::get('index/RRCO','RrcoController@index')->name('index');
Route::get('sales/reports_date','RrcoController@report_results')->name('report.results');