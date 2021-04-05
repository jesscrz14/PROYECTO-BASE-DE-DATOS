<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MITO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/letra-m.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Selecao - v2.3.0
  * Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="../index.html">MITO</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="../index.html">Inicio</a></li>
          <li><a href="../index.html#about">Nosotros</a></li>
          <li><a href="../index.html#services">Servicios</a></li>
          <li><a href="../index.html#team">Equipo</a></li>
          <li class="drop-down"><a href="">Gestión de Información</a>
            <ul>
              <li class="drop-down"><a href="#">Tablas</a>
                <ul>
                  <li><a href="../views/clientes.php">Clientes</a></li>
                  <li><a href="../views/curriculum.php">Currículum</a></li>
                  <li><a href="../views/demandante.php">Demandantes</a></li>
                  <li><a href="../views/experiencia.php">Experiencia</a></li>
                  <li><a href="../views/perfil.php">Perfil</a></li>
                  <li><a href="../views/solicitud.php">Solicitudes</a></li>
                  <li><a href="../views/asocia.php">Asocios</a></li>
                </ul>
              </li>
              <li class="drop-down"><a href="#">Consultas</a>
                <ul>
                  <li><a href="../views/operador_logico.php">Operador Lógico</a></li>
                  <li><a href="../views/operador_comparacion.php">Op.Comparación</a></li>
                  <li><a href="../views/join.php">Join</a></li>
                  <li><a href="../views/procedimiento_almacenado.php">Proc. Almacenado</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="../index.html#contact">Contacto</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Operador JOIN</h2>
          <ol>
            <li><a href="../index.html">Inicio</a></li>
            <li>Operador JOIN</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

<!-- AQUI NOS MOSTRARÁ LOS RESULTADOS DE LOS JOIN  -->

    <section class="inner-page">
      <div class="container">
              <h4>Tabla "Solicita" y "Perfil"</h4>
              <p>Con la sentencia LEFT JOIN devolverá el resultado que coincida con la primera tabla (solicita) con los datos que tenga la segunda (perfil) </p>
              <p>Operador a implementar: LEFT JOIN</p>
        <!-- LEFT JOIN -->
  
<table class="table table-striped" style="width: 30rem;">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">CÓDIGO</th>
            <th scope="col">DESCRIPCIÓN</th>
        </tr>
    </thead>

    <tbody>
        <?php
    include "../php/conexion.php";

    $respuesta = $bd->prepare("SELECT solicita.id_solicitud, solicita.cod_perfil, perfil.descripcion FROM solicita LEFT JOIN perfil ON solicita.cod_perfil = perfil.cod_perfil");
      $respuesta->execute();
      $alquileres = [];
      foreach ($respuesta as $res) {
        echo "<tr>";
        echo '<td>' . $res['id_solicitud'] . '</td>';
        echo '<td>' . $res['cod_perfil'] . '</td>';
        echo '<td>' . $res['descripcion'] . '</td>';;
        echo "</tr>";
      }
      ?>
          </tbody>
        </table>
<?php  ?>
<br>

<!-- RIGHT JOIN -->
<h4>Tabla "Solicita" y "Cliente"</h4>
<p>Con la sentencia RIGHT JOIN, notaremos que la diferencia es que devuelve todos los datos de la tabla (solicita) con la que se relaciona.</p>
<p>Operador a implementar: RIGHT JOIN</p>
<table class="table table-striped" style="width: 30rem;">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">CÓDIGO DEL CLIENTE</th>
            <th scope="col">NOMBRE</th>
        </tr>
    </thead>

    <tbody>
        <?php
    include "../php/conexion.php";

    $respuesta = $bd->prepare("SELECT solicita.id_solicitud, cliente.cod_cliente, cliente.nombre FROM solicita RIGHT JOIN cliente ON solicita.cod_cliente = cliente.cod_cliente");
      $respuesta->execute();
      $alquileres = [];
      foreach ($respuesta as $res) {
        echo "<tr>";
        echo '<td>' . $res['id_solicitud'] . '</td>';
        echo '<td>' . $res['cod_cliente'] . '</td>';
        echo '<td>' . $res['nombre'] . '</td>';;
        echo "</tr>";
      }
      ?>
          </tbody>
        </table>
<?php  ?>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>MITO</h3>
      <p>Soluciones de Negocios</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>MITO</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/selecao-bootstrap-template/ -->
        Designed by <a>EQUIPO MITO</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>


</body>

</html>