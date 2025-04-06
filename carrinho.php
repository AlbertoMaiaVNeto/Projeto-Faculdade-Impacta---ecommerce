<?php
session_start();

// Credenciais de conexão com o banco de dados (verifique se estão corretas)
$host = 'localhost';
$dbname = 'login';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

// Processar a adição de itens ao carrinho (vindo da página de orçamento)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['produto']) && isset($_POST['tipo'])) {
        $tipo = $_POST['tipo'];
        if ($tipo === 'bikcraft') {
            if (is_array($_POST['produto'])) {
                foreach ($_POST['produto'] as $produto_id) {
                    if (isset($_POST['quantidade'][$produto_id]) && is_numeric($_POST['quantidade'][$produto_id]) && $_POST['quantidade'][$produto_id] > 0) {
                        $quantidade = intval($_POST['quantidade'][$produto_id]);
                        $_SESSION['carrinho'][$produto_id] = $quantidade;
                    }
                }
            }
        } elseif ($tipo === 'seguro') {
            if (isset($_POST['produto'])) {
                $produto_nome = $_POST['produto'];
                $stmt = $pdo->prepare("SELECT id FROM produtos WHERE nome = :nome");
                $stmt->bindParam(':nome', $produto_nome);
                $stmt->execute();
                $seguro = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($seguro) {
                    $_SESSION['carrinho'][$seguro['id']] = 1;
                }
            }
        }
    }
}

// Consultar os itens do carrinho no banco de dados
$itens_carrinho = [];
$total = 0;
if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
    $ids = array_keys($_SESSION['carrinho']);
    $quantidades = $_SESSION['carrinho'];
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $stmt = $pdo->prepare("SELECT id, nome, preco FROM produtos WHERE id IN ($placeholders)");
    $stmt->execute($ids);
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($produtos as $produto) {
        $id = $produto['id'];
        $quantidade = $quantidades[$id];
        $subtotal = $produto['preco'] * $quantidade;
        $total += $subtotal;
        $itens_carrinho[] = [
            'id' => $id,
            'nome' => $produto['nome'],
            'preco' => $produto['preco'],
            'quantidade' => $quantidade,
            'subtotal' => $subtotal
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras - Bikcraft</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&family=Poppins:wght@400;500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<body id="carrinho">
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
                <p class="font-2-l-b cor-5">Carrinho</p>
                <h1 class="font-1-xxl cor-0">Seus itens.</h1>
            </div>
        </div>

        <?php if (!empty($itens_carrinho)): ?>
            <ul class="carrinho-lista">
                <?php foreach ($itens_carrinho as $item): ?>
                    <li class="carrinho-item">
                        <div class="carrinho-info">
                            <h3 class="font-2-m cor-11"><?= htmlspecialchars($item['nome']); ?></h3>
                            <p class="font-1-s cor-8">Quantidade: <?= $item['quantidade']; ?></p>
                            <p class="font-1-s cor-8">Preço Unitário: R$ <?= number_format($item['preco'], 2, ',', '.'); ?></p>
                        </div>
                        <span class="font-2-m cor-11">R$ <?= number_format($item['subtotal'], 2, ',', '.'); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="carrinho-total">
                <p class="font-2-l cor-11">Total: <span class="font-2-l-b cor-p1">R$ <?= number_format($total, 2, ',', '.'); ?></span></p>
                <a href="./compra_realizada.php" class="botao">Finalizar Compra</a>
            </div>
        <?php else: ?>
            <p class="font-1-m cor-8">Seu carrinho está vazio.</p>
            <a href="./" class="botao">Voltar para a loja</a>
        <?php endif; ?>
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

<style>
/* Estilos específicos para a página do carrinho (podem ser movidos para style.css) */
#carrinho main {
    padding-top: 60px; /* Ajuste o espaçamento superior conforme necessário */
    padding-bottom: 60px; /* Ajuste o espaçamento inferior conforme necessário */
}

.carrinho-lista {
    margin-bottom: 40px;
    border: 1px solid var(--cor-3);
    border-radius: 4px;
}

.carrinho-item {
    display: grid;
    grid-template-columns: 3fr 1fr;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid var(--cor-3);
}

.carrinho-item:last-child {
    border-bottom: none;
}

.carrinho-info {
    grid-column: 1;
}

.carrinho-total {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 40px;
}

.carrinho-total p {
    font-size: 1.5rem; /* Use a fonte e tamanho adequados */
}

.carrinho-total span {
    font-weight: bold; /* Use a fonte e cor primária adequadas */
    color: var(--corp1);
}

/* Adaptações para telas menores (opcional, ajuste conforme necessário) */
@media (max-width: 768px) {
    .carrinho-item {
        grid-template-columns: 1fr;
        gap: 10px;
    }

    .carrinho-info {
        grid-column: 1;
    }

    .carrinho-total {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }
}
</style>