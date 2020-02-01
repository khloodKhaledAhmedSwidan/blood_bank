<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::paginate(6);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name','id')->all();
        if ($categories){
            return view('posts.create',compact('categories'));
        }else{
            return redirect()->route('posts.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'content'=>'required',
            'photo'=>'required',
            'category_id'=>'required',

        ]);


        $post = Post::create($request->all());

        if ($request->hasFile('photo')) {
            $path = public_path();
            $destinationPath = $path . '/uploads/posts/'; // upload path
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $post->photo = 'uploads/posts/' . $name;
            $post->save();
        }

        $notification = array(
            'message' => 'post created successfully!',
            'alert-type' => 'success'
        );
     return redirect()->route('posts.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::Find($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $post = Post::find($id);
        $category = Category::pluck('name','id')->all();
return view('posts.edit',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $post = Post::find($id);
      $validator =  $request->validate([
            'title' => 'required',
            'content'=>'required',
            'photo'=>'required',
            'category_id'=>'required',

        ]);
         $post->update($request->except('photo'));
        if ($request->hasFile('photo')) {
            if(file_exists($post->photo))
            unlink($post->photo);
            $path = public_path();
            $destinationPath = $path . '/uploads/posts/'; // upload path
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $post->photo = 'uploads/posts/' . $name;
            $post->save();
        }
        $notification = array(
            'message' => 'post updated successfully!',
            'alert-type' => 'info'
        );
        return  redirect()->route('posts.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        $notification = array(
            'message' => 'post deleted successfully!',
            'alert-type' => 'error'
        );
        return redirect()->route('posts.index')->with($notification);
    }

    public function showPost($id){
        $post = Post::Find($id);
        return view('posts.show',compact('post'));

    }


    public function toggleFavourite(Request $request)
    {
        $toggle = $request->user()->posts()->toggle($request->post_id);
        return responseJson(1,'success',$toggle);
    }

}
