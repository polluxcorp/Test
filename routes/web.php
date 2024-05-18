<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\PartNumberController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\LaserController;
use App\Http\Controllers\WeldController;
use App\Http\Controllers\ClientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*

Route::get('/quotation', function () {
    return view(('quotation.index'));
});
*/
//Route::get('/quotation/create', [QuotationController::class, 'create']);



//eliminar funcion ->middleware('auth') para quitar verificación de login
Route::resource('quotation', QuotationController::class);
Route::get('quotation/{quotation}/processes', [QuotationController::class, 'editProcesses'])->name('quotation.processes');
Route::post('quotation/{quotation}/processes', [QuotationController::class, 'updateProcesses']);
Route::get('details/{quotation}/processes', [QuotationController::class, 'editDetailsProcesses'])->name('details.processes.edit');
Route::resource('partnumber', PartNumberController::class);
Route::resource('quotation.details', DetailsController::class);
Route::post('quotation/{quotation}/details/calculate', [DetailsController::class, 'calculate']);
Route::post('quotation/{quotation}/details/{detail}/calculate', [DetailsController::class, 'calculate']);
Route::post('quotation/{quotation}/details/{details}', [DetailsController::class, 'update'])->name('quotation.details.update');

Route::resource('details', DetailsController::class);
//Route::resource('process', ProcessController::class)->middleware('auth');
Route::get('processes', [ProcessController::class, 'edit'])->name('processes');
Route::post('processes', [ProcessController::class, 'update']);
Route::resource('laser', LaserController::class);
Route::resource('weld', WeldController::class);
Route::resource('client', ClientController::class);
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/', [QuotationController::class, 'index'])->name('quotation.index');


//Auth::routes(['register'=>false, 'reset'=>false]);
Auth::routes();

//Route::get('/home', [QuotationController::class, 'index'])->name('home');
//Route::group(['middleware'=>'auth'], function (){Route::get('/', [QuotationController::class, 'index'])->name('home');});
