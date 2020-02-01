@extends('web\layouts\main')
@section('content')
    @include('layouts.errors')
    <div class="row">
        <div class="col-sm-4">
            <ul class="list-group">

                <li class="list-group-item"><a  href="{{route('fav.posts',auth('site_client')->user()->id)}}">favourite Post</a></li>
                <li class="list-group-item"><a href="{{route('edit.profile',auth('site_client')->user()->id)}}">Edit Profile</a></li>
                <li class="list-group-item"><a href="{{route('edit.password',auth('site_client')->user()->id)}}">Change Password</a></li>

                <li class="list-group-item"><a>logout</a></li>

            </ul>
        </div>
        <div class="col-lg-8">


            <div class="panel panel-body">


                {!! Form::model($client,[
         'action'=>['Web\HomeController@changePassword',$client->id],

           'method' =>'PUT'
           ]) !!}
                <div class="form-group">
                    {!! Form::label('password','Password') !!}
                    {!! Form::password('password',['class'=>'awesome form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('confirmPassword','repeat your new password') !!}
                    {!! Form::password('confirmPassword',['class'=>'awesome form-control']) !!}
                </div>









                <div class="form-group">
                    {!! Form::submit('Change Password',['class'=>'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
