@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">
                    <i class="bi bi-plus-circle"></i> Crear Nuevo Producto
                </h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('products.store') }}">
                    @csrf

                    <!-- Campo Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Producto <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre') }}" 
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
                                    {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
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
                                  placeholder="Ingresa la descripción del producto" required>{{ old('descripcion') }}</textarea>
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
                                   id="precio" name="precio" value="{{ old('precio') }}" 
                                   placeholder="0.00" step="0.01" min="0" required>
                            @error('precio')
                                <div class="invalid-feedback d-block w-100">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Crear Producto
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
