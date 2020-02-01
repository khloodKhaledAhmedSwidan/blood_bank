<?php

namespace App\Http\Controllers\Web;


use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Auth;
use validator;

class AuthController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('guest:site_client')->except('logout');
    }

    public function showLoginPage(){
        return view('web.authPage.login');
    }
    public function login(Request $request){



        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (auth('site_client')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route('home.page');
        }else{

          return redirect()->back()->with('error','password or email is not found!');
        }



    }
    public function showRedisterPage(){
        return view('web.authPage.register');
    }
    public  function register(Request $request){



        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'date_of_birth'=>'required',
            'last_donation_date'=>'required',
            'blood_type_id'=>'required',
            'city_id'=>'required',
            'password'=>'required',
        ]);
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->date_of_birth = $request->date_of_birth;

        $client->last_donation_date =  $request->last_donation_date;
        $client->blood_type_id  = $request->blood_type_id;
         $client->city_id  = $request->city_id;
          $client->password =  bcrypt($request->password);

$client->save();


        return redirect()->route('loginPage.client');


    }



    public function logout(Request $request)
    {
     Auth::guard('site_client')->logout();
  $request->session()->invalidate();
    return redirect()->route('loginPage.client');



    }
}
