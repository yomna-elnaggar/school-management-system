@include('padges.errors')

<form action="{{url("dashboard/add-parent/store")}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('Parent_trans.Email')}}</label>
                    <input type="email" name="Email"  class="form-control">
                </div>
                <div class="col">
                    <label for="title">{{trans('Parent_trans.Password')}}</label>
                    <input type="password" name="Password" class="form-control" >
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('Parent_trans.Name_Father')}}</label>
                    <input type="text" name="Name_Father_ar" class="form-control" >
                </div>
                <div class="col">
                    <label for="title">{{trans('Parent_trans.Name_Father_en')}}</label>
                    <input type="text" name="Name_Father_en" class="form-control" >
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3">
                    <label for="title">{{trans('Parent_trans.Job_Father')}}</label>
                    <input type="text" name="Job_Father_ar" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="title">{{trans('Parent_trans.Job_Father_en')}}</label>
                    <input type="text" name="Job_Father_en" class="form-control">
                </div>

                <div class="col">
                    <label for="title">{{trans('Parent_trans.National_ID_Father')}}</label>
                    <input type="text" name="National_ID_Father" class="form-control">
                </div>
                <div class="col">
                    <label for="title">{{trans('Parent_trans.Passport_ID_Father')}}</label>
                    <input type="text" name="Passport_ID_Father" class="form-control">

                </div>

                <div class="col">
                    <label for="title">{{trans('Parent_trans.Phone_Father')}}</label>
                    <input type="text" name="Phone_Father" class="form-control">
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">{{trans('Parent_trans.Nationality_Father_id')}}</label>
                    <select class="custom-select my-1 mr-sm-2" name="Nationality_Father_id">
                        <option selected>{{trans('Parent_trans.Choose')}}...</option>
                        @foreach($Nationalities as $National)
                            <option value="{{$National->id}}">{{$National->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <label for="inputState">{{trans('Parent_trans.Blood_Type_Father_id')}}</label>
                    <select class="custom-select my-1 mr-sm-2" name="Blood_Type_Father_id">
                        <option selected>{{trans('Parent_trans.Choose')}}...</option>
                        @foreach($Type_Bloods as $Type_Blood)
                            <option value="{{$Type_Blood->id}}">{{$Type_Blood->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <label for="inputZip">{{trans('Parent_trans.Religion_Father_id')}}</label>
                    <select class="custom-select my-1 mr-sm-2" name="Religion_Father_id">
                        <option selected>{{trans('Parent_trans.Choose')}}...</option>
                        @foreach($Religions as $Religion)
                            <option value="{{$Religion->id}}">{{$Religion->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Father')}}</label>
                <textarea class="form-control" name="Address_Father" id="exampleFormControlTextarea1" rows="4"></textarea>

            </div>

            <div class="col-xs-12">
           <div class="col-md-12">
            <br>

        <div class="form-row">
            <div class="col">
                <label for="title">{{trans('Parent_trans.Name_Mother')}}</label>
                <input type="text" name="Name_Mother_ar" class="form-control">
                
            </div>
            <div class="col">
                <label for="title">{{trans('Parent_trans.Name_Mother_en')}}</label>
                <input type="text" name="Name_Mother_en" class="form-control">
            
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label for="title">{{trans('Parent_trans.Job_Mother')}}</label>
                <input type="text" name="Job_Mother_ar" class="form-control">
               
            </div>
            <div class="col-md-3">
                <label for="title">{{trans('Parent_trans.Job_Mother_en')}}</label>
                <input type="text" name="Job_Mother_en" class="form-control">
               
            </div>

            <div class="col">
                <label for="title">{{trans('Parent_trans.National_ID_Mother')}}</label>
                <input type="text" name="National_ID_Mother" class="form-control">
               
            </div>
            <div class="col">
                <label for="title">{{trans('Parent_trans.Passport_ID_Mother')}}</label>
                <input type="text" name="Passport_ID_Mother" class="form-control">
               
            </div>

            <div class="col">
                <label for="title">{{trans('Parent_trans.Phone_Mother')}}</label>
                <input type="text" name="Phone_Mother" class="form-control">
              
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">{{trans('Parent_trans.Nationality_Father_id')}}</label>
                <select class="custom-select my-1 mr-sm-2" name="Nationality_Mother_id">
                    <option selected>{{trans('Parent_trans.Choose')}}...</option>
                    @foreach($Nationalities as $National)
                        <option value="{{$National->id}}">{{$National->name}}</option>
                    @endforeach
                </select>
              
            </div>
            <div class="form-group col">
                <label for="inputState">{{trans('Parent_trans.Blood_Type_Father_id')}}</label>
                <select class="custom-select my-1 mr-sm-2" name="Blood_Type_Mother_id">
                    <option selected>{{trans('Parent_trans.Choose')}}...</option>
                    @foreach($Type_Bloods as $Type_Blood)
                        <option value="{{$Type_Blood->id}}">{{$Type_Blood->name}}</option>
                    @endforeach
                </select>
               
            </div>
            <div class="form-group col">
                <label for="inputZip">{{trans('Parent_trans.Religion_Father_id')}}</label>
                <select class="custom-select my-1 mr-sm-2" name="Religion_Mother_id">
                    <option selected>{{trans('Parent_trans.Choose')}}...</option>
                    @foreach($Religions as $Religion)
                        <option value="{{$Religion->id}}">{{$Religion->name}}</option>
                    @endforeach
                </select>
              
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">{{trans('Parent_trans.Address_Mother')}}</label>
            <textarea class="form-control" name="Address_Mother" id="exampleFormControlTextarea1"
                        rows="4"></textarea>
          
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