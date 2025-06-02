<?php
$conexion = mysqli_connect("localhost", "root", "", "db_pastoeats");

if (!$conexion) {
    die("❌ Error de conexión: " . mysqli_connect_error());
}
?>