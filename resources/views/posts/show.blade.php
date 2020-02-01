@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info ">edit this post</a>

                <div class="card card-info ">
                    <div class="card-header">

                        <h3 class="card-title">{{$post->title}}</h3>
                    </div>

                    <table class="table table-hover">
                        <thead>
                        <tr>

                            <th>name</th>
                            <th>Description</th>

                        </tr>
                        </thead>
                        <tbody>

                        <tr>

                            <th>title</th>
                            <td>{{$post->title}}</td>
                        </tr>
                        <tr>

                            <th>photo</th>
                            <td><img src="{{$post->photo}}" width="90px" height="50px"></td>
                        </tr>

                        <tr>
                            <th>category</th>
                            <td>{{$post->category->name}}</td>
                        </tr>
                        <tr>
                            <th>content</th>
                            <td>{{$post->content}}</td>
                        </tr>


                        </tbody>

                    </table>

                </div>
            </div>
        </div>





    </div>


@endsection
