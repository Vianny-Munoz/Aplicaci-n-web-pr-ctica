<?php
session_start();

// Verificar acceso solo para administradores
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 2) {
    header("Location: index.php");
    exit();
}

include 'ConexionDB/conexion.php';

// Si el formulario se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $rol = 2; // Rol administrador

    $sql = "INSERT INTO usuarios (nombres, apellidos, usuario, contrasena, cedula, correo, telefono, direccion, fecha_nacimiento, rol)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssssi", $nombres, $apellidos, $usuario, $contrasena, $cedula, $correo, $telefono, $direccion, $fecha_nacimiento, $rol);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: admin_dashboard.php?mensaje=admin_creado");
        exit();
    } else {
        echo "❌ Error: " . mysqli_stmt_error($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Administrador</title>
</head>
<body>
    <h2>Registrar Nuevo Administrador</h2>
    <form method="POST">
        <input type="text" name="nombres" placeholder="Nombres" required><br>
        <input type="text" name="apellidos" placeholder="Apellidos" required><br>
        <input type="text" name="usuario" placeholder="Usuario" required><br>
        <input type="password" name="contrasena" placeholder="Contraseña" required><br>
        <input type="text" name="cedula" placeholder="Cédula" required><br>
        <input type="email" name="correo" placeholder="Correo" required><br>
        <input type="text" name="telefono" placeholder="Teléfono" required><br>
        <input type="text" name="direccion" placeholder="Dirección" required><br>
        <input type="date" name="fecha_nacimiento" required><br><br>
        <button type="submit">Registrar Administrador</button>
    </form>
    <br>
    <a href="admin_dashboard.php">Volver al panel</a>
</body>
</html>
