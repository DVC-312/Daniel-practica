<?php 
include("../includes/header.php");
include("../includes/conexion.php");

$id = (int)$_GET['id'];

$sql = "SELECT * FROM vacunas WHERE id = $id";
$result = $conex->query($sql);
$row = $result->fetch_assoc();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $gato_id = $_POST['gato_id'];
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $estado = $_POST['estado'];
    $descripcion = $_POST['descripcion'];

    $update = "UPDATE vacunas 
               SET gato_id=$gato_id,
                   nombre='$nombre',
                   fecha='$fecha',
                   estado='$estado',
                   descripcion='$descripcion'
               WHERE id=$id";

    if($conex->query($update)){
        header("Location: index.php");
    } else {
        echo "Error: " . $conex->error;
    }
}
?>

<h2 class="text-center">Editar Vacuna</h2>

<form method="POST" class="w-50 mx-auto">

    <div class="mb-3">
        <label>Gato</label>
        <select name="gato_id" class="form-control" required>
            <?php
            $res = $conex->query("SELECT * FROM gatos");
            while($g = $res->fetch_assoc()){
                $selected = ($g['id'] == $row['gato_id']) ? "selected" : "";
            ?>
                <option value="<?= $g['id'] ?>" <?= $selected ?>>
                    <?= $g['nombre'] ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Nombre de la vacuna</label>
        <input type="text" name="nombre" class="form-control" value="<?= $row['nombre'] ?>" required>
    </div>

    <div class="mb-3">
        <label>Fecha</label>
        <input type="date" name="fecha" class="form-control" value="<?= $row['fecha'] ?>" required>
    </div>

    <div class="mb-3">
        <label>Estado</label>
        <select name="estado" class="form-control">
            <option value="pendiente" <?= ($row['estado']=="pendiente")?"selected":"" ?>>
                Pendiente
            </option>
            <option value="aplicada" <?= ($row['estado']=="aplicada")?"selected":"" ?>>
                Aplicada
            </option>
        </select>
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control"><?= $row['descripcion'] ?></textarea>
    </div>

    <div class="text-center">
        <button class="btn btn-success">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </div>

</form>

<?php include("../includes/footer.php"); ?>