-- Criação do banco de dados e configuração inicial
CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `login`;

-- Tabela de usuários
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(140) NOT NULL,
  `email` VARCHAR(160) NOT NULL UNIQUE,
  `senha` VARCHAR(255) NOT NULL, -- aumenta para hash futuro
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dados iniciais de usuários
INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'teste', 'teste@teste.com', 'teste');

-- Tabela de produtos
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(255) NOT NULL,
  `preco` DECIMAL(10, 2) NOT NULL,
  `estoque` INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserção de produtos (seguros e bicicletas)
INSERT INTO `produtos` (nome, preco, estoque) VALUES
('Seguro Prata', 199.00, 50),
('Seguro Ouro', 299.00, 30),
('Nimbus Stark', 4999.00, 20),
('Magic Might', 2499.00, 15),
('Nebula Cosmic', 3999.00, 10);

-- Tabela de carrinho (para controle de seleção do usuário)
DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE `carrinho` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `usuario_id` INT NOT NULL,
  `produto_id` INT NOT NULL,
  `quantidade` INT NOT NULL DEFAULT 1,
  FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Trigger para atualizar estoque automaticamente
DROP TRIGGER IF EXISTS `atualizar_estoque`;
DELIMITER //

CREATE TRIGGER `atualizar_estoque`
AFTER INSERT ON `carrinho`
FOR EACH ROW
BEGIN
  UPDATE produtos
  SET estoque = estoque - NEW.quantidade
  WHERE id = NEW.produto_id;
END;
//

DELIMITER ;
