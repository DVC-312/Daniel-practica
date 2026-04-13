<?php 
include("../includes/header.php");
include("../includes/conexion.php");
?>

<h2 class="text-center mb-4">Lista de Vacunas</h2>

<div class="text-end mb-3">
    <a href="crear.php" class="btn btn-success">+ Nueva Vacuna</a>
</div>

<table class="table table-bordered table-hover text-center">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Gato</th>
            <th>Vacuna</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

    <?php
    $sql = "SELECT v.*, g.nombre AS gato_nombre 
            FROM vacunas v
            INNER JOIN gatos g ON v.gato_id = g.id";

    $result = $conex->query($sql);

    while($row = $result->fetch_assoc()){
    ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['gato_nombre'] ?></td>
            <td><?= $row['nombre'] ?></td>
            <td><?= $row['fecha'] ?></td>
            <td>
                <?php if($row['estado'] == 'aplicada'){ ?>
                    <span class="badge bg-success">Aplicada</span>
                <?php } else { ?>
                    <span class="badge bg-warning text-dark">Pendiente</span>
                <?php } ?>
            </td>
            <td><?= $row['descripcion'] ?></td>
            <td>
                <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Editar</a>
                <a href="eliminar.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
            </td>
        </tr>
    <?php } ?>

    </tbody>
</table>

<?php include("../includes/footer.php"); ?>