<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Categorie;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function singleblog()
    {
        return view('Frontend.single');
    }

    public function category()
    {
        return view('Frontend.category');
    }

    public function addblog()
    {
        $categories= Categorie::all();

        return view('dashboard.addblog',compact('categories'));
    }


    public function creteblog(Request $request){
     $request->validate([
        'blogTitle' => 'required|string|max:255',
        'blogCategory' => 'required',
        'blogImage' => 'required',
        'blogContent' => 'required|string',
        'blogStatus' => 'required',
     ]);

    $userid = $request->user()->id;

    //  dd($userid);


     $imagePath = null;
     if($request->hasFile('blogImage')){
        $imagePath = $request->file('blogImage')->store('blog_images', 'public');
     }

     $blog = Blog::create([
        'user_id' => $userid,
        'title' => $request->input('blogTitle'),
        'category_id' => $request->input('blogCategory'),
        'image' => $imagePath,
        'content' => $request->input('blogContent'),
        'status' => $request->input('blogStatus'),

    ]);

    // dd($blog);

    return redirect()->back()->with('success', 'Blog post created successfully!');

}

public function allblogs()
{
    $allblogs = Blog::all();
    return view('dashboard.allblogs', compact('allblogs'));
}
}
