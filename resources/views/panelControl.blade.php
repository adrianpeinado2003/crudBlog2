@extends('layouts.plantilla')

@section('contenido')
    <div class="flex justify-center">
        <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
            <form action="postView">
                @csrf
                <button type="submit"
                    class="btn btn-primary">Posts</button>
            </form>
            <br>
            <form action="categoriaView">
                @csrf
                <button type="submit"
                    class="btn btn-primary">Categorías</button>
            </form>
            <br>
            <form action="userView">
                @csrf
                <button type="submit"
                    class="btn btn-primary">Usuarios</button>
            </form>
        </div>
    </div>
@endsection
