-- Destruir Banco de Dados caso já exista --
DROP DATABASE IF EXISTS teixeira_turismo;

-- Criação do banco de dados
CREATE DATABASE teixeira_turismo;

-- Seleciona o banco de dados
USE teixeira_turismo;

-- Criação da tabela "user"
CREATE TABLE user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100),
    email VARCHAR(100),
    password_ VARCHAR(100),
    cpf VARCHAR(11) UNIQUE,
    birth DATE,
    phone INT(11),
    city VARCHAR(300),
    state_ VARCHAR(300),
    notific INT
);

-- Inserindo valores na tabela users
INSERT INTO user (user_id, user_name, email, password_, cpf, birth, state_, notific)
VALUES (1, 'test', 'test@gmail.com', '1234', 12345678900, '2001-01-01', 'MG', 0),
       (2, 'test2', 'test2@gmail.com', '1234', 12345678901, '2002-02-02', 'MG', 0),
       (3, 'test3', 'test3@gmail.com', '1234', 12345678902, '2003-03-03', 'MG', 0),
       (4, 'test4', 'test4@gmail.com', '1234', 12345678903, '2004-04-04', 'MG', 0);

-- Criação da tabela "travel"
CREATE TABLE IF NOT EXISTS `travel` (
  `travel_id` int NOT NULL AUTO_INCREMENT,
  `origin` varchar(300) DEFAULT NULL,
  `destiny` varchar(300) DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `arrival_time` time NOT NULL,
  `exit_time` time NOT NULL,
  `class` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`travel_id`)
);

-- Inserindo valores na tabela travel
INSERT INTO travel (travel_id, origin, destiny, departure_date, arrival_date, exit_time, class, horario, price)
VALUES (1, 'DIVINOPOLIS - MG', 'ITAUNA - MG', '2023-08-20', '2023-08-25', '12:20:00', 'CONVENCIONAL', 'MANHÃ', '25.00'),
       (2, 'ITAUNA - MG', 'DIVINOPOLIS - MG', '2023-08-20', '2023-08-22', '15:10:00', 'CONVENCIONAL', 'TARDE', '30.00'),
       (3, 'DIVINOPOLIS - MG', 'BELO HORIZONTE - MG', '2023-08-20', '2023-08-21', '20:00:00', 'CONVENCIONAL', 'NOITE', '45.00'),
       (4, 'SÃO JOSÉ DO SALGADO - MG', 'BELO HORIZONTE - MG', '2023-08-20', '2023-08-24', '17:00:00', 'CONVENCIONAL', 'MADRUGADA', '30.00'),
       (5, 'SÃO JOSÉ DO SALGADO - MG', 'DIVINOPOLIS - MG', '2023-08-16', '2023-08-16', '00:00:00', 'ECONOMICA', 'MANHÃ', '8'),
       (6, 'DIVINOPOLIS - MG', 'ITAUNA - MG', '2023-08-24', '2023-08-26', '14:55:00', 'ECONOMICA', 'MANHÃ', '15');

-- Criação da tabela "coupon"
CREATE TABLE coupon (
    coupon_id INT AUTO_INCREMENT PRIMARY KEY,
    coupon_name VARCHAR(300),
    discount FLOAT
);

-- Inserindo valores na tabela coupon
INSERT INTO coupon (coupon_id, coupon_name, discount)
VALUES (1, 'coupon1', '10'),
       (2, 'coupon2', '12'),
       (3, 'coupon3', '15'),
       (4, 'coupon4', '20');

-- Criação da tabela "user_travel"
CREATE TABLE user_travel (
    userTravel_id INT AUTO_INCREMENT PRIMARY KEY,
    travel_id INT,
    user_id INT,
    coupon_id INT,
    FOREIGN KEY (travel_id) REFERENCES travel(travel_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (coupon_id) REFERENCES coupon(coupon_id)
);

-- Inserindo valores na tabela users
INSERT INTO user_travel (userTravel_id, user_id, coupon_id)
VALUES (1, '1', '1'),
       (2, '1', '2'),
       (3, '3', '3'),
       (4, '4', '4');

-- Criação da tabela "user_chair"
CREATE TABLE `user_chair` (
    `user_chair_id` int NOT NULL AUTO_INCREMENT,
    `user_id` int DEFAULT NULL,
    `travel_id` int DEFAULT NULL,
    `chair_number` int DEFAULT NULL,
    `busy` int NOT NULL,
    PRIMARY KEY (`user_chair_id`),
    KEY `user_id` (`user_id`),
    KEY `travel_id` (`travel_id`)
);

-- Criação da tabela "cities"
CREATE TABLE cities (
    city_id INT AUTO_INCREMENT PRIMARY KEY,
    city_state VARCHAR(300),
    city_name VARCHAR(300)
);
