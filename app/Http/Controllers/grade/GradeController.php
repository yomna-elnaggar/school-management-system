<?php

namespace App\Http\Controllers\grade;

use Exception;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoretRequest;

class GradeController extends Controller
{
    public function index(){

        $data['Grades']= Grade::select('*')->get();
        return view('padges.grades.index')->with($data);
    }

    public function store(Request $request){

        if(Grade::where('name->en',$request->name_en)->orWhere('name->ar',$request->name_ar)->exists()){
            return redirect()->back()->withErrors([trans('grades.exists')]);

        }

        try{

            $request->validate([
                'name_ar'=>'required|max:50',
                'name_en'=>'required|max:50'
            ]);
    
            Grade::create([
                'name'=>[
                    'en'=>$request->name_en,
                    'ar'=>$request->name_ar,
                ],
                'notes'=> $request->notes,
                ]);
            toastr()->success(trans('message.success'));

            return back();
        
        }

        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);


        }

    }

    public function update(Request $request){

       

        
        if(Grade::where('name->en',$request->name_en)->orWhere('name->ar',$request->name_ar)->exists()){
            return redirect()->back()->withErrors([trans('grades.exists')]);

        }

   
        try{

            $request->validate([
                'name_ar'=>'required|max:50',
                'name_en'=>'required|max:50',
                'id'=>'required'
            ]);
            
            $grad = Grade::findOrFail($request->id);

           $grad->update([
                'name'=>[
                    'en'=>$request->name_en,
                    'ar'=>$request->name_ar,
                ],
                'notes'=> $request->notes,
                ]);
                
            toastr()->success(trans('message.edit'));

            return back();
        }
        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);


        }

    }

    public function delete(Request $request){

        try {
            Grade::findOrFail($request->id)->delete();
        toastr()->error(trans('message.delete'));

        return back();
        }
         catch (Exception $e) {
            toastr()->error(trans('message.delete gradWithRow'));
            return back();
        }

        

    }
}
