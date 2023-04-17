
<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconext = $getmysql->conex();


if (isset($_POST["eliminar_alumno"])) {
    $Id_alumno = $_POST["Id_alumno"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $grado_seccion = $_POST["grado_seccion"];

    $query = "DELETE FROM alumnos WHERE Id_alumno=?";
    $sentencia = mysqli_prepare($getconext, $query);
    mysqli_stmt_bind_param($sentencia, "s", $Id_alumno);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado == 1) {
        echo "<script> alert('El alumno [$nombres] se eliminó correctamente'); location.href='../ALUMNO.php'; </script>";
    } else {
        echo "<script> alert('El alumno [$nombres] no se eliminó correctamente '); location.href='../ALUMNO.php'; </script>";
    }
}
?>