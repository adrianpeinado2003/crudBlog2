@extends('layouts.plantilla')

@section('contenido')
    <div class="flex justify-center">
        <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
            @if (Auth::check())
                <form action="postView">
                    @csrf
                    <button type="submit"
                        class="btn btn-primary">Ver
                        posts</button>
                </form>
                <br>
                <form action="categoriaView">
                    @csrf
                    <button type="submit"
                        class="btn btn-primary">Ver
                        categorías</button>
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
        </div>
    </div>
@endsection
