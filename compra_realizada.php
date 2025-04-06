<?php
session_start();
// Limpar o carrinho após a compra (opcional, dependendo da sua lógica)
unset($_SESSION['carrinho']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Realizada - Bikcraft</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&family=Poppins:wght@400;500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<body id="compra-realizada">
    <header class="header-bg">
        <div class="header container">
            <a href="./"><img src="./img/bikcraft.svg" alt="Bikcraft"></a>
            <nav aria-label="primária">
                <ul class="header-menu font-1-m cor-0">
                    <li><a href="./bicicletas.html">Bicicletas</a></li>
                    <li><a href="./seguros.html">Seguros</a></li>
                    <li><a href="./contato.html">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <div class="titulo-bg">
            <div class="titulo container">
                <p class="font-2-l-b cor-p1">Compra Realizada</p>
                <h1 class="font-1-xxl cor-0">Seu pedido foi recebido!</h1>
            </div>
        </div>

        <p class="font-2-l cor-11">Agradecemos por sua compra na Bikcraft.</p>
        <p class="font-1-m cor-8">Em breve, você receberá um e-mail com os detalhes do seu pedido e as próximas etapas.</p>

        <div style="margin-top: 40px;">
            <a href="./" class="botao">Voltar para a loja</a>
        </div>
    </main>

    <footer class="footer-bg">
        <div class="footer container">
            <img src="./img/bikcraft.svg" alt="Bikcraft">
            <div class="footer-contato">
                <h3 class="font-2-l-b cor-0">Contato</h3>
                <ul class="font-2-m cor-0">
                    <li><a href="tel:+552199999999">+55 21 9999-9999</a></li>
                    <li><a href="mailto:contato@bikcraft.com">contato@bikcraft.com</a></li>
                    <li>Rua Ali Perto, 42 - Botafogo</li>
                    <li>Rio de Janeiro - RJ</li>
                </ul>
                <div class="footer-redes">
                    <a href="./"><img src="./img/redes/instagram.svg" alt="Instagram"></a>
                    <a href="./"><img src="./img/redes/facebook.svg" alt="Facebook"></a>
                    <a href="./"><img src="./img/redes/youtube.svg" alt="Youtube"></a>
                </div>
            </div>
            <div class="footer-informacoes">
                <h3 class="font-2-l-b cor-0">Informações</h3>
                <nav>
                    <ul class="font-1-m cor-0">
                        <li><a href="./bicicletas.html">Bicicletas</a></li>
                        <li><a href="./seguros.html">Seguros</a></li>
                        <li><a href="./contato.html">Contato</a></li>
                        <li><a href="./termos.html">Termos e Condições</a></li>
                    </ul>
                </nav>
            </div>
            <p class="footer-copy font-2-s cor-6">Bikcraft © Alguns direitos reservados.</p>
        </div>
    </footer>
</body>
</html>