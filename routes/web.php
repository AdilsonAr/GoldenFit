<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SupplierController;

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
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('generateSummary/{id}', [PDFController::class, 'generateSummary']);

    Route::resource('api/supplier', SupplierController::class);
    Route::resource('api/document', DocumentController::class);
    Route::resource('api/bank', BankController::class);

   
    Route::get('/suppliers', function () {
        return view('supplier.index');
    });

    Route::get('/documents', function () {
        return view('document.index');
    });

    Route::get('/banks', function () {
        return view('bank.index');
    });

    Route::get('/reports', function () {
        return view('reports');
    });

    Route::get('/summary', function () {
        return view('summary.index');
    });

    
    Route::post('saveinformation', 'App\Http\Controllers\ClienteController@saveinformation');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['reset'=>false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/send-email-pdf', [App\Http\Controllers\SendEmailController::class, 'index']);
