<?php
  
  require "conexion.php";
  include "authuser.php";
  include "funciones.php";
  
  if(!$uv){
  header("Location: login.php");
  exit();
}elseif($fu['rol'] >= 2){
  header("Location: index.php");
  header("Location: index_usuario.php");
  exit();
}

/********************GRAFICA**************/
$sql ="SELECT mercancia, cantidad FROM registros";
$res = $conection->query($sql);

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
  <title>Almacen</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="Highcharts-4.1.5/js/highcharts.js" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Almacen</a>
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
                <a href="agregar_mercancia.php">Agregar mercancia</a>
              </li>
              <li>
                <a href="mercancia_editar.php">Editar mercancia</a>
              </li>
              <li>
                <a href="mercancia_borrar.php">Borrar mercancia</a>
              </li>
              <li>
                <a href="mercancias.php">Ver mercancia</a>
              </li>
            </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="CodigoQR">
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
            <span class="nav-link-text">Usuarios</span>
          </a>


          <ul class="sidenav-second-level collapse" id="collapseComponents">

            <?php if($fu['rol']<=2){ ?>
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
           <?php if($fu['rol']<=2){ ?>
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
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
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
        <li class="breadcrumb-item">
          <a href="#">Almacen</a>
        </li>
        <li class="breadcrumb-item active">Mi Almacen</li>
      </ol>
        <div class="card-body">
           <script type="text/javascript" src="loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Mercancia', 'Cantidad'],
          <?php
            while ($datos = $res->fetch_assoc()) {
              echo "['".$datos["mercancia"]."',".$datos["cantidad"]."],";
            }
            //['work', 2],
          ?>
        ]);

        var options = {
          title: 'Mercancia en almacen'
          /*,is3D: true
          */
          /*,
          pieHole: 0.4,
          */  
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
        </div>    
    <!-- Scroll to Top Button-->
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
          <div class="modal-body">¿Quiere cerrar session?.</div>
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
