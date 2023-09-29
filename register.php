<?php
include('conexion.php');

function validar($usuario, $apellido, $mail, $contra){
    return !empty($usuario) && !empty($apellido) && !empty($mail) && !empty($contra);
}

if(isset($_POST["submit"])){

    if(validar($_POST['Nombre'], $_POST['Apellido'], $_POST['Email'], $_POST['Passw'])){

        $usuario = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];
        $mail = $_POST['Email'];
        $contra = $_POST['Passw'];

        $query = "SELECT * FROM usuario WHERE Passw ='".$contra."' OR Email ='".$mail."'";
        $resultado = mysqli_query($conexion, $query);
        $res=mysqli_num_rows($resultado);

        if($res > 0){
            echo '<script>alert("Este usuario ya existe. Prueba con otro.");
            window.location = "http://localhost/inet-olimpiadas/php/register.php";</script>';

        }else{
            $sql = "INSERT INTO usuario (Nombre, Apellido, Email, Passw) VALUES ('$usuario','$apellido','$mail','$contra')";
            $resultado = mysqli_query($conexion, $sql);

            if ($resultado) {
                echo '<script>alert("Usuario registrado con éxito.");
                window.location = "http://localhost/inet-olimpiadas/html/login.html";</script>';
            } else {
                echo '<script>alert("Error al registrar usuario. Por favor, inténtalo de nuevo.");
                window.location = "http://localhost/inet-olimpiadas/html/register.html";</script>';
            }
        }

    }else{
        echo '<script>alert("No rellenaste todos los campos del registro.");
        window.location = "http://localhost/inet-olimpiadas/php/register.php"; </script>';
    }
}
?>
