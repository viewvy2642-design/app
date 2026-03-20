-- สร้างฐานข้อมูล
CREATE DATABASE IF NOT EXISTS shop;
USE shop;

-- สร้างตาราง Products
CREATE TABLE IF NOT EXISTS Products (
  ProductID INT AUTO_INCREMENT PRIMARY KEY,
  ProductName VARCHAR(50) NOT NULL,
  Picture VARCHAR(100) NOT NULL,
  Category VARCHAR(50) NOT NULL,
  ProductDescription VARCHAR(250) NOT NULL,
  Price INT(4) NOT NULL,
  QuantityStock INT(3) NOT NULL
);

-- เพิ่มข้อมูลตัวอย่าง
INSERT INTO Products (ProductName, Picture, Category, ProductDescription, Price, QuantityStock) VALUES
('Amazon Echo', 'https://images-na.ssl-images-amazon.com/images/I/3179gtvccaL.jpg', 'Voice', 'Use your voice to control your smart devices.', 9999, 45),
('Smart Bulb LED', 'https://images-na.ssl-images-amazon.com/images/I/51FEw2zVPIL.jpg', 'Lighting', 'Smart WiFi LED bulb with color control.', 599, 120),
('Smart Plug', 'https://images-na.ssl-images-amazon.com/images/I/31n+-ZePXaL.jpg', 'Accessories', 'WiFi Smart Plug Socket with timer control.', 299, 200),
('Wireless Speaker', 'https://images-na.ssl-images-amazon.com/images/I/51bUoI3oj2L.jpg', 'Audio', 'Portable Bluetooth wireless speaker.', 1299, 78),
('Smart Door Lock', 'https://images-na.ssl-images-amazon.com/images/I/410HAbQCjEL.jpg', 'Security', 'Fingerprint and password smart door lock.', 2999, 32);
