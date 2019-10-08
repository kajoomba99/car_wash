<?php

    //Iniciar session
    @session_start();
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'car_wash'
    );
    if (mysqli_connect_errno()) {
       echo 'La conexion a la base de datos MySQL ha fallado: '.mysqli_connect_error();
    }

    mysqli_query($conn,"SET NAMES 'utf-8'");

?>