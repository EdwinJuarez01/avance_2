<?php

require_once "base_datos_configuracion.php";
 
// Define variables and initialize with empty values
$nombre_usuario = $direccion_usuario = $membresia_usuario = $rutina_usuario = "";
$nombre_usuario_err = $direccion_usuario_err = $membresia_usuario_err = $rutina_usuario_err = "";
 
// Procesar datos
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validar nombre
    $nombre = trim($_POST["name"]);
    if(empty($nombre)){
        $nombre_usuario_err = "Ingrese nombre";
    } elseif(!filter_var($nombre, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nombre_usuario_err = "Ingrese nombre válido";
    } else{
        $nombre_usuario = $nombre;
    }
    
    // Validar dirección
    $direccion = trim($_POST["address"]);
    if(empty($direccion)){
        $direccion_usuario_err = "Ingrese una dirección";     
    } else{
        $direccion_usuario = $direccion;
    }
    
    // Validate membresia
    $membresia = trim($_POST["salary"]);
    if(empty($membresia)){
        $membresia_usuario_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($membresia)){
        $membresia_usuario_err = "Please enter a positive integer value.";
    } else{
        $membresia_usuario = $membresia;
    }
    
    // Check input errors before inserting in database
    if(empty($nombre_usuario_err) && empty($direccion_usuario_err) && empty($membresia_usuario_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO empleados (nombre_usuario, direccion_usuario, membresia_usuario, rutina_usuario, comentario_usuario) VALUES (?, ?, ?, '', '')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_nombre, $param_direccion, $param_membresia);
            
            // Set parameters
            $param_nombre = $nombre_usuario;
            $param_direccion = $direccion_usuario;
            $param_membresia = $membresia_usuario;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index2.php");
                exit();
            } else{
                echo "Error al intentar guardar en la base de datos.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link href="css/animate.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
            color : white;
        }
    </style>
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
                    <div class="page-header">
                        <h2>Crear Registro</h2>
                    </div>
                    <p>Coloque la información de cliente</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nombre_usuario_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $nombre_usuario_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($direccion_usuario_err)) ? 'has-error' : ''; ?>">
                            <label>Dirección</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $direccion_usuario_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($membresia_usuario_err)) ? 'has-error' : ''; ?>">
                            <label>Membresía</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $membresia_usuario_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Guardar">
                        <a href="index2.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>