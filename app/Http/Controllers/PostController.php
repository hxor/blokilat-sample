<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('pages.admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.post.create');
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
          'title' => 'required|string',
          'body' => 'required',
          'date' => 'required',
        ]);

        $data = [
          'user_id' => $request->user_id,
          'date' => $request->date,
          'category_id' => $request->category_id,
          'title' => $request->title,
          'body' => $request->body,
          'date' => $request->date,
          'image' => '',
          'status' => $request->status
        ];

        if ($request->hasFile('image')) {
            $fileName = str_slug($request->title, '-'). '.' .$request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . 'featured_image';
            $request->file('image')->move($destinationPath, $fileName);
            $data['image'] = $fileName;
        }

        Post::create($data);

        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('pages.admin.post.edit', compact('post'));
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
        $this->validate($request, [
          'title' => 'required|string',
          'body' => 'required',
          'date' => 'required',
        ]);

        $data = [
          'user_id' => $request->user_id,
          'date' => $request->date,
          'category_id' => $request->category_id,
          'title' => $request->title,
          'body' => $request->body,
          'date' => $request->date,
          'image' => '',
          'status' => $request->status
        ];

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $fileName = str_slug($request->title, '-'). '.' .$request->file('image')->getClientOriginalExtension();
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . 'featured_image';
            $request->file('image')->move($destinationPath, $fileName);
            $data['image'] = $fileName;
        } else {
            $data['image'] = $post->image;
        }

        $post->update($data);

        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->image) {
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . 'featured_image';
            unlink($destinationPath.'/'.$post->image);
        }

        $post->delete();

        return redirect()->route('admin.post.index');
    }
}
