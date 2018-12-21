@extends('templates.base')

@section('title', $user->getFullName())

@section('content')
<script>
   var paisSelect = "{{ old('country') }}";
   </script>
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
                     <div class="card my-4 align">
                       <h5 class="card-header">{{$user->getFullName()}}</h5>
                       <div class="card-body mx-auto">
                        <img class="rounded-circle mb-1" src="/storage/avatars/{{$user->avatar}}" width="100%" alt="">                         
                         <div class="row">
                           <div class="col-12">
                             <ul> <h6> Listado de paises donde estuviste</h6>
                             
                               
                            

                               @foreach ($posts as $post)
                                @if ($post->country !== null)
                                  <li>
                                    <a href="/posts/{{$post->id}}">{{$post->country}}</a>
                                  </li>
                                
                                @else

                                <li>:( no comentaste de ningun pais todavia</li>
                                  @break
                                @endif
                                   
                               @endforeach
                              </ul>
                              
               
                           </div>
                         </div>
                       </div>
                     </div>
           
                     
                   </div>
   
           <!-- Blog Entries Column -->
   
           
           <div class="col-lg-  8 col-md-8">
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
            
   
           <div class="col-lg-12 col-md-12">
   
    
             <!-- Blog Post -->
      
              
              @forelse ($posts as $post)
              <div class="card mt-4">
               <div class="card-header text-dark">
                 <a href="/posts/{{$post->id}}">
                   <img class="rounded-circle" src="/storage/avatars/{{$user->avatar}}" width="40px" alt=""
                   >
                   {{$user->getFullName()}} 
                 </a>
 
               </div>
 
               <div>
 
                 {{-- poner un foreach de todas las fotos que se subieron al posteo, un mini preview de imagenes y que otra vista te lleve a las imagenes --}}
 
               </div>

              @if ($post->attached)
                <img class="card-img" src="/storage/posts/{{$post->attached}}" alt="Card image cap">
              @endif
   
              <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                <p class="card-text">{{$post->text}}</p>
                {{-- <a href="#" class="btn btn-primary">Read More &rarr;</a> --}}
              </div>
              <div class="card-footer text-muted">
                {{$post->created_at}}
                Posteado en <a href="/country/{{$post->country}}">
                  {{$post->country}}
                </a>
              </div>
            </div>
              @empty
              <div class="card-body">
               <h2 class="card-title"></h2>
               <p class="card-text">el usuario no hizo ningun posteo</p>
               {{-- <a href="#" class="btn btn-primary">Read More &rarr;</a> --}}
             </div>
           </div>
                  
              @endforelse
         
       
             
             
        
   
           </div>
   
          
   
         </div>
         <!-- /.row -->
   
       </div>

@endsection