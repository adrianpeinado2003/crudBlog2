@extends('layouts.plantilla')

@section('contenido')
{{--     <div class="flex justify-center">
        <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init> --}}
            @if (auth()->check())
                <h1>Añadir Usuarios</h1>
                <br>
                <form action="/userCreate">
                    @csrf
                    <div>
                        <label for="nombre" class="form-label">Nombre</label>
                        @error('nombre')
                            <div>
                                <p style="color: red">Por favor, asigne un nombre</p>
                            </div>
                        @enderror
                        <input type="text" id="nombre" name="nombre"
                            class="form-control"/>
                    </div>
                    <br>
                    <div>
                        <label for="email" class="form-label">Email</label>
                        @error('email')
                            <div>
                                <p style="color: red">Por favor, asigne un email</p>
                            </div>
                        @enderror
                        <input type="text" id="email" name="email"
                            class="form-control"/>
                    </div>
                    <br>
                    <div>
                        <label for="contraseña" class="form-label">Contraseña</label>
                        @error('contraseña')
                            <div>
                                <p style="color: red">Por favor, asigne une contraseña</p>
                            </div>
                        @enderror
                        <input type="password" id="contraseña" name="contraseña"
                            class="form-control"/>
                    </div>
                    <br>
                    <button type="submit"
                        class="btn btn-primary">Añadir</button>
                </form>
            @else
                <form action="login">
                    @csrf
                    <button type="submit"
                        class="btn btn-primary">Iniciar
                        sesión</button>
                </form>
                <br>
                <form action="register">
                    @csrf
                    <button type="submit"
                        class="btn btn-primary">Registrarse</button>
                </form>
            @endif
{{--         </div>
    </div> --}}
@endsection
