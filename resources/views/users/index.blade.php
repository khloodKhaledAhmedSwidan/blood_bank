@extends('layouts.app')
@section('title')
 <p>Users</p>
    @endsection
@section('name_of_user')


    @endsection

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div>
                    <a href="{{route('users.create')}}" class="btn btn-info ">Create a user</a>
                </div>


                <div class="card card-info ">
                    <div class="card-header">

                        <h3 class="card-title">Users</h3>
                    </div>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>name</th>
                            <th>email</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr id="remove{{$user->id}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>

                                <td>
                                    @foreach($user->roles as $role)

<li>

                                    {{$role->display_name}}
</li>

                                @endforeach
                                </td>
                                <td>
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-info btn-sm"> Edit</a>

                                </td>


                                <td>
{{--                                    {!! Form::model($user,['route'=>['users.destroy',$user->id],'method'=>'DELETE']) !!}--}}
{{--                                    <div class="form-group">--}}
{{--                                        {!! Form::submit('Delete',['Class'=>'btn btn-danger btn-sm']) !!}--}}
{{--                                    </div>--}}
{{--                                    {!! Form::close() !!}--}}
                                    <a href="javascript:void(0)" onclick="deleteData('users',{{$user->id}})" class="btn btn-danger btn-sm">Delete</a>

                                </td>
                            </tr>
                        @endforeach



                        </tbody>

                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>





    </div>


@endsection
