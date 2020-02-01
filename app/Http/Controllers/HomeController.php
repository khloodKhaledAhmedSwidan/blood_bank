<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientCount = Client::count();
        $postCount = Post::count();
        $contactCount = Contact::count();
        $donationRequestCount = DonationRequest::count();
        return view('home',compact('clientCount','postCount','contactCount','donationRequestCount'));
    }
}
