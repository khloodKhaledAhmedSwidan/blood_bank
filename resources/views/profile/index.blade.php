@extends('layouts.app')
@section('title')
    Profile
    @endsection
@section('content')




    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <a href="{{route('profile.edit',$user->id)}}" class="btn btn-info ">Edit Profile</a>

                <div class="card card-info ">
                    <div class="card-header">

                        <h3 class="card-title">Welcome &nbsp; {{$user->name}}</h3>
                    </div>

                    <table class="table table-hover">

                        <tbody>

                        <tr>

                            <th>Name</th>
                            <td>{{$user->email}}</td>
                        </tr>

                        <tr>

                            <th>Role</th>

                            <td>
                                @if($user->roles)
                                    @foreach($user->roles as $role)
                                <li>{{$role->name}}</li>
                            @endforeach
                            @endif
                            </td>
                        </tr>

                        <tr>

                            <th>Permission of this role</th>
                            <td>
{{--                                @if($user->roles->permissions)--}}
{{--                                    @foreach($user->roles->permissions as $permission)--}}
{{--                                        <li>--}}
{{--                                            {{$permission->name}}--}}
{{--                                        </li>--}}
{{--                                        @endforeach--}}
{{--                                @endif--}}

                            </td>
                        </tr>


                        </tbody>

                    </table>

                </div>
            </div>
        </div>





    </div>


@endsection
