@extends('layouts.plantilla')

@section('contenido')
    <div class="flex justify-center">
        <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
            @if (auth()->check())
                <h1>Añadir Posts</h1>
                <br>
                <form action="/postCreate">
                    @csrf
                    <div>
                        <label for="nombre" class="form-label">Nombre</label>
                        @error('nombre')
                            <div>
                                <p style="color: red">Por favor, asigne un nombre</p>
                            </div>
                        @enderror
                        <input type="text" id="nombre" name="nombre"
                            class="form-control block
                        w-full
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                        form-control" />
                    </div>
                    <br>
                    <div>
                        <label for="contenido" class="form-label">Contenido</label>
                        @error('contenido')
                            <div>
                                <p style="color: red">Por favor, desarrolle un contenido</p>
                            </div>
                        @enderror
                        <textarea id="contenido" name="contenido" rows="4"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"></textarea>
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
                            class="form-control block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                            @isset($categorias)
                                @foreach ($categorias as $c)
                                    <option value="{{ $c->id }}">{{ $c->id }}. {{ $c->nombre }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <br>
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
            ease-in-out">Añadir</button>
                </form>
            @else
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
            @endif
        </div>
    </div>
@endsection
