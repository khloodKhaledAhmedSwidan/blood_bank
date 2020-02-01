<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use Illuminate\Http\Request;
use Validator;
use Session;

class GovernoratesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $governorates = Governorate::paginate(6);

        return view('governorates.index', compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('governorates.create');
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
        ]);
        Governorate::create($request->all());
        $notification = array(
            'message' => 'Governorate created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('governorates.index')->with($notification);
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
        $governorate = Governorate::find($id);
        return view('governorates.edit', compact('governorate'));
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
        //
        $governorate = Governorate::find($id);
        $request->validate(['name' => 'required']);
        $governorate->update($request->all());
        $notification = array(
            'message' => 'Governorate updated successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('governorates.index')->with($notification);

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
//        $governorate = Governorate::find($id);
//        if (count($governorate->cities) >= 1) {
//            $notification = array(
//                'message' => 'what a hell you doing?!,do not delete this governorate !',
//                'alert-type' => 'info'
//            );
//            return redirect()->back()->with($notification);
//        } else {
//            $governorate->delete();
//            $notification = array(
//                'message' => 'Governorate deleted successfully!',
//                'alert-type' => 'error'
//            );
//            return redirect()->back()->with($notification);
//        }
//
//
//    }


    public function destroy($id)
    {
        //

        //  Category::destroy($id);


        $governorate = Governorate::find($id);
        if (!$governorate) {
            return responseJson(0, 'No data');
        }

        if (count($governorate->cities) >= 1) {

            return responseJson(0, 'what a hell you doing?!,do not delete this governorate!', $id);
        } else {

            $governorate->delete();


            return responseJson(1, 'Record deleted successfully!', $id);
        }


    }


}
