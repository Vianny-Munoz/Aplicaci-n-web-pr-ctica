// document.getElementById ('show-register').addEventListener('click', function(e){
//     e.preventDefault();
//     document.querySelector('.form-login').style.display = 'none';
//     document.querySelector('.form-register').style.display = 'block';
//     console.log('Formulario de registro visible');
// });

// document.getElementById('show-login').addEventListener('click', function(e){
//     e.preventDefault();
//     document.querySelector('.form-login').style.display = 'block';
//     document.querySelector('.form-register').style.display = 'none';
// });

    
document.addEventListener("DOMContentLoaded", function () {
  const showRegister = document.getElementById('show-register');
  const showLogin = document.getElementById('show-login');

  if (showRegister) {
    showRegister.addEventListener('click', function (e) {
      e.preventDefault();
      const loginForm = document.querySelector('.form-login');
      const registerForm = document.querySelector('.form-register');
      if (loginForm && registerForm) {
        loginForm.classList.add('hidden');
        registerForm.classList.remove('hidden');
      }
    });
  }

  if (showLogin) {
    showLogin.addEventListener('click', function (e) {
      e.preventDefault();
      const loginForm = document.querySelector('.form-login');
      const registerForm = document.querySelector('.form-register');
      if (loginForm && registerForm) {
        registerForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
      }
    });
  }
});

// Simular si el usuario ha iniciado sesión
//let usuarioLogueado = false; // Cambiar a true si el usuario inicia sesión correctamente*** Descomentar o arreglar con login funcional

let carrito = [];

function agregarAlCarrito(id, nombre, precio, cantidadId) {
    const cantidad = parseInt(document.getElementById(cantidadId).value);

  if (isNaN(cantidad) || cantidad < 1) {
    alert("Cantidad inválida");
    return;
  }
  // Aquí se imprime el ID, nombre y precio del producto cuando se agrega al carrito
  console.log("Producto agregado al carrito:");
  console.log("ID:", id);  
  console.log("Nombre:", nombre);  
  console.log("Precio:", precio);  

  // Revisar si el producto ya está en el carrito
  const existente = carrito.find(p => p.nombre === nombre);
  if (existente) {
    existente.cantidad += cantidad;
  } else {
    carrito.push({id, nombre, precio, cantidad });
  }

  actualizarCarrito();
}

function actualizarCarrito() {
  const lista = document.getElementById("carrito-lista");
  const mensaje = document.getElementById("mensaje-carrito");
  lista.innerHTML = "";

  let total = 0;

  carrito.forEach((producto, index) => {
    const subtotal = producto.precio * producto.cantidad;
    total += subtotal;

    const li = document.createElement("li");
    li.innerHTML = `
      ${producto.nombre} x${producto.cantidad} - $${subtotal.toLocaleString()} 
      <button onclick="eliminarProducto(${index})">❌</button>
    `;
    lista.appendChild(li);
  });

  mensaje.textContent = carrito.length === 0
    ? "Tu carrito está vacío."
    : `🧾 Total: $${total.toLocaleString()}`;

    // Guardar el carrito en localStorage para evitar pérdidas al recargar página
    localStorage.setItem("carrito", JSON.stringify(carrito));

    console.log("Carrito actualizado:", carrito);
}

function eliminarProducto(index) {
  carrito.splice(index, 1);
  actualizarCarrito();
}

function irAPedidos() {
  // Guarda el carrito en localStorage antes de redirigir
  localStorage.setItem("carrito", JSON.stringify(carrito));
  window.location.href = "pedidos.php";
}




            