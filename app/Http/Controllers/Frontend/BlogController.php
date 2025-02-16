<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
}
