<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.Admin.post.index')
                      ->with('posts', Post::paginate(5));
    }

    /**W
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('backend.Admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
               $request->validate([
                   'title' =>'required|max:50',
                   'subtitle' => 'required|max:55',
                   'description' => 'required|max:255',
               ]);
            Post::create([
                'title' => $request->title,
               'subtitle' => $request->subtitle,
                'description' => $request->description,
            ]);
             Session::flash('success', 'Post');
            return redirect()->route('post.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('backend.Admin.post.edit')
                      ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Post $post)
    {
           $request->validate([
             'title' =>'required|max:50',
             'subtitle' =>'required|max:50',
             'description' => 'required|max:255',
           ]);

           $post->title=$request->title;
           $post->subtitle=$request->subtitle;
           $post->description=$request->description;
           $post->save();
           Session::flash('update', 'Post updated successfully.');
           return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post)
    {
       
    }
    public function delete($post)
    {
            Post::findOrFail($post)->delete();
            Session::flash('delete', 'Post deleted successfully.');
            return redirect()->route('post.index');
    }

}
