<?php
    error_reporting(E_ERROR | E_PARSE);
    ini_set('display_errors', 0);
include("Connection/DataBaseUserConect.php");
$username=$_POST['username'];
$password=$_POST['password'];
session_start();

$_SESSION['username']=$username;
$consulta="SELECT*FROM persons where username='$username'and password='$password'";
$resultado=mysqli_query($connect,$consulta);

$filas=mysqli_fetch_array($resultado);
$role = $filas['id_cargo'];
$_SESSION['rol'] = $role;
if($filas['id_cargo']==1){ //administrador
    include("SuperAdmin.php");
    ?>
    <script> alert("Credenciales ADMINISTRADOR.");</script>
    <?php
}else
if($filas['id_cargo']==2){//Cliente

    include("Home.php");
    ?>
    <script> alert("Credenciales válidas.");</script>
    <?php
}else{
    include("login-form.php");
    ?>
    <script> alert("Credenciales inválidas. Por favor, intente de nuevo.");</script>
    <?php
}

mysqli_close($connect);
