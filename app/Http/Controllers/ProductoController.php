<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtener todos los productos
        $product = producto::all();

        // Devolver la vista con los datos
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->stock = $request->stock;
        $producto->precio = $request->precio;
        $producto->save();
        //CUANDO GUARDO REDIRECCCIONO A LA VISTA INDEX
        return redirect()->route('product.index');
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
    public function edit(string $id)
    {
        $productos = Producto::find($id);
        $productos->update(['name' => 'Nuevo nombre de categoría']);
    
        return view('product.edit', ['productos' => $productos]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->stock = $request->stock;
        $producto->precio = $request->precio;
        $producto->save();
        //CUANDO GUARDO REDIRECCCIONO A LA VISTA INDEX
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $productos = Producto::find($id);
        $productos->delete();

        return redirect()->route('product.index');
    }


    public function pdf()
    {
        $product = Producto::all();
        $pdf = Pdf::loadView('product.pdf', compact('product'));
        return $pdf->stream();
    }
}
