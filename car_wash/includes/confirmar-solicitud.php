<div class="container-fluid">
<?php
    require_once '../includes/db.php';
    echo "Servicio: ".$_POST['servicio']."<br>";
    echo "hora: ".$_POST['hora']."<br>";
    echo "Direccion de recogido: ".$_SESSION['usuario']['direccion']."<br>";
    echo "Session-id: ".$_SESSION['usuario']['id']."<br>";
    echo "PRecio: ".$_POST['precio'];
?>
    <form action="../database/guardar-solicitud.php">
        
    </form>
    <form action="../vistas/inicio.php" method="POST">
        <input type="hidden" name="solicitar">
        <button class="btn  btn btn-primary">Volver</button>
    </form>
</div>