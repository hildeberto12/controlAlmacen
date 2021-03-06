<?php
  
  require "conexion.php";
  include "authuser.php";
  include "funciones.php";

  if(!$uv){
  header("Location: login.php");
  exit();
}elseif($fu['rol'] >= 3){
  header("Location: agregar_mercancia.php");
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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="agregar_mercancia.php">Agregar mercancias</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Mercancias">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTable" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Mercancias</span>
          </a>
            <ul class="sidenav-second-level collapse" id="collapseTable">
              
              <li>
                <a href="mercancia_editar.php">Editar mercancias</a>
              </li>
              <li>
                <a href="mercancia_borrar.php">Borrar mercancias</a>
              </li>
              <li>
                <a href="mercancias.php">Ver mercancias</a>
              </li>
            </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="codigoqr/index_qr.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Código QR</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="graficas.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Grafica</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="disabled">Usuarios</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <?php if($fu['rol']<=1){ ?>
                <li class="disabled"><a href="ver_usuarios.php">Ver usuarios</a></li> 
                <li class="disabled"><a href="register.php">Registrar usuarios</a></li>
                <li class="disabled"><a href="usuario_borrar.php">Borrar usuarios</a></li> 
              <?php } ?>
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Formatos">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Formato</span>
          </a>

          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
           <?php if($fu['rol']<=3){ ?>
                <li class="disabled"><a href="pdf/reporte.php">Mercancia PDF</a></li>  
              <?php } ?>
          </ul>
        </li>
<!--        
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
          <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal" aria-haspopup="true" aria-expanded="false"><?=$fu['nombre']?>
            <i class="fa fa-fw fa-sign-out"></i>Salir</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Agregar mercancia</li>
      </ol>
      
<div class="container">
  
  <div class="panel panel-default">
    <div class="panel-body">
      <form action="mercancia_guardar.php" class="form-horizontal" method="post">
        <!--<input type="hidden" name="id">-->
        <div class="form-group">
          <label for="id" class="col-sm-2 control-label">Id</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="id" name="id" required="required" placeholder="id">
          </div>
        </div>

        <div class="form-group">
          <label for="cliente" class="col-sm-2 control-label">Cliente</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="cliente" name="cliente" required="required" placeholder="cliente">
          </div>
        </div>

        <div class="form-group">
          <label for="mercancia" class="col-sm-2 control-label">Mercancia</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="mercancia" name="mercancia" required="required" placeholder="mercancia">
          </div>
        </div>

       <div class="form-group">
          <label for="cantidad" class="col-sm-2 control-label">Cantidad</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="cantidad" placeholder="cantidad" name="cantidad" required="required" maxlength="50">
          </div>
        </div>
        

        <div class="form-group">
          <label for="numero_folio" class="col-sm-2 control-label">Numero folio</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="numero_folio" name="numero_folio" required="required" placeholder="Numero de folio">
          </div>
        </div>

          <div class="form-group">
          <label for="tipo_transporte" class="col-sm-2 control-label">Tipo transporte</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="tipo_transporte" name="tipo_transporte" required="required" placeholder="Tipo de transporte: Terrestre, Aereo, Maritimo">
          </div>
        </div>

        <div class="form-group">
          <label for="presentacion_mercancia" class="col-sm-2 control-label">Presentacion mercancia</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="presentacion_mercancia" name="presentacion_mercancia" required="required" placeholder="Presentacion de mercancia">
          </div>
        </div>

        <div class="form-group">
          <label for="numero_contenedor" class="col-sm-2 control-label">Numero contenedor</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="numero_contenedor" name="numero_contenedor" required="required" placeholder="Numero de contenedor">
          </div>
        </div>

        <div class="form-group">
          <label for="numero_sello" class="col-sm-2 control-label">Numero sello</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="numero_sello" name="numero_sello" required="required" placeholder="Numero de sello">
          </div>
        </div>

        <div class="form-group">
          <label for="fecha_entrada" class="col-sm-2 control-label">Fecha entrada</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="fecha_entrada" name="fecha_entrada" required="required" placeholder="Fecha de salida">
          </div>
        </div>

        <div class="form-group">
          <label for="fecha_salida" class="col-sm-2 control-label">Fecha salida</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="fecha_salida" name="fecha_salida" required="required" placeholder="Fecha de salida">
          </div>
        </div>

        <div class="col-sm-10 col-sm-offset-2">
          <button class="btn btn-success" type="submit">Guardar <i class="icon-check"></i></button>
          <button class="btn btn-danger cancelar" type="button">Cancelar <i class="icon-x"></i></button>
        </div>    

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.cancelar').click(function(){
      window.location.href='mercancias.php';
    });
  });
</script>
 
      </form>


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