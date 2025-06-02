<?php
// login.php

include 'ConexionDB/conexion.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['password'] ?? '';


    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $contrasena = mysqli_real_escape_string($conexion, $contrasena);
    
    $sql = "SELECT * FROM usuarios WHERE usuario ='$usuario' AND contrasena = '$contrasena'";
    $resultado = mysqli_query($conexion, $sql);

    
    if ($resultado && mysqli_num_rows($resultado) === 1) {
        header('Location: http://localhost/aplicaci-n-web-pr-ctica/productos.php');

        exit;
    } else {
        header('Location: index.php? error=1');
        exit;
    }
}
?>
