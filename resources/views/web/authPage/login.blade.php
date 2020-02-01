@extends('web\layouts\main')
@section('content')
    @include('layouts.errors')
    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Login</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->
    <!-- Login Start -->
    @include('errors\error')
    <section id="login">
        <div class="container">

            <img src="{{asset('public/web/imgs/logo.png')}}" alt="">

            <form action="{{route('login.client')}}" method="post">
                {{csrf_field()}}
                <input class="username" type="email" placeholder="Email" name="email" required >
                <input class="password" type="Password" placeholder="Password" required name="password">
                <input class="check" type="checkbox">Remember me
                <a href="#">Forget Password ?</a><br>
                <div class="reg-group">
                    <button style="background-color: darkred;" name="login">Login</button>
                    <button style="background-color: rgb(51, 58, 65);">Make new account</button>
                </div>
            </form>

        </div>
    </section>
    <!-- Login End -->

@endsection
