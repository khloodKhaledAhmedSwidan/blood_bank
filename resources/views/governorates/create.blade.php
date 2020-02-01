@extends('layouts.app')
@section('content')
    @include('layouts.errors')
    <div class="container">
        {!! Form::open(['method'=>'POST','action'=>'GovernoratesController@store']) !!}
        <div class="form-group">
            {!! Form::label('name','Name Of Governorate') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add Governorate',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
