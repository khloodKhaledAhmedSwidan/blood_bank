@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <a href="{{route('cities.create')}}" class="btn btn-info ">Create a City</a>

                <div class="card card-info ">
                    <div class="card-header">

                        <h3 class="card-title">Cities</h3>
                    </div>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Governorate</th>
                            <th>Edit</th>
                            <th style="width: 40px">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $city)
                            <tr id="remove{{$city->id}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$city->name}}</td>
                                <td>{{$city->governorate? $city->governorate->name:"something wrong"}}  </td>
                                <td>
                                    <a href="{{route('cities.edit',$city->id)}}" class="btn btn-info btn-sm"> Edit</a>

                                </td>
                                <td>
{{--                                    {!! Form::model($city,['route'=>['cities.destroy',$city->id],'method'=>'DELETE']) !!}--}}
{{--                                    <div class="form-group">--}}
{{--                                        {!! Form::submit('Delete',['Class'=>'btn btn-danger btn-sm']) !!}--}}
{{--                                    </div>--}}
{{--                                    {!! Form::close() !!}--}}
                                    <a href="javascript:void(0)" onclick="deleteData('cities',{{$city->id}})" class="btn btn-danger btn-sm">Delete</a>

                                </td>
                            </tr>
                        @endforeach



                        </tbody>

                    </table>
                    {{$cities->appends(request()->query())->links()}}
                </div>
            </div>
        </div>





    </div>
@endsection
