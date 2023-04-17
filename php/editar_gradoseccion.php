<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <?php
    $Id_gradoseccion = $_POST["Id_gradoseccion"];
    $grado_seccion = $_POST["grado_seccion"];
     
    if(isset($_POST["editar2_gradoseccion"])){
        include("conexion.php");
        $getmysql=new mysqlconex();
        $getconex=$getmysql->conex();

        $query="UPDATE grad_seccion SET grado_seccion=? WHERE Id_gradoseccion=?";
        $sentencia=mysqli_prepare($getconex,$query);
        mysqli_stmt_bind_param($sentencia,"ss",$grado_seccion,$Id_gradoseccion);
        mysqli_stmt_execute($sentencia);
        $afectado=mysqli_stmt_affected_rows($sentencia);
        if($afectado==1){
            echo "<script> alert('La sección $grado_seccion se editó correctamente '); location.href='../SECCION.php'; </script>";
        }else{
            echo "<script> alert('La sección $grado_seccion no se editó '); location.href='../SECCION.php'; </script>";
        }
        mysqli_stmt_close($sentencia);
        mysqli_close($getconex);
    }

    ?>

    <form action="editar_gradoseccion.php" method="POST">
        <input type="hidden" value="<?php echo $Id_gradoseccion ?>" name="Id_gradoseccion">
        <label for="Id_gradoseccion">Código: </label><input type="text" name="Id_gradoseccion" id="Id_gradoseccion" value="<?php echo $Id_gradoseccion ?>">
        <label for="grado_seccion">Grado y sección: </label><input type="text" name="grado_seccion" id="grado_seccion" value="<?php echo $grado_seccion ?>">
        
        <input type="submit" name="editar2_gradoseccion" value="Editar">
    </form>
</body>

</html>