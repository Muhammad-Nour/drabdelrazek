-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 24, 2023 at 07:50 PM
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
  `updated_at` timestamp NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `phone`, `governorate`, `city`, `height`, `weight`, `created_at`, `updated_at`, `admin_id`, `updated_by`) VALUES
(15, 'ahmed', '01029914170', 'القاهرة', '15 مايو', 190, 140, '2023-10-06 02:25:35', '2023-10-06 02:25:35', NULL, NULL),
(16, 'محمد نور محمد', '01151379295', 'القاهرة', 'مدينة نصر', 185, 150, '2023-10-08 20:27:26', '2023-10-08 20:27:26', NULL, NULL),
(17, 'محمد نور محمد', '01151379295', 'القاهرة', 'مدينة نصر', 1.85, 75, '2023-10-08 21:09:53', '2023-10-08 21:09:53', NULL, NULL),
(18, 'ahmed muhammad', '01151379295', 'القاهرة', 'مدينة نصر', 1.85, 200, '2023-10-08 21:10:23', '2023-10-08 21:10:49', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` bigint(20) NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title_ar`, `title_en`, `photo`, `date`, `description_ar`, `description_en`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'نصائح قبل جراحات السمنة ', '', 'blog/b-1-2.jpg', '2023-09-20', '<p>\r\nالامتناع عن التدخين قبل العملية</p>\r\n<p>صيام ثمان ساعات قبل العملية أي الامتناع عن الأكل والشراب </p>\r\n<p>عدم تناول الأطعمة التي تحتوي على سعرات حرارية عالية</p>\r\n<p>إخبار الطبيب إذا كانت المريضة التي يجري لها العملية حامل</p>\r\n<p>شرب الماء والسوائل الدافئة بكثرة</p>\r\n<p>الاستعداد النفسي قبل إجراء العملية يعتبر من أفضل العوامل التي تؤدي إلى نجاح العملية</p>\r\n<p>يتم التأهيل والتحضير للعملية من خلال جلسات مع اللايف كوتش لمعرفه جميع الخطوات السابقة للعملية وهذا ما يتم بدقه في مركز دكتور عبد الرازق محمد</p>\r\n<p>عدم أخذ أي أدوية أو عقاقير إلا بأمر الطبيب</p>', '', 1, NULL, NULL, NULL),
(3, 'ما هي فوائد استخدام المنظار في عملية تكميم المعدة؟', '', 'blog/b-1-1.jpg', '2023-09-21', '<p>تسكين الآلام بعد العملية\r\nتقليص مدة الإقامة بالمستشفى\r\nعدم وجود جروح ظاهرة\r\nالتعافي بشكل أسرع والعودة إلى الحياة الطبيعية والعمل مقارنة بالجراحة المفتوحة التقليدية في البداية \r\nيعطي رؤية افضل وأدق للأعضاء الداخلية للجسم\r\n</p>\r\n', '', 1, NULL, NULL, NULL),
(5, 'ارشادات عامة بعد العملية', NULL, 'blog/3howMVaQySwJFKD4zmC1CYDzRIDhhTMDQcHipMLR.jpg', '2023-10-03', '<p>الأكل 5 - 6 وجبات أو أكثر يوميا وممنوع الوجبة الكبيرة</p>\r\n\r\n<p>الأكل جيد الطهي والمضغ جيدا وعدم البلع إلا بعد إتمام المضغ</p>\r\n\r\n<p>يفضل المشي بعد الأكل في الفترة الأولى بعد العملية</p>\r\n\r\n<p>ينصح بممارسة الرياضة بعد شهر من العملية</p>\r\n\r\n<p>كل هذه التعليمات واكثر متاحه في برنامج متابعه ما بعد العملية بمركز الدكتور عبد الرازق محمد بالإضافة إلى المتابعة مع اللايف كوتش لتحديد السلوكيات الصحيحة بعد العملية لنجاح العملية بشكل كبير المتابعة الدورية مع أخصائي التغذية بمركز دكتور عبد الرازق محمد ضمان نجاح العملية</p>', NULL, 2, NULL, '2023-10-03 19:50:15', '2023-10-03 19:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches` (
  `id` bigint(20) NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name_ar`, `name_en`, `map`, `address_ar`, `address_en`, `description_ar`, `description_en`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'القاهرة', 'Cairo', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13812.219136870468!2d31.3256533!3d30.0639641!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583f807dcfb8c7%3A0x9341ccff6aa52f12!2z2K_Zg9iq2YjYsSDYudio2K_Yp9mE2LHYp9iy2YIg2YXYrdmF2K8g2KXYs9iq2LTYp9ix2Yog2KzYsdin2K3Yp9iqINin2YTYs9mF2YbYqSDYp9mE2YXZgdix2LfYqSDZiNin2YTZhdmG2KfYuNmK2LE!5e0!3m2!1sen!2seg!4v1695678038461!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '18 شارع الطيران - مدينة نصر - فوق معرض سيارات الطيران - الدور الرابع بعد كنتاكي الطيران', '18 ش الطيران بمدينة نصر فوق معرض سيارات الطيران الدور الرابع بعد كنتاكي الطيران', 'الأحد و الثلاثاء من 3 حتي 10', 'الأحد و الثلاثاء من 3 حتي 10 مساءاً', 1, 2, NULL, '2023-10-23 19:19:09'),
(2, 'أكتوبر', 'october', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3456.4680274386105!2d30.953518884886748!3d29.96597668191095!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjnCsDU3JzU3LjUiTiAzMMKwNTcnMDQuOCJF!5e0!3m2!1sar!2seg!4v1695677793334!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'مستشفي انفينيتي - ميدان فودافون .. مول انفينتى ..بجوار مستشفى اكتوبر المركزى - الدور الثاني', 'مستشفي انفينيتي - ميدان فودافون .. مول انفينتى ..بجوار مستشفى اكتوبر المركزى - الدور الثاني', 'السبت من 6 ل 9 مساءاً', '', 1, NULL, NULL, NULL),
(9, 'البحيرة', 'behera', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3423.8938023481996!2d30.666762299999995!3d30.889631700000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f63934a6fa5411%3A0x5bb8a1df2e255dae!2z2LnZitin2K_YqSDYr9mD2KrZiNixINi52KjYr9in2YTYsdin2LLZgiDZhdit2YXYryDYpdiz2KrYtNin2LHZiiDYp9mE2KzYsdin2K3YqSDYp9mE2LnYp9mF2Kkg2YjYp9mE2YXZhtin2LjZitixINmI2KfZhNiz2YXZhtip!5e0!3m2!1sen!2seg!4v1695748076893!5m2!1sen!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'ايتاي البارود – شارع محمود سامي البارودي – أمام مركز الياسمين الطبي أعلي صيدليه دإيناس محمد', 'ايتاي البارود – شارع محمود سامي البارودي – أمام مركز الياسمين الطبي أعلي صيدليه دإيناس محمد', 'الأثنين من 2 حتي 7 مساءاً', '1', 1, NULL, NULL, NULL),
(11, 'فرع طنطا', 'tanta', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3427.5019445626804!2d31.0017339!3d30.7885552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7c90fbe4fca47%3A0x83fbc070b66c37af!2z2YXYs9iq2LTZgdmKINiv2KfYsSDYp9mE2YLZhdip!5e0!3m2!1sar!2seg!4v1695748171528!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'مستشفى كنانه منطقة الاستاد ش الجيش', 'مستشفى كنانه منطقة الاستاد ش الجيش', 'الجمعة من 4 حتي 7 مساءاً', '1', 1, NULL, NULL, NULL),
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
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'جراحات السمنة', NULL, 1, NULL, '2023-09-20 10:57:19', '2023-09-20 10:57:19'),
(2, 'جراحات التجميل', NULL, 1, NULL, '2023-09-20 10:57:19', '2023-09-20 10:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'about', '<p>دكتور عبدالرازق محمد عضو هيئة تدريس بجامعة عين شمس العريقة بخبرة اكثر من ١٠ سنوات في جراحات السمنة المفرطة والمناظير وحاصل علي الدكتوراة في الجراحة والمناظير وعضو في كلية الجراحيين الملكية بانجلترا وعضو في عدة جمعيات مثل الفيدرالية الدولية لجراحات السمنة والجمعية المصرية لجراحات السمنة</p>', NULL, 'customs/2Ixr1Tt6GAMbz7mPqbDxVILHPLDLHFKCE6iZxdZa.jpg', 1, 2, '2023-07-04 07:28:52', '2023-10-02 22:09:02'),
(7, 'secrets_video', 'https://www.youtube.com/watch?v=HAglC40pCg8', NULL, 'customs/2.jpg', 1, NULL, '2023-07-04 07:28:52', '2023-07-04 07:28:52'),
(8, 'address', '18 ش الطيران بمدينة نصر فوق معرض سيارات الطيران الدور الرابع بعد كنتاكي الطيران\n\n', NULL, '', 1, NULL, '2023-07-04 07:28:52', '2023-07-04 07:28:52'),
(13, 'dr_name', 'د / عبدالرازق محمد', 'Dr.Abdelrazek mohammed', 'customs/2.jpg', 1, NULL, NULL, NULL),
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
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE `faqs` (
  `id` bigint(20) NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title_ar`, `title_en`, `description_ar`, `description_en`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'ايه هو مركز الجوع؟', NULL, '<p>مركز الجوع بيكون في قبة المعده وده بيفرز هرمون الجوع او الجريلين عشان كده في عملية التكميم بيتم استئصال قبة المعده ومعاها مركز الجوع وده بيقلل احساس الجوع بدرجة كبيره جدا</p>', NULL, 1, 2, '2023-09-21 17:21:27', '2023-10-10 20:54:03'),
(2, 'امتي عملية التكميم تفشل؟', NULL, '<p>\r\nعملية التكميم بتفشل لو مخسرناش ٥٠٪؜ من الوزن الزايد خلال اول سنه او وصلنا للوزن المثالي وحصل زيادة كبيره في الوزن بعد كده او حصل مضاعفات لاقدر الله زي التسريب او النزيف او الترجيع المستمر او ارتجاع المرئ \r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(3, 'هل هتحرم من الاكل او هعمل دايت بعد العملية؟', NULL, '<p>\r\nلا مفيش حرمان لان بعد العملية مش هيكون فيه إحساس بالجوع أصلا وبتشبع من اقل كمية اكل ولكن مهم جدا ان احنا نغير نمط الحياة بتاعنا لنمط صحي زي الاكل الصحي والرياضة وهنا دور قسم التغذية العلاجية وقسم الدعم النفسي بمركز  الدكتور عبدالرازق محمد \r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(4, 'هل هيكون فيه ترجيع او قئ بعد العملية؟', NULL, '<p>\r\nإحساس القئ اوً الترجيع بيكون اول يوم او يومين ولكن بعد كده بيختفي بشرط الالتزام بالتعليمات والحركة المستمره والالتزام بالادوية ومعدلات القئ بتكون قليله جدا مع التكميم المثبت\r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(5, 'السمنة المفرطة وتاخر الانجاب؟', NULL, '<p>\r\nتأخر الانجاب من المشاكل اللي بتسبب مشاكل نفسية لدي الزوجين وده لان السمنة المفرطة بتسبب خلل هرموني لدي السيدات وكمان بتتسبب في تكيسات المبايض وبكدة جراحات السمنه بتكون حلت مشكلة تأخر الانجاب لان النزول في الوزن بيحسن مستوي الهرمونات وكمان بيحل مشكلة تكيسات المبايض\r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(6, 'امتي اقدر احمل بعد جراحات السمنه ؟', NULL, '<p>\r\nالحمل بيكون بعد ٦ شهور لسنه وده لضمان الوصول للوزن المثالي لان هرمونات الحمل بتثبت الوزن وكمان عشان الامً تاخد  التغذية الكافية ليها وللجنين\r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(7, 'امتي اقدر امارس حياتي بصورة طبيعية ؟', NULL, '<p>\r\nلو  اعمال مكتبية بعد ٥ أيام لاسبوع وده لإن العملية بالمنظار وفترة النقاهة قليلة جدا \r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(8, 'التدخين بعد جراحات السمنه!', NULL, '<p>\r\nيفضل الإقلاع تماما عن التدخين بعد جراحات السمنه لان النيكوتين يقلل افراز المخاط المبطن لجدار المعدة اللي بيحميها من تاثير حامض المعده مما يسبب التهابات متكرره بجدار المعده ممكن ان تنتهي بتكوين قرحة في جدار المعدة\r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(9, 'القهوة بعد جراحات السمنه؟', NULL, '<p>\r\nالقهوة مسموحة بعد مرور شهر من جراحات السمنه فنجان واحد يوميا وقبل شهر مسموح بالقهوة منزوعةً الكافيين فقط\r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(10, 'دور الدعم النفسي بعد جراحات السمنه ؟', NULL, '<p>\r\nفي عيادات دكتور عبدالرازق محمد بنوفر فريق متكامل بيضم  اخصائي نفسي وتعديل سلوك عشان يساعدك تعدل أي سلوكيات غلط قبل العملية ويساعدك تغير نمط حياتك للافضل عشان نضمن الوصول للوزن المثالي في احسن صحة نفسية وبكده يكون حققنا المعادلة الصعبة وهي انك تخس وصحتك الجسدية والنفسية في احسن حال \r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(11, 'هل بنحتاج درنقة بعد العملية ؟', NULL, '<p>\r\nاه بنحتاجها بنسبة كبيرة ولكن بنقدر نشيلها قبل الخروج من المستشفى وبنقدر نستغني عنها في بعض الحالات\r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(12, 'الفيتامينات بعد جراحات السمنة؟', NULL, '<p>\r\nالفيتامينات بعد جراحات السمنه مهمة جدا لضمان الوصول للوزن المثالي في صحة جيده وبنحتاج فيتامينات لمدة سنة مع عملية التكميم ومدي الحياة مع تحويل المسار ولمدة ٣ل٥ سنوات مع عملية الساسي\r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(13, 'امتي جراحات السمنة تفشل؟', NULL, '<p>\r\nجراحات السمنة بتفشل في حالة عدم الوصول للوزن المثالي بعد اول سنة او زيادة الوزن مرة اخري بعد الوصول للوزن المثالي او في حالة حدوث مضاعفات زي الارتجاع او الترجيع المستمر او التسريب\r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(14, 'ايه الفرق بين السمنه الموضعية والسمنه المفرطة؟', NULL, '<p>\r\nالسمنه الموضعيه بيكون معدل كتلةًالجسم اقل من ٣٠ والمريض عنده دهون متركزة في أماكن معينة زي البطن مثلا وهنا بيكون الحل عمليات شفط الدهون اما السمنة المفرطة فبيكون معدل كتلة الجسم اكتر من ٣٠ وهنا بيكون الحل عمليات التكميم وتحويل المسار والساسي\r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(15, 'الروبوت وجراحات السمنة؟', NULL, '<p>\r\nالروبوت هو احدث مجالات جراحة السمنه وده بيعتمد ان الجراح بيعتمد علي روبوت في اجراء العملية حيث يكون الجراح في مكان معين وبيتحكم في الروبوت لاجراء حركات معينة والروبوت بيدي زوايا رؤية مختلفة بوضوح شديد وبيقدر يدي زوايا مختلفة للالات اثناء العمليةوالروبوت مازال في مرحلة التطوير في جراحات السمنه \r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(16, 'الحرمان بعد عمليات السمنة؟', NULL, '<p>\r\nبعد عمليات السمنة مفيش حرمان لان مع العملية بيتم استئصال مركز الجوع وده بيقلل إحساس الجوع تماما وكمان بنقدر ناكل كميات اكل قليله ونشبع بسرعه وبكده يباي حققنا المعادلة الصعبة وهي عدم الشعور بالجوع والاحساس بالشبع بسرعه وهنا دور التغذيه العلاجية بمركز الدكتور عبدالرازق محمد اللي هتساعدك توصل للوزن المثالي في صحة جيدة\r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27'),
(17, 'ايه هي تقنية الصمغ او glue  في الجروح؟', NULL, '<p>\r\nالتقنية دي بتعتمد علي قفل الجروح بدون خياطة عن طريق الصمغ او glue وبكده مفيش اثر تماما للجروح ومش بنحتاج نغير علي الجرح وكان بيمنع أي التهاب بالجروح \r\nايه التحضير اللازم قبل عمليات السمنه؟\r\nبيتم عمل فحوصات كامله واشعه زي الموجات الصوتية علي البطن والحوض ورسم القلب وموجات صوتيه علي القلب وفي بعض المرضي وظائف تنفس وبننصح المريض بالابتعاد عن الدهون والنشويات أسبوع قبل العملية وبيصوم ٨ ساعات قبل العملية ولو مريض ضغط او عده بياخد الادوية في معادها قبل العملية \r\n</p>', NULL, 1, NULL, '2023-09-21 17:21:27', '2023-09-21 17:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `meettings`
--

DROP TABLE IF EXISTS `meettings`;
CREATE TABLE `meettings` (
  `id` int(11) NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `admin_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meettings`
--

INSERT INTO `meettings` (`id`, `title_ar`, `title_en`, `description_ar`, `description_en`, `admin_id`, `photo`, `video`, `updated_at`, `created_at`, `updated_by`) VALUES
(1, 'فقرة من لقاء الدكتور عبدالرازق محمد على قناة #هي', 'فقرة من لقاء الدكتور عبدالرازق محمد على قناة #هي 1', '<p>فقرة من لقاء الدكتور عبدالرازق محمد على قناة #هي</p>', '<p>فقرة من لقاء الدكتور عبدالرازق محمد على قناة #هي 1</p>', 2, 'meettings/5kIIqyny6RinWajUZippEyXCkrQ66lzfVeT1uZMp.jpg', 'https://www.youtube.com/watch?v=1jXGJOovpWQ', '2023-10-09 22:19:32', '2023-09-30 19:14:46', 1),
(2, 'د. عبد الرزاق محمد في ضيافة برنامج دعوة من فرح', NULL, 'د. عبد الرزاق محمد في ضيافة برنامج دعوة من فرح على قناة #هي ', NULL, 1, 'meettings/3.jpg', 'https://www.youtube.com/watch?v=G2ROV6f5njY', NULL, NULL, NULL),
(3, 'دكتور عبد الرازق محمد استشاري جراحات السمنة المفرطة والمناظير فى برنامج نحت و ردم', NULL, 'الفقرة كاملة على قناة #هي', NULL, 1, 'meettings/3.jpg', 'https://www.youtube.com/watch?v=HAglC40pCg8', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `phone`, `email`, `description`, `created_at`, `updated_at`, `updated_by`) VALUES
(3, 'محمد نور صلاح', '01151379295', 'muhammad.nour111@gmail.com', 'بسم الله الرحمن الرحيم', '2023-10-07 21:08:53', '2023-10-08 21:12:11', NULL),
(4, 'محمد نور محمد', '01151379295', 'muhammad.nour111@gmail.com', 'بسم الله', '2023-10-07 21:31:41', '2023-10-07 21:31:41', NULL),
(5, 'ahmed', '01029914170', 'ahmed@gmail.com', 'بسم الله', '2023-10-07 21:53:57', '2023-10-07 21:53:57', NULL),
(6, 'ahmed', '01151379295', 'muhammad.nour111@gmail.com', 'بسم الله', '2023-10-07 21:57:40', '2023-10-07 21:57:40', NULL),
(7, 'محمد نور محمد صلاح', '01151379295', 'muhammad.nour111@gmail.com', 'فلسطين', '2023-10-08 21:16:44', '2023-10-08 21:17:15', 2);

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
(23, 'blogs', NULL, 'admin', '2023-07-18 21:13:33', '2023-07-18 21:13:33'),
(24, 'add_blogs', 23, 'admin', '2023-07-18 21:14:10', '2023-07-18 21:14:10'),
(25, 'edit_blogs', 23, 'admin', '2023-07-18 21:14:30', '2023-07-18 21:14:30'),
(26, 'delete_blogs', 23, 'admin', '2023-07-18 21:14:47', '2023-07-18 21:14:47'),
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
(69, 'product_details', 27, 'admin', '2023-08-07 21:27:15', '2023-08-07 21:27:16'),
(70, 'appointments', NULL, 'admin', '2023-10-07 22:37:37', '2023-10-07 22:37:37'),
(71, 'add_appointment', 70, 'admin', '2023-10-07 22:39:01', '2023-10-07 22:39:01'),
(72, 'edit_appointment', 70, 'admin', '2023-10-07 22:41:37', '2023-10-07 22:41:37'),
(73, 'delete_appointment', 70, 'admin', '2023-10-07 22:41:59', '2023-10-07 22:41:59'),
(74, 'meettings', NULL, 'admin', NULL, NULL),
(75, 'add_meetting', 74, 'admin', NULL, NULL),
(76, 'edit_meetting', 74, 'admin', NULL, NULL),
(77, 'delete_meetting', 74, 'admin', NULL, NULL),
(78, 'faqs', NULL, 'admin', NULL, NULL),
(79, 'add_faq', 78, 'admin', NULL, NULL),
(80, 'edit_faq', 78, 'admin', NULL, NULL),
(81, 'delete_faq', 78, 'admin', NULL, NULL),
(82, 'why_us', NULL, 'admin', NULL, NULL),
(83, 'add_why_us', 82, 'admin', NULL, NULL),
(84, 'edit_why_us', 82, 'admin', NULL, NULL),
(85, 'delete_why_us', 82, 'admin', NULL, NULL),
(86, 'services', NULL, 'admin', NULL, NULL),
(87, 'add_service', 86, 'admin', NULL, NULL),
(88, 'edit_service', 86, 'admin', NULL, NULL),
(89, 'delete_service', 86, 'admin', NULL, NULL),
(90, 'add_insta', 86, 'admin', NULL, NULL);

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
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'مشروع 1', 'project 1', NULL, '', 'BeforeAfter/before and after 1.jpg', 1, NULL, '2023-07-03 12:49:01', '2023-07-03 12:49:01'),
(2, 'مشروع 2', 'project 2', NULL, '', 'BeforeAfter/before and after 2.jpg', 1, NULL, '2023-07-03 12:49:01', '2023-07-03 12:49:01'),
(3, 'مشروع 3', 'project 3', NULL, '', 'BeforeAfter/before and after 3.jpg', 1, NULL, '2023-07-03 12:49:01', '2023-07-03 12:49:01'),
(4, 'مشروع 4', 'project 4', NULL, '', 'BeforeAfter/before and after 4.jpg', 1, NULL, '2023-07-03 12:49:01', '2023-07-03 12:49:01'),
(5, 'مشروع 5', 'project 5', NULL, '', 'BeforeAfter/1.jpeg', 1, NULL, '2023-07-03 12:49:01', '2023-07-03 12:49:01'),
(6, 'مشروع 6', 'project 6', NULL, '', 'BeforeAfter/2.jpeg', 1, NULL, '2023-07-03 12:49:01', '2023-07-03 12:49:01'),
(7, NULL, NULL, NULL, NULL, 'project/dwoRXDGkGxVgPt2OGOlxp5f6Of7cnqMZH7d8pjji.jpg', 2, NULL, '2023-10-03 20:27:35', '2023-10-03 20:27:35'),
(8, NULL, NULL, NULL, NULL, 'project/CHAUeI00ITCkTem1XXvufB1c1ZchoTbk0zeBwVZa.jpg', 2, NULL, '2023-10-03 20:27:41', '2023-10-03 20:27:41'),
(9, NULL, NULL, NULL, NULL, 'project/emZ9dwxnYEibpXQvst6urcLID1tJjMI85NZ9KJGV.jpg', 2, NULL, '2023-10-03 20:27:46', '2023-10-03 20:27:46'),
(10, NULL, NULL, NULL, NULL, 'project/f1R3TH6GNfrruwZmiI5KnpUnHDtwtMUBNhz7bjGK.jpg', 2, NULL, '2023-10-03 20:27:51', '2023-10-03 20:27:51'),
(11, NULL, NULL, NULL, NULL, 'project/juu81iZGkipdF6UvhtatirOZoJv7hRKYMW73Wg7Y.jpg', 2, NULL, '2023-10-03 20:27:56', '2023-10-03 20:27:56'),
(12, NULL, NULL, NULL, NULL, 'project/vlveASgt1PXneO6mRhfYmcCIt0lb2HodZpxc1fUV.jpg', 2, NULL, '2023-10-03 20:28:17', '2023-10-03 20:28:17'),
(13, NULL, NULL, NULL, NULL, 'project/6XIAiyjW94H6ECf2ZmvJMFAcNs3LphcHz3SvwbrB.jpg', 2, NULL, '2023-10-03 20:28:27', '2023-10-03 20:28:27'),
(14, NULL, NULL, NULL, NULL, 'project/hLy6INVXSBeLR02kjpEHYFmlEz6dsSj0Yl8XWfzu.jpg', 2, NULL, '2023-10-03 20:28:34', '2023-10-03 20:28:34'),
(15, NULL, NULL, NULL, NULL, 'project/9U83ZDuJjHcChVMahZYzBLc7vrZCxOmTc149u64P.jpg', 2, NULL, '2023-10-03 20:28:40', '2023-10-03 20:28:40');

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
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(2, 6),
(4, 6),
(6, 6),
(7, 6),
(14, 6),
(15, 6),
(16, 6),
(17, 6),
(18, 6),
(20, 6),
(21, 6),
(22, 6),
(23, 6),
(24, 6),
(25, 6),
(26, 6),
(27, 6),
(28, 6),
(29, 6),
(30, 6),
(31, 6),
(32, 6),
(33, 6),
(34, 6),
(35, 6),
(36, 6),
(37, 6),
(38, 6),
(39, 6),
(40, 6),
(42, 6),
(44, 6),
(45, 6),
(46, 6),
(47, 6),
(48, 6),
(49, 6),
(50, 6),
(51, 6),
(52, 6),
(53, 6),
(54, 6),
(55, 6),
(56, 6),
(57, 6),
(58, 6),
(59, 6),
(60, 6),
(61, 6),
(62, 6),
(65, 6),
(66, 6),
(67, 6),
(68, 6),
(69, 6),
(70, 6),
(71, 6),
(72, 6),
(73, 6),
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
  `category_id` bigint(20) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `services` (`id`, `category_id`, `photo`, `title_ar`, `title_en`, `description_ar`, `description_en`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'service/sr-2-1.jpg', 'عملية تكميم المعدة', NULL, '<p>\r\nهي أكثر عمليات السمنة انتشارا وهي مناسبة للأشخاص اللي معدل كتلة الجسم ليهم اكتر من ٣٠ وكمان عندهم شراهة كبيرة للنشويات ومش بيعانوا من ارتجاع المرئ المرضي  ومعندهمش شراهة كبيرة للحلويات\r\nوقت العملية حوالي ٣٠ دقيقة فقط\r\nالعملية بتتمً بالمنظار عن طريق فتحات صغيرة جدا في جدار البطن لا تتعدي ١ سم وبدون اثر للجروح وبيتم فيها استئصال من٧٠ل٨٠٪؜ من حجم المعدة لتقليل كميات الاكل وكمان بيتم استئصال قبة المعدة اللي بتفرز هرمون الجوع وبالتالي عملية تكميم المعدة تقلل إحساس الجوع بدرجة كبيرة جدا ومش بس كده العملية بتزود الحرق حوالي ١٠ اضعاف \r\n\r\n</p>', NULL, 1, NULL, '2023-09-20 11:14:04', '2023-09-20 11:14:08'),
(2, 1, 'service/sr-2-2.jpg', 'عملية تحويل المسار المصغر', NULL, '<p>\r\nعملية تحويل المسار مناسبة للمرضي اللي عندهم شراهة كبيرة للحلويات اوً مرضي ارتجاع المرئ او مرضي السكر من النوع الثاني وبتعتمد علي عمل جيب للمعدة وتوصيل الجيب ده بالامعاء علي بعد حوالي ٢ متر وبكده بيقل امتصاص السكريات بشكل كبير وتبلغ نسبة الشفا من السكر مع عملية تحويل المسار ٩٨٪؜\r\n</p>', NULL, 1, NULL, '2023-09-20 11:14:15', '2023-09-20 11:14:19'),
(3, 1, 'service/sr-2-3.jpg', 'عملية الساسي ', NULL, '<p>\r\nعملية الساسي من العمليات الحديثة اللي بتجمع بين تكميم المعدة وتحويل المسار حيث يتم عمل تكميم المعدة وتوصيل المعدة المكممة بالامعاء علي بعد حوالي ٢ متر وبكده بيكون فيه مسارين للاكل المسار الطبيعي زي التكميم ومسار تاني زي تحويل المسار وبكده نكون خدنا مميزات التكميم في تقليل كمية الاكل ومميزات تحويل المسار في تقليل امتصاص السكريات\r\n</p>', NULL, 1, NULL, '2023-09-20 11:14:24', '2023-09-20 11:14:30'),
(4, 1, 'service/sr-2-3.jpg', 'بالون المعدة وانواعه', NULL, '<p>\r\nبالون المعدة مناسب للمرضي اللي معدل كتلة الجسم عندهم اقل من ٣٠ ومحتاجين ينزلوا من ١٠ل٢٠ كجم وبيتم تركيبه عن طريق المنظار من الفم بدون جراحة عن طريق ابرة منومة وبيتم ملء البالون بحجم من ٥٥٠مللي ل٧٠٠ مللي من سائل معين وبكده بيدي المريض إحساس سريع جدا بالشبع وبيتم إزالة البالون بعد ٦ شهور لسنه حسب نوعه والمريض بيمشي اول ٣ \r\nأيام سوائل وبعد كده بندخل الاكل المهروس تدريجيا .متاح اكثر من نوع للبالون زي البالون الروسي والفرنسي والامريكي وافضلهم البالون الأمريكي\r\n</p>', NULL, 1, NULL, '2023-09-20 11:14:24', '2023-09-20 11:14:30'),
(5, 1, 'service/sr-2-3.jpg', 'الكبسولة الذكية', NULL, '<p>\r\nالكبسولة الذكية اوًالمبرمجة هي من الوسائل الحديثة جدا في انقاص الوزن حيث يتم تركيبها بدون تخدير وبدون جراحة وبدون الدخول لغرفة العمليات .بيتم تركيب الكبسولة بالعيادة عن طريق بلعها بكمية من المياه حتي تستقر بالمعده وبيتم تصوير اشعة للتاكد من وصولها للمعده ثم يتم ملء الكبسوله بسائل معين وتصوير اشعة مرة اخري وبعد كده المريض يقدر يروح بيته مباشرة والكبسولة بتساعدنا نفقد من ١٠ل٢٠كجم وكمان مش بنحتاج نشيلها لانها مصنوعه من مواد تتحلل من تلقاء نفسها وتخرج مع الفضلات بعد ٤ل٥ شهور\r\n</p>', NULL, 1, NULL, '2023-09-20 11:14:24', '2023-09-20 11:14:30'),
(6, 1, 'service/sr-2-3.jpg', 'عمليات تصحيح', NULL, '<p>\r\nعمليات التصحيح بتتم في حالة فشل جراحات السمنه في الوصول للوزن المثالي او في حالة زيادة الوزن مرة اخري او في حالة حدوث مضاعفات وجراحات التصحيح بتحتاج خبرة كبيرة جدا للجراح لوجود التصاقات من العملية السابقة وكمان نوع معين من الغيارات لان الانسجة بتكون سميكة جدا وبيتم عمل اشعة مقطعية ثلاثية الابعاد علي المعدة لتحديد العملية المناسبة للتصحيح .  في حالة فشل عملية تكميم المعدة بيتم  التصحيح غالبا عن طريق تحويل المسار المصغر  \r\n</p>', NULL, 1, NULL, '2023-09-20 11:14:24', '2023-09-20 11:14:30'),
(7, 2, 'service/sr-2-3.jpg', 'شفط الدهون بالفيزر', NULL, '<p>\r\nشفط الدهون بالفيزر هو عملية إزالة الدهون من أجزاء معينة من الجسم باستخدام الموجات الصوتية. بمساعدة الموجات فوق الصوتية، يتم تكسير الزيوت واستخراجها في صورة سائلة. بينما تساعد علي إعادة تشكيل الجسم، تتم إزالة الدهون الموضعية من الجسم.\r\nكما تتميز تقنية شفط الدهون بالفيزر بأنها تمكن الطبيب من نحت أماكن دقيقة للغاية لا يمكن لغيرها من التقنيات أن تصل إليها مثل نحت شكل العضلات في الذقن على سبيل المثال، والتخلص من دهون الذراعين، والفخذين من الداخل ومنطقة البطن. \r\n</p>', NULL, 1, NULL, '2023-09-20 11:14:24', '2023-09-20 11:14:30'),
(8, 2, 'service/sr-2-3.jpg', 'شد البطن واصلاح ', NULL, '<p>\r\nهي إجراء جراحي يهدف إلى علاج ترهلات البطن والتخلص من الجلد الزائد والحصول على بطن مشدودة. تُعد جراحة شد البطن أحد العمليات التجميلية التي تهدف إلى إزالة الجلد الزائد وتقوية عضلات البطن، وذلك عندما يكون هناك كميات كبيرة من الجلد الزائد\r\nوتعتبر عملية شد البطن من العمليات التجميلية الشائعة في الوقت الحالي، \r\n</p>', NULL, 1, NULL, '2023-09-20 11:14:24', '2023-09-20 11:14:30'),
(9, 2, 'service/sr-2-3.jpg', 'نحتً القوام', NULL, '<p>\r\nهي عمليات تشكيل مناطق معينة في الجسم (أحياناً ما تصل إلى تنحيف الجسم كله) بالطريقة التي يرغب فيها مريض السمنة، وقد تكون النتائج المطلوبة بسيطة لا يرغب منها بأكثر من التخلص من “السيليوليت” (والذي يصعب التخلص منه بغير هذه الطرق. وتشمل: الفخذين وأسفلهما وأعلى الذراعين والبطن وتحت الإبط والوجه، والعديد من المناطق المختلفة في الجسم والتي تتراكم فيها الدهون\r\n</p>', NULL, 1, NULL, '2023-09-20 11:14:24', '2023-09-20 11:14:30'),
(10, 2, 'service/sr-2-3.jpg', 'علاج التثدي', NULL, '<p>\r\nمن الممكن علاج تثدي الرجال و التخلص من التثدي بطريقة شفط الدهون بالفيزر. شفط الدهون بالفيزر هي عملية إزالة الدهون باستخدام الموجات فوق الصوتية عالية التردد. نظرًا لأن الموجات الصوتية عالية التردد تستهدف الخلايا الدهنية فقط، أثناء علاج تثدي الرجال بالفيزر لا نلحق الضرر بالأنسجة الضامة والعضلية والشعيرية في أنسجة الثدي فهو أفضل علاج للتثدي عند الرجال\r\n</p>', NULL, 1, NULL, '2023-09-20 11:14:24', '2023-09-20 11:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `service_instructions`
--

DROP TABLE IF EXISTS `service_instructions`;
CREATE TABLE `service_instructions` (
  `id` bigint(20) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `admin_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_instructions`
--

INSERT INTO `service_instructions` (`id`, `service_id`, `title_ar`, `title_en`, `description_ar`, `description_en`, `admin_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'هل عملية تكميم المعدة مناسبة لمرضي ارتجاع المرئ؟', NULL, '<p>\r\nعملية التكميم غيرًمناسبة لمرضي ارتجاع المرئ لانها هتزود الضغط داخل المعده وهتزود ارتجاع الحامض\r\n</p>', NULL, 1, NULL, '2023-09-20 11:18:39', '2023-09-20 11:18:39'),
(2, 1, 'هل ممكن عمل عملية التكميم مع فتاق الحجاب الحاجز ؟ ', NULL, '<p>\r\nاه ممكن بشرط ان يكون المريض لا يعاني من اعراض ارتجاع مرئ مرضي شديدة وبيتم عمل التكميم وإصلاح فتاق الحجاب الحاجز في نفس العملية\r\n</p>', NULL, 1, NULL, '2023-09-20 11:18:39', '2023-09-20 11:18:39'),
(3, 1, 'ايهً نوع الدباسة المستخدم؟', NULL, '<p>\r\nبيتم استخدام الدباسة الباور الاوتوماتيك من شركة جونسون الامريكية  \r\nالدباسة الباور او الاوتوماتيكية هي اكثر أنواع الدباسات امانا لان عملية التدبيس بتتم بشكل اوتوماتيك  وده بيخلي صف الدبابيس منتظم تمامًا \r\nوكمان تقنية GST بتمنع انزلاق الانسجة اثناء عملية التدبيس وده بيمنع النزيف او التسريب بعد العملية\r\n</p>', NULL, 1, NULL, '2023-09-20 11:18:39', '2023-09-20 11:18:39'),
(4, 1, '1', '1', '1', '1', 1, NULL, NULL, NULL);

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
('1i4x1i5SfZrmqHxYBZLyxd5KptZUkD9jWB6vYYUq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVkRXWUhQdjhsNE00dmlCMVJlaUh0VEJ6WWlEbU5zQ3NQZk9GYTRMdSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FyL2FkbWluIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hci9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoibG9jYWxlIjtzOjI6ImFyIjt9', 1697559372),
('2eGSz0C1xzHgYSpYE7egoOxrw87WJ2iRyDueIPTR', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUDcwV1pHVkZqMHBJZUV1UnNOdlVmVzNKcEZOaUJGTUNTWm9NdGRjQiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FyL2FkbWluIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hci9hZG1pbi9zZXR0aW5ncyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoibG9jYWxlIjtzOjI6ImFyIjtzOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1698090186),
('aYLdikdpIdz0bJcviur8wFoY5N5sT6fgBPbCMMlt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWTB4Zkx4dXNHa3psdllkMDdEOUFBTWJWMHZhelpHRllnU3Z5NDVmTSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FyL2FkbWluIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hci9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoibG9jYWxlIjtzOjI6ImFyIjt9', 1697750259),
('dHnXujXvVhPFFAryjsdLeps5IkNBcObzbB2gzvUd', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoid1R1UFFtbzVjOHRLRkY5NjUzUm5aTUZOTTlveGIwZGFOOG9DSkcwVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hci9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoibG9jYWxlIjtzOjI6ImFyIjtzOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXIvYWRtaW4iO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1697490396),
('HUX9H3X96WihWfK4am1rRR2IiGRh1hzKBppqxQUD', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS3Yzektpb09XQVRwZ2hBdFdOZGFFS01Wd1Jsc3dtUTN5Q0lZRnZXWSI7czo2OiJsb2NhbGUiO3M6MjoiYXIiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXIvYWRtaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1697577109),
('o3bCrFKgF1naY4bW5dvSDIwyA6blAS08fht2V1wV', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRzBac0RUc0h2TjJoRHpVT0V0SXBheEtIaGlFOWRtU3ZMSWEwaFJrMSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozOToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FyL2FkbWluL3NldHRpbmdzIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hci9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoibG9jYWxlIjtzOjI6ImFyIjtzOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1698162060),
('XIa3uWVF1gEvVEgEdylUf23jIuhZ8QIwb2d9SUxf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicFBucmxYam5SSjVpeFQ2NGl6cWdsaEJoTHBiTVczd094Nks2eGtOVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hciI7fXM6NjoibG9jYWxlIjtzOjI6ImFyIjt9', 1698176899);

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
(1, 'phone', '01111026848', '2023-01-29 20:51:21', '2023-10-02 20:20:07', 2),
(2, 'phone2', '01050505226', '2023-01-29 22:28:50', '2023-08-09 09:40:03', 2),
(6, 'email', 'info@gmail.com', '2023-01-29 20:51:21', '2023-01-29 22:52:19', 1),
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
(1, 'slider/1.jpg', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(3, 'slider/3.jpg', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL);

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
  ADD UNIQUE KEY `name_ar` (`name_ar`),
  ADD UNIQUE KEY `name_en` (`name_en`);

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
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meettings`
--
ALTER TABLE `meettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `service_instructions`
--
ALTER TABLE `service_instructions`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `branch_galleries`
--
ALTER TABLE `branch_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `meettings`
--
ALTER TABLE `meettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service_instructions`
--
ALTER TABLE `service_instructions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
