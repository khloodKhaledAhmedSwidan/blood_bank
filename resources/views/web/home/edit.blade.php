@extends('web\layouts\main')
@section('content')
    @include('layouts.errors')
    <div class="row">
        <div class="col-sm-4">
            <ul class="list-group">

                <li class="list-group-item"><a  href="{{route('fav.posts',auth('site_client')->user()->id)}}">favourite Post</a></li>
                <li class="list-group-item"><a href="{{route('edit.profile',auth('site_client')->user()->id)}}">Edit
                        Profile</a></li>
                <li class="list-group-item"><a href="{{route('edit.password',auth('site_client')->user()->id)}}">Change
                        Password</a></li>


            </ul>
        </div>
        <div class="col-lg-8">


            <div class="panel panel-body">


                {!! Form::model($client,[
         'action'=>['Web\HomeController@updateProfile',$client->id],

           'method' =>'PUT'
           ]) !!}
                <div class="form-group">
                    {!! Form::label('name','Name') !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('phone','phone') !!}
                    {!! Form::text('phone',null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email','Email') !!}
                    {!! Form::text('email',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('last_donation_date','Donation Date') !!}
                    {!!Form::date('last_donation_date',null,['class'=>'form-control'])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('date_of_birth','Date Of Birth') !!}
                    {!!Form::date('date_of_birth',null,['class'=>'form-control'])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('blood_type_id','Blood Type') !!}
                    {!! Form::select('blood_type_id',$blood_types,null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('city_id','City') !!}
                    {!! Form::select('city_id',$cities,null,['class'=>'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::submit('Edit',['class'=>'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
