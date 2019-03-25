<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostController extends Controller
{
  public function create()
      {
          return view('createpost');
      }

     public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'tags' => 'required',
        ]);

    	$data = $request->all();
    	$tags = explode(",", $request->tags);


    	$post = Post::create($data);
        $post->tag($tags);


        return redirect('post')->with('success','Post created successfully');
    }

    public function index()
   {
       $posts = Post::all();
       return view('post',compact('posts'));
   }
}
