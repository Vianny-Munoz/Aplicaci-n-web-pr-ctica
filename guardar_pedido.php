<?php
// guardar_pedido.php

include 'ConexionDB/conexion.php'; 

$fecha = date("Y-m-d H:i:s");

$datos = json_decode(file_get_contents("php://input"), true);

if (!$datos || !isset($datos['carrito'])) {
    http_response_code(400);
    echo "❌ Datos incompletos.";
    exit;
}

$carrito = $datos['carrito'];
$errores = 0;

// 1. Insertar el pedido en la tabla "pedidos"
// Asumimos que por ahora no hay cliente_id
//$sqlPedido = "INSERT INTO pedidos (fecha) VALUES ('$fecha')"; usar cuando ya funcione el login
$sqlPedido = "INSERT INTO pedidos (fecha, usuario_cedula) VALUES ('$fecha', '1234567890')";


if (mysqli_query($conexion, $sqlPedido)) {
    $pedido_id = mysqli_insert_id($conexion); // ID del nuevo pedido

    // 2. Insertar cada producto en "detalle_pedidos"
    foreach ($carrito as $producto) {
        $producto_id = $producto['id'];  
        $nombre = mysqli_real_escape_string($conexion, $producto['nombre']);
        $cantidad = (int)$producto['cantidad'];
        $precio = (float)$producto['precio'];
        $subtotal = $cantidad * $precio;

        $sqlDetalle = "INSERT INTO detalle_pedidos (pedido_id, producto_id, producto_nombre, cantidad, precio, subtotal)
                       VALUES ($pedido_id, $producto_id,'$nombre', $cantidad, $precio, $subtotal)";

        if (!mysqli_query($conexion, $sqlDetalle)) {
            $errores++;
            echo "Error en la inserción de detalle: " . mysqli_error($conexion);  // Mostrar el error
        }
    }

    if ($errores === 0) {
        echo "✅ Pedido guardado correctamente.";
    } else {
        http_response_code(500);
        echo "❌ Error al guardar algunos productos.";
    }

} else {
    http_response_code(500);
    echo "❌ No se pudo crear el pedido.";
}
?>  
