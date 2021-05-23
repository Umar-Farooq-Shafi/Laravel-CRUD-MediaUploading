<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\EditPostRequest;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get first 10 post from db
        return view('posts.index', [
            'posts' => Post::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // ddd($request->file('image')->getClientOriginalExtension());

        $file = $request->file('image');
        $destinationPath = 'files/';
        $file_name = time() . "." . $file->getClientOriginalExtension();
        $file->move($destinationPath, $file_name);

        // Saving into database using Laravel model
        Post::create([
            'title' => $request->title,
            'created_by' => $request->created_by,
            'description' => $request->description,
            'st_email' => $request->st_email,
            'is_active' => isset($request->is_active) ? 1 : 0,
            'name' => $file_name
        ]);

        // Printing out success message to screen
        flash('Post created successfully');

        // redirecting user to index route
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // View single post by id
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, Post $post)
    {
        // ddd($request->file('image'));
        // ddd(substr($request->image, strpos($request->image, "."), 5));


        $file = $request->file('image');
        $destinationPath = 'files/';
        $file_name = time() . "." . $file->getClientOriginalExtension();
        $file->move($destinationPath, $file_name);
        // $request->image->storeAs()

        $affected = DB::table('posts')
            ->where('id', $post->id)
            ->update([
                'title' => $request->title,
                'created_by' => $request->created_by,
                'description' => $request->description,
                'st_email' => $request->st_email,
                'is_active' => isset($request->is_active) ? 1 : 0,
                'name' => $file_name
            ]);
        // $affected->save();

       // ddd($affected);

        flash("Post updated successfully");
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        DB::delete('delete from posts where id = ?', [$post->id]);

        flash("Post Deleted Successfully");
        return redirect()->back();
    }
}
