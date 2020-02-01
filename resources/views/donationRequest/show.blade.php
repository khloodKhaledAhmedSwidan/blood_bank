@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xl-12">

                <div class="card card-info ">
                    <div class="card-header">

                        <h3 class="card-title">Donation Request</h3>
                    </div>

                    <table class="table table-hover">
                        <thead>
                        <tr>

                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>

                            <th>patient name</th>
                            <td>{{$donation->patient_name}}</td>
                        </tr>
                        <tr>

                            <th>age</th>
                            <td>{{$donation->age}}</td>
                        </tr>

                        <tr>
                            <th>bags number</th>
                            <td>{{$donation->bags_number}}</td>
                        </tr>
                        <tr>
                            <th>hospital name</th>
                            <td>{{$donation->hospital_name}}</td>
                        </tr>

                        <tr>
                            <th>hospital address</th>
                            <td>{{$donation->hospital_address}}</td>
                        </tr>
                        <tr>
                            <th>phone</th>
                            <td>{{$donation->phone}}</td>
                        </tr>
                        <tr>
                            <th>blood type </th>
<td>{{optional($donation->bloodType)->name}}</td>                        </tr>
                        <tr>
                            <th>City</th>
<td>{{optional($donation->city)->name}}</td>                        </tr>
                        <tr>
                            <th>client</th>
                            <td>{{optional($donation->client)->name}}</td>
                        </tr>
                        <tr>
                            <th>notes</th>
                            <td>{{$donation->notes}}</td>
                        </tr>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>





    </div>


@endsection
