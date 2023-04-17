<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
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
    <form action="php/insertar_materias.php" method="POST">
        <label for="Id_materia">Código: </label><input type="text" name="Id_materia" id="Id_materia">
        <label for="nom_materia">Materia: </label><input type="text" name="nom_materia" id="nom_materia">
        
        <input type="submit" name="registrar_materia" value="Registrar">
    </form>
    <br>
    <br>
    <table>
        <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>MATERIA</th>
                <th>ELIMINAR</th>
                <th>EDITAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("php/conexion.php");
            $getmysql = new mysqlconex();
            $getconex = $getmysql->conex();

            $consulta = "SELECT * FROM materias";
            $resultado = mysqli_query($getconex, $consulta);
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila["Id_materia"] . "</td>";
                echo "<td>" . $fila["nom_materia"] . "</td>";
                echo "<td>
                        <form action='php/eliminar_materias.php' method='POST'>
                        <input type='hidden' name='Id_materia' value='" . $fila["Id_materia"] . "'>
                        <input type='hidden' name='nom_materia' value='" . $fila["nom_materia"] . "'>
                        <input type='submit' name='eliminar_materia' value='Eliminar' onclick='return confirmacion()'>
                        </form>
                    </td>";
                echo "<td>
                    <form action='php/editar_materias.php' method='POST'>
                    <input type='hidden' name='Id_materia' value='" . $fila["Id_materia"] . "'>
                    <input type='hidden' name='nom_materia' value='" . $fila["nom_materia"] . "'>
                    <input type='submit' name='editar_materia' value='Editar' '>
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