<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    //
    public function index(Request $request)
    {
        $contacts = Contact::where(function ($q) use ($request) {
            if ($request->name) {
                $q->where('title', 'LIKE', '%' . $request->name . '%')
                    ->orWhere('message', 'LIKE', '%' . $request->name . '%')
                    ->orWhereHas('client', function ($q) use ($request) {
                        $q->where('name', 'LIKE', '%' . $request->name . '%');
                    });
            }
        })->paginate(6);
        return view('contacts.index', compact('contacts'));
    }

//    public function destroy($id)
//    {
//        $contact = Contact::find($id);
//        $contact->delete();
//        $notification = array(
//            'message' => 'contact deleted successfully!',
//            'alert-type' => 'error'
//        );
//        return redirect()->back()->with($notification);
//    }


    public function destroy($id)
    {

        $contact = Contact::find($id);
        if (!$contact) {
            return responseJson(0, 'No data');
        }

        $contact->delete();

        return responseJson(1, 'Record deleted successfully!', $id);


    }


    public function search(Request $request)
    {
        $search = $request->get('search');
        $contacts = DB::table('contacts')->where('title', 'like', '%' . $search . '%')->paginate(5);
        return view('contacts.index ', compact('contacts'));
    }
}
