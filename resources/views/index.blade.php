@php
    $paises = ["Argentina", "Brasil", "Bolivia", "Colombia", "Chile", "Peru"];
@endphp

@extends('layouts.app')

@section('content')
  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-nav-color">
      <div class="container">
        <a class="navbar-brand" href="#"> <img src="{{asset('images/mundo.png')}}" style="width:50px" alt=""> Meet Travelers</a>    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
          
          <form class="form-inline ml-auto" action="/action_page.php">
            <div class="form-group mr-1">
              <input type="email" class="form-control" size="15" id="email" placeholder="Email">
            </div>
            <div class="form-group mr-1">
              <input type="password" class="form-control" size="10" id="pwd" placeholder="Password">
            </div>
            <div class="checkbox mr-1">
              <label class="mr-1"><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary">Enter</button>
          </form>
        </div>
      </div>

    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <h1 class="my-4 col-12 text-center">Bienvenido a Meet Travelers</h1>
        <div class="col-md-7">
          

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title text-center">Meet Travelers, Be a Traveler</h2>
              <p class="text-center">Conecta con miles de viajeros por el mundo, vive experiencias que nunca imaginarias.</p>
              <p class="text-center">Comparti tus consejos para otros viajeros.</p>
              <p class="text-center">Mostrale a todo el mundo tu viaje, quien sabe con quien te cruzaras mañana...</p>
              <h5 class="text-center"><strong>Viaja sin fronteras!!</strong></h5>
              <a href="#registro" class="btn btn-primary oculto btn-block">Be a Traveler!! &rarr;</a>
            </div>

          </div> 

        </div>

        {{-- <!-- Sidebar Widgets Column -->
        <div class="col-md-3 oculto">

          <!-- Search Widget -->
          <div class="card my-3 oculto">
            <h5 class="card-header">Log In</h5>
            <div class="card-body">
              <div class="input-group">
                <form action="/action_page.php">
                  <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd">
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Enter</button>
                </form>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4 oculto">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>
        </div> --}}


        <div class="col-md-5">

            <!-- Search Widget -->
            <div class="card">
              <h5 class="card-header">Register</h5>
              <div class="card-body">
                <div class="input-group">
                  <form id="registro" class="form-group" action="/action_page.php">
                    
                      <h2>crea tu cuenta</h2>
                      <input type="text" class="form-control mb-1" placeholder="Nombre" name="nombre" value="">
                      <input type="text" class="form-control mb-1" placeholder="Apellido" name="apellido" value="">
                      <input type="text" class="form-control mb-1" placeholder="Email" name="email" value="">
                      <select class="form-control mb-1" name="paisUsuario">
                        <option value=0>Seleccione un País</option>
                        <?php
                          foreach ($paises as $pais) {?>
                            <option
                              value="">
                                <?php echo $pais;?>
                            </option>
                        <?php } ?>
                      </select>
                      <input type="text" class="form-control mb-1" placeholder="Nombre de usuario" name="userName" value="">
                      <input  class="form-control-file mb-1" type="file" id="avatar" name="foto">
                      <input type="password" class="form-control mb-1" placeholder="Ingresa tu contraseña" name="contrasena">
                      <input type="password" class="form-control mb-1" placeholder="Repite tu contraseña" name="checkContrasena">

        
                      <button type="submit" class="btn btn-primary btn-block">Confirm</button>
  
                  </form>
                </div>
              </div>
            </div>
          </div>

        <!-- Blog Entries Column -->
        <div class="col-md-12">
  
            <!-- Blog Post -->
            @for ($i = 0; $i < 3; $i++)
              <div class="card mb-2">
                  
              <img class="card-img-top" src="http://placehold.it/750x100" alt="Card image cap">
              <div class="card-body">
                <p class="text-center">posteo</p>
              </div>
            </div> 
            @endfor
  
          </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-nav-color">
      <div class="container">
        <p class="m-0 text-center text-black">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

  </body>

@endsection
