<?php
session_start();
include 'ConexionDB/conexion.php';

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 2) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $nombres = $_POST['nombres'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $rol_id = $_POST['rol_id'] ?? 1;

    if (!$id) {
        header('Location: admin_dashboard.php?error=missing_id');
        exit;
    }

    $sql = "UPDATE usuarios SET nombres=?, apellidos=?, usuario=?, rol_id=? WHERE id=?";
    $stmt = mysqli_prepare($conexion, $sql);
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . mysqli_error($conexion));
    }
    mysqli_stmt_bind_param($stmt, "sssii", $nombres, $apellidos, $usuario, $rol_id, $id);

    if (mysqli_stmt_execute($stmt)) {
        header('Location: admin_dashboard.php?mensaje=usuario_actualizado');
        exit;
    } else {
        header('Location: admin_dashboard.php?error=error_actualizando');
        exit;
    }
} else {
    header('Location: admin_dashboard.php');
    exit;
}
