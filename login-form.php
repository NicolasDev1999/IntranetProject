<?php
    error_reporting(E_ERROR | E_PARSE);
    ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bigblook System </title>
    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon_bigblock.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel='stylesheet' href='./css/styles.css'>
</head>
<body>
    <div class="capa"></div>
    <h1 class="text-success container-sm mt-5">BIGBLOOK</h1>
    <h2 class="text-bg-success container-sm"><b>REPOSITORIO DE ARCHIVOS INDUSTRIALES</b></h2>
    <div class="container-form d-flex justify-content-center ">
    <section id="structure-form" class=" login-fm">
        <form id="login-form" method="post" class="was-validated " action="ValidationUser.php">
            <div class="mb-2 mt-2">
                <label class="label text-white" for="username ">Usuario</label>
                <input class="form-control" type="text" id="username" name="username" placeholder="Usuario123"  minlength="5" required>
                <div class="valid-feedback text-white">Valido.</div>
                <div class="invalid-feedback text-white">Por favor rellene este campo.</div>
            </div>
            <div class="mb-3">
                <label class="form-label text-white" for="password">Contraseña</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="*******"required maxlength="4" minlength="2"required>
                <div class="valid-feedback text-white">Valido.</div>
                <div class="invalid-feedback text-white">Por favor rellene este campo.</div>
            </div>
            <div class="form-check mb-2 " >
                <input class="form-check-input text-white " type="checkbox" id="myCheck" name="remember" required>
                <label class="form-check-label text-white" for="myCheck">Acepto terminos y condiciones.</label>
                <div class="valid-feedback text-white">Valido.</div>
                <div class="invalid-feedback text-white-50" id="alert">Marque esta casilla de verificación para continuar</div>
                
            </div>
            <button id="button" type="submit" class="btn btn-outline-success btn-group-sm">Entrar</button>
            <button type="button" class="btn btn-outline-success btn-group-sm" data-toggle="collapse" data-target="#demo">Informacion</button>
                <div class="dropdown-menu" id="demo">
                    <a class="dropdown-item" href="mailto:sergionicolasgalindocante@gmail.com">Solicitar acceso</a>
                    <a class="dropdown-item" target="_blank" href="https://www.facebook.com/BIGBLOCKCOLOMBIA">facebook</a>
                    <a class="dropdown-item" href="#">Github</a>
                </div>
        </form>
        
     </section>
     </div>
        
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer class="jumbotron jumbotron-fluid text-center">

<p>BIGBLOCK™</p>
   
</footer>
</html>