<?php
	date_default_timezone_set('America/Mexico_City');
	$link = mysqli_connect("localhost", "root", "", "zonasport");
	if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
    $hora = date("H:i:s");

$sql = "UPDATE usuarios SET asistencia = NULL WHERE codigo IS NOT NULL";
if(mysqli_query($link, $sql)){

    echo '';

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Zona Sport</title>

	<!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body id="page-top">
	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
		<a class="navbar-brand mr-1" href="#">Zona Sport</a>

		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
			<i class="fas fa-bars"></i>
		</button>
	</nav>
	<div id="wrapper">
		<ul class="sidebar navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="#">
					<i class="fas fa-fw fa-list"></i>
					<span>Pase de lista</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="registrar.php">
					<i class="fas fa-fw fa-plus"></i>
					<span>Agregar Usuario</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="listarUsuarios.php">
					<i class="fas fa-fw fa-eye"></i>
					<span>Ver usuarios</span>
				</a>
			</li>
		</ul>

		<div id="content-wrapper">
			<div class="container-fluid">
				<div class="card card-login mx-auto mb-3">
		            <div class="card-body">
		              <form role="form" action="paseLista.php" method="POST">
		                <div class="form-group">
		                  <div class="form-label-group">
		                    <input id="cde" type="text" name="inputCode" class="form-control" placeholder="Código" required="required" autofocus="autofocus">
		                    <label for="cde" style="text-align: center;">Código del usuario</label>
		                  </div>
		                </div>
            			<button type="submit" class="btn btn-primary btn-block">Registrar</button>
		              </form>
		            </div>
		        </div>
			</div>
			<footer class="sticky-footer">
	          <div class="container my-auto">
	            <div class="copyright text-center my-auto">
	              <span>Copyright © Zona Sport 2018</span>
	            </div>
	          </div>
	        </footer>
		</div>
	</div>

	<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

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

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
</body>
</html>