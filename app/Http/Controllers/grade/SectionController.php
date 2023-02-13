<?php

namespace App\Http\Controllers\grade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Teachers;

class SectionController extends Controller
{
    public function index(){
        
//هترجعها بكل السكشن اللي تحتها
        $data['Grades']=Grade::with(['sections'])->get();
        //dd($grade);
       $data['list_Grades']=Grade::all();
       $data['teachers']=Teachers::all();
      // dd($data['teachers']);
        return view('padges.section.index')->with($data);
    }

    public function getClass($id){

       $list_classes= Classroom::where('grade_id',$id)->pluck('name','id');

       return $list_classes;
    

    }

    public function store(Request $request){

        try{
      $data= $request->validate([
        'name_ar' => 'required|max:255',
        'name_en' => 'required|max:255',
        'Grade_id' => 'required',
        'Class_id' => 'required',
      ]);
      $section=new Section();
      $section->name=[
            'en'=>$request->name_en,
            'ar'=>$request->name_ar,
      ];
        $section->status=1;
        $section-> grade_id= $request->Grade_id;
        $section->classroom_id=$request->Class_id;
        $section->save();
      
       $section->teachers()->attach($request->teacher_id);
     
        toastr()->success(trans('message.success'));
      return back();
     }

     catch(Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);


    }

    }

    public function update(Request $request){
        
        //dd($request->all());

        $request->validate([
            'name_ar'=>'required|max:50',
            'name_en'=>'required|max:50',
            'Grade_id'=>'required|exists:grades,id',
            'Class_id'=>'required',
        ]);

      

        try {

            $Sections = Section::findOrFail($request->id);

            $Sections->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $Sections->grade_id = $request->Grade_id;
            $Sections->classroom_id= $request->Class_id;
      
            if(isset($request->status)) {
              $Sections->status = 1;
            } else {
              $Sections->status = 2;
            }
      
      
             // update pivot tABLE
              if (isset($request->teacher_id)) {
                  $Sections->teachers()->sync($request->teacher_id);
              } else {
                  $Sections->teachers()->sync(array());
              }
      
      
            $Sections->save();
           
                
            toastr()->success(trans('message.edit'));

            return back();
        }
        catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete(Request $request){
        
       // dd($request->all());

       
       Section::findOrFail($request->id)->delete();
        toastr()->error(trans('message.delete'));

        return back();
    }
}
