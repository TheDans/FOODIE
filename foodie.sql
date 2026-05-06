DROP DATABASE IF EXISTS foodie;
CREATE DATABASE foodie;
USE foodie;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- =========================
-- ADMINS
-- =========================
CREATE TABLE admins (
  adminID CHAR(5) NOT NULL,
  adminName VARCHAR(200) NOT NULL,
  adminGender CHAR(1) NOT NULL,
  adminPhoneNo VARCHAR(20) NOT NULL,
  username VARCHAR(12) NOT NULL,
  adminIcNo CHAR(12) NOT NULL,
  adminEmail VARCHAR(50) NOT NULL,
  password VARCHAR(100) DEFAULT NULL,
  adminImage VARCHAR(255) DEFAULT NULL,
  is_active TINYINT(1) DEFAULT 1,
  PRIMARY KEY (adminID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================
-- BUILDINGS
-- =========================
CREATE TABLE buildings (
  buildingID CHAR(5) NOT NULL,
  buildingName VARCHAR(10) NOT NULL,
  PRIMARY KEY (buildingID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================
-- STUDENTS
-- =========================
CREATE TABLE students (
  studID INT(11) NOT NULL AUTO_INCREMENT,
  studName VARCHAR(200) NOT NULL,
  studGender CHAR(1) NOT NULL,
  studPhoneNo VARCHAR(20) DEFAULT NULL,
  MatricNo CHAR(10) NOT NULL,
  studIcNo CHAR(12) NOT NULL,
  studEmail VARCHAR(50) NOT NULL,
  password VARCHAR(255) DEFAULT NULL,
  user_image VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (studID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================
-- PROD TYPES
-- =========================
CREATE TABLE prodtypes (
  typeID CHAR(5) NOT NULL,
  typeName VARCHAR(45) NOT NULL,
  typeDesc VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (typeID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================
-- PRODUCTS
-- =========================
CREATE TABLE products (
  prodID CHAR(5) NOT NULL,
  prodName VARCHAR(45) NOT NULL,
  price DECIMAL(4,2) NOT NULL,
  prodDesc VARCHAR(45) NOT NULL,
  typeID CHAR(5) NOT NULL,
  is_active TINYINT(4) DEFAULT 1,
  images VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (prodID),
  KEY typeID (typeID),
  CONSTRAINT fk_products_type
    FOREIGN KEY (typeID) REFERENCES prodtypes(typeID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================
-- ORDERS
-- =========================
CREATE TABLE orders (
  orderID CHAR(5) NOT NULL,
  orderDate DATE NOT NULL,
  deliveryDate DATE NOT NULL,
  dormLevel VARCHAR(2) NOT NULL,
  dormNo VARCHAR(2) NOT NULL,
  buildingID CHAR(5) NOT NULL,
  studID INT(11) NOT NULL,
  adminID CHAR(5) NOT NULL,
  status VARCHAR(15) NOT NULL,
  PRIMARY KEY (orderID),
  KEY buildingID (buildingID),
  KEY studID (studID),
  KEY adminID (adminID),
  CONSTRAINT fk_orders_building
    FOREIGN KEY (buildingID) REFERENCES buildings(buildingID),
  CONSTRAINT fk_orders_student
    FOREIGN KEY (studID) REFERENCES students(studID),
  CONSTRAINT fk_orders_admin
    FOREIGN KEY (adminID) REFERENCES admins(adminID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================
-- ORDER DETAILS
-- =========================
CREATE TABLE orderdetails (
  detailID CHAR(5) NOT NULL,
  quantity VARCHAR(2) NOT NULL,
  orderID CHAR(5) NOT NULL,
  prodID CHAR(5) NOT NULL,
  PRIMARY KEY (detailID),
  KEY orderID (orderID),
  KEY prodID (prodID),
  CONSTRAINT fk_orderdetails_order
    FOREIGN KEY (orderID) REFERENCES orders(orderID),
  CONSTRAINT fk_orderdetails_product
    FOREIGN KEY (prodID) REFERENCES products(prodID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================
-- CART ORDERS (cart_o)
-- =========================
CREATE TABLE cart_o (
  orderID CHAR(5) NOT NULL,
  orderDate DATE NOT NULL,
  deliveryDate DATE NOT NULL,
  dormLevel VARCHAR(2) NOT NULL,
  dormNo VARCHAR(2) NOT NULL,
  buildingID CHAR(5) NOT NULL,
  studID INT(11) NOT NULL,
  adminID CHAR(5) NOT NULL,
  status VARCHAR(15) NOT NULL,
  PRIMARY KEY (orderID),
  KEY buildingID (buildingID),
  KEY studID (studID),
  KEY adminID (adminID),
  CONSTRAINT fk_carto_building
    FOREIGN KEY (buildingID) REFERENCES buildings(buildingID),
  CONSTRAINT fk_carto_student
    FOREIGN KEY (studID) REFERENCES students(studID),
  CONSTRAINT fk_carto_admin
    FOREIGN KEY (adminID) REFERENCES admins(adminID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =========================
-- CART ORDER DETAILS (cart_od)
-- =========================
CREATE TABLE cart_od (
  detailID CHAR(5) NOT NULL,
  quantity VARCHAR(2) NOT NULL,
  orderID CHAR(5) NOT NULL,
  prodID CHAR(5) NOT NULL,
  PRIMARY KEY (detailID),
  KEY orderID (orderID),
  KEY prodID (prodID),
  CONSTRAINT fk_cartod_order
    FOREIGN KEY (orderID) REFERENCES cart_o(orderID),
  CONSTRAINT fk_cartod_product
    FOREIGN KEY (prodID) REFERENCES products(prodID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;