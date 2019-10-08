<div class="container-fluid">
    <h1>Crear Nuevo servicio</h1>
    <p>añade nuevos servicios para tus clientes</p>
    <table class="table">
        <form action="../database/guardar-servicio.php" method="POST">

            <tr>
                <th>Servicio</th>
                <td><input type="text" class="form-control" name="servicio"></td>
            </tr>
            <tr>
                <th>Descripcion</th>
                <td><input type="text" class="form-control" name="descripcion"></td>
            </tr>
            <tr>
                <th>Precio</th>
                <td><input type="number" class="form-control" name="precio"></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Crear" class="btn btn-primary"></td>
            </tr>

        </form>
    </table>
</div>