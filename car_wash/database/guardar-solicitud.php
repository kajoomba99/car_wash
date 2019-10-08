<?php
    require_once '../includes/db.php';
    echo "Servicio: ".$_POST['servicio']."<br>";
    echo "hora: ".$_POST['hora']."<br>";
    echo "Direccion de recogido: ".$_SESSION['usuario']['direccion']."<br>";
    echo "Session-id: ".$_SESSION['usuario']['id']."<br>";
    echo "PRecio: ".$_POST['precio'];
?>