@extends('layouts.app')
@inject('$categories','App\Models\Category')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <a href="{{route('categories.create')}}" class="btn btn-info ">Create a new Category</a>

                <div class="card card-info ">
                    <div class="card-header">

                        <h3 class="card-title">Categories</h3>
                    </div>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>number of posts</th>
                            <th>Edit</th>
                            <th style="width: 40px">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr id="remove{{$category->id}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->posts()->count()}}</td>
                                <td>
                                    <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm">
                                        Edit</a>

                                </td>
                                <td>
                                    {{--                                    {!! Form::model($category,['route'=>['categories.destroy',$category->id],'method'=>'DELETE']) !!}--}}
                                    {{--                                    <div class="form-group">--}}
                                    {{--                                        {!! Form::submit('Delete',['Class'=>'btn btn-danger btn-sm']) !!}--}}
                                    {{--                                    </div>--}}
                                    {{--                                    {!! Form::close() !!}--}}
                                    <a href="javascript:void(0)" onclick="deleteData('categories',{{$category->id}})"
                                       class="btn btn-danger btn-sm">Delete</a>

                                </td>
                            </tr>
                        @endforeach


                        </tbody>

                    </table>
                    {{$categories->appends(request()->query())->links()}}
                </div>
            </div>
        </div>


    </div>
@endsection
