<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de estudiante</title>
</head>

<body>
    <?php
    $Id_alumno = $_POST["Id_alumno"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $grado_seccion = $_POST["grado_seccion"];
 
    if(isset($_POST["editar2_alumno"])){
        include("conexion.php");
        $getmysql=new mysqlconex();
        $getconex=$getmysql->conex();

        $query="UPDATE alumnos SET nombres=?,apellidos=?,grado_seccion=? WHERE Id_alumno=?";
        $sentencia=mysqli_prepare($getconex,$query);
        mysqli_stmt_bind_param($sentencia,"ssss",$nombres,$apellidos,$grado_seccion,$Id_alumno);
        mysqli_stmt_execute($sentencia);
        $afectado=mysqli_stmt_affected_rows($sentencia);
        if($afectado==1){
            echo "<script> alert('El estudiante $nombres se editó correctamente :) '); location.href='ALUMNO.php'; </script>";
        }else{
            echo "<script> alert('El estudiante $nombres no se editó '); location.href='ALUMNO.php'; </script>";
        }
        mysqli_stmt_close($sentencia);
        mysqli_close($getconex);
    }

    ?>

    <form action="ALUMNO.php" method="POST">
        <input type="hidden" value="<?php echo $Id_alumno ?>" name="Id_alumno">
        <label for="nombres">Nombre: </label><input type="text" name="nombres" id="nombres" value="<?php echo $nombres ?>">
        <label for="apellidos">Apellido: </label><input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos ?>">
        <label for="grado_seccion">Puesto: </label>
        
        <input type="submit" name="editar2_alumno" value="editar">
    </form>
</body>

</html>