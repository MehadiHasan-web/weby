<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceReportController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeacherAttendanceController;
use App\Http\Controllers\TeacherAttendReportController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ViewController;
use App\Livewire\Students;
use Illuminate\Support\Facades\Route;
use Livewire\Mechanisms\HandleComponents\ViewContext;
use App\Test\TestLogic;

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
    Route::get('/student-profile/{user}', [ViewController::class, 'student_profile'])->name('student.profile');
    Route::post('/add-students/{batch}',[BatchController::class, 'add_students'] )->name('batch.add.student');
    Route::resource('/batch', BatchController::class);
    Route::resource('/teacher', TeacherController::class);
    Route::resource('/exam', ExamController::class);
    Route::get('/absent/{user}/{exam}', [ExamResultController::class, 'absent'])->name('result.absent');
    Route::resource('/result', ExamResultController::class)->only('store','edit');

    // student attendance
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance');
    Route::get('/attendance/index/{batch}', [AttendanceController::class, 'create'])->name('attendance.index');
    Route::get('/attendance/present/{userId}/{batchId}', [AttendanceController::class, 'present'])->name('attendance.present');
    Route::get('/attendance/late_present/{userId}/{batchId}', [AttendanceController::class, 'late_present'])->name('attendance.late_present');
    Route::get('/attendance/absent/{userId}/{batchId}', [AttendanceController::class, 'absent'])->name('attendance.absent');
    Route::get('/attendance-report', [AttendanceReportController::class, 'index'])->name('attendance.report');
    // teacher attendance
    Route::get('/teacher-attendance', [TeacherAttendanceController::class, 'index'])->name('teacher.attendance');
    Route::get('/attendance/present/{teacherId}', [TeacherAttendanceController::class, 'present'])->name('teacher.present');
    Route::get('/attendance/late_present/{teacherId}', [TeacherAttendanceController::class, 'late_present'])->name('teacher.late_present');
    Route::get('/attendance/absent/{teacherId}', [TeacherAttendanceController::class, 'absent'])->name('teacher.absent');
    Route::get('/teacher-attendance-report', [TeacherAttendReportController::class, 'index'])->name('teacher.report');

});
Route::get('/test', function(){
    $product= new TestLogic;
    return $product->getName();
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
