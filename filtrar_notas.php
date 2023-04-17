<!doctype html>
<html lang="es">

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
  <main>
  
      
   

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
      <h1 class="display-5 fw-bold">FILTRADO DE NOTAS POR ESTUDIANTE</h1>
      <hr>
      <p class="col-md-8 fs-4">
        
      <form action="NOTAS.php" method="POST">
       
      <label for="Id_alumno">Código de estudiante </label><input type="text" name="Id_alumno" id="Id_alumno">
                    
        <input type="submit" name="mostrar_notas" value="Buscar">
    </form>
      
      


      
      </p>
      
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