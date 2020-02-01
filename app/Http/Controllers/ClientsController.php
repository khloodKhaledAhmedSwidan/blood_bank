<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    //
    public   function  index(){
        $clients = Client::paginate(6);
return view('clients.index',compact('clients'));
}
public function  isActive($id){

//    dd($id);
$client = Client::find($id);
//dd($client);
    if($client) {
        if ($client->is_active == 1) {
            $client->update(['is_active' => 0]);
            $notification = array(
                'message' => 'client is inactive',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        } else {
            $client->update(['is_active' => 1]);
            $notification = array(
                'message' => 'client is active',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }

}
public function delete($id){
        $client = Client::findOrFail($id);

        if(count($client->posts)>= 1 || count($client->blood_types)
            || count($client->governorates) || count($client->contacts) ){
            $notification = array(
                'message' => 'what a hell you doing?!,this client has posts,delete posts first ',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }else{
            $client->update(['is_active'=>0]);
            $client->delete();
            $notification = array(
                'message' => 'client is trashed',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

}
public  function  trashed(){
$clients = Client::onlyTrashed()->get();

return view('clients.trashed',compact('clients'));
}

public  function search(Request $request){
        $search = $request->get('search');
        $clients =  DB::table('clients')->where('name','like','%'.$search.'%')->paginate(5);
        return view('clients.index',compact('clients'));
}
public function destroy($id){
$client = Client::withTrashed()->where('id',$id)->first();
$client->forceDelete();
    $notification = array(
        'message' => 'client deleted successfully!',
        'alert-type' => 'error'
    );
return redirect()->back()->with($notification);
}
public  function restore($id){
        $client = Client::withTrashed()->where('id',$id)->first();
        $client->restore();
    $notification = array(
        'message' => 'client restore successfully!',
        'alert-type' => 'info'
    );
        return redirect()->back()->with($notification);
}
}
