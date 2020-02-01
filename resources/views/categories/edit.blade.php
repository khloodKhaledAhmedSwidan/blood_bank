
@extends('layouts.app')
@section('content')
    <div class="container">
        {!! Form::model($category,['method'=>'PATCH','route'=>['categories.update',$category->id]]) !!}
        <div class="form-group">
            {!! Form::label('name','Name Of Category') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('edit Category',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
