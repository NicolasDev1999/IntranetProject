<?php
include("Connection/DataBaseUserConect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$user = $_POST["user"];
	$mensaje = $_POST["mensaje"];
	
	$sql = "INSERT INTO comments (user,mensaje) VALUES ('$user', '$mensaje')";
	
	if ($connect->query($sql) === TRUE) {
        include("Home.php");
        ?>
        <script> alert("Comentario Enviado BIGBLOOK™");</script>
        <?php
    }
}

?>