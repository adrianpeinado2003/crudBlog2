@extends('layouts.plantilla')

@section('contenido')
    @if (auth()->check())
        {{-- <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden"> --}}
        <table class="table align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">
                        ID
                    </th>
                    <th scope="col">
                        Nombre
                    </th>
                    <th scope="col">
                        Ver posts
                    </th>
                    @if (auth()->check())
                        @if (auth()->user()->role == 'admin')
                            <th scope="col">
                                Editar
                            </th>
                            <th scope="col">
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
                            <td scope="row">
                                {{ $c->id }}
                            </td>
                            <td scope="row">
                                {{ $c->nombre }}
                            </td>
                            <td scope="row">
                                <form action="/verPostsCategoria">
                                    <input type="text" id="id" name="id" value="{{ $c->id }}"
                                        style="display: none" />
                                    <button type="submit" class="btn btn-primary">Ver
                                        posts</button>
                                </form>
                            </td>
                            @if (auth()->check())
                                @if (auth()->user()->role == 'admin')
                                    <td scope="row">
                                        <form action="/editarCategoria" method="GET">
                                            <input type="text" id="id" name="id" value="{{ $c->id }}"
                                                style="display: none" />
                                            <input type="text" id="nombre" name="nombre" value="{{ $c->nombre }}"
                                                style="display: none" />
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                        </form>
                                    </td>
                                    <td scope="row">
                                        <form action="/categoriaDelete">
                                            <input type="text" id="id" name="id" value="{{ $c->id }}"
                                                style="display: none" />
                                            <button type="submit" class="btn btn-primary">Borrar</button>
                                        </form>
                                    </td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
        <br>
        {{-- </div>
                </div>
            </div>
        </div> --}}
        @if (auth()->check())
            @if (auth()->user()->role == 'admin')
                {{-- <div class="flex justify-center">
                    <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init> --}}
                <form action="añadirCategoria">
                    <button type="submit" class="btn btn-primary">Añadir
                        categoría</button>
                </form>
                <br>
                <form action="admin">
                    <button type="submit" class="btn btn-primary">Volver</button>
                </form>
            @else
                <form action="/">
                    <button type="submit" class="btn btn-primary">Volver</button>
                </form>
                {{--   </div>
                </div> --}}
            @endif
        @endif
    @else
        {{-- <div class="flex justify-center">
            <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init> --}}
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
        {{-- </div>
        </div> --}}
    @endif
@endsection
