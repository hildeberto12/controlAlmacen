<?php
	
	require "conexion.php";
  include "authuser.php";
  include "funciones.php";

   if(!$uv){
  header("Location: login.php");
  exit();
}elseif($fu['rol'] >= 2){
  header("Location: register.php");
  exit();
}

/*****************[abrir registro existente]*****************************/

$fp = [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Registrar cuenta</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registrar cuenta</div>
      <div class="card-body">
        <form action="usuario_guardar.php" method="post" id="registro" class="form-horizontal">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="usuario">Nombre de usuario</label>
                <input class="form-control" id="usuario" type="text" name="usuario" placeholder="Nombre de usuario">
              </div>
              <div class="col-md-6">
                <label for="nombre">Nombre Completo</label>
                <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Nombre completo">
              </div>

              <div class="col-md-6">
                <label for="rol">Rol</label>
                <input class="form-control" id="rol" type="text" name="rol" placeholder="Rol">
              </div>

            </div>
          </div>
          <div class="form-group">
            <label for="email">Correo eléctronico</label>
            <input class="form-control" id="email" type="email" name="email" placeholder="Correo eléctronico">
          </div>
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="passwd">Contraseña</label>
                <input class="form-control" id="passwd" type="password" name="passwd" placeholder="Contraseña">
              </div>
              <div class="col-md-6">
                <label for="passwdc">Confirmar Contraseña</label>
                <input class="form-control" id="passwdc" type="password" name="passwdc" placeholder="Confirmar contraseña">
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" id="guardar" type="submit">Registrar</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php">Regresar</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript">
  
$(document).ready(function(){

  $("#guardar").click(function(){
    if($("#passwd").val() === $("#passwdc").val()){
      $("#registro").submit();
    }else{
      alert("Las contraseñaas no coinciden\nFavor de introducir dos contraseñas validas e iguales");
      $("#passwd").val("");
      $("#passwdc").val("");
      $("#passwd").focus();
    }
  });

});
</script>
</body>

</html>