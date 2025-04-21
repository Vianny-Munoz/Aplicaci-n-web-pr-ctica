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

            