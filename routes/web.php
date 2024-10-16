<?php
use App\Http\Controllers\BimarTrainingYearController;
use App\Http\Controllers\BimarTrainingProgramController;
use App\Http\Controllers\BimarTrainingTypeController;
use App\Http\Controllers\BimarTrainingCourseController;
use App\Http\Controllers\BimarCourseEnrollmentController;


use App\Http\Controllers\BimarRolesController;
use App\Http\Controllers\BimarUserAcademicDegreeController;
use App\Http\Controllers\BimarUserGenderController;
use App\Http\Controllers\BimarUsersStatusController;


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// // Admin Routes
// Route::middleware(['auth', 'verified', 'administrator:administrator'])-> prefix('admin')->group(function () {
// });


Route::view('/', 'admin.home')->name('home');
Route::view('/form', 'admin.form')->name('form');
Route::view('/table', 'admin.table')->name('table');

Route::view('/tt', 'admin.tt')->name('tt');

// Route::view('/year', 'admin.year')->name('year');
// Route::view('/programs', 'admin.programs')->name('programs');
Route::get('/programs',[BimarTrainingProgramController::class,'index'])-> name('programs');
// Route::view('/courses', 'admin.courses')->name('courses');
Route::get('/courses',[BimarTrainingCourseController::class,'index'])-> name('courses');
// Route::view('/training_type', 'admin.training_type')->name('training_type');
Route::get('/training_type',[BimarTrainingTypeController::class,'index'])-> name('training_type');
// Route::view('/course_enrollments', 'admin.course_enrollments')->name('course_enrollments');
Route::get('/course_enrollments',[BimarCourseEnrollmentController::class,'index'])-> name('course_enrollments');

Route::get('/year',[BimarTrainingYearController::class,'index'])-> name('year');
Route::prefix('year')->controller(BimarTrainingYearController::class)->group(function(){
    Route::get('/create', 'create');
    Route::post('/store', 'store');
});
Route::prefix('course')->controller(BimarTrainingCourseController::class)->group(function(){

    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
});
Route::prefix('course_enrollments')->controller(BimarCourseEnrollmentController::class)->group(function(){
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
});
Route::prefix('type')->controller(BimarTrainingTypeController::class)->group(function(){
    Route::get('/create', 'create');
    Route::post('/store', 'store');
});
Route::prefix('program')->controller(BimarTrainingProgramController::class)->group(function(){
    Route::get('/create', 'create');
    Route::post('/store', 'store');
});

//new routes
Route::prefix('status')->controller(BimarUsersStatusController::class)->group(function(){
    Route::get('/index','index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::get('updateSwitch/{id}','updateSwitch');
});
Route::prefix('gender')->controller(BimarUserGenderController::class)->group(function(){
    Route::get('/index','index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::get('updateSwitch/{id}','updateSwitch');
});
Route::prefix('role')->controller(BimarRolesController::class)->group(function(){
    Route::get('/index','index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::get('updateSwitch/{id}','updateSwitch');
});
Route::prefix('grade')->controller(BimarUserAcademicDegreeController::class)->group(function(){
    Route::get('/index','index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::get('updateSwitch/{id}','updateSwitch');
});


Route::get('getcourse', [BimarCourseEnrollmentController::class, 'getcourse'])->name('getcourse');

Route::post('/update-switch/{id}', [BimarTrainingYearController::class, 'updateSwitchStatus']);
// Route::get('/getYearData/{id}', [YourController::class, 'getYearData']);
Route::prefix('role')->controller(BimarRolesController::class)->group(function(){

    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
});
// Route::get('/years/edit/{tr_year_id}', [BimarTrainingYearController::class, 'edit'])->name('years.edit');
// Route::put('/years/update/{tr_year_id}', [BimarTrainingYearController::class, 'update'])->name('years.update');
Route::get('/years/edit/{id}', [BimarTrainingYearController::class, 'edit'])->name('years.edit');
Route::put('/years/update/{id}', [BimarTrainingYearController::class, 'update'])->name('years.update');
Route::get('/program/edit/{id}', [BimarTrainingProgramController::class, 'edit'])->name('program.edit');
Route::POST('/program/update/{id}', [BimarTrainingProgramController::class, 'update'])->name('program.update');
Route::get('type/{id}', [BimarTrainingTypeController::class, 'updateSwitch']);
Route::get('year/{id}', [BimarTrainingYearController::class, 'updateSwitch']);
Route::get('program/{id}', [BimarTrainingProgramController::class, 'updateSwitch']);
Route::get('/type/edit/{id}', [BimarTrainingTypeController::class, 'edit'])->name('type.edit');
Route::put('/type/update/{id}', [BimarTrainingTypeController::class, 'update'])->name('type.update');
Route::get('course/{id}', [BimarTrainingCourseController::class, 'updatSwitch']);
Route::get('course_enrollments/{id}', [BimarCourseEnrollmentController::class, 'updatSwitch']);
Route::get('course_enrollments/show/{id}', [BimarCourseEnrollmentController::class, 'show']);
// Route::get('/course/edit/{tr_course_id}', [BimarTrainingCourseController::class, 'edit'])->name('course.edit');
// Route::post('/course/update/{tr_course_id}', [BimarTrainingCourseController::class, 'update'])->name('course.update');

require __DIR__.'/auth.php';
