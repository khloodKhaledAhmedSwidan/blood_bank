@extends('web\layouts\main')
@section('content')

    @include('layouts.errors')
    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Contact Us</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- login Start -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6 call">
                    <div class="title">Head</div>
                    <img src="{{asset('public/web/imgs/logo.png')}}" alt="">
                    <hr>
                    <h3>Mobile: {{$settings->phone}}</h3>
                    <h3>Fax: +2 455 6646</h3>
                    <h3>Email: {{$settings->email}}</h3>
                    <hr>
                    <h3>Find Us On</h3>
                    <div class="icons">
                        <a href="{{$settings->facebook_link}}" class="fab fa-facebook-square fa-3x"></a>
                        <a href="{{$settings->play_store_link}}" class="fab fa-google-play fa-3x"></a>
                        <a class="fab fa-twitter-square fa-3x" href="{{$settings->twitter_link}}"></a>
                        <a href="{{$settings->app_store_link}}" class="fab fa-app-store-ios fa-3x"></a>
                        <a href="{{$settings->youtube_link}}" class="fab fa-youtube-square fa-3x"></a>
                    </div>
                </div>
                <div class="col-md-6 info">
                    <div class="title">Head</div>
                    <form action="{{route('contact.store')}}" method="post">
                        {{csrf_field()}}
                        <input type="text" name="name" id="" placeholder="Name" required="">
                        <input type="email" name="email" id="" placeholder="Email" required="">
                        <input type="number" name="phone" id="" placeholder="Phone" required="">
                        <input type="text" name="title" id="" placeholder="Title" required="">
                        <textarea name="message" id="" cols="10" rows="5" placeholder="Message"></textarea>
                        <div class="reg-group">
                            <button type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- login End -->

@endsection
