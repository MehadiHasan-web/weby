<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AttendanceReportController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CashboxController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamResultController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\PaymentReport;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPaymentController;
use App\Http\Controllers\TeacherAttendanceController;
use App\Http\Controllers\TeacherAttendReportController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherPaymentController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\WhatsappController;
use App\Livewire\BatchShowStudents;
use App\Livewire\Students;
use App\Livewire\StudentTeacherRemove;
use App\Models\admin\StudentPayment;
use Illuminate\Support\Facades\Route;
use Livewire\Mechanisms\HandleComponents\ViewContext;
use App\Test\TestLogic;
use Livewire\Livewire;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/notice', [ViewController::class, 'notice_box'])->name('notice');


Route::group(['middleware' => ['role:admin|moderator'], 'prefix' => 'dashboard'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/institute-approval/{id}', [InstituteController::class, 'approved'])->name('institute.approval');
    Route::get('/institute-pending/{id}', [InstituteController::class, 'pending'])->name('institute.pending');
    Route::resource('/institute', InstituteController::class);
    Route::post('/add-students/{batch}', [BatchController::class, 'add_students'])->name('batch.add.student');
    Route::resource('/batch', BatchController::class);
    Route::resource('/teacher', TeacherController::class);
    Route::resource('/exam', ExamController::class);
    Route::get('/absent/{user}/{exam}', [ExamResultController::class, 'absent'])->name('result.absent');
    Route::resource('/result', ExamResultController::class)->only('store', 'edit');

    // student attendance
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance');
    Route::get('/attendance/index/{batch}', [AttendanceController::class, 'create'])->name('attendance.index');
    // attendance report
    Route::get('/attendance-report', [AttendanceReportController::class, 'index'])->name('attendance.report');
    // teacher attendance
    Route::get('/teacher-attendance', [TeacherAttendanceController::class, 'index'])->name('teacher.attendance');
    Route::post('/attendance/present/{teacherId}', [TeacherAttendanceController::class, 'present'])->name('teacher.present');
    Route::post('/attendance/late_present/{teacherId}', [TeacherAttendanceController::class, 'late_present'])->name('teacher.late_present');
    Route::get('/attendance/absent/{teacherId}', [TeacherAttendanceController::class, 'absent'])->name('teacher.absent');
    // teacher attendance report
    Route::get('/teacher-attendance-report', [TeacherAttendReportController::class, 'index'])->name('teacher.report');

    // student payment
    Route::get('/student-payment', [StudentPaymentController::class, 'index'])->name('student.payment.index');
    Route::post('/student-payment/{student_id}', [StudentPaymentController::class, 'payment'])->name('student.payment');
    Route::get('/student-waiver', [StudentPaymentController::class, 'waiver'])->name('student.waiver');
    // teacher payment
    Route::get('/teacher-payment', [TeacherPaymentController::class, 'index'])->name('teacher.payment');
    Route::post('/teacher-payment/{teacher_id}', [TeacherPaymentController::class, 'payment'])->name('teacher.payment.paid');
    // student
    Route::get('/student-attendance/{student}', [StudentController::class, 'attendance'])->name('student.attendance');
    Route::resource('/student', StudentController::class);
    // report
    Route::get('/student-report/{id}', [PaymentReport::class, 'student'])->name('student.payment.report');
    Route::get('/teacher-report/{id}', [PaymentReport::class, 'teacher'])->name('teacher.payment.report');
    // cashbox
    Route::post('/cash-income', [CashboxController::class, 'create'])->name('cash.income');
    Route::post('/cash-expense', [CashboxController::class, 'expense'])->name('cash.expense');
    Route::get('/financial/{month}', [DashboardController::class, 'month_report'])->name('financial.month.report');


    // batch student remove
    Route::get('/batch-student-remove', [StudentTeacherRemove::class, 'student_remove'])->name('batch.student.remove');
    Route::get('/batch-teacher-remove', [StudentTeacherRemove::class, 'teacher_remove'])->name('batch.teacher.remove');
    // change password
    Route::post('/change-password', [AdminController::class, 'change_password'])->name('change.password');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
