<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use Validator;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::paginate(4);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categories.create');
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
        Category::create($request->all());
        $notification = array(
            'message' => 'category created successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.index')->with($notification);
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
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
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
        $category = Category::find($id);
        $request->validate(['name' => 'required']);
        $category->update($request->all());
        $notification = array(
            'message' => 'category updated successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('categories.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy($id)
//    {
//        $category = Category::find($id);
//        if (count($category->posts)>=1) {
//
//            $notification = array(
//                'message' => 'what a hell you doing?!,do not delete this category !',
//                'alert-type' => 'info'
//            );
//
//            return redirect()->back()->with($notification);
//        } else {
//                    $category->delete();
//        $notification = array(
//            'message' => 'category deleted successfully!',
//            'alert-type' => 'error'
//        );
//        return redirect()->back()->with($notification);
//        }
//    }


    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return responseJson(0, 'No data');
        }
        if (count($category->posts) >= 1) {
            return responseJson(0, 'what a hell you doing?!,do not delete this category !');
        } else {
            $category->delete();
            return responseJson(1, 'Record deleted successfully!', $id);
        }
    }


}
