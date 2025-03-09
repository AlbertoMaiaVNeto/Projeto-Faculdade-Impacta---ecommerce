<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

include('conexao.php');

$userId = $_SESSION['id'];
$sql_code = "SELECT * FROM usuarios WHERE id = '$userId'";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
$usuario = $sql_query->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Usuário</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($usuario['nome']); ?>!</h1>
    <p>Este é o seu painel de controle.</p>
    <p><a href="logout.php">Sair</a></p>
</body>
</html>