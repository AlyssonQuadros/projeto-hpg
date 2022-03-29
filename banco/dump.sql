CREATE DATABASE bombeirospg;
CREATE TABLE `equipamentos` (
  `id_equip` int(11) NOT NULL AUTO_INCREMENT,
  `patrimonio` varchar(20) CHARACTER SET utf8 NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descricao` text CHARACTER SET utf8,
  `condicao` varchar(20) CHARACTER SET utf8 NOT NULL,
  `situacao` varchar(20) COLLATE latin1_bin DEFAULT NULL,
  `imagem` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_equip`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1 COLLATE=latin1_bin

CREATE TABLE `hidrantes` (
  `id_hidrantes` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) CHARACTER SET utf8 NOT NULL,
  `endereco` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `situacao` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `tipo` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `vazao` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `pressao` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `condicao` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `acesso` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `lat` decimal(20,15) NOT NULL,
  `lng` decimal(20,15) NOT NULL,
  `imagem` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `observacao` varchar(90) COLLATE latin1_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_hidrantes`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1 COLLATE=latin1_bin

CREATE TABLE `viaturas` (
  `id_viaturas` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(7) CHARACTER SET utf8 NOT NULL,
  `modelo` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ano` int(4) DEFAULT NULL,
  `marca` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `situacao` varchar(20) COLLATE latin1_bin DEFAULT NULL,
  `imagem` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `observacao` varchar(90) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`id_viaturas`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_bin

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `telefone` varchar(20) COLLATE latin1_bin DEFAULT NULL,
  `funcao` varchar(50) COLLATE latin1_bin DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `senha` varchar(32) CHARACTER SET utf8mb4 NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `recuperar_senha` varchar(200) COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COLLATE=latin1_bin