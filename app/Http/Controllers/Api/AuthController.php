<?php

namespace App\Http\Controllers\Api;

use App\Mail\ResetPassword;
use App\Models\Token;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;

class AuthController extends Controller
{
    public function register(Request $request)
    {


        $validator = validator()->make($request->all(), [
            'name' => 'required',
            'password' => 'required|confirmed',
            'phone' => 'required',
            'email' => 'required|unique:clients',
            'date_of_birth' => 'required|date',
            'last_donation_date' => 'required|date',
            'blood_type_id' => 'required|exists:blood_types,id',
            'city_id' => 'required|exists:cities,id',

        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }


        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = str_random(60);
        $client->save();
        return responseJson(1, 'success', [
            'api_token' => $client->api_token,
            'client' => $client,
        ]);

    }

    public function login(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'phone' => 'required',
            'password' => 'required',

        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }


        $client = Client::where('phone', $request->phone)->first();
        if ($client) {
            if (Hash::check($request->password, $client->password)) {
                return responseJson(1, 'success', [
                    'api_token' => $client->api_token,
                    'client' => $client,
                ]);
            } else {
                return responseJson(0, 'failed');
            }
        } else {
            return responseJson(0, 'failed');
        }


    }


    public function profile(Request $request)
    {

        $validator = validator()->make($request->all(), [

            'password' => 'required|confirmed',

            'email' => 'unique:clients,email',
            'date_of_birth' => 'date',
            'last_donation_date' => 'date',
            'blood_type_id' => 'exists:blood_types,id',
            'city_id' => 'exists:cities,id',
        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }

        $client = auth()->user();

        $client->update($request->all());
        return responseJson(1, 'success', $client);

    }

    public function forgot_password(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        $client = Client::where('phone', $request->phone)->first();

        if ($client) {
            $code = str_random(5);

            $update = $client->update(['pin_code' => $code]);

            if ($update) {

                Mail::to($client->email)
                    ->bcc("")
                    ->send(new ResetPassword($code));

                return responseJson(1, 'success', $client);
            } else {
                return responseJson(0, 'failed , try again');
            }


        } else {
            return responseJson(0, 'failed');
        }

    }


    public function reset_password(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'pin_code' => 'required',
            'password' => 'required|confirmed'
        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        $client = Client::where('pin_code', $request->pin_code)->first();

        if ($client) {


            $client->password = bcrypt($request->password);
            $client->api_token = str_random(60);
            $client->pin_code = null;
            $client->save();
            return responseJson(1, 'success', [
                'api_token' => $client->api_token,
                'client' => $client,
            ]);


        } else {
            return responseJson(0, 'failed');
        }


    }

    public function registerToken(Request $request)
    {
        $validator = validator()->make($request->all(), [
            'token' => 'required',

        ]);
        if ($validator->fails()) {
            return responseJson(0, $validator->errors()->first(), $validator->errors());
        }
        Token::where('token', $request->token)->delete();
        $request->user()->tokens()->create($request->all());
        return responseJson(1, 'success');


    }

}
