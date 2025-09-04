<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;

class NewsPostController extends Controller
{
    public function index()
    {
        $posts = NewsPost::paginate(10);

        return view('news.index', compact('posts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(NewsPost $post)
    {
        return view('news.show', compact('post'));
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
