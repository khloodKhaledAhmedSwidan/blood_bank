@extends('layouts.app')

@section('content')
    @include('layouts.errors')
    <div class="container">
        {!! Form::model($user,['method'=>'PATCH','action'=>['ProfileController@update',$user->id]]) !!}
        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','Password') !!}
            {!! Form::password('password',['class'=>'awesome form-control']) !!}
        </div>















        <div class="form-group">
            {!! Form::submit('edit profile',['class'=>'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
