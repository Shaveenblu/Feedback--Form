/*
 Navicat Premium Data Transfer

 Source Server         : PC
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : feedback_form

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 18/09/2024 10:26:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for customer_hotel
-- ----------------------------
DROP TABLE IF EXISTS `customer_hotel`;
CREATE TABLE `customer_hotel`  (
  `hotel_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED NOT NULL,
  INDEX `customer_hotel_hotel_id_foreign`(`hotel_id` ASC) USING BTREE,
  INDEX `customer_hotel_customer_id_foreign`(`customer_id` ASC) USING BTREE,
  CONSTRAINT `customer_hotel_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `customer_hotel_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer_hotel
-- ----------------------------
INSERT INTO `customer_hotel` VALUES (4, 3);
INSERT INTO `customer_hotel` VALUES (5, 3);
INSERT INTO `customer_hotel` VALUES (2, 5);
INSERT INTO `customer_hotel` VALUES (2, 8);
INSERT INTO `customer_hotel` VALUES (5, 8);

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `customers_unique_id_unique`(`unique_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (1, 'Bella', '0712651546', '26565PK', '5545824057', '2024-09-10 12:15:35', '2024-09-10 12:20:47');
INSERT INTO `customers` VALUES (2, 'Irene', '0715262645', '0542QOSKD', '0542905808', '2024-09-10 12:15:35', '2024-09-10 12:26:11');
INSERT INTO `customers` VALUES (3, 'Madeleine', '0716251856', '55514ROKS', 'SOWKD5457', '2024-09-10 12:15:35', '2024-09-10 12:25:42');
INSERT INTO `customers` VALUES (5, 'Alexandra', '0716251546', '5654uiwkd', '9741777407', '2024-09-10 12:15:36', '2024-09-10 12:20:01');
INSERT INTO `customers` VALUES (8, 'Dhanu', '0716242011', '29qMR7XLRF', 'ro1Ov9OzX', '2024-09-13 05:11:40', '2024-09-13 11:30:33');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for guide_tour
-- ----------------------------
DROP TABLE IF EXISTS `guide_tour`;
CREATE TABLE `guide_tour`  (
  `guide_id` bigint UNSIGNED NOT NULL,
  `tour_id` bigint UNSIGNED NOT NULL,
  INDEX `guide_tour_guide_id_foreign`(`guide_id` ASC) USING BTREE,
  INDEX `guide_tour_tour_id_foreign`(`tour_id` ASC) USING BTREE,
  CONSTRAINT `guide_tour_guide_id_foreign` FOREIGN KEY (`guide_id`) REFERENCES `guides` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `guide_tour_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of guide_tour
-- ----------------------------
INSERT INTO `guide_tour` VALUES (2, 7);
INSERT INTO `guide_tour` VALUES (4, 7);
INSERT INTO `guide_tour` VALUES (3, 5);
INSERT INTO `guide_tour` VALUES (2, 2);
INSERT INTO `guide_tour` VALUES (4, 4);

-- ----------------------------
-- Table structure for guides
-- ----------------------------
DROP TABLE IF EXISTS `guides`;
CREATE TABLE `guides`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `guid_first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guid_last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `guides_unique_id_unique`(`unique_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of guides
-- ----------------------------
INSERT INTO `guides` VALUES (1, 'John', 'Deo', 'DOWKDI4582', '2024-09-10 12:15:36', '2024-09-13 08:43:13');
INSERT INTO `guides` VALUES (2, 'James', 'John', 'HZDwnAaXEy', '2024-09-10 12:15:36', '2024-09-13 05:36:23');
INSERT INTO `guides` VALUES (3, 'Richard', 'Anthony', 'gmWt6xmnJD', '2024-09-10 12:15:36', '2024-09-13 05:38:14');
INSERT INTO `guides` VALUES (4, 'Ronald', 'Nicholas', 'EYIUmpujMe', '2024-09-10 12:15:36', '2024-09-13 05:38:43');
INSERT INTO `guides` VALUES (5, 'Jonathan', 'Gregory', 'ory1Xw3ZPD', '2024-09-10 12:15:36', '2024-09-13 05:39:06');

-- ----------------------------
-- Table structure for hotels
-- ----------------------------
DROP TABLE IF EXISTS `hotels`;
CREATE TABLE `hotels`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `hotels_unique_id_unique`(`unique_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hotels
-- ----------------------------
INSERT INTO `hotels` VALUES (1, 'The Sapphire Haven !', 'Riviera Bay, California Dream', 'ECLMNY2024', '2024-09-10 12:15:37', '2024-09-13 08:53:54');
INSERT INTO `hotels` VALUES (2, 'Gilded Harbor Inn', 'Silverport, Maine', 'GHISPM2024', '2024-09-10 12:15:37', '2024-09-10 12:32:07');
INSERT INTO `hotels` VALUES (3, 'Violet Springs Lodge', 'Bloomfield, Pennsylvania', 'VSLBFP2024', '2024-09-10 12:15:37', '2024-09-10 12:32:33');
INSERT INTO `hotels` VALUES (4, 'Crimson Canyon Resort', 'Redstone, Utah', 'CCRRUT2024', '2024-09-10 12:15:37', '2024-09-10 12:33:23');
INSERT INTO `hotels` VALUES (5, 'Serene Vista Hotel', 'Tranquil Valley, Arizona', 'SVHTTV2024', '2024-09-10 12:15:37', '2024-09-10 12:33:45');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2024_09_10_000001_create_customers_table', 1);
INSERT INTO `migrations` VALUES (7, '2024_09_10_000002_create_customer_hotel_table', 1);
INSERT INTO `migrations` VALUES (8, '2024_09_10_000003_create_guides_table', 1);
INSERT INTO `migrations` VALUES (9, '2024_09_10_000004_create_guide_tour_table', 1);
INSERT INTO `migrations` VALUES (10, '2024_09_10_000005_create_hotels_table', 1);
INSERT INTO `migrations` VALUES (11, '2024_09_10_000006_create_questions_table', 1);
INSERT INTO `migrations` VALUES (12, '2024_09_10_000007_create_question_categories_table', 1);
INSERT INTO `migrations` VALUES (13, '2024_09_10_000008_create_response_types_table', 1);
INSERT INTO `migrations` VALUES (14, '2024_09_10_000009_create_tours_table', 1);
INSERT INTO `migrations` VALUES (15, '2024_09_10_009001_add_foreigns_to_customer_hotel_table', 1);
INSERT INTO `migrations` VALUES (16, '2024_09_10_009002_add_foreigns_to_guide_tour_table', 1);
INSERT INTO `migrations` VALUES (17, '2024_09_10_009003_add_foreigns_to_questions_table', 1);
INSERT INTO `migrations` VALUES (18, '2024_09_10_080441_create_permission_tables', 1);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'list customers', 'web', '2024-09-10 12:15:30', '2024-09-10 12:15:30');
INSERT INTO `permissions` VALUES (2, 'view customers', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (3, 'create customers', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (4, 'update customers', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (5, 'delete customers', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (6, 'list guides', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (7, 'view guides', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (8, 'create guides', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (9, 'update guides', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (10, 'delete guides', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (11, 'list hotels', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (12, 'view hotels', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (13, 'create hotels', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (14, 'update hotels', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (15, 'delete hotels', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (16, 'list questions', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (17, 'view questions', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (18, 'create questions', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (19, 'update questions', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (20, 'delete questions', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (21, 'list questioncategories', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (22, 'view questioncategories', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (23, 'create questioncategories', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (24, 'update questioncategories', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (25, 'delete questioncategories', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (26, 'list responsetypes', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (27, 'view responsetypes', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (28, 'create responsetypes', 'web', '2024-09-10 12:15:31', '2024-09-10 12:15:31');
INSERT INTO `permissions` VALUES (29, 'update responsetypes', 'web', '2024-09-10 12:15:32', '2024-09-10 12:15:32');
INSERT INTO `permissions` VALUES (30, 'delete responsetypes', 'web', '2024-09-10 12:15:32', '2024-09-10 12:15:32');
INSERT INTO `permissions` VALUES (31, 'list tours', 'web', '2024-09-10 12:15:32', '2024-09-10 12:15:32');
INSERT INTO `permissions` VALUES (32, 'view tours', 'web', '2024-09-10 12:15:32', '2024-09-10 12:15:32');
INSERT INTO `permissions` VALUES (33, 'create tours', 'web', '2024-09-10 12:15:32', '2024-09-10 12:15:32');
INSERT INTO `permissions` VALUES (34, 'update tours', 'web', '2024-09-10 12:15:32', '2024-09-10 12:15:32');
INSERT INTO `permissions` VALUES (35, 'delete tours', 'web', '2024-09-10 12:15:32', '2024-09-10 12:15:32');
INSERT INTO `permissions` VALUES (36, 'list roles', 'web', '2024-09-10 12:15:32', '2024-09-10 12:15:32');
INSERT INTO `permissions` VALUES (37, 'view roles', 'web', '2024-09-10 12:15:32', '2024-09-10 12:15:32');
INSERT INTO `permissions` VALUES (38, 'create roles', 'web', '2024-09-10 12:15:32', '2024-09-10 12:15:32');
INSERT INTO `permissions` VALUES (39, 'update roles', 'web', '2024-09-10 12:15:33', '2024-09-10 12:15:33');
INSERT INTO `permissions` VALUES (40, 'delete roles', 'web', '2024-09-10 12:15:33', '2024-09-10 12:15:33');
INSERT INTO `permissions` VALUES (41, 'list permissions', 'web', '2024-09-10 12:15:33', '2024-09-10 12:15:33');
INSERT INTO `permissions` VALUES (42, 'view permissions', 'web', '2024-09-10 12:15:33', '2024-09-10 12:15:33');
INSERT INTO `permissions` VALUES (43, 'create permissions', 'web', '2024-09-10 12:15:33', '2024-09-10 12:15:33');
INSERT INTO `permissions` VALUES (44, 'update permissions', 'web', '2024-09-10 12:15:33', '2024-09-10 12:15:33');
INSERT INTO `permissions` VALUES (45, 'delete permissions', 'web', '2024-09-10 12:15:33', '2024-09-10 12:15:33');
INSERT INTO `permissions` VALUES (46, 'list users', 'web', '2024-09-10 12:15:33', '2024-09-10 12:15:33');
INSERT INTO `permissions` VALUES (47, 'view users', 'web', '2024-09-10 12:15:33', '2024-09-10 12:15:33');
INSERT INTO `permissions` VALUES (48, 'create users', 'web', '2024-09-10 12:15:33', '2024-09-10 12:15:33');
INSERT INTO `permissions` VALUES (49, 'update users', 'web', '2024-09-10 12:15:33', '2024-09-10 12:15:33');
INSERT INTO `permissions` VALUES (50, 'delete users', 'web', '2024-09-10 12:15:33', '2024-09-10 12:15:33');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for question_categories
-- ----------------------------
DROP TABLE IF EXISTS `question_categories`;
CREATE TABLE `question_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `question_categories_unique_id_unique`(`unique_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of question_categories
-- ----------------------------
INSERT INTO `question_categories` VALUES (3, 'HOTEL STANDARDS', '0mguJEMmkf', '2024-09-10 12:15:38', '2024-09-13 09:18:38');
INSERT INTO `question_categories` VALUES (4, 'DRIVER GUID', 'eabFxcUqhg', '2024-09-10 12:15:38', '2024-09-13 05:49:36');
INSERT INTO `question_categories` VALUES (5, 'TRANSPORT', 'qyG3XRiEWU', '2024-09-10 12:15:38', '2024-09-13 05:49:59');
INSERT INTO `question_categories` VALUES (6, 'GENERAL', 'oy6ZbfjvQP', '2024-09-10 12:15:38', '2024-09-13 05:50:17');

-- ----------------------------
-- Table structure for questions
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_category_id` bigint UNSIGNED NOT NULL,
  `unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `questions_unique_id_unique`(`unique_id` ASC) USING BTREE,
  INDEX `questions_question_category_id_foreign`(`question_category_id` ASC) USING BTREE,
  CONSTRAINT `questions_question_category_id_foreign` FOREIGN KEY (`question_category_id`) REFERENCES `question_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of questions
-- ----------------------------
INSERT INTO `questions` VALUES (1, '4. Is jQuery a JavaScript or JSON library file?', 6, 'NNJEvpDTlK', '2024-09-10 12:15:38', '2024-09-13 09:11:23');
INSERT INTO `questions` VALUES (3, '5. Does jQuery work for both HTML and XML documents?', 3, 'Zv2x4x6w54', '2024-09-10 12:15:38', '2024-09-13 09:12:29');
INSERT INTO `questions` VALUES (4, '7. What is the $() function in the jQuery library?', 4, 'xsbOONhU2B', '2024-09-10 12:15:38', '2024-09-13 09:12:42');
INSERT INTO `questions` VALUES (5, '9. What is the exact difference between the methods onload() and document.ready()?', 5, 'i8V0EbkNtG', '2024-09-10 12:15:38', '2024-09-13 09:12:55');
INSERT INTO `questions` VALUES (6, '3.What is jQuery used for?', 6, 'xzR5hRwvY', '2024-09-13 09:13:19', '2024-09-13 09:13:30');

-- ----------------------------
-- Table structure for response_types
-- ----------------------------
DROP TABLE IF EXISTS `response_types`;
CREATE TABLE `response_types`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `response_types_unique_id_unique`(`unique_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of response_types
-- ----------------------------
INSERT INTO `response_types` VALUES (1, 'Unsatisfactory', 'TRRSC2024', '2024-09-10 12:15:38', '2024-09-13 09:24:52');
INSERT INTO `response_types` VALUES (2, 'Yes', 'OBLCH2024', '2024-09-10 12:15:38', '2024-09-13 09:25:06');
INSERT INTO `response_types` VALUES (3, 'Excelent', 'MCSSCK2024', '2024-09-10 12:15:39', '2024-09-13 09:24:07');
INSERT INTO `response_types` VALUES (4, 'Good', 'CCRRUT2024', '2024-09-10 12:15:39', '2024-09-13 09:24:17');
INSERT INTO `response_types` VALUES (5, 'Satisfactory', 'SVHTTV2024', '2024-09-10 12:15:39', '2024-09-13 09:24:31');
INSERT INTO `response_types` VALUES (6, 'No', 'zdYfCJ0Kq', '2024-09-13 09:25:14', '2024-09-13 09:25:14');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (1, 2);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (2, 2);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (3, 2);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (4, 2);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (5, 2);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (6, 2);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (7, 2);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (8, 2);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (9, 2);
INSERT INTO `role_has_permissions` VALUES (10, 1);
INSERT INTO `role_has_permissions` VALUES (10, 2);
INSERT INTO `role_has_permissions` VALUES (11, 1);
INSERT INTO `role_has_permissions` VALUES (11, 2);
INSERT INTO `role_has_permissions` VALUES (12, 1);
INSERT INTO `role_has_permissions` VALUES (12, 2);
INSERT INTO `role_has_permissions` VALUES (13, 1);
INSERT INTO `role_has_permissions` VALUES (13, 2);
INSERT INTO `role_has_permissions` VALUES (14, 1);
INSERT INTO `role_has_permissions` VALUES (14, 2);
INSERT INTO `role_has_permissions` VALUES (15, 1);
INSERT INTO `role_has_permissions` VALUES (15, 2);
INSERT INTO `role_has_permissions` VALUES (16, 1);
INSERT INTO `role_has_permissions` VALUES (16, 2);
INSERT INTO `role_has_permissions` VALUES (17, 1);
INSERT INTO `role_has_permissions` VALUES (17, 2);
INSERT INTO `role_has_permissions` VALUES (18, 1);
INSERT INTO `role_has_permissions` VALUES (18, 2);
INSERT INTO `role_has_permissions` VALUES (19, 1);
INSERT INTO `role_has_permissions` VALUES (19, 2);
INSERT INTO `role_has_permissions` VALUES (20, 1);
INSERT INTO `role_has_permissions` VALUES (20, 2);
INSERT INTO `role_has_permissions` VALUES (21, 1);
INSERT INTO `role_has_permissions` VALUES (21, 2);
INSERT INTO `role_has_permissions` VALUES (22, 1);
INSERT INTO `role_has_permissions` VALUES (22, 2);
INSERT INTO `role_has_permissions` VALUES (23, 1);
INSERT INTO `role_has_permissions` VALUES (23, 2);
INSERT INTO `role_has_permissions` VALUES (24, 1);
INSERT INTO `role_has_permissions` VALUES (24, 2);
INSERT INTO `role_has_permissions` VALUES (25, 1);
INSERT INTO `role_has_permissions` VALUES (25, 2);
INSERT INTO `role_has_permissions` VALUES (26, 1);
INSERT INTO `role_has_permissions` VALUES (26, 2);
INSERT INTO `role_has_permissions` VALUES (27, 1);
INSERT INTO `role_has_permissions` VALUES (27, 2);
INSERT INTO `role_has_permissions` VALUES (28, 1);
INSERT INTO `role_has_permissions` VALUES (28, 2);
INSERT INTO `role_has_permissions` VALUES (29, 1);
INSERT INTO `role_has_permissions` VALUES (29, 2);
INSERT INTO `role_has_permissions` VALUES (30, 1);
INSERT INTO `role_has_permissions` VALUES (30, 2);
INSERT INTO `role_has_permissions` VALUES (31, 1);
INSERT INTO `role_has_permissions` VALUES (31, 2);
INSERT INTO `role_has_permissions` VALUES (32, 1);
INSERT INTO `role_has_permissions` VALUES (32, 2);
INSERT INTO `role_has_permissions` VALUES (33, 1);
INSERT INTO `role_has_permissions` VALUES (33, 2);
INSERT INTO `role_has_permissions` VALUES (34, 1);
INSERT INTO `role_has_permissions` VALUES (34, 2);
INSERT INTO `role_has_permissions` VALUES (35, 1);
INSERT INTO `role_has_permissions` VALUES (35, 2);
INSERT INTO `role_has_permissions` VALUES (36, 2);
INSERT INTO `role_has_permissions` VALUES (37, 2);
INSERT INTO `role_has_permissions` VALUES (38, 2);
INSERT INTO `role_has_permissions` VALUES (39, 2);
INSERT INTO `role_has_permissions` VALUES (40, 2);
INSERT INTO `role_has_permissions` VALUES (41, 2);
INSERT INTO `role_has_permissions` VALUES (42, 2);
INSERT INTO `role_has_permissions` VALUES (43, 2);
INSERT INTO `role_has_permissions` VALUES (44, 2);
INSERT INTO `role_has_permissions` VALUES (45, 2);
INSERT INTO `role_has_permissions` VALUES (46, 2);
INSERT INTO `role_has_permissions` VALUES (47, 2);
INSERT INTO `role_has_permissions` VALUES (48, 2);
INSERT INTO `role_has_permissions` VALUES (49, 2);
INSERT INTO `role_has_permissions` VALUES (50, 2);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'user', 'web', '2024-09-10 12:15:32', '2024-09-10 12:15:32');
INSERT INTO `roles` VALUES (2, 'super-admin', 'web', '2024-09-10 12:15:33', '2024-09-10 12:15:33');

-- ----------------------------
-- Table structure for tours
-- ----------------------------
DROP TABLE IF EXISTS `tours`;
CREATE TABLE `tours`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_operator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tour_start_date` date NOT NULL,
  `tour_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `tours_unique_id_unique`(`unique_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tours
-- ----------------------------
INSERT INTO `tours` VALUES (1, 'ScdJJtwRQ3', 'Capital Lanka Tours', 'Paris', '1972-12-29', 'Pbo3CMAemU', '2024-09-10 12:15:39', '2024-09-13 07:24:09');
INSERT INTO `tours` VALUES (2, 'SDrLkBa4WW', 'ASY Tours Sri Lanka', 'Bora Bora', '2009-06-09', 'tQ68pcYARQ', '2024-09-10 12:15:39', '2024-09-13 07:24:23');
INSERT INTO `tours` VALUES (3, 'ruPsPcQHBG', 'Ceylon Roots', 'Glacier National Park', '1978-10-28', 'TEm911j9XB', '2024-09-10 12:15:39', '2024-09-13 07:24:44');
INSERT INTO `tours` VALUES (4, 'RNuQf0YrN2', 'Walkers Tours', 'Rome', '2004-06-02', '29qMR7XLRF', '2024-09-10 12:15:39', '2024-09-13 07:24:57');
INSERT INTO `tours` VALUES (5, 'LA7Zk7Luuf', 'Olanka Travels', 'Swiss Alps', '1993-09-07', '03CLW29Mro', '2024-09-10 12:15:39', '2024-09-13 07:25:09');
INSERT INTO `tours` VALUES (7, 'H7a4f3A4E', 'Fuije', 'Make It Happen', '2024-10-02', 'WOKDIE90', '2024-09-13 10:14:24', '2024-09-13 10:14:24');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Salvador Barton', 'admin@admin.com', '2024-09-10 12:15:30', '$2y$12$L09ZrJT19ROo88SyJF4vouJgSwXHs8FuBiZJBvMAeD1gv0KWEiSz6', '9TjK2gkBwf', '2024-09-10 12:15:30', '2024-09-10 12:15:30');
INSERT INTO `users` VALUES (2, 'Darrel Leffler', 'simonis.sharon@nikolaus.com', '2024-09-10 12:15:39', '$2y$12$mpNiZ.j49knHveKhRspAIuXDPXLEut88zdDtCTuP9OPfkysaWCgFS', 'mWQmOQOamU', '2024-09-10 12:15:40', '2024-09-10 12:15:40');
INSERT INTO `users` VALUES (3, 'Dr. Rubye Kemmer I', 'dickens.jeramie@gmail.com', '2024-09-10 12:15:39', '$2y$12$YGwC2WEVhELQYCX3qLhi5.2a9PxC7j7ncjel/R8/.Ne.8uJnc0OOW', 'SZ80Xuy7LB', '2024-09-10 12:15:40', '2024-09-10 12:15:40');
INSERT INTO `users` VALUES (4, 'Vanessa Hamill IV', 'lonie22@hotmail.com', '2024-09-10 12:15:40', '$2y$12$lEOukp23w/n.oW0WHxH70uROuN42SSzDd9yAj/OGy6xArZMtlftqu', 'oS6Qw7bCHA', '2024-09-10 12:15:40', '2024-09-10 12:15:40');
INSERT INTO `users` VALUES (5, 'Maximilian Davis', 'kole.paucek@gmail.com', '2024-09-10 12:15:40', '$2y$12$ehx/lOsxH36n5jY764d2GOieRcbYZMaSSXYxi0HYAQdkbANjmK6Zi', '4oYyl8MrZY', '2024-09-10 12:15:40', '2024-09-10 12:15:40');
INSERT INTO `users` VALUES (6, 'Prof. Eleanore Kshlerin', 'raquel01@cummings.org', '2024-09-10 12:15:40', '$2y$12$HlDDiaIkVfD1i3veVaxXq.TYIklBlptUl5lf7wRDIbPQ26EVjpS2O', 'KmH3jfA1zF', '2024-09-10 12:15:40', '2024-09-10 12:15:40');

SET FOREIGN_KEY_CHECKS = 1;
