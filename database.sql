CREATE DATABASE petshelter_db;
USE petshelter_db;

CREATE TABLE animali (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(50) NOT NULL,
  specie VARCHAR(50) NOT NULL,
  eta INT NOT NULL,
  stato VARCHAR(20) DEFAULT 'disponibile'
);

INSERT INTO animali (nome, specie, eta, stato) VALUES 
('Buddy', 'Cane', 3, 'disponibile'),
('Luna', 'Gatto', 1, 'disponibile'),
('Oliver', 'Coniglio', 2, 'in osservazione');
