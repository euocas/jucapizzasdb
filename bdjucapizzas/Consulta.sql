CREATE TABLE pizzas (
    idPizza INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    ingredientes VARCHAR(255) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL
);
INSERT INTO pizzas (nome, ingredientes, valor) VALUES
('Calabresa', 'Mussarela, calabresa fatiada e cebola', 45.50),
('Mussarela', 'Mussarela e molho de tomate', 40.00),
('Frango com Catupiry', 'Frango desfiado, catupiry e mussarela', 52.90),
('Portuguesa', 'Mussarela, presunto, ovo, ervilha, cebola e calabresa', 62.90),
('Moda do Juca', 'Mussarela, peito de peru, palmito, alho poró e alcaparras', 72.50);
SELECT * FROM pizzas;

CREATE TABLE bebidas (
<<<<<<< HEAD
idBebida INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR (100) NOT NULL,
valor DECIMAL (10, 2) NOT NULL,
tamanho VARCHAR(20) NOT NULL,
categoria ENUM('ALCOOLICO', 'NAO_ALCOOLICO') NOT NULL
=======
    idBebida INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    tamanho VARCHAR(20) NOT NULL,
    categoria ENUM('ALCOOLICO', 'NAO_ALCOOLICO') NOT NULL
>>>>>>> c71ad90f5f1a713bf9ad14ee2cb91de7d0945afd
);

INSERT INTO bebidas (nome, tamanho, valor, categoria) VALUES
 
('Coca-Cola Zero', '2L', 15.00, 'NAO_ALCOOLICO'),
('Guaraná Antarctica', '2L', 12.00, 'NAO_ALCOOLICO'),
('Água Mineral', '500ml', 5.00, 'NAO_ALCOOLICO'),
('Heineken', '250ml', 12.00, 'ALCOOLICO'),
('Corona', 'Long Neck 330ml', 13.00, 'ALCOOLICO');

SELECT * FROM bebidas;
