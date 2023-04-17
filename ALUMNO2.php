<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiante</title>
</head>
<script>
    function confirmacion() {
        var respuesta = confirm("¿Desea realmente borrar el registro?");
        if (respuesta == true) {
            return true;
        } else {
            return false;
        }

    }
</script>

<body>
    <form action="php/insertar_alumno.php" method="POST">
        <label for="Id_alumno">Código: </label><input type="text" name="Id_alumno" id="Id_alumno">
        <label for="nombres">Nombres: </label><input type="text" name="nombres" id="nombres">
        <label for="apellidos">Apellidos: </label><input type="text" name="apellidos" id="apellidos">
        <label for="grado_seccion">Grado y sección: </label>
        <?php 
                
            include("php/conexion.php");
            $getmysql = new mysqlconex();
            $getconex = $getmysql->conex();
                $sql='SELECT * FROM grad_seccion';
                $resultado = mysqli_query($getconex, $sql);
                while($row=mysqli_fetch_array($resultado)){
                    
                    $grado_seccion=$row['grado_seccion'];
                ?>
                    <option value="<?php echo $Id_gradoseccion  ?>"><?php echo $grado_seccion ?></option>
                <?php
                }
            
            ?>
        <input type="submit" name="registrar_alumno" value="Registrar">
    </form>
    <br>
    <br>
    <table>
        <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>
                <th>GRADO Y SECCIÓN</th>
                <th>ELIMINAR</th>
                <th>EDITAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $getmysql = new mysqlconex();
            $getconex = $getmysql->conex();

            $consulta = "SELECT * FROM alumnos";
            $resultado = mysqli_query($getconex, $consulta);
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila["Id_alumno"] . "</td>";
                echo "<td>" . $fila["nombres"] . "</td>";
                echo "<td>" . $fila["apellidos"] . "</td>";
                echo "<td>" . $fila["grado_seccion"] . "</td>";
                echo "<td>
                        <form action='php/eliminar_alumno.php' method='POST'>
                        <input type='hidden' name='Id_alumno' value='" . $fila["Id_alumno"] . "'>
                        <input type='hidden' name='nombres' value='" . $fila["nombres"] . "'>
                        <input type='submit' name='eliminar_alumno' value='Eliminar' onclick='return confirmacion()'>
                        </form>
                    </td>";
                echo "<td>
                    <form action='php/editar_alumno.php' method='POST'>
                    <input type='hidden' name='Id_alumno' value='" . $fila["Id_alumno"] . "'>
                    <input type='hidden' name='nombres' value='" . $fila["nombres"] . "'>
                    <input type='hidden' name='apellidos' value='" . $fila["apellidos"] . "'>
                    <input type='hidden' name='grado_seccion' value='" . $fila["grado_seccion"] . "'>
                    <input type='submit' name='editar_alumno' value='Editar' '>
                    </form>
                </td>";
                echo "</tr>";
            }
            mysqli_close($getconex);
            ?>

            
        </tbody>
    </table>

</body>

</html>