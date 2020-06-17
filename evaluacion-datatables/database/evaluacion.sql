CREATE DATABASE `evaluacion`;

USE `evaluacion`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_padre` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `menu` (`id`, `menu_padre`, `nombre`, `descripcion`) VALUES
(1, NULL, 'Marcas', 'Lista de marcas de autos'),
(2, 1, 'SEAT', 'Marca seat'),
(3, 1, 'BMW', 'Marca bmw'),
(4, NULL, 'Catálogos', 'Lista de catálogos'),
(5, 4, 'Tipos de Archivos', 'Catalogo de archivos'),
(6, 4, 'Profesiones', 'Lista de profesiones'),
(7, NULL, 'Clientes', 'Lista de clientes'),
(8, 7, 'Liverpool', 'Cliente Liverpool'),
(9, 7, 'Palacio de Hierro', 'Cliente Palacio de Hierro');
