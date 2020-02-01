@extends('layouts.app')
@section('content')



    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <a href="{{route('posts.create')}}" class="btn btn-info ">Create a Post</a>

                <div class="card card-info ">
                    <div class="card-header">

                        <h3 class="card-title">Posts</h3>
                    </div>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>photo</th>
                            <th>Title</th>
                            <th>category</th>
                            <th>Edit</th>
                            <th>Show</th>
                            <th style="width: 40px">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{$post->photo}}" width="90px" height="50px"></td>
                                <td>{{$post->title}}</td>
                                <td>{{optional($post->category)->name}}</td>
                                <td>
                                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm"> Edit</a>

                                </td>

                                <td>
                                    <a href="{{route('posts.show',$post->id)}}" class="btn btn-secondary btn-sm"> Show</a>

                                </td>

                                <td>
                                    {!! Form::model($post,['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}
                                    <div class="form-group">
                                        {!! Form::submit('Delete',['Class'=>'btn btn-danger btn-sm']) !!}
                                    </div>
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach



                        </tbody>

                    </table>
                    {{$posts->appends(request()->query())->links()}}
                </div>
            </div>
        </div>





    </div>


@endsection
