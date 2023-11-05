<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Agrega el enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados para centrar el formulario */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="{{ route('category.store') }}" method="POST" class="mb-3">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                <input type="text" require=required name='nombre' class="form-control form-control-lg" id="exampleFormControlInput1" placeholder="Titulo de la categoria">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                <textarea name='descripcion' require=required class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="col-md-6">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" min="0">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Agregar</button>
            </div>
        </form>
    </div>
</body>
</html>
