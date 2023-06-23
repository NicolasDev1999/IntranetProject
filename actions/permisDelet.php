<?php
if ($_SESSION['rol'] == 1) { ?>
    <a class='btn btn-danger' href="eliminar.php?id=<?php echo $id ?>" onclick="return confirm('¿Está seguro de que desea eliminar este archivo?');">Eliminar</a></td>
<?php 
}
 ?>