<?php
// login.php

include 'ConexionDB/conexion.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['password'] ?? '';

    $usuario = mysqli_real_escape_string($conexion, $usuario);

    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        // Aquí debe usarse password_verify si tienes contraseña hasheada
        if (password_verify($contrasena, $fila['contrasena'])) {
            // Guardar en sesión
            $_SESSION['usuario'] = $fila['usuario'];
            $_SESSION['rol'] = $fila['rol_id'];

            // Redirigir según rol
            if ($fila['rol_id'] == 2) {
                header('Location: admin_dashboard.php');
            } else {
                header('Location: productos.php');
            }
            exit;
        } else {
            header('Location: index.php?error=1');
            exit;
        }
    } else {
        header('Location: index.php?error=1');
        exit;
    }
}
?>
