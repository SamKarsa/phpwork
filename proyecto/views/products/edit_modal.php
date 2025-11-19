<div class="modal fade" id="editModal-<?= $p['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel-<?= $p['id'] ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel-<?= $p['id'] ?>">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="products/update" method="POST">
                <input type="hidden" name="id" value="<?= $p['id'] ?>">

                <div class="modal-body">
                    <label>Nombre</label>
                    <input type="text" name="name"
                           value="<?= htmlspecialchars($p['name']) ?>"
                           class="form-control" required>

                    <label class="mt-2">Precio</label>
                    <input type="number" step="0.01" name="price"
                           value="<?= htmlspecialchars($p['price']) ?>"
                           class="form-control" required>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>