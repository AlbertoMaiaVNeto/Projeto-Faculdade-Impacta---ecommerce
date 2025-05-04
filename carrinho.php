<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Termos e condições.">
  <link rel="preload" href="css/style.css" as="style">
  <link rel="stylesheet" href="css/style.css">
  <title>Bikcraft - Bicicletas Elétricas</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600&family=Roboto:wght@100;400;500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;1,900&display=swap" rel="stylesheet">

</head>

<body id="contato">

  <header class="header-bg">
    <div class="header">
      <a href="./">
        <img src="./img/bikcraft.svg" alt="Bikcraft">
      </a>
      <nav aria-label="primaria">
        <ul class="header-menu cor0 font-1-m">
          <li><a href="./bicicletas.html">Bicicletas</a></li>
          <li><a href="./seguros.html">Seguros</a></li>
          <li><a href="./contato.html">Contato</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="titulo-bg" >
      <div class="titulo container">
        <p class="font-2-l-b cor5">Finalize sua compra</p>
        <h1 class="font-1-xxl cor0">carrinho<span class="corp1">.</span></h1>
      </div>
    </div>

    <div class="contato container">
      <section aria-label="Endereço" class="contato-dados">
        <h2 class="font-1-m cor0">Bem-vindo(a), Teste Teste</h2>
        <div class="contato-endereco font-2-s cor4">
          <p><span class="font-1-m cor0">CPF: </span> 999.999.999-99</p>
          <p><span class="font-1-m cor0">E-MAIL: </span> Teste@teste.com</p>
        </div>

        <address class="contato-meios font-2-s cor4">
          <a href=""><span class="font-1-m cor0">Endereço: </span> Teste, 1234</a>
          <a href=""><span class="font-1-m cor0">Estado/Cidade: </span> São Paulo - São Paulo</a>
        </address>

        <div class="contato-redes">
          <a href="">
            <img src="./img/redes/instagram-p.svg" alt="Instagram">
          </a>
          <a href="">
            <img src="./img/redes/facebook-p.svg" alt="Facebook">
          </a>
          <a href="">
            <img src="./img/redes/youtube-p.svg" alt="Youtube">
          </a>
        </div>
      </section>

      <section class="contato-formulario">
      <p class="font-1-xl " style="margin-bottom: 20px">Produtos</p>
            <div class="orcamento-detalhes imagem-produto" id="imagem-magic" style="display: block; background-color: #595959; max-width: 200px; padding:20px">
                <ul>
                    <li class="cor0" style="font-family: 'poppins';">1x - Magic Might</li>
                </ul>
              <img src="./img/bicicletas/magic.jpg" alt="">
            </div>
        <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 60px">
            <p style="font-family: 'poppins'; font-size: 1.4rem">Valor: R$ 2.499</p>
            <a href="./compra_realizada.php" ><button class="botao col-2">Comprar</button></a>
        </div>
      </section>
    </div>
  </main>


  <footer class="footer-bg" style="margin-top: 60px;">
    <div class="footer container">
      <a href="/index.html"><img src="./img/bikcraft.svg" alt="Bikcraft"></a>
      <div class="footer-contato">
        <h3 class="font-2-l-b cor0">Contato</h3>
        <ul class="font-2-m cor5">
          <li><a href="tel:+5511999999999">+55 11 99999-9999</a></li>
          <li><a href="mailto:alberto.vasconcelosneto@gmail.com">alberto.vasconcelosneto@gmail.com</a></li>
          <li>Rua Cajú, 32 - Castanha</li>
          <li>São Paulo - SP</li>
        </ul>
        <div class="footer-redes">
          <a href="">
            <img src="./img/redes/instagram.svg" alt="Instagram">
          </a>
          <a href="">
            <img src="./img/redes/facebook.svg" alt="Facebook">
          </a>
          <a href="">
            <img src="./img/redes/youtube.svg" alt="Youtube">
          </a>
        </div>
      </div>
      <div class="footer-informacoes">
        <h3 class="font-2-l-b cor0">Informações</h3>
        <nav>
          <ul class="font-1-m cor5">
            <li><a href="./bicicletas.html">Bicicletas</a></li>
            <li><a href="./seguros.html">Seguros</a></li>
            <li><a href="./contato.html">Contato</a></li>
            <li><a href="./termos.html">Termos e Condições</a></li>
          </ul>
        </nav>
      </div>
      <p class="footer-copy font-2-m cor6">Bikcraft © Alguns direitos reservados. Desenvolvido por <strong style="color: var(--cor0)">Alberto Maia</strong></p>
    </div>
  </footer>
</body>

</html>