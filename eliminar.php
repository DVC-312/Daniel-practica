<?php 
include("../includes/header.php");
include("../includes/conexion.php");

$id = (int)$_GET['id'];

if(isset($_POST['confirmar'])){
    $sql = "DELETE FROM vacunas WHERE id = $id";

    if($conex->query($sql)){
        header("Location: index.php");
    } else {
        echo "Error: " . $conex->error;
    }
}
?>

<h2 class="text-center">Eliminar Vacuna</h2>

<div class="text-center">
    <p>¿Seguro que deseas eliminar esta vacuna?</p>

    <form method="POST">
        <button name="confirmar" class="btn btn-danger">Eliminar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include("../includes/footer.php"); ?>