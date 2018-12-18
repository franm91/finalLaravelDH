

<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-nav-color">
   <div class="container">
      <a class="navbar-brand" href="/index"> <img src="{{asset('images/mundo.png')}}" style="width:50px" alt=""> Meet Travelers</a>  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <!-- Left Side Of Navbar -->
         <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
               <a class="nav-link" href="/posts">Home
                  <span class="sr-only">(current)</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">FAQ</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Contact</a>
            </li>
         </ul>

         <!-- Right Side Of Navbar -->
         <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
               <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
               @if (Route::has('register'))
                  <a class="nav-link" href="{{ route('register') }}">Registrate</a>
               @endif
            </li>
            @else

        
               @if(Auth::check())
                   <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                     <span class="nav-link text-light">
                          <a class="font-weight-bold text-white" href="/profile">
                           <img class="rounded-circle" src="storage/avatars/{{Auth::user()->avatar}}" width="44px" alt="">  
                           {{Auth::user()->getFullName()}}</a>
                     </span>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                     Cerrar Sesion
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                     </form>
                   </li>
               @else
                   <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                       <a class="nav-link font-weight-bold" href="{{route('login')}}">Iniciar sesión</a>
                   </li>
                   <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                       <a class="nav-link font-weight-bold" href="{{route('register')}}">Registrarse</a>
                   </li>
               @endif
           </ul>
            @endguest
         </ul>
      </div>
   </div>
</nav>