<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;

class TeacherController extends Controller
{
    protected $Teachers;

 
    public function __construct(TeacherRepositoryInterface $Teachers){

        $this->Teachers = $Teachers;
    }

    public function index(){

       $data['Teachers']= $this->Teachers->getAllTeachers();
        return view('padges.Teachers.teachers')->with($data);
    }

    public function create(){
      $data['genders']=  $this->Teachers->getGenders();
      $data['specializations']=  $this->Teachers->getSpecializations();
        return view('padges.Teachers.create')->with($data);
    }

    public function store(Request $request){
        return  $this->Teachers->store($request);

        
    }

    public function edit($id){

        $data['Teacher']= $this->Teachers->edit($id);
        $data['genders']=  $this->Teachers->getGenders();
        $data['specializations']=  $this->Teachers->getSpecializations();
        return view('padges.Teachers.edit')->with($data);
    }

    public function update(Request $request){
        return  $this->Teachers->update($request);
    }

    public function delete(Request $request){
        return  $this->Teachers->delete($request);
    }
}
