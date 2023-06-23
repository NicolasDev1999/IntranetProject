<?php
session_start();
include("./Connection/DataBaseUserConect.php");
$username = $_SESSION['username'];
if (!isset($username)) {
	header("location:login-form.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BIGBLOCK</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/styles.css">
	<link rel="shortcut icon" href="../img/favicon_bigblock.ico" type="image/x-icon">


</head>
<header class="header">
	<div class="container">
		<div class="btn-menu">
			<label for="btn-menu">☰BIGBLOCK</label>
		</div>
	</div>
</header>

<body>
	<div class="capa"></div>
	<!-------------menu--------------->
	<input type="checkbox" id="btn-menu">
	<div class="container-menu">
		<div class="cont-menu">
			<nav>
				<?php
				include("./menu.php");
				?>
			</nav>
			<label for="btn-menu">✖️</label>
		</div>
	</div>
	<!-------------forum--------------->
	<div class=forum-form>
		<form action="./coment.php" method="post">
			<div class="form-group">
				<label for="user"></label>
				<input class="form-control d-none" type="text" value=<?php echo $username ?> readonly name="user" id="user"><br>
			</div>
			<div class="form-group" id="contenedor-input" style="display: none;">
				<label for="mensaje">Comentario:</label>
				<textarea class="form-control" name="mensaje" id="mensaje"></textarea><br>
			</div>
			<input class="btn btn-success btn-group-sm" type="submit" id="enviar"value="Enviar comentario">
		</form>
		<button class="btn btn-success btn-group-sm" onclick="mostrarInput()" id="mostrar-boton">Mostrar Comentario</button>
	</div>
	</div>
	<div class="tableUserDataComents">
		<form method="post" action="delet-coment.php">
			<table id="tableData">
				<tbody>
					<?php

					$conexion = mysqli_connect("127.0.0.1", "root", "", "bigblook");
					$comments = mysqli_query($conexion, "SELECT * FROM comments");
					while ($comentario = mysqli_fetch_assoc($comments)) {
						echo "<tr>";
						echo "<td><input type='checkbox' name='eliminar[]' value='" . $comentario['id'] . "'>" . $comentario['user'] . $comentario['fecha_hora'] . "</td>";
						echo "<td>" . $comentario['mensaje'] . "</td>";
						echo "</tr>";
					}
					mysqli_close($conexion);
					?>
					<input class="btn btn-danger btn-group-sm" type="submit" value="Eliminar Comentario">

				</tbody>
			</table>
		</form>
	</div>
	<script src="./JS/timeOut.js"></script>
	<script src="./JS/dataConect.js"></script>
	<script src="https://cdn.tiny.cloud/1/86cis9pybkk3hdxy7kg21xdi8ox0f99c9wgcxzkgm9u4mprc/tinymce/5/tinymce.min.js"></script>
	<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'advlist autolink lists link image charmap print preview anchor',
			toolbar: 'undo redo | bold italic underline strikethrough | bullist numlist outdent indent | link image',
		});
	</script>
</body>

</html>