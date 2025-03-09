<?php
include('conexao.php');
session_start();

$error_message = '';

if(isset($_POST['email']) && isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        $error_message = "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        $error_message = "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        // Check if the email and password match
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        if($sql_query->num_rows > 0) {
            $_SESSION['email'] = $email;
            header("Location: index.html");
            exit();
        } else {
            $error_message = "E-mail ou senha incorretos!";
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
    <title>Login</title>
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
    </style>
</head>
<body>
    <h1>Login</h1>
    <?php if($error_message): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <form action="" method="POST">
        <p>
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" placeholder="Digite seu e-mail">
        </p>
        <p>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
        </p>
        <p>
            <button type="submit">Login</button>
        </p>
    </form>
    <p>
        <a href="register.php">Não tem uma conta? Cadastre-se</a>
    </p>
    <script src="script.js"></script>
</body>
</html>