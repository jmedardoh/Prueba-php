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
            <a class="nav-link" href="filtrar_estudiante.php">INSCRIPCIÓN DE MATERIA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">AYUDA</a>
        </li>

    </ul>
</nav>

<main>
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
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">REGISTRO DE MATERIAS</h1>
      <hr>
      <p class="col-md-8 fs-4">

    <form action="php/insertar_materias.php" method="POST">
        <label for="Id_alumno">Materia: </label>
     
        <select name="grado_seccion[]" id="grado_seccion">
            <option value="MATEMÁTICA">MATEMÁTICA</option>
            <option value="LENGUAJE">LENGUAJE</option>
            <option value="CIENCIAS NATURALES">CIENCIAS NATURALES</option>
            <option value="ESTUDIOS SOCIALES">ESTUDIOS SOCIALES</option>
            <option value="EDUCACIÓN FÍSICA">EDUCACIÓN FÍSICA</option>
            <option value="INGLÉS">INGLÉS</option>
            

        </select>
        <input type="submit" name="registrar_materia" value="Inscribir materia">
    </form>
    <br>
    <br>
    <table>
        <div class="table-responsive">
            <table class="table">
                <thead class= table table-dark>
                <th>ESTUDIANTE</th>
                <th>MATERIA</th>
                <th>NOTA 1</th>
                <th>NOTA 2</th>
                <th>NOTA 3</th>
                <th>ELIMINAR</th>
                <th>MODIFICAR</th>
                </tr>
                </thead>
                <tbody>
                <?php
            include("php/conexion.php");
            $getmysql = new mysqlconex();
            $getconex = $getmysql->conex();

            $consulta = "SELECT * FROM notas WHERE alumno = '$_POST[Id_alumno]'";
            $resultado = mysqli_query($getconex, $consulta);
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                
                echo "<td>" . $fila["alumno"] . "</td>";
                echo "<td>" . $fila["materia"] . "</td>";
                echo "<td>" . $fila["nota1"] . "</td>";
                echo "<td>" . $fila["nota2"] . "</td>";
                echo "<td>" . $fila["nota3"] . "</td>";

                
                echo "<td>
                        <form action='php/eliminar_materias.php' method='POST'>
                        <input type='hidden' name='Id_nota' value='" . $fila["Id_nota"] . "'>
                        <input type='hidden' name='alumno' value='" . $fila["alumno"] . "'>
                        <input type='hidden' name='materia' value='" . $fila["materia"] . "'>
                        <input type='hidden' name='nota1' value='" . $fila["nota1"] . "'>
                        <input type='hidden' name='nota2' value='" . $fila["nota2"] . "'>
                        <input type='hidden' name='nota3' value='" . $fila["nota3"] . "'>
                        <input type='submit' name='eliminar_alumno' value='Eliminar' onclick='return confirmacion()'>
                        </form>
                    </td>";
                echo "<td>
                        <input type='hidden' name='Id_nota' value='" . $fila["Id_nota"] . "'>
                        <input type='hidden' name='alumno' value='" . $fila["alumno"] . "'>
                        <input type='hidden' name='materia' value='" . $fila["materia"] . "'>
                        <input type='hidden' name='nota1' value='" . $fila["nota1"] . "'>
                        <input type='hidden' name='nota2' value='" . $fila["nota2"] . "'>
                        <input type='hidden' name='nota3' value='" . $fila["nota3"] . "'>
                        <input type='submit' name='editar_alumno' value='Editar' '>
                    </form>
                </td>";
                echo "</tr>";
            }
            mysqli_close($getconex);
            ?>

                </tbody>
            </table>
        </div>
        
        <thead>
            






        </thead>
       
    </table>

</body>

</div>
  </div>


  </main>
  

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>


