<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Copa Campeche 2019</title>
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <div class="app">
    <header class="header">
        <h1 class="header-title p-3">Copa Campeche 2020</h1>
    </header>
    <section class="main">
        @yield('content')
    </section>
    
    <section class="contact">
        <div class="contact-container flex-wrap">
            <!-- <div class="col-xs-12 col-md-3">
                <img class="img-thumbnail" src="images/logo perfil.jpg" alt="">
            </div> -->
            <div class="contact-info col-xs-12col-md-4">
                <h3>Mayores Informes</h3>
                <p><b>Igor Koyoc</b> - 9961078324</p>
                <p><b>Silver Velázquez</b> - 9961095717</p>
                <p><b>Pagos: Verónica Pérez</b> - 9811129975</p>
                <p><b>Hoteles: Edwin Rodríguez</b> - 9811475758</p>
            </div>
        </div>
    </section>

    <section class="download">
        <div class="download-container flex">
            <a href="./resources/convocatoria-copa-campeche-2020.pdf" class="btn btn-info" target="_blank" download="convocatoria-copa-campeche-2020.pdf"><i class="fas fa-download"></i> Descargar Convocatoria</a>
            <a href="/registro" class="btn btn-info ml-3"> Registrarse</a>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <a href="https://www.facebook.com/copacampeche" target="_blank"><i class="fab fa-facebook-square"></i> /copacampeche</a>
            <a href="tel:9961078324"><i class="fas fa-phone-square-alt"></i> 9961078324</a>
            <a href="mailto:copacampeche@hotmail.com"><i class="fas fa-envelope-square"></i> copacampeche@hotmail.com</a>
        </div>
    </footer>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/scripts.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
      $('.carousel').carousel()
  </script>


</body></html>