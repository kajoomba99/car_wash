<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">

  <title>Simple Sidebar - Start Bootstrap Template</title>
  <!-- favicon -->
  <link rel="shortcut icon" type="image/png" href="../img/tire.png"/>
  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <!-- muestra nombre -->
      <div class="sidebar-heading">
        <a href="./inicio.php"><?= isset($_SESSION['usuario'])?$_SESSION['usuario']['nombre']." ".$_SESSION['usuario']['apellidos']:'abuebo' ?></a>
      </div>
      <!-- fin muestra nombre -->
      

      <!-- side bar options -->
      <div class="list-group list-group-flush">
        
        <!-- verifica que el usuario este logueado de lo contrario redirige al login -->
        <?php if(isset($_SESSION['usuario'])): ?>

          <?php if ($_SESSION['usuario']['rol']==1): ?>

            <form action="../vistas/inicio.php" method="POST">

              <input type="hidden" name="show">

              <button class="list-group-item list-group-item-action bg-light">Servicios</button>

            </form>
            <form action="../vistas/inicio.php" method="POST">

              <input type="hidden" name="pedidos">

              <button class="list-group-item list-group-item-action bg-light">Pedidos</button>

            </form>

          <?php elseif($_SESSION['usuario']['rol']==2): ?>

            <form action="../vistas/inicio.php" method="POST">

              <input type="hidden" name="solicitar">

              <button class="list-group-item list-group-item-action bg-light">Solicitar</button>

            </form>

          <?php endif; ?>

            <a href="../includes/cerrar.php" class="list-group-item list-group-item-action bg-light">Cerrar Session</a>

        <?php else: ?>

          <!-- redirige a login si el usuario esta sin loguear -->
          <?php header('Location: login.php'); ?>
          <!-- redirige a login si el usuario esta sin loguear -->

        <?php endif; ?>
        <!-- verifica que el usuario este logueado de lo contrario redirige al login -->

      </div>
      <!-- side bar options -->

  </div>
  <!-- /#sidebar-wrapper -->
  
  <!-- Page Content -->
  <div id="page-content-wrapper">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <button class="btn btn-primary" id="menu-toggle"><ion-icon name="menu"></ion-icon></button>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            
            <?= isset($_SESSION['usuario']) ? '<a class="nav-link" href="#">'.$_SESSION['usuario']['usuario'].' <span class="sr-only">(current)</span></a>':'<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>' ?>
          </li>
        </ul>
      </div>
    </nav>

    
    <?= isset($_GET['editado'])?'
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Transaccion exitosa
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    ':'' ?>

    
    <?= isset($_GET['guardado'])?
      ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Transaccion exitosa
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>'
    :'' ?>
    
    <?php if(isset($_POST['show'])): ?>
        <?php include '../includes/servicio-adm.php'; ?>
    <?php elseif(isset($_POST['store'])): ?>
        <?php include '../includes/crear-servicio-adm.php'; ?>
    <?php elseif(isset($_POST['edit'])): ?>
        <?php include '../includes/editar-servicio-adm.php'; ?>
    <?php elseif(isset($_POST['solicitar'])): ?>
        <?php include '../includes/solicitar-servicio.php'; ?>
    <?php elseif(isset($_POST['confirmar'])): ?>
        <?php include '../includes/confirmar-solicitud.php'; ?>
        <?php elseif(isset($_POST['pedidos'])): ?>
        <?php include '../includes/ver-pedidos.php'; ?>
    <?php else: ?>
      <?php include '../includes/principal-page.php'; ?>
    <?php endif; ?>
    </div>
    
    
  </div>
  
  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Ionicons -->
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>