<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 2) {
    header('Location: index.php');
    exit;
}

include 'ConexionDB/conexion.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID no válido";
    exit;
}

// Obtener datos actuales del usuario
$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$usuario = mysqli_fetch_assoc($resultado);

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>
<body>
    <h2>Editar Usuario</h2>
    <form action="actualizar_usuario.php" method="post">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

        <label>Nombres:</label>
        <input type="text" name="nombres" value="<?= $usuario['nombres'] ?>" required><br>

        <label>Usuario:</label>
        <input type="text" name="usuario" value="<?= htmlspecialchars($usuario['usuario']) ?>" required>

        <label>Apellidos:</label>
        <input type="text" name="apellidos" value="<?= $usuario['apellidos'] ?>" required><br>

        <label>Correo:</label>
        <input type="email" name="correo" value="<?= $usuario['correo'] ?>" required><br>

        <label>Rol:</label>
        <select name="rol_id">
            <option value="1" <?= $usuario['rol_id'] == 1 ? 'selected' : '' ?>>Cliente</option>
            <option value="2" <?= $usuario['rol_id'] == 2 ? 'selected' : '' ?>>Administrador</option>
        </select><br><br>

        <button type="submit">Actualizar</button>
        <a href="admin_dashboard.php">Cancelar</a>
    </form>
</body>
</html>
