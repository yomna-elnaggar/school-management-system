<?php
namespace App\Repository;
use App\Models\Teachers;
use App\Models\Specializations;
use App\Models\Gender;

class TeacherRepository implements TeacherRepositoryInterface{

    public function getAllTeachers(){

         return Teachers::all();
    }

    public function getGenders(){

        return  Gender::all();
        
    }

    public function getSpecializations(){

        return Specializations::all();

    }

    public function store($request){


        if(Teachers::where('email',$request->Email)->exists()){
            return redirect()->back()->withErrors([trans('grades.exists')]);

        }
        $request->validate([
            'Email'=>'required',
            'Password'=>'required|max:50',
            'Name_ar'=>'required|max:50',
            'Name_en'=>'required|max:50',
            'Specialization_id'=>'required',
            'Gender_id'=>'required|max:50',
            'Joining_Date'=>'required',
            
        ]);
        
        
        try{
           Teachers::create([
                'name'=>[
                    'en'=>$request->Name_en,
                    'ar'=>$request->Name_ar,
                ],
                'password'=> $request->Password,
                'email'=> $request->Email,
                'specialization_id'=> $request->Specialization_id,
                'gender_id'=> $request->Gender_id,
                'joining_date'=> $request->Joining_Date,
                'address'=> $request->Address,
                ]);

               
            toastr()->success(trans('message.success'));

            return redirect(url('dashboard/teachers'));
        
        }

        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);


        }

    }

    public function edit($id){

        return  Teachers::findOrFail($id);
       
        
    }

    public function update($request){

        $request->validate([
            'Email'=>'required',
            'Password'=>'required|max:50',
            'Name_ar'=>'required|max:50',
            'Name_en'=>'required|max:50',
            'Specialization_id'=>'required',
            'Gender_id'=>'required|max:50',
            'Joining_Date'=>'required',
            
        ]);
        
        
        try{
            $teacher =Teachers::findOrFail($request->id);
            $teacher->update([
                'name'=>[
                    'en'=>$request->Name_en,
                    'ar'=>$request->Name_ar,
                ],
                'password'=> $request->Password,
                'email'=> $request->Email,
                'specialization_id'=> $request->Specialization_id,
                'gender_id'=> $request->Gender_id,
                'joining_date'=> $request->Joining_Date,
                'address'=> $request->Address,
                ]);

               
            toastr()->success(trans('message.success'));

            return redirect(url('dashboard/teachers'));
        
        }

        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);


        }

    }

       
    public function delete($request){

        Teachers::findOrFail($request->id)->delete();
         toastr()->error(trans('message.delete'));
 
         return back();
 
 
 
     }
}