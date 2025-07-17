CREATE DATABASE desafio_revvo;

USE desafio_revvo;

CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(80) NOT NULL,
  image LONGTEXT NOT NULL,
  description varchar(500),
  url varchar(2083) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
