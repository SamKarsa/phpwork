<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h2>Lista de Productos</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach($products as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['name'] ?></td>
            <td><?= $p['price'] ?></td>
            <td>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-<?= $p['id'] ?>">
                    Editar
                </button>
            </td>
        </tr>

        <?php 
            // La vista de edición se incluye aquí para tener acceso a la variable $p
            include __DIR__ . '/edit_modal.php'; 
        ?>

        <?php endforeach; ?>

    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>