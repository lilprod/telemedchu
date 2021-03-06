<?php

namespace App\Http\Controllers;

use App\Historique;
use App\Timeline;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Timeline::orderby('id', 'desc')->paginate(3); //show only 5 items at a time in descending order

        return view('timelines.index', compact('posts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('timelines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required|min:3|max:255|unique:timelines',
            'body' => 'required',
            'cover_image' =>'image|nullable',
        ]);

        if ($request->hasfile('cover_image')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $post = new Timeline();
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->cover_image = $fileNameToStore;
        $post->status = $request->input('status');
        $post->user_id = auth()->user()->id;
        $post->username = auth()->user()->name.' '.auth()->user()->firstname;

        $historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'Timeline';
        $historique->user_id = auth()->user()->id;

        $post->save();
        $historique->save();

        return redirect()->route('timelines.index')->with('success', 'Nouvelle actualité publiée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Timeline::findOrFail($id); //Find post of id = $id
        $lastposts = DB::table('timelines')
             ->orderby('id', 'desc')
             ->limit(3)
             ->get();
        return view('timelines.show', compact('post', 'lastposts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Timeline::findOrFail($id); //Find post of id = $id

        return view('timelines.edit', compact('post'));
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
        $post = Timeline::findOrFail($id);

        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required|min:3|max:255|unique:posts,id,' . $post->slug,
            'body' => 'required',
            'cover_image' =>'image|nullable',
        ]);

        if ($request->hasfile('cover_image')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        if ($request->hasfile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
        $post->status = $request->input('status');
        $post->user_id = auth()->user()->id;
        $post->username = auth()->user()->name.' '.auth()->user()->firstname;

        $historique = new Historique();
        $historique->action = 'Update';
        $historique->table = 'Timeline';
        $historique->user_id = auth()->user()->id;

        $post->save();
        $historique->save();

        return redirect()->route('timelines.index')->with('success', 'Actualité éditée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find a user with a given id and delete
        $post = Timeline::findOrFail($id);
        if ($post->cover_image != 'noimage.jpg') {
            Storage::delete('public/profile_images/'.$post->cover_image);
        }
        $post->delete();

        return redirect()->route('timelines.index')
            ->with('success',
             'Actualité supprimée avec succès.');
    }
}
