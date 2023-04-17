
<?php
include("conexion.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

if (isset($_POST["registrar_materia"])) {
    $alumno = $_POST["alumno"];
    $materia = $_POST["materia"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $nota3 = $_POST["nota3"];

    
    $query = "INSERT INTO notas (alumno,materia,nota1,nota2,nota3) VALUES (?,?,?,?,?)";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "ssddd",$alumno,$materia,$nota1,$nota2,$nota3);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado == 1) {
        echo "<script> alert('La materia [$materia] se agregó correctamente'); location.href='../insertar_materias.php'; </script>";
    } else {
        echo "<script> alert('La materia [$materia] no se agregó correctamente '); location.href='../insertar_materias.php'; </script>";
    }
    mysqli_stmt_close($sentencia);
    mysqli_close($getconex);
}
?>
