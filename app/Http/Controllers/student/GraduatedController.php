<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Student;

class GraduatedController extends Controller
{
    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('padges.Students.Graduated.index',compact('students'));
    }
    public function create()
    {
        $Grades = Grade::all();
        return view('padges.Students.Graduated.create',compact('Grades'));
    }

    public function SoftDelete(Request $request)
    {
        $students = Student::where('Grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();

        if($students->count() < 1){
            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }

        foreach ($students as $student){
            $ids = explode(',',$student->id);
            Student::whereIn('id', $ids)->Delete();
        }

        toastr()->success(trans('messages.success'));
        return redirect(url('padges.Students.Graduated.index'));
    }
    
    public function ReturnData(Request $request)
    {
        Student::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        Student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->error(trans('messages.delete'));
        return redirect()->back();
    }
}
