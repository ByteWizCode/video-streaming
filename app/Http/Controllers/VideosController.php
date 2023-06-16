<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $videos = Videos::latest()->paginate(5);

        return view('videos.index',compact('videos')) -> with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'=>'required',
            'source'=>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,octet-stream|max:90040|required',
        ]);

        $source = $request->file('source');
        if($source){
            $source->storeAs('public/posts', $source->hashName());
        }

        Videos::create([
            'name'     => $request->name,
            'source'     => $source->hashName(),
        ]);

        return redirect()->route('videos.index')->with('success','Video created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):View
    {
        $video = Videos::findOrFail($id);
        return view('videos.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        $videos = Videos::findOrFail($id);
        return view('videos.edit',compact('videos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Videos $videos,Request $request): RedirectResponse
    {
        $request->validate([
            'name'=>'required',
            'source'=>'required',
        ]);

        $videos->update($request->all());

        return redirect()->route('videos.index')->with('success','Video updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        $post_video = Videos::findOrFail($id);
        Storage::delete('public/posts/' . $post_video->source);

        $post_video->delete();

        return redirect()->route('videos.index')->with('success','Video deleted successfully');
    }
}
