<div class="container-fluid">
    <h1>Editar servicio</h1>
    <table class="table">
        <form action="../database/guardar-servicio.php" method="POST">

            <tr>
                <th>Servicio</th>
                <td><input type="text" class="form-control" name="servicio" value="<?= $_POST['servicio'] ?>"></td>
            </tr>
            <tr>
                <th>Descripcion</th>
                <td><input type="text" class="form-control" name="descripcion" value="<?= $_POST['descripcion']?>" ></td>
            </tr>
            <tr>
                <th>Precio</th>
                <td><input type="number" class="form-control" name="precio" value="<?= $_POST['precio']?>" ></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="editar" class="btn btn-primary"></td>
            </tr>

        </form>
    </table>
</div>