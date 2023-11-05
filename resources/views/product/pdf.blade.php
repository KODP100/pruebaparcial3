<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>

    <style>
        .cabecera{
            background-color: black;
            color: white;
        }


        h1{
          color: black;
        }

        table {
    border-collapse: collapse;
    width: 100%;
  }

  table, th, td {
    border: 1px solid black;
  }
    </style>


</head>
<body>
<title>Tabla de Productos</title>
<h1 class="text-center">categorias</h1> <br>
</head>
<body>
<table class="table" style="text-align: center;font-size: 20px">
  <thead class="cabecera">
    <tr>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>Stock</th>
      <th>Precio</th>
    </tr>
  </thead>
  <tbody>
  @foreach($product as $productos)
    <tr>
    <td>{{ $productos->nombre }}</td>
      <td>{{ $productos->descripcion }}</td>
      <td>{{ $productos->stock }}</td>
      <td>{{ $productos->precio }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

</body>
</html>
</body>
</html>