<?php
namespace App\Repository;
use App\Models\Grade;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Student;
use App\Models\MyParent;
use App\Models\Classroom;
use App\Models\TypeBlood;
use App\Models\Nationalitie;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface{

    public function showStudent(){
        $data['students']=Student::all();
         
        return view('padges.Students.index',$data);
    }

    public function addStudent(){

        $data['my_classes']=Grade::all();
        $data['bloods']=TypeBlood::all();
        $data['Genders']=Gender::all();
        $data['parents']=MyParent::all();
        $data['nationals']=Nationalitie::all();

        return view('padges.Students.addStuden',$data);
    }
    public function get_classrooms($id){
        $list_classes= Classroom::where('grade_id',$id)->pluck('name','id');

        return $list_classes;
        
    }

    public function get_Sections($id){
        $list_classes= Section::where('classroom_id',$id)->pluck('name','id');

        return $list_classes;
        
    }

    public function storeStudent($request){

        $request->validate([
            'email'=>'required|email|unique:students',
            'password'=>'required|max:50',   
            'name_ar'=>'required|max:255',
            'name_en'=>'required|max:255',
            'gender_id'=>'required',
            'nationalitie_id'=>'required',
            "blood_id" => "required",
            "Date_Birth" => "required",
            "Grade_id" => "required",
            "Classroom_id" => "required",
            "section_id" => "required",
            "parent_id" => "required",
            "academic_year" => "required",
        ]);
        
        
        DB::beginTransaction();

        try {
            $students = new Student();
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();

            // insert img
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$students->name, $file->getClientOriginalName(),'upload_attachments');

                    // insert in image_table
                    $images= new Image();
                    $images->fileName=$name;
                    $images->imageable_id= $students->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
            DB::commit(); // insert data
            toastr()->success(trans('messages.success'));
            return redirect(url('dashboard/students'));

        }

        catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
    public function editStudent($id){
        $data['Grades']=Grade::all();
        $data['bloods']=TypeBlood::all();
        $data['Genders']=Gender::all();
        $data['parents']=MyParent::all();
        $data['nationals']=Nationalitie::all();
        $data['student']=Student::findOrFail($id);
        return view('padges.Students.edit',$data);
    }

    public function updateStudent($request){

        $request->validate([
            'name_ar' => 'required|max:50',
            'name_en' =>'required|max:50',
            'email' =>'required|email|unique:students,email,'.$request->id,
            'password' => 'required|max:50',
            'gender_id' => 'required',
            'nationalitie_id' => 'required',
            'blood_id' => 'required' ,
            'Date_Birth' => 'required',
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
            'section_id' => 'required',
            'parent_id' => 'required',
            'academic_year' =>'required',
        ]);
        try{
            $student =Student::findOrFail($request->id);
            $student->update([
                'name'=>[
                    'en'=>$request->name_en,
                    'ar'=>$request->name_ar,
                ],
                'password'=> $request->password,
                'email'=> $request->email,
                "gender_id" =>$request->gender_id,
                "nationalitie_id" => $request->nationalitie_id,
                "blood_id" => $request->blood_id,
                "Date_Birth" => $request->Date_Birth,
                "Grade_id" => $request->Grade_id,
                "Classroom_id" => $request->Classroom_id,
                "section_id" => $request->section_id,
                "parent_id" => $request->parent_id,
                "academic_year" =>$request->academic_year,
                ]);

               
            toastr()->success(trans('message.success'));

            return redirect(url('dashboard/students'));
        
        }

        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);


        }
    }
    public function showStudentInf($id){
        $data['Student'] =Student::findOrFail($id);
        return view('padges.Students.show',$data);
       // dd($student);
    }

    public function deleteStudent($request){
        
        Student::where('id', $request->id)->forceDelete();
        toastr()->error(trans('message.delete'));
        return back();
    }

   public function attachment_upload($request){


    //dd($request->all());
    foreach($request->file('photos') as $file)
    {
        $name = $file->getClientOriginalName();
        $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');

        // insert in image_table
        $images= new Image();
        $images->fileName=$name;
        $images->imageable_id= $request->student_id;
        $images->imageable_type = 'App\Models\Student';
        $images->save();

        return back();
    }
   }
   public function Download_attachment($studentName,$fileName){
      return response()->download(public_path('attachments/students/'.$studentName.'/'.$fileName));
   }
   public function  Delete_attachment($request){

    // Delete img in server disk
    Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

    // Delete in data
    image::where('id',$request->id)->where('fileName',$request->filename)->delete();
    toastr()->error(trans('messages.Delete'));
    return back();

   }

}