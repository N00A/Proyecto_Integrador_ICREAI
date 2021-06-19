@extends('layouts.app')
@section('content')
<div class="container formSeparacionExt">


    <div class="row align-items-center">


        <div class="col">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-content text-center">
                            <img src="/uploads/fondos/logo brayan-01.png" class=" logo" alt="...">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-content">
                            <h1 style="color: white;">¡Crea nuevas historias!</h1>
                            <p>Únete a otras personas para crear escritos
                                nunca antes vistos, a través de la técnica cadáver exquisito</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-content">
                            <h1 style="color: white;">Usa la escritura creativa</h1>
                            <p>Escoge un género de tu interés y dale comienzo a una gran historia o bien continua desde
                                lo que escribió otra persona, lo importante es que dejes volar tus pensamientos y contribuyas
                                a crear textos llenos de creatividad, expresividad e imaginación.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-content">
                            <h1 style="color: white;">¿Que es el cadáver exquisito?</h1>
                            <p>Es un juego inventado por los surrealistas, que consiste en crear una obra en colaboración
                                ya sea un escrito o ilustración.</p>

                            <p>Concretamente cada persona escribe o dibuja en un papel su aportación y al terminar lo dobla
                                de forma que quede oculto, para que el siguiente participante lo continúe.</p>
                        </div>
                    </div>
                </div><br><br>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="card">
                <div class="card-header navbar-dark bg-dark shadow-sm whiteColor">{{ __('Bienvenido') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar sesión') }}
                                </button><br>

                                @if (Route::has('register'))

                                <a class="btn btn-link" href="{{ route('register') }}" style="color:  #30a5ff; user-select: none;">
                                    {{ __('Registrarse') }}
                                </a>

                                @endif

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color:  #30a5ff; user-select: none;">
                                    {{ __('Olvidaste tu contraseña?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>



</div>
@endsection