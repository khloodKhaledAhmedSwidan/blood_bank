<?php

namespace App\Http\Controllers\Api;

use App\Models\Token;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\DonationRequest;

class DonationController extends Controller
{
    //


    public function createDonationRequest(Request $request)
    {
        $client = auth()->user()->id;

        $validator = validator()->make($request->all(), [
            'patient_name' => 'required',
            'age' => 'required',
            'bags_number' => 'required',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'phone' => 'required',
            'notes' => 'required',
            'blood_type_id' => 'required',
            'city_id' => 'required',
        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }


        $donationRequest = DonationRequest::create([
            'patient_name' => $request->patient_name,
            'client_id' => $client,
            'age' => $request->age,
            'bags_number' => $request->bags_number,
            'hospital_name' => $request->hospital_name,
            'hospital_address' => $request->hospital_address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'phone' => $request->phone,
            'notes' => $request->notes,
            'blood_type_id' => $request->blood_type_id,
            'city_id' => $request->city_id,
        ]);


        $donationRequest->save();

        $clientsIds = $donationRequest->city->governorate->clients()->whereHas('blood_types', function ($query) use ($request, $donationRequest) {
            $query->where('blood_type_id', $donationRequest->blood_type_id);
        })->pluck('clients.id')->toArray();

        if (count($clientsIds)) {
            $notification = $donationRequest->notification()->create([
                'title' => 'order about donation',
                'content' => $donationRequest->bloodType->name,
            ]);
            $notification->clients()->attach($clientsIds);

        }

        $tokens = Token::whereIn('client_id', $clientsIds)->pluck('token')->toArray();
        //jwt and laravel pasport

        if (count($tokens)) {
            $title = $notification->title;
            $body = $notification->content;
            $data = [
                'donation_request_id' => $donationRequest->id,
            ];

            $send = notifyByFirebase($title, $body, $tokens, $data);
        }
        return responseJson(1, 'success', $send);


    }


    public function donation_details($id)
    {

        $post = DonationRequest::findOrFail($id);
        return responseJson(1, 'success', $post);

    }


    public function donation_requests()
    {
        $donationRequests = DonationRequest::select('patient_name', 'hospital_name', 'city_id', 'blood_type_id')->get()->toArray();
//
        return responseJson(1, 'success', $donationRequests);
    }
}
