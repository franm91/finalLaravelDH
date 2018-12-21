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
        $posts = \Auth::user()->posts()->get();
        return view('auth.profile')->with(compact('user', 'posts'));
      }else{
        return redirect('login');
      }
  }


  public function faq(){
    $faqArr = [
      "A que nos dedicamos?" => "Somos una red social para conectar viajeros por todo el mundo y poder compartir las experiancias de viaje con todos",
      "Que necesito para registrarme?" => "Es muy facil, solo tenes que llenar el formulario en la pagina de registro y ya sos parte de la comunidad de viajeros mas grande",
      "Hay que tener pasaporte?" => "No es obligatorio para registrarte pero si te va a servir para ampliar tus experiencias viajeras",
      "Que diferencia tiene con otras redes sociales?" => "Con Meet Travelers no tenes que conocer a la otra persona para conocer sus experiencias, vas a poder saber todos los tips de cada ciudad y aprovechar al maximo tu estadia, vas a ser local en todo el mundo!",
      "Puedo conectarme con el celular?" => "Obvio que si, la pagina se adapta tanto para mobile como para desktop y tablet!",
      "Como hago para empezar a compartir historias y tips?" => "Una vez que estes registrado ya podes empezar a postear y ver los posteos de otros viaje@s",
  ];
  return view('faq')->with('faqArr', $faqArr);
  
  }


}
