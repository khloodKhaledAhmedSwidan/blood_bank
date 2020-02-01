
@extends('layouts.app')
@section('content')
    <div class="container">
        {!! Form::model($governorate,['method'=>'PATCH','route'=>['governorates.update',$governorate->id]]) !!}
        <div class="form-group">
            {!! Form::label('name','Name Of Governorate') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('edit Governorate',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
