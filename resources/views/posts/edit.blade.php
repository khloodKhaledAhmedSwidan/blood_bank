@extends('layouts.app')
@section('content')
    @include('layouts.errors')
    <div class="container">
        {!! Form::model($post,[
      'action'=>['PostsController@update',$post->id],
        'files' => true,
        'method' =>'PUT'
        ]) !!}
        <div class="form-group">
            {!! Form::label('title','Title Of post') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category') !!}
            {!! Form::select('category_id',$category,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">

            {!! Form::textarea('content', null, ['id' => 'editor', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none']) !!}

        </div>
        <div class="form-group">
            <img src="{{$post->photo}}" width="90px" height="50px">
        </div>
        <div class="form-group">
            {!! Form::label('photo','Photo') !!}
            {!! Form::file('photo',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('edit post',['class'=>'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
