<?php

namespace App\Http\Controllers\Web;

use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public  function index(Request $request){


        $donations = DonationRequest::where(function ($q) use($request){
            if($request->City_id){
                $q->where('City_id',$request->City_id);
            }
            if($request->blood_type_id){
                $q->where('blood_type_id',$request->blood_type_id);
            }
        })->latest()->paginate(5);




//        $bloodTypes = BloodType::all();
//        $cities = City::all();
        $posts = Post::paginate(3);
//        $donations = DonationRequest::paginate(2);
        return view('web.home.index',compact('bloodTypes','cities','donations','posts'));
    }

    public function ShowArticale($id){
        $post = Post::findOrFail($id);
        $posts = Post::paginate(2);
        return view('web.home.article',compact('post','posts'));
    }
    public  function profile($id){
$client =   Client::findOrFail($id);
return view('web.home.profile',compact('client'));
    }
    public  function editProfile($id){
        $client = Client::findOrFail($id);
        $cities = City::all();
        $blood_types = BloodType::all();
        return view('web.home.edit',compact('client','cities','blood_types'));
    }
    public  function updateProfile(Request $request,$id){

        $client = Client::find($id);

        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'date_of_birth'=>'required',
            'last_donation_date'=>'required',
            'blood_type_id'=>'required',
            'city_id'=>'required',
        ]);
        $client->update($request->all());
        $notification = array(
            'message' => 'profile updated successfully!',
            'alert-type' => 'info'
        );
        return  redirect()->route('client.profile',$client->id)->with($notification);


    }
    public  function changePasswordPage($id){
        $client = Client::findOrFail($id);
return view('web.home.changePassword',compact('client'));
    }
    public  function changePassword(Request $request,$id){
$client = Client::findOrFail($id);

        $request->validate([
            'password'=>'required',
            'confirmPassword'=>'required|same:password',

        ]);

     $client->password = bcrypt($request->password);
     $client->save();
        $notification = array(
            'message' => 'password changed successfully!',
            'alert-type' => 'info'
        );
        return  redirect()->route('client.profile',$client->id)->with($notification);
    }
    public function showArticles(Request $request){
        $posts = Post::where(function ($q) use($request){
            if($request->category_id){
                $q->where('category_id',$request->category_id);
            }
        })->latest()->paginate(5);

        return view('web.home.articles',compact('posts'));
    }
    public  function favProfile(){
//    $client = auth('site_client')->user()->id;
//
//
//        $favPosts = Client::whereHas('posts', function ($query) use($client) {
//                $query->where('client_id', $client);
//            })->get();



        $posts = auth('site_client')->user()->posts()->paginate(10);

        return view('web.home.favProfile',compact('posts'));

    }
}
