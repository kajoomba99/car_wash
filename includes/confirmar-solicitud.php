<div class="container-fluid">
<?php
    require_once '../includes/db.php';
    // echo "Servicio: ".$_POST['servicio']."<br>";
    // echo "hora: ".$_POST['hora']."<br>";
    // echo "Direccion de recogido: ".$_SESSION['usuario']['direccion']."<br>";
    // // echo "Session-id: ".$_SESSION['usuario']['id']."<br>";
    // echo "PRecio: ".$_POST['precio'];
?>
<center>
    <form action="../database/guardar-solicitud.php" method="POST" style="margin-top:30px;">
    <h2>Confirmar servicio</h2>
    <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
        <label>
            Servicio:
            <input type="text" name="servicio" value="<?= $_POST['servicio'] ?>" class="form-control" readonly>
        </label>
        <br><br>
        <label>
            Hora de recogida:
            <input type="time" name="hora" class="form-control" required>
        </label>
        <br><br>
        <label>
            Direccion:        
            <input type="text" name="direccion" value="<?= $_SESSION['usuario']['direccion'] ?>" class="form-control">
        </label>
        <br><br>
        <label>
            Precio:
            <input type="text" name="precio" value="<?= $_POST['precio'] ?>" class="form-control" readonly>
        </label>
        <br><br>
        <input type="submit" value="confirmar" class="btn btn-success">
    </form>
    <br><br>

    <form action="../vistas/inicio.php" method="POST">
        <input type="hidden" name="solicitar">
        <button class="btn  btn btn-primary">Volver</button>
    </form>
</center>