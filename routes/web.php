<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ViewController;
use App\Livewire\Students;
use Illuminate\Support\Facades\Route;
use Livewire\Mechanisms\HandleComponents\ViewContext;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/dashboard', function () {
//     return view('Admin.Master.master');
// })->middleware(['auth', 'verified'])->name('dashboard');
// Route::group(['middleware' => ['role:admin|moderator'], 'prefix' => 'dashboard'],
Route::group(['middleware' => ['role:admin|moderator'], 'prefix' => 'dashboard'],function(){

    Route::get('/', function () {
        return view('admin.modules.dashboard');
    })->name('dashboard');

    Route::get('/institute-approval/{id}', [InstituteController::class, 'approved'])->name('institute.approval');
    Route::get('/institute-pending/{id}', [InstituteController::class, 'pending'])->name('institute.pending');
    Route::resource('/institute', InstituteController::class);
    Route::get('/students', [ViewController::class, 'students'] )->name('students.index');
    Route::resource('/batch', BatchController::class);
    Route::resource('/teacher', TeacherController::class);


});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
