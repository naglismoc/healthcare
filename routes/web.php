<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicController;
use App\Http\Controllers\HealthController;
use App\Http\Controllers\CeoController;
use App\Models\User;
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
})->name('home');
Route::get('/asktoverify', function () {
    return view('doctor.asktoverify');
})->name('asktoverify');


Route::get('/hospitals',[UserController::class,'hospitals'])->name('hospitals');
Route::get('/index',[UserController::class,'index'])->name('admin.index');


Route::group(['prefix'=>'patient'],function(){

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/info/{User}',[PatientController::class,'index'])->name('patient.index');//suziureti sita su health

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/create',[PatientController::class,'create'])->name('patient.create');//

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/store',[PatientController::class,'store'])->name('patient.store');//

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/edit/{User}',[PatientController::class,'edit'])->name('patient.edit');//kursime veliau

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/update/{User}',[PatientController::class,'update'])->name('patient.update');//kursime veliau

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/destroy/{User}',[PatientController::class,'destroy'])->name('patient.destroy');//kursime veliau
});



Route::group(['prefix'=>'medic'],function(){
    // Route::middleware(['auth:sanctum', 'verified'])->
    // get('/',[UserController::class,'index'])->name('ceo.index');

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/',[MedicController::class,'index'])->name('medic.index');
    
    Route::middleware(['auth:sanctum', 'verified'])->
    post('/verify',[MedicController::class,'verify'])->name('medic.verify');


    // Route::middleware(['auth:sanctum', 'verified'])->
    // get('/edit/{ceo}',[UserController::class,'edit'])->name('ceo.edit');

    // Route::middleware(['auth:sanctum', 'verified'])->
    // post('/update/{ceo}',[UserController::class,'update'])->name('ceo.update');

    // Route::middleware(['auth:sanctum', 'verified'])->
    // post('/destroy/{ceo}',[UserController::class,'destroy'])->name('ceo.destroy');
});


Route::group(['prefix'=>'ceo'],function(){
    
    Route::middleware(['auth:sanctum', 'verified'])->
    get('/',[CeoController::class,'index'])->name('ceo.index');//

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/create',[CeoController::class,'create'])->name('ceo.create');
    
    Route::middleware(['auth:sanctum', 'verified'])->
    get('/inactivedoctors',[CeoController::class,'inactivedoctors'])->name('ceo.inactivedoctors');

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/store',[CeoController::class,'store'])->name('ceo.store');

    // Route::middleware(['auth:sanctum', 'verified'])->
    // get('/edit/{ceo}',[UserController::class,'edit'])->name('ceo.edit');

    // Route::middleware(['auth:sanctum', 'verified'])->
    // post('/update/{ceo}',[UserController::class,'update'])->name('ceo.update');

    // Route::middleware(['auth:sanctum', 'verified'])->
    // post('/destroy/{ceo}',[UserController::class,'destroy'])->name('ceo.destroy');
});

Route::group(['prefix'=>'health'],function(){

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/info/{User}',[HealthController::class,'index'])->name('health.index');//

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/create/{User}',[HealthController::class,'create'])->name('health.create');//

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/store{User}',[HealthController::class,'store'])->name('health.store');//

    Route::middleware(['auth:sanctum', 'verified'])->
    get('/edit/{health}',[HealthController::class,'edit'])->name('health.edit');//kursime veliau

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/update/{health}',[HealthController::class,'update'])->name('health.update');//kursime veliau

    Route::middleware(['auth:sanctum', 'verified'])->
    post('/destroy/{health}',[HealthController::class,'destroy'])->name('health.destroy');//kursime veliau
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {return view('dashboard');})->name('dashboard');