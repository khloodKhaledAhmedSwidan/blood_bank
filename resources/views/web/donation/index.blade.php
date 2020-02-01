@extends('web\layouts\main')
@section('content')
@inject('blood_types', App\Models\BloodType)
@inject('cities', App\Models\City)

    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Donations</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Requests Start -->
    <section id="requests">
        <div class="title">
            <h2>Donations</h2>
            <hr class="line">
        </div>
        <div class="container">
            <div class="row">
                {!! Form::open(['method' => 'get' , 'class' => 'form-group col-sm-12']) !!}

                <div>
                    {!! Form::select('blood_type_id' , [$blood_types->pluck('name' , 'id')->toArray()],null,['class'=>'form-control' ,'placeholder' => 'blood type...']) !!}
                </div>
                <div >
                    {!! Form::select('city_id' , [$cities->pluck('name' , 'id')->toArray()],null,['class'=>'form-control' ,'placeholder' => 'city...']) !!}

                </div>
                <div class="search">
                    <button type="submit"><i class="col-lg-2 fas fa-search"></i></button>
                </div>
                {!! Form::close() !!}
            </div>


            @forelse($donations as $donation)
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="type">
                                <h2>{{optional($donation->bloodType)->name}}</h2>
                            </div>
                        </div>
                        <div class="data col-lg-6">
                            <h4>Name: {{$donation->patient_name}}</h4>
                            <h4>Hospital: {{$donation->hospital_name}}</h4>
                            <h4>City: {{optional($donation->city)->name}}</h4>
                        </div>
                        <div class="col-lg-3">
                            <button onclick= "window.location.href = '{{route('requests.show',$donation->id)}}';">Details</button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <p>No Donation Request</p>
            @endforelse





            <div class="page-num">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"> {{$donations->links()}}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- Requests End -->

@endsection
