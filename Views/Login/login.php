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
  <title>Login </title>
</head>

<body>

  </nav>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>Login- Love On</h1>
    </div>
    <div class="login-box">
      <div id="divLoading" class="divLoading" >
        <div >
          <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
        </div>
      </div>
      <form class="login-form formLogin" id="formLogin" name="formLogin" action="">
        <h3 class="login-head"><i  class="fa fa-lg fa-fw fa-user"></i>Iniciar Sesion</h3>
        <div class="form-group">
          <label class="control-label">Usuario</label>
          <input id="txtEmail" name="txtEmail" class="form-control txtEmail" type="email" placeholder="Email" autofocus>
        </div>
        <div class="form-group">
          <label class="control-label">Contraseña</label>
          <input id="txtPassword" name="txtPassword" class="form-control txtPassword" type="password" placeholder="Contraseña">
        </div>
        <div class="form-group">
          <div class="utility">
            <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvidaste Contraseña ?</a></p>
          </div>
         
        </div>

        <div id="alertLogin" class="text-center"></div>

        <div class="form-group btn-container">
          <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Iniciar Sesion</button>
        </div>
        <div class="utility">
            <p class="semibold-text mb-2"><a href="<?=base_url() ;?>/registro" >Registrarse</a></p>
          </div>
      </form>
<!--Modal de resel de password-->
      <form  id="formRecetPass" name="formRecetPass" class="forget-form formRecetPass" action="">
        <h3 class="login-head"><i class="fas fa-lock"></i>Olvidaste tu Contraseña ?</h3>
        <div class="form-group">
          <label class="control-label">EMAIL</label>
          <input id="txtEmailReset" name="txtEmailReset" class="form-control txtEmailReset" type="email" placeholder="Email">
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
  <script src="<?= media(); ?>/js/<?= $data['page_functions_js'] ?>"></script>

</body>

</html>