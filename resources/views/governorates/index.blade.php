@extends('layouts.app')
@inject('$governorates','App\Models\Governorate')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <a href="{{route('governorates.create')}}" class="btn btn-info ">Create a Governorate</a>

                <div class="card card-info ">
                    <div class="card-header">

                        <h3 class="card-title">Governorates</h3>
                    </div>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th style="width: 40px">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($governorates as $governorate)
                            <tr id="remove{{$governorate->id}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$governorate->name}}</td>
                                <td>
                                    <a href="{{route('governorates.edit',$governorate->id)}}" class="btn btn-info btn-sm"> Edit</a>

                                </td>
                                <td>
{{--                                    {!! Form::model($governorate,['route'=>['governorates.destroy',$governorate->id],'method'=>'DELETE']) !!}--}}
{{--                                    <div class="form-group">--}}
{{--                                        {!! Form::submit('Delete',['Class'=>'btn btn-danger btn-sm']) !!}--}}
{{--                                    </div>--}}
{{--                                    {!! Form::close() !!}--}}
                                    <a href="javascript:void(0)" onclick="deleteData('governorates',{{$governorate->id}})" class="btn btn-danger btn-sm">Delete</a>

                                </td>
                            </tr>
                        @endforeach



                        </tbody>

                    </table>
                    {{$governorates->appends(request()->query())->links()}}
                </div>
            </div>
        </div>





    </div>
@endsection
