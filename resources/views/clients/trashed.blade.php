@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Trashed Clients</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
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
                            <th>Restore</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($clients as $client)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$client->name}}</td>
                                <td>{{$client->phone}}</td>
                                <td>{{$client->email}}</td>
                                <td><a class="btn btn-info" href="{{route('client.restore',$client->id)}}">Restore</a></td>

                                <td>


                                    {!! Form::model($client,['route'=>['client.delete',$client->id],'method'=>'DELETE']) !!}
                                    <div class="form-group">
                                        {!! Form::submit('Delete',['Class'=>'btn btn-danger']) !!}
                                    </div>
                                    {!! Form::close() !!}

                                </td>

                            </tr>
                        @empty
                            <p class="card-cyan">No Trashed</p>
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
