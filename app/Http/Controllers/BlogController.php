<?php

namespace App\Http\Controllers;

use App\Models\Blog;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.blogs', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs.partials.blogs_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'title.en' => 'required|string',
            'title.fr' => 'required|string',
            'title.ar' => 'required|string',
            'description' => 'required',
            'description.en' => 'required|string',
            'description.fr' => 'required|string',
            'description.ar' => 'required|string',
            'image' => 'required|mimes:png,jpg,jfif,webp',
        ]);

        $image = $request->file('image');
        if ($image) {
            $imageName = $this->uploadFile($request->file('image'), "/blog/");

            $blog = Blog::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'image' => $imageName,
                'user_id'=> Auth::user()->id
            ]);

        }



        if ($blog instanceof Model) {
            return redirect()->route('blogs.index')->with('success', 'Blog has been created successfully!');
        } else {
            return redirect()->route('blogs.index')->with('error', 'Something Went Wrong. Try Again.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blogs.partials.blogs_edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        request()->validate([
            'title' => 'required',
            'title.en' => 'required|string',
            'title.fr' => 'required|string',
            'title.ar' => 'required|string',
            'description' => 'required',
            'description.en' => 'required|string',
            'description.fr' => 'required|string',
            'description.ar' => 'required|string',
        ]);

        $theImg = $request->image;
        if ($theImg) {
            Storage::disk('public')->delete('images/blog/' . $blog->image);
            $imageName = $this->uploadFile($request->file('image'), "/blog/");
        }

        $blog->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $theImg ? $imageName : $blog->image,
        ]);

        return back()->with('success', 'Blog Updated Successfully!!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Storage::disk('public')->delete('images/blog/' . $blog->image);
        $blog->delete();
        return back()->with('success', 'Blog has been deleted successuflly');
    }
}
