-- NovaShop Gallery Database Backup
-- Generated: 2026-03-14 02:00:01

CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(50),
  email VARCHAR(100),
  password_hash VARCHAR(255),
  role VARCHAR(20)
);

INSERT INTO users (id, username, email, password_hash, role) VALUES
(1, 'admin', 'admin@novashopgallery.example', '$2y$10$Fake00000000000000000000000000000000000000', 'administrator'),
(2, 'jsmith', 'jsmith@novashopgallery.example', '$2y$10$Fake11111111111111111111111111111111111111', 'customer'),
(3, 'mchen', 'mchen@novashopgallery.example', '$2y$10$Fake22222222222222222222222222222222222222', 'customer');
