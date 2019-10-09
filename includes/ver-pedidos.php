<?php require_once '../includes/helper.php'; ?>
<div class="container-fluid">
<h1 class="mt-4">Servicios</h1>
<br>

<br><br>
   <table class="table">
       <thead>
           <tr>
               <th>NOMBRE</th>
               <th>DIRECCION</th>
               <th>CIUDAD</th>
               <th>CELULAR</th>
               <th>SERVICIO</th>
               <th>PRECIO</th>
           </tr>
       </thead>
       <tbody>
            <?php 
                $servicios = verPedidos();
               foreach ($servicios as $key => $value):
            ?>
                <tr>
                    <td><?= $value['nombre']?> <?= $value['apellidos']?></td>
                    <td><?= $value['direccion']?></td>
                    <td><?= $value['ciudad']?></td>
                    <td><?= $value['celular']?></td>
                    <td><?= $value['servicio']?></td>
                    <td><?= $value['precio']?></td>
                </tr>
            <?php endforeach; ?>
       </tbody>
   </table>
</div>