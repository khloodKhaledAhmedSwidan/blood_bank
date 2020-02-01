<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;

use Illuminate\Http\Request;
use Validator;
use Session;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::paginate(5);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // pluck('display_name','id')->
        $permission = Permission::all();
//      return $permission;
        if ($permission) {
            return view('roles.create', compact('permission'));
        } else {
            return view('roles.create');
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

//return $request->all();
        $request->validate([
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',
            'description' => 'required',
            'permission_list' => 'required|array',

        ]);
        $records = Role::create($request->all());
        $records->permissions()->attach($request->permission_list);

        $notification = array(
            'message' => 'role created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('roles.index')->with($notification);
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
        $role = Role::find($id);

        $permission = Permission::all();
        return view('roles.edit', compact('role', 'permission'));
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

        $records = Role::find($id);
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'display_name' => 'required',
            'description' => 'required',
            'permission_list' => 'required|array',

        ]);


        $records->update($request->all());
        $records->permissions()->sync($request->permission_list);
        $notification = array(
            'message' => 'role updated successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('roles.index')->with($notification);

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
//        $role = Role::findOrFail($id);
//       $role->delete();
//
//        $notification = array(
//            'message' => 'role deleted successfully!',
//            'alert-type' => 'error'
//        );
//        return redirect()->back()->with($notification);
//
//    }


    public function destroy($id)
    {
        //

        //  Category::destroy($id);


        $role = Role::find($id);
        if (!$role) {
            return responseJson(0, 'No data');
        }

        $role->delete();


        return responseJson(1, 'Record deleted successfully!', $id);


    }


}
