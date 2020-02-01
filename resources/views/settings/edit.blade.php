@extends('layouts.app')

@section('content')
    @include('layouts.errors')
    <div class="container">
        {!! Form::model($settings,['method'=>'PATCH','action'=>['SettingsController@update',$settings->id]]) !!}
        <div class="form-group">
            {!! Form::label('email','Email') !!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('phone','phone') !!}
            {!! Form::text('phone',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('facebook_link','Facebook') !!}
            {!! Form::text('facebook_link',null,['class'=>'form-control']) !!}
        </div>





        <div class="form-group">
            {!! Form::label('twitter_link','twitter') !!}
            {!! Form::text('twitter_link',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('twitter_link','twitter') !!}
            {!! Form::text('twitter_link',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('youtube_link','youtube') !!}
            {!! Form::text('youtube_link',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('play_store_link','play store') !!}
            {!! Form::text('play_store_link',null,['class'=>'form-control']) !!}
        </div>




        <div class="form-group">
            {!! Form::label('app_store_link','app store') !!}
            {!! Form::text('app_store_link',null,['class'=>'form-control']) !!}
        </div>



        <div class="form-group">

            {!! Form::textarea('about_app', null, ['id' => 'editor', 'rows' => 4, 'cols' => 54, 'style' => 'resize:none'])!!}

        </div>



        <div class="form-group">
            {!! Form::submit('edit settings',['class'=>'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
