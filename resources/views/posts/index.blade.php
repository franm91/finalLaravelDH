@php
    $paises = ["Argentina", "Brasil", "Bolivia", "Colombia", "Chile", "Peru"];
@endphp

@extends('layouts.app')

@section('content')
  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-nav-color ">
      <div class="container">
        <a class="navbar-brand" href="#"> <img src="{{asset('images/mundo.png')}}" style="width:50px" alt=""></a>  
        <a class="navbar-brand oculto-sm mr-auto" href="#">Meet Travelers</a>  
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Profile
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
          
        <h4 class="ml-auto">Hola Prueba</h4>
        </div>
      </div>

    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

               <!-- Sidebar Widgets Column -->
               <div class="col-lg-3 col-md-4 oculto-sm">

                  <!-- Search Widget -->
                  <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                          <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                      </div>
                    </div>
                  </div>
        
                  <!-- Categories Widget -->
                  <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6">
                          <ul class="list-unstyled mb-0">
                            <li>
                              <a href="#">Web Design</a>
                            </li>
                            <li>
                              <a href="#">HTML</a>
                            </li>
                            <li>
                              <a href="#">Freebies</a>
                            </li>
                          </ul>
                        </div>
                        <div class="col-lg-6">
                          <ul class="list-unstyled mb-0">
                            <li>
                              <a href="#">JavaScript</a>
                            </li>
                            <li>
                              <a href="#">CSS</a>
                            </li>
                            <li>
                              <a href="#">Tutorials</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
        
                  <!-- Side Widget -->
                  <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                      You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                    </div>
                  </div>
        
                </div>

        <!-- Blog Entries Column -->

        

        <div class="col-lg-6 col-md-8">

          <div class="card my-4 p">
            <h5 class="card-header">Nuevo Posteo</h5>
            <div class="card-body">
              <input type="text" class="form-control mb-1">
              <div class="input-group">
                <textarea class="form-control" name="" id="" cols="50" rows="2"></textarea>
              </div>
              <div class="input-group my-2">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  Photo
                </button>
                <div class="collapse" id="collapseExample">
                  <div class="card card-body">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Blog Post -->
          @for ($i = 0; $i < 4; $i++)
            <div class="card mb-4">
              <div class="card-header text-dark">
                <img src="{{asset('images/usuario.png')}}" width="30px" alt="">
                <a href="#">Start Bootstrap</a>
              </div>
              <img class="card-img-top" src="http://placehold.it/750x200" alt="Card image cap">
              <div class="card-body">
                <h2 class="card-title">Post Title</h2>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                {{-- <a href="#" class="btn btn-primary">Read More &rarr;</a> --}}
              </div>
              <div class="card-footer text-muted">
                Posted on January 1, 2017 by
                <a href="#">Start Bootstrap</a>
              </div>
            </div>
          @endfor
          
          
          
          
          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-3 oculto-lg">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>

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
