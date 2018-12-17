

@extends('templates.base')

@section('content')
 
   

    <!-- Page Content -->
    <div class="container mt-5">

      <div class="row">

               <!-- Sidebar Widgets Column -->
               <div class="col-lg-4 col-md-4 oculto-sm">

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

        

        <div class="col-lg-8 col-md-8">

 
          <!-- Blog Post -->
   
            <div class="card mt-4">
              <div class="card-header text-dark">
                <a href="">
                  <img class="rounded-circle" src="/storage/avatars/{{$post->user->avatar}}" width="40px" alt=""
                  >
                  {{$post->user->getFullName()}} 
                </a>

              </div>

              <div>

                {{-- poner un foreach de todas las fotos que se subieron al posteo, un mini preview de imagenes y que otra vista te lleve a las imagenes --}}

              </div>
              
             {{$post->attached ? '<img class="card-img" src="storage/avatars/" alt="Card image cap">' : ""}}

              <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                <p class="card-text">{{$post->text}}</p>
                {{-- <a href="#" class="btn btn-primary">Read More &rarr;</a> --}}
              </div>
              <div class="card-footer text-muted">
                {{$post->created_at}}
                <a href="#"></a>
              </div>
            </div>
    
          
          
          
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

@endsection
