
<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconext = $getmysql->conex();


if (isset($_POST["eliminar_materia"])) {
    $Id_nota = $_POST["Id_materia"];
    $nom_materia = $_POST["nom_materia"];

    $query = "DELETE FROM notas WHERE Id_nota=?";
    $sentencia = mysqli_prepare($getconext, $query);
    mysqli_stmt_bind_param($sentencia, "s", $Id_nota);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado == 1) {
        echo "<script> alert('La materia [$nom_materia] se eliminó correctamente'); location.href='../MATERIAS.php'; </script>";
    } else {
        echo "<script> alert('La materia [$nom_materia] no se eliminó correctamente '); location.href='../MATERIAS.php'; </script>";
    }
}
?>