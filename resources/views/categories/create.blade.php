@extends('layouts.app')
@section('content')
    @include('layouts.errors')
    <div class="container">
    {!! Form::open(['method'=>'POST','action'=>'CategoriesController@store']) !!}
    <div class="form-group">
        {!! Form::label('name','Name Of Category') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
        <div class="form-group">
            {!! Form::submit('Add Category',['class'=>'btn btn-success']) !!}
        </div>
{!! Form::close() !!}
    </div>
@endsection
