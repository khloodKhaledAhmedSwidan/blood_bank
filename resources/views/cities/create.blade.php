@extends('layouts.app')

@section('content')
    @include('layouts.errors')
    <div class="container">
        {!! Form::open(['method'=>'POST','action'=>'CitiesController@store']) !!}
        <div class="form-group">
            {!! Form::label('name','Name Of City') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('governorate_id','Governorate') !!}
{!! Form::select('governorate_id',[''=>'choose Governorate']+$governorates,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add City',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
