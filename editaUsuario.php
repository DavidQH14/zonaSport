<?php
	$contacto = new mysqli("localhost", "root", "", "zonasport");
	if(mysqli_connect_errno())
	{
    	echo'Conexion Fallida:',mysqli_connect_error();
    	exit();
	}
	$id = $_GET['id'];

	$resultado=$contacto->query("SELECT * FROM usuarios where id='".$id."'");
	$a=mysqli_data_seek ($resultado, 0);
	$row= mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Zona Sport - Registro</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <meta http-equiv="Expires" content="0" /> 
<meta http-equiv="Pragma" content="no-cache" />

<script type="text/javascript">
  if(history.forward(1)){
    location.replace( history.forward(1) );
  }
</script>

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Modifica los datos del usuario</div>
        <div class="card-body">
          <form name="modificaContacto" role="form" action="modificaContacto.php?id=<?=$id?>" method="POST">

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input id="name" type="text" name="firstName" class="form-control" placeholder="Nombre" value="<?=$row['nombre'];?>" required="required" autofocus="autofocus">
                    <label for="name" style="color: #FF0000"><b>Nombre</b></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input id="lastname" type="text" name="lastName" class="form-control" placeholder="Apellidos" value="<?=$row['apellido'];?>" required="required">
                    <label for="lastname" style="color: #FF0000"><b>Apellidos</b></label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input id="cde" type="text" name="code" class="form-control" placeholder="Código" value="<?=$row['codigo'];?>" required="required" readonly>
                    <label for="cde" style="color: #FF0000"><b>Código</b></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input id="ins" type="date" name="inscripcion" class="form-control" placeholder="Fecha de inscripción" value="<?=$row['inscripcion'];?>" required="required" readonly>
                    <label for="ins" style="color: #FF0000"><b>Fecha de inscripción</b></label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
              	<div class="col-md-6">
                  <div class="form-label-group">
                    <input id="ult" type="date" name="ultimoPago" class="form-control" placeholder="Fecha del último pago" value="<?=$row['ultimoPago'];?>" required="required">
                    <label for="ult" style="color: #3ADF00"><b>Fecha del último pago</b></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select class="form-control" name="type" required="required">
                      <option>Mensual</option>
                      <option>Trimestral</option>
                      <option>Anual</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
              	<div class="col-md-6">
                  <div class="form-label-group">
                    <input id="num" type="text" name="number" class="form-control" placeholder="Número telefónico" value="<?=$row['telefono'];?>" required="required">
                	<label for="num" style="color: #3ADF00"><b>Número telefónico</b></label>
                  </div>
                </div>
                <div class="col-md-6">
	              <div class="form-label-group">
	                <input id="adrss" type="text" name="adress" class="form-control" placeholder="Dirección" value="<?=$row['direccion'];?>" required="required">
	                <label for="adrss" style="color: #3ADF00"><b>Dirección</b></label>
	              </div>
		        </div>
		      </div>
            </div>
			
			<input type="submit" class="btn btn-primary btn-block" name="guardar" value="Guardar cambios">
          </form>
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
