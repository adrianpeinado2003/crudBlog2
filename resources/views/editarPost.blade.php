@extends('layouts.plantilla')

@section('contenido')
{{--     <div class="flex justify-center">
        <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init> --}}
            @if (auth()->check())
                <h1>Editar Post</h1>
                <br>
                <form action="/postEdit">
                    @csrf
                    <input type="text" id="id" name="id" value="{{ $_GET['id'] }}" style="display: none" />
                    <div>
                        <label for="nombre" class="form-label">Nombre</label>
                        @error('nombre')
                            <div>
                                <p style="color: red">Por favor, asigne un nombre</p>
                            </div>
                        @enderror
                        <input type="text" id="nombre" name="nombre" placeholder="{{ $_GET['nombre'] }}"
                            class="form-control" />
                    </div>
                    <br>
                    <div>
                        <label for="nombre" class="form-label">Contenido</label>
                        @error('contenido')
                            <div>
                                <p style="color: red">Por favor, desarrolle un contenido</p>
                            </div>
                        @enderror
                        <textarea type="text" id="contenido" name="contenido" placeholder="{{ $_GET['contenido'] }}"
                        class="form-control rounded-0"></textarea>
                    </div>
                    <br>
                    <div>
                        <label for="categoria" class="form-label">Categoría</label>
                        @error('categoria')
                            <div>
                                <p style="color: red">Por favor, seleccione una categoria</p>
                            </div>
                        @enderror
                        <select name="categoria" id="categoria"
                            class="form-control">
                            @isset($categorias)
                                @foreach ($categorias as $c)
                                    <option value="{{ $c->id }}">{{ $c->id }}. {{ $c->nombre }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <br>
                    <button type="submit"
                        class="btn btn-primary">Editar</button>
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
