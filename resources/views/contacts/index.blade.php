@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-bold">Clients</h3>

                    <div class="card-tools">
                        <form method="get">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="name" class="form-control float-right" placeholder="Search">

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
                            <th>title</th>
<th>phone</th>
                            <th>email</th>
                            <th>message</th>
                            <th>client</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

@forelse($contacts as $contact)
                            <tr id="remove{{$contact->id}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$contact->title}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->email}}</td>

                                <td>{{$contact->message}}</td>
                                <td>{{optional($contact->client)->name}}</td>
                                <td>
{{--                                    {!! Form::model($contact,['route'=>['contacts.destroy',$contact->id],'method'=>'DELETE']) !!}--}}
{{--                                    <div class="form-group">--}}
{{--                                        {!! Form::submit('Delete',['Class'=>'btn btn-danger btn-sm']) !!}--}}
{{--                                    </div>--}}
{{--                                    {!! Form::close() !!}--}}
                                    <a href="javascript:void(0)" onclick="deleteData('contact',{{$contact->id}})" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>



@empty
    <p class="text-center text-bold">No Contacts</p>
@endforelse
                            <p class="card-cyan"></p>

                        </tbody>
                    </table>
                    {{$contacts->appends(request()->query())->links() }}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
