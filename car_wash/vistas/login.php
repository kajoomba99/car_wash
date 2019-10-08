<?php 
    session_start();
    if (isset($_SESSION['usuario'])) {
        //Redirigir al index
        header("Location: ../vistas/inicio.php");
    }
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Login | Car Wash</title>


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
    <form class="form-signin" method="POST" action="../database/verificarlogin.php">
    
    <img class="mb-4" src="../img/car2.svg" alt="" width="72" height="72">
    
    <h1 class="h3 mb-3 font-weight-normal">Por favor ingrese</h1>
    <?= isset($_SESSION['error_login'])?$_SESSION['error_login']:'' ?>
        <label for="user" class="sr-only">Usuario</label>

        <input type="text" id="user" name="user" class="form-control" placeholder="Usuario" required autofocus>

        <label for="password" class="sr-only">Contraseña</label>

        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <a href="./registro.php">Registro</a>
        <!-- <p class="mt-5 mb-3 text-muted">&copy; <?= Date('Y') ?></p> -->
    </form>
</body>

</html>