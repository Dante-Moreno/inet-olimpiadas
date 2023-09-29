<?php
$servername = "localhost";
$username = "root";
$password = ""; // Deja esto en blanco si no tienes contraseña configurada en MySQL
$dbname = "consulturio";

$conexion = new mysqli($servername, $username, $password, $dbname);

if ($conexion->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conexion->connect_error);
}
?>
