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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon_bigblock.ico">
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
    <!----------------------->
    <div class="container-files">
        <form class="m-auto w-50 mt-5 mb-5 " method="POST" enctype="multipart/form-data" action="actions/insertar.php">
            <div class="mb-2">
                <label class="form-label">Nombre del archivo</label>
                <input class='form-control form-control-sm'  value=<?php echo $username ?> type="text" name="nombreArchivo" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Selecciona un archivo</label>
                <input class='form-control form-control-sm' type="file" name="archivo" required>
            </div>
            <button class="btn btn-success btn-sm">Subir archivo</button>
        </form>
        <table class="table table-sm table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>categoria</th>
                    <th>Archivo</th>
                    <th>fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include './Connection/bd.php';
                $conexion = conexion();
                $query = listar($conexion);
                $contador = 0;
                while ($datos = mysqli_fetch_assoc($query)) {
                    $contador++;
                    $id = $datos['id'];
                    $nombre = $datos['nombre'];
                    $categoria = $datos['categoria'];
                    $fecha = $datos['fecha'];
                    $archivo = $datos['archivo'];
                    $tipo = $datos['tipo'];

                    $valor = "";
                    if ($categoria == 'jpg' || $categoria == 'png') {
                        $valor = "<img width='50' src='data:image/jpg;base64," . base64_encode($archivo) . "'>";
                    }

                    if ($categoria == 'txt') {
                        $valor = "<img  width='30' src='img/texto.png'>";
                    }

                    if ($categoria == 'pdf') {
                        $valor = "<img  width='30' src='img/pdf.png'>";
                    }

                    if ($categoria == 'xls' || $categoria == 'xlsm') {
                        $valor = "<img  width='30' src='img/exel.png'>";
                    }

                    if ($categoria == 'doc' || $categoria == 'docx') {
                        $valor = "<img  width='30' src='img/word.png'>";
                    }
                    if ($categoria == 'zip') {
                        $valor = "<img  width='30' src='img/Rar.png'>";
                    }

                    if ($categoria == 'dwg') {
                        $valor = "<img  width='30' src='img/DWG.png'>";
                    }

                    if ($valor == '') {
                        $valor = "<img  width='30' src='img/desconocido.png'>";
                    }



                ?>
                    <tr>
                        <td class="text-white "><?php echo $contador; ?></td>
                        <td class="text-white"><?php echo $nombre; ?></td>
                        <td class="text-white"><?php echo $categoria; ?></td>
                        <td class="text-white"><a class='btn btn-outline-success' href="./actions/cargar.php?id=<?php echo $id; ?>"><?php echo $valor; ?> descargar</a></td>
                        <td class="text-white"><?php echo $fecha; ?></td>
                        <td class="text-white"><a class='btn btn-outline-success' href="editar.php?id=<?php echo $id ?>">Editar</a>
                            <?php
                            include("./actions/permisDelet.php");
                            ?>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="./JS/timeOut.js"></script>
    <script src="https://kit.fontawesome.com/4e69027258.js" crossorigin="anonymous"></script>
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>