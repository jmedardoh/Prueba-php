<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Materia</title>
</head>

<body>
    <?php
    $Id_materia = $_POST["Id_materia"];
    $nom_materia = $_POST["nom_materia"];
 
 
    if(isset($_POST["editar2_materia"])){
        include("conexion.php");
        $getmysql=new mysqlconex();
        $getconex=$getmysql->conex();

        $query="UPDATE materias SET nom_materia=? WHERE Id_materia=?";
        $sentencia=mysqli_prepare($getconex,$query);
        mysqli_stmt_bind_param($sentencia,"ss",$nom_materia,$Id_materia);
        mysqli_stmt_execute($sentencia);
        $afectado=mysqli_stmt_affected_rows($sentencia);
        if($afectado==1){
            echo "<script> alert('La materia $nom_materia se editó correctamente '); location.href='../MATERIAS.php'; </script>";
        }else{
            echo "<script> alert('La materia $nom_materia no se editó  '); location.href='../MATERIAS.php'; </script>";
        }
        mysqli_stmt_close($sentencia);
        mysqli_close($getconex);
    }

    ?>

    <form action="editar_materias.php" method="POST">
        <input type="hidden" value="<?php echo $Id_materia ?>" name="Id_materia">
        <label for="Id_materia">Código: </label><input type="text" name="Id_materia" id="Id_materia" value="<?php echo $Id_materia ?>">
        <label for="nom_materia">Materia: </label><input type="text" name="nom_materia" id="nom_materia" value="<?php echo $nom_materia ?>">
        
        <input type="submit" name="editar2_materia" value="editar">
    </form>
</body>

</html>