
-- Corrección de la base de datos 'gestorcompras'

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Eliminar tablas si existen para recrearlas
DROP TABLE IF EXISTS detalle;
DROP TABLE IF EXISTS compra;
DROP TABLE IF EXISTS proveedor;

-- Crear tabla 'compra' con llave primaria
CREATE TABLE compra (
  Cmp_ID INT(11) NOT NULL AUTO_INCREMENT,
  Cmp_Nombre VARCHAR(100) DEFAULT NULL,
  Cmp_Fecha DATE DEFAULT NULL,
  Cmp_Valor INT(11) DEFAULT NULL,
  Cmp_Descuento INT(11) DEFAULT NULL,
  Empl_ID INT(11) DEFAULT NULL,
  Prov_ID INT(11) DEFAULT NULL,
  PRIMARY KEY (Cmp_ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Crear tabla 'proveedor' con llave primaria
CREATE TABLE proveedor (
  Prov_ID INT(11) NOT NULL AUTO_INCREMENT,
  Prov_Nombre VARCHAR(100) DEFAULT NULL,
  Prov_Direccion VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (Prov_ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Crear tabla 'detalle' con llaves primarias y foráneas
CREATE TABLE detalle (
  Deta_ID INT(11) NOT NULL AUTO_INCREMENT,
  Deta_Valor DECIMAL(10, 2) DEFAULT NULL,
  Deta_Cantidad INT(11) DEFAULT NULL,
  Deta_Descripcion VARCHAR(255) DEFAULT NULL,
  Prod_ID INT(11) DEFAULT NULL,
  Cmp_ID INT(11) DEFAULT NULL,
  PRIMARY KEY (Deta_ID),
  FOREIGN KEY (Cmp_ID) REFERENCES compra(Cmp_ID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insertar datos en 'compra'
INSERT INTO compra (Cmp_Nombre, Cmp_Fecha, Cmp_Valor, Cmp_Descuento, Empl_ID, Prov_ID) VALUES
('Jose', '2023-05-14', 10000, 0, 12, 1);

-- Insertar datos en 'proveedor'
INSERT INTO proveedor (Prov_Nombre, Prov_Direccion) VALUES
('Proveedor1', 'Calle Falsa 123');

-- Insertar datos en 'detalle'
INSERT INTO detalle (Deta_Valor, Deta_Cantidad, Deta_Descripcion, Prod_ID, Cmp_ID) VALUES
(10000, 1, 'Producto A', 1, 1);

COMMIT;
