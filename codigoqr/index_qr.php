<?php
  
  require "../conexion.php";
  include "../authuser.php";
  include "../funciones.php";

  if(!$uv){
  header("Location: ../login.php");
  exit();
}elseif($fu['rol'] >= 3){
  header("Location: index_qr.php");
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
  <title>Almacen</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index_qr.php">Código QR</a>
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
                <a href="../agregar_mercancia.php">Agregar mercancia</a>
              </li>
              <li>
                <a href="../mercancia_editar.php">Editar mercancias</a>
              </li>
              <li>
                <a href="../mercancia_borrar.php">Borrar mercancias</a>
              </li>
              <li>
                <a href="../mercancias.php">Ver mercancia</a>
              </li>
              
            </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="../graficas.php">
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
            <?php if($fu['rol']<=1){ ?>
                <li class="disabled"><a href="../ver_usuarios.php">Ver usuarios</a></li> 
                <li class="disabled"><a href="../register.php">Registrar usuarios</a></li>
                <li class="disabled"><a href="../usuario_borrar.php">Borrar usuarios</a></li> 
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
                <li class="disabled"><a href="../pdf/reporte.php">Mercancia PDF</a></li> 
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
        <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal" aria-haspopup="true" aria-expanded="false"><?=$fu['nombre']?>      
        <li class="nav-item">
          <i class="fa fa-fw fa-sign-out"></i>Salir</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Código QR</li>
      </ol>

      <?php
    require ('phpqrcode/qrlib.php');


    if (isset($_POST['generar']))
      {
//Verificamos que no haya ningun dato sin rellenar
    if (!empty($_POST['contenido'])) 
      {
//Creamos la carpeta temp para guardar los codigos qr generados
      $dir = 'temp/';
//Preguntar si existe la variable dir y si no, crearla
      if (!file_exists($dir))
        mkdir($dir); 
      {
//variables
      $contenido = $_POST['contenido']; //Dato a generar qr
      $tamano = htmlentities($_POST['tamano']); //Tamaño de la imagen
      $nivel = htmlentities($_POST['nivel']); //Nivel de seguridad
      $filename = $dir.'mercancia.png'; //Archivo qr donde se guardara
      $marco = 3; //Marco
//Clase codigo QR: funcion png
      QRcode::png($contenido, $filename, $nivel, $tamano, $marco); 
  
          //Mostramos la imagen generada
      echo '<img src="'.$filename.'"align="lef"/>'; 
    } 
  } 
}

?>

<form action="index_qr.php" method="post">
  <font color="black">
    <h3>Mercancias</h3>
      <select name="contenido">
        <option value="1">Selecciona mercancia</option>
        
          <?php
//Conexion a base de datos 
//Conectarnos a la base de datos
            $conection = new mysqli('localhost','root','','controlalmacen');
//Una vez iniciada la conexion. si queremos hacer una consulta podemos hacerlo de la siguiente manera
            $query = "SELECT * From registros";
//            "select * from registros where 1";
//
            $resultado=$conection->query($query);
            if ($resultado != false) 
            {
              $sql = "SELECT * From 'registros'"; 
            }
            else
            {
              echo 'Error en la consulta';
            }
//Podemos extraer la informacion de las filas que contiene el objeto $resultado
//Debemos recorrer las filas de  $resultado para ello nos ayudaremos con el atributo publico $num_rows
            for ($i=0;$i < $resultado->num_rows; $i++) { 
                
            $fila_mercancia=$resultado->fetch_assoc();
            echo "<option>Id:";
            echo "<TR><TD>";
              echo $fila_mercancia["id"];
              echo "<TD>, Cliente:";
              echo $fila_mercancia["cliente"];
              echo "<TD>, Mercancia:";
              echo $fila_mercancia["mercancia"];
              echo "<TD>, Cantidad:";
              echo $fila_mercancia["cantidad"];
              echo "<TD>, Folio";
              echo $fila_mercancia["numero_folio"];
              echo "<TD>, Transporte:";
              echo $fila_mercancia["tipo_transporte"];
              echo "<TD>, Presentación:";
              echo $fila_mercancia["presentacion_mercancia"];
              echo "<TD>, Contenedor:";
              echo $fila_mercancia["numero_contenedor"];
              echo "<TD>, Sello:";
              echo $fila_mercancia["numero_sello"];
              echo "<TD>, Fecha entrada:";
              echo $fila_mercancia["fecha_entrada"];
              echo "<TD>, Fecha salida:";
              echo $fila_mercancia["fecha_salida"];
              echo "<TD>";              
              echo "</TR>";
              echo "</option>";
              /*
            echo "<option>'".$fila_mercancia['id'].",".$fila_mercancia['cliente'].",".$fila_mercancia['mercancia'].",".$fila_mercancia['cantidad'].",".$fila_mercancia['numero_folio'].",".$fila_mercancia['tipo_transporte'].",".$fila_mercancia['presentacion_mercancia'].",".$fila_mercancia['numero_contenedor'].",".$fila_mercancia['numero_sello'].",".$fila_mercancia['fecha_entrada'].",".$fila_mercancia['fecha_salida']."'</option>";
            */

            $conection->close();
            }
            ?>
            
      </select>

      <h4>
        <li><font color="blue">L: </font>Seguridad baja</li>
        <li><font color="blue">M: </font>Seguridad media</li>
        <li><font color="blue">Q: </font>Seguridad media/alta</li>
        <li><font color="blue">H: </font>Seguridad alta</li>
        </h4>
        Nivel:<select name="nivel">
              <option>L</option>
              <option>M</option>
              <option>Q</option>
              <option>H</option>          
            </select>
        Tamaño:<select name="tamano">
              <option>5</option>
              <option>10</option>
              <option>15</option>
              <option>20</option> 
              <option>25</option>         
            </select><br><br>
            

            <input type="submit" name="generar" value="Generar" style="color:black;height: 30px; width: 150px">
      
  </font>
</form>
          
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
            <a class="btn btn-primary" href="../login.php">Salir</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>
  </div>
</body>
</html>