<?php
	$link = mysqli_connect("localhost", "root", "", "zonasport");
	if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
    $nombre = $_POST['firstName'];
    $apellidos = $_POST['lastName'];
    $codigo = $_POST['code'];
    $fechains = $_POST['inscripcion'];
    $tipoPago = $_POST['type'];

if($tipoPago == 'Mensual')
{
	$nuevafecha = strtotime ( '+1 month' , strtotime ( $fechains ) ) ;
	$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
}
else if($tipoPago == 'Trimestral')
{
	$nuevafecha = strtotime ( '+3 month' , strtotime ( $fechains ) ) ;
	$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
}
else if($tipoPago == 'Anual')
{
	$nuevafecha = strtotime ( '+1 year' , strtotime ( $fechains ) ) ;
	$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
}

    

    $numero = $_POST['number'];
    $direccion = $_POST['adress'];
    $foto = $_POST['foto'];

$sql = "INSERT INTO usuarios(id, nombre, apellido, codigo, inscripcion, ultimoPago, proximoPago, tipoPago, telefono, direccion, asistencia, foto) VALUES ('', '$nombre', '$apellidos', '$codigo', '$fechains', '$fechains', '$nuevafecha', '$tipoPago', '$numero', '$direccion', NULL, '$foto')";
if(mysqli_query($link, $sql)){

    echo '';

} else{
	?>
   	<script language="JavaScript" type="text/javascript">
		alert("El código es repetido, intente con uno nuevo");
	</script>
<?php
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

    <script type="text/javascript" language="JavaScript">
    	function nobackbutton(){
    		window.location.hash="no-back-button";
    		window.location.hash="Again-No-back-button";
    		window.onhashchange=function(){window.location.hash="no-back-button";}
    	}
    </script>
</head>
<body id="page-top" onload="nobackbutton();">
	<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
		<a class="navbar-brand mr-1" href="#">Zona Sport</a>

		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
			<i class="fas fa-bars"></i>
		</button>
	</nav>
	<div id="wrapper">
		<ul class="sidebar navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="index.php">
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
			<li class="nav-item active">
				<a class="nav-link" href="#">
					<i class="fas fa-fw fa-eye"></i>
					<span>Ver usuarios</span>
				</a>
			</li>
		</ul>
<?php
	$conn = new mysqli("localhost", "root", "", "zonasport");
	if(mysqli_connect_errno())
	{
		echo 'Conexión fallida: ', mysqli_connect_errno();
		exit();
	}

	$sql = "SELECT * FROM usuarios ORDER BY id";
	$result = mysqli_query($conn, $sql);
?>
		<div id="content-wrapper">
			<div class="container-fluid">

		        <div class="card mb-3">
		            <div class="card-body">
		              <div class="table-responsive">
		                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
		                  <thead>
		                    <tr>
		                      <th>Nombre</th>
		                      <th>Foto</th>
		                      <th>Código</th>
		                      <th>Fecha de inscripción</th>
		                      <th>Próximo pago</th>
		                      <th>Tipo de pago</th>
		                      <th>Teléfono</th>
		                      <th>Dirección</th>
		                      <th>-</th>
		                      <th>-</th>
		                    </tr>
		                  </thead>
		                  <tbody>
		                    <?php while($row=mysqli_fetch_array($result)) {?>
		                    <tr>
		                    	<td>
		                    		<?php echo $row['apellido'].' '.$row['nombre']; ?>
		                    	</td>
		                    	<td>
		                    		<?php echo "<img widht='75' height='75' src='fotosUsuarios/" .$row["foto"]. "'></td>";?>
		                    	</td>
		                    	<td>
		                    		<?php echo $row['codigo']; ?>
		                    	</td>
		                    	<td>
		                    		<?php echo $row['inscripcion']; ?>
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
		                    	<td>
		                    		<?php echo $row['telefono']; ?>
		                    	</td>
		                    	<td>
		                    		<?php echo $row['direccion']; ?>
		                    	</td>
								<td>
									<a href="editaUsuario.php?id=<?=$row['id'];?>"><i class="fas fa-fw fa-edit"></i></a>
								</td>
								<td>
									<a href="eliminaUsuario.php?id=<?=$row['id'];?>"><i class="fas fa-fw fa-trash"></i></a>
								</td>
		                    </tr>
							<?php } ?>
		                  </tbody>
		                </table>
		              </div>
		            </div>
		        </div>
			</div>

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