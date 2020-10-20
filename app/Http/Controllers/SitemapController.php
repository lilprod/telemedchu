<?php

namespace App\Http\Controllers;

use App\Timeline;
use App\Post;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function sitemap()
    {
        $timelines = Timeline::orderBy('updated_at', 'DESC')->get();
        
        $posts = Post::orderBy('updated_at', 'DESC')->get();
    
        return response()->view('sitemap', compact('posts', 'timelines'))->header('Content-Type', 'text/xml');
    }
}
