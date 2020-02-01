@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xl-12">
        <a href="{{route('roles.create')}}" class="btn btn-info ">Create a new Role</a>

        <div class="card card-info ">
            <div class="card-header">

                <h3 class="card-title">Roles</h3>
            </div>

        <table class="table table-hover">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>name Display</th>
                <th>Description</th>
                <th>Permission</th>
                <th>Edit</th>
                <th style="width: 40px">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr id="remove{{$role->id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->display_name}}</td>
                    <td>{{$role->description}}</td>
                    <td>

                        @foreach($role->permissions as $permission)
                            <li>
                        {{$permission->display_name}}
                            </li>
                    @endforeach
                    </td>
                    <td>
                        <a href="{{route('roles.edit',$role->id)}}" class="btn btn-info btn-sm"> Edit</a>

                    </td>
                    <td>
{{--                        {!! Form::model($role,['route'=>['roles.destroy',$role->id],'method'=>'DELETE']) !!}--}}
{{--<div class="form-group">--}}
{{--    {!! Form::submit('Delete',['Class'=>'btn btn-danger btn-sm']) !!}--}}
{{--</div>--}}
{{--                        {!! Form::close() !!}--}}

                        <a href="javascript:void(0)" onclick="deleteData('roles',{{$role->id}})" class="btn btn-danger btn-sm">Delete</a>

                    </td>
                </tr>
            @endforeach



            </tbody>

        </table>
            {{$roles->links()}}
        </div>
        </div>
    </div>





</div>
@endsection
