@extends('layouts.app')
@section('content')
    @include('layouts.errors')

    <div class="container">
        {!! Form::open(['method'=>'POST','action'=>'PostsController@store','files' => true]) !!}
        <div class="form-group">
            {!! Form::label('title','Title') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category') !!}
            {!! Form::select('category_id',[''=>'choose Category']+$categories,null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">

            {!! Form::textarea('content', null, ['id' => 'editor', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}

        </div>
        <div class=""></div>
        <div class="form-group">
            {!! Form::label('photo','Photo') !!}
            {!! Form::file('photo',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Add post',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
