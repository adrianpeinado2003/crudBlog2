<!DOCTYPE html>
<html lang="es">

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>BLOGGER</title>
</head>

<body>
    <header>
        <nav
        class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid w-full flex flex-wrap items-center justify-between px-6">
                <!-- Left links -->
                <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
                    <a class="
    flex
    items-center
    text-gray-900
    hover:text-gray-900
    focus:text-gray-900
    mt-2
    lg:mt-0
    mr-1
  "
                        href="/">
                        <img src="img/logo.jpg" style="height: 5rem" alt="" loading="lazy" />
                    </a>
                </ul>
                <!-- Left links -->
                <!-- Collapsible wrapper -->
                @if (Auth::check())
                    <div class="flex items-center relative">
                        <div class="dropdown relative">
                            <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
                                <li>
                                    <div class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            Cerrar sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                <li>
                                    <a href="/editarPerfil"
                                        id="dropdownMenuButton2" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <img src="img/avatar.png" class="rounded-full" style="height: 25px; width: 25px"
                                            alt="" loading="lazy" />{{ Auth::user()->name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <!-- Right elements -->
                    <div class="flex items-center relative">
                        <div class="dropdown relative">

                            <ul class="navbar-nav flex flex-col pl-0 list-style-none mr-auto">
                                <li class="nav-item p-2">
                                    <a class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0"
                                        href="/register">Registrarse</a>
                                </li>
                                <li class="nav-item p-2">
                                    <a class="nav-link text-gray-500 hover:text-gray-700 focus:text-gray-700 p-0"
                                        href="/login">Iniciar sesión</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                @endif
                <!-- Right elements -->
            </div>
        </nav>
    </header>

    <main style="padding: 5%">
        @yield('contenido')
    </main>

    <footer>
        <div class="text-gray-700 text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-gray-800">Taller Empresarial 2.0</a>
        </div>
    </footer>
</body>

</html>
