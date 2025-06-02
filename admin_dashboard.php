<?php
session_start();

// Verificar que haya sesión activa y que el rol sea admin (2)
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 2) {
    header("Location: index.php");
    exit;
}

include 'ConexionDB/conexion.php';

// Obtener lista de usuarios
$sql = "SELECT id, nombres, apellidos, usuario, rol_id FROM usuarios";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <style>
        table {
            width: 100%; border-collapse: collapse;
        }
        th, td {
            padding: 10px; border: 1px solid #ccc; text-align: left;
        }
    </style>
</head>
<body>
    <h2>Bienvenido Administrador: <?= $_SESSION['usuario'] ?></h2>
    <h3>Usuarios Registrados</h3>

    <table>
        <tr>
            <th>ID</th><th>Nombre</th><th>Usuario</th><th>Rol</th><th>Acciones</th>
        </tr>
        <?php while ($fila = mysqli_fetch_assoc($resultado)) : ?>
        <tr>
            <td><?= $fila['id'] ?></td>
            <td><?= $fila['nombres'] . ' ' . $fila['apellidos'] ?></td>
            <td><?= $fila['usuario'] ?></td>
            <td><?= $fila['rol_id'] == 2 ? 'Admin' : 'Cliente' ?></td>
            <td>

                <a href="editar_usuario.php?id=<?= $fila['id'] ?>">Editar</a> 
                <a href="eliminar_usuario.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <br>
    <a href="registrar_admin.php">Registrar nuevo administrador</a> |
    <a href="cerrar_sesion.php">Cerrar sesión</a>
</body>
</html>
