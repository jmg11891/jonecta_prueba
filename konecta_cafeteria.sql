/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : konecta_cafeteria

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 08/01/2022 20:08:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `estado` enum('activo','eliminado') CHARACTER SET latin1 COLLATE latin1_spanish_ci NULL DEFAULT 'activo',
  `fecha_creacion` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'Bebidas', 'activo', '2022-01-08 17:51:59');
INSERT INTO `categorias` VALUES (2, 'Postres', 'activo', '2022-01-08 17:52:03');
INSERT INTO `categorias` VALUES (3, 'Cocteles', 'activo', '2022-01-08 17:52:16');
INSERT INTO `categorias` VALUES (4, 'Dulces', 'activo', '2022-01-08 17:52:19');
INSERT INTO `categorias` VALUES (5, 'Comidas', 'activo', '2022-01-08 17:52:55');

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `referencia` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `precio` decimal(11, 2) NOT NULL,
  `stock` decimal(11, 2) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `estado` enum('activo','eliminado') CHARACTER SET latin1 COLLATE latin1_spanish_ci NULL DEFAULT 'activo',
  `fecha_creacion` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `fecha_modificacion` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES (1, 'prueba editado', 'ref1', 2.00, 100.00, 1, 'eliminado', '2022-01-08 23:57:14', '2022-01-09 00:45:00');
INSERT INTO `productos` VALUES (2, 'prueba editado', 'ref12435', 2.00, 100.00, 4, 'eliminado', '2022-01-08 23:58:05', '2022-01-09 00:45:11');
INSERT INTO `productos` VALUES (3, 'producto 1', 'ref 1', 1.00, 100.00, 1, 'eliminado', '2022-01-08 23:59:45', '2022-01-09 00:45:42');
INSERT INTO `productos` VALUES (4, 'nuevo', 'ref 309', 12.00, 1234.00, 3, 'activo', '2022-01-09 00:45:38', '2022-01-09 00:45:38');
