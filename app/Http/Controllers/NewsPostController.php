<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;

class NewsPostController extends Controller
{
    public function index()
    {
        $posts = NewsPost::with('author')->paginate(10);

        return view('news.index')->with('posts', $posts);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(NewsPost $newsPost)
    {
        //
    }

    public function edit(NewsPost $newsPost)
    {
        //
    }

    public function update(Request $request, NewsPost $newsPost)
    {
        //
    }

    public function destroy(NewsPost $newsPost)
    {
        //
    }
}
