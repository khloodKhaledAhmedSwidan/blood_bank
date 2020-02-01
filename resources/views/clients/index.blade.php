@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Clients</h3>

                <div class="card-tools">
                    <form action="{{route('client.search')}}" method="get">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>phone</th>
                        <th>email</th>
                        <th>date of birth</th>
                        <th>last donation</th>
                        <th>blood type</th>
                        <th>city</th>
                        <th>Is Active</th>
                        <th>Trashed</th>
                    </tr>
                    </thead>
                    <tbody>

@forelse($clients as $client)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->date_of_birth}}</td>
                        <td>{{$client->last_donation_date}}</td>
                        <td>{{$client->bloodType->name}}</td>
                        <td>{{$client->city->name}}</td>
                        <td><a href="{{route('clients.active',$client->id)}}" class="btn btn-info">{{$client->is_active == 1? 'Active':'Inactive'}}</a></td>
                        <td>


                            {!! Form::model($client,['route'=>['client.trash',$client->id],'method'=>'DELETE']) !!}
                            <div class="form-group">
                                {!! Form::submit('Trash',['Class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}

                        </td>
                    </tr>
    {{$clients->appends(request()->query())->links()}}
@empty
    <div>
    <p  class="text-center">No clients</p>
    </div>
@endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@endsection
