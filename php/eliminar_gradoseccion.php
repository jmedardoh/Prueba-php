
<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconext = $getmysql->conex();


if (isset($_POST["eliminar_seccion"])) {
    $Id_gradoseccion = $_POST["Id_gradoseccion"];
    $grado_seccion = $_POST["grado_seccion"];

    $query = "DELETE FROM grad_seccion WHERE Id_gradoseccion=?";
    $sentencia = mysqli_prepare($getconext, $query);
    mysqli_stmt_bind_param($sentencia, "s", $Id_gradoseccion);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado == 1) {
        echo "<script> alert('La sección [$grado_seccion] se eliminó correctamente'); location.href='../SECCION.php'; </script>";
    } else {
        echo "<script> alert('La sección  [$grado_seccion] no se eliminó correctamente '); location.href='../SECCION.php'; </script>";
    }
}
?>