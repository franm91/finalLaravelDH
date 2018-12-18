<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (\Auth::check()){
        return redirect('profile');
      }


      $posts = Post::orderBy('created_at', 'desc')->paginate(4);
        
      return view('index')->with(compact('posts'));
    }

    public function showProfile(){
      $user = \Auth::user();
      if($user){
        return view('auth.profile')->with(compact('user'));
      }else{
        return redirect('login');
      }
  }
}
