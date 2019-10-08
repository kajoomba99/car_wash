<?php
      if (isset($_POST)) {
        require_once '../includes/db.php';
        
        //recoger los valores del formulario de registro 
        
        $nombre = isset($_POST['nombre'])?mysqli_real_escape_string($conn,$_POST['nombre']):false;
        $apellidos = isset($_POST['apellidos'])?mysqli_real_escape_string($conn,$_POST['apellidos']):false;
        $direccion = isset($_POST['direccion'])?mysqli_real_escape_string($conn,$_POST['direccion']):false;
        $ciudad = isset($_POST['ciudad'])?mysqli_real_escape_string($conn,$_POST['ciudad']):false;
        $celular = isset($_POST['celular'])?mysqli_real_escape_string($conn,$_POST['celular']):false;
        $correo = isset($_POST['correo'])?mysqli_real_escape_string($conn,$_POST['correo']):false;
        $user = isset($_POST['user'])?mysqli_real_escape_string($conn,trim($_POST['user'])):false;
        $password = isset($_POST['password'])?mysqli_real_escape_string($conn,$_POST['password']):false;
        
        //Array de errores
        
        $errores = array();

        //Validad los datos antes de guardarlos en la base de datos
        //Validar campo nombre
        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
            $nombre_validado = true;
        }else{
          $nombre_validado = false;
          $errores['nombre'] = 'El nombre no es valido';
        }

        //Validar campo apellidos
        if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/",$apellidos)){
          $apellido_validado = true;
        }else{
          $apellido_validado = false;
          $errores['apellidos'] = 'El apellido no es valido';
        }

        //Validar email
        if(!empty($correo) && filter_var($correo, FILTER_VALIDATE_EMAIL)){
          $correo_validado = true;
        }else{
          $correo_validado = false;
          $errores['correo'] = 'El correo no es valido';
        }
        //Validad password
        if(!empty($password)){
          $password_validado = true;
        }else{
          $password_validado = false;
          $errores['password'] = 'Contraseña no valida';
        }
        //Validad direccion
        if(!empty($direccion)){
          $direccion_validado = true;
        }else{
          $direccion_validado = false;
          $errores['direccion'] = 'Direccion no valida';
        }
        //Validad direccion
        if(!empty($ciudad)){
          $ciudad_validado = true;
        }else{
          $ciudad_validado = false;
          $errores['ciudad'] = 'Ciudad no valida';
        }
        //Validad usuario
        if(!empty($user)){
          $user_validado = true;
        }else{
          $user_validado = false;
          $errores['user'] = 'Usuario no valido';
        }
        $guardar_usuario =  false;

        if (count($errores) == 0) {
          $guardar_usuario = true;
          
          //Cifrar la contraseña

          $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

          //Insertar usuario en la base de datos
          $sql = "INSERT INTO USUARIOS(nombre,apellidos,direccion,ciudad,celular,correo,usuario,password,rol) VALUES ('$nombre','$apellidos','$direccion','$ciudad','$celular','$correo','$user','$password_segura',2)";
          
          $guardar = mysqli_query($conn,$sql);

          // var_dump(mysqli_error($conn));
          // die();

          if($guardar){

            $_SESSION['completado']="El registro se ha completado con exito";

          }else{

            $_SESSION['errores']['general'] = "Fallo al guardar el usuario";

          }

        }else{
          $_SESSION['errores'] = $errores;
        }

      }
      
      header('Location:../vistas/registro.php');

?>