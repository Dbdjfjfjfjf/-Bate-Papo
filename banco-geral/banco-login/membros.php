<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Área de Membros</title>
    <link rel="stylesheet" href="css/membros.css">
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li><a href="home.php">Início</a></li>
          <li><a href="sobre.php">Sobre</a></li>
          <li><a href="contato.php">Contato</a></li>
          <li><a href="membros.php">Área de Membros</a></li>
          <li><a href="ajuda.php">Ajuda</a></li>
          <li><a href="https://discord.com/invite/XxX3fWcETr">Discord</a></li>
          <li><a href="lojas.php">Serviços</a></li>
        </ul>
      </nav>
    </header>
    <section class="hero">
      <h1>Bem-vindo(a) à Área de Membros</h1>
      <p>Aqui está o conteúdo exclusivo para membros!</p>
    </section>
    <section class="services">
      <h2>Conteúdo Exclusivo</h2>
      <p>Aqui você pode adicionar o conteúdo exclusivo para membros.</p>
    </section>
    <footer>
      <p>&copy; 2023 Todos os Direitos Reservados</p>
    </footer>
    <script src="js/membros.js"></script>
  </body>
</html>
