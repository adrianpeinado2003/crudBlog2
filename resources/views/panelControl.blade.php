@extends('layouts.plantilla')

@section('contenido')
    <div class="flex justify-center">
        <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
            <form action="postView">
                @csrf
                <button type="submit"
                    class="
        w-full
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
        ease-in-out">Posts</button>
            </form>
            <br>
            <form action="categoriaView">
                @csrf
                <button type="submit"
                    class="
        w-full
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
        ease-in-out">Categorías</button>
            </form>
            <br>
            <form action="userView">
                @csrf
                <button type="submit"
                    class="
        w-full
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
        ease-in-out">Usuarios</button>
            </form>
        </div>
    </div>
@endsection
