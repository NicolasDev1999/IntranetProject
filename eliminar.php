<?php 
include './Connection/bd.php';
$id=$_GET['id'];
$conexion=conexion();
$query=eliminar($conexion,$id);
if($query){
 header('location:files.php?eliminar=success');
}else{
    header('location:files.php?eliminar=error');
}
?>