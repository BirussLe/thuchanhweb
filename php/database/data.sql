

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbhangdt
-- ----------------------------
DROP TABLE IF EXISTS `tbhangdt`;
CREATE TABLE `tbhangdt`  (
  `id_hangdt` int(11) NOT NULL,
  `tenhang` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_hangdt`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbhangdt
-- ----------------------------
INSERT INTO `tbhangdt` VALUES (0, 'Apple');
INSERT INTO `tbhangdt` VALUES (1, 'Samsung');
INSERT INTO `tbhangdt` VALUES (2, 'Sony');
INSERT INTO `tbhangdt` VALUES (3, 'Nokia');

-- ----------------------------
-- Table structure for tbnhomsanpham
-- ----------------------------
DROP TABLE IF EXISTS `tbnhomsanpham`;
CREATE TABLE `tbnhomsanpham`  (
  `id_nhom` int(11) NOT NULL,
  `tennhom` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_nhom`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbnhomsanpham
-- ----------------------------
INSERT INTO `tbnhomsanpham` VALUES (0, 'Điện thoại');
INSERT INTO `tbnhomsanpham` VALUES (1, 'Phụ kiện');

-- ----------------------------
-- Table structure for tbsanpham
-- ----------------------------
DROP TABLE IF EXISTS `tbsanpham`;
CREATE TABLE `tbsanpham`  (
  `id_sanpham` int(11) NOT NULL,
  `id_hangdt` int(11) NOT NULL,
  `id_nhom` int(11) NOT NULL,
  `tensp` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mota` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hinhsp` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `khuyenmai` int(11) NOT NULL,
  `new` int(11) NOT NULL,
  `seo` int(11) NOT NULL,
  PRIMARY KEY (`id_sanpham`) USING BTREE,
  INDEX `tbsanpham_ibfk_2`(`id_nhom`) USING BTREE,
  INDEX `tbsanpham_ibfk_5`(`id_hangdt`) USING BTREE,
  CONSTRAINT `tbsanpham_ibfk_2` FOREIGN KEY (`id_nhom`) REFERENCES `tbnhomsanpham` (`id_nhom`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `tbsanpham_ibfk_5` FOREIGN KEY (`id_hangdt`) REFERENCES `tbhangdt` (`id_hangdt`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbsanpham
-- ----------------------------
INSERT INTO `tbsanpham` VALUES (0, 0, 0, 'Iphone X', 'cảm giac thoải mái khi sử dụng', '0.jpg', 26497000, 1, 0, 1, 1);
INSERT INTO `tbsanpham` VALUES (1, 1, 0, 'Samsung Galaxy Note 9999', '1', '1.jpg', 22000000, 1, 30, 1, 1);
INSERT INTO `tbsanpham` VALUES (2, 0, 0, 'Iphone 8 Plus', '1', '2.jpg', 23000000, 1, 5, 1, 1);
INSERT INTO `tbsanpham` VALUES (5, 0, 0, 'Iphone 6', '1', '5.jpg', 6800000, 1, 15, 0, 0);
INSERT INTO `tbsanpham` VALUES (7, 1, 1, 'Samsung Galaxy S9', '1', '7.jpg', 17900000, 1, 10, 1, 1);
INSERT INTO `tbsanpham` VALUES (8, 3, 0, 'Nokia 5', '1', '8.jpg', 4500000, 1, 5, 1, 0);
INSERT INTO `tbsanpham` VALUES (10, 0, 1, 'Iphone Xs Max', '1', '10.jpg', 35000000, 1, 5, 1, 1);

SET FOREIGN_KEY_CHECKS = 1;
