<?php
if ($_SESSION['rol'] == 1) { ?>
echo "<td><input type='checkbox' name='eliminar[]' value='" . $comentario['id'] . "'></td>";
       <input type="submit" value="Eliminar comments seleccionados">
<?php 
}
 ?>