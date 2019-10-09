<?php

    if(isset($_POST)){
  
        require_once '../includes/db.php';
        $servicio = isset($_POST['servicio'])?mysqli_real_escape_string($conn,$_POST['servicio']):false;
        $hora = isset($_POST['hora'])?mysqli_real_escape_string($conn,$_POST['hora']):false;
        $direccion = isset($_POST['direccion'])?mysqli_real_escape_string($conn,$_POST['direccion']):false;
        $precio = isset($_POST['precio'])?mysqli_real_escape_string($conn,$_POST['precio']):false;
        $id = isset($_POST['id'])?mysqli_real_escape_string($conn,$_POST['id']):false;
        $cliente_id = $_SESSION['usuario']['id'];
        //Array de errores
        
        $errores = array();

        //Validad los datos antes de guardarlos en la base de datos
        //Validar campo nombre
        if(empty($servicio)){
          $servicio_validado = false;
          $errores['servicio'] = 'El servicio no es valido';
        }

        //Validad password
        if(empty($hora)){
            $hora_validado = false;
            $errores['hora'] = 'hora no valida';
        }

        if(empty($precio)){
            $precio_validado = false;
            $errores['precio'] = 'precio no valido';
        }

        if(empty($direccion)){
            $direccion_validado = false;
            $errores['direccion'] = 'direccion no valido';
        }

        if (count($errores)==0) {
            $sql = "INSERT INTO CLIENTEXSERVICIO(ID,SERVICIO_ID,CLIENTE_ID,HORA,DIRECCION) VALUES(NULL,'$id','$cliente_id','$hora','$direccion')";
            $guardar = mysqli_query($conn,$sql);
        }
    }
    header('Location:../vistas/inicio.php?guardado');