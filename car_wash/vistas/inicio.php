<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/simple-sidebar.css" rel="stylesheet">

</head>

<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">
        <a href="./inicio.php"><?= isset($_SESSION['usuario'])?$_SESSION['usuario']['nombre']." ".$_SESSION['usuario']['apellidos']:'abuebo' ?></a>
      </div>
      <div class="list-group list-group-flush">
        
        <?php if(isset($_SESSION['usuario'])): ?>
        <?php if ($_SESSION['usuario']['rol']==1): ?>
        
        <form action="../vistas/inicio.php" method="POST">
        <input type="hidden" name="show">
        <button class="list-group-item list-group-item-action bg-light">Servicios</button>
      </form>
        <button href="#" class="list-group-item list-group-item-action bg-light">Pedidos</button>
      <?php elseif($_SESSION['usuario']['rol']==2): ?>
        <form action="../vistas/inicio.php" method="POST">
          <input type="hidden" name="solicitar">
          <button class="list-group-item list-group-item-action bg-light">Solicitar</button>
        </form>
      <?php endif; ?>
      <a href="../includes/cerrar.php" class="list-group-item list-group-item-action bg-light">Cerrar Session</a>
      <?php else: ?>
      <?php header('Location: login.php'); ?>
      <?php endif; ?>
    </div>
  </div>
  <!-- /#sidebar-wrapper -->
  
  <!-- Page Content -->
  <div id="page-content-wrapper">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
      
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
    <?= isset($_GET['editado'])?'<h2 style="background-color:#6cf66c;">Servicio creado con exito</h2>':'' ?>
    <?= isset($_GET['guardado'])?'<h2 style="background-color:#6cf66c;">Servicio editado con exito</h2>':'' ?>
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
    <?php else: ?>
      <?php include '../includes/principal-page.php'; ?>
    <?php endif; ?>
    </div>
    
    
  </div>
  
  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>