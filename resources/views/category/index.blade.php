<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.11/dist/sweetalert2.all.min.js"></script>

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
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category.pdf') }}">Informe categoria</a>
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
    <div class="container">
        <h1>Tabla de Categoría</h1>
        <a href="{{ route('category.create') }}" class="btn btn-primary mb-2">Agregar</a>
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $categorias)
                    <tr>
                        <td>{{ $categorias->nombre }}</td>
                        <td>{{ $categorias->descripcion }}</td>
                        <td>{{ $categorias->cantidad }}</td>
                        <td style="display: flex; gap: 5px;">
                            <form action="{{ route('category.edit', $categorias->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm">Editar</button>
                            </form>
                            <form action="{{ route('category.destroy', $categorias->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm eliminar-tarea">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
   document.addEventListener('DOMContentLoaded', function () {
    // Selecciona todos los botones con la clase "eliminar-tarea"
    const deleteButtons = document.querySelectorAll('.eliminar-tarea');

    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Evita que el formulario se envíe de inmediato
            event.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // El formulario se envía si el usuario confirma
                    button.closest('form').submit();
                }
            });
        });
    });
});

</script>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#example').DataTable({
                paging: true,
                lengthMenu: [10, 25, 50, 100],
                pageLength: 10
            });
        });
    </script>
</body>
</html>

