@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Gestión de Productos</h1>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nuevo Producto
            </a>
        </div>

        <!-- Formulario de Búsqueda y Filtros -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('products.index') }}" class="row g-3">
                    <div class="col-md-4">
                        <label for="search" class="form-label">Búsqueda (Nombre/Descripción)</label>
                        <input type="text" class="form-control" id="search" name="search" 
                               value="{{ request('search') }}" placeholder="Buscar por nombre o descripción...">
                    </div>

                    <div class="col-md-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select class="form-select" id="categoria" name="categoria_id">
                            <option value="">Todas las categorías</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" 
                                    {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="sort" class="form-label">Ordenar por Precio</label>
                        <select class="form-select" id="sort" name="sort">
                            <option value="">Sin ordenar</option>
                            <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Ascendente</option>
                            <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Descendente</option>
                        </select>
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-search"></i> Buscar
                        </button>
                    </div>

                    <div class="col-md-12">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">
                            Limpiar filtros
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tabla de Productos -->
<div class="row">
    <div class="col-md-12">
        @if ($productos->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td><strong>{{ $producto->nombre }}</strong></td>
                                <td>
                                    <span class="badge bg-info">{{ $producto->categoria->nombre }}</span>
                                </td>
                                <td>
                                    <small>{{ Str::limit($producto->descripcion, 50, '...') }}</small>
                                </td>
                                <td class="fw-bold">${{ number_format($producto->precio, 2) }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('products.edit', $producto->id) }}" 
                                           class="btn btn-sm btn-warning text-white"
                                           title="Editar">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>
                                        <form method="POST" action="{{ route('products.destroy', $producto->id) }}" 
                                              style="display:inline;" 
                                              onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="d-flex justify-content-center mt-4">
                {{ $productos->appends(request()->query())->links() }}
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                <i class="bi bi-info-circle"></i>
                <strong>No hay productos</strong> que coincidan con tu búsqueda.
            </div>
        @endif
    </div>
</div>
@endsection
