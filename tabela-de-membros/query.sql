CREATE TABLE membros (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(50) NOT NULL,
  sobrenome VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  data_criacao DATETIME NOT NULL,
  status_conta VARCHAR(20) NOT NULL
);
