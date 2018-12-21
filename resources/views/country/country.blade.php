
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
                    <h5 class="card-header">Posteo de paises</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-6">
                          <ul class="list-unstyled mb-0">
                            @for ($i = 0; $i < 3; $i++)
                              <li>
                                <a href="#">W</a>
                              </li>
                            @endfor
                          </ul>
                        </div>
                        <div class="col-lg-6">
                          <ul class="list-unstyled mb-0">
                              @for ($i = 0; $i < 3; $i++)
                              <li>
                                <a href="#">W</a>
                              </li>
                              @endfor
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
          <form action="/posts" method="post" enctype="multipart/form-data">
            @csrf
              <div>

                <button class="btn btn-primary btn-block my-4" type="button" data-toggle="collapse" data-target="#collapsePost" aria-expanded="false" aria-controls="collapsePost">
                  Crea un Posteo
                </button>

                <div class="card my-4 collapse" id="collapsePost">
                  <h5 class="card-header">Crea un posteo</h5>

                  <div class="card-body p-2">
                    <div >
                      <input id="title" type="text" class="form-control mb-1{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" placeholder="Titulo">
                        @if ($errors->has('title'))
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                          </span>
                        @endif
                    </div>

                    <div class="input-group">
                      <textarea class="form-control mb-1{{ $errors->has('text') ? ' is-invalid' : '' }}" name="text" id="text" cols="50" rows="2" placeholder="comentario">{{ old('text') }}
                      </textarea>
                      @if ($errors->has('text'))
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('text') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>

                  <div class="input-group my-2">
                    <button class="btn btn-info ml-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                      Photo
                    </button>
                    <div class="collapse" id="collapseExample">
                      <div class="card card-body">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input{{ $errors->has('attached') ? ' is-invalid' : '' }}" id="attached" name="attached">
                            @if ($errors->has('attached'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('attached') }}</strong>
                              </span>
                            @endif
                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                      </div>
                    </div>
                    @if ($errors->has('attached'))
                      <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('attached') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group row">
                    <label for="country" class="col-md-4 col-form-label text-md-right">Pais</label>
                    <div class="col-md-6">
                        <select class="form-control" name="country" id="countries">
                            <option value="">Elegí un país</option>
                        </select>
                        @if ($errors->has('country'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group row" style="display: none" id="cityCont">
                    <label for="city" class="col-md-4 col-form-label text-md-right" >Provincia</label>
                    <div class="col-md-6">
                        <select class="form-control" name="city" id="cities">
                        </select>
                    </div>
                </div>
                
                <button class="btn btn-primary btn-block" type="submit">
                  Postear
                </button>
              </div>
            </div>
              @if ($errors->first('text') | $errors->first('attached') | $errors->first('title'))
              <span class="text-danger" role="alert">
                <p class="text-center">
                  <strong>Error en el posteo</strong>
                </p>
              </span>
              @endif         
          </form>
          
          <!-- Blog Post -->
          
          <div>
                    
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
            {{$posts->links()}}
              
            
        </div>
        </div>

        
        </div>

      </div>
      <!-- /.row -->

    </div>

   

  </body>

@endsection
