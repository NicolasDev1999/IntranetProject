<?php
  // Conectar a la base de datos
  $conexion = mysqli_connect("127.0.0.1", "root", "", "bigblook");
  
  // Eliminar los comentarios seleccionados
  if (isset($_POST['eliminar'])) {
    foreach ($_POST['eliminar'] as $id) {
      mysqli_query($conexion, "DELETE FROM comments WHERE id = " . $id);
    }
  }
  
  // Cerrar la conexión a la base de datos
  mysqli_close($conexion);
  
  // Redirigir a la página anterior
  header("Location: Home.php");
?>
