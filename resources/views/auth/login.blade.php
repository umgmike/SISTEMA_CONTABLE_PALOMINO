@extends('layouts.layout')

@section('Title')
    Login
@endsection

@section('content-login')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="single-blog-post">
                    <div class="card-header" style="font-size: 20px; color:#DFDEDE">
                        <img src="{{ asset("assets/uza/img/core-img/oficina-contable-palomino.jpeg") }}" alt="">
                        <div class="text-center">
                            <b><p>Control de acceso</p></b>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-gray-light">Login</div>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="usuario" class="col-md-4 col-form-label text-md-right">{{ __('Usuario : ') }}</label>

                                <div class="col-md-6">
                                    <input id="usuario" type="text" class="form-control @error('usuario') is-invalid @enderror" name="usuario" value="{{ old('usuario') }}" required autocomplete="off" autofocus title="Ingrese nombre de la empresa">

                                    @error('usuario')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" title="Ingrese contraseña">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_empresa" class="col-md-4 col-form-label text-md-right">{{ __('Seleccione Empresa :') }}</label>
    
                                <div class="col-md-6">
                                    <select id="id_empresa" name="id_empresa" class="form-control select2 tooltipsC @error('id_empresa') is-invalid @enderror"  title="Seleccione Empresa">
                                        @if (count($ltsEmpresa))
                                          @foreach($ltsEmpresa as $item)
                                              <option value="{{$item->id}}"> {{ $item->nombre_establecimiento}}</option>
                                          @endforeach
                                        @elseif ($ltsEmpresa != '')
                                            <option value="">No se encuentró ningún registro</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordar contraseña') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary btn-block">
                                        <strong>{{ __('Acceso') }}</strong>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="text-center" style="color: #DFDEDE">
                            Copyrights &copy;<script>document.write(new Date().getFullYear());</script> All     rights reserved | SYSTEM-JOHHAN
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
