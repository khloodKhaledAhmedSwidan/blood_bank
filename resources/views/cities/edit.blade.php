@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::model($city,['method'=>'PATCH','action'=>['CitiesController@update',$city->id]]) !!}
        <div class="form-group">
            {!! Form::label('name','Name Of City') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('governorate_id','Governorate') !!}
            {!! Form::select('governorate_id',$governorate,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('edit City',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
