<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="style.css">
    <script src="scripts.js" defer></script>
</head>
<body>
    <header>
        <div class="navbar">
            <img src="imagenes/Logo.png" alt="Logo Universidad de Nariño" class="logo">
            <nav>
                <ul>
                    <li><a href = "index.php">Inicio</a></li>
                    <li><a href = "productos.php">Productos</a></li>
                    <li><a href="#Clientes">Clientes</a></li>
                    <li><a href="pedidos.php">Pedidos</a></li>
                    <li><a href="#Informacion">Información</a></li>
                    <li><a href="#Login">Iniciar Sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
  <section class="resumen-pedido">
    <h2>Resumen del Pedido</h2>
    <table id="tabla-carrito">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        <!-- Aquí se llenarán los productos con JS -->
        </tbody>
    </table>
    <p id="total-pedido"></p>
  </section>
</main>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    const tabla = document.querySelector("#tabla-carrito tbody");
    const totalTexto = document.getElementById("total-pedido");

    let total = 0;

    carrito.forEach(producto => {
      const fila = document.createElement("tr");
      const subtotal = producto.precio * producto.cantidad;
      total += subtotal;

      fila.innerHTML = `
        <td>${producto.nombre}</td>
        <td>${producto.cantidad}</td>
        <td>$${producto.precio.toLocaleString()}</td>
        <td>$${subtotal.toLocaleString()}</td>
      `;

      tabla.appendChild(fila);
    });

    totalTexto.textContent = carrito.length === 0
      ? "🛒 No hay productos en tu pedido."
      : `🧾 Total del pedido: $${total.toLocaleString()}`;
  });
</script>

</body>
</html>
