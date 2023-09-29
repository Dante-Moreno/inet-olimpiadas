<?php
include("conexion.php");
session_start();

function validar($usuario, $contra){
    return !empty($usuario) && !empty($contra);
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(validar($_POST['Nombre'], $_POST['Passw'])){
        $usuario = $_POST['Nombre'];
        $contra = $_POST['Passw'];

        $sql = "SELECT * FROM usuario WHERE Nombre = '$usuario' AND Passw = '$contra'";
        $result = mysqli_query($conexion, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1) {
            $_SESSION['Nombre'] = $usuario;
            header("Location: http://localhost/inet-olimpiadas/php/home.php");
            exit();
        } else {
            echo "<script>alert('No existe este usuario.');
            window.location ='http://localhost/inet-olimpiadas/php/login.php';</script>";
        }

    }else{
        echo '<script>alert("No rellenaste todos los campos del inicio de sesión.");
        window.location = "http://localhost/inet-olimpiadas/php/login.php"; </script>';
    }
}
?>
