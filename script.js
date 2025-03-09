document.addEventListener('DOMContentLoaded', () => {
    const loginContainer = document.querySelector('.login-container');
    const inputs = document.querySelectorAll('input');

    // Efeito de foco nos inputs
    inputs.forEach(input => {
        input.addEventListener('focus', () => {
            input.parentElement.classList.add('input-focused');
        });

        input.addEventListener('blur', () => {
            input.parentElement.classList.remove('input-focused');
        });
    });

    // Animação de entrada do container de login
    loginContainer.style.opacity = 0;
    let translateY = '20px';

    loginContainer.style.transform = `translateY(${translateY})`;
    setTimeout(() => {
        loginContainer.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
        loginContainer.style.opacity = 1;
        loginContainer.style.transform = 'translateY(0)';
    }, 100);
});

document.addEventListener('DOMContentLoaded', () => {
    const alternarPaginaLinks = document.querySelectorAll('.alternar-pagina');
    const containerPrincipal = document.querySelector('.container-principal');

    alternarPaginaLinks.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            const destino = link.getAttribute('href');

            // Animação de saída
            containerPrincipal.style.opacity = 0;
            containerPrincipal.style.transform = 'translateY(-20px)';

            setTimeout(() => {
                window.location.href = destino;
            }, 300); // Tempo da animação
        });
    });

    // Animação de entrada (para ambas as páginas)
    containerPrincipal.style.opacity = 0;
    containerPrincipal.style.transform = 'translateY(20px)';
    setTimeout(() => {
        containerPrincipal.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        containerPrincipal.style.opacity = 1;
        containerPrincipal.style.transform = 'translateY(0)';
    }, 100);
});

document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const errorMessage = document.getElementById('error-message');

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            const email = document.getElementById('email').value;
            const senha = document.getElementById('senha').value;

            if (email.length === 0 || senha.length === 0) {
                event.preventDefault();
                errorMessage.style.display = 'block';
                errorMessage.textContent = 'Preencha seu e-mail e senha';
            }
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', function(event) {
            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const senha = document.getElementById('senha').value;

            if (nome.length === 0 || email.length === 0 || senha.length === 0) {
                event.preventDefault();
                errorMessage.style.display = 'block';
                errorMessage.textContent = 'Preencha seu nome, e-mail e senha';
            }
        });
    }
});


