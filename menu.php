
<h1 class="text-white text-center"><?php echo $username ?></h1>
<a href="Home.php">Inicio</a>
<a href="files.php">Almacen</a>
<?php
if ($_SESSION['rol']==1){?>
    <a href="SuperAdmin.php">Opciones</a>
<?php }?>
<a href="./actions/close.php">Cerrar sesion</a>