
CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    created_at DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL,
    avatar VARCHAR(255) DEFAULT NULL
);

INSERT INTO customers (full_name, email, phone, created_at) VALUES
('Gene Peralta', 'gene.peralta@gmail.com', '1234-5678', '2026-09-14 09:00:00'),
('Marcus Encabo', 'marcus.encabo@example.com', '2468-1012', '2026-09-14 09:05:00'),
('Sofia Martinez', 'sofia.martinez@example.com', '3691-2184', '2026-09-14 09:10:00'),
('Ethan Batumbakal', 'ethan.batumbakal@example.com', '555-0104', '2026-09-14 09:15:00'),
('Nora Awnor', 'nora.awnor@example.com', '555-0105', '2026-09-14 09:20:00');

INSERT INTO users (username, full_name, created_at) VALUES
('gene.peralta', 'Gene Peralta', '2026-09-14 09:00:00'),
('marcus.encabo', 'Marcus Encabo', '2026-09-14 09:05:00'),
('sofia.martinez', 'Sofia Martinez', '2026-09-14 09:10:00'),
('ethan.batumbakal', 'Ethan Batumbakal', '2026-09-14 09:15:00'),
('nora.awnor', 'Nora Awnor', '2026-09-14 09:20:00');