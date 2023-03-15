@extends('layouts.plantilla')

@section('contenido')
    <div class="flex justify-center">
        <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-6">
                        <input id="email" type="email"
                            class="form-control block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                    form-control @error('email') is-invalid @enderror"
                            name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email"
                            autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-6">
                        <input id="password" type="password"
                            class="form-control block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                    form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Contraseña" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-6">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Recuérdame
                        </label>
                    </div>

                    <div class="form-group mb-6">
                        <button type="submit"
                            class="w-full
                px-6
                py-2.5
                bg-blue-600
                text-black
                font-medium
                text-xs
                leading-tight
                uppercase
                rounded
                shadow-md
                hover:bg-blue-700 hover:shadow-lg
                focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                active:bg-blue-800 active:shadow-lg
                transition
                duration-150
                ease-in-out">
                            Iniciar sesión
                        </button>

                        {{-- @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        ¿Ha olvidado su contraseña?
                    </a>
                @endif --}}

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
