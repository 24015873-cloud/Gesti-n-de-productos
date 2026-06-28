<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Gestión de Productos</h1>
            <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nuevo Producto
            </a>
        </div>

        <!-- Formulario de Búsqueda y Filtros -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="<?php echo e(route('products.index')); ?>" class="row g-3">
                    <div class="col-md-4">
                        <label for="search" class="form-label">Búsqueda (Nombre/Descripción)</label>
                        <input type="text" class="form-control" id="search" name="search" 
                               value="<?php echo e(request('search')); ?>" placeholder="Buscar por nombre o descripción...">
                    </div>

                    <div class="col-md-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select class="form-select" id="categoria" name="categoria_id">
                            <option value="">Todas las categorías</option>
                            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($categoria->id); ?>" 
                                    <?php echo e(request('categoria_id') == $categoria->id ? 'selected' : ''); ?>>
                                    <?php echo e($categoria->nombre); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="sort" class="form-label">Ordenar por Precio</label>
                        <select class="form-select" id="sort" name="sort">
                            <option value="">Sin ordenar</option>
                            <option value="asc" <?php echo e(request('sort') == 'asc' ? 'selected' : ''); ?>>Ascendente</option>
                            <option value="desc" <?php echo e(request('sort') == 'desc' ? 'selected' : ''); ?>>Descendente</option>
                        </select>
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="bi bi-search"></i> Buscar
                        </button>
                    </div>

                    <div class="col-md-12">
                        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary btn-sm">
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
        <?php if($productos->count() > 0): ?>
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
                        <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($producto->id); ?></td>
                                <td><strong><?php echo e($producto->nombre); ?></strong></td>
                                <td>
                                    <span class="badge bg-info"><?php echo e($producto->categoria->nombre); ?></span>
                                </td>
                                <td>
                                    <small><?php echo e(Str::limit($producto->descripcion, 50, '...')); ?></small>
                                </td>
                                <td class="fw-bold">$<?php echo e(number_format($producto->precio, 2)); ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?php echo e(route('products.edit', $producto->id)); ?>" 
                                           class="btn btn-sm btn-warning text-white"
                                           title="Editar">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>
                                        <form method="POST" action="<?php echo e(route('products.destroy', $producto->id)); ?>" 
                                              style="display:inline;" 
                                              onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="d-flex justify-content-center mt-4">
                <?php echo e($productos->appends(request()->query())->links()); ?>

            </div>
        <?php else: ?>
            <div class="alert alert-info text-center" role="alert">
                <i class="bi bi-info-circle"></i>
                <strong>No hay productos</strong> que coincidan con tu búsqueda.
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/angel/Documents/Documentos - MacBook Pro de Angel/UVEG/CRUD_PRODUCTOS/resources/views/products/index.blade.php ENDPATH**/ ?>