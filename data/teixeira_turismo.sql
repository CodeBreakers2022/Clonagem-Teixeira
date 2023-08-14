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
    state_ VARCHAR(300)
);

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

-- Criação da tabela "coupon"
CREATE TABLE coupon (
    coupon_id INT AUTO_INCREMENT PRIMARY KEY,
    coupon_name VARCHAR(300),
    discount FLOAT
);

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