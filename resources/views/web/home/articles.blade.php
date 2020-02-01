@extends('web\layouts\main')
@section('content')

    @inject('categories', App\Models\Category)


    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Articles</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Requests Start -->
    <section id="requests">
        <div class="title">
            <h2>Articles</h2>
            <hr class="line">
        </div>
        <div class="container">
            <div class="row">
                {!! Form::open(['method' => 'get' , 'class' => 'form-group col-sm-12']) !!}

                <div>
                    {!! Form::select('category_id' , [$categories->pluck('name' , 'id')->toArray()],null,['class'=>'form-control' ,'placeholder' => 'Categories...']) !!}
                </div>

                <div class="search">
                    <button type="submit"><i class="col-lg-2 fas fa-search"></i></button>
                </div>
                {!! Form::close() !!}
            </div>


            @forelse($posts as $post)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="type">
                                    <h2><img class="circle-img rounded-circle" width="150px" hight="200px" src="{{$post->photo}}"></h2>
                                </div>
                            </div>
                            <div class="data col-lg-6">
                                <h4>Category: {{optional($post->category)->name}}</h4>
                                <h4>Hospital: {{$post->title}}</h4>

                            </div>
                            <div class="col-lg-3">
                                <button onclick= "window.location.href = '{{route('article.page',$post->id)}}';">Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>No Posts</p>
            @endforelse





            <div class="page-num">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"> {{$posts->links()}}</li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- Requests End -->


    @endsection
