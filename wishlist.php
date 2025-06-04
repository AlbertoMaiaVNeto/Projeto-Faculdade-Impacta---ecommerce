<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sua lista de favoritos.">
  <link rel="stylesheet" href="css/style.css">
  <title>Bikcraft - Wishlist (Favoritos)</title>
  <style>
    .wishlist-item {
      background: #232323;
      border-radius: 12px;
      padding: 32px;
      margin-bottom: 40px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 4px 16px rgba(0,0,0,0.07);
      min-height: 190px;
    }
    .wishlist-info {
      display: flex;
      align-items: center;
      gap: 48px;
    }
    .wishlist-info img {
      max-width: 180px;
      min-width: 140px;
      border-radius: 10px;
      background: #111;
      box-shadow: 0 2px 10px rgba(0,0,0,0.06);
      height: auto;
    }
    .wishlist-nome {
      font-family: 'Poppins', Arial, sans-serif;
      font-size: 2rem;
      color: var(--cor0);
      margin-bottom: 10px;
      font-weight: 600;
    }
    .wishlist-preco {
      font-family: 'Roboto', Arial, sans-serif;
      color: var(--cor1);
      font-size: 1.3rem;
      margin-bottom: 10px;
    }
    .wishlist-actions {
      display: flex;
      flex-direction: column;
      gap: 18px;
      align-items: flex-end;
      min-width: 140px;
    }
    .wishlist-remove {
      background: none;
      border: none;
      color: #b22;
      font-size: 1.15rem;
      cursor: pointer;
      padding: 0 10px;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: color 0.2s;
      white-space: nowrap;
    }
    .wishlist-remove:hover {
      color: #ff4747;
    }
    .wishlist-empty {
      text-align: center;
      color: var(--cor6);
      font-size: 1.4rem;
      margin: 90px 0 120px 0;
    }
    @media (max-width: 800px) {
      .wishlist-item {
        flex-direction: column;
        align-items: flex-start;
        padding: 24px;
        gap: 30px;
      }
      .wishlist-actions {
        align-items: flex-start;
        min-width: 0;
      }
      .wishlist-info {
        flex-direction: column;
        gap: 20px;
      }
      .wishlist-info img {
        max-width: 100%;
        min-width: 0;
      }
    }
  </style>
</head>
<body id="wishlist">
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
          <li><a href="./whishlist.html">Favoritos</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <div class="titulo-bg">
      <div class="titulo container">
        <p class="font-2-l-b cor5">Salvos para depois</p>
        <h1 class="font-1-xxl cor0">meus favoritos<span class="corp1">.</span></h1>
      </div>
    </div>
    <div class="container" style="max-width: 1000px; margin: 0 auto;">
      <section id="wishlist-section">
        <h2 class="font-1-m cor0" style="margin-bottom: 28px;">Olá, Teste Teste</h2>
        <!-- Itens serão inseridos via JS -->
      </section>
    </div>
  </main>
  <footer class="footer-bg" style="margin-top: 60px;">
    <!-- ... footer igual ... -->
  </footer>
  <script>
    function getFavoritos() {
      return JSON.parse(localStorage.getItem('favoritos') || '[]');
    }
    function setFavoritos(favs) {
      localStorage.setItem('favoritos', JSON.stringify(favs));
    }

    function renderWishlist() {
      const favs = getFavoritos();
      const section = document.getElementById('wishlist-section');
      // Remove itens antigos
      section.querySelectorAll('.wishlist-item, .wishlist-empty').forEach(el => el.remove());

      if (favs.length === 0) {
        const emptyDiv = document.createElement('div');
        emptyDiv.className = 'wishlist-empty';
        emptyDiv.innerText = 'Sua lista de favoritos está vazia.';
        section.appendChild(emptyDiv);
        return;
      }

      favs.forEach(item => {
        const div = document.createElement('div');
        div.className = 'wishlist-item';
        div.innerHTML = `
          <div class="wishlist-info">
            <img src="${item.img}" alt="${item.nome}">
            <div>
              <div class="wishlist-nome">${item.nome}</div>
              <div class="wishlist-preco">R$ ${parseFloat(item.preco).toLocaleString('pt-BR')}</div>
            </div>
          </div>
          <div class="wishlist-actions">
            <a href="${item.id}.html" class="botao seta" style="min-width: 140px; text-align: center; white-space: nowrap;">Ver produto</a>
            <button class="wishlist-remove" data-id="${item.id}" title="Remover dos favoritos" aria-label="Remover dos favoritos">✕ Remover</button>
          </div>
        `;
        section.appendChild(div);
      });

      // Eventos de remover
      section.querySelectorAll('.wishlist-remove').forEach(btn => {
        btn.addEventListener('click', function() {
          const id = this.dataset.id;
          let favs = getFavoritos();
          favs = favs.filter(item => item.id !== id);
          setFavoritos(favs);
          renderWishlist();
        });
      });
    }

    renderWishlist();
  </script>
</body>
</html>