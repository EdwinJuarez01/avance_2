<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Fox Pro</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link href="css/animate.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style type="text/css">
      nav{
        color: white;
      }
        .wrapper{
            width: 650px;
            margin: 0 auto;
            color:white;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="container-fluid pl-0 pr-0 bg-img clearfix parallax-window2" data-parallax="scroll" data-image-src="images/banner2.jpg">
  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container"> 
      <!-- Brand --> 
      <a class="navbar-brand mr-auto" href="#"><img src="images/logo.png" alt="FoxPro" /></a> 
      
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span> </button>
      
      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> <a class="nav-link" href="#">Inicio</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#about-us">Sobre nosotros</a> </li>
          <li class="nav-item"> <a class="nav-link" href="index2.php">Consulta</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#contact">Contactanos</a> </li>
        </ul>
        <ul class="navbar-nav ml-5">
          <li class="nav-item"> <a class="nav-link btn btn-danger" href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Bienvenido al Gimnasio virtual "Fox PRO", podrá registrarse, consultar su rutina y escribir un comentario</h2>

                        <a href="crear_cliente.php" class="btn btn-success pull-right">Agregar usuario</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "base_datos_configuracion.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM empleados";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Nombre</th>";
                                        echo "<th>Dirección</th>";
                                        echo "<th>Membresia</th>";
                                        echo "<th>Rutina</th>";
                                        echo "<th>Comentarios</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_usuario'] . "</td>";
                                        echo "<td>" . $row['nombre_usuario'] . "</td>";
                                        echo "<td>" . $row['direccion_usuario'] . "</td>";
                                        echo "<td>" . $row['membresia_usuario'] . "</td>";
                                        echo "<td>" . $row['rutina_usuario'] . "</td>";
                                        echo "<td>" . $row['comentario_usuario'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='actualizar_usuario.php?id=". $row['id_usuario'] ."' title='Actulizar registro' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='eliminar.php?id=". $row['id_usuario'] ."' title='Borrar Registro' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No se encontraron registros.</em></p>";
                        }
                    } else{
                        echo "ERROR: No se pudo conectar a base de datos $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>