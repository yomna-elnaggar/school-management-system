<?php

namespace App\Http\Controllers\grade;

use Exception;
use App\Models\Grade;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassroomController extends Controller
{
    public function index(){
        
       $data['classrooms'] = Classroom::all();
        $data['grades'] = Grade::select('id','name')->get();
       return view('padges.classroom.index')->with($data);
    }

    public function store(Request $request){

      // dd($request->List_Classes);

      $request->validate([
        'List_Classes.*.name_ar'=>'required|max:255',
        'List_Classes.*.name_en'=>'required|max:255',
        'List_Classes.*.grade_id'=>'required|exists:grades,id'
    ]);
        $listClasses=$request->List_Classes;

        try {
            
            foreach($listClasses as $listClasse){

                Classroom::create([
                    'name'=>[
                        'en'=>$listClasse['name_en'],
                        'ar'=>$listClasse['name_ar'],
                    ],
                    'grade_id'=>$listClasse['grade_id'],
                ]);
            }
            toastr()->success(trans('message.success'));

            return back();
        } 
        catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }

    public function update(Request $request){
        //dd($request->all());

            $request->validate([
                'name_ar'=>'required|max:50',
                'name_en'=>'required|max:50',
                'grade_id'=>'required|exists:grades,id',
            ]);

            try {

                $classroom =Classroom::findOrFail($request->id);
                $classroom->update([
                    'name'=>([
                        'en'=>$request->name_en,
                        'ar'=>$request->name_ar,
                    ]),

                    'grade_id'=>$request->grade_id,
                ]);
                toastr()->success(trans('message.edit'));

                return back();
            }
            catch (Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        
    }
    
    public function delete(Request $request){

 

       Classroom::findOrFail($request->id)->delete();
        toastr()->error(trans('message.delete'));

        return back();



    }

public function delete_all(Request $request){

    //dd($request->all());

    $idArray= explode(',',$request->delete_all_id);
    //dd($idArray);
    Classroom::whereIn('id',$idArray)->delete();
     toastr()->error(trans('message.delete'));

     return back();



    }


    public function filter(Request $request){

       //dd($request->all());
       $data['classrooms'] = Classroom::all();
        $data['grades']= Grade::all();
       $filter =Classroom::select('*')->where('grade_id',$request->Grade_id)->get();

       return view('padges.classroom.index',$data)->withDetails($filter);

    }
}

