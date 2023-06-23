<?php
include("./Connection/DataBaseUserConect.php");

$id = $_POST['id'];
$sql = "DELETE FROM persons  WHERE id=$id";
if (mysqli_query($connect, $sql)) {
  include("SuperAdmin.php");
  $checkms = "Registro eliminado correctamente";
} else {
  include("SuperAdmin.php");
  echo "Error eliminando el registro: " . mysqli_error($connect);
}

mysqli_close($connect);
?>
<script>
  var mensaje = "<?php echo $checkms; ?>";
  window.onload = function() {
    alert(mensaje);
  };
</script>