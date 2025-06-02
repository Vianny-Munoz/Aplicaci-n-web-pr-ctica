<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 2) {
    header('Location: index.php');
    exit;
}

include 'ConexionDB/conexion.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: admin_dashboard.php?msg=usuario_eliminado");
    } else {
        echo "❌ Error al eliminar el usuario.";
    }
} else {
    echo "ID no válido.";
}
?>
