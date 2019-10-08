<?php 
    if(isset($_POST)){
  
        require_once '../includes/db.php';
        $id = isset($_POST['id'])?mysqli_real_escape_string($conn,$_POST['id']):false;
        $servicio = isset($_POST['servicio'])?mysqli_real_escape_string($conn,$_POST['servicio']):false;
        $descripcion = isset($_POST['descripcion'])?mysqli_real_escape_string($conn,$_POST['descripcion']):false;
        $precio = isset($_POST['precio'])?mysqli_real_escape_string($conn,$_POST['precio']):false;
        
        //Array de errores
        
        $errores = array();

        //Validad los datos antes de guardarlos en la base de datos
        //Validar campo nombre
        if(!empty($servicio)){
            $servicio_validado = true;
        }else{
          $servicio_validado = false;
          $errores['servicio'] = 'El servicio no es valido';
        }

        //Validad password
        if(!empty($descripcion)){
            $descripcion_validado = true;
        }else{
            $descripcion_validado = false;
            $errores['descripcion'] = 'descripcion no valida';
        }

        if(!empty($precio)){
            $precio_validado = true;
        }else{
            $precio_validado = false;
            $errores['precio'] = 'precio no valido';
        }

        if (count($errores)==0) {
            $sql = "UPDATE SERVICIOS SET SERVICIO='$servicio', DESCRIPCION='$descripcion',PRECIO=$precio";
            $editar = mysqli_query($conn,$sql);
        }
    }
    header('Location:../vistas/inicio.php?editado');
?>