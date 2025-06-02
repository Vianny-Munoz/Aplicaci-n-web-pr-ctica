<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 2) {
    header("Location: index.php");
    exit;
}

include 'ConexionDB/conexion.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombres = $_POST['nombres'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $cedula = $_POST['cedula'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $usuario = $_POST['usuario'] ?? '';
    $contrasenaPlano = $_POST['contrasena'] ?? '';

    if ($nombres && $apellidos && $cedula && $correo && $telefono && $direccion && $fecha_nacimiento && $usuario && $contrasenaPlano) {
        $contrasena = password_hash($contrasenaPlano, PASSWORD_DEFAULT);
        $rol_id = 2; // Admin

        $sql = "INSERT INTO usuarios (nombres, apellidos, cedula, correo, telefono, direccion, fecha_nacimiento, usuario, contrasena, rol_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssssssi", $nombres, $apellidos, $cedula, $correo, $telefono, $direccion, $fecha_nacimiento, $usuario, $contrasena, $rol_id);
            if (mysqli_stmt_execute($stmt)) {
                $mensaje = "Administrador registrado exitosamente.";
            } else {
                $mensaje = "Error al guardar el administrador.";
            }
        } else {
            $mensaje = "Error al preparar la consulta.";
        }
    } else {
        $mensaje = "Por favor, completa todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Nuevo Administrador</title>
</head>
<body>
    <h2>Registrar Nuevo Administrador</h2>

    <?php if ($mensaje): ?>
        <p><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>

    <form method="POST" action="registrar_admin.php">
        <label>Nombres:</label><br>
        <input type="text" name="nombres" required><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos" required><br>

        <label>Cédula:</label><br>
        <input type="text" name="cedula" required><br>

        <label>Correo:</label><br>
        <input type="email" name="correo" required><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" required><br>

        <label>Dirección:</label><br>
        <input type="text" name="direccion" required><br>

        <label>Fecha de nacimiento:</label><br>
        <input type="date" name="fecha_nacimiento" required><br>

        <label>Usuario:</label><br>
        <input type="text" name="usuario" required><br>

        <label>Contraseña:</label><br>
        <input type="password" name="contrasena" required><br><br>

        <button type="submit">Registrar Administrador</button>
    </form>

    <br>
    <a href="admin_dashboard.php">Volver al Panel</a>
</body>
</html>
