-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2023 at 09:27 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drabdelrazek`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `roles_name`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 'ahmed@gmail.com', NULL, '$2y$10$1KlsjH6ifLTdAVvjUyv4duqdYnypH.Y./uCrL4UvyIPL5CUc8T/I2', '[\"admin\"]', 'MP0qZN7YcKWFTUzGWvChY738gu4BTdeURw8vMjEv84Ew2q5fZj6EsZQ34IId', 1, NULL, '2023-02-19 20:16:04'),
(2, 'muhammad nour', 'muhammad.nour111@gmail.com', NULL, '$2y$10$p/jaTeCfGwuhOBUuo1s23.9yg5XZx/LJXjsYyOM8WWqYb8ecivEFe', '[\"owner\"]', 'WFucFnx9NdnFRppMqHMbie5N0PNKHriS6cx6kctRzKnb3Twi6x8QUyjayTXa', 1, NULL, '2023-02-04 21:12:11'),
(3, 'ابا الحسن', 'a@gmail.com', NULL, '$2y$10$p/jaTeCfGwuhOBUuo1s23.9yg5XZx/LJXjsYyOM8WWqYb8ecivEFe', '[\"\\u0645\\u0634\\u0631\\u0641\"]', NULL, 1, '2023-08-07 17:15:10', '2023-08-07 17:15:10');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `governorate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` double NOT NULL,
  `weight` double NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `phone`, `governorate`, `city`, `height`, `weight`, `created_at`, `updated_at`) VALUES
(1, 'محمد نور محمد', '01151379295', 'القاهرة', 'مدينة نصر', 1.85, 75, '2023-09-22 23:04:42', '2023-09-22 23:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` bigint(20) NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title_ar`, `title_en`, `photo`, `date`, `description_ar`, `description_en`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'ارشادات عامة بعد العملية', '', 'blog/b-1-3.jpg', '2023-08-25', '<p>الأكل 5 - 6 وجبات أو أكثر يوميا وممنوع الوجبة الكبيرة </p>\r\n<p>الأكل جيد الطهي والمضغ جيدا وعدم البلع إلا بعد إتمام المضغ </p>\r\n<p>يفضل المشي بعد الأكل في الفترة الأولى بعد العملية</p>\r\n<p>ينصح بممارسة الرياضة بعد شهر من العملية</p>\r\nكل هذه التعليمات واكثر متاحه في برنامج متابعه ما بعد العملية بمركز الدكتور عبد الرازق محمد بالإضافة إلى المتابعة مع اللايف كوتش لتحديد السلوكيات الصحيحة بعد العملية لنجاح العملية بشكل كبير\r\nالمتابعة الدورية مع أخصائي التغذية بمركز دكتور عبد الرازق محمد ضمان نجاح العملية', '', 2, NULL, '2023-08-12 21:15:35', '2023-08-12 22:49:35'),
(2, 'نصائح قبل جراحات السمنة ', '', 'blog/b-1-2.jpg', '2023-09-20', '<p>\r\nالامتناع عن التدخين قبل العملية</p>\r\n<p>صيام ثمان ساعات قبل العملية أي الامتناع عن الأكل والشراب </p>\r\n<p>عدم تناول الأطعمة التي تحتوي على سعرات حرارية عالية</p>\r\n<p>إخبار الطبيب إذا كانت المريضة التي يجري لها العملية حامل</p>\r\n<p>شرب الماء والسوائل الدافئة بكثرة</p>\r\n<p>الاستعداد النفسي قبل إجراء العملية يعتبر من أفضل العوامل التي تؤدي إلى نجاح العملية</p>\r\n<p>يتم التأهيل والتحضير للعملية من خلال جلسات مع اللايف كوتش لمعرفه جميع الخطوات السابقة للعملية وهذا ما يتم بدقه في مركز دكتور عبد الرازق محمد</p>\r\n<p>عدم أخذ أي أدوية أو عقاقير إلا بأمر الطبيب</p>', '', 1, NULL, NULL, NULL),
(3, 'ما هي فوائد استخدام المنظار في عملية تكميم المعدة؟', '', 'blog/b-1-1.jpg', '2023-09-21', '<p>تسكين الآلام بعد العملية\r\nتقليص مدة الإقامة بالمستشفى\r\nعدم وجود جروح ظاهرة\r\nالتعافي بشكل أسرع والعودة إلى الحياة الطبيعية والعمل مقارنة بالجراحة المفتوحة التقليدية في البداية \r\nيعطي رؤية افضل وأدق للأعضاء الداخلية للجسم\r\n</p>\r\n', '', 1, NULL, NULL, NULL),
(4, 'fffffffffffffff', 'ffffffffffffffffff', 'blog/b-1-3.jpg', '2023-09-04', '7878', '7878', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches` (
  `id` bigint(20) NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name_ar`, `name_en`, `map`, `address_ar`, `address_en`, `description_ar`, `description_en`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة', 'Cairo', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13812.219136870468!2d31.3256533!3d30.0639641!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583f807dcfb8c7%3A0x9341ccff6aa52f12!2z2K_Zg9iq2YjYsSDYudio2K_Yp9mE2LHYp9iy2YIg2YXYrdmF2K8g2KXYs9iq2LTYp9ix2Yog2KzYsdin2K3Yp9iqINin2YTYs9mF2YbYqSDYp9mE2YXZgdix2LfYqSDZiNin2YTZhdmG2KfYuNmK2LE!5e0!3m2!1sen!2seg!4v1695678038461!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '18 شارع الطيران - مدينة نصر - فوق معرض سيارات الطيران - الدور الرابع بعد كنتاكي الطيران', '18 ش الطيران بمدينة نصر فوق معرض سيارات الطيران الدور الرابع بعد كنتاكي الطيران', 'الأحد و الثلاثاء من 3 حتي 10 مساءاً', 'الأحد و الثلاثاء من 3 حتي 10 مساءاً', 1, NULL, NULL, NULL),
(2, 'أكتوبر', 'october', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3456.4680274386105!2d30.953518884886748!3d29.96597668191095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjnCsDU3JzU3LjUiTiAzMMKwNTcnMDQuOCJF!5e0!3m2!1sar!2seg!4v1695677793334!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'مستشفي انفينيتي - ميدان فودافون .. مول انفينتى ..بجوار مستشفى اكتوبر المركزى - الدور الثاني', 'مستشفي انفينيتي - ميدان فودافون .. مول انفينتى ..بجوار مستشفى اكتوبر المركزى - الدور الثاني', 'السبت من 6 ل 9 مساءاً', '', 1, NULL, NULL, NULL),
(9, 'البحيرة', 'behera', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3423.8938023481996!2d30.666762299999995!3d30.889631700000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f63934a6fa5411%3A0x5bb8a1df2e255dae!2z2LnZitin2K_YqSDYr9mD2KrZiNixINi52KjYr9in2YTYsdin2LLZgiDZhdit2YXYryDYpdiz2KrYtNin2LHZiiDYp9mE2KzYsdin2K3YqSDYp9mE2LnYp9mF2Kkg2YjYp9mE2YXZhtin2LjZitixINmI2KfZhNiz2YXZhtip!5e0!3m2!1sen!2seg!4v1695748076893!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'ايتاي البارود – شارع محمود سامي البارودي – أمام مركز الياسمين الطبي أعلي صيدليه دإيناس محمد', 'ايتاي البارود – شارع محمود سامي البارودي – أمام مركز الياسمين الطبي أعلي صيدليه دإيناس محمد', 'الأثنين من 2 حتي 7 مساءاً', '1', 1, NULL, NULL, NULL),
(11, 'طنطا', 'tanta', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3427.5019445626804!2d31.0017339!3d30.7885552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7c90fbe4fca47%3A0x83fbc070b66c37af!2z2YXYs9iq2LTZgdmKINiv2KfYsSDYp9mE2YLZhdip!5e0!3m2!1sar!2seg!4v1695748171528!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'مستشفى كنانه منطقة الاستاد ش الجيش', 'مستشفى كنانه منطقة الاستاد ش الجيش', 'الجمعة من 4 حتي 7 مساءاً', '1', 1, NULL, NULL, NULL),
(12, 'كفر الشيخ', 'kafrelsheihk', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13662.6414910441!2d30.9502424!3d31.1191703!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7abe015dffbd3%3A0x84bbf4365db87b2b!2z2YXYs9iq2LTZgdmJINiq2K_Yp9mI2YogLSBUYWRhd2kgSG9zcGl0YWw!5e0!3m2!1sen!2seg!4v1695748229429!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'دوران ال٤٧امتداد ش المصنع بجوار كافيه نابولي', 'دوران ال٤٧امتداد ش المصنع بجوار كافيه نابولي', 'الأثنين من 10 حتي 12 ظهراً', 'الأثنين من 10 حتي 12 ظهراً', 1, NULL, NULL, NULL),
(13, 'الزقازيق', 'zagazige', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3434.0615996110737!2d31.4823822!3d30.604025699999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7f129aff13aad%3A0x8fdf3e5573a05f2c!2z2YXYs9iq2LTZgdmJINin2YTYp9mG2K_ZhNizINio2KfZhNiy2YLYp9iy2YrZgg!5e0!3m2!1sar!2seg!4v1695748197159!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'مستشفى الاندلس  طريق القنايات مقابل كارفور بعد موقف المنصورة', 'مستشفى الاندلس  طريق القنايات مقابل كارفور بعد موقف المنصورة', 'الخميس من 4 حتي 6 مساءاً', '1', 1, NULL, NULL, NULL),
(14, 'الإسكندرية', 'Alex', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3411.880885453075!2d29.949268499999995!3d31.2240293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f5c4ea3ae31c31%3A0xc3251b642513047c!2sRoyal%20Hospital!5e0!3m2!1sen!2seg!4v1695748143202!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" ></iframe>', '١٦ أ فريد بك تانى شارع يمين من خليل الخياط مصطفى كامل كفر عبده.المستشفي الملكي', '١٦ أ فريد بك تانى شارع يمين من خليل الخياط مصطفى كامل كفر عبده.المستشفي الملكي', '11', '11', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch_galleries`
--

DROP TABLE IF EXISTS `branch_galleries`;
CREATE TABLE `branch_galleries` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `code`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, 'الفوم المصرى', 'Egyptian foam', 1, 1, NULL, '2023-02-16 00:18:57', '2023-02-20 22:53:24'),
(8, 'فوم - تاجات', 'Foam - crowns', 2, 1, NULL, '2023-02-20 22:53:38', '2023-02-20 22:53:38'),
(9, 'فوم - زوايا', 'Foam corners', 3, 2, NULL, '2023-06-02 20:02:05', '2023-06-02 20:02:05'),
(10, 'الأوراك', 'Orac', 4, 2, NULL, '2023-06-07 20:25:25', '2023-06-07 20:25:25'),
(11, 'ستيل', 'e', 5, 2, NULL, '2023-06-07 20:26:04', '2023-06-07 20:26:04'),
(12, 'مرايات ديكور', 'f', 6, 2, NULL, '2023-06-07 21:13:00', '2023-06-07 21:13:00'),
(13, 'بلاطات ثرى دى', 'g', 7, 2, NULL, '2023-06-07 21:16:57', '2023-06-07 21:16:57'),
(14, 'بديل الرخام', 'h', 8, 2, NULL, '2023-06-07 20:25:25', '2023-06-07 20:25:25'),
(15, 'الفوم الصينى', 'i', 9, 2, NULL, '2023-06-07 20:26:04', '2023-06-07 20:26:04'),
(16, 'بديل الخشب', 'j', 10, 2, NULL, '2023-06-07 21:13:00', '2023-06-07 21:13:00'),
(17, 'باركيه Spc', 'k', 11, 2, NULL, '2023-06-07 21:16:57', '2023-06-07 21:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customs`
--

DROP TABLE IF EXISTS `customs`;
CREATE TABLE `customs` (
  `id` bigint(20) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customs`
--

INSERT INTO `customs` (`id`, `code`, `description_ar`, `description_en`, `photo`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'about', 'دكتور عبدالرازق محمد عضو هيئة تدريس بجامعة عين شمس العريقة بخبرة اكثر من ١٠ سنوات في جراحات السمنة المفرطة والمناظير وحاصل علي الدكتوراة في الجراحة والمناظير وعضو في كلية الجراحيين الملكية بانجلترا وعضو في عدة جمعيات مثل الفيدرالية الدولية لجراحات السمنة والجمعية المصرية لجراحات السمنة', NULL, 'breadcurmb/breadcurmb-1-1.jpg', 1, NULL, '2023-07-04 07:28:52', '2023-07-04 07:28:52'),
(2, 'secrets_photo', NULL, '', 'about/about-4-1.jpg', 1, NULL, '2023-07-04 07:28:52', '2023-07-04 07:28:52'),
(3, 'secret1', '<h2>Surprise your body with extra care.</h2>', NULL, '', 1, NULL, '2023-07-04 07:28:52', '2023-07-04 07:28:52'),
(4, 'secret2', 'Rapidiously evisculate user-centric functionalities for highly efficient interfaces. Competently leverage other\'s scalable technology before synergistic manufactured products.\n\n', NULL, '', 1, NULL, '2023-07-04 07:28:52', '2023-07-04 07:28:52'),
(5, 'secret3', 'CALL ANYTIME 24/7\n', NULL, '', 1, NULL, '2023-07-04 07:28:52', '2023-07-04 07:28:52'),
(6, 'secret4', NULL, NULL, '', 1, NULL, '2023-07-04 07:28:52', '2023-07-04 07:28:52'),
(7, 'secrets_video', 'https://www.youtube.com/watch?v=HAglC40pCg8', NULL, 'about/2.jpg', 1, NULL, '2023-07-04 07:28:52', '2023-07-04 07:28:52'),
(8, 'address', '374 William S Canning Blvd, Fall River MA 2721', NULL, '', 1, NULL, '2023-07-04 07:28:52', '2023-07-04 07:28:52'),
(9, 'address2', NULL, NULL, '', 1, NULL, '2023-07-04 07:28:52', '2023-07-04 07:28:52'),
(10, 'Appointment1', 'من السبت للأثنين - من 6 مساءاً حتي 10', 'من السبت للأثنين - من 6 مساءاً حتي 10 مساءاً', NULL, 1, NULL, '2023-08-29 20:47:18', '2023-08-29 20:47:18'),
(11, 'Appointment2', 'من الثلاثاء للخميس- من 3 مساءاً حتي 6', 'من الثلاثاء للخميس- من 3 مساءاً حتي 6 مساءاً', NULL, 1, NULL, '2023-08-29 20:49:53', '2023-08-29 20:49:53'),
(12, 'Appointment3', 'الجمعة - من 6 مساءاً حتي 10', 'الجمعة - من 6 مساءاً حتي 10 مساءاً', NULL, 1, NULL, '2023-08-29 20:51:15', '2023-08-29 20:51:15'),
(13, 'dr_name', 'د / عبدالرازق محمد', 'Dr.Abdelrazek mohammed', 'slider/2.jpg', 1, NULL, NULL, NULL),
(14, 'bio', 'دكتوراة في الجراحة والمناظير', 'دكتوراة في الجراحة والمناظير', NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\Models\\Admin', 2),
(7, 'App\\Models\\Admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
  `id` bigint(20) NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name_ar`, `name_en`, `photo`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 'jhj', 'hkjh', 'clients-2-270x145.png', 1, NULL, '2023-07-04 07:13:52', '2023-07-04 07:13:52'),
(4, 'kjlk', 'trgdgf', 'clients-1-270x145.png', 1, NULL, '2023-07-04 07:13:52', '2023-07-04 07:13:52'),
(5, 'jhjs', 'hkjhj', 'clients-3-270x145.png', 1, NULL, '2023-07-04 07:13:52', '2023-07-04 07:13:52'),
(6, 'kjlkg', 'trgdgfd', 'clients-4-270x145.png', 1, NULL, '2023-07-04 07:13:52', '2023-07-04 07:13:52'),
(7, 'jhjd', 'hkjhsa', 'clients-6-270x145.png', 1, NULL, '2023-07-04 07:13:52', '2023-07-04 07:13:52'),
(8, 'kjlkds', 'trgdgfas', 'clients-7-270x145.png', 1, NULL, '2023-07-04 07:13:52', '2023-07-04 07:13:52'),
(9, 'jhjssa', 'hkjhjaf', 'clients-5-270x145.png', 1, NULL, '2023-07-04 07:13:52', '2023-07-04 07:13:52'),
(10, 'kjlkga', 'trgdgfds', 'clients-8-270x145.png', 1, 2, '2023-07-04 07:13:52', '2023-08-13 09:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('muhammad.nour1111@gmail.com', '$2y$10$Q19..cD/r91R/b2L7S4QiewO6FKLjWpngEF6tiu7Aq1MhY/3Ioo9G', '2023-06-05 21:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('muhammad.nour111@gmail.com', '$2y$10$DLRJdfGy/HDLRuI2J5VnLuY6yQWPrNnBc5b1zNG4KRIGYp2zJUCma', '2023-03-20 20:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_keyyy` int(11) DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `foreign_keyyy`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'clients', NULL, 'admin', '2022-06-26 23:53:36', '2022-06-26 23:53:36'),
(4, 'suppliers', NULL, 'admin', '2022-06-26 23:53:37', '2022-06-26 23:53:37'),
(6, 'users', NULL, 'admin', '2022-06-26 23:53:37', '2022-06-26 23:53:37'),
(7, 'roles', NULL, 'admin', '2022-06-26 23:53:37', '2022-06-26 23:53:37'),
(14, 'customs', NULL, 'admin', '2023-06-18 19:57:11', '2023-06-18 19:57:11'),
(15, 'partners', NULL, 'admin', '2023-07-04 21:02:17', '2023-07-04 21:02:17'),
(16, 'projects', NULL, 'admin', '2023-07-04 22:28:07', '2023-07-04 22:28:07'),
(17, 'contacts', NULL, 'admin', '2023-07-05 20:05:44', '2023-07-05 20:05:44'),
(18, 'categories', NULL, 'admin', '2023-07-17 19:32:07', '2023-07-17 19:32:07'),
(20, 'add_category', 18, 'admin', '2023-07-17 19:33:00', '2023-07-17 19:33:00'),
(21, 'edit_category', 18, 'admin', '2023-07-17 19:33:22', '2023-07-17 19:33:22'),
(22, 'delete_category', 18, 'admin', '2023-07-17 19:56:04', '2023-07-17 19:56:04'),
(23, 'news', NULL, 'admin', '2023-07-18 21:13:33', '2023-07-18 21:13:33'),
(24, 'add_news', 23, 'admin', '2023-07-18 21:14:10', '2023-07-18 21:14:10'),
(25, 'edit_news', 23, 'admin', '2023-07-18 21:14:30', '2023-07-18 21:14:30'),
(26, 'delete_news', 23, 'admin', '2023-07-18 21:14:47', '2023-07-18 21:14:47'),
(27, 'products', NULL, 'admin', '2023-07-21 14:06:37', '2023-07-21 14:06:37'),
(28, 'add_products', 27, 'admin', NULL, NULL),
(29, 'edit_products', 27, 'admin', NULL, NULL),
(30, 'delete_products', 27, 'admin', NULL, NULL),
(31, 'branches', NULL, 'admin', NULL, NULL),
(32, 'add_branches', 31, 'admin', NULL, NULL),
(33, 'edit_branches', 31, 'admin', NULL, NULL),
(34, 'delete_branches', 31, 'admin', NULL, NULL),
(35, 'add_clients', 2, 'admin', '2023-08-05 19:50:09', '2023-08-05 19:50:09'),
(36, 'edit_clients', 2, 'admin', '2023-08-05 19:50:09', '2023-08-05 19:50:09'),
(37, 'delete_clients', 2, 'admin', '2023-08-05 19:50:09', '2023-08-05 19:50:09'),
(38, 'add_suppliers', 4, 'admin', '2023-08-05 19:57:24', '2023-08-05 19:57:24'),
(39, 'edit_suppliers', 4, 'admin', '2023-08-05 19:57:53', '2023-08-05 19:57:53'),
(40, 'delete_suppliers', 4, 'admin', '2023-08-05 19:58:13', '2023-08-05 19:58:13'),
(42, 'edit_customs', 14, 'admin', '2023-08-05 20:03:22', '2023-08-05 20:03:22'),
(44, 'add_partners', 15, 'admin', '2023-08-05 20:05:20', '2023-08-05 20:05:20'),
(45, 'edit_partners', 15, 'admin', '2023-08-05 20:06:45', '2023-08-05 20:06:45'),
(46, 'delete_partners', 15, 'admin', '2023-08-05 20:07:05', '2023-08-05 20:07:05'),
(47, 'add_projects', 16, 'admin', '2023-08-05 20:12:54', '2023-08-05 20:12:54'),
(48, 'edit_projects', 16, 'admin', '2023-08-05 20:13:34', '2023-08-05 20:13:34'),
(49, 'delete_projects', 16, 'admin', '2023-08-05 20:14:08', '2023-08-05 20:14:08'),
(50, 'add_contacts', 17, 'admin', '2023-08-05 20:14:48', '2023-08-05 20:14:48'),
(51, 'edit_contacts', 17, 'admin', '2023-08-05 20:15:20', '2023-08-05 20:15:20'),
(52, 'delete_contacts', 17, 'admin', '2023-08-05 20:15:54', '2023-08-05 20:15:54'),
(53, 'add_users', 6, 'admin', '2023-08-05 20:24:58', '2023-08-05 20:24:58'),
(54, 'edit_users', 6, 'admin', '2023-08-05 20:25:21', '2023-08-05 20:25:21'),
(55, 'delete_users', 6, 'admin', '2023-08-05 20:25:50', '2023-08-05 20:25:50'),
(56, 'add_roles', 7, 'admin', '2023-08-05 20:26:20', '2023-08-05 20:26:20'),
(57, 'edit_roles', 7, 'admin', '2023-08-05 20:26:48', '2023-08-05 20:26:48'),
(58, 'delete_roles', 7, 'admin', '2023-08-05 20:27:17', '2023-08-05 20:27:17'),
(59, 'sliders', NULL, 'admin', '2023-08-05 20:59:26', '2023-08-05 20:59:26'),
(60, 'add_sliders', 59, 'admin', '2023-08-06 20:59:49', '2023-08-06 20:59:49'),
(61, 'edit_sliders', 59, 'admin', '2023-08-06 21:02:08', '2023-08-06 21:02:13'),
(62, 'delete_sliders', 59, 'admin', '2023-08-05 21:00:51', '2023-08-05 21:00:51'),
(65, 'details_branches', 31, 'admin', '2023-08-06 20:34:47', '2023-08-06 20:34:47'),
(66, 'settings', NULL, 'admin', '2023-08-06 21:09:38', '2023-08-06 21:09:38'),
(67, 'edit_settings', 66, 'admin', '2023-08-06 21:10:39', '2023-08-06 21:10:39'),
(68, 'details_projects', 16, 'admin', '2023-08-06 21:26:46', '2023-08-06 21:26:46'),
(69, 'product_details', 27, 'admin', '2023-08-07 21:27:15', '2023-08-07 21:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `pre_price` double(10,2) NOT NULL DEFAULT '0.00',
  `discount` double(10,2) NOT NULL DEFAULT '0.00',
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `purchase_price` double(10,2) NOT NULL DEFAULT '0.00',
  `notify` int(11) DEFAULT '100',
  `photo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `small_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text CHARACTER SET utf8,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `details_ar` text CHARACTER SET utf8,
  `details_en` text COLLATE utf8mb4_unicode_ci,
  `home` tinyint(1) NOT NULL DEFAULT '0',
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name_ar`, `name_en`, `unit_ar`, `unit_en`, `quantity`, `pre_price`, `discount`, `price`, `purchase_price`, `notify`, `photo`, `small_photo`, `description_ar`, `description_en`, `details_ar`, `details_en`, `home`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 7, '2سم مضلع طول 250 سم', 'hjkhkjhj', '', '', 0, 0.00, 0.00, 26.00, 0.00, 100, 'fullwidth-masonry-gallery-7-1200x800-original.jpg', 'fullwidth-masonry-gallery-7-420x330.jpg', '<p>\r\nمؤسسة المبدأ للديكور لبيع مواد الديكور بالجملة والقطاعى وتصميم وتنفيذ تشطيبات الديكور للشقق والمكاتب والمؤسسات. توفير خامات عالية الجودة وتقديم ارقى التصميمات للديكورات\r\n</p>', '<p>\r\nAl Mabdhel Decoration Est. Wholesale and retail sale of decoration materials, design and implementation of decorative finishes for apartments, offices and institutions. Providing high quality materials and providing the finest designs for decorations\r\n</p>', '<p>\r\nمؤسسة المبدأ للديكور لبيع مواد الديكور بالجملة والقطاعى وتصميم وتنفيذ تشطيبات الديكور للشقق والمكاتب والمؤسسات. توفير خامات عالية الجودة وتقديم ارقى التصميمات للديكورات\r\n</p>', '<p>\r\nAl Mabdhel Decoration Est. Wholesale and retail sale of decoration materials, design and implementation of decorative finishes for apartments, offices and institutions. Providing high quality materials and providing the finest designs for decorations\r\n</p>', 1, 1, NULL, '2023-06-13 17:04:40', '2023-06-13 17:04:40'),
(2, 7, '2سم مبروم طول 250 سم', 'dshgdshgjs', '', '', 0, 0.00, 0.00, 50.00, 0.00, 100, 'masonry-gallery-4-1200x800-original.jpg', 'fullwidth-masonry-gallery-8-420x330.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-06-13 17:04:40', '2023-06-13 17:04:40'),
(3, 7, '4سم مبروم طول 250 سم', 'nvnvnkk', '', '', 0, 0.00, 0.00, 60.00, 0.00, 100, 'fullwidth-masonry-gallery-1-1200x800-original.jpg', 'fullwidth-masonry-gallery-9-420x690.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(4, 7, '4سم مضلع طول 250 سم', 'mbhex', '', '', 0, 0.00, 0.00, 30.00, 0.00, 100, 'fullwidth-masonry-gallery-10-1200x800-original.jpg', 'fullwidth-masonry-gallery-10-870x330.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(5, 7, '6سم مضلع طول 250 سم', 'ekhfkhskjf', '', '', 0, 0.00, 0.00, 40.00, 0.00, 100, 'fullwidth-masonry-gallery-11-1200x800-original.jpg', 'fullwidth-masonry-gallery-11-420x330.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(6, 7, '6سم مبروم طول 250 سم', 'hjghjgjhj', '', '', 0, 0.00, 0.00, 90.00, 0.00, 100, 'fullwidth-masonry-gallery-6-1200x800-original.jpg', 'fullwidth-masonry-gallery-6-420x330.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(13, 8, '2سم مضلع طول 250 سم2', 'hjkhkjhjfff', '', '', 0, 0.00, 0.00, 100.00, 0.00, 100, 'team-5-370x366.jpg', 'team-5-370x366.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-06-13 17:04:40', '2023-06-13 17:04:40'),
(14, 8, '2سم مبروم طول 250 سم2', 'dshgdshgjstg', '', '', 0, 0.00, 0.00, 50.00, 0.00, 100, 'team-6-370x366.jpg', 'team-6-370x366.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-06-13 17:04:40', '2023-06-13 17:04:40'),
(15, 8, '4سم مبروم طول 250 سم2', 'nvnvnkkgt', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'team-15-370x366.jpg', 'team-15-370x366.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(16, 8, '4سم مضلع طول 250 سم2', 'mbhexrtt', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'team-16-370x366.jpg', 'team-16-370x366.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(17, 8, '6سم مضلع طول 250 سم2', 'ekhfkhskjffrg', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'team-15-370x366.jpg', 'team-15-370x366.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(18, 8, '6سم مبروم طول 250 سم2', 'hjghjgjhjmhg', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'team-4-370x366.jpg', 'team-4-370x366.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(19, 9, '2سم مضلع طول 250 سم23', 'hjkhkjhjfffjkhjk', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'testimonials-1-368x503.jpg', 'testimonials-1-368x503.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-06-13 17:04:40', '2023-06-13 17:04:40'),
(20, 9, '2سم مبروم طول 250 سم23', 'dshgdshgjstgbhjk', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'testimonials-2-368x503.jpg', 'testimonials-2-368x503.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-06-13 17:04:40', '2023-06-13 17:04:40'),
(21, 9, '4سم مبروم طول 250 سم23', 'nvnvnkkgthjg', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'testimonials-3-368x503.jpg', 'testimonials-3-368x503.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(22, 9, '4سم مضلع طول 250 سم23', 'mbhexrttjh', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'testimonials-3-368x503.jpg', 'testimonials-3-368x503.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(23, 9, '6سم مضلع طول 250 سم23', 'ekhfkhskjffrgmbhj', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'testimonials-3-368x503.jpg', 'testimonials-3-368x503.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(24, 9, '6سم مبروم طول 250 سم23\r\n', 'hjghjgjhjmhghg', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'testimonials-2-368x503.jpg', 'testimonials-2-368x503.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(25, 10, '4سم مبروم طول 250 سم234', 'nvnvnkkgthjgmbmn', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'post-24-570x492.jpg', 'post-24-570x492.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(26, 10, '4سم مضلع طول 250 سم234', 'mbhexrttjhgfhg', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'post-25-570x492.jpg', 'post-25-570x492.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(27, 10, '6سم مضلع طول 250 سم234', 'ekhfkhskjffrgmbhjjh', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'post-22-570x492.jpg', 'post-22-570x492.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(28, 10, '6سم مبروم طول 250 سم234\r\n', 'hjghjgjhjmhghghjg', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'post-23-570x492.jpg', 'post-23-570x492.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(29, 11, '6سم مضلع طول 250 سم235', 'ekhfkhskjffrgmbhjhgjhm', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'fullwidth-gallery-4-1200x800-original.jpg', 'grid-gallery-7-370x303.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(30, 11, '6سم مبروم طول 250 سم235\r\n', 'hjghjgjhjmhghgjhg', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'grid-gallery-8-1200x800-original.jpg', 'grid-gallery-8-370x303.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(31, 11, '4سم مبروم طول 250 سم2345', 'nvnvnkkgthjgmbmnhjg', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'grid-gallery-9-1200x800-original.jpg', 'grid-gallery-9-370x303.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(32, 11, '4سم مضلع طول 250 سم2345', 'mbhexrttjhgfhghjg', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'grid-gallery-10-1200x800-original.jpg', 'grid-gallery-10-370x303.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(33, 11, '6سم مضلع طول 250 سم2345', 'ekhfkhskjffrgmbhjjhmhb', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'grid-gallery-11-1200x800-original.jpg', 'grid-gallery-11-370x303.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL),
(34, 11, '6سم مبروم طول 250 سم2345\r\n', 'hjghjgjhjmhghghjgjhg', '', '', 0, 0.00, 0.00, 0.00, 0.00, 100, 'fullwidth-masonry-gallery-6-1200x800-original.jpg', 'grid-gallery-12-370x303.jpg', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

DROP TABLE IF EXISTS `product_galleries`;
CREATE TABLE `product_galleries` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `photo`, `product_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(8, 'fullwidth-gallery-4-1200x800-original.jpg', 1, 1, '2023-01-11 23:17:20', '2023-01-11 23:17:20'),
(9, 'grid-gallery-8-1200x800-original.jpg', 1, 1, '2023-01-11 23:17:20', '2023-01-11 23:17:20'),
(10, 'grid-gallery-9-1200x800-original.jpg', 1, 1, '2023-01-12 00:17:45', '2023-01-12 00:17:45'),
(11, 'grid-gallery-10-1200x800-original.jpg', 1, 1, '2023-01-12 00:17:45', '2023-01-12 00:17:45'),
(16, 'grid-gallery-11-1200x800-original.jpg', 1, 1, '2023-01-14 20:02:57', '2023-01-20 17:37:58'),
(17, 'fullwidth-masonry-gallery-6-1200x800-original.jpg', 1, 1, '2023-01-14 20:02:57', '2023-01-14 20:02:57'),
(20, 'admin/a.PNG', 81, 1, '2023-01-16 23:53:45', '2023-01-16 23:53:45'),
(21, 'admin/15.PNG', 81, 1, '2023-01-16 23:53:45', '2023-01-24 19:28:28'),
(22, 'admin/7.PNG', 81, 1, '2023-01-16 23:53:45', '2023-01-20 17:40:15'),
(23, 'admin/30.PNG', 81, 1, '2023-01-17 00:53:57', '2023-01-20 17:41:57'),
(24, 'admin/3.PNG', 81, 1, '2023-01-17 00:53:57', '2023-01-23 23:25:19'),
(25, 'admin/303.PNG', 81, 1, '2023-01-17 00:53:57', '2023-01-23 23:28:27'),
(26, 'admin/add2.jpg', 2, 2, '2023-06-06 20:56:54', '2023-06-06 20:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_purchase`
--

DROP TABLE IF EXISTS `product_purchase`;
CREATE TABLE `product_purchase` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `discount_product` double(10,2) NOT NULL,
  `discount_percent_product` double(10,2) NOT NULL,
  `net_price_product` double(10,2) NOT NULL,
  `quantity_price` double(10,2) NOT NULL,
  `sale_price` double(10,2) NOT NULL,
  `lot_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_purchase`
--

INSERT INTO `product_purchase` (`id`, `product_id`, `purchase_id`, `quantity`, `price`, `discount_product`, `discount_percent_product`, `net_price_product`, `quantity_price`, `sale_price`, `lot_number`, `expiration`) VALUES
(1, 1, 1, 1, 500.00, 0.00, 0.00, 500.00, 500.00, 0.00, '546412', '2022-07-28'),
(2, 1, 4, 1, 1.00, 0.00, 0.00, 1.00, 1.00, 200.00, '1', '2022-07-18'),
(3, 7, 5, 30, 50.00, 10.00, 0.00, 40.00, 1200.00, 200.00, '123', '2022-09-30'),
(4, 3, 5, 80, 60.00, 0.00, 0.05, 60.00, 4800.00, 500.00, '456', '2022-09-22'),
(7, 7, 8, 10, 40.00, 0.00, 0.00, 40.00, 400.00, 200.00, '123', '2022-09-30'),
(8, 7, 9, 20, 40.00, 0.00, 0.00, 40.00, 800.00, 200.00, '123', '2022-07-21'),
(9, 7, 10, 10, 40.00, 0.00, 0.00, 40.00, 400.00, 200.00, '789', '2022-07-21'),
(17, 1, 18, 10, 200.00, 0.00, 0.00, 200.00, 2000.00, 250.00, '1456', '2022-09-09'),
(18, 1, 19, 10, 200.00, 0.00, 0.00, 200.00, 2000.00, 250.00, '1456', '2022-09-09'),
(20, 1, 21, 10, 200.00, 0.00, 0.00, 200.00, 2000.00, 250.00, '1456', '2022-09-09'),
(21, 1, 22, 1, 1.00, 0.00, 0.00, 1.00, 1.00, 250.00, '189', '2022-08-31'),
(22, 1, 23, 1, 1.00, 0.00, 0.00, 1.00, 1.00, 250.00, '189', '2022-08-31'),
(23, 1, 24, 1, 1.00, 0.00, 0.00, 1.00, 1.00, 250.00, '189', '2022-08-31'),
(26, 1, 27, 10, 200.00, 0.00, 0.00, 200.00, 2000.00, 250.00, '6547', '2022-08-22'),
(39, 1, 40, 10, 200.00, 0.00, 0.00, 200.00, 2000.00, 250.00, '6547', '2022-09-10'),
(59, 8, 60, 1, 1.00, 0.00, 0.00, 1.00, 1.00, 100.00, '8645', '2022-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `product_sale`
--

DROP TABLE IF EXISTS `product_sale`;
CREATE TABLE `product_sale` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `discount_product` double(10,2) NOT NULL,
  `discount_percent_product` double(10,2) NOT NULL,
  `net_price_product` double(10,2) NOT NULL,
  `quantity_price` double(10,2) NOT NULL,
  `lot_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` date NOT NULL,
  `purchase_price` double(10,2) NOT NULL,
  `quantity_purchase` double(10,2) NOT NULL,
  `profit` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sale`
--

INSERT INTO `product_sale` (`id`, `product_id`, `sale_id`, `quantity`, `price`, `discount_product`, `discount_percent_product`, `net_price_product`, `quantity_price`, `lot_number`, `expiration`, `purchase_price`, `quantity_purchase`, `profit`) VALUES
(1, 1, 1, 1, 500.00, 0.00, 0.00, 500.00, 500.00, '655665', '2022-07-31', 0.00, 0.00, 0.00),
(2, 1, 2, 1, 250.00, 0.00, 0.00, 250.00, 250.00, '1', '2022-07-18', 1.00, 1.00, 249.00),
(3, 1, 3, 1, 250.00, 0.00, 0.00, 250.00, 250.00, '1456', '2022-09-09', 200.00, 200.00, 50.00);

-- --------------------------------------------------------

--
-- Table structure for table `product_store`
--

DROP TABLE IF EXISTS `product_store`;
CREATE TABLE `product_store` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `lot_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` date NOT NULL,
  `purchase_price` double(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_store`
--

INSERT INTO `product_store` (`id`, `product_id`, `store_id`, `lot_number`, `expiration`, `purchase_price`, `quantity`, `quantity_price`) VALUES
(1, 1, 1, '1', '2022-07-18', 1.00, 0, -249.00),
(2, 7, 1, '123', '2022-09-30', 40.00, 40, 1600.00),
(3, 3, 1, '456', '2022-09-22', 60.00, 80, 4800.00),
(4, 7, 1, '789', '2022-09-30', 40.00, 40, 1600.00),
(5, 1, 1, '1456', '2022-09-09', 200.00, 7, 1350.00),
(6, 1, 1, '189', '2022-08-31', 1.00, 2, 2.00),
(8, 1, 1, '6547', '2022-08-22', 200.00, 22, 4400.00),
(26, 8, 1, '8645', '2022-09-09', 1.00, 1, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` bigint(20) NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name_ar`, `name_en`, `description_ar`, `description_en`, `photo`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'مشروع 1', 'project 1', 'Oculoplastic', '', 'BeforeAfter/before and after 1.jpg', 1, NULL, '2023-07-03 12:49:01', '2023-07-03 12:49:01'),
(2, 'مشروع 2', 'project 2', 'heart surgery', '', 'BeforeAfter/before and after 2.jpg', 1, NULL, '2023-07-03 12:49:01', '2023-07-03 12:49:01'),
(3, 'مشروع 3', 'project 3', 'Oculoplastic', '', 'BeforeAfter/before and after 3.jpg', 1, NULL, '2023-07-03 12:49:01', '2023-07-03 12:49:01'),
(4, 'مشروع 4', 'project 4', 'heart surgery', '', 'BeforeAfter/before and after 4.jpg', 1, NULL, '2023-07-03 12:49:01', '2023-07-03 12:49:01'),
(5, 'مشروع 5', 'project 5', 'Oculoplastic', '', 'BeforeAfter/1.jpeg', 1, NULL, '2023-07-03 12:49:01', '2023-07-03 12:49:01'),
(6, 'مشروع 6', 'project 6', 'heart surgery', '', 'BeforeAfter/2.jpeg', 1, NULL, '2023-07-03 12:49:01', '2023-07-03 12:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `project_galleries`
--

DROP TABLE IF EXISTS `project_galleries`;
CREATE TABLE `project_galleries` (
  `id` bigint(20) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_galleries`
--

INSERT INTO `project_galleries` (`id`, `photo`, `project_id`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'fullwidth-gallery-8-1200x800-original.jpg', 1, 1, NULL, '2023-07-03 13:12:48', '2023-07-03 13:12:48'),
(2, 'fullwidth-gallery-7-1200x800-original.jpg', 1, 1, NULL, '2023-07-03 13:12:48', '2023-07-03 13:12:48'),
(3, 'fullwidth-gallery-5-1200x800-original.jpg', 1, 1, NULL, '2023-07-03 13:12:48', '2023-07-03 13:12:48'),
(4, 'fullwidth-gallery-4-1200x800-original.jpg', 1, 1, NULL, '2023-07-03 13:12:48', '2023-07-03 13:12:48'),
(5, 'grid-gallery-1-1200x800-original.jpg', 1, 1, NULL, '2023-07-03 13:12:48', '2023-07-03 13:12:48'),
(6, 'fullwidth-gallery-1-1200x800-original.jpg', 1, 1, NULL, '2023-07-03 13:12:48', '2023-07-03 13:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'owner', 'admin', '2022-06-26 23:53:41', '2022-06-26 23:53:41'),
(6, 'admin', 'admin', '2022-07-26 20:56:43', '2022-07-26 20:56:43'),
(7, 'مشرف', 'admin', '2023-08-07 20:14:38', '2023-08-07 20:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(4, 1),
(6, 1),
(7, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(42, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(2, 6),
(4, 6),
(6, 6),
(7, 6),
(14, 6),
(15, 6),
(16, 6),
(17, 6),
(18, 6),
(23, 6),
(27, 6),
(31, 6),
(59, 6),
(66, 6),
(2, 7),
(4, 7),
(6, 7),
(15, 7),
(16, 7),
(17, 7),
(18, 7),
(23, 7),
(27, 7),
(31, 7),
(44, 7),
(59, 7),
(65, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` tinyint(4) NOT NULL,
  `payment_way` int(11) NOT NULL,
  `total_price` double(10,2) NOT NULL DEFAULT '0.00',
  `discount_percent` double(10,2) NOT NULL DEFAULT '0.00',
  `discount` double(10,2) NOT NULL DEFAULT '0.00',
  `net_price` double(10,2) NOT NULL DEFAULT '0.00',
  `vat` double(10,2) NOT NULL DEFAULT '0.00',
  `vat_value` double(10,2) NOT NULL DEFAULT '0.00',
  `shipping_cost` double(10,2) NOT NULL DEFAULT '0.00',
  `total` double(10,2) NOT NULL DEFAULT '0.00',
  `payment` double(10,2) NOT NULL DEFAULT '0.00',
  `remain` double(10,2) NOT NULL DEFAULT '0.00',
  `due_days` int(11) NOT NULL DEFAULT '0',
  `due_date` date DEFAULT NULL,
  `prev_balance` double(10,2) NOT NULL DEFAULT '0.00',
  `balance` double(10,2) NOT NULL DEFAULT '0.00',
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `date`, `type`, `payment_way`, `total_price`, `discount_percent`, `discount`, `net_price`, `vat`, `vat_value`, `shipping_cost`, `total`, `payment`, `remain`, `due_days`, `due_date`, `prev_balance`, `balance`, `client_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2022-07-04', 1, 1, 1000.00, 0.00, 0.00, 1000.00, 0.00, 0.00, 0.00, 1000.00, 500.00, 500.00, 10, '2022-08-22', 0.00, 500.00, 1, 1, '2022-07-04 01:10:44', '2022-07-04 01:10:44'),
(2, '2022-08-21', 1, 1, 250.00, 0.00, 0.00, 250.00, 0.00, 0.00, 0.00, 250.00, 0.00, 250.00, 6, '2022-08-27', 0.00, 250.00, 3, 1, '2022-08-21 01:13:03', '2022-08-21 01:13:32'),
(3, '2022-08-22', 1, 1, 250.00, 0.00, 0.00, 250.00, 0.00, 0.00, 0.00, 250.00, 0.00, 250.00, 0, NULL, 250.00, 500.00, 3, 1, '2022-08-22 02:24:56', '2022-08-22 02:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` bigint(20) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `photo`, `title_ar`, `title_en`, `description_ar`, `description_en`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'service/sr-d-4.jpg', 'خدمة 1', NULL, 'الوصف 1', NULL, 0, NULL, NULL, NULL),
(2, 'service/sr-d-3.jpg', 'خدمة 2', NULL, 'الوصف 2', NULL, 0, NULL, NULL, NULL),
(3, 'service/sr-d-2.jpg', 'خدمة 3', NULL, 'الوصف 3', NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1TsKWX9yZHAqDP6Yy1q8jXTrBSKVoMjdclklC2OG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR1lnSUVZandxdDdBMnJpTWdNN1p2cnI5TTFpWUt2bnBaNHpPeFN6WiI7czo2OiJsb2NhbGUiO3M6MjoiYXIiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1695592710),
('9DInmSzw7K3xWVBPlkdPsB9pTUEoMGpwDOQyeYbD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZVYxQkJ0UnFySENCMHdvYXV1aHJpalhwdUlPM2ppRDhqYjVVRzk5NCI7czo2OiJsb2NhbGUiO3M6MjoiYXIiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXIvYnJhbmNoLzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1695678085),
('yEG5mUGZDMSyPLXY1iNpJ7QS6SMhU5kcWiDrWTdR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWEZteE1MTXBPNFV0cjI2TFc0aWNhb3dyMlIzV2tueWM2QVNpOURNYyI7czo2OiJsb2NhbGUiO3M6MjoiYXIiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXIvYnJhbmNoLzIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1695748387);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `code`, `value`, `created_at`, `updated_at`, `admin_id`) VALUES
(1, 'phone', '01111026848', '2023-01-29 20:51:21', '2023-01-29 22:52:19', 1),
(2, 'email', 'muhamed@gmail.com', '2023-01-29 22:28:50', '2023-08-09 09:40:03', 2),
(5, 'address', 'مدينة نصر - القاهرة', '2023-01-29 22:53:32', '2023-01-29 22:53:32', 1),
(6, 'phone2', '01050505226', '2023-01-29 20:51:21', '2023-01-29 22:52:19', 1),
(7, 'facebook', 'https://www.facebook.com/Drabdelrazekeg?mibextid=7cd5pb', '2023-08-22 22:05:28', '2023-08-22 22:05:28', 1),
(8, 'instgram', 'https://instagram.com/dr.abdelrazekmohamed.egypt?igshid=NzZhOTFlYzFmZQ', '2023-08-22 22:07:21', '2023-08-22 22:07:21', 1),
(9, 'WhatsApp', 'whatsapp.com', '2023-08-29 22:07:53', '2023-08-29 22:07:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders` (
  `id` bigint(20) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `photo`, `title_ar`, `title_en`, `description_ar`, `description_en`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'slider/1.jpg', 'د / عبدالرازق محمد', NULL, '<p>عضوٍ هيئة تدريس بجامعة عين شمس العريقة بخبرة اكثر من ١٠ سنوات في جراحات السمنة المفرطة والمناظير</p>', NULL, 0, NULL, NULL, NULL),
(2, 'slider/2.jpg', 'إسم الصور 2', NULL, 'الوصف 2', NULL, 0, NULL, NULL, NULL),
(3, 'slider/3.jpg', 'إسم الصورة 3', NULL, 'الوصف 3', NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `position_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `photo`, `title_ar`, `title_en`, `description_ar`, `description_en`, `position_ar`, `position_en`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '', 'testimonial/1.jpg', NULL, NULL, 'و الله انا لا شوفت إحترام و تقدير زي كده الفريق الطبي كله أقسم بالله ناس محترمة جداً و نحسهم أخواننا و أصدقائنا من زمان و كإننا نعرف بعض من سنين و عشر عمر ، و حضرتك و نعم الأخلاق دكتورنا الغالي و عمركم ما قصرتم مع حد ، حبيبتي مروة الل عمري ما أحتجتها و مردتش عليا و دكتور داليا العسل كله اللي بحب أتكلم معاها جداً ، و حضرتك اللي عمري ما طلبتك و قصرت ربنا يجازيكم كل خير و يري عنكم و يباركلكم فى حياتكم أنتم أحسن ناس دخلوا حساتي أقسم بالله ، ربنا يوفقكم و من نجاج لنجاح دايماً يا رب يا أغلي تيم ♥', NULL, NULL, NULL, 0, NULL, NULL, NULL),
(3, '', 'testimonial/3.jpg', NULL, NULL, 'اولا كل سنه وانتوا طيبين ويجعله رمضان\n', NULL, NULL, NULL, 0, NULL, NULL, NULL),
(5, '', 'testimonial/5.jpg', NULL, NULL, '‏انا عامله العمليه بقالي شهر ونص وخسيت‎ 11 كيلو لحد ‏دلوقتي رغم ضعف الحرق والغده الدرقيه وبعيدا عن الكيلوات‎ شكل جسمي اختلف وهدومي و سعت وبقيت اخف ولسه ان‎ ‏شاء الله لما اكمل للآخر والدكتور ذوق جدا وشخص محترم‎ وشاطر وبيرد ف اي وقت وعلي اي سؤال بدون اي زهق وباله طويل و اتني ي مروة تسلمي جدا على اهتمامك ودكتوره التغذيه الدكتوره ايمان ربنا يباركلها بردو بصراحه التيم كله اللهم بارك ناس ذوق ومحترمه وشاطره جدا ومرتاحه جدا معاكوا بالتوفيق ديما يا رب', NULL, 'a', 'a', 1, NULL, NULL, NULL),
(6, '', 'testimonial/6.jpg', NULL, NULL, 'ده اول اسبوع لسه عاملاه مع دكتور عبد الرازق\nوالله انا كنت معاهم مش حاسه ان انا مش\nحاسه اصلا ان انا داخله عمليه وان هم كانوا\nفريق ممتاز جدا جدا والنهارده رابع يوم ليا\nللعمليه مش حاسه باي حاجه وكويسه جدا\nوبشكر استاذه مروه جدا جدا جدا جدا على\nوقفتها جنبي وبشكر دكتور عبد الرزق والفريق\nاللي كان في العمليه والمستشفى في كميه\nالجمال وانت فيها ترتاح نفسيا اصلا وفريق\nالتمريض بشكره جدا جدا على المراعيه بتاعته\nوانا بجد فرحانه المستشفى دكتور عبد الرزق\nوالاستاذه مروه والكل فريق العمل ‎100 %', NULL, 'a', 'a', 1, NULL, NULL, NULL),
(7, '', 'testimonial/7.jpg', NULL, NULL, 'انا بشكر ربنا اول شئ\n\nوبشكر الدكتور عبد الرازق وكل التيم\nبجد انا حياتى اتغيرت وثقتى فنفسي\nرجعتلى اضعاف اضعاف من الاول\nحياتى رجعتلى وشوف الدنيا يشكل\nاحسن والفضل بعد ربنا يكون الدكتور\nعبد الرازق والتيم خاصة مس دليا\nودكتوره ايمان الناس دول تعبو اوى\nعلشان احنا ترجعلنا حياتنا من تانى\nمش عارفه اشكركم إزاي بس كل\nاللى اقدر اعمله ان ادعيلكم بالنحاج\nالاكبر والتوفيق لانكم فعلا بتتعبوا علشان\nتشوفو فرحتنا\n\nجزاكم الله كل خير', NULL, 'a', 'a', 1, NULL, NULL, NULL),
(8, '', 'testimonial/8.jpg', NULL, NULL, 'الحمد لله بفضل احسن دكتور في الدنيا\n\nهو انا لسه في الأول ومش نزلت كتير بس\nالحمد لله رب العالمين انا مش كنت اعرف\nاصلي غير على كرسي علشان جلي والركاب\n\nبس الحمد لله بدت اصلي عادي زي كل\nبفضل الله ثم الدكتور عبد الرزاق', NULL, NULL, NULL, 1, NULL, NULL, NULL),
(9, '', 'testimonial/9.jpg', NULL, NULL, 'الحمدوالشكر لله انا كنت بعاني من السكر كنت\nباخد 100وحده في اليوم بعد العمليه الحمد لله\nممكن كل اسبوعين اخد 10 وحدات والحمد‏ لله\nربنا يتم علينا عافيته وستره وطبعا كلنا بنثق في\nدكتور عبد الرازق خلو كانت عاوزه تعمل بلونة\n\nالمعده وانا رفضت وشجعتها تعمل ساسي مع\nالدكتور وكان اختيار موفق بفضل الله', NULL, NULL, NULL, 1, NULL, NULL, NULL),
(10, '', 'testimonial/10.jpg', NULL, NULL, 'الكلام ده انا لسه قولته للمتابعة والدكتور إيمان عندها امتحان بكرة وكلمتني وبجد انتم حببتونا في العلاج واول مرة في حياتي احب المستشفى أو الدكاترة و انا يوم ما جيت لحضرتك يا دكتور عبدالرازق  كنت مترشحلى من ناس عملتها عند حضرتك ولحد النهاردة بشكرهم وان شاء الله حضرتك هتعلى اكتر لان بجد كلكم بتساعدونا بحب', NULL, NULL, NULL, 1, NULL, NULL, NULL),
(11, '', 'testimonial/11.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(12, '', 'testimonial/12.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(13, '', 'testimonial/13.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(14, '', 'testimonial/14.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(15, '', 'testimonial/15.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(16, '', 'testimonial/16.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(17, '', 'testimonial/17.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(18, '', 'testimonial/18.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(19, '', 'testimonial/18.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'محمد نور محمد', 'muhammad.nour1111@gmail.com', NULL, '$2y$10$p/jaTeCfGwuhOBUuo1s23.9yg5XZx/LJXjsYyOM8WWqYb8ecivEFe', NULL, NULL, NULL, 'wFqfWHxB4TtPXxHZYxXNGPxyiC72gNDosRUcp4roGE7qxyriU2kXD7R0Ms44', NULL, 'profile-photos/Kv2pUEFxefd3bQ9PWkjuqyFIgd82wbDAR6J4yghK.jpg', '2023-03-12 18:22:37', '2023-05-29 20:47:30'),
(2, 'ali', 'ali@gmail.com', NULL, '$2y$10$VZTM4c/jaP17cfSqZoI8BOMkcwB8OwHD495ZPFkpCmnD5sQh6aTha', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-17 20:02:18', '2023-05-17 20:02:18'),
(3, 'assem', 'assem@gmail.com', NULL, '$2y$10$zhYBBu0w0SrAObotna9zkeVHP0Mm205GRcu6Iaue5SxxZE87jwZYK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-28 22:05:40', '2023-05-28 22:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `why_uses`
--

DROP TABLE IF EXISTS `why_uses`;
CREATE TABLE `why_uses` (
  `id` int(11) NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_uses`
--

INSERT INTO `why_uses` (`id`, `description_ar`, `description_en`, `updated_by`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'دكتور عبدالرازق محمد عضوٍ هيئة تدريس بجامعة عين شمس العريقة وحاصل علي درجة الدكتوراة وعضو كلية الجراحيين الملكية بلندن وعضو في عدة جمعيات لجراحات السمنة مثل الفيدرالية الدولية لجراحات السمنة (IFSO )والجمعية المصرية لجراحات السمنه (ESBS) والجمعية المصرية لمناظير البطن(ESLS)', NULL, NULL, 1, '2023-09-19 20:39:54', '2023-09-19 20:39:54'),
(2, 'بدون اي مضاعفات وأفضل أنواع الدباسات الأمريكية ', NULL, NULL, 1, '2023-09-19 20:40:15', '2023-09-19 20:40:15'),
(3, 'فريق طبي متكامل يتكون من ( دكتور تغذية - لايف كوتش - دكتور جلدية - مدرب رياضي)  للوصول للوزن المثالي في صحة نفسية وجسدية جيدة', NULL, NULL, 1, '2023-09-19 20:40:35', '2023-09-19 20:40:35'),
(4, 'أعلي معدل أمان وإطمئنان لجراحات السمنة', NULL, NULL, 1, '2023-09-19 20:41:19', '2023-09-19 20:41:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD UNIQUE KEY `name_ar` (`name_ar`);

--
-- Indexes for table `branch_galleries`
--
ALTER TABLE `branch_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_ar` (`name_ar`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD KEY `brands_admin_id_foreign` (`admin_id`) USING BTREE;

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customs`
--
ALTER TABLE `customs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD UNIQUE KEY `name_ar` (`name_ar`),
  ADD KEY `products_admin_id_foreign` (`admin_id`),
  ADD KEY `products_brand_id_foreign` (`category_id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_purchase`
--
ALTER TABLE `product_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sale`
--
ALTER TABLE `product_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_store`
--
ALTER TABLE `product_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_galleries`
--
ALTER TABLE `project_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `why_uses`
--
ALTER TABLE `why_uses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `branch_galleries`
--
ALTER TABLE `branch_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customs`
--
ALTER TABLE `customs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_purchase`
--
ALTER TABLE `product_purchase`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `product_sale`
--
ALTER TABLE `product_sale`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_store`
--
ALTER TABLE `product_store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_galleries`
--
ALTER TABLE `project_galleries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `why_uses`
--
ALTER TABLE `why_uses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `category` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
