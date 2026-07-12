-- SuperLand database for Wampserver/XAMPP and phpMyAdmin
-- Database name: superland_db
-- Import this file before running the project
-- Default admin login:
--   Email: admin@superland.com
--   Password: admin123
-- Default user login:
--   Email: user@superland.com
--   Password: user123

CREATE DATABASE IF NOT EXISTS `superland_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `superland_db`;

SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `cart`;
DROP TABLE IF EXISTS `order`;
DROP TABLE IF EXISTS `tblproduct`;
DROP TABLE IF EXISTS `tbl_category`;
DROP TABLE IF EXISTS `tbluser`;
DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL DEFAULT 'Yes',
  `active` varchar(10) NOT NULL DEFAULT 'Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tblproduct` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(150) NOT NULL,
  `category` varchar(100) NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `cart` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `imagePath` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `number` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `method` varchar(50) NOT NULL,
  `flat` varchar(150) NOT NULL,
  `street` varchar(150) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `pin_code` varchar(30) NOT NULL,
  `total_products` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_admin` (`full_name`, `username`, `email`, `password`) VALUES
('SuperLand Admin', 'admin', 'admin@superland.com', '0192023a7bbd73250516f069df18b500');

INSERT INTO `tbluser` (`username`, `email`, `password`, `image`) VALUES
('Test User', 'user@superland.com', 'user123', 'png-clipart-computer-icons-avatar-icon-design-avatar-heroes-computer-wallpaper.png');

INSERT INTO `tbl_category` (`title`, `image_name`, `featured`, `active`) VALUES
('Fruits', 'assets/images/categories/FRUIT.jpg', 'Yes', 'Yes'),
('Vegetables', 'assets/images/categories/VEGE.jpg', 'Yes', 'Yes'),
('Meats', 'assets/images/categories/MEATS.jpg', 'Yes', 'Yes'),
('Fish', 'assets/images/categories/Seafoods_Fish_Food_495519.jpg', 'Yes', 'Yes'),
('Bakery', 'assets/images/categories/BAKERY.jfif', 'Yes', 'Yes'),
('Snacks', 'assets/images/categories/SNACKS111.jpg', 'Yes', 'Yes');

INSERT INTO `tblproduct` (`productName`, `category`, `imagePath`, `price`, `email`) VALUES
('Banana', 'Fruits', 'assets/images/products/banana.png', 120.00, 'admin@superland.com'),
('Apple', 'Fruits', 'assets/images/products/apple.png', 180.00, 'admin@superland.com'),
('Grapes', 'Fruits', 'assets/images/products/Grapes.jpg', 450.00, 'admin@superland.com'),
('Pineapple', 'Fruits', 'assets/images/products/Pineapple.jpg', 350.00, 'admin@superland.com'),
('Cabbage', 'Vegetables', 'assets/images/products/cabbage.jpeg', 160.00, 'admin@superland.com'),
('Capsicum', 'Vegetables', 'assets/images/products/capsicum.jpeg', 220.00, 'admin@superland.com'),
('Carrot', 'Vegetables', 'assets/images/products/carrote..jpg', 200.00, 'admin@superland.com'),
('Potato', 'Vegetables', 'assets/images/products/potato.jpeg', 170.00, 'admin@superland.com'),
('Chicken', 'Meats', 'assets/images/products/chicken.png', 1200.00, 'admin@superland.com'),
('Beef Steak', 'Meats', 'assets/images/products/beaf steak.png', 1800.00, 'admin@superland.com'),
('Fish', 'Fish', 'assets/images/products/oily fishes.png', 900.00, 'admin@superland.com'),
('Bakery Item', 'Bakery', 'assets/images/categories/BAKERY.jfif', 250.00, 'admin@superland.com');

SET FOREIGN_KEY_CHECKS=1;
