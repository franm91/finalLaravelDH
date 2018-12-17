@php
    $paises = ["Argentina", "Brasil", "Bolivia", "Colombia", "Chile", "Peru"];
@endphp

@extends('templates.base')

@section('title', 'Bienvenido a Meet Travelers')

@section('content')


    <!-- Page Content -->
    <div class="container mt-5">

      <div class="row">

        <!-- Blog Entries Column -->
        <h1 class="my-4 col-12 text-center">Bienvenido a Meet Travelers</h1>
        <div class="col-md-7">
          

          <!-- Blog Post -->
          <div class="card mb-4">
            <div class="card-body">
              <h2 class="card-title text-center">Meet Travelers, Be a Traveler</h2>
              <p class="text-center">Conecta con miles de viajeros por el mundo, vive experiencias que nunca imaginarias.</p>
              <p class="text-center">Comparti tus consejos para otros viajeros.</p>
              <p class="text-center">Mostrale a todo el mundo tu viaje, quien sabe con quien te cruzaras mañana...</p>
              <h5 class="text-center"><strong>Viaja sin fronteras!!</strong></h5>
              <a href="#registro" class="btn btn-primary oculto-md btn-block">Be a Traveler!! &rarr;</a>
            </div>
            <img class="" src="/images/turismo2.jpg" width="633" alt="Card image cap">

          </div> 

        </div>


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
            @foreach ($posts as $post)      
                    
           
            <div class="card mb-4">
              <a href="#">
                <div class="card-header text-dark">
                  <img class="rounded-circle"src="storage/avatars/{{$post->user->avatar}}" width="30px" alt=""> {{$post->user->getFullName()}}
                </div>
              </a>
            <div class="card-body">
              <h2 class="card-title">{{$post->title}}</h2>
              @if ($post->attached !== null)
              <img class="card-img-top" src="storage/posts/{{$post->attached}}" alt="Card image cap">
              @endif
            </div>
            <div class="card-body">
              <p class="card-text">{{$post->text}}</p>
              {{-- <a href="#" class="btn btn-primary">Read More &rarr;</a> --}}
            </div>
            <div class="card-footer text-muted">
              Posteado el: {{$post->created_at}}
            </div>
          </div>

          @endforeach
  
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
