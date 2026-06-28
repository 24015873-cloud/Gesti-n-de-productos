<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the products.
     * GET /products
     */
    public function index(Request $request)
    {
        $query = Producto::query();

        // Búsqueda por nombre o descripción
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nombre', 'like', "%{$search}%")
                  ->orWhere('descripcion', 'like', "%{$search}%");
        }

        // Filtro por categoría
        if ($request->has('categoria_id') && $request->categoria_id != '') {
            $query->where('categoria_id', $request->categoria_id);
        }

        // Ordenamiento por precio
        if ($request->has('sort') && $request->sort != '') {
            $sort = $request->sort;
            if ($sort === 'asc') {
                $query->orderBy('precio', 'asc');
            } elseif ($sort === 'desc') {
                $query->orderBy('precio', 'desc');
            }
        }

        // Paginación de 10 elementos
        $productos = $query->paginate(10);

        // Obtener todas las categorías para el filtro
        $categorias = Categoria::all();

        return view('products.index', compact('productos', 'categorias'));
    }

    /**
     * Show the form for creating a new product.
     * GET /products/create
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('products.create', compact('categorias'));
    }

    /**
     * Store a newly created product in storage.
     * POST /products
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0.01',
            'categoria_id' => 'required|integer|exists:categorias,id',
        ], [
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder 255 caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser texto.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio debe ser mayor a 0.',
            'categoria_id.required' => 'Debes seleccionar una categoría.',
            'categoria_id.integer' => 'La categoría no es válida.',
            'categoria_id.exists' => 'La categoría seleccionada no existe.',
        ]);

        // Crear el producto
        Producto::create($validated);

        return redirect()->route('products.index')
                       ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Show the form for editing the specified product.
     * GET /products/{id}/edit
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('products.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified product in storage.
     * PUT /products/{id}
     */
    public function update(Request $request, Producto $producto)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0.01',
            'categoria_id' => 'required|integer|exists:categorias,id',
        ], [
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder 255 caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser texto.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'precio.min' => 'El precio debe ser mayor a 0.',
            'categoria_id.required' => 'Debes seleccionar una categoría.',
            'categoria_id.integer' => 'La categoría no es válida.',
            'categoria_id.exists' => 'La categoría seleccionada no existe.',
        ]);

        // Actualizar el producto
        $producto->update($validated);

        return redirect()->route('products.index')
                       ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified product from storage.
     * DELETE /products/{id}
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('products.index')
                       ->with('success', 'Producto eliminado exitosamente.');
    }
}
