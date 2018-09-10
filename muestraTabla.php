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

<html>
<head>
	<meta charset="utf-8">
	<title>Zona Sport</title>
</head>
<body>
<div id="content-wrapper">
			<div class="container-fluid">

		        <div class="card mb-3">
		            <div class="card-body">
		              <div class="table-responsive">
		                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
		                  <thead>
		                    <tr>
		                      <th>Nombre</th>
		                      <th>Código</th>
		                      <th>Fecha de inscripción</th>
		                      <th>Último pago</th>
		                      <th>Tipo de pago</th>
		                      <th>Teléfono</th>
		                      <th>Dirección</th>
		                    </tr>
		                  </thead>
		                  <tbody>
		                    <?php while($row=mysqli_fetch_array($result)) {?>
		                    <tr>
		                    	<td>
		                    		<?php echo $row['apellido'].' '.$row['nombre']; ?>
		                    	</td>
		                    	<td>
		                    		<?php echo $row['codigo']; ?>
		                    	</td>
		                    	<td>
		                    		<?php echo $row['inscripcion']; ?>
		                    	</td>
		                    	<td>
		                    		<?php echo $row['ultimoPago']; ?>
		                    	</td>
		                    	<td>
		                    		<?php echo $row['tipoPago']; ?>
		                    	</td>
		                    	<td>
		                    		<?php echo $row['telefono']; ?>
		                    	</td>
		                    	<td>
		                    		<?php echo $row['direccion']; ?>
		                    	</td>
		                    </tr>
							<?php } ?>
		                  </tbody>
		                </table><a class="trigger_popup_fricc">Click here to show the popup</a>

<div class="hover_bkgr_fricc">
    <span class="helper"></span>
    <div>
        <div class="popupCloseButton">X</div>
        <p>Add any HTML content<br />inside the popup box!</p>
    </div>
</div>
		              </div>
		            </div>
		        </div>
			</div>
		</div>
		
</body>
</html>