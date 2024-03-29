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
                        Contenido
                    </th>
                    <th scope="col">
                        Ver posts categoría
                    </th>
                    <th scope="col">
                        Ver posts autor
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
                @isset($posts)
                    @foreach ($posts as $p)
                        <tr class="border-b">
                            <td scope="row">
                                {{ $p->id }}
                            </td>
                            <td scope="row">
                                {{ $p->nombre }}
                            </td>
                            <td scope="row">
                                {{ $p->contenido }}
                            </td>
                            <td scope="row">
                                <form action="/verCategoriaPosts">
                                    <input type="text" id="id" name="id" value="{{ $p->id_categoria }}"
                                        style="display: none" />
                                    <button type="submit" class="btn btn-primary">Ver posts</button>
                                </form>
                            </td>
                            <td scope="row">
                                <form action="/verAutorPosts">
                                    <input type="text" id="id" name="id" value="{{ $p->id_autor }}"
                                        style="display: none" />
                                    <button type="submit" class="btn btn-primary">Ver posts</button>
                                </form>
                            </td>
                            @if (auth()->check())
                                @if (auth()->user()->role == 'admin')
                                    <td scope="row">
                                        <form action="/editarPost" method="GET">
                                            <input type="text" id="id" name="id" value="{{ $p->id }}"
                                                style="display: none" />
                                            <input type="text" id="nombre" name="nombre" value="{{ $p->nombre }}"
                                                style="display: none" />
                                            <input type="text" id="contenido" name="contenido" value="{{ $p->contenido }}"
                                                style="display: none" />
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                        </form>
                                    </td>
                                    <td scope="row">
                                        <form action="/postDelete">
                                            <input type="text" id="id" name="id" value="{{ $p->id }}"
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
        <div class="box" style="display: flex">
            @isset($posts)
                @foreach ($posts as $p)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $p->nombre }}</h5>
                            <p class="card-text">{{ $p->contenido }}</p>
                            <div class="box" style="display: flex">
                                <div>
                                    <a>
                                        <form action="/editarPost" method="GET">
                                            <input type="text" id="id" name="id" value="{{ $p->id }}"
                                                style="display: none" />
                                            <input type="text" id="nombre" name="nombre" value="{{ $p->nombre }}"
                                                style="display: none" />
                                            <input type="text" id="contenido" name="contenido" value="{{ $p->contenido }}"
                                                style="display: none" />
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                        </form>
                                    </a>
                                </div>
                                <div>
                                    <a>
                                        <form action="/postDelete">
                                            <input type="text" id="id" name="id" value="{{ $p->id }}"
                                                style="display: none" />
                                            <button type="submit" class="btn btn-primary">Borrar</button>
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endisset
        <br>
        {{-- </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="flex justify-center">
                    <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init> --}}
        <form action="añadirPost">
            <button type="submit" class="btn btn-primary">Añadir
                post</button>
        </form>
        <br>
        <form action="verMisPosts">
            <button type="submit" class="btn btn-primary">Ver mis
                posts</button>
        </form>
        <br>
        @if (auth()->check())
            @if (auth()->user()->role == 'admin')
                <form action="admin">
                    <button type="submit" class="btn btn-primary">Volver</button>
                </form>
            @else
                <form action="/">
                    <button type="submit" class="btn btn-primary">Volver</button>
                </form>
                {{--  </div>
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
