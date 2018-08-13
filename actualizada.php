<?php
  
  require "conexion.php";
  include "authuser.php";
  include "funciones.php";

  if(!$uv){
  header("Location: login.php");
  exit();
}elseif($fu['rol'] >= 1){
  header("Location: index.php");
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
  <title>Mercancias</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="agregar_mercancia.php">Mercancias</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Mercancias">
          <a class="nav-link" data-toggle="collapse" href="#collapseTable" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Mercancias</span>
          </a>
            <ul class="sidenav-second-level collapse" id="collapseTable">
              <li>
                <a href="agregar_mercancia.php">Agregar mercancias</a>
              </li>
              <li>
                <a href="mercancia_borrar.php">Borrar mercancias</a>
              </li>
              <li>
                <a href="mercancias.php">Ver mercancias</a>
              </li>
              <li>
                <a href="codigoqr/index_qr.php">Código QR</a>
              </li>
            </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Usuarios</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="ver_usuarios.php">Ver usuarios</a>
            </li>
            <li>
              <a href="register.php">Registrar usuario</a>
            </li>
          </ul>
        </li>
        <!--
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Example Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.html">Login Page</a>
            </li>
            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Blank Page</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu Levels</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li> -->
      </ul>
      
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Buscar">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Salir</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Almacen</a>
        </li>
        <li class="breadcrumb-item active">Almacen</li>
      </ol>

   <div class="card mb-3">
        <div class="card-header">
           <i class="fa fa-table"></i> Mercancias</div>
           <div class="card-body">
          
          <?php

           //$busqueda = $_GET["buscar"];
 			
 		  $cod=$_GET["id"];	
          $client=$_GET["cliente"];
          $merc=$_GET["mercancia"];
          $cant=$_GET["cantidad"];
          $numfo=$_GET["numero_folio"];
          $tipotrans=$_GET["tipo_transporte"];
          $presentmer=$_GET["presentacion_mercancia"];
          $numcon=$_GET["numero_contenedor"];
          $numse=$_GET["numero_sello"];
          $entrada=$_GET["fecha_entrada"];
          $salida=$_GET["fecha_salida"];

          require ("conexion.php");

          $conection = mysqli_connect($host,$usuario,$password,$bd);

          if (mysqli_connect_errno()) {
            echo "Fallo al conectar con la base de datos";
            exit();
          }

          mysqli_select_db($conection,  $bd) or die ("No se encuentra la base de datos");
          mysqli_set_charset($conection, "utf8");

           $consulta = "UPDATE Registros SET id=$cod, cliente='$client', mercancia='$merc', cantidad=$cant, numero_folio=$numfo, tipo_transporte='$tipotrans', presentacion_mercancia='$presentmer', numero_contenedor=$numcon, numero_sello=$numse, fecha_entrada='$entrada', fecha_salida='$salida' WHERE id='$cod'";

            $resultados=mysqli_query($conection,$consulta);

            if ($resultados==false) {
            	echo "Error en la consulta";
            }else{
            	echo "Modificacion Exitosa<br><br>";

            	

            }
          ?>
        </tbody>
        </table> 
        </div>
        </div> 
        </div>
      </div>


    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cerrar session</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">¿Quiere cerrar session?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="login.php">Salir</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>
</html>