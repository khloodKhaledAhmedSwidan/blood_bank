@extends('layouts.app')
@section('content')
    @include('layouts.errors')

    <div class="container">
        {!! Form::open(['method'=>'POST','action'=>'UserController@store']) !!}
        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role_id','Role') !!}
            {!! Form::select('role_id[]',[''=>'choose Role']+$roles,null,
            [
            'class'=>'form-control',
            'multiple'=>'multiple'
            ]
            ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','Password') !!}
            {!! Form::password('password',['class'=>'awesome form-control']) !!}
        </div>



        <div class="form-group">
            {!! Form::submit('Add user',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
