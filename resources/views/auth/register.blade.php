@extends('templates.base')

@section('content')
<script>
var paisSelect = "{{ old('country') }}";
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card mt-5">
                <div class="card-header">Registrate</div>

                <div class="card-body">
                    <form method="POST" id="formulario" action="{{ route('register') }}"  enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                <span id="error_name" class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Apellido</label>
    
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required>
    
                                    <span id="error_last_name" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                      </span>
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                <span class="invalid-feedback" id="error_email" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <div class="col-md-6 offset-md-4">
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
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                  </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">Pais</label>
                            <div class="col-md-6">
                                <select class="form-control" name="country" id="countries">
                                    <option value="">Elegí un país</option>
                                </select>
                                <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('country') }}</strong>
                                  </span>
                            </div>
                        </div>
                        
                        <div class="form-group row" style="display: none" id="cityCont">
                            <label for="city" class="col-md-4 col-form-label text-md-right" >Provincia</label>
                            <div class="col-md-6">
                                <select class="form-control" name="city" id="cities">
                                </select>
                            </div>
                        </div>
					
                
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                <span id="error_password" class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/custom.js')}}"></script>
@endsection
