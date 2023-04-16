<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
class blogPostController extends Controller
{
    public function index()
    {
        return view('frontend.blogpost.index')
                        ->with('page','home')
                        ->with('posts',Post::paginate(5));
    }

    public function about_page()
    {
        return view('frontend.blogpost.about')
                              ->with('page','about');
    }


    public function simpe_post(Post $simplepost)
    {
        
        return view('frontend.blogpost.simplepost')
                  ->with('page','simplepost')
                  ->with('post',$simplepost);
    }
    public function contact_page()
    {
        return view('frontend.blogpost.contact')
                      ->with('page','contact');
    }
}
