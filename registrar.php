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
        <div class="card-header">Registra un nuevo usuario</div>
        <div class="card-body">
          <form role="form" action="listaUsuarios.php" method="POST">

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input id="nom" type="text" name="firstName" class="form-control" placeholder="Nombre" required="required" autofocus="autofocus">
                    <label for="nom">Nombre</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input id="last" type="text" name="lastName" class="form-control" placeholder="Apellidos" required="required">
                    <label for="last">Apellidos</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input maxlength="8" minlength="8" id="cde" type="text" name="code" value="<?php $numero = rand(18000, 18999); echo $numero; ?>" class="form-control" placeholder="Código" required="required" readonly>
                    <label for="cde">Código</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input id="ins" type="date" name="inscripcion" class="form-control" placeholder="Fecha de inscripción" required="required">
                    <label for="ins">Fecha de inscripción</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <select class="form-control" name="type" required="required">
                      <option>Mensual</option>
                      <option>Trimestral</option>
                      <option>Anual</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input id="num" type="text" name="number" class="form-control" placeholder="Número telefónico" maxlength="10" minlength="10" required="required">
                    <label for="num">Número telefónico</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input id="direc" type="text" name="adress" class="form-control" placeholder="Dirección" required="required">
                <label for="direc">Dirección</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                      <input type="file" name="foto" required>
                     <label style="size: 20px;">Foto:</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-label-group">
                
              </div>
            </div>

           

            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
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
