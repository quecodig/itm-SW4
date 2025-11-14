-- Ensure the import session uses utf8mb4 so strings with accents are imported correctly
SET NAMES utf8mb4;
SET character_set_client = 'utf8mb4';
SET character_set_results = 'utf8mb4';
SET character_set_connection = 'utf8mb4';

CREATE DATABASE IF NOT EXISTS productos_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE productos_db;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO products (name, description, price, stock) VALUES
('Laptop', 'Laptop de alto rendimiento', 1200.00, 10),
('Mouse', 'Mouse inalámbrico', 25.50, 50),
('Teclado', 'Teclado mecánico', 75.00, 30),
('Monitor', 'Monitor 24 pulgadas Full HD', 180.00, 20),
('Auriculares', 'Auriculares con cancelación de ruido', 60.00, 15),
('Impresora', 'Impresora multifunción láser', 250.00, 8),
('Tablet', 'Tablet Android 10 pulgadas', 320.00, 12),
('Webcam', 'Webcam HD para videollamadas', 45.00, 25),
('Silla Gamer', 'Silla ergonómica para oficina y gaming', 210.00, 5),
('Disco SSD', 'Disco sólido SSD 1TB', 110.00, 18),
('Router WiFi', 'Router inalámbrico doble banda', 65.00, 22),
('Microfono USB', 'Micrófono profesional USB', 80.00, 14),
('Altavoces', 'Altavoces Bluetooth portátiles', 55.00, 17),
('Cámara de seguridad', 'Cámara IP para vigilancia', 95.00, 9),
('Smartwatch', 'Reloj inteligente compatible con iOS y Android', 150.00, 11);