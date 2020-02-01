<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $cities = City::paginate(10);
        return view('cities.index', compact('governorates', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $governorates = Governorate::pluck('name', 'id')->all();
        if ($governorates) {
            return view('cities.create', compact('governorates'));
        } else {
            return redirect()->route('governorates.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'governorate_id' => 'required',
        ]);

        $city = City::create($request->all());
        $notification = array(
            'message' => 'City created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('cities.index')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $city = City::findOrFail($id);
        $governorate = Governorate::pluck('name', 'id')->all();
        return view('cities.edit', compact('city', 'governorate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = City::find($id);
        $request->validate([
            'name' => 'required',
            'governorate_id' => 'required',
        ]);
        $city->update($request->all());
        $notification = array(
            'message' => 'City updated successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('cities.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        //
//        $city = City::find($id);
//
//       if(count($city->clients)>=1 || count($city->donation_request)>=1){
//           $notification = array(
//               'message' => 'what a hell you doing?!,do not delete this city!',
//               'alert-type' => 'info'
//           );
//           return  redirect()->route('cities.index')->with($notification);
//        }else{
//           $city->delete();
//           $notification = array(
//               'message' => 'City deleted successfully!',
//               'alert-type' => 'error'
//           );
//           return  redirect()->route('cities.index')->with($notification);
//       }
//
//   }


    public function destroy($id)
    {
        $city = City::find($id);
        if (!$city) {
            return responseJson(0, 'No data');
        }
        if (count($city->clients) >= 1 || count($city->donation_request) >= 1) {

            return responseJson(0, 'what a hell you doing?!,do not delete this city!', $id);
        } else {
            $city->delete();
            return responseJson(1, 'Record deleted successfully!', $id);
        }
    }

}
