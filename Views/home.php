<!DOCTYPE html>
<html lang="en">

<head>

    <title>Love On</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?= mediahome(); ?>stylesinfor/tooplate-gymso-style.css">
    <link rel="stylesheet" href="<?= mediahome(); ?>stylesinfor/bootstrap.min.css">

    <link rel="stylesheet" href="<?= mediahome(); ?>vistas/stylesinfor/aos.css">

    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap-select.min.css">



    -->
</head>

<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-left">
        <div class="container">

            <a class="navbar-brand" href="index.php">Love On</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-form navbar-center" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="#home" class="nav-link smoothScroll">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a href="#class" class="nav-link smoothScroll">Clases</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link smoothScroll">Contacto</a>
                    </li>
                </ul>

            </div>


        </div>
        <div class="social ">
            <ul class="social-icon mt-5">
                <li><a href="https://www.instagram.com/eabelgm/" class="fa fa-instagram"></a></li>
            </ul>
        </div>
        <div class="social">
            <ul class="social-icon mt-5">
                <li><a href="https://www.facebook.com/loveon.org" class="fa fa-facebook"></a></li>
            </ul>
        </div>
        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Mi Cuenta
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="<?= base_url(); ?>/login">Login</a>
                <a class="dropdown-item" href="<?= base_url(); ?>/registro">Registrate</a>
            </div>
        </div>

       
    </nav>
    <!-- Example split danger button -->



    <!-- HERO -->
    <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

        <div class="bg-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-10 mx-auto col-12">
                    <div class="hero-text mt-5 text-center">

                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Una Fundacion que te acoje</h1>

                        <a href="#feature" class="btn btn-outline-success" data-aos="fade-up" data-aos-delay="600">Empezar</a>

                        <a href="#about" class="btn btn-outline-warning" data-aos="fade-up" data-aos-delay="700">Aprende Mas</a>

                    </div>
                    <div class="hero-text mt-3 text-center">
                        <a href="<?= base_url(); ?>/registro" class="btn btn-outline-info" data-aos="fade-up" data-aos-delay="5000">Apadrinate hoy</a>

                    </div>
                   
                </div>

            </div>
        </div>
    </section>

<section class="feature" id="feature">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="D:\xampp\htdocs\AppWebLoveOn\Views\sliders\slider1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</section>
    <section class="feature" id="feature">
        
        <div class="container">
            <div class="row">

                <div class="d-flex flex-column justify-content-center ml-lg-auto mr-lg-5 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-3 text-white" data-aos="fade-up">Una Nueva fundacion</h2>

                    <h6 class="mb-4 text-white" data-aos="fade-up">Una fundacion gratuita</h6>

                    <p data-aos="fade-up" data-aos-delay="200">Gymso is free HTML template by <a rel="nofollow" href="https://www.facebook.com/profile.php?id=100073450059325" target="_parent">Tooplate</a> for your commercial website. Bootstrap v4.2.1 Layout. Feel free to use it.</p>

                    <a href="#contact" class="btn custom-btn bg-color mt-3" class="nav-link smoothScroll">Hazte Miembro hoy</a>
                </div>

                <div class="mr-lg-auto mt-3 col-lg-4 col-md-6 col-12">
                    <div class="about-working-hours">
                        <div>

                            <h2 class="mb-4 text-white" data-aos="fade-up" data-aos-delay="500">Horas Laborables</h2>

                            <strong class="d-block" data-aos="fade-up" data-aos-delay="600">Sunday : Closed</strong>

                            <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Monday - Friday</strong>

                            <p data-aos="fade-up" data-aos-delay="800">7:00 AM - 10:00 PM</p>

                            <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Saturday</strong>

                            <p data-aos="fade-up" data-aos-delay="800">6:00 AM - 4:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section class="about section" id="about">
        <div class="container">
            <div class="row">

                <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-5 col-md-10 mx-auto col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Hola somos Love On</h2>

                    <p data-aos="fade-up" data-aos-delay="400">You are NOT allowed to redistribute this HTML template downloadable ZIP file on any template collection site. You are allowed to use this template for your personal or business websites.</p>

                    <p data-aos="fade-up" data-aos-delay="500">If you have any question regarding <a rel="nofollow" href="https://www.tooplate.com/view/2119-gymso-fitness" target="_parent">Gymso Fitness HTML template</a>, you can <a rel="nofollow" href="https://www.tooplate.com/contact" target="_parent">contact Tooplate</a> immediately. Thank you.</p>

                </div>

                <div class="ml-lg-auto col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="700">
                    <div class="team-thumb">
                        <img src="<?= mediahome(); ?>images/logo.jpg" class="img-fluid" alt="Trainer">

                        <div class="team-info d-flex flex-column">

                            <h3>Paul Cevallos</h3>
                            <span>Presidente</span>

                            <ul class="social-icon mt-3">
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-instagram"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="800">
                    <div class="team-thumb">
                        <img src="<?= mediahome(); ?>images/team-image01.jpg" class="img-fluid" alt="Trainer">

                        <div class="team-info d-flex flex-column">

                            <h3>Miembro 2</h3>
                            <span>Body trainer</span>

                            <ul class="social-icon mt-3">
                                <li><a href="#" class="fa fa-instagram"></a></li>
                                <li><a href="#" class="fa fa-facebook"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="800">
                    <div class="team-thumb">
                        <img src="<?= mediahome(); ?>images/team-image01.jpg" class="img-fluid" alt="Trainer">

                        <div class="team-info d-flex flex-column">

                            <h3>Miembro 3</h3>
                            <span>Body trainer</span>

                            <ul class="social-icon mt-3">
                                <li><a href="#" class="fa fa-instagram"></a></li>
                                <li><a href="#" class="fa fa-facebook"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- CLASS -->
    <section class="class section" id="class">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center mb-5">
                    <h2 data-aos="fade-up" data-aos-delay="200">Nuestras Actividades Diarias</h2>
                </div>

                <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="<?= mediahome(); ?>images/class/clasesinicial.jpg" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Educacion Inicial</h3>

                            <span><strong>Trained by</strong> - Bella</span>

                            <span class="class-price">gratis</span>

                            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                        </div>
                    </div>
                </div>

                <div class="mt-5 mt-lg-0 mt-md-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">
                    <div class="class-thumb">
                        <img src="<?= mediahome(); ?>images/class/english.jpg" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Ingles</h3>

                            <span><strong>Trained by</strong> - Mary</span>

                            <span class="class-price">gratis</span>

                            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                        </div>
                    </div>
                </div>

                <div class="mt-5 mt-lg-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                    <div class="class-thumb">
                        <img src="<?= mediahome(); ?>images/class/programacion.jpg" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Programacion</h3>

                            <span><strong>Trained by</strong> - Cathe</span>

                            <span class="class-price">gratis</span>

                            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- CONTACT -->
    <section class="contact section" id="contact">
        <div class="container">
            <div class="row">

                <div class="ml-auto col-lg-5 col-md-6 col-12">
                    <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="200">Deje tus datos aqui</h2>



                    <form id="formContacto" name="formContacto" class="form-horizontal">
                        <input type="text" class="form-control" name="txtnombres" id="txtnombres" placeholder="Nombres y Apellidos">

                        <input type="email" class="form-control" name="txtemail" id="txtemail" placeholder="Email">
                        <input type="telefono" class="form-control" name="txttelefono" id="txttelefono" placeholder="Telefono/Celular">

                        <textarea class="form-control" rows="5" name="txtmensaje" id="txtmensaje" placeholder="Message"></textarea>

                        <button type="submit" class="form-control" id="submit-button" name="submit">Enviar Mensaje</button>
                    </form>
                </div>

                <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="600">Ud Puede encontrarnos <span>Aqui</span></h2>

                    <p data-aos="fade-up" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i> Cerca a Multiplaza</p>

                    <div class="google-map" data-aos="fade-up" data-aos-delay="900">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2966.2447894941224!2d-78.66275080947959!3d-1.6553911084423658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d307aea0a4344d%3A0x62edb7312044a309!2sDespertar%20de%20Los%20%C3%81ngeles!5e0!3m2!1ses!2sec!4v1650412973515!5m2!1ses!2sec" width="1920" height="250" frameborder="0" style="border: 0;" allowfullscreen=""></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="ml-auto col-lg-4 col-md-5">
                    <p class="copyright-text">Copyright &copy; JLSoftware

                        <br>Design: <a href="https://www.facebook.com/profile.php?id=100073450059325">JLSoftware</a>
                    </p>
                </div>

                <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                    <p class="mr-4">
                        <i class="fa fa-envelope-o mr-1"></i>
                        <a href="https://www.facebook.com/profile.php?id=100073450059325">caizaj@gmail.com</a>
                    </p>

                    <p><i class="fa fa-phone mr-1"></i> 0983972628</p>
                </div>

            </div>
        </div>
    </footer>

    <!-- SCRIPTS -->
    <script src="<?= mediahome(); ?>jsinfor/jquery.min.js"></script>
    <script src="<?= mediahome(); ?>jsinfor/bootstrap.min.js"></script>
    <script src="<?= mediahome(); ?>jsinfor/aos.js"></script>
    <script src="<?= mediahome(); ?>jsinfor/smoothscroll.js"></script>
    <script src="<?= mediahome(); ?>jsinfor/custom.js"></script>
    <script src="<?= media(); ?>/js/fontawesome.js"></script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript" src="<?= media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/bootstrap-select.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="<?= media(); ?>/js/<?= $data['page_functions_js'] ?>"></script>

</body>

</html>