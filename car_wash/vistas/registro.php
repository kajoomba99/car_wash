<?php
    session_start();
    require_once '../includes/helper.php';
    
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Registro | Car Wash</title>


    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <form class="form-signin" method="POST" action="../database/registrarusuario.php">
    
    <img class="mb-4" src="../img/car2.svg" alt="" width="72" height="72">
    
    <h1 class="h3 mb-3 font-weight-normal">Registro</h1>
    <?php if(isset($_SESSION['completado'])): ?>
        <div class="alerta alerta-exito">
            <?= $_SESSION['completado'] ?>    
        </div>
    <?php elseif(isset($_SESSION['errores']['general'])): ?>
        <div class="alerta alerta-error">
            <?= $_SESSION['errores']['general'] ?>    
        </div>
    <?php endif; ?>
        <!-- Nombre -->
        <label for="nombre" class="sr-only">Nombre</label>

        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" autofocus>

        <?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'nombre') : '' ?>
         <!-- Apellidos -->
        <label for="apellidos" class="sr-only">Apellidos</label>

        <input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos">
        <?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'apellidos') : '' ?>
        <!-- correo -->
        <label for="correo" class="sr-only">Correo</label>

        <input type="email" id="correo" name="correo" class="form-control" placeholder="Correo">
        <?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'correo') : '' ?>
        <!-- Usuario -->
        <label for="user" class="sr-only">Usuario</label>

        <input type="text" id="user" name="user" class="form-control" placeholder="Usuario">
        <?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'user') : '' ?>
        <!-- contraseña -->
        <label for="password" class="sr-only">Contraseña</label>

        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
        <?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'password') : '' ?>
        <!-- direccion -->
        <label for="direccion" class="sr-only">Direccion</label>

        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Direccion">
        <?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'direccion') : '' ?>
        <!-- ciudad -->
        <label for="ciudad" class="sr-only">Ciudad</label>

        <input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="Ciudad">
        <?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'ciudad') : '' ?>
        <!-- celular -->
        <label for="celular" class="sr-only">Celular</label>

        <input type="number" id="celular" name="celular" class="form-control" placeholder="Celular">
        <?= isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'],'celular') : '' ?>

        <!-- submit -->

        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
        <a href="./login.php">Volver</a>
        <!-- <p class="mt-5 mb-3 text-muted">&copy; <?= Date('Y') ?></p> -->
    </form>
    
    <?php @borrarErrores() ?>

</body>

</html>