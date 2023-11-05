<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        body {
            padding: 20px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav li {
            display: inline;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category.index') }}">Categorias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product.index') }}">Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('graficos.Grafico') }}">Grafico Barra</a>
            </li>
        </ul>
    </nav>

    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"
       class="btn btn-danger" style="position: absolute; top: 10px; right: 10px;">Salir</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="container mt-5">
        <h1>Bienvenido, {{ Auth::user()->name }}</h1>
        <p>Esta es tu página de inicio después de iniciar sesión.</p>
    </div>
    
    <div class="container mt-4">
        <h2>Productos</h2>
        <p>Aquí puedes ver nuestros productos.</p>
    </div>
</body>
</html>
