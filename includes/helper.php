<?php
    
function mostrarError($errores, $campo){
        $alerta = '';
        if (isset($errores[$campo]) && !empty($campo)) {
            $alerta = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
        }

        return $alerta;

    }

    function borrarErrores(){
        $borrado = false;
        if (isset($_SESSION['errores'])) {
            $_SESSION['errores'] = null;
            $borrado = session_unset($_SESSION['errores']);
        }
        if (isset($_SESSION['completado'])) {
            $_SESSION['completado'] = null;
            session_unset($_SESSION['completado']);

        }
        return $borrado;
    }

    function consultarServicios(){
        require_once '../includes/db.php';
        $sql = "SELECT * FROM servicios ORDER BY id ASC";
        $servicios = mysqli_query($conn,$sql);
        $result = array();
        if($servicios && mysqli_num_rows($servicios)>=1){
            $result = $servicios;
        }
        return $result;
    }

    function verPedidos(){
        require_once '../includes/db.php';
        $sql = "SELECT usuarios.nombre,usuarios.apellidos,usuarios.direccion,usuarios.ciudad,usuarios.celular,usuarios.celular,servicios.servicio,servicios.precio FROM `clientexservicio` LEFT JOIN usuarios on usuarios.id = clientexservicio.cliente_id LEFT JOIN servicios on servicios.id = clientexservicio.servicio_id";
        $servicios = mysqli_query($conn,$sql);
        $result = array();
        if($servicios && mysqli_num_rows($servicios)>=1){
            $result = $servicios;
        }
        return $result;
    }
?>