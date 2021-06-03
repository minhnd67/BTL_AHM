-- MySQL dump 10.13  Distrib 5.7.33, for Linux (x86_64)
--
-- Host: localhost    Database: catsecur_ahm
-- ------------------------------------------------------
-- Server version	5.7.33-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `catsecur_ahm`
--


--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` (`id`, `user_id`, `product_id`, `amount`) VALUES (1,2,2,1),(2,2,14,7),(3,3,12,2),(4,3,17,1),(19,1,1,0),(20,1,1,2),(25,1,8,1);
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `title`, `description`, `state`, `updated_at`, `created_at`) VALUES (1,'Kim cương viên','',1,'2021-05-16 04:28:37','2021-05-16 04:28:37'),(2,'Trang sức kim cương','',1,'2021-05-16 04:29:37','2021-05-16 04:29:37'),(3,'Trang sức đá màu','',1,'2021-05-16 04:29:58','2021-05-16 04:29:58'),(4,'Trang sức ngọc trai','',1,'2021-05-16 04:30:27','2021-05-16 04:30:27'),(5,'Trang sức cưới','',1,'2021-05-16 04:30:46','2021-05-16 04:30:46'),(6,'Trang sức trẻ','',1,'2021-05-16 04:31:07','2021-05-16 04:31:07'),(7,'Đồng hồ','',1,'2021-05-16 04:33:53','2021-05-16 04:33:53');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `user_id`, `product_id`, `content`, `updated_at`, `created_at`) VALUES (1,3,1,'Sản phẩm rất đẹp, giao hàng nhanh, đóng gói cẩn thận','2021-05-16 05:02:08','2021-05-16 05:02:08'),(2,2,5,'Sản phẩm rất đẹp, đóng gói cẩn thận','2021-05-16 05:03:23','2021-05-16 05:03:23'),(3,2,12,'Đỉnh của chóp','2021-05-16 07:05:24','2021-05-16 07:05:24'),(4,3,9,'Sang xịn mịn','2021-05-16 07:05:56','2021-05-16 07:05:56');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_banner`
--

DROP TABLE IF EXISTS `image_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_banner` (
  `id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `state` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_banner`
--

LOCK TABLES `image_banner` WRITE;
/*!40000 ALTER TABLE `image_banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `image_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_category`
--

DROP TABLE IF EXISTS `image_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `state` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `image_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_category`
--

LOCK TABLES `image_category` WRITE;
/*!40000 ALTER TABLE `image_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `image_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_comment`
--

DROP TABLE IF EXISTS `image_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_comment` (
  `id` int(11) DEFAULT NULL,
  `comment_id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  KEY `comment_id` (`comment_id`),
  CONSTRAINT `image_comment_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_comment`
--

LOCK TABLES `image_comment` WRITE;
/*!40000 ALTER TABLE `image_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `image_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_product`
--

DROP TABLE IF EXISTS `image_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `state` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `image_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_product`
--

LOCK TABLES `image_product` WRITE;
/*!40000 ALTER TABLE `image_product` DISABLE KEYS */;
INSERT INTO `image_product` (`id`, `product_id`, `link`, `state`, `updated_at`, `created_at`) VALUES (1,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(31,2,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `image_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `amount`) VALUES (1,1,2,1),(2,1,14,2),(3,2,10,2);
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `user_id`, `state`, `updated_at`, `created_at`) VALUES (1,2,0,'2021-05-16 12:31:42','2021-05-16 07:15:59'),(2,3,0,'2021-05-16 12:32:07','2021-05-16 07:16:50');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `material` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `material`, `price`, `amount`, `state`, `updated_at`, `created_at`) VALUES (1,1,'KIM CƯƠNG VIÊN 0720DA7953I1','Cam kết 100% kim cương viên là Kim cương tự nhiên','Kim cương tự nhiên',26488000,10,1,'2021-05-16 04:35:13','2021-05-16 04:35:13'),(2,1,'KIM CƯƠNG VIÊN 0720DA7949I1','Cam kết 100% chính xác về trọng lượng, chất lượng, số khắc bằng lazer ','Kim cương tự nhiên',28888000,20,1,'2021-05-16 04:37:51','2021-05-16 04:37:51'),(4,2,'NHẪN KIM CƯƠNG DJR3095','100% Chuẩn xác về hàm lượng vàng. Tất cả các sản phẩm trang sức của DOJI được kiểm định chặt chẽ với','Vàng, Kim cương',49000000,10,1,'2021-05-16 04:40:13','2021-05-16 04:40:13'),(5,2,'MẶT DÂY KIM CƯƠNG DJP99','100% Chuẩn xác về hàm lượng vàng, kim cương','Vàng, Kim cương',37000000,10,1,'2021-05-16 04:40:13','2021-05-16 04:40:13'),(6,3,'MẶT DÂY RUBY GJP712','100% sản phẩm trang sức đá màu đều có đầy đủ kiểm định uy tín.','Đá tự nhiên',11999000,10,1,'2021-05-16 04:43:30','2021-05-16 04:43:30'),(7,3,'HOA TAI RUBY GJE712','100% sản phẩm trang sức đá màu đều có đầy đủ kiểm định uy tín.','Đá tự nhiên',9900000,30,1,'2021-05-16 04:46:05','2021-05-16 04:46:05'),(8,4,'NHẪN NGỌC TRAI AKOYA PJR168','100% sản phẩm trang sức ngọc trai đều có đầy đủ kiểm định uy tín.','Ngọc trai',15000000,30,1,'2021-05-16 04:47:40','2021-05-16 04:47:40'),(9,4,'MẶT DÂY NGỌC TRAI AKOYA PJP554','100% sản phẩm trang sức ngọc trai đều có đầy đủ kiểm định uy tín.','Ngọc trai',7000000,50,1,'2021-05-16 04:48:32','2021-05-16 04:48:32'),(10,5,'NHẪN CƯỚI MONO NWR766','Wedding Land - Thương hiệu trang sức cưới thuộc Tập đoàn Vàng bạc đá quý DOJI','Vàng',14900000,50,1,'2021-05-16 04:50:31','2021-05-16 04:50:31'),(11,5,'NHẪN CƯỚI SALSA NWR1574','Wedding Land - Thương hiệu trang sức cưới thuộc Tập đoàn Vàng bạc đá quý DOJI','Vàng',15700000,30,1,'2021-05-16 04:52:00','2021-05-16 04:52:00'),(12,6,'LẮC TAY 329-WG','100% chuẩn xác về trọng lượng vàng.','Vàng',3900000,100,1,'2021-05-16 04:53:11','2021-05-16 04:53:11'),(13,6,'MẶT DÂY YJP632','100% chuẩn xác về trọng lượng vàng.','Vàng',2900000,100,1,'2021-05-16 04:55:43','2021-05-16 04:55:43'),(14,7,'ĐỒNG HỒ EMPORIO ARMANI AR11100','Các sản phẩm đồng hồ được phân phối tại DOJI WATCH rất đa dạng về mẫu mã, chất lượng vượt trội','Đồng hồ',8000000,10,1,'2021-05-16 04:56:25','2021-05-16 04:56:25'),(15,7,'ĐỒNG HỒ EMPORIO ARMANI AR11100','ảo hành chính hãng và Chế độ hậu mãi vượt trội bởi đội ngũ Kỹ thuật viên được hãng đào tạo, với tran','Đồng hồ',6000000,100,1,'2021-05-16 04:58:10','2021-05-16 04:58:10'),(16,7,'ĐỒNG HỒ EMPORIO ARMANI AR11100','ảo hành chính hãng và Chế độ hậu mãi vượt trội ','Đồng hồ',6000000,100,1,'2021-05-16 04:58:10','2021-05-16 04:58:10'),(17,7,'ĐỒNG HỒ EMPORIO ARMANI AR11111','Bảo hành chính hãng và Chế độ hậu mãi vượt trội','Đồng hồ',9000000,10,1,'2021-05-16 04:59:31','2021-05-16 04:59:31');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `gender` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `gender`, `birthday`, `address`, `role`, `state`, `updated_at`, `created_at`) VALUES (1,'admin','admin@gmail.com','$2y$10$q//WTd8LbOtT2SRN9aabVOGaIPxp9rlHqN7gwWNnJX3SbSOG15uyu','0987654321',1,'2000-07-06','Hai Bà Trưng - Hà Nội',1,1,'2021-05-16 04:19:27','2021-05-16 04:19:27'),(2,'Nguyễn Văn A','client@gmail.com','client','0987654322',0,'2000-07-01','Lê Thanh Nghị - Đồng Tâm -Hai Bà Trưng - Hà Nội',0,1,'2021-05-16 04:23:03','2021-05-16 04:23:03'),(3,'Trần Đức B','client1@gmail.com','client1','0987654323',1,'2001-05-01','Nhân Chính - Thanh Xuân - Hà Nội',0,1,'2021-05-16 04:26:11','2021-05-16 04:26:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'catsecur_ahm'
--

--
-- Dumping routines for database 'catsecur_ahm'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-27 14:12:18
