<?php

namespace App\Http\Controllers\parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\TypeBlood;
use App\Models\MyParent;

class ParentController extends Controller
{
    
    public function show(){
        $data['myparents']=MyParent::all();
        
        return view('padges.parents.showParent')->with($data);
    }

    public function create(){
        $data['Nationalities']=Nationalitie::all();
        $data['Type_Bloods']=TypeBlood::all();
        $data['Religions']=Religion::all();
        
        return view('padges.parents.showForm')->with($data);
    }
    
    public function store(Request $request){
        //dd($request->all());

        $request->validate([
            "Email" => "required|email|unique:myparents",
            "Password" => "required|string|min:5|max:30",
            "Name_Father_ar" => "required|string|max:255",
            "Name_Father_en" => "required|string|max:255",
            "Job_Father_ar" => "required|string|max:255",
            "Job_Father_en" => "required|string|max:255",
          //  "National_ID_Father" => "required|min:10|max:10|regex:/[0-9]{9}/",
           // "Phone_Father" =>"regex:/^([0-9\s\-\+\(\)]*)$/|min:10",
            "Address_Father" => "required|string",
            "Name_Mother_ar" =>"required|string|max:255",
            "Name_Mother_en" => "required|string|max:255",
            "Job_Mother_ar" => "required|string|max:255",
            "Job_Mother_en" => "required|string|max:255",
          //  "National_ID_Mother" => "required|min:10|max:10|regex:/[0-9]{9}/",
           // "Phone_Mother" => "regex:/^([0-9\s\-\+\(\)]*)$/|min:10",
            "Address_Mother" => "required|string"
        ]);

        try{
        $hashPassword=bcrypt( $request->Password);
          $imge= $request->file_name;
          $extension=strtolower($imge->extension());
         
          $fileName=time().rand(1,10000).".".$extension;
          $imge->move("uploade/$request->Name_Father_en",$fileName);
          

        MyParent::create([
            'Email'=> $request->Email,
            'Password'=> $hashPassword,
             'file_name'=>$fileName,
            'Name_Father'=>[
                'en'=>$request->Name_Father_en,
                'ar'=>$request->Name_Father_ar,
            ],
            'National_ID_Father'=> $request->National_ID_Father,
            'Passport_ID_Father'=> $request->Passport_ID_Father,
            'Phone_Father'=> $request->Phone_Father,
            'Job_Father'=>[
                'en'=>$request->Job_Father_en,
                'ar'=>$request->Job_Father_ar,
            ],
            'Nationality_Father_id'=> $request->Nationality_Father_id,
            'Blood_Type_Father_id'=> $request->Blood_Type_Father_id,
            'Religion_Father_id'=> $request->Religion_Father_id,
            'Address_Father'=> $request->Address_Father,

            'Name_Mother'=>[
                'en'=>$request->Name_Mother_en,
                'ar'=>$request->Name_Mother_ar,
            ],
            'National_ID_Mother'=> $request->National_ID_Mother,
            'Passport_ID_Mother'=> $request->Passport_ID_Mother,
            'Phone_Mother'=> $request->Phone_Mother,
            'Job_Mother'=>[
                'en'=>$request->Job_Mother_en,
                'ar'=>$request->Job_Mother_ar,
            ],
            'Nationality_Mother_id'=> $request->Nationality_Mother_id,
            'Blood_Type_Mother_id'=> $request->Blood_Type_Mother_id,
            'Religion_Mother_id'=> $request->Religion_Mother_id,
            'Address_Mother'=> $request->Address_Mother,
            ]);

            toastr()->success(trans('message.success'));
            return redirect(url("dashboard/show-parent"));
        }
            
        catch(Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);


        }
    }

    public function edit($id){
       $data['MyParent']= MyParent::findOrFail($id);
       $data['Nationalities']=Nationalitie::all();
        $data['Type_Bloods']=TypeBlood::all();
        $data['Religions']=Religion::all();
        return view('padges.parents.edit-parent')->with($data);
    }


    public function update(Request $request){


        $request->validate([
            "Email" => "required|email",
            "Password" => "required|string",
            "Name_Father_ar" => "required|string|max:255",
            "Name_Father_en" => "required|string|max:255",
            "Job_Father_ar" => "required|string|max:255",
            "Job_Father_en" => "required|string|max:255",
          //  "National_ID_Father" => "required|min:10|max:10|regex:/[0-9]{9}/",
           // "Phone_Father" =>"regex:/^([0-9\s\-\+\(\)]*)$/|min:10",
            "Address_Father" => "required|string",
            "Name_Mother_ar" =>"required|string|max:255",
            "Name_Mother_en" => "required|string|max:255",
            "Job_Mother_ar" => "required|string|max:255",
            "Job_Mother_en" => "required|string|max:255",
          //  "National_ID_Mother" => "required|min:10|max:10|regex:/[0-9]{9}/",
           // "Phone_Mother" => "regex:/^([0-9\s\-\+\(\)]*)$/|min:10",
            "Address_Mother" => "required|string"
        ]);
          try{
        $hashPassword=bcrypt( $request->Password);
        $MyParentUpdate=MyParent::findOrFail($request->id);

        if($request->hasFile('file_name')){
          $imge= $request->file_name;
          $extension=strtolower($imge->extension());
          
          $fileName=time().rand(1,10000).".".$extension;
          $imge->move("uploade/$request->Name_Father_en",$fileName);

          $MyParentUpdate->update(['file_name'=> $fileName]);
        }

          
         
        $MyParentUpdate->update([
            'Email'=> $request->Email,
            'Password'=> $hashPassword,
             
            'Name_Father'=>[
                'en'=>$request->Name_Father_en,
                'ar'=>$request->Name_Father_ar,
            ],
            'National_ID_Father'=> $request->National_ID_Father,
            'Passport_ID_Father'=> $request->Passport_ID_Father,
            'Phone_Father'=> $request->Phone_Father,
            'Job_Father'=>[
                'en'=>$request->Job_Father_en,
                'ar'=>$request->Job_Father_ar,
            ],
            'Nationality_Father_id'=> $request->Nationality_Father_id,
            'Blood_Type_Father_id'=> $request->Blood_Type_Father_id,
            'Religion_Father_id'=> $request->Religion_Father_id,
            'Address_Father'=> $request->Address_Father,

            'Name_Mother'=>[
                'en'=>$request->Name_Mother_en,
                'ar'=>$request->Name_Mother_ar,
            ],
            'National_ID_Mother'=> $request->National_ID_Mother,
            'Passport_ID_Mother'=> $request->Passport_ID_Mother,
            'Phone_Mother'=> $request->Phone_Mother,
            'Job_Mother'=>[
                'en'=>$request->Job_Mother_en,
                'ar'=>$request->Job_Mother_ar,
            ],
            'Nationality_Mother_id'=> $request->Nationality_Mother_id,
            'Blood_Type_Mother_id'=> $request->Blood_Type_Mother_id,
            'Religion_Mother_id'=> $request->Religion_Mother_id,
            'Address_Mother'=> $request->Address_Mother,
            ]);

            toastr()->success(trans('message.edit'));
            return redirect(url("dashboard/show-parent"));

         }
         
        catch(exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);


        } 
    }
       
    public function delete(Request $request){

        MyParent::findOrFail($request->id)->delete();
         toastr()->error(trans('message.delete'));
 
         return back();
 
 
 
     }
}


            
          