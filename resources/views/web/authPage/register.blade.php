@extends('web\layouts\main')
@section('content')
    @include('layouts.errors')
    @inject('blood_types', App\Models\BloodType)
    @inject('cities', App\Models\City)
    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Sign up</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Sign Up Start -->
    <section id="sign-up">
        <div class="container">

            <img src="{{asset('public/web/imgs/logo.png')}}" alt="">
            {!! Form::open(['method'=>'POST','action'=>'Web\AuthController@register']) !!}



                {!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Name']) !!}


                {!! Form::email('email',null,['class'=>'form-control','placeholder' => 'Email']) !!}



                {!! Form::date('date_of_birth',\Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control']) !!}






                {!! Form::select('blood_type_id' , [$blood_types->pluck('name' , 'id')->toArray()],null,['class'=>'form-control' ,'placeholder' => 'blood type...']) !!}


                {!! Form::select('city_id',[$cities->pluck('name','id')->toArray()],null,['class'=>'form-control' ,'placeholder' => 'city']) !!}


                {!! Form::text('phone',null,['class'=>'form-control']) !!}


              <p class="text-bold text-center">{!! Form::label('last_donation_date','last Donation Date') !!}</p>
                {!!Form::date('last_donation_date',\Carbon\Carbon::now()->format('Y-m-d'),['class'=>'form-control'])!!}

                {!! Form::password('password',null,['class'=>'form-control']) !!}

            <div class="reg-group" >
                {!! Form::submit('Submit',['class'=>'btn btn-success','style'=>'background-color:rgb(51,58,65)']) !!}
            </div>


            {{Form::close()}}
        </div>
    </section>
    <!-- Sign Up End -->
@endsection
