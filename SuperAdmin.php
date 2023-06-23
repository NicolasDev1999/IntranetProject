<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 0);
session_start();
include("./Connection/DataBaseUserConect.php");
$username = $_SESSION['username'];
if (!isset($username)) {
    header("location:login-form.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon_bigblock.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
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
    <!--admin permis--->
    <section class="permis-admi">
        <div class="containerOne">
        <form action="./dataUI.php" method="post">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="username" placeholder="Nombre del usuario" name="username">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Constraseña:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Contraseña" name="password">
                </div>
                <input type="radio" name="id_cargo" value="1"> [1]Administrador
                <input type="radio" name="id_cargo" value="2"> [2]Empleado
                <input class="btn btn-success btn-group-sm" type="submit" name="create_user" value="Crear Usuario">
            </form>
        </div>
        <div class="dataUserDelete d-flex justify-content-center mt-5">
            <form class="d-grid" action="deletUser.php" method="post">
                <input type="int" name="id" placeholder="ID" maxlength="100" minlength="1" required>
                <input class="btn btn-danger btn-group-sm" type="submit" name="./delete_user" value="Eliminar Usuario" onclick="return confirm('¿Está seguro de que desea eliminar este usuario?');">
                <button class="btn btn-danger btn-group-sm" id="miBoton">Mostrar tabla</button>
            </form>
           
        </div>
        <div class="tableUserData">
            <table id="tableData" style="display: none;">
                <th>ID_cargo</th>
                <th>ID_User</th>
                <th>Nombre</th>
                <th>Email</th>
                </tr>
                <?php
                include("Connection/DataBaseUserConect.php");
                $sql = "SELECT id, username, email, id_cargo FROM persons";
                $result = mysqli_query($connect, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id_cargo'] . "</td>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/4e69027258.js" crossorigin="anonymous"></script>
    <script src="./JS/dataConect.js"></script>
    <script src="./JS/timeOut.js"></script>
</body>
<footer>

</footer>

</html>