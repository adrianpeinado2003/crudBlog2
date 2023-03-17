@extends('layouts.plantilla')

@section('contenido')
    {{-- <div class="flex justify-center">
        <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md"> --}}
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email"
                            autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Contraseña" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Recuérdame
                        </label>
                    </div>

                    <div>
                        <button type="submit"
                            class="btn btn-primary">
                            Iniciar sesión
                        </button>

                        {{-- @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        ¿Ha olvidado su contraseña?
                    </a>
                @endif --}}

                    </div>
                </form>
{{--             </div>
        </div>
    </div> --}}
@endsection
