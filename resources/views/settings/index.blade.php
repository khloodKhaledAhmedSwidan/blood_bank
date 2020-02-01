@extends('layouts.app')
@inject('$settings','App\Models\Setting')
@section('content')




    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <a href="{{route('settings.edit',$settings->id)}}" class="btn btn-info ">edit setting</a>

                <div class="card card-info ">
                    <div class="card-header">

                        <h3 class="card-title">Setting</h3>
                    </div>

                    <table class="table table-hover">
                        <thead>
                        <tr>

                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <th>Email</th>
                                <td>{{$settings->email}}</td>
                            </tr>
                            <tr>

                                <th>phone</th>
                                <td>{{$settings->phone}}</td>
                            </tr>

<tr>
    <th>about app</th>
    <td>{{$settings->about_app}}</td>
</tr>
                        <tr>
                            <th>facebook</th>
                            <td><a href="{{$settings->facebook_link}}">{{$settings->facebook_link}}</a></td>
                        </tr>
                            <tr>
                                <th>twitter</th>
                                <td><a href="{{$settings->twitter_link}}">{{$settings->twitter_link}}</a></td>
                            </tr>

                            <tr>
                                <th>youtube</th>
                                <td><a href="{{$settings->youtube_link}}">{{$settings->youtube_link}}</a></td>
                            </tr>
                            <tr>
                                <th>play store</th>
                                <td><a href="{{$settings->play_store_link}}">{{$settings->play_store_link}}</a></td>
                            </tr>
                        <tr>
                            <th>app store</th>
                            <td><a href="{{$settings->app_store_link}}">{{$settings->app_store_link}}</a></td>
                        </tr>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>





    </div>


@endsection
