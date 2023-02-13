@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Teacher_trans.Edit_Teacher') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Teacher_trans.Edit_Teacher') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    @include('padges.errors')
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

<div class="col-xs-12">
    <div class="col-md-12">
        <br>
        <form action="{{url("dashboard/add-parent/update")}}" method="post">
            @csrf
            <div class="col-xs-12">
        <div class="col-md-12">
            <br>
            <div class="form-row">
                <div class="col">
                <input type="hidden" value="{{$MyParent->id}}" name="id">
                    <label for="title">{{trans('Parent_trans.Email')}}</label>
                    <input type="email" name="Email" value="{{$MyParent->Email}}" class="form-control">
                </div>
                <div class="col">
                    <label for="title">{{trans('Parent_trans.Password')}}</label>
                    <input type="password" name="Password" value="{{$MyParent->Password}}" class="form-control" >
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('Parent_trans.Name_Father')}}</label>
                    <input type="text" name="Name_Father_ar" value="{{$MyParent->getTranslation('Name_Father', 'ar') }}" class="form-control" >
                </div>
                <div class="col">
                    <label for="title">{{trans('Parent_trans.Name_Father_en')}}</label>
                    <input type="text" name="Name_Father_en" value="{{$MyParent->getTranslation('Name_Father', 'en') }}" class="form-control" >
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3">
                    <label for="title">{{trans('Parent_trans.Job_Father')}}</label>
                    <input type="text" name="Job_Father_ar" value="{{$MyParent->getTranslation('Job_Father', 'ar') }}" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="title">{{trans('Parent_trans.Job_Father_en')}}</label>
                    <input type="text" name="Job_Father_en" value="{{$MyParent->getTranslation('Job_Father', 'en') }}" class="form-control">
                </div>

                <div class="col">
                    <label for="title">{{trans('Parent_trans.National_ID_Father')}}</label>
                    <input type="text" name="National_ID_Father" value="{{$MyParent->National_ID_Father}}"  class="form-control">
                </div>
                <div class="col">
                    <label for="title">{{trans('Parent_trans.Passport_ID_Father')}}</label>
                    <input type="text" name="Passport_ID_Father" value="{{$MyParent->Passport_ID_Father}}" class="form-control">

                </div>

                <div class="col">
                    <label for="title">{{trans('Parent_trans.Phone_Father')}}</label>
                    <input type="text" name="Phone_Father" value="{{$MyParent->Phone_Father}}" class="form-control">
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">{{trans('Parent_trans.Nationality_Father_id')}}</label>
                    <select class="custom-select my-1 mr-sm-2" name="Nationality_Father_id">
                        <option selected value="{{$MyParent->Nationality_Father_id}}" >{{$MyParent->nationalitie->name ??null}}</option>
                        @foreach($Nationalities as $National)
                            <option value="{{$National->id}}"
                            @if($MyParent->Nationality_Father_id == $National->id) selected @endif 
                            >{{$National->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <label for="inputState">{{trans('Parent_trans.Blood_Type_Father_id')}}</label>
                    <select class="custom-select my-1 mr-sm-2" name="Blood_Type_Father_id">
                        <option selected value="{{$MyParent->Blood_Type_Father_id}}" >{{$MyParent->TypeBlood->name ??null}}</option>
                        @foreach($Type_Bloods as $Type_Blood)
                            <option value="{{$Type_Blood->id}}"
                            @if($MyParent->Blood_Type_Father_id == $Type_Blood->id) selected @endif 
                            >{{$Type_Blood->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <label for="inputZip">{{trans('Parent_trans.Religion_Father_id')}}</label>
                    <select class="custom-select my-1 mr-sm-2" name="Religion_Father_id">
                        <option selected  value="{{$MyParent->Religion_Father_id}}">{{$MyParent->Religion->name ??null}}</option>
                        @foreach($Religions as $Religion)
                            <option value="{{$Religion->id}}"
                            @if($MyParent->Religion_Father_id == $Religion->id) selected @endif 
                            >{{$Religion->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Father')}}</label>
                <textarea class="form-control" name="Address_Father"  id="exampleFormControlTextarea1" rows="4">{{$MyParent->Address_Father}}</textarea>

            </div>

            <div class="col-xs-12">
           <div class="col-md-12">
            <br>

        <div class="form-row">
            <div class="col">
                <label for="title">{{trans('Parent_trans.Name_Mother')}}</label>
                <input type="text" name="Name_Mother_ar" value="{{$MyParent->getTranslation('Name_Mother', 'ar') }}" class="form-control">
                
            </div>
            <div class="col">
                <label for="title">{{trans('Parent_trans.Name_Mother_en')}}</label>
                <input type="text" name="Name_Mother_en" value="{{$MyParent->getTranslation('Name_Mother', 'en') }}" class="form-control">
            
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">{{trans('Parent_trans.Job_Mother')}}</label>
                <input type="text" name="Job_Mother_ar" value="{{$MyParent->getTranslation('Job_Mother', 'ar') }}" class="form-control">
               
            </div>
            <div class="col-md-3">
                <label for="title">{{trans('Parent_trans.Job_Mother_en')}}</label>
                <input type="text" name="Job_Mother_en" value="{{$MyParent->getTranslation('Job_Mother', 'en') }}" class="form-control">
               
            </div>

            <div class="col">
                <label for="title">{{trans('Parent_trans.National_ID_Mother')}}</label>
                <input type="text" name="National_ID_Mother" value="{{$MyParent->National_ID_Mother}}" class="form-control">
               
            </div>
            <div class="col">
                <label for="title">{{trans('Parent_trans.Passport_ID_Mother')}}</label>
                <input type="text" name="Passport_ID_Mother" value="{{$MyParent->Passport_ID_Mother}}" class="form-control">
               
            </div>

            <div class="col">
                <label for="title">{{trans('Parent_trans.Phone_Mother')}}</label>
                <input type="text" name="Phone_Mother" value="{{$MyParent->Phone_Mother}}" class="form-control">
              
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">{{trans('Parent_trans.Nationality_Father_id')}}</label>
                <select class="custom-select my-1 mr-sm-2" name="Nationality_Mother_id">
                    <option selected value="{{$MyParent->Nationality_Mother_id}}">{{$MyParent->nationalitie->name ??null}}</option>
                    @foreach($Nationalities as $National)
                        <option value="{{$National->id}}"
                        @if($MyParent->Nationality_Mother_id == $National->id) selected @endif 
                        >{{$National->name}}</option>
                    @endforeach
                </select>
              
            </div>
            <div class="form-group col">
                <label for="inputState">{{trans('Parent_trans.Blood_Type_Father_id')}}</label>
                <select class="custom-select my-1 mr-sm-2" name="Blood_Type_Mother_id">
                    <option selected value="{{$MyParent->Blood_Type_Mother_id}}">{{$MyParent->TypeBlood->name ??null}}</option>
                    @foreach($Type_Bloods as $Type_Blood)
                        <option value="{{$Type_Blood->id}}"
                        @if($MyParent->Blood_Type_Mother_id == $Type_Blood->id) selected @endif 
                        >{{$Type_Blood->name}}</option>
                    @endforeach
                </select>
               
            </div>
            <div class="form-group col">
                <label for="inputZip">{{trans('Parent_trans.Religion_Father_id')}}</label>
                <select class="custom-select my-1 mr-sm-2" name="Religion_Mother_id">
                    <option selected value="{{$MyParent->Religion_Mother_id}}">{{$MyParent->Religion->name ??null}}</option>
                    @foreach($Religions as $Religion)
                        <option value="{{$Religion->id}}"
                        @if($MyParent->Religion_Mother_id == $Religion->id) selected @endif
                        >{{$Religion->name}}</option>
                    @endforeach
                </select>
              
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Mother')}}</label>
            <textarea class="form-control" name="Address_Mother" id="exampleFormControlTextarea1"rows="4">{{$MyParent->Address_Mother}}</textarea>
          
        </div>
        <div class="col-xs-12">
            <div class="col-md-12"><br>
              <label >{{trans('Parent_trans.Attachments')}}</label>
            <div class="form-group">
            <input type="file" class="form-control" name="file_name" accept="image/*" multiple>
            </div>  
        </div>                           
 <br>
        
        <button  class="btn btn-success btn-m nextBtn btn-lg pull-right" type="submit">
                {{trans('Parent_trans.Next')}}
            </button>
    </div>
</div>
</div>


        </div>
    </div>
</div>
                           
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection