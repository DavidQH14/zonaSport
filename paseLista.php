<?php
	date_default_timezone_set('America/Mexico_City');
	$link = mysqli_connect("localhost", "root", "", "zonasport");
	if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
    $codigo = $_POST['inputCode'];
    $hora = date("H:i:s");

$sql = "UPDATE usuarios SET asistencia = '$hora' WHERE codigo = '$codigo'";
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
			<li class="nav-item">
				<a class="nav-link" href="/pdf/">
					<i class="fas fa-fw fa-list-alt"></i>
					<span>Generar reporte de asistencia</span>
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
<?php
	$conn = new mysqli("localhost", "root", "", "zonasport");
	if(mysqli_connect_errno())
	{
		echo 'Conexión fallida: ', mysqli_connect_errno();
		exit();
	}

	$sql = "SELECT * FROM usuarios WHERE asistencia IS NOT NULL ORDER BY asistencia DESC";
	$result = mysqli_query($conn, $sql);
?>
		        <div class="card mb-3">
		            <div class="card-body">
		              <div class="table-responsive">
		                <table class="table" width="100%" cellspacing="0">
		                  <thead>
		                    <tr>
		                      <th>Hora de visita</th>
		                      <th>Foto</th>
		                      <th>Nombre</th>
		                      <th>Último pago</th>
		                      <th>Próximo pago</th>
		                      <th>Plan de pago</th>
		                    </tr>
		                  </thead>
		                  <tbody>
		                    <?php while($row=mysqli_fetch_array($result)) {?>
		                    <tr>
		                    	<td>
		                    		<?php echo $row['asistencia']; ?>
		                    	</td>
		                    	<td>
		                    		<?php echo "<img widht='150' height='150' src='fotosUsuarios/" .$row["foto"]. "'></td>";?>
		                    	</td>
		                    	<td>
		                    		<?php echo $row['apellido'].' '.$row['nombre']; ?>
		                    	</td>
		                    	<td>
		                    		<?php echo date(strftime('d/m/Y'), strtotime($row['ultimoPago'])); ?>
		                    	</td>
		                    	<?php 

									$newDate = date("Y/m/d", strtotime($row['proximoPago']));
									$newDate2 = date("Y/m/d");
									$interval = strtotime($newDate)-strtotime($newDate2);
									$resultadoFecha = $interval/86400;

									if($resultadoFecha >= -3 && $resultadoFecha <= 3) { ?>
										<td style="color: #FFBF00;">
											<b><?php echo date(strftime('d/m/Y'), strtotime($row['proximoPago'])); ?></b>
										</td> <?php }
										else if ($resultadoFecha < -3)  { ?>
											<td style="color: #FF0000;">
												<b><?php echo date(strftime('d/m/Y'), strtotime($row['proximoPago'])); ?></b>
											</td> <?php }
											else if ($resultadoFecha > 3) { ?>
												<td style="color: #3ADF00;">
													<b><?php echo date(strftime('d/m/Y'), strtotime($row['proximoPago'])); ?></b>
											</td> <?php } ?>
		                    	<td>
		                    		<?php echo $row['tipoPago']; ?>
		                    	</td>
		                    </tr>
							<?php } ?>
		                  </tbody>
		                </table>
		              </div>
		            </div>
		        </div>
			</div>

			<center><a href="listaVacia.php" class="btn btn-danger">Limpiar lista de visitas</a></center>
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