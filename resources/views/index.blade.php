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
              <h5 class="card-header">Registro</h5>
              <div class="card-body">
                <div class="input-group">
                  <form class="form-group" method="POST" action="{{ route('register') }}"  enctype="multipart/form-data" novalidate>
                    @csrf
                    
                      <h2 class="text-align-center">Crea tu Cuenta</h2>
                    <div class="form-group row">
                        <input id="name" type="text" class="form-control mb-1{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Nombre">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                  
                        <input id="last_name" type="text" class="form-control mb-1{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="Apellido">
                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                            
                        <input id="email" type="email" class="form-control mb-1{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="email">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif


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
                      <div class="form-group row mb-1">
                        <div class="col-12">
                            <button class="btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Foto de perfil
                            </button>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input{{ $errors->has('avatar') ? ' is-invalid' : '' }}" id="avatar" name="avatar">
                                        
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('avatar'))
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </span>
                            @endif
                        </div>
                      </div>

                      <input id="password" type="password" class="form-control mb-1{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>

                      @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif

                      <input id="password-confirm" type="password" class="form-control mb-4" name="password_confirmation" placeholder="Repeti la contraseña" required>

        
                      <button type="submit" class="btn btn-primary btn-block">Confirm</button>
                    </div>
  
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
              <a href="/profile">
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
