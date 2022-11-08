<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactController;

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
    return view('contacts');
});

Route::get('/getcontacts',[contactController::class,'index']);

Route::view('/form','form');

Route::post('/inputdata', [contactController::class, 'input']);

Route::get('/deletetabledata', [contactController::class, 'destroy']);

Route::get('/update/{id}', [contactController::class, 'update']);

Route::put('/updatedata/{id}', [contactController::class, 'updateData'])->name('updatedata');

Route::get('/exportcsv', [contactController::class, 'exportCSV'])->name('exportcsv');

