@extends('layouts.plantilla')

@section('contenido')
    @if (auth()->check())
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        ID
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Nombre
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Ver posts
                                    </th>
                                    @if (auth()->check())
                                        @if (auth()->user()->role == 'admin')
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Editar
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Borrar
                                            </th>
                                        @endif
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @isset($categorias)
                                    @foreach ($categorias as $c)
                                        <tr class="border-b">
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $c->id }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $c->nombre }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <form action="/verPostsCategoria">
                                                    <input type="text" id="id" name="id"
                                                        value="{{ $c->id }}" style="display: none" />
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
                                    ease-in-out">Ver
                                                        posts</button>
                                                </form>
                                            </td>
                                            @if (auth()->check())
                                                @if (auth()->user()->role == 'admin')
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        <form action="/editarCategoria" method="GET">
                                                            <input type="text" id="id" name="id"
                                                                value="{{ $c->id }}" style="display: none" />
                                                            <input type="text" id="nombre" name="nombre"
                                                                value="{{ $c->nombre }}" style="display: none" />
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
                                            ease-in-out">Editar</button>
                                                        </form>
                                                    </td>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                        <form action="/categoriaDelete">
                                                            <input type="text" id="id" name="id"
                                                                value="{{ $c->id }}" style="display: none" />
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
                                            ease-in-out">Borrar</button>
                                                        </form>
                                                    </td>
                                                @endif
                                            @endif
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if (auth()->check())
            @if (auth()->user()->role == 'admin')
                <div class="flex justify-center">
                    <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
                        <form action="añadirCategoria">
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
                    ease-in-out">Añadir
                                categoría</button>
                        </form>
                        <br>
                        <form action="admin">
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
                    ease-in-out">Volver</button>
                        </form>
                    @else
                        <form action="/">
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
                    ease-in-out">Volver</button>
                        </form>
                    </div>
                </div>
            @endif
        @endif
    @else
        <div class="flex justify-center">
            <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
                <form action="login">
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
            ease-in-out">Iniciar
                        sesión</button>
                </form>
                <br>
                <form action="register">
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
            ease-in-out">Registrarse</button>
                </form>
            </div>
        </div>
    @endif
@endsection
