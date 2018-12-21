<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::orderBy('created_at', 'desc')->paginate(4);

      return view('posts.index')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('posts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post;
        $this->storeAndUpdate($request, $post);
		return redirect('/posts'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->with(compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_id = Auth::user()->id;
		$post = Post::find($id);
		if ($user_id == $post->user_id) {
			return view('post.edit')->with(compact('post'));
		}
		return redirect('/posts/' . $id)->with('alert', 'No podés editar un producto que no es tuyo');
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
        $post = Post::find($id);
		$this->storeAndUpdate($request, $post);
		return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
		$post->delete();
		return redirect('/posts');
    }

    public function storeAndUpdate($request, $post)
	{
		$post->title = $request->input('title');
		$post->text = $request->input('text');
		$post->country = $request->input('country');
    //	$post->city = $request->input('city');
    

        // Traemos todo el objeto de imagen
        
        if ($request->file('attached') !== null) {
            
            $postImage = $request->file('attached');
            // Armo un nombre único para este archivo
            $imageName = uniqid("post_img_") . "." . $postImage->extension();
            // Subo el archivo de imagen
            $postImage->storePubliclyAs("public/posts", $imageName);
            // Lo guardamos en base de datos
            $post->attached = $imageName;
        }
		$post->user_id = Auth::user()->id;
		$post->save();
    }
    

    public function byCountry($country){
        $posts = \App\Post::where('country', $country)->get();
        return view('country.country')->with(compact('posts'));
    }
}



