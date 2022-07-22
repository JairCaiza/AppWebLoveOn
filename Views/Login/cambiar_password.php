<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Jairo Caiza">
  <meta name="theme-color" content="#452F75">
  <link rel="shortcut icon" href="<?= media(); ?>/images/favico.ico">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
  <title>Login - Tienda Virtual</title>
</head>

<body>

  </nav>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>Resetear contraseña</h1>
    </div>
    <div class="login-box flipped">
<!--Modal de resel de password-->
      <form  id="formCambiarPass" name="formCambiarPass" class="forget-form formCambiarPass" action="">
          <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $data['idpersona']?>" require="">
          <input type="hidden" id="txtEmail" name="txtEmail" value="<?= $data['email']?>" require="">
          <input type="hidden" id="txtToken" name="txtToken" value="<?= $data['token']?>" require="">
        <h3 class="login-head"><i class="fas fa-key"></i>Cambiar contraseña</h3>
        <div class="form-group">          
          <input id="txtPassword" name="txtPassword" class="form-control txtPassword" type="password" placeholder="Nueva Contraseña" required>
        </div>
        <div class="form-group">          
          <input id="txtPasswordConfirm" name="txtPasswordConfirm" class="form-control txtPasswordConfirm" type="password" placeholder="Confirme Contraseña" required>
        </div>
        <div class="form-group btn-container">
          <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Enviar</button>
        </div>
        <div class="form-group mt-3">
          <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Iniciar Sesion</a></p>
        </div>
      </form>
      <!--fin modal recet-->
    </div>
  </section>
  <script>
    const base_url = "<?= base_url(); ?>";
  </script>
  <script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
  <script src="<?= media(); ?>/js/popper.min.js"></script>
  <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
  <script src="<?= media(); ?>/js/fontawesome.js"></script>
  <script src="<?= media(); ?>/js/main.js"></script>


  <!-- The javascript plugin to display page loading on top-->
  <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
  <script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>
  <script src="<?= media(); ?>/js/functions_login.js"></script>

</body>

</html>