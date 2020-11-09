<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('home');
});
Route::get('/labas', function () {
    ' <option value="opel">Opel</option>
    <option value="audi">Audi</option>';
})->name('labas');

// Route::get('/user/create',[UserController::class,'create'])->name('user.create');
Route::get('/hospitals',[UserController::class,'hospitals'])->name('hospitals');

Route::group(['prefix'=>'patient'],function(){
    Route::get('/test',[UserController::class,'test'])->name('patient.test');


    Route::middleware(['auth:sanctum', 'verified'])->
    get('/',[UserController::class,'index'])->name('patient.index');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/create',[UserController::class,'create'])->name('patient.create');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/store',[UserController::class,'store'])->name('patient.store');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/edit/{patient}',[UserController::class,'edit'])->name('patient.edit');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/update/{patient}',[UserController::class,'update'])->name('patient.update');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/destroy/{patient}',[UserController::class,'destroy'])->name('patient.destroy');
});

Route::group(['prefix'=>'ceo'],function(){
    // Route::middleware(['auth:sanctum', 'verified'])->
    // get('/',[UserController::class,'index'])->name('ceo.index');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/create',[UserController::class,'createCEO'])->name('ceo.create');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/store',[UserController::class,'storeCEO'])->name('ceo.store');

    // Route::middleware(['auth:sanctum', 'verified'])->
    // get('/edit/{ceo}',[UserController::class,'edit'])->name('ceo.edit');

    // Route::middleware(['auth:sanctum', 'verified'])->
    // post('/update/{ceo}',[UserController::class,'update'])->name('ceo.update');

    // Route::middleware(['auth:sanctum', 'verified'])->
    // post('/destroy/{ceo}',[UserController::class,'destroy'])->name('ceo.destroy');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {return view('dashboard');})->name('dashboard');