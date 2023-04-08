<?php
// Inicia a sessão
session_start();

// Verifica se já existe uma sessão aberta para o usuário
if (isset($_SESSION['username'])) {
    header('Location: membros.php');
    exit;
}

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conecta ao banco de dados
    $servername = "localhost";
    $username = "ruan";
    $password = "1243";
    $dbname = "query.sql";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Verifica se a conexão foi bem-sucedida
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Define as variáveis do formulário de login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica se o usuário e senha estão corretos
    $sql = "SELECT * FROM membros WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    // Verifica se o login foi bem-sucedido
    if (mysqli_num_rows($result) == 1) {
        // Inicia a sessão com o nome de usuário
        $_SESSION['username'] = $username;
        header('Location: membros.php');
        exit;
    } else {
        // Mensagem de erro para exibir no formulário
        $error_message = "Nome de usuário ou senha incorretos";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>

    <?php
    // Exibe mensagem de erro, caso exista
    if (isset($error_message)) {
        echo "<p>$error_message</p>";
    }
    ?>

    <form action="login.php" method="POST">
        <label for="username">Nome de usuário:</label><br>
        <input type="text" id="username" name="username"><br>

        <label for="password">Senha:</label><br>
        <input type="password" id="password" name="password"><br>

        <br>

        <input type="submit" value="Entrar">
    </form>
</body>

</html>
