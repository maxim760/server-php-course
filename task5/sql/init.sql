CREATE DATABASE IF NOT EXISTS shop;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT,DELETE ON shop.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE shop;
CREATE TABLE IF NOT EXISTS products (
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(48) NOT NULL,
    price INT(11) NOT NULL,
    description VARCHAR(512) NOT NULL
);

CREATE TABLE IF NOT EXISTS auth (
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    login VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(40) NOT NULL
    );
CREATE TABLE IF NOT EXISTS pdfs (
    ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(48) NOT NULL,
    pdf LONGBLOB NOT NULL
    );

INSERT INTO auth (login, password)
    -- root root
VALUES ('root', '{SHA}3Hbp8MAAbo+RngxRXGbbujmC94U=');

INSERT INTO products (title, price, description)
VALUES
    ('Irbis NB77', 15999, "HD (1366x768), TN+film, Intel Atom Z3735F, cores: 4 x 1.33 ghz, RAM 2 GB, eMMC 32 GB, Intel HD Graphics , Windows 10 Home Single Language"),
    ('HP 250 G7', 25199, "Full HD (1920x1080), SVA (TN+film), Intel Celeron N4020, cores: 2 x 1.1 ghz, RAM 4 GB, SSD 128 GB, Intel UHD Graphics 600 , without OS "),
    ('ASUS Laptop E410KA-BV1234W', 25999, "HD (1366x768), TN+film, Intel Celeron N4020, cores: 2 x 1.1 ghz, RAM 4 GB, SSD 128 GB, Intel UHD Graphics , Windows 11 Home Single Language"),
    ('Echips Lite', 25999, "HD (1366x768), TN+film, Intel Celeron J4005, cores: 2 x 2 ghz, RAM 8 GB, SSD 240 GB, Intel HD Graphics , Windows 10 Pro"),
    ('MSI GF76 Katana 12UD-236XRU', 101199, "Full HD (1920x1080), IPS, Intel Core i7-12700H, cores: 6 + 8, RAM 16 GB, SSD 512 GB, GeForce RTX 3050 Ti for laptops 4 GB, without OS"),
    ('GIGABYTE G5 KC', 109999, "Full HD (1920x1080), IPS, Intel Core i5-10500H, cores: 6 x 2.5 ghz, RAM 16 GB, SSD 512 GB, GeForce RTX 3060 for laptops 6 GB, Windows 11 Home Single Language");