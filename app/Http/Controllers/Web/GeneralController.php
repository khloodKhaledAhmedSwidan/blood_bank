<?php

namespace App\Http\Controllers\Web;

use App\Models\Contact;
use App\Models\Setting;
use http\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $settings = Setting::first();
        return view('web.general.contact-us',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $this->validate($request, [
            'title'   => 'required',
            'phone' => 'required',
            'email'=>'required',
            'message'=>'required',
            'name'=>'required'
        ]);
        Contact::create($request->all());
        $notification = array(
            'message' => 'your request  send successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('contact.index')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function showAbout(){
      $settings = Setting::first();
      // $settings = Setting::pluck('about_app')->first();
        return view('web.general.about',compact('settings'));
    }
}
