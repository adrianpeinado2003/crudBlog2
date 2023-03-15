@extends('layouts.plantilla')

@section('contenido')
    <div class="flex justify-center">
        <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
            @if (auth()->check())
                <h1>Editar Perfil</h1>
                <br>
                <form action="/userEditFromSession">
                    @csrf
                    <input type="text" id="id" name="id" value="Auth::id()" style="display: none" />
                    <div>
                        <label for="nombre">Nombre</label>
                        @error('nombre')
                            <div>
                                <p style="color: red">Por favor, asigne un nombre</p>
                            </div>
                        @enderror
                        <input type="text" id="nombre" name="nombre" placeholder="{{ Auth::user()->name }}"
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
                        <label for="email">Email</label>
                        @error('email')
                            <div>
                                <p style="color: red">Por favor, asigne un email</p>
                            </div>
                        @enderror
                        <input type="text" id="email" name="email" placeholder="{{ Auth::user()->email }}"
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
