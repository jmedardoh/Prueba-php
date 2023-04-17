
<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

if (isset($_POST["registrar_seccion"])) {
    $Id_gradoseccion = $_POST["Id_gradoseccion"];
    $grado_seccion = $_POST["grado_seccion"];
 
    $query = "INSERT INTO grad_seccion (Id_gradoseccion,grado_seccion) VALUES (?,?)";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "ss", $Id_gradoseccion, $grado_seccion);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado == 1) {
        echo "<script> alert('La sección [$grado_seccion] se agregó correctamente'); location.href='../SECCION.php'; </script>";
    } else {
        echo "<script> alert('La sección [$grado_seccion] no se agregó correctamente '); location.href='../SECCION.php'; </script>";
    }
    mysqli_stmt_close($sentencia);
    mysqli_close($getconex);
}
?>
