<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::get('contact', function () {
    return view('contact_form');
});

use App\Http\Controllers\StudentController;
Route::get('/student',[StudentController::class,'index']);
Route::post('/student',[StudentController::class,'store']);
// Route::get('/student/create', [StudentController::class, 'create']);
// Route::get('/student/{id}/edit', [StudentController::class, 'edit']);
Route::put('/student/{id}', [StudentController::class,'update']);
// Route::delete('/student/{id}', [StudentController::class,'destroy']);
Route::get('/student/tabungan/{norek}', [StudentController::class, 'tabungan']);
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::get('/student/tabungan', [StudentController::class, 'tabungan'])->name('student.tabungan');
Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');

Route::get('/students', [StudentController::class, 'index'])->name('student.index');

Route::get('/student/tabungan', [StudentController::class, 'tabungan'])->name('student.tabungan');
Route::get('/student/tabungan/search', [StudentController::class, 'searchByNorek'])->name('student.search.tabungan');

Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');


Route::get('send-message', function(){
    $response = Http::withHeaders([
        'Authorization' => '2K6#zpbi7xB6-7crepXt'
    ])->asForm()->post('https://api.fonnte.com/send', [
       'target' => '6281287164881',
        'message' => 'Hallo ini test message',
        'verify' => false]);

    return $response;
});