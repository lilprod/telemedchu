<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Department;
use App\Doctor;
use App\Timeline;
use App\Post;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\json_encode;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PagesController extends Controller
{
    public function index()
    {
        $date = Carbon::now()->toDateString();

        $departments = Department::all();

        $lastposts = DB::table('posts')
             ->orderby('id', 'desc')
             ->limit(3)
             ->get();

        return view('pages.index',compact('date', 'departments', 'lastposts'));
    }

    public function getDoctors(Request $request)
    {
        $doctors = Doctor::where('department_id', $request->id)
                            ->get();
        return response()->json($doctors);
    }
    
    public function check_slug(Request $request)
    {
        // Old version: without uniqueness
        //$slug = str_slug($request->title);
        
        // New version: to generate unique slugs
        $slug = SlugService::createSlug(Timeline::class, 'slug', $request->title);
        
        return response()->json(['slug' => $slug]);
    }
    
    public function post_slug(Request $request)
    {
        // Old version: without uniqueness
        //$slug = str_slug($request->title);
        
        // New version: to generate unique slugs
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        
        return response()->json(['slug' => $slug]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function condition()
    {
        return view('pages.use_condition');
    }

    public function timeline()
    {
        $posts = Timeline::orderby('id', 'desc')->paginate(3);

        $lastposts = DB::table('timelines')
             ->orderby('id', 'desc')
             ->limit(3)
             ->get();

        return view('pages.timeline',compact('posts','lastposts'));
    }
    
    /*public function details($id)
    {
        $post = Timeline::findOrFail($id);

        $lastposts = DB::table('timelines')
             ->orderby('id', 'desc')
             ->limit(3)
             ->get();

        return view('pages.detailsTimeline',compact('post','lastposts'));
    }*/

    public function details($id)
    {
        $post = Timeline::where('slug',$id)->first();

        $lastposts = DB::table('timelines')
             ->orderby('id', 'desc')
             ->limit(3)
             ->get();

        return view('pages.detailsTimeline',compact('lastposts','post'));
    }
    
    public function show($id)
    {
        $post = Post::where('slug',$id)->first();

        $lastposts = DB::table('posts')
             ->orderby('id', 'desc')
             ->limit(3)
             ->get();

        return view('pages.detail_blog',compact('lastposts','post'));
    }
}
