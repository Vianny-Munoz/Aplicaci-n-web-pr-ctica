<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos - La Tulpa</title>
  <link rel="stylesheet" href="style.css">
  <script src="scripts.js" defer></script>
</head>
<body>

  <header>
    <div class="navbar">
      <img src="imagenes/Logo.png" alt="Logo Universidad de Nariño" class="logo">
      <nav>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="productos.html">Productos</a></li>
          <li><a href="#Clientes">Clientes</a></li>
          <li><a href="pedidos.php">Pedidos</a></li>
          <li><a href="#Informacion">Información</a></li>
          <li><a href="#Login">Iniciar Sesión</a></li>
        </ul>
      </nav>
    </div>
    <!-- Carrito de compras visual -->
    <div id="carrito" class="carrito">
        <h3>🛒 Carrito</h3>
        <ul id="carrito-lista">
        <!-- Aquí se agregarán los productos -->
        </ul>
        <p id="mensaje-carrito" class="mensaje-carrito"></p> <!-- Mensaje de advertencia -->
        <button onclick="irAPedidos()" class="finalizar-pedido-btn">Finalizar Pedido</button>
    </div>
  </header>

  <main>
    <section class="productos-section">
      <h2>Nuestros Productos</h2>
      <div class="productos-container">
        
        <!-- Producto 1 -->
        <div class="producto-card">
          <div class="producto-imagen">
            <img src="imagenes/producto1.png" alt="Manzanas Orgánicas">
          </div>
          <h3>Manzanas Orgánicas x Unidad</h3>
          <p>Deliciosas manzanas frescas y naturales.</p>
          <p><strong>Precio: $2.000</strong></p>
          <label>Cantidad:</label>
          <input type="number" id="cantidad-manzana" value="1" min="1" style="width: 60px;">
          <button class="add-to-cart-btn" onclick="agregarAlCarrito('Manzanas Orgánicas x Unidad', 2000, 'cantidad-manzana')">Agregar al carrito</button>
        </div>

        <!-- Producto 2 -->
        <div class="producto-card">
          <div class="producto-imagen">
            <img src="imagenes/producto2.png" alt="Queso Artesanal">
          </div>
          <h3>Queso Artesanal x 250gr</h3>
          <p>Queso fresco producido por campesinos locales.</p>
          <p><strong>Precio: $5.000</strong></p>
          <label>Cantidad:</label>
          <input type="number" id="cantidad-queso" value="1" min="1" style="width: 60px;">
          <button class="add-to-cart-btn" onclick="agregarAlCarrito('Queso Artesanal', 5000, 'cantidad-queso')">Agregar al carrito</button>
        </div>

        <!-- Producto 3 -->
        <div class="producto-card">
          <div class="producto-imagen">
            <img src="imagenes/producto3.png" alt="Café Orgánico">
          </div>
          <h3>Café Orgánico x 250gr</h3>
          <p>Auténtico café de las montañas de Nariño.</p>
          <p><strong>Precio: $24.000</strong></p>
          <label>Cantidad:</label>
          <input type="number" id="cantidad-cafe" value="1" min="1" style="width: 60px;">
          <button class="add-to-cart-btn" onclick="agregarAlCarrito('Café Orgánico', 24000, 'cantidad-cafe')">Agregar al carrito</button>       
        </div>

        <!-- Producto 4 -->
        <div class="producto-card">
          <div class="producto-imagen">
            <img src="imagenes/producto4.png" alt="Miel Pura">
          </div>
          <h3>Miel Pura x 500gr</h3>
          <p>Miel 100% natural, cosechada sin aditivos.</p>
          <p><strong>Precio: $23.000</strong></p>
          <label>Cantidad:</label>
          <input type="number" id="cantidad-miel" value="1" min="1" style="width: 60px;">
          <button class="add-to-cart-btn" onclick="agregarAlCarrito('Miel Natural', 23000, 'cantidad-miel')">Agregar al carrito</button>
        </div>

        <!-- Producto 5 -->
        <div class="producto-card">
          <div class="producto-imagen">
            <img src="imagenes/producto5.png" alt="Frijol Orgánico">
          </div>
          <h3>Frijol Orgánico x 500gr</h3>
          <p>Frijoles cultivados sin químicos.</p>
          <p><strong>Precio: $11.000</strong></p>
          <label>Cantidad:</label>
          <input type="number" id="cantidad-frijol" value="1" min="1" style="width: 60px;">
          <button class="add-to-cart-btn" onclick="agregarAlCarrito('Frijol Orgánico', 11000, 'cantidad-frijol')">Agregar al carrito</button>
        </div>

        <!-- Producto 6 -->
        <div class="producto-card">
          <div class="producto-imagen">
            <img src="imagenes/producto6.png" alt="Tomates Cherry">
          </div>
          <h3>Tomates Cherry x 500gr</h3>
          <p>Tomates pequeños, jugosos y llenos de sabor.</p>
          <p><strong>Precio: $8.000</strong></p>
          <label>Cantidad:</label>
          <input type="number" id="cantidad-tomate" value="1" min="1" style="width: 60px;">
          <button class="add-to-cart-btn" onclick="agregarAlCarrito('Tomates Cherry', 8000, 'cantidad-tomate')">Agregar al carrito</button>
        </div>

      </div>
    </section>
  </main>

</body>
</html>
