<?php require_once '../includes/helper.php'; ?>
<div class="container-fluid">
<h1 class="mt-4">Servicios</h1>
<br><br>
   <table class="table">
       <thead>
           <tr>
               <th>SERVICIO</th>
               <th>DESCRIPCION</th>
               <th>PRECIO</th>
               <th>ACCIONES</th>
           </tr>
       </thead>
       <tbody>
            <?php 
                $servicios = consultarServicios();
               foreach ($servicios as $key => $value):
            ?>
                <tr>
                    <td><?= $value['servicio']?></td>
                    <td><?= $value['descripcion']?></td>
                    <td><?= $value['precio']?></td>
                    <form action="../vistas/inicio.php" method="POST">
                        <input type="hidden" name="confirmar">
                        <input type="hidden" value="<?= $value['id'] ?>" name="id"> 
                        <input type="hidden" value="<?= $value['servicio'] ?>" name="servicio"> 
                        <input type="hidden" value="<?= $value['descripcion'] ?>" name="descripcion"> 
                        <input type="hidden" value="<?= $value['precio'] ?>" name="precio"> 
                        <td><input type="submit" value="Solicitar" class="btn btn-primary"></td>
                    </form>
                </tr>
            <?php endforeach; ?>
       </tbody>
   </table>
</div>