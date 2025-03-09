<?php
include('conexao.php');

$error_message = '';
$success_message = '';

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {

    if(strlen($_POST['nome']) == 0) {
        $error_message = "Preencha seu nome";
    } else if(strlen($_POST['email']) == 0) {
        $error_message = "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        $error_message = "Preencha sua senha";
    } else {

        $nome = $mysqli->real_escape_string($_POST['nome']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        // Check if the email already exists
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        if($sql_query->num_rows > 0) {
            $error_message = "E-mail já cadastrado!";
        } else {
            // Insert new user into the database
            $sql_code = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
            if($mysqli->query($sql_code)) {
                $success_message = "Usuário cadastrado com sucesso!";
            } else {
                $error_message = "Falha ao cadastrar usuário: " . $mysqli->error;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600&family=Roboto:wght@100;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;1,900&display=swap" rel="stylesheet">
    <style>
        .error-message {
            color: red;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .success-message {
            color: green;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Crie sua conta</h1>
    <?php if($error_message): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <?php if($success_message): ?>
        <div class="success-message"><?php echo $success_message; ?></div>
    <?php endif; ?>
    <form id="register-form" action="" method="POST">
        <p>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
        </p>
        <p>
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" placeholder="Digite seu e-mail">
        </p>
        <p>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
        </p>
        <p>
            <button type="submit">Registrar</button>
        </p>
    </form>
    <p>
        <a href="index.php">Já tem uma conta? Faça login</a>
    </p>
    <script src="js/script.js"></script>
</body>
</html>