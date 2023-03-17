@extends('layouts.plantilla')

@section('contenido')
{{--     <div class="flex justify-center">
        <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md"> --}}
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <input id="name" type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name" placeholder="Nombre" value="{{ old('name') }}" required autocomplete="name"
                            autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Contraseña" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <input id="password-confirm" type="password"
                            class="form-control"
                            name="password_confirmation" placeholder="Confirmar contraseña" required
                            autocomplete="new-password">
                    </div>

                    <div>
                        <button type="submit"
                            class="btn btn-primary">
                            REGISTRARSE
                        </button>
                    </div>
                </form>
{{--             </div>
        </div>
    </div> --}}
@endsection
