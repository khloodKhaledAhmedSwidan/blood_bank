@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Donation Request</h3>

                    <div class="card-tools">
                        <form action="{{route('donation.search')}}" method="get">
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
                            <th>Patient Name</th>
                            <th>Phone</th>
                            <th>Blood type</th>
                            <th>Details</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>

                        @forelse($donationRequests as $donation)
                            <tr id="remove{{$donation->id}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$donation->patient_name}}</td>
                                <td>{{$donation->phone}}</td>
                                <td>{{optional($donation->bloodType)->name}}</td>

                              <td><a href="{{route('donation.show',$donation->id)}}" class="btn btn-info btn-sm">Show</a></td>
                                <td>
{{--                                    {!! Form::model($donation,['route'=>['donation.destroy',$donation->id],'method'=>'DELETE']) !!}--}}
{{--                                    <div class="form-group">--}}
{{--                                        {!! Form::submit('Delete',['Class'=>'btn btn-danger btn-sm']) !!}--}}
{{--                                    </div>--}}
{{--                                    {!! Form::close() !!}--}}
                                    <a href="javascript:void(0)" onclick="deleteData('donation-request',{{$donation->id}})" class="btn btn-danger btn-sm">Delete</a>

                                </td>
                            </tr>



                        @empty
                            <p class="text-center text-bold">No Donations</p>
                        @endforelse

                        <p class="card-cyan"></p>

                        </tbody>
                    </table>
                    {{$donationRequests->appends(request()->query())->links()}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
