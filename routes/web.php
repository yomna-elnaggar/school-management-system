<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;
use App\Http\Controllers\grade\GradeController;
use App\Http\Controllers\grade\SectionController;
use App\Http\Controllers\parent\ParentController;
use App\Http\Controllers\grade\ClassroomController;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\teacher\TeacherController;
use App\Http\Controllers\student\PromotionStudent;
use App\Http\Controllers\student\GraduatedController;
use App\Http\Controllers\student\FeesController;
use App\Http\Controllers\student\FeesInvoicesController;
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
Route::middleware('lang')->group(function(){
    Route::get('/', function () { 
        return view('empty');
    });

Route::get('dashboard', function () { 
    return view('dashboard');
})->middleware(['auth']);

Route::get('dashboard/grades', [GradeController::class,'index']);
Route::post('dashboard/grades/store', [GradeController::class,'store']);
Route::post('dashboard/grades/update', [GradeController::class,'update']);
Route::post('dashboard/grades/delete', [GradeController::class,'delete']);

Route::get('dashboard/classroom', [ClassroomController::class,'index']);
Route::post('dashboard/classroom/store', [ClassroomController::class,'store']);
Route::post('dashboard/classroom/update', [ClassroomController::class,'update']);
Route::post('dashboard/classroom/delete', [ClassroomController::class,'delete']);
Route::post('dashboard/classroom/delete-all', [ClassroomController::class,'delete_all']);
Route::post('dashboard/classroom/filter', [ClassroomController::class,'filter']);


Route::get('dashboard/section', [SectionController::class,'index']);
Route::get('classes/{id}', [SectionController::class,'getClass']);
Route::post('dashboard/section/store', [SectionController::class,'store']);
Route::post('dashboard/section/update', [SectionController::class,'update']);
Route::post('dashboard/section/delete', [SectionController::class,'delete']);

Route::get('dashboard/show-parent', [ParentController::class,'show']);
Route::get('dashboard/add-parent', [ParentController::class,'create']);
Route::post('dashboard/add-parent/store', [ParentController::class,'store']);
Route::get('dashboard/add-parent/{id}/edit', [ParentController::class,'edit']);
Route::post('dashboard/add-parent/update', [ParentController::class,'update']);
Route::post('dashboard/add-parent/delete', [ParentController::class,'delete']);

Route::get('dashboard/teachers', [TeacherController::class,'index']);
Route::get('dashboard/teachers/create', [TeacherController::class,'create']);
Route::post('dashboard/teachers/store', [TeacherController::class,'store']);
Route::get('dashboard/teachers/{id}/edit', [TeacherController::class,'edit']);
Route::post('dashboard/teachers/update', [TeacherController::class,'update']);
Route::post('dashboard/teachers/delete', [TeacherController::class,'delete']);

Route::get('dashboard/students', [StudentController::class,'show']);
Route::get('dashboard/students/create', [StudentController::class,'create']);
Route::get('Get_classrooms/{id}', [StudentController::class,'get_classrooms']);
Route::get('Get_Sections/{id}', [StudentController::class,'get_Sections']);
Route::post('dashboard/students/store', [StudentController::class,'store']);
Route::get('dashboard/students/{id}/edit', [StudentController::class,'edit']);
Route::post('dashboard/students/update', [StudentController::class,'update']);
Route::post('dashboard/students/delete', [StudentController::class,'delete']);
Route::get('dashboard/students/{id}/show', [StudentController::class,'showInf']);
Route::post('dashboard/students/attachment-upload', [StudentController::class,'attachment_upload']);
Route::get('Download_attachment/{studentName}/{fileName}', [StudentController::class,'Download_attachment']);
Route::post('Delete_attachment', [StudentController::class,'Delete_attachment']);

Route::get('dashboard/students/promotions', [PromotionStudent::class,'index']);
Route::post('dashboard/PromotionStudent/store', [PromotionStudent::class,'store']);
Route::get('dashboard/students/promotions_manage', [PromotionStudent::class,'showPromotion']);
Route::post('dashboard/students/promotions_destroy', [PromotionStudent::class,'promotionsDestroy']);

Route::get('students/graduation', [GraduatedController::class,'index']);
Route::get('students/graduation/create', [GraduatedController::class,'create']);
Route::post('students/graduation/SoftDelete', [GraduatedController::class,'SoftDelete']);
Route::post('students/graduation/ReturnData', [GraduatedController::class,'ReturnData']);
Route::post('students/graduation/destroy', [GraduatedController::class,'destroy']);

Route::get('students/Fees', [FeesController::class,'index']);
Route::get('students/Fees/create', [FeesController::class,'create']);
Route::post('students/Fees/store', [FeesController::class,'store']);
Route::get('students/Fees/{id}/edit', [FeesController::class,'edit']);
Route::post('students/Fees/update', [FeesController::class,'update']);
Route::post('students/Fees/destroy', [FeesController::class,'destroy']);


Route::get('students/Fees', [FeesInvoicesController::class,'index']);
Route::get('students/Fees/create', [FeesInvoicesController::class,'create']);
Route::post('students/Fees/store', [FeesInvoicesController::class,'store']);
Route::get('students/Fees/{id}/edit', [FeesInvoicesController::class,'edit']);
Route::post('students/Fees/update', [FeesInvoicesController::class,'update']);
Route::post('students/Fees/destroy', [FeesInvoicesController::class,'destroy']);
});
 

Route::get('lang/set/{lang}', [LangController::class,'setLang']);


Route::get('test', function(){
  return view('test');

});



