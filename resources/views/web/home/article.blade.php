@extends('web\layouts\main')

@section('content')

<!-- Navigator Start -->
<section id="navigator">
    <div class="container">
        <div class="path">
            <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
            <div class="path-main" style="color: darkred; display:inline-block;">/ Articles</div>
            <div class="path-directio" style="color: grey; display:inline-block;"> / {{$post->title}}</div>
        </div>

    </div>
</section>
<!-- Navigator End -->

<!-- article Start -->
<section id="article">
    <div class="container">
        <img class="head-img" src="{{$post->photo}}" alt="">
        <div class="details-container">
            <div class="title">{{$post->title}}</div>
            <p>
            {{$post->content}}
            </p>
            <strong><a>Share this article:</a></strong>
            <div class="icons">

                <a href="https://www.facebook.com/sharer/sharer.php?u={{route('article.page',$post->id)}}"  id=""><span class="fab fa-facebook-square fa-3x"></span></a>
                <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{route('article.page',$post->id)}}"  id=""><span class="fab fa-twitter-square fa-3x"></span></a>
            </div>

        </div>
        <!-- Articles Start -->
        <section id="articles">
            <div class="container">
                <h2 style="display: inline-block;">Articles</h2>
                <div class="swiper-container">
                    <div class="button-area" style="display: inline-block; margin-left: 850px;">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        </button>
                    </div>
                    <div class="swiper-wrapper">
                        @foreach($posts as $post)
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-img-top" style="position: relative;">
                                    <img src="{{$post->photo}}" alt="Card image">
                                    <button class="like"><i class="fas fa-heart icon-large"></i></button>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">{{$post->title}}</h4>
                                    <p class="card-text">{{$post->content}}</p>
                                    <div class="btn-cont">
                                        <button class="card-btn"
                                                onclick="window.location.href = '{{route('article.page',$post->id)}}';">Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach


                    </div>
                </div>
            </div>
        </section>
        <!-- Articles End -->

    </div>
</section>
<!-- Article End -->
    @endsection
