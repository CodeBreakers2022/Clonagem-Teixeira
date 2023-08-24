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
INSERT INT user (user_id, user_name, email, password_, cpf, birth, state_, notific)
VALUES (1, 'test', 'test@gmail.com', '1234', 12345678900, '2001-01-01', 'MG', 0),
       (2, 'test2', 'test2@gmail.com', '1234', 12345678901, '2002-02-02', 'MG', 0),
       (3, 'test3', 'test3@gmail.com', '1234', 12345678902, '2003-03-03', 'MG', 0),
       (4, 'test4', 'test4@gmail.com', '1234', 12345678903, '2004-04-04', 'MG', 0)

-- Criação da tabela "travel"
CREATE TABLE travel (
    travel_id INT AUTO_INCREMENT PRIMARY KEY,
    origin VARCHAR(300),
    destiny VARCHAR(300),
    departure_date DATE,
    arrival_date DATE,
    class VARCHAR(100),
    price FLOAT
);

-- Inserindo valores na tabela travel
INSERT INT travel (travel_id, origin, destiny, departure_date, arrival_date, class, price)
VALUES (1, 'Divinopolis - MG', 'Itauna - MG', '2023-08-20', '2023-08-25', 'CONVENCIONAL', '25.00'),
       (2, 'Itauna - MG', 'Divinopolis - MG', '2023-08-20', '2023-08-22', 'CONVENCIONAL', '30.00'),
       (3, 'Divinopolis - MG', 'Belo Horizonte - MG', '2023-08-20', '2023-08-21', 'CONVENCIONAL', '45.00'),
       (4, 'Sao Jose do Salgado - MG', 'Belo Horizonte - MG', '2023-08-20', '2023-08-24', 'CONVENCIONAL', '30.00')

-- Criação da tabela "coupon"
CREATE TABLE coupon (
    coupon_id INT AUTO_INCREMENT PRIMARY KEY,
    coupon_name VARCHAR(300),
    discount FLOAT
);

-- Inserindo valores na tabela coupon
INSERT INT coupon (coupon_id, coupon_name, discount)
VALUES (1, 'coupon1', '10'),
       (2, 'coupon2', '12'),
       (3, 'coupon3', '15'),
       (4, 'coupon4', '20')

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
INSERT INT user_travel (userTravel_id, user_id, coupon_id)
VALUES (1, '1', '1'),
       (2, '1', '2'),
       (3, '3', '3'),
       (4, '4', '4')

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
