<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'], ['only' => ['blogs']]);
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function blogs()
    {
        $publishedBlogs = BlogController::where('status', 1)->latest()->get();
        $draftBlogs = BlogController::where('status', 0)->latest()->get();
        return view('admin.blogs', compact('publishedBlogs', 'draftBlogs'));
    }
}
