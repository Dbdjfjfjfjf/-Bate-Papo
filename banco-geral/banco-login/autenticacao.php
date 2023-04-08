<?php
session_start();

if (isset($_POST['submit'])) {
  // Faz a conexão com o banco de dados
  $dbhost = "localhost";
  $dbuser = "ruan";
  $dbpass = "1243";
  $dbname = "banco-geral/banco-login/query.sql";
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  // Verifica se a conexão com o banco de dados foi bem sucedida
  if (!$conn) {
    die("Conexão com o banco de dados falhou: " . mysqli_connect_error());
  }

  // Escapa os dados de entrada para prevenir SQL injection
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // Verifica se o usuário existe no banco de dados
  $sql = "SELECT * FROM membros WHERE nome_de_usuario = '$username'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  // Verifica se a senha está correta
  if ($row && password_verify($password, $row['senha'])) {
    // Se as credenciais de login estiverem corretas, inicia a sessão
    $_SESSION['membro_id'] = $row['id'];
    $_SESSION['membro_username'] = $row['nome_de_usuario'];
    header("Location: banco-geral/banco-login/membros.php");
    exit();
  } else {
    // Se as credenciais de login estiverem incorretas, mostra uma mensagem de erro
    $error_msg = "Credenciais de login inválidas. Por favor, tente novamente.";
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Autenticação de Membros</title>
  </head>
  <body>
    <h1>Autenticação de Membros</h1>
    <?php if (isset($error_msg)) { ?>
      <p><?php echo $error_msg; ?></p>
    <?php } ?>
    <form method="post" action="">
      <label for="username">Nome de Usuário:</label>
      <input type="text" id="username" name="username" required>
      <br>
      <label for="password">Senha:</label>
      <input type="password" id="password" name="password" required>
      <br>
      <button type="submit" name="submit">Entrar</button>
    </form>
  </body>
</html>
