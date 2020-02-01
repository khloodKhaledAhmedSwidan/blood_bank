@extends('web\layouts\main')
@section('content')
<div class="row">
    <div class="col-sm-4">

           <li class="list-group-item"><a  href="{{route('fav.posts',auth('site_client')->user()->id)}}">favourite Post</a></li>
           <li class="list-group-item"><a href="{{route('edit.profile',auth('site_client')->user()->id)}}">Edit Profile</a></li>
           <li class="list-group-item"><a href="{{route('edit.password',auth('site_client')->user()->id)}}">Change Password</a></li>



       </ul>
    </div>
    <div class="col=lg-8">
        <div class="panel-body"><div class="py-4">







            </div></div>
    </div>
</div>
    @endsection
