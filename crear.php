<?php 
include("../includes/header.php");
include("../includes/conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $gato_id = $_POST['gato_id'];
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $estado = $_POST['estado'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO vacunas (gato_id, nombre, fecha, estado, descripcion)
            VALUES ($gato_id,'$nombre','$fecha','$estado','$descripcion')";

    if($conex->query($sql)){
        header("Location: index.php");
    } else {
        echo "Error: " . $conex->error;
    }
}
?>

<h2 class="text-center">Nueva Vacuna</h2>

<form method="POST" class="w-50 mx-auto">

    <div class="mb-3">
        <label>Gato</label>
        <select name="gato_id" class="form-control" required>
            <option value="">Seleccione un gato</option>

            <?php
            $res = $conex->query("SELECT * FROM gatos");
            while($g = $res->fetch_assoc()){
            ?>
                <option value="<?= $g['id'] ?>">
                    <?= $g['nombre'] ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Nombre de la vacuna</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Fecha</label>
        <input type="date" name="fecha" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Estado</label>
        <select name="estado" class="form-control">
            <option value="pendiente">Pendiente</option>
            <option value="aplicada">Aplicada</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control"></textarea>
    </div>

    <div class="text-center">
        <button class="btn btn-success">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </div>

</form>

<?php include("../includes/footer.php"); ?>