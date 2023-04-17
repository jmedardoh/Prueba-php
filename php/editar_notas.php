<!doctype html>
<html lang="en">

<head>
  <title>SYSTEM SCHOOL</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>


<nav class="navbar navbar-expand navbar-dark bg-dark">
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="index.php" aria-current="page"><B>SYSTEM SCHOOL</B><span class="visually-hidden">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="ALUMNO.PHP">REGISTRO DE ESTUDIANTES</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="filtrar_seccion.php">SECCIONES</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="filtrar_notas.php">CALIFICAR</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">AYUDA</a>
        </li>

    </ul>
</nav>
    <?php
    $Id_nota  = $_POST["Id_nota"];
    $alumno = $_POST["alumno"];
    $materia = $_POST["materia"];
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];
    $nota2 = $_POST["nota3"];

 
    if(isset($_POST["editar2"])){
        include("conexion.php");
        $getmysql=new mysqlconex();
        $getconex=$getmysql->conex();

        $query="UPDATE notas SET alumno=?,materia=?,nota1=?,nota2=?,nota3=? WHERE Id_nota=?";
        $sentencia=mysqli_prepare($getconex,$query);
        mysqli_stmt_bind_param($sentencia,"ssdddi",$alumno,$materia,$nota1,$nota2,$nota3,$Id_nota);
        mysqli_stmt_execute($sentencia);
        $afectado=mysqli_stmt_affected_rows($sentencia);
        if($afectado==1){
            echo "<script> alert('El estudiante $alumno se editó correctamente :) '); location.href='../NOTAS.php'; </script>";
        }else{
            echo "<script> alert('El estudiante $alumno no se editó '); location.href='../NOTAS.php'; </script>";
        }
        mysqli_stmt_close($sentencia);
        mysqli_close($getconex);
    }

    ?>

    <form action="editar.php" method="POST">
        <input type="hidden" value="<?php echo $id ?>" name="id">
        <label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>">
        <label for="apellido">Apellido: </label><input type="text" name="apellido" id="apellido" value="<?php echo $apellido ?>">
        <label for="puesto">Puesto: </label>
        <select name="puesto" id="puesto">
            <option value="<?php echo $puesto ?>" hidden selected><?php echo $puesto ?></option>
            <option value="Desarrollador">Desarrollador</option>
            <option value="Tester">Tester</option>
        </select>
        <input type="submit" name="editar2" value="editar">
    </form>
</body>

</html>