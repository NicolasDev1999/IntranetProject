<?php
    error_reporting(E_ERROR | E_PARSE);
    ini_set('display_errors', 0);
    session_start();
    include("./Connection/DataBaseUserConect.php");
    $username=$_SESSION['username'];
    if(!isset($username)){
        header("location:login-form.php");
    }
	?>
<?php 
    $id=$_GET['id'];
    include './Connection/bd.php';
    $conexion=conexion();
    $datos=datos($conexion,$id);
    $nombre=$datos['nombre'];
    $categoria=$datos['categoria'];
    $titulo=$nombre.'.'.$categoria;
    $tipo=$datos['tipo'];
    $archivo=$datos['archivo'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon_bigblock.ico">
  <script src="https://kit.fontawesome.com/4e69027258.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel='stylesheet' href='./css/Styles.css'>
</head>
<header>
</header>

<body>
<header class="header">
    <div class="container">
        <div class="btn-menu">
            <label for="btn-menu">☰BIGBLOCK</label>
        </div>
    </div>
</header>
<?php
include("../actions/access.php")
?>
  <h1 class="text-success  mt-5 text-center ">ARCHIVOS</h1>

    <div class="container">
            <form class="m-auto w-50 mt-2 mb-2" method="POST" enctype="multipart/form-data" action="actions/editar.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <h3 class="text-center"><?php echo $titulo; ?></h3>
                <div class="mb-2">
                    <label class="form-label">Nombre del archivo</label>
                    <input class='form-control form-control-sm' type="text" name="nombreArchivo" value="<?php echo $nombre ;?>">
                </div>
                <div class="mb-2">
                    <label class="form-label">Selecciona un archivo</label>
                    <input class='form-control form-control-sm' type="file" name="archivo">
                </div>
                <button class="btn btn-primary btn-sm">Actualizar archivo</button>
                <a class="btn btn-warning btn-sm" href="files.php">Regresar</a>
            </form>
            <div class="m-auto w-75 mt-2 text-center">
                <?php 
                    $valor="";
                    if($categoria=='pdf'|| $categoria=='txt'){
                        $valor="<iframe class='w-100' height='500' src='data:".$tipo.";base64,".base64_encode($archivo)."' frameborder='0'></iframe>";
                    }
                    if($categoria=='png' || $categoria=='jpg'){
                        $valor="<img src='data:".$tipo.";base64,".base64_encode($archivo)."' >";
                    }
                    if($categoria=='mp4' || $categoria=='mp3'){
                        $valor="<video class='m-auto' controls='true' src='data:".$tipo.";base64,".base64_encode($archivo)."'></video>";
                    }
                    
                    echo $valor;
                
                ?>
            </div>

    </div>
    <script src="./JS/timeOut.js"></script>
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>