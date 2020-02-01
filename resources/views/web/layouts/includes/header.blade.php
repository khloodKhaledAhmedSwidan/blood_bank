
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />


    <!-- website font  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('public/web/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/web/css/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/web/css/style.css')}}" />
    <link href="{{asset('public/adminlte/dist/css/toastr.css')}}" rel="stylesheet"/>

    <title>Blood Bank</title>
</head>

<body>

<!-- Navbar 1 Start -->
<section id="Nav1">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <i class="fas fa-phone-volume" style="border-right: 1px solid gray;"> +20 127 245 6884
                            &nbsp; &nbsp; </i>
                    </li>
                    <li class="nav-item">
                        <i class="far fa-envelope" style="padding-left: 15px;"> InfoBloodBank@gmail.com</i>
                    </li>
                </ul>
            </div>
            <div class="mx-auto order-0 navbar-brand mx-auto">
                <a href="https://www.instagram.com/ipda3.tech/"><i
                        class="fab fa-instagram github">&nbsp;&nbsp;</i></a>
                <a href="{{$settings->facebook_link}}"><i
                        class="fab fa-facebook-f facebook">&nbsp;&nbsp;</i></a>
                <a href="{{$settings->twitter_link}}"><i class="fab fa-twitter twitter">&nbsp;&nbsp;</i></a>
                <a href="https://api.whatsapp.com/send?phone=+201097571186"><i
                        class="fab fa-whatsapp whats">&nbsp;&nbsp;</i></a>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link selected" style="border-right: 1px solid gray;" href="#">EN &nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="padding-left: 15px;" href="#">AR</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>
<!-- Navbar 1 End -->

<!-- Navbar 2 Start -->
<section id="Nav2">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="{{asset('public/web/imgs/logo.png')}}" width="18%"></img>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link selected" href="{{route('home.page')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about.page')}}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('articles.page')}}">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('requests.index')}}">Donations</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.index')}}">Contact Us</a>
                </li>
            </ul>
            @if(!(auth('site_client')->user()))
            <button class="btn signup" onclick= "window.location.href = '{{route('registerPage.client')}}';">New Account</button>
                <button class="btn login" onclick= "window.location.href = '{{route('loginPage.client')}}';">Login</button>
                @else
                <li class="dropdown">
            <a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{auth('site_client')->user()->name}}</a>

                    <ul class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="{{route('fav.posts',auth('site_client')->user()->id)}}"><i class="fa fa-sign-out fa-lg"></i> fav posts</a>

                        <form  id="frm-logout" action="{{ url('client-logout') }}" method="POST">
                            {{ csrf_field() }}
                            <button class="dropdown-item" style="cursor: pointer">
                                Logout
                            </button>
                        </form>




                    </ul>

                </li>
            @endif
        </div>
    </nav>
</section>
<!-- Navbar 2 End -->
