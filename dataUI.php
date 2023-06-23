<?php
include("./Connection/DataBaseUserConect.php");
if (isset($_POST['create_user'])) {
    $id_cargo = $_POST['id_cargo'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO persons (username, email, password,id_cargo)
VALUES ('$username', '$email', '$password','$id_cargo' )";
    if (mysqli_query($connect, $sql)) {
        include("SuperAdmin.php");
?>
        <script>
            alert("Credenciales creadas con Exito.");
        </script>
<?php
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    }
}
mysqli_close($connect);
