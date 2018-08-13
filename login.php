<?php
  include "funciones.php";
  require "conexion.php";




  /*Seccion de inicio de sesion*/

  $datos = filter_input_array(INPUT_POST);

  $unr = false;

  if(count($datos) > 0){

    $sql = "select * from users where usuario = '".$datos['usuario']."' and passwd = '".$datos['passwd']."'";

    $rusuario = mysqli_query($conection,$sql) or die(mysqli_error($conection));

    if(mysqli_num_rows($rusuario) >= 1){

      session_start();
      $_SESSION = array();
      session_destroy();
      setcookie(session_name(),"",time()-3600,"","");
      session_write_close();

      $fusuario = mysqli_fetch_assoc($rusuario);

      session_start();
      $_SESSION['idUsuario'] = $fusuario['idUsuario'];
      $_SESSION['usuario'] = $fusuario['usuario'];
      $_SESSION['passwd'] = $fusuario['passwd'];
      $_SESSION['nombre'] = $fusuario['nombre'];
      $_SESSION['rol'] = $fusuario['rol'];
      $_SESSION['ip'] = sha1($_SERVER['REMOTE_ADDR']);
      setcookie(session_name(),session_id(),time()+3600,"/","localhost");
      session_write_close();

      header("Location: index.php");


      exit();


    }else{
       $unr = true;
       $msj = "Nombre de usuario o contraseña incorrectos";
    }

  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <form action="login.php" method="post" id="login" class="form-horizontal">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        
          <div class="form-group">
            <label for="usuario">Nombre de usuario</label>
            <input class="form-control" id="usuario" type="text" name="usuario" placeholder="Nombre de usuario">
          </div>
          <div class="form-group">
            <label for="passwd">Contraseña</label>
            <input class="form-control" id="passwd" type="password" name="passwd" placeholder="Contraseña">
          </div>        
            <button class="btn btn-primary btn-block" id="iniciar" type="submit">Iniciar</button>   
        </form>
        
        <?php if($unr){ ?>

        <div class="alert alert-danger" role="alert"><?=$msj?></div>

      <?php } ?>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>