document.getElementById ('show-register').addEventListener('click', function(e){
    e.preventDefault();
    document.querySelector('.form-login').style.display = 'none';
    document.querySelector('.form-register').style.display = 'block';
    console.log('Formulario de registro visible');
});

document.getElementById('show-login').addEventListener('click', function(e){
    e.preventDefault();
    document.querySelector('.form-login').style.display = 'block';
    document.querySelector('.form-register').style.display = 'none';
});

    
document.addEventListener("DOMContentLoaded", function () {
    const showRegister = document.getElementById('show-register');
    const showLogin = document.getElementById('show-login');
    const loginForm = document.querySelector('.form-login');
    const registerForm = document.querySelector('.form-register');

    showRegister.addEventListener('click', function (e) {
        e.preventDefault();
        loginForm.classList.add('hidden');
        registerForm.classList.remove('hidden');
        console.log('Formulario de registro visible');
    });

    showLogin.addEventListener('click', function (e) {
        e.preventDefault();
        registerForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
        console.log('Formulario de login visible');
    });
});
// Simular si el usuario ha iniciado sesión
let usuarioLogueado = false; // Cambiar a true si el usuario inicia sesión correctamente

function agregarAlCarrito(nombreProducto) {
    const mensajeCarrito = document.getElementById('mensaje-carrito');

    if (!usuarioLogueado) {
        mensajeCarrito.textContent = '⚠️ Primero debes iniciar sesión para agregar productos al carrito.';
    } else {
        // Agregar el producto a la lista del carrito
        const carritoLista = document.getElementById('carrito-lista');
        const nuevoProducto = document.createElement('li');
        nuevoProducto.textContent = nombreProducto;
        carritoLista.appendChild(nuevoProducto);

        mensajeCarrito.textContent = ''; // Limpia el mensaje si el usuario ya está logueado
    }
}



            