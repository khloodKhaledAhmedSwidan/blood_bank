<!-- Footer Start -->
<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="foot-info">
                    <img src="{{asset('public/web/imgs/logo.png')}}" alt="">
                    <p></p>
                </div>
            </div>
            <div class="col-md-3">
                <ul class="menu">
                    <a href="{{route('home.page')}}">
                        <li>Home</li>
                    </a>
                    <a href="{{route('about.page')}}">
                        <li>About Us</li>
                    </a>
                    <a href="{{route('articles.page')}}">
                        <li>Articles</li>
                    </a>
                    <a href="{{route('requests.index')}}">
                        <li>Donations</li>
                    </a>

                    <a href="{{route('contact.index')}}">
                        <li>Contact Us</li>
                    </a>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="options">
                    <li>
                        <h5>Available On</h5>
                    </li>
                    <li><img src="{{asset('public/web/imgs/ios1.png')}}" alt=""></li>
                    <li><img src="{{asset('public/web/imgs/google1.png')}}" alt=""></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Footer End -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script type="text/javascript" src="{{asset('public/web/js/swiper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/web/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/web/js/main.js')}}"></script>



<script src="{{asset('public/adminlte/dist/js/toastr.js')}}"></script>

<script>

        @if(Session::has('message'))
    var type = "{{ Session::get('alert-type') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/share.js') }}"></script>
@stack('scripts')
</body>


</html>
