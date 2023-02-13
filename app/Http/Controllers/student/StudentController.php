<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\StudentRepositoryInterface;


class StudentController extends Controller
{
    protected $student;

    public function __construct(StudentRepositoryInterface $student){

        $this->student = $student;
    }
    public function show(){

        return $this->student->showStudent();
    }
    public function create(){

        return $this->student->addStudent();
    }

    public function get_classrooms($id){

        return $this->student->get_classrooms($id);
    }

    public function get_Sections($id){
        return $this->student->get_Sections($id);
    }

    public function store(Request $request){

        return $this->student->storeStudent($request);
    }
    public function edit($id){
        return $this->student->editStudent($id);
    }
    public function update(Request $request){
       //dd($request->all());
       return $this->student->updateStudent($request);
    }

    public function showInf($id){
        //dd($request->all());
        return $this->student->showStudentInf($id);
     }

    public function delete(Request $request){
        //dd($request->all());
        return $this->student->deleteStudent($request);
     }
     public function attachment_upload(Request $request){
        //dd($request->all());
        return $this->student->attachment_upload($request);
     }

     public function Download_attachment($studentName,$fileName){
       // dd($studentName);
        return $this->student->Download_attachment($studentName,$fileName);
     }
     public function Delete_attachment(Request $request){
        // dd($studentName);
         return $this->student->Delete_attachment( $request);
      }
}
