

@extends('templates.base')

@section('content')
 
   

    <!-- Page Content -->
    <div class="container mt-5">

      <div class="row">

               <!-- Sidebar Widgets Column -->
               <div class="col-lg-4 col-md-4 oculto-sm">

        
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
              
              @if ($post->attached !== null)
                <img class="card-img-top" src="/storage/posts/{{$post->attached}}" alt="Card image cap">
                @endif

              <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                <p class="card-text">{{$post->text}}</p>
                {{-- <a href="#" class="btn btn-primary">Read More &rarr;</a> --}}
              </div>
              <div class="card-footer text-muted">
                Posteado el: {{$post->created_at}} desde  <a href="/country/{{$post->country}}"> {{$post->country}}</a>


                @auth
                @if ($post->user_id == Auth::user()->id )
                  
                  <form action="/posts/{{ $post->id }}" method="post" style="display: inline-block;">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button id="delete" type="submit" class="btn btn-outline-danger">Delete</button>
                  </form>
                @endif
              @endauth
            
            
          
              </div>
            </div>
    
          
   
        </div>

       

      </div>
      <!-- /.row -->

    </div>



@endsection
