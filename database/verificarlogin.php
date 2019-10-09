<?php 
    //Iniciar session y la conexion a bd
    require_once '../includes/db.php';

     //Recoger los datos del formulario
    if (isset($_POST)) {
        if (isset($_SESSION['error_login'])) {
            session_unset($_SESSION['error_login']);
        }

        //Recojo datos del form
        $user = trim($_POST['user']);
        $password = $_POST['password'];

        //Consulta pra comprobar las credenciales

        $sql = "SELECT * FROM usuarios where usuario = '$user'";
        $login = mysqli_query($conn, $sql);
       
      
        if(isset($login) && mysqli_num_rows($login)==1){
            $usuario = mysqli_fetch_assoc($login);
        
            //Comprobar contraseña / cifrar
            $verify = password_verify($password,$usuario['password']);
            if ($verify) {
                //Utilizar una sesion para guardar el usuario logueado
                $_SESSION['usuario'] = $usuario;
                //Redirigir al index
                header("Location: ../vistas/inicio.php");
                die();
            }else{
                //Si algo falla envia una session con el fallo
                $_SESSION['error_login']="Login incorrecto";
            }

        }else{
            //Mensaje de error
            $_SESSION['error_login']="Login incorrecto";
        }

    }
    //Redirigir al index
    header("Location: ../vistas/login.php");
?>