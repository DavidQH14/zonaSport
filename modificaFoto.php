<?php
	$contacto = new mysqli("localhost", "root", "", "zonasport");
	if(mysqli_connect_errno())
	{
    	echo'Conexion Fallida:',mysqli_connect_error();
    	exit();
	}

	if(isset($_POST['guardar']))
	{
		$id = $_GET['id'];
		$foto = $_POST['foto'];

		$resultado = $contacto->query("update  usuarios set foto = '".$foto."' where id='".$id."' ");
	}
	if($resultado>0)
	{ ?>

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

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header"><center><h1>Los cambios se realizaron correctamente</h1></center></div>
        <div class="card-body">
          <form>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                  	<center><img src="success.png" style="width: 200px"></center>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                  	<center><a href="listarUsuarios.php" class="btn-success btn-lg">A c e p t a r</a></center>
                  </div>
                </div>
              </div>
            </div>
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

<?php } else{
echo'no sirve :(';
}
?>