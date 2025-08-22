-- Criar o banco de dados
CREATE DATABASE IF NOT EXISTS gestao;
USE gestao;
 
-- Tabela empresa
CREATE TABLE empresa (
    id_empresa INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    cnpj VARCHAR(18) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    token VARCHAR(255)
);
 
-- Tabela campo
CREATE TABLE campo (
    id_campo INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    nivel INT NOT NULL,
    cor VARCHAR(7), -- Ex: #FFFFFF
    id_empresa INT NOT NULL,
    FOREIGN KEY (id_empresa) REFERENCES empresa(id_empresa) ON DELETE CASCADE
);
 
-- Tabela modulo
CREATE TABLE modulo (
    id_modulo INT AUTO_INCREMENT PRIMARY KEY,
    chave VARCHAR(100) NOT NULL,
    valor TEXT,
    id_campo INT NOT NULL,
    id_empresa INT NOT NULL,
    FOREIGN KEY (id_campo) REFERENCES campo(id_campo) ON DELETE CASCADE,
    FOREIGN KEY (id_empresa) REFERENCES empresa(id_empresa) ON DELETE CASCADE
);