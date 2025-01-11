<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('create');

    }

    public function ourfilestore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);


        $post = new Post;

        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;

        $post->save();
        return redirect()->route('home')->with('success', 'Post created successfully');


    }

    public function editData($id)
    {
        $post = Post::findOrFail($id);

        return view('edit', ['ourPost' => $post]);
    }

    public function updateData(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


//update post
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;


        //upload image
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }


        $post->save();
        return redirect()->route('home')->with('success', 'Post updated successfully');
    }

    public function deleteData(Request $request, $id)
    {

        $post = Post::findOrFail($id);
        $post->delete();
        flash()->success('Post deleted successfully.');
        return redirect()->route('home');

    }
    //
}
