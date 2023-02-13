@extends('layouts.master')
@section('css')
@livewireStyles

@section('title')
    {{trans('main_sied.AddParents')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('main_sied.AddParents')}}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

<button class="btn btn-success btn-sm btn-lg pull-right"  type="button"><a href="{{url("dashboard/add-parent")}}">{{ trans('main_sied.AddParents') }}</a></button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
           style="text-align: center">
        <thead>
        <tr class="table-success">
            <th>#</th>
            <th>{{ trans('Parent_trans.Email') }}</th>
            <th>{{ trans('Parent_trans.Name_Father') }}</th>
            <th>{{ trans('Parent_trans.National_ID_Father') }}</th>
            <th>{{ trans('Parent_trans.Passport_ID_Father') }}</th>
            <th>{{ trans('Parent_trans.Phone_Father') }}</th>
            <th>{{ trans('Parent_trans.Job_Father') }}</th>
            <th>{{ trans('Parent_trans.Processes') }}</th>
        </tr>
        </thead>
        <tbody>
        
        @foreach ($myparents as $my_parent)
            <tr>
                
                <td>{{ $loop->iteration }}</td>
                <td>{{ $my_parent->Email }}</td>
                <td>{{ $my_parent->Name_Father }}</td>
                <td>{{ $my_parent->National_ID_Father }}</td>
                <td>{{ $my_parent->Passport_ID_Father }}</td>
                <td>{{ $my_parent->Phone_Father }}</td>
                <td>{{ $my_parent->Job_Father }}</td>
                <td>
                    <button  title="{{ trans('Grades_trans.Edit') }}"
                            class="btn btn-primary btn-sm"><a href="{{url("dashboard/add-parent/{$my_parent->id}/edit")}}"><i class="fa fa-edit"> </i></a></button>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Parent{{ $my_parent->id }}" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                </td>
                <div class="modal fade" id="delete_Parent{{ $my_parent->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="{{url("dashboard/add-parent/delete")}}" method="post">
                            @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('Teacher_trans.Delete_Teacher') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p> {{ trans('classroom.Warning_class') }}</p>
                                <input type="hidden" name="id"  value="{{$my_parent->id}}">
                            </div>
                            <div class="modal-footer">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('classroom.Close') }}</button>
                                    <button type="submit"
                                            class="btn btn-danger">{{ trans('classroom.Delete') }}</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </tr>
        @endforeach
    </table>
</div>
@endsection
@section('js')

@livewireScripts
@endsection