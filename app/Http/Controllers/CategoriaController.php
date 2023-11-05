<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //Obtener todos los productos
         $category = Categoria::all();

         // Devolver la vista con los datos
         return view('category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = new Categoria();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->cantidad = $request->cantidad;
        $producto->save();
        //CUANDO GUARDO REDIRECCCIONO A LA VISTA INDEX
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorias = Categoria::find($id);
        $categorias->update(['name' => 'Nuevo nombre de categoría']);
    
        return view('category.edit', ['categorias' => $categorias]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categorias)
    {
        // Obtenemos el registro existente de la base de datos
        $categoria = isset($categoria) && $categoria->exists() ? $categoria : new Categoria();
    
        // Actualizamos los valores del registro
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->cantidad = $request->cantidad;
    
        // Guardamos los cambios
        $categoria->save();
    
        // Redirigimos a la página de índice
        return redirect()->route('category.index')->with('success', 'Categoria actualizada correctamente');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorias = Categoria::find($id);
        $categorias->delete();

        return redirect()->route('category.index');
        

    }


    public function Grafico()
    {
        $barras = Categoria::all();

        $puntos = [];
        foreach($barras as $barra){
            $puntos [] = ['name' => $barra['nombre'], 'y'=> floatval($barra['cantidad'])];
        }
        return view("graficos", ["data" => json_encode($puntos)]);
    }

    public function pdf()
    {
        $category = Categoria::all();
        $pdf = Pdf::loadView('category.pdf', compact('category'));
        return $pdf->stream();
    }

}
