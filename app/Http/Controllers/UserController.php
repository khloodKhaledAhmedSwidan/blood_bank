<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(6);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'id')->all();
        if ($roles) {
            return view('users.create', compact('roles'));
        } else {
            return view('users.create');
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

        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users',
            'role_id' => 'required|array'
        ]);
        $user = User::create($request->all());
        $user->password = bcrypt($request->password);

        $user->roles()->attach($request->role_id);
        $user->save();
        $notification = array(
            'message' => 'user created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('users.index')->with($notification);
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
        $user = User::findOrFail($id);
        $role = Role::pluck('display_name', 'id')->all();
        return view('users.edit', compact('user', 'role'));
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
        $user = User::find($id);
        $request->validate([
            'password' => 'required',
        ]);


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);
        $user->roles()->sync($request->role_id);

        $notification = array(
            'message' => 'user updated successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('users.index')->with($notification);

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
//        $user = User::findOrFail($id);
//        $user->delete();
//        $notification = array(
//            'message' => 'user deleted successfully!',
//            'alert-type' => 'error'
//        );
//        return redirect()->back()->with($notification);
//
//    }


    public function destroy($id)
    {

        $user = User::find($id);
        if (!$user) {
            return responseJson(0, 'No data');
        }

        $user->delete();

        return responseJson(1, 'Record deleted successfully!', $id);


    }


}
