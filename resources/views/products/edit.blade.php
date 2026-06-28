@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-white">
                <h3 class="mb-0">
                    <i class="bi bi-pencil-square"></i> Editar Producto
                </h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('products.update', $producto->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Campo Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Producto <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" 
                               placeholder="Ingresa el nombre del producto" required>
                        @error('nombre')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campo Categoría -->
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoría <span class="text-danger">*</span></label>
                        <select class="form-select @error('categoria_id') is-invalid @enderror" 
                                id="categoria_id" name="categoria_id" required>
                            <option value="">-- Selecciona una categoría --</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" 
                                    {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campo Descripción -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                  id="descripcion" name="descripcion" rows="4"
                                  placeholder="Ingresa la descripción del producto" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campo Precio -->
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control @error('precio') is-invalid @enderror" 
                                   id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" 
                                   placeholder="0.00" step="0.01" min="0" required>
                            @error('precio')
                                <div class="invalid-feedback d-block w-100">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Información adicional -->
                    <div class="alert alert-info" role="alert">
                        <small>
                            <strong>Creado:</strong> {{ $producto->created_at->format('d/m/Y H:i') }}<br>
                            <strong>Última actualización:</strong> {{ $producto->updated_at->format('d/m/Y H:i') }}
                        </small>
                    </div>

                    <!-- Botones -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle"></i> Guardar Cambios
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
