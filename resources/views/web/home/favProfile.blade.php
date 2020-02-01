@extends('web\layouts\main')
@section('content')
    @inject('categories', App\Models\Category)

    <div class="row">
        <div class="col-sm-4">
            <ul class="list-group">

                <li class="list-group-item"><a  href="{{route('fav.posts',auth('site_client')->user()->id)}}">favourite Post</a></li>
                <li class="list-group-item"><a href="{{route('edit.profile',auth('site_client')->user()->id)}}">Edit Profile</a></li>
                <li class="list-group-item"><a href="{{route('edit.password',auth('site_client')->user()->id)}}">Change Password</a></li>



            </ul>
        </div>
        <div class="col=lg-8">
            <div class="panel-body"><div class="py-4">



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





                </div></div>
        </div>
    </div>
@endsection
