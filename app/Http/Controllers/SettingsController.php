<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public  function index(){
        $settings = Setting::first();
        return view('settings.index',compact('settings'));
    }
    public function edit($id){
$settings = Setting::findOrFail($id);
return view('settings.edit',compact('settings'));
    }
    public function update(Request $request, $id){
$setting = Setting::findOrFail($id);
$request->validate([
    'phone'=>'required',
    'email'=>'required|email',
    'facebook_link'=>'required',
    'twitter_link'=>'required',
    'youtube_link'=>'required',
    'play_store_link'=>'required',
    'app_store_link'=>'required',
    'about_app'=>'required',

]);
$setting->update($request->all());
        $notification = array(
            'message' => 'setting updated successfully!',
            'alert-type' => 'info'
        );
return redirect()->route('settings.index')->with($notification);
    }
}
