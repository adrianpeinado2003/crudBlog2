@extends('layouts.plantilla')

@section('contenido')
        @if (Auth::check())
            <form action="postView">
                @csrf
                <button type="submit" class="btn btn-primary">Ver
                    posts</button>
            </form>
            <br>
            <form action="categoriaView">
                @csrf
                <button type="submit" class="btn btn-primary">Ver
                    categorías</button>
            </form>
        @else
            <form action="login">
                @csrf
                <button type="submit" class="btn btn-primary">Iniciar
                    sesión</button>
            </form>
            <br>
            <form action="register">
                @csrf
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </form>
        @endif
@endsection
