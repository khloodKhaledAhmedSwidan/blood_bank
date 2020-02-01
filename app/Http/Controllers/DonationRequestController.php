<?php

namespace App\Http\Controllers;

use DB;

use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{
    //
    public function index()
    {
        $donationRequests = DonationRequest::paginate(6);
        return view('donationRequest.index', compact('donationRequests'));
    }
//    public function destroy($id){
//$donation = DonationRequest::findOrFail($id);
//$donation->delete();
//        $notification = array(
//            'message' => 'Donation deleted successfully!',
//            'alert-type' => 'error'
//        );
//        return redirect()->back()->with($notification);
//    }


    public function destroy($id)
    {
        $donation = DonationRequest::find($id);
        if (!$donation) {
            return responseJson(0, 'No data');
        }

        $donation->delete();

        return responseJson(1, 'Record deleted successfully!', $id);
    }


    public function search(Request $request)
    {
        $search = $request->get('search');
        $donationRequests = DB::table('donation_requests')->where('patient_name', 'like', '%' . $search . '%')->paginate(5);
        return view('donationRequest.index', compact('donationRequests'));
    }

    public function show($id)
    {
        $donation = DonationRequest::findOrFail($id);
        return view('donationRequest.show', compact('donation'));
    }
}
