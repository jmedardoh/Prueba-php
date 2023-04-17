
<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

if (isset($_POST["registrar"])) {
    $codigo = $_POST["Id_alumno"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $grado_seccion = $_POST["grado_seccion"];

    $query = "INSERT INTO alumnos (Id_alumno,nombres,apellidos,grado_seccion ) VALUES (?,?,?,?)";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "ssss", $codigo, $nombres, $apellidos, $grado_seccion);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado == 1) {
        echo "<script> alert('El alumno [$nombres] se agregó correctamente'); location.href='../index.php'; </script>";
    } else {
        echo "<script> alert('El alumno [$nombres] no se agregó correctamente '); location.href='../index.php'; </script>";
    }
    mysqli_stmt_close($sentencia);
    mysqli_close($getconex);
}
?>
