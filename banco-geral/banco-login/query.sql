CREATE TABLE membros (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  usuario VARCHAR(255) NOT NULL,
  senha VARCHAR(255) NOT NULL
);

INSERT INTO membros (nome, email, usuario, senha) VALUES ('ruan', 'brasilvidaroleplay3@gmail.com', 'ruan', '1243');
