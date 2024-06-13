-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 12, 2024 at 04:12 PM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u155617076_quart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_revenue`
--

CREATE TABLE `admin_revenue` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `amount` int(200) DEFAULT NULL,
  `coupon` varchar(200) DEFAULT NULL,
  `enroll_date` timestamp NULL DEFAULT NULL,
  `validity_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_revenue`
--

INSERT INTO `admin_revenue` (`id`, `course_id`, `student_id`, `amount`, `coupon`, `enroll_date`, `validity_date`, `created_at`) VALUES
(1, 1, 1, 200, '20', '2024-05-09 23:50:35', '2024-05-21 23:50:40', '2024-05-22 17:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `sub_category` varchar(200) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `subject` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `category`, `sub_category`, `class`, `subject`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Success Stories 1', '11', '12', 9, 13, 1, '2024-05-22 16:34:32', '2024-05-22 16:34:32'),
(10, 'Chapter 1', '9', '13', 20, 16, 1, '2024-05-24 03:07:01', '2024-05-24 03:07:01'),
(11, 'Chapter 2', '9', '13', 20, 16, 1, '2024-05-24 03:07:48', '2024-05-24 03:07:48'),
(12, 'Chapter 1', '10', '15', 14, 18, 1, '2024-05-24 03:10:25', '2024-05-24 03:10:25'),
(13, 'Chapter 1', '12', '18', 21, 19, 1, '2024-05-25 07:00:55', '2024-05-25 07:00:55'),
(14, 'Chapter 1', '12', '17', 22, 20, 1, '2024-05-25 07:07:03', '2024-05-25 07:07:03'),
(15, 'Chapter 1', '9', '13', 20, 21, 1, '2024-05-25 07:12:24', '2024-05-25 07:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `study_metrial`
--

CREATE TABLE `study_metrial` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `sub_category` varchar(200) DEFAULT NULL,
  `class` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT '1',
  `description` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `study_metrial`
--

INSERT INTO `study_metrial` (`id`, `title`, `link`, `category`, `sub_category`, `class`, `subject`, `status`, `description`, `created_at`, `updated_at`) VALUES
(5, 'aaaaaaaaaaaaaa', '1716780729.pdf', '12', '17', '22', '20', '1', 'aaaaaaaaaaaa', '2024-05-27 03:32:09', '2024-05-27 03:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `subject_category`
--

CREATE TABLE `subject_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_category`
--

INSERT INTO `subject_category` (`id`, `name`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(9, 'MEDICAL', '1716289527.png', 'Medical', 1, '2024-05-21 11:05:27', '2024-05-21 11:05:27'),
(10, 'ENGINEERING', '1716289562.jpeg', 'Engineering', 1, '2024-05-21 11:06:02', '2024-05-21 11:06:02'),
(11, 'SCHOOL', '1716289760.png', 'School', 1, '2024-05-21 11:09:20', '2024-05-21 11:09:20'),
(12, 'HOMEMAKER', '1716289805.jpeg', 'Homemaker', 1, '2024-05-21 11:10:05', '2024-05-21 11:10:05'),
(13, 'SPELLART', '1716289902.png', 'Spellart', 1, '2024-05-21 11:11:42', '2024-05-21 11:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audio_question`
--

CREATE TABLE `tbl_audio_question` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `audio_type` int(11) NOT NULL COMMENT '1=link,2=upload',
  `audio` varchar(255) NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `question_type` tinyint(4) NOT NULL COMMENT '1=normal, 2=true/false',
  `optiona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optionb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optionc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optiond` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optione` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_authenticate`
--

CREATE TABLE `tbl_authenticate` (
  `auth_id` int(11) NOT NULL,
  `auth_username` varchar(12) NOT NULL,
  `auth_pass` text NOT NULL,
  `role` varchar(32) NOT NULL,
  `permissions` mediumtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_authenticate`
--

INSERT INTO `tbl_authenticate` (`auth_id`, `auth_username`, `auth_pass`, `role`, `permissions`, `status`, `created`) VALUES
(1, 'quizart', '$2y$10$pOaboqwi18rN/zgKhiLkSOQDcor9EWRyGhjOIuYquN7MtoDGBoI3q', 'admin', '{\"users\":{\"read\":\"on\",\"update\":\"on\"},\"languages\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"categories\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"subcategories\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"category_order\":{\"read\":\"on\",\"update\":\"on\"},\"questions\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"daily_quiz\":{\"read\":\"on\",\"update\":\"on\"},\"manage_contest\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"manage_contest_question\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"import_contest_question\":{\"update\":\"on\"},\"fun_n_learn\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"guess_the_word\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"audio_question\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"maths_questions\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"exam_module\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"question_report\":{\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"send_notification\":{\"create\":\"on\",\"read\":\"on\",\"delete\":\"on\"},\"import_question\":{\"update\":\"on\"},\"system_configuration\":{\"read\":\"on\",\"update\":\"on\"},\"upload_languages\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"coin_store_settings\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 0, '2020-11-02 10:23:24'),
(8, 'ascithub', '$2y$10$FpktKoDD8JkAjA5kbiOKSe0jzzALgNG4DRLOzO1fFbvF4XNdfxwqG', 'admin', '{\"users\":{\"read\":\"on\",\"update\":\"on\"},\"languages\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"categories\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"subcategories\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"category_order\":{\"read\":\"on\",\"update\":\"on\"},\"questions\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"daily_quiz\":{\"read\":\"on\",\"update\":\"on\"},\"manage_contest\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"manage_contest_question\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"import_contest_question\":{\"update\":\"on\"},\"fun_n_learn\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"guess_the_word\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"audio_question\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"maths_questions\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"exam_module\":{\"create\":\"on\",\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"question_report\":{\"read\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"send_notification\":{\"create\":\"on\",\"read\":\"on\",\"delete\":\"on\"},\"import_question\":{\"update\":\"on\"},\"system_configuration\":{\"read\":\"on\",\"update\":\"on\"},\"upload_languages\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\"},\"coin_store_settings\":{\"create\":\"on\",\"update\":\"on\",\"delete\":\"on\"}}', 1, '2024-05-13 16:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_badges`
--

CREATE TABLE `tbl_badges` (
  `id` int(11) NOT NULL,
  `language_id` int(11) DEFAULT 14,
  `type` varchar(100) NOT NULL,
  `badge_label` varchar(200) NOT NULL,
  `badge_note` text NOT NULL,
  `badge_reward` int(11) NOT NULL,
  `badge_icon` varchar(100) NOT NULL,
  `badge_counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_badges`
--

INSERT INTO `tbl_badges` (`id`, `language_id`, `type`, `badge_label`, `badge_note`, `badge_reward`, `badge_icon`, `badge_counter`) VALUES
(1, 14, 'dashing_debut', 'Dashing Debut', 'Play first quiz zone game', 2, '1636692664.png', 1),
(2, 14, 'combat_winner', 'Combat Winner', 'Won random battle. If both users have completed the battle then the badge will unlock.', 5, '16366926641.png', 1),
(3, 14, 'clash_winner', 'Clash Winner', 'Won group battle. If a minimum of one opponent user has completed the battle then the badge will unlock.', 2, '16366926642.png', 1),
(4, 14, 'most_wanted_winner', 'Most Wanted Winner', 'Won contest', 10, '16366926643.png', 1),
(5, 14, 'ultimate_player', 'Ultimate Player', 'Highest point Gainer', 1, '16366926644.png', 0),
(6, 14, 'quiz_warrior', 'Quiz Warrior', 'Won back-to-back three random battles.  If both users have completed the battle then the badge will unlock.', 1, '16366926645.png', 3),
(7, 14, 'super_sonic', 'Super Sonic', 'Fastest puzzle solver. Need minimum 5 questions to unlock this badge.', 1, '16366926646.png', 25),
(8, 14, 'flashback', 'Flashback', 'Average time to solve fun & learn quiz questions. Need minimum 5 questions to unlock this badge.', 1, '16366926647.png', 8),
(9, 14, 'brainiac', 'Brainiac', 'Completed 100% quiz without using a lifeline. Need minimum 5 questions to unlock this badge.', 1, '16366926648.png', 0),
(10, 14, 'big_thing', 'Big Thing', '5k correct answer', 1, '16366926649.png', 5000),
(11, 14, 'elite', 'Elite', 'Earn coins more than 5k ', 1, '163669266410.png', 200),
(12, 14, 'thirsty', 'Thirty', 'Play daily quiz continuously 30 days', 1, '163669266411.png', 30),
(13, 14, 'power_elite', 'Power Elite', 'Achieved more than 10 badges', 1, '163669266412.png', 10),
(14, 14, 'sharing_caring', 'Sharing is Caring', 'Share application to more than 50 users', 1, '163669266413.png', 50),
(15, 14, 'streak', 'Streak', 'Maintain streak for 30 days', 1, '163669266414.png', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_battle_questions`
--

CREATE TABLE `tbl_battle_questions` (
  `id` int(11) NOT NULL,
  `match_id` varchar(128) NOT NULL,
  `questions` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_battle_questions`
--

INSERT INTO `tbl_battle_questions` (`id`, `match_id`, `questions`, `date_created`) VALUES
(1, '1PLHJrgP7CXHmsQa9oDx', '[{\"id\":\"1\",\"category\":\"4\",\"subcategory\":\"1\",\"language_id\":\"14\",\"image\":\"\",\"question\":\"<p>Winner of 2023 Cricket World Cup<\\/p>\\r\\n\",\"question_type\":\"1\",\"optiona\":\"<p>India<\\/p>\\r\\n\",\"optionb\":\"<p>Pakustan<\\/p>\\r\\n\",\"optionc\":\"<p>Australia<\\/p>\\r\\n\",\"optiond\":\"<p>England<\\/p>\\r\\n\",\"optione\":\"<p>SA<\\/p>\\r\\n\",\"answer\":\"c\",\"level\":\"1\",\"note\":\"\",\"cat_id\":\"4\",\"subcat_id\":\"1\"}]', '2024-05-08 07:43:47'),
(2, '1yXYCL9WbVjLQl3OQ685', '[{\"id\":\"3\",\"category\":\"6\",\"subcategory\":\"4\",\"language_id\":\"14\",\"image\":\"1715136618.jpeg\",\"question\":\"<p>How Many States in India?<\\/p>\\r\\n\",\"question_type\":\"1\",\"optiona\":\"<p>26<\\/p>\\r\\n\",\"optionb\":\"<p>27<\\/p>\\r\\n\",\"optionc\":\"<p>28<\\/p>\\r\\n\",\"optiond\":\"<p>30<\\/p>\\r\\n\",\"optione\":\"<p>22<\\/p>\\r\\n\",\"answer\":\"c\",\"level\":\"1\",\"note\":\"\",\"cat_id\":\"6\",\"subcat_id\":\"4\"}]', '2024-05-08 09:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_battle_statistics`
--

CREATE TABLE `tbl_battle_statistics` (
  `id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `is_drawn` tinyint(4) NOT NULL,
  `winner_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookmark`
--

CREATE TABLE `tbl_bookmark` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1-quiz_zone, 3-guess_the_word, 4-audio_question'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `category_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `slug` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `type` int(11) NOT NULL,
  `is_premium` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - no , 1 - yes',
  `coins` int(11) NOT NULL DEFAULT 0,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `row_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `language_id`, `category_name`, `slug`, `type`, `is_premium`, `coins`, `image`, `row_order`) VALUES
(14, 14, 'India', 'india', 1, 0, 0, '1716549913.jpeg', 1),
(12, 14, 'Movie', 'movie', 1, 1, 5, '1716549381.png', 2),
(13, 14, 'Music', 'music', 1, 0, 0, '1716549469.png', 4),
(11, 14, 'Sports', 'sports', 1, 1, 5, '17165495341.png', 3),
(10, 14, 'General Knowledge', 'general-knowledge', 1, 1, 5, '1716549183.jpeg', 0),
(15, 14, 'Fun', 'fun', 2, 1, 2, '1716621612.png', 0),
(17, 14, 'INDIA', 'india-1', 3, 1, 2, '1716622364.png', 0),
(18, 14, 'Maths', 'maths', 5, 0, 0, '1717742548.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `sub_category` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`id`, `name`, `category`, `sub_category`, `status`, `created_at`, `updated_at`) VALUES
(14, 'JEE', '10', '15', 1, '2024-05-24 02:46:29', '2024-05-24 02:46:29'),
(15, 'Class 11', '11', '11', 1, '2024-05-24 02:47:42', '2024-05-24 02:47:42'),
(16, 'Class 12', '11', '11', 1, '2024-05-24 02:48:10', '2024-05-24 02:48:10'),
(18, 'Class 12', '11', '12', 1, '2024-05-24 02:49:20', '2024-05-24 02:49:20'),
(19, 'For AIMS', '9', '14', 0, '2024-05-24 02:50:57', '2024-05-24 02:50:57'),
(20, 'All India', '9', '13', 1, '2024-05-24 02:51:34', '2024-05-24 02:51:34'),
(21, 'Fastfood', '12', '18', 1, '2024-05-24 02:53:58', '2024-05-24 02:53:58'),
(22, 'Cake / Pastry', '12', '17', 1, '2024-05-25 07:03:57', '2024-05-25 07:03:57'),
(23, 'ICU', '9', '13', 1, '2024-05-25 07:11:05', '2024-05-25 07:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coin_store`
--

CREATE TABLE `tbl_coin_store` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `coins` int(11) NOT NULL,
  `product_id` varchar(150) NOT NULL,
  `image` text DEFAULT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 - OFF , 1 - ON'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_coin_store`
--

INSERT INTO `tbl_coin_store` (`id`, `title`, `coins`, `product_id`, `image`, `description`, `status`) VALUES
(1, '5 Coins', 5, '5_consumable_coin', NULL, 'Small Pack', 1),
(11, 'Bronze', 100, 'Coin100', '1715494443.png', '100', 1),
(12, 'Gold', 1000, 'Gold', '1716809212.jpeg', 'Gold', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contest`
--

CREATE TABLE `tbl_contest` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `image` varchar(512) NOT NULL,
  `entry` int(11) NOT NULL,
  `prize_status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=deactive,1=active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_contest`
--

INSERT INTO `tbl_contest` (`id`, `language_id`, `name`, `start_date`, `end_date`, `description`, `image`, `entry`, `prize_status`, `date_created`, `status`) VALUES
(7, 14, 'General Knowledge', '2024-06-01 00:00:00', '2024-06-30 23:59:59', 'General Knowledge', '1716606854.jpg', 5, 0, '2024-05-25 03:14:14', 1),
(8, 14, 'Sports Quiz', '2024-06-01 00:00:00', '2024-06-30 23:59:59', 'Sport Quiz', '1716606956.jpg', 5, 0, '2024-05-25 03:15:56', 1),
(9, 14, 'Trivia Quiz', '2024-06-01 00:00:00', '2024-06-30 23:59:59', 'Trivia  Quiz', '1716607072.jpg', 2, 0, '2024-05-25 03:17:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contest_leaderboard`
--

CREATE TABLE `tbl_contest_leaderboard` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `questions_attended` int(11) NOT NULL,
  `correct_answers` int(11) NOT NULL,
  `score` double NOT NULL,
  `last_updated` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_contest_leaderboard`
--

INSERT INTO `tbl_contest_leaderboard` (`id`, `user_id`, `contest_id`, `questions_attended`, `correct_answers`, `score`, `last_updated`, `date_created`) VALUES
(1, 2, 1, 1, 1, 4, '2024-05-10 10:11:04', '2024-05-10 10:11:04'),
(2, 2, 2, 2, 2, 8, '2024-05-10 10:16:31', '2024-05-10 10:16:31'),
(3, 1, 6, 3, 3, 12, '2024-05-12 11:46:18', '2024-05-12 11:46:18'),
(4, 3, 6, 3, 1, -4, '2024-05-12 13:32:01', '2024-05-12 13:32:01'),
(5, 1, 5, 3, 2, 4, '2024-05-13 19:22:37', '2024-05-13 19:22:37'),
(6, 4, 9, 2, 1, 0, '2024-06-10 11:54:45', '2024-06-10 11:54:45'),
(7, 4, 8, 2, 2, 8, '2024-06-10 11:55:11', '2024-06-10 11:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contest_prize`
--

CREATE TABLE `tbl_contest_prize` (
  `id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `top_winner` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_contest_prize`
--

INSERT INTO `tbl_contest_prize` (`id`, `contest_id`, `top_winner`, `points`) VALUES
(1, 1, 1, 500),
(2, 1, 2, 250),
(3, 1, 3, 125),
(4, 2, 1, 500),
(5, 2, 2, 200),
(6, 3, 1, 100),
(7, 3, 2, 50),
(8, 3, 3, 25),
(9, 4, 1, 100),
(10, 4, 2, 50),
(11, 4, 3, 25),
(12, 5, 1, 100),
(13, 5, 2, 50),
(14, 5, 3, 25),
(15, 6, 1, 100),
(16, 6, 2, 50),
(17, 6, 3, 25),
(18, 7, 1, 25),
(19, 7, 2, 10),
(20, 7, 3, 5),
(21, 8, 1, 15),
(22, 8, 2, 5),
(23, 9, 1, 20),
(24, 9, 2, 10),
(25, 9, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contest_question`
--

CREATE TABLE `tbl_contest_question` (
  `id` int(11) NOT NULL,
  `langauge_id` int(11) NOT NULL DEFAULT 0,
  `contest_id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `question_type` int(11) NOT NULL COMMENT '1= normal, 2= true/false',
  `optiona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optionb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optionc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optiond` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optione` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `answer` varchar(12) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_contest_question`
--

INSERT INTO `tbl_contest_question` (`id`, `langauge_id`, `contest_id`, `image`, `question`, `question_type`, `optiona`, `optionb`, `optionc`, `optiond`, `optione`, `answer`, `note`) VALUES
(1, 0, 1, '', 'MBBS', 2, 'True', 'False', '', '', '', 'a', 'Pp'),
(2, 0, 2, '', 'Olive Oil is good for health?', 2, 'True', 'False', '', '', '', 'a', ''),
(3, 0, 3, '', 'India', 2, 'True', 'False', '', '', '', 'a', ''),
(4, 0, 1, '', 'Neat', 2, 'True', 'False', '', '', '', 'a', ''),
(5, 0, 2, '', 'Vitam B found in Fish', 2, 'True', 'False', '', '', '', 'a', ''),
(6, 0, 2, '', 'We should avoid in Diastase', 1, 'Mango', 'Karela', 'Paneer', 'Maida', 'Toned Milk', 'a', ''),
(7, 0, 4, '', 'Earth is known as the \"Blue Planet\".', 2, 'True', 'False', '', '', '', 'a', ''),
(8, 0, 4, '', 'What is the largest ocean in the world?', 1, 'Atlantic Ocean', 'Indian Ocean', 'Arctic Ocean', 'Pacific Ocean', 'New Ocean', 'd', ''),
(9, 0, 4, '', 'What is the chemical symbol for water?', 1, 'H2O', 'CO2', 'H2O2', 'CH4', 'C06', 'a', ''),
(10, 0, 5, '', 'Name the first Indian to win a Tennis Grand Slam ', 1, ' Ramesh Krishnan', ' Ramanathan Krishnan', ' Mahesh Bhupathi', 'Vijay Amritraj', ' Leander Paes', 'e', ''),
(11, 0, 5, '', 'In which year did India become the champion of world cup cricket for the first time?', 1, '1971', '1983', '2001', '2003', '1984', 'b', ''),
(12, 0, 5, '', 'Cricket is the national sport of the INDIA?', 2, 'True', 'False', '', '', '', 'a', ''),
(13, 0, 6, '', ' Uruguay won the first ever FIFA World Cup in 1930?', 2, 'True', 'False', '', '', '', 'a', ''),
(14, 0, 6, '', ' Isaac Newton discovered the theory of gravity?', 2, 'True', 'False', '', '', '', 'a', ''),
(15, 0, 6, '', 'Edgar Allan Poe wrote the famous play \"Hamlet\"?', 2, 'True', 'False', '', '', '', 'b', ''),
(16, 0, 7, '', 'Manik Shah Frist Filed Marshal of India', 2, 'True', 'False', '', '', '', 'a', 'none'),
(17, 0, 7, '', 'Earth is known as the \"Blue Planet\".', 2, 'True', 'False', '', '', '', 'a', 'None'),
(18, 0, 9, '', 'In which country did the Olympic Games originate?', 1, 'Greece', 'Egypt', 'Italy', 'Rome', 'USA', 'a', 'None'),
(19, 0, 9, '', 'Which planet is known as the \"Red Planet\"?', 1, 'Mars', 'Mercury', 'Venus', 'Jupiter', 'Moon', 'a', 'None'),
(20, 0, 8, '', 'Mr Neeraj is a Olympic Champion?', 2, 'True', 'False', '', '', '', 'a', ''),
(21, 0, 8, '', '2024 T20 Cricket World Cup will be held on USA', 2, 'True', 'False', '', '', '', 'a', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon`
--

CREATE TABLE `tbl_coupon` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(200) DEFAULT NULL,
  `discount_percent` varchar(200) DEFAULT NULL,
  `discount_amount` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_coupon`
--

INSERT INTO `tbl_coupon` (`id`, `coupon_code`, `discount_percent`, `discount_amount`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Test Coupon', '20', '', 1, '2024-06-03 03:24:41', '2024-06-03 03:24:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daily_quiz`
--

CREATE TABLE `tbl_daily_quiz` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `questions_id` text NOT NULL,
  `date_published` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_daily_quiz`
--

INSERT INTO `tbl_daily_quiz` (`id`, `language_id`, `questions_id`, `date_published`) VALUES
(1, 14, '3', '2024-05-12'),
(2, 14, '2', '2024-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daily_quiz_user`
--

CREATE TABLE `tbl_daily_quiz_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tbl_daily_quiz_user`
--

INSERT INTO `tbl_daily_quiz_user` (`id`, `user_id`, `date`) VALUES
(1, 1, '2024-05-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_module`
--

CREATE TABLE `tbl_exam_module` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date` date NOT NULL,
  `exam_key` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `answer_again` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_module_question`
--

CREATE TABLE `tbl_exam_module_question` (
  `id` int(11) NOT NULL,
  `exam_module_id` int(11) NOT NULL,
  `image` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `marks` int(11) NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `question_type` tinyint(4) NOT NULL COMMENT '1=normal, 2=true/false',
  `optiona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optionb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optionc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optiond` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optione` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_module_result`
--

CREATE TABLE `tbl_exam_module_result` (
  `id` int(11) NOT NULL,
  `exam_module_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `obtained_marks` varchar(200) NOT NULL,
  `total_duration` varchar(20) NOT NULL,
  `statistics` longtext NOT NULL,
  `status` int(11) NOT NULL COMMENT '2-in_exam, 3-completed',
  `rules_violated` tinyint(4) NOT NULL,
  `captured_question_ids` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fun_n_learn`
--

CREATE TABLE `tbl_fun_n_learn` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_fun_n_learn`
--

INSERT INTO `tbl_fun_n_learn` (`id`, `language_id`, `category`, `subcategory`, `title`, `detail`, `status`) VALUES
(1, 14, 15, 14, 'Indian', '<p>Indian</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fun_n_learn_question`
--

CREATE TABLE `tbl_fun_n_learn_question` (
  `id` int(11) NOT NULL,
  `fun_n_learn_id` int(11) NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `question_type` int(11) NOT NULL COMMENT '1= normal, 2= true/false',
  `optiona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optionb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optionc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optiond` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optione` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `answer` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_fun_n_learn_question`
--

INSERT INTO `tbl_fun_n_learn_question` (`id`, `fun_n_learn_id`, `question`, `question_type`, `optiona`, `optionb`, `optionc`, `optiond`, `optione`, `answer`) VALUES
(1, 1, 'Sabu is a Fiction Character', 2, 'True', 'False', '', '', '', 'a'),
(2, 1, 'Sabu Character written by Pran', 2, 'True', 'False', '', '', '', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guess_the_word`
--

CREATE TABLE `tbl_guess_the_word` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `image` text NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_guess_the_word`
--

INSERT INTO `tbl_guess_the_word` (`id`, `language_id`, `category`, `subcategory`, `image`, `question`, `answer`) VALUES
(3, 14, 5, 2, '', 'Gulab Nagri is name of', 'JAIPUR'),
(4, 14, 17, 15, '1716622513.png', 'Taj Mahal situated in ', 'AGRA'),
(5, 14, 17, 15, '1716622562.png', 'Qutub Minar situated in ', 'New Delhi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_languages`
--

CREATE TABLE `tbl_languages` (
  `id` int(11) NOT NULL,
  `language` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `code` varchar(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=Enabled, 0=Disabled',
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active, 0=deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_languages`
--

INSERT INTO `tbl_languages` (`id`, `language`, `code`, `status`, `type`) VALUES
(1, 'Amharic', 'am', 0, 0),
(2, 'Arabic', 'ar', 0, 0),
(3, 'Basque', 'eu', 0, 0),
(4, 'Bengali', 'bn', 0, 0),
(5, 'English (UK)', 'en-GB', 0, 0),
(6, 'Portuguese (Brazil)', 'pt-BR', 0, 0),
(7, 'Bulgarian', 'bg', 0, 0),
(8, 'Catalan', 'ca', 0, 0),
(9, 'Cherokee', 'chr', 0, 0),
(10, 'Croatian', 'hr', 0, 0),
(11, 'Czech', 'cs', 0, 0),
(12, 'Danish', 'da', 0, 0),
(13, 'Dutch', 'nl', 0, 0),
(14, 'English (US)', 'en', 1, 1),
(15, 'Estonian', 'et', 0, 0),
(16, 'Filipino', 'fil', 0, 0),
(17, 'Finnish', 'fi', 0, 0),
(18, 'French', 'fr', 0, 0),
(19, 'Greek', 'el', 0, 0),
(20, 'Gujarati', 'gu', 0, 0),
(21, 'Hebrew', 'iw', 0, 0),
(22, 'Hindi', 'hi', 0, 0),
(23, 'Hungarian', 'hu', 0, 0),
(24, 'Icelandic', 'is', 0, 0),
(25, 'Indonesian', 'id', 0, 0),
(26, 'German', 'de', 0, 0),
(27, 'Italian', 'it', 0, 0),
(28, 'Japanese', 'ja', 0, 0),
(29, 'Kannada', 'kn', 0, 0),
(30, 'Korean', 'ko', 0, 0),
(31, 'Latvian', 'lv', 0, 0),
(32, 'Lithuanian', 'lt', 0, 0),
(33, 'Malay', 'ms', 0, 0),
(34, 'Malayalam', 'ml', 0, 0),
(35, 'Marathi', 'mr', 0, 0),
(36, 'Norwegian', 'no', 0, 0),
(37, 'Polish', 'pl', 0, 0),
(38, 'Portuguese (Portugal)', 'pt-PT', 0, 0),
(39, 'Romanian', 'ro', 0, 0),
(40, 'Russian', 'ru', 0, 0),
(41, 'Serbian', 'sr', 0, 0),
(42, 'Chinese (PRC)', 'zh-CN', 0, 0),
(43, 'Slovak', 'sk', 0, 0),
(44, 'Slovenian', 'sl', 0, 0),
(45, 'Spanish', 'es', 0, 0),
(46, 'Swahili', 'sw', 0, 0),
(47, 'Swedish', 'sv', 0, 0),
(48, 'Tamil', 'ta', 0, 0),
(49, 'Telugu', 'te', 0, 0),
(50, 'Thai', 'th', 0, 0),
(51, 'Chinese (Taiwan)', 'zh-TW', 0, 0),
(52, 'Turkish', 'tr', 0, 0),
(53, 'Urdu', 'ur', 0, 0),
(54, 'Ukrainian', 'uk', 0, 0),
(55, 'Vietnamese', 'vi', 0, 0),
(56, 'Welsh', 'cy', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leaderboard_daily`
--

CREATE TABLE `tbl_leaderboard_daily` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_leaderboard_daily`
--

INSERT INTO `tbl_leaderboard_daily` (`id`, `user_id`, `score`, `date_created`) VALUES
(1, 2, 8, '2024-05-25 13:07:49'),
(2, 4, 8, '2024-06-10 11:54:45'),
(3, 1, 12, '2024-05-13 09:46:12'),
(4, 3, 0, '2024-05-12 13:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leaderboard_monthly`
--

CREATE TABLE `tbl_leaderboard_monthly` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `last_updated` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_leaderboard_monthly`
--

INSERT INTO `tbl_leaderboard_monthly` (`id`, `user_id`, `score`, `last_updated`, `date_created`) VALUES
(1, 2, 44, '2024-05-25 13:07:49', '2024-05-07 21:00:48'),
(2, 4, 4, '2024-05-11 16:39:33', '2024-05-11 16:39:33'),
(3, 1, 24, '2024-05-13 19:22:37', '2024-05-12 11:46:18'),
(4, 3, 0, '2024-05-12 13:32:01', '2024-05-12 13:32:01'),
(5, 4, 8, '2024-06-10 11:55:11', '2024-06-10 11:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`id`, `user_id`, `category`, `subcategory`, `level`) VALUES
(1, 2, 4, 1, 2),
(2, 2, 8, 5, 2),
(3, 2, 9, 6, 3),
(4, 4, 8, 5, 2),
(5, 1, 9, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maths_question`
--

CREATE TABLE `tbl_maths_question` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `image` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `question_type` tinyint(4) NOT NULL COMMENT '1=normal, 2=true/false',
  `optiona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optionb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optionc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optiond` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optione` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_maths_question`
--

INSERT INTO `tbl_maths_question` (`id`, `category`, `subcategory`, `language_id`, `image`, `question`, `question_type`, `optiona`, `optionb`, `optionc`, `optiond`, `optione`, `answer`, `note`) VALUES
(1, 7, 0, 14, '1715154694.png', '<p>What is the value of <span class=\"math-tex\">\\((4^3)\\)</span>?</p>\r\n', 1, '<p>12</p>\r\n', '<p>16</p>\r\n', '<p>64</p>\r\n', '<p>128</p>\r\n', '<p>256</p>\r\n', 'c', ''),
(2, 7, 0, 14, '', '<p>What is the value of sin(30&deg;)?</p>\r\n', 1, '<p>0.5</p>\r\n', '<p>0.707</p>\r\n', '<p>0.56</p>\r\n', '<p>0.76</p>\r\n', '<p>0.58</p>\r\n', 'a', ''),
(3, 18, 16, 14, '', '<p>2 * 2 ?</p>\r\n', 1, '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>5</p>\r\n', '<p>6</p>\r\n', '<p>8</p>\r\n', 'c', '<p>Best of Luck</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_month_week`
--

CREATE TABLE `tbl_month_week` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=month,2=week'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tbl_month_week`
--

INSERT INTO `tbl_month_week` (`id`, `name`, `type`) VALUES
(1, 'January', 1),
(2, 'February', 1),
(3, 'March', 1),
(4, 'April', 1),
(5, 'May', 1),
(6, 'June', 1),
(7, 'July', 1),
(8, 'August', 1),
(9, 'September', 1),
(10, 'October', 1),
(11, 'November', 1),
(12, 'December', 1),
(13, 'Sunday', 2),
(14, 'Monday', 2),
(15, 'Tuesday', 2),
(16, 'Wednesday', 2),
(17, 'Thursday', 2),
(18, 'Friday', 2),
(19, 'Saturday', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `users` varchar(8) NOT NULL DEFAULT 'all',
  `type` varchar(250) NOT NULL,
  `type_id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `date_sent` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_notifications`
--

INSERT INTO `tbl_notifications` (`id`, `title`, `message`, `users`, `type`, `type_id`, `image`, `date_sent`) VALUES
(1, 'Test', 'Test', 'all', 'default', 0, '1715168516.png', '2024-05-08 11:41:56'),
(2, 'EEEEEEEEEEEEEEEEE', 'EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE', 'all', 'default', 0, '', '2024-05-13 10:38:02'),
(3, 'rrrrrrrrr', 'rrrrrrrrrrrrrrrr', 'all', 'default', 0, '1717212194.png', '2024-06-01 03:23:14'),
(4, 'www', 'wwww', 'all', 'default', 0, '', '2024-06-01 03:24:13'),
(5, 'eee', 'eeeeeeeeeeeeeeee', 'all', 'default', 0, '1717212288.jpeg', '2024-06-01 03:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_request`
--

CREATE TABLE `tbl_payment_request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `uid` text NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `payment_address` varchar(225) NOT NULL,
  `payment_amount` varchar(20) NOT NULL,
  `coin_used` varchar(20) NOT NULL,
  `details` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0-pending, 1-completed, 2-invalid details',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `image` varchar(512) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `question_type` tinyint(4) NOT NULL COMMENT '1=normal, 2=true/false',
  `optiona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optionb` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optionc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optiond` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `optione` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `level` int(11) NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `category`, `subcategory`, `language_id`, `image`, `question`, `question_type`, `optiona`, `optionb`, `optionc`, `optiond`, `optione`, `answer`, `level`, `note`) VALUES
(1, 11, 0, 14, '1716551236.jpeg', '<p>Who won 2023 Cricket World Cup?</p>\r\n', 1, '<p>India</p>\r\n', '<p>Pakistan</p>\r\n', '<p>Australia</p>\r\n', '<p>England</p>\r\n', '<p>Ireland</p>\r\n', 'c', 1, '<p>Played in Ahmedabad Stadium</p>\r\n'),
(2, 11, 8, 14, '', '<p>Virat Kohli was Man of Tournament in 2023 World Cup</p>\r\n', 2, '<p>No</p>\r\n', '<p>Yes</p>\r\n', '', '', '', 'b', 2, '<p>None</p>\r\n'),
(3, 11, 9, 14, '1716550994.jpeg', '<p>2024 Olympich will be held in Paris</p>\r\n', 2, '<p>Yes</p>\r\n', '<p>No</p>\r\n', '', '', '', 'a', 1, '<p>None</p>\r\n'),
(4, 12, 10, 14, '', '<p>Rishi Kappor is Grand Son of Surendra Kapoor</p>\r\n', 2, '<p>No</p>\r\n', '<p>Yes</p>\r\n', '', '', '', 'a', 1, '<p>None</p>\r\n'),
(5, 12, 10, 14, '', '<p>First Indian Talking Movie Alamara</p>\r\n', 2, '<p>Yes</p>\r\n', '<p>No</p>\r\n', '', '', '', 'a', 2, '<p>None</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questioner_authinticate`
--

CREATE TABLE `tbl_questioner_authinticate` (
  `auth_id` int(11) NOT NULL,
  `auth_username` varchar(200) DEFAULT NULL,
  `auth_pass` text NOT NULL,
  `role` varchar(200) DEFAULT NULL,
  `permissions` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questioner_category`
--

CREATE TABLE `tbl_questioner_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `fees` varchar(200) NOT NULL DEFAULT '0.00',
  `prize` varchar(200) NOT NULL DEFAULT '0.00',
  `validity` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_questioner_category`
--

INSERT INTO `tbl_questioner_category` (`id`, `name`, `fees`, `prize`, `validity`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(6, 'FREE', '90000000000000.00', '10000000000000.00', 365, 'Freeeeeeeeeeeeeeee', '1716289189.png', 1, '2024-05-21 10:59:49', '2024-05-21 10:59:49'),
(7, 'PLATINUM MEMBERSHIP', '1100.00', '11000', 365, 'Platinum', '1716289291.jpeg', 1, '2024-05-21 11:01:31', '2024-05-21 11:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questioner_list`
--

CREATE TABLE `tbl_questioner_list` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `auth_username` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `contact` varchar(200) DEFAULT NULL,
  `regestration` varchar(200) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `auth_pass` text DEFAULT NULL,
  `degenation` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `identity_type` varchar(200) DEFAULT NULL,
  `identity_number` varchar(200) DEFAULT NULL,
  `identity_image` varchar(200) DEFAULT NULL,
  `questioner_image` varchar(200) DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `permissions` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `stand` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_questioner_list`
--

INSERT INTO `tbl_questioner_list` (`id`, `name`, `auth_username`, `image`, `contact`, `regestration`, `category`, `auth_pass`, `degenation`, `email`, `identity_type`, `identity_number`, `identity_image`, `questioner_image`, `role`, `permissions`, `status`, `stand`, `created_at`, `updated_at`) VALUES
(1, 'Deepak', 'deepak', NULL, '8874558712', '2024-05-11 07:13:55', 2, '$2y$10$tqQUlu0rsQNxE/d2PjTI0uLROg4MEuWszWJ.s.f2CVlO/7fY/8.bG', 'Test22', 'deepak@gmail.com', 'Aadhaar card', '123456', '1715498429.png', '1716003671.jpeg', NULL, NULL, 1, 1, '2024-05-11 19:13:55', '2024-05-11 19:13:55'),
(2, 'ASC LKO', 'ascithub', NULL, '8840483178', '2024-05-12 02:57:41', 4, '$2y$10$DiKiZBr5OC2oOZYeW8ZKveBHkhoQclkfHSzg/rSHRx/LxBdkORAvO', 'CEO', 'ascithub@gmail.com', 'Aadhaar card', '2222222222222', '1715595890.png', '1715517300.png', NULL, NULL, 1, 1, '2024-05-12 02:57:41', '2024-05-12 02:57:41'),
(6, 'Success Stories', 'samb8', NULL, '8874558719', '2024-05-12 06:51:50', 2, '$2y$10$tcL75oji2mnQS/nRthB47O3g5NHvbZQm3TkQZHL28IxRs2y6iIX56', 'vgggfgf', 'chaudharydkc988@gmail.com', 'Aadhaar card', 'vfgffgf', '1715496710.png', '17154967101.png', NULL, NULL, 0, 0, '2024-05-12 06:51:50', '2024-05-12 06:51:50'),
(9, 'RAJA', 'raja2024', NULL, '9876549870', '2024-05-23 11:03:28', 7, '$2y$10$FKnxIEosTjjizvrcDpP4LOmtvv7lL9pCjYqNg0Nviby4Q0qvAYrP6', 'RAJ', 'raja2024@gmail.com', 'Aadhaar card', '1111111111111111111', '1716462208.jpeg', '17164622081.jpeg', NULL, NULL, 1, 1, '2024-05-23 11:03:28', '2024-05-23 11:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questioner_question`
--

CREATE TABLE `tbl_questioner_question` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `sub_category` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `subject` int(11) DEFAULT NULL,
  `chapter` int(11) DEFAULT NULL,
  `question` varchar(200) DEFAULT NULL,
  `optiona` varchar(200) DEFAULT NULL,
  `optionb` varchar(200) DEFAULT NULL,
  `optionc` varchar(200) DEFAULT NULL,
  `optiond` varchar(200) DEFAULT NULL,
  `answer` varchar(200) DEFAULT NULL,
  `level` varchar(200) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `lavel` varchar(200) DEFAULT NULL,
  `points` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_questioner_question`
--

INSERT INTO `tbl_questioner_question` (`id`, `user_id`, `category`, `sub_category`, `class`, `subject`, `chapter`, `question`, `optiona`, `optionb`, `optionc`, `optiond`, `answer`, `level`, `note`, `status`, `lavel`, `points`, `created_at`) VALUES
(1, 2, 12, 18, 21, 19, 13, '<p>Pizza is a Dish from</p>\r\n', '<p>Germany</p>\r\n', '<p>Chinise</p>\r\n', '<p>Italy</p>\r\n', '<p>Turky</p>\r\n', 'c', '2', '<p>None</p>\r\n', 1, NULL, '', '2024-05-25 07:03:15'),
(2, 2, 12, 17, 22, 20, 14, '<p>Main integration of Cake</p>\r\n', '<p>Floar</p>\r\n', '<p>Fine Floar</p>\r\n', '<p>Cheeze</p>\r\n', '<p>Sugar</p>\r\n', 'b', '2', '<p>None</p>\r\n', 1, NULL, '', '2024-05-25 07:09:23'),
(3, 2, 9, 13, 20, 21, 15, '<p>Question Dumy</p>\r\n', '<p>Dumy</p>\r\n', '<p>Test</p>\r\n', '<p>True</p>\r\n', '<p>False</p>\r\n', 'a', '2', '<p>None</p>\r\n', 0, NULL, '', '2024-05-25 07:13:58'),
(4, 1, 12, 17, 22, 20, 14, '<p>Question 1</p>\r\n', '<p>A</p>\r\n', '<p>B</p>\r\n', '<p>C</p>\r\n', '<p>D</p>\r\n', 'b', '4', '<p>NONE</p>\r\n', 1, '2', '10', '2024-05-25 12:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question_reports`
--

CREATE TABLE `tbl_question_reports` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(512) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz_categories`
--

CREATE TABLE `tbl_quiz_categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '2-fun_n_learn, 3-guess_the_word, 4-audio_question',
  `type_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_quiz_categories`
--

INSERT INTO `tbl_quiz_categories` (`id`, `user_id`, `type`, `type_id`, `category`, `subcategory`) VALUES
(1, 2, 3, 0, 5, 2),
(2, 2, 5, 0, 7, 0),
(3, 2, 3, 0, 17, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `id` int(11) NOT NULL,
  `room_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_type` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `no_of_que` int(11) NOT NULL,
  `questions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `type` varchar(512) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `type`, `message`) VALUES
(1, 'about_us', '<p>Welcome to <strong>QUIZART Test</strong></p>\r\n<p>&nbsp;</p>'),
(2, 'contact_us', '<p>Contact Us</p>'),
(3, 'instructions', '<p>How to Play &amp; Win</p>'),
(161, 'app_validity', '2024-06-30'),
(162, 'protocol', 'smtp'),
(163, 'smtp_host', 'smtp.hostinger.com'),
(164, 'smtp_port', '587'),
(165, 'smtp_user', ' admin@quizart.co.in'),
(166, 'smtp_pass', 'adQC)ZjD}ukR@1'),
(168, 'fix_question_in_lavel', '1'),
(169, 'total_max_lavel', '8'),
(170, 'max_question_per_lavel', '10'),
(171, 'max_duration_each_question', '60'),
(172, 'review_answers_deduct', '10'),
(173, 'api_key', 'test'),
(174, 'api_secret', 'test'),
(175, 'payment_gateway_title', 'test'),
(176, 'payment_logo', '1717908481.png'),
(4, 'privacy_policy', '<p><strong>Privacy Policy</strong></p>'),
(5, 'terms_conditions', '<p><strong>Terms &amp; Conditions</strong></p>'),
(6, 'answer_mode', '1'),
(7, 'false_value', 'False'),
(8, 'true_value', 'True'),
(9, 'app_version', '1.0.0+1'),
(10, 'reward_coin', '4'),
(11, 'earn_coin', '100'),
(12, 'refer_coin', '50'),
(13, 'ios_more_apps', ''),
(14, 'ios_app_link', ''),
(15, 'more_apps', 'https://play.google.com'),
(16, 'app_link', 'https://play.google.com/'),
(17, 'system_timezone_gmt', '+05:30'),
(18, 'system_timezone', 'Asia/Kolkata'),
(19, 'language_mode', '1'),
(20, 'option_e_mode', '1'),
(21, 'quiz_zone_total_level_question', '10'),
(22, 'quiz_zone_fix_level_question', '1'),
(23, 'shareapp_text', 'Hello, This is a \'simple\' share \"text\". User will be happy to read '),
(24, 'contest_mode', '1'),
(25, 'daily_quiz_mode', '1'),
(26, 'force_update', '1'),
(27, 'fcm_server_key', 'AAAAuphElvw:APA91bF8FXy4TYlDy94iN2tWpXATOLfXqA1I5b4088POtx1v2U975wmTEr6eFwEA8he43kIx4azOGjRtUDli_yvC-3nBkoutpIQl9K99XBI3KfR44qFsLUwarb3iYfsWdIXRwLqOoySd'),
(28, 'battle_mode_random_category', '1'),
(29, 'battle_group_category_mode', '1'),
(30, 'app_name', 'Quizart'),
(31, 'full_logo', '1715050616.png'),
(32, 'half_logo', '17150506161.png'),
(33, 'jwt_key', 'set_your_strong_jwt_secret_key'),
(34, 'system_version', '2.1.7'),
(35, 'system_key', '$2y$10$ZysK4cNJ9THwurTuCFI0jOCWFw.2EqDEnvCj0lhanVscN9Nko1ray'),
(36, 'configuration_key', '$2y$10$tLIHoKyP/hbV4z/bxGLEu.O80WFgnTSJ/OKuzOFTLcICDvXQdR6E.'),
(38, 'fun_n_learn_question', '1'),
(39, 'guess_the_word_question', '1'),
(40, 'audio_mode_question', '0'),
(41, 'total_audio_time', '10'),
(42, 'app_version_ios', '1.0.0+1'),
(43, 'in_app_ads_mode', '1'),
(44, 'ads_type', '1'),
(45, 'android_banner_id', 'Android Banner Id'),
(46, 'android_interstitial_id', 'Android Interstitial Id'),
(47, 'android_rewarded_id', 'Android Rewarded Id'),
(48, 'ios_banner_id', 'IOS Banner Id'),
(49, 'ios_interstitial_id', 'IOS Interstitial Id'),
(50, 'ios_rewarded_id', 'IOS Rewarded Id'),
(56, 'ios_fb_banner_id', 'YOUR_PLACEMENT_ID'),
(55, 'android_fb_rewarded_id', 'YOUR_PLACEMENT_ID'),
(54, 'android_fb_interstitial_id', 'YOUR_PLACEMENT_ID'),
(53, 'android_fb_banner_id', 'YOUR_PLACEMENT_ID'),
(57, 'ios_fb_interstitial_id', 'YOUR_PLACEMENT_ID'),
(58, 'ios_fb_rewarded_id', 'YOUR_PLACEMENT_ID'),
(59, 'exam_module', '0'),
(60, 'payment_mode', 'Live'),
(61, 'payment_message', ''),
(62, 'per_coin', '10'),
(63, 'coin_amount', '1'),
(64, 'coin_limit', '100'),
(65, 'self_challenge_mode', '0'),
(66, 'in_app_purchase_mode', '1'),
(67, 'difference_hours', '48'),
(68, 'app_maintenance', '0'),
(69, 'maths_quiz_mode', '1'),
(71, 'android_game_id', 'Android Game Id'),
(72, 'ios_game_id', 'IOS Game Id'),
(73, 'maximum_winning_coins', '4'),
(74, 'minimum_coins_winning_percentage', '70'),
(75, 'score', '4'),
(76, 'quiz_zone_duration', '30'),
(77, 'self_challenge_max_minutes', '20'),
(78, 'guess_the_word_seconds', '60'),
(79, 'maths_quiz_seconds', '30'),
(80, 'fun_and_learn_time_in_seconds', '60'),
(81, 'battle_mode_one', '0'),
(82, 'battle_mode_group', '0'),
(83, 'true_false_mode', '0'),
(84, 'audio_quiz_seconds', '200'),
(85, 'battle_mode_random_in_seconds', '10'),
(86, 'welcome_bonus_coin', '100'),
(87, 'quiz_zone_lifeline_deduct_coin', '10'),
(88, 'battle_mode_random_entry_coin', '50'),
(89, 'guess_the_word_max_winning_coin', '10'),
(90, 'review_answers_deduct_coin', '10'),
(91, 'currency_symbol', '₹'),
(92, 'daily_ads_visibility', '0'),
(93, 'daily_ads_coins', '5'),
(94, 'daily_ads_counter', '1'),
(95, 'quiz_zone_mode', '1'),
(96, 'quiz_winning_percentage', '30'),
(97, 'quiz_zone_wrong_answer_deduct_score', '4'),
(98, 'quiz_zone_correct_answer_credit_score', '4'),
(99, 'guess_the_word_fix_question', '1'),
(100, 'guess_the_word_total_question', '10'),
(101, 'guess_the_word_max_hints', '2'),
(102, 'guess_the_word_wrong_answer_deduct_score', '4'),
(103, 'guess_the_word_correct_answer_credit_score', '4'),
(104, 'audio_quiz_fix_question', '1'),
(105, 'audio_quiz_total_question', '10'),
(106, 'audio_quiz_wrong_answer_deduct_score', '20'),
(107, 'audio_quiz_correct_answer_credit_score', '20'),
(108, 'maths_quiz_fix_question', '1'),
(109, 'maths_quiz_total_question', '10'),
(110, 'maths_quiz_wrong_answer_deduct_score', '4'),
(111, 'maths_quiz_correct_answer_credit_score', '4'),
(112, 'fun_n_learn_quiz_fix_question', '1'),
(113, 'fun_n_learn_total_question', '10'),
(114, 'fun_n_learn_quiz_wrong_answer_deduct_score', '4'),
(115, 'fun_n_learn_quiz_correct_answer_credit_score', '4'),
(116, 'true_false_quiz_fix_question', '1'),
(117, 'true_false_total_question', '10'),
(118, 'true_false_quiz_in_seconds', '60'),
(119, 'true_false_quiz_wrong_answer_deduct_score', '20'),
(120, 'fun_n_learn_correct_answer_credit_score', '4'),
(121, 'battle_mode_one_category', '1'),
(122, 'battle_mode_one_fix_question', '1'),
(123, 'battle_mode_one_total_question', '10'),
(124, 'battle_mode_one_in_seconds', '10'),
(125, 'battle_mode_one_wrong_answer_deduct_score', '20'),
(126, 'battle_mode_one_correct_answer_credit_score', '20'),
(127, 'battle_mode_one_quickest_correct_answer_extra_score', '20'),
(128, 'battle_mode_one_second_quickest_correct_answer_extra_score', '60'),
(129, 'battle_mode_one_code_char', '1'),
(130, 'battle_mode_one_entry_coin', '20'),
(131, 'battle_mode_group_category', '1'),
(132, 'battle_mode_group_fix_question', '1'),
(133, 'battle_mode_group_total_question', '60'),
(134, 'battle_mode_group_in_seconds', '60'),
(135, 'battle_mode_group_wrong_answer_deduct_score', '10'),
(136, 'battle_mode_group_correct_answer_credit_score', '10'),
(137, 'battle_mode_group_quickest_correct_answer_extra_score', '10'),
(138, 'battle_mode_group_second_quickest_correct_answer_extra_score', '10'),
(139, 'battle_mode_group_code_char', '2'),
(140, 'battle_mode_group_entry_coin', '50'),
(141, 'battle_mode_random_fix_question', '1'),
(142, 'battle_mode_random_total_question', '60'),
(143, 'battle_mode_random_wrong_answer_deduct_score', '50'),
(144, 'battle_mode_random_correct_answer_credit_score', '40'),
(145, 'battle_mode_random_quickest_correct_answer_extra_score', '30'),
(146, 'battle_mode_random_second_quickest_correct_answer_extra_score', '30'),
(147, 'battle_mode_random_search_duration', '40'),
(148, 'self_challenge_max_questions', '30'),
(149, 'exam_module_resume_exam_timeout', '20'),
(150, 'question_shuffle_mode', '1'),
(151, 'option_shuffle_mode', '1'),
(152, 'battle_mode_random', '0'),
(153, 'true_false_quiz_correct_answer_credit_score', '20'),
(154, 'contest_mode_wrong_deduct_score', '4'),
(155, 'contest_mode_correct_credit_score', '4'),
(156, 'background_file', 'background-image.png'),
(157, 'fun_n_learn_quiz_total_question', '10'),
(158, 'true_false_quiz_total_question', '20'),
(167, 'option_visible_mode', '1'),
(159, 'footer_copyrights_text', ''),
(160, 'theme_color', '#1E1295FF');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_category`
--

CREATE TABLE `tbl_student_category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1-Active, 0-Deactive',
  `validity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_student_category`
--

INSERT INTO `tbl_student_category` (`id`, `name`, `image`, `description`, `status`, `validity`, `created_at`, `updated_at`) VALUES
(20, 'FREE', '1716288134.png', 'Limited Access', 1, 7, '2024-05-21 10:42:14', '2024-05-21 10:42:14'),
(21, 'SILVER', '1716288227.jpeg', 'Valid for 90 Days', 1, 90, '2024-05-21 10:43:47', '2024-05-21 10:43:47'),
(22, 'GOLD', '1716288302.jpeg', '180 days valid with full acess', 1, 180, '2024-05-21 10:45:02', '2024-05-21 10:45:02'),
(23, 'PLATINUM', '1716288408.jpeg', 'FULL ACESS', 1, 365, '2024-05-21 10:46:48', '2024-05-21 10:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_subcategory`
--

CREATE TABLE `tbl_student_subcategory` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `fees` decimal(6,2) NOT NULL DEFAULT 0.00,
  `prize` varchar(200) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_student_subcategory`
--

INSERT INTO `tbl_student_subcategory` (`id`, `cat_id`, `name`, `image`, `description`, `status`, `fees`, `prize`, `created_at`, `updated_at`) VALUES
(10, 20, 'Free', '1716288690.png', 'Freeeeeeeeeeeeeeee', 1, 0.00, '500.00', '2024-05-21 10:51:30', '2024-05-21 10:51:30'),
(11, 21, 'Silver', '1716288754.jpeg', 'Silver', 1, 250.00, '1000.00', '2024-05-21 10:52:34', '2024-05-21 10:52:34'),
(12, 22, 'Gold Memebership', '1716288824.jpeg', 'Gold', 1, 1000.00, '3000.00', '2024-05-21 10:53:45', '2024-05-21 10:53:45'),
(13, 23, 'Platinum Membership', '1716289022.jpeg', 'Platinum', 1, 5000.00, '99999999999.99', '2024-05-21 10:57:02', '2024-05-21 10:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 0,
  `maincat_id` int(11) NOT NULL,
  `subcategory_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `slug` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Deactive',
  `is_premium` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - no , 1 - yes',
  `coins` int(11) NOT NULL DEFAULT 0,
  `row_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`id`, `language_id`, `maincat_id`, `subcategory_name`, `slug`, `image`, `status`, `is_premium`, `coins`, `row_order`) VALUES
(1, 14, 4, 'Cricket', 'cricket', '1715135465.png', 1, 0, 0, 0),
(2, 14, 5, 'Historic Monuments ', 'historic-monuments', '1715137157.png', 1, 0, 0, 0),
(3, 14, 4, 'Olympic 24', 'olympic-24', '1715136438.png', 1, 0, 0, 0),
(4, 14, 6, 'Indian', 'indian', '1715136347.jpeg', 1, 0, 0, 0),
(5, 14, 8, 'Movie', 'movie', '1715167776.png', 1, 0, 0, 0),
(6, 14, 9, 'Indian', 'indian-1', '1715224684.jpeg', 1, 0, 0, 0),
(7, 14, 9, 'International', 'international', '1715224697.jpeg', 1, 0, 0, 0),
(8, 14, 11, 'Cricket', 'cricket-1', '1716549587.png', 1, 1, 2, 0),
(9, 14, 11, 'Olympic 24', 'olympic-24-1', '1716549639.png', 1, 1, 2, 0),
(10, 14, 12, 'Bollywood', 'bollywood', '1716549774.jpeg', 1, 1, 2, 0),
(11, 14, 14, 'Monuments', 'monuments', '1716549948.png', 1, 0, 0, 0),
(12, 14, 13, 'Foak Music', 'foak-music', '1716550166.png', 1, 0, 0, 0),
(13, 14, 10, 'Country', 'country', '1716550397.jpeg', 1, 1, 2, 0),
(14, 14, 15, 'Fiction', 'fiction', '1716621812.jpeg', 1, 1, 2, 0),
(15, 14, 17, 'Monuments', 'monuments-1', '1716622423.png', 1, 1, 2, 0),
(16, 14, 18, 'Test', 'test', '1717742598.jpeg', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `name`, `category`, `subcategory`, `class`, `status`, `created_at`, `updated_at`) VALUES
(13, 'Success Stories', 11, 12, 9, 1, '2024-05-22 16:31:23', '2024-05-22 16:31:23'),
(14, 'Botany', 11, 12, 18, 1, '2024-05-24 02:59:42', '2024-05-24 02:59:42'),
(15, 'Zoology', 11, 12, 18, 1, '2024-05-24 03:00:48', '2024-05-24 03:00:48'),
(16, 'Medicine', 9, 13, 20, 1, '2024-05-24 03:02:50', '2024-05-24 03:02:50'),
(17, 'Microbiology', 9, 13, 20, 1, '2024-05-24 03:03:52', '2024-05-24 03:03:52'),
(18, 'Maths', 10, 15, 14, 1, '2024-05-24 03:09:00', '2024-05-24 03:09:00'),
(19, 'Oven', 12, 18, 21, 1, '2024-05-25 06:58:31', '2024-05-25 06:58:31'),
(20, 'Cake', 12, 17, 22, 1, '2024-05-25 07:05:37', '2024-05-25 07:05:37'),
(21, 'MBBS', 9, 13, 20, 1, '2024-05-25 07:11:36', '2024-05-25 07:11:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject_subcategory`
--

CREATE TABLE `tbl_subject_subcategory` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `yearly_fees` varchar(200) NOT NULL DEFAULT '0',
  `half_fees` varchar(200) NOT NULL DEFAULT '0',
  `annual_fees` varchar(200) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_subject_subcategory`
--

INSERT INTO `tbl_subject_subcategory` (`id`, `cat_id`, `name`, `image`, `description`, `status`, `yearly_fees`, `half_fees`, `annual_fees`, `created_at`, `updated_at`) VALUES
(11, 11, 'Commerce', '1716345865.png', NULL, 1, '1100.00', '600.00', '350.00', '2024-05-22 02:40:39', '2024-05-22 02:40:39'),
(12, 11, 'Biology', '1716346039.png', NULL, 1, '1100.00', '600.00', '350.00', '2024-05-22 02:47:19', '2024-05-22 02:47:19'),
(13, 9, 'Medical Entrance', '1716346312.png', NULL, 1, '2100.00', '1300.00', '700.00', '2024-05-22 02:51:52', '2024-05-22 02:51:52'),
(14, 9, 'Nursing Preparation', '1716346425.jpeg', NULL, 1, '2100.00', '1200.00', '700.00', '2024-05-22 02:53:45', '2024-05-22 02:53:45'),
(15, 10, 'Engineering Entrance', '1716346647.png', NULL, 1, '2100.00', '1300.00', '700.00', '2024-05-22 02:57:27', '2024-05-22 02:57:27'),
(16, 13, 'Class 9', '1716346753.png', NULL, 1, '500.00', '300.00', '200.00', '2024-05-22 02:59:13', '2024-05-22 02:59:13'),
(17, 12, 'Baking', '1716346872.png', NULL, 1, '1200.00', '700.00', '400.00', '2024-05-22 03:01:12', '2024-05-22 03:01:12'),
(18, 12, 'Cooking', '1716347067.png', NULL, 1, '11000000000000000000.00', '60000000000000.00', '40000000000000.00', '2024-05-22 03:04:27', '2024-05-22 03:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracker`
--

CREATE TABLE `tbl_tracker` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `uid` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `points` varchar(255) NOT NULL,
  `type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0-add, 1-deduct',
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_tracker`
--

INSERT INTO `tbl_tracker` (`id`, `user_id`, `uid`, `points`, `type`, `status`, `date`) VALUES
(1, 1, 'lo04IDO4w9SAjmygHgFoseOKvgm2', '10', 'welcomeBonus', 0, '2024-05-07'),
(2, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '10', 'welcomeBonus', 0, '2024-05-07'),
(3, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '4', 'wonQuizZone', 0, '2024-05-07'),
(4, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '10', 'wonGuessTheWord', 0, '2024-05-07'),
(5, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '-10', 'Unlocked Advance Math', 1, '2024-05-08'),
(6, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '-10', 'reviewAnswerLbl', 1, '2024-05-08'),
(7, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '4', 'wonMathQuiz', 0, '2024-05-08'),
(8, 3, 'icSWLc76QogekOaYiTxlc9RQdfF2', '10', 'welcomeBonus', 0, '2024-05-08'),
(9, 4, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '10', 'welcomeBonus', 0, '2024-05-08'),
(10, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '4', 'wonQuizZone', 0, '2024-05-08'),
(11, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '4', 'wonQuizZone', 0, '2024-05-09'),
(12, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '4', 'wonQuizZone', 0, '2024-05-09'),
(13, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '-5', 'Played Contest', 1, '2024-05-10'),
(14, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '-5', 'Played Contest', 1, '2024-05-10'),
(15, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '-5', 'Played Contest', 1, '2024-05-10'),
(16, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '-5', 'Played Contest', 1, '2024-05-10'),
(17, 4, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '4', 'wonQuizZone', 0, '2024-05-11'),
(18, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '100', 'welcomeBonus', 0, '2024-05-11'),
(19, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '100', 'welcomeBonus', 0, '2024-05-12'),
(20, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '-5', 'Played Contest', 1, '2024-05-12'),
(21, 3, 'lo04IDO4w9SAjmygHgFoseOKvgm2', '100', 'welcomeBonus', 0, '2024-05-12'),
(22, 3, 'lo04IDO4w9SAjmygHgFoseOKvgm2', '-5', 'Played Contest', 1, '2024-05-12'),
(23, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '-5', 'Played Contest', 1, '2024-05-13'),
(24, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '4', 'wonQuizZone', 0, '2024-05-13'),
(25, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '4', 'wonQuizZone', 0, '2024-05-13'),
(26, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '-5', 'Played Contest', 1, '2024-05-13'),
(27, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '-10', 'reviewAnswerLbl', 1, '2024-05-13'),
(28, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '2', 'rewardByScratchingCard', 0, '2024-05-14'),
(29, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '1', 'rewardByScratchingCard', 0, '2024-05-14'),
(30, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '10', 'rewardByScratchingCard', 0, '2024-05-14'),
(31, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '-5', 'Played Contest', 1, '2024-05-14'),
(32, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '-5', 'Played Contest', 1, '2024-05-16'),
(33, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '-5', 'Unlocked Sports', 1, '2024-05-24'),
(34, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '-2', 'Unlocked Fun', 1, '2024-05-25'),
(35, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '-2', 'Unlocked Fiction', 1, '2024-05-25'),
(36, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '-2', 'Unlocked INDIA', 1, '2024-05-25'),
(37, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '-2', 'Unlocked Monuments', 1, '2024-05-25'),
(38, 2, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '10', 'wonGuessTheWord', 0, '2024-05-25'),
(39, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '9', 'adminAdded', 0, '2024-05-27'),
(40, 1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', '100', 'welcomeBonus', 0, '2024-06-05'),
(41, 2, 'icSWLc76QogekOaYiTxlc9RQdfF2', '100', 'welcomeBonus', 0, '2024-06-06'),
(42, 3, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', '100', 'welcomeBonus', 0, '2024-06-06'),
(43, 4, 'wxtmaGCoGjaWNwIsj6YfdYFk6ZB3', '100', 'welcomeBonus', 0, '2024-06-10'),
(44, 4, 'wxtmaGCoGjaWNwIsj6YfdYFk6ZB3', '-2', 'Played Contest', 1, '2024-06-10'),
(45, 4, 'wxtmaGCoGjaWNwIsj6YfdYFk6ZB3', '-5', 'Played Contest', 1, '2024-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upload_languages`
--

CREATE TABLE `tbl_upload_languages` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `file` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firebase_id` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '',
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `mobile` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `type` varchar(16) NOT NULL,
  `profile` varchar(128) NOT NULL,
  `fcm_id` varchar(1024) DEFAULT NULL,
  `coins` int(11) NOT NULL DEFAULT 0,
  `refer_code` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `friends_code` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `remove_ads` tinyint(4) NOT NULL DEFAULT 0,
  `daily_ads_counter` int(11) NOT NULL DEFAULT 0 COMMENT 'Daily ads counter',
  `daily_ads_date` date NOT NULL DEFAULT '2023-10-19' COMMENT 'Daily ads date',
  `status` int(10) UNSIGNED DEFAULT 0,
  `category` int(11) DEFAULT NULL,
  `date_registered` datetime NOT NULL,
  `api_token` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `firebase_id`, `name`, `email`, `mobile`, `type`, `profile`, `fcm_id`, `coins`, `refer_code`, `friends_code`, `remove_ads`, `daily_ads_counter`, `daily_ads_date`, `status`, `category`, `date_registered`, `api_token`) VALUES
(1, 'vsGEmwvWr3e4GW7KVXU4GvPdroM2', 'ASCITHUB', 'ascithub@gmail.com', '8840483178', 'mobile', '1717560488.png', 'e60s5oTBR3iV760Eqpd9NB:APA91bE1XTBWiqWVcAImpZjFamEwdlSEduqog43yRu_TiwLWbRt_MWhuK72RcbSTEbMJCaN8jean2E-85gYnqPevMPJWxBMcyopwCuzytvzZRUeLUC7lPp2_GFZO86fjE8DPNo7lgwcB', 100, '3kEr1', '', 0, 0, '2024-06-12', 1, 21, '2024-06-05 09:37:25', 'eyJ0eXAiOiJqd3QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MTgwMjAwNzgsImlzcyI6IlF1aXoiLCJleHAiOjE3MjA2MTIwNzgsInVzZXJfaWQiOiIxIiwiZmlyZWJhc2VfaWQiOiJ2c0dFbXd2V3IzZTRHVzdLVlhVNEd2UGRyb00yIiwic3ViIjoiUXVpeiBBdXRoZW50aWNhdGlvbiJ9.9R7TbH6G3lXWVW3JhL3SO9QsLESKYdBNfEZjP55gk4o'),
(2, 'icSWLc76QogekOaYiTxlc9RQdfF2', 'ASC ITHUB', 'ascithub@gmail.com', '8853183117', 'email', 'https://lh3.googleusercontent.com/a/ACg8ocJj0SBGrwTmqZJINT_gBy1O6PdDd-sUFl47TbUZZ22KJjed-LVI=s96-c', 'empty', 100, 'nyAV2', '', 0, 0, '2024-06-06', 0, NULL, '2024-06-06 09:15:29', 'eyJ0eXAiOiJqd3QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MTc2NDU1MzAsImlzcyI6IlF1aXoiLCJleHAiOjE3MjAyMzc1MzAsInVzZXJfaWQiOjIsImZpcmViYXNlX2lkIjoiaWNTV0xjNzZRb2dla09hWWlUeGxjOVJRZGZGMiIsInN1YiI6IlF1aXogQXV0aGVudGljYXRpb24ifQ.BGLB2CummGu6jngkKA8OOClOKMTTrTzs1bteasolXdo'),
(3, 'WF4oe2DGaoTYfw5IspZV7oPcNHc2', 'pp', 'rajshri1970@gmail.com', '', 'mobile', '1717669755.png', 'empty', 100, 'TyM33', '', 0, 0, '2024-06-06', 1, NULL, '2024-06-06 15:57:54', 'eyJ0eXAiOiJqd3QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MTc2Njk5NjEsImlzcyI6IlF1aXoiLCJleHAiOjE3MjAyNjE5NjEsInVzZXJfaWQiOiIzIiwiZmlyZWJhc2VfaWQiOiJXRjRvZTJER2FvVFlmdzVJc3BaVjdvUGNOSGMyIiwic3ViIjoiUXVpeiBBdXRoZW50aWNhdGlvbiJ9.WG-1rQRIY-LPl5oTNftuXjJN8kl9Qp6-_CxPDvxcn8w'),
(4, 'wxtmaGCoGjaWNwIsj6YfdYFk6ZB3', 'smit', '', '+917201986642', 'mobile', '1718000660.png', 'fzNnzjyKRgeBCR23UzdGm-:APA91bHPBa2qq865-QnKJwF7lN9lfVKnlshdoziQErvZUjO0nzsQT5CYAEM6wISmmTQEyl_m2maXy8lle2l3hlOZW7CkwMrnlXv7LTJ4WzOiztmkMOMlTcjgI34o2yyhTcvJAnXFtYZj', 93, '6frm4', '', 0, 0, '2024-06-12', 1, NULL, '2024-06-10 11:53:56', 'eyJ0eXAiOiJqd3QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE3MTgxNjc5MTAsImlzcyI6IlF1aXoiLCJleHAiOjE3MjA3NTk5MTAsInVzZXJfaWQiOiI0IiwiZmlyZWJhc2VfaWQiOiJ3eHRtYUdDb0dqYVdOd0lzajZZZmRZRms2WkIzIiwic3ViIjoiUXVpeiBBdXRoZW50aWNhdGlvbiJ9.S832yX55AmrBzsZYs_DNiDNd1wWjPHBibGXWkr6sawA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_badges`
--

CREATE TABLE `tbl_users_badges` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dashing_debut` int(11) NOT NULL,
  `dashing_debut_counter` int(11) NOT NULL,
  `combat_winner` int(11) NOT NULL,
  `combat_winner_counter` int(11) NOT NULL,
  `clash_winner` int(11) NOT NULL,
  `clash_winner_counter` int(11) NOT NULL,
  `most_wanted_winner` int(11) NOT NULL,
  `most_wanted_winner_counter` int(11) NOT NULL,
  `ultimate_player` int(11) NOT NULL,
  `quiz_warrior` int(11) NOT NULL,
  `quiz_warrior_counter` int(11) NOT NULL,
  `super_sonic` int(11) NOT NULL,
  `flashback` int(11) NOT NULL,
  `brainiac` int(11) NOT NULL,
  `big_thing` int(11) NOT NULL,
  `elite` int(11) NOT NULL,
  `thirsty` int(11) NOT NULL,
  `thirsty_date` date DEFAULT NULL,
  `thirsty_counter` int(11) NOT NULL,
  `power_elite` int(11) NOT NULL,
  `power_elite_counter` int(11) NOT NULL,
  `sharing_caring` int(11) NOT NULL,
  `streak` int(11) NOT NULL,
  `streak_date` date DEFAULT NULL,
  `streak_counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users_badges`
--

INSERT INTO `tbl_users_badges` (`id`, `user_id`, `dashing_debut`, `dashing_debut_counter`, `combat_winner`, `combat_winner_counter`, `clash_winner`, `clash_winner_counter`, `most_wanted_winner`, `most_wanted_winner_counter`, `ultimate_player`, `quiz_warrior`, `quiz_warrior_counter`, `super_sonic`, `flashback`, `brainiac`, `big_thing`, `elite`, `thirsty`, `thirsty_date`, `thirsty_counter`, `power_elite`, `power_elite_counter`, `sharing_caring`, `streak`, `streak_date`, `streak_counter`) VALUES
(1, 1, 2, 1, 0, 0, 0, 0, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 2, '0000-00-00', 0, 0, 3, 0, 0, '2024-06-12', 8),
(2, 2, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 2, 0, 0, '2024-06-06', 1),
(3, 3, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 1, 0, 0, '2024-06-06', 1),
(4, 4, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 2, 0, 0, '2024-06-12', 1),
(5, 1, 2, 1, 0, 0, 0, 0, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 2, '0000-00-00', 0, 0, 3, 0, 0, '2024-06-12', 8),
(6, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, '2024-06-06', 1),
(7, 3, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 1, 0, 0, '2024-06-06', 1),
(8, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, '2024-06-12', 8),
(9, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, '2024-06-06', 1),
(10, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 0, 0, 0, '2024-06-06', 1),
(11, 4, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00', 0, 0, 2, 0, 0, '2024-06-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_statistics`
--

CREATE TABLE `tbl_users_statistics` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `questions_answered` int(11) NOT NULL,
  `correct_answers` int(11) NOT NULL,
  `strong_category` int(11) NOT NULL,
  `ratio1` double NOT NULL,
  `weak_category` int(11) NOT NULL,
  `ratio2` double NOT NULL,
  `best_position` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_users_statistics`
--

INSERT INTO `tbl_users_statistics` (`id`, `user_id`, `questions_answered`, `correct_answers`, `strong_category`, `ratio1`, `weak_category`, `ratio2`, `best_position`, `date_created`) VALUES
(1, 2, 13, 12, 4, 100, 7, 0, 1, '2024-05-07 21:00:48'),
(2, 4, 7, 6, 8, 100, 0, 50, 2, '2024-05-11 16:39:33'),
(3, 1, 13, 12, 4, 100, 0, 0, 2, '2024-05-12 11:46:18'),
(4, 3, 3, 1, 0, 0, 0, 33, 0, '2024-05-12 13:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_category`
--

CREATE TABLE `tbl_user_category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_category`
--

INSERT INTO `tbl_user_category` (`id`, `user_id`, `category_id`) VALUES
(2, 1, 11),
(1, 2, 7),
(3, 2, 15),
(4, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_subcategory`
--

CREATE TABLE `tbl_user_subcategory` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_subcategory`
--

INSERT INTO `tbl_user_subcategory` (`id`, `user_id`, `subcategory_id`) VALUES
(1, 2, 14),
(2, 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_settings`
--

CREATE TABLE `tbl_web_settings` (
  `id` int(11) NOT NULL,
  `language_id` int(11) DEFAULT 14,
  `type` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_web_settings`
--

INSERT INTO `tbl_web_settings` (`id`, `language_id`, `type`, `message`) VALUES
(1, 14, 'favicon', 'favicon-1680233344.png'),
(2, 14, 'header_logo', 'header_logo-1714103302.png'),
(3, 14, 'footer_logo', 'footer_logo-1714129033.png'),
(4, 14, 'sticky_header_logo', 'sticky_header_logo-1714103266.png'),
(5, 14, 'quiz_zone_icon', 'quiz_zone_icon-1714127532.png'),
(6, 14, 'daily_quiz_icon', 'daily_quiz_icon-1714128119.png'),
(7, 14, 'true_false_icon', 'true_false_icon-1714128119.png'),
(8, 14, 'fun_learn_icon', 'fun_learn_icon-1714128145.png'),
(9, 14, 'self_challange_icon', 'self_challange_icon-1714128145.png'),
(10, 14, 'contest_play_icon', 'contest_play_icon-1714128145.png'),
(11, 14, 'one_one_battle_icon', 'one_one_battle_icon-1714128209.png'),
(12, 14, 'group_battle_icon', 'group_battle_icon-1714128492.png'),
(13, 14, 'audio_question_icon', 'audio_question_icon-1714128209.png'),
(14, 14, 'math_mania_icon', 'math_mania_icon-1714128209.png'),
(15, 14, 'exam_icon', 'exam_icon-1714128209.png'),
(16, 14, 'guess_the_word_icon', 'guess_the_word_icon-1714128209.png'),
(17, 14, 'section1_heading', 'Why Choose Us Our Elite Quiz'),
(18, 14, 'section1_heading', 'Why Choose Us'),
(19, 14, 'section1_title1', 'Life Lines'),
(20, 14, 'section1_title2', 'Leaderboard'),
(21, 14, 'section1_title3', 'Money Withdrawal'),
(22, 14, 'section1_image1', 'section1_image1.svg'),
(23, 14, 'section1_image2', 'section1_image2.svg'),
(24, 14, 'section1_image3', 'section1_image3.svg'),
(25, 14, 'section1_desc1', 'These lifelines are your secret weapons to help you secure the correct answers during gameplay. Use them wisely to boost your chances of winning!'),
(26, 14, 'section1_desc2', 'Check out our Leaderboard to discover the top scorers in various quizzes. Join the competition and climb the ranks.'),
(27, 14, 'section1_desc3', 'Unlock Money Withdrawal and transform quiz victories into tangible cash rewards. Earn while you quiz!'),
(28, 14, 'section2_heading', 'Incredible Quiz Features'),
(29, 14, 'section2_title1', 'Quizzes by category'),
(30, 14, 'section2_title2', 'Quizzes by Language'),
(31, 14, 'section2_title3', 'Battle Quiz'),
(32, 14, 'section2_title4', 'Guess the Word'),
(33, 14, 'section2_image1', 'section2_image1.svg'),
(34, 14, 'section2_image2', 'section2_image2.svg'),
(35, 14, 'section2_image3', 'section2_image3.svg'),
(36, 14, 'section2_image4', 'section2_image4.svg'),
(37, 14, 'section2_desc1', 'Dive into category-based quizzes for an engaging and informative challenge.'),
(38, 14, 'section2_desc2', 'Explore quizzes tailored to your language preference for a personalized quiz experience.'),
(39, 14, 'section2_desc3', 'Engage in epic quiz battles and prove your knowledge supremacy.'),
(40, 14, 'section2_desc4', 'Put your vocabulary to the test with our challenging Guess the Word Quiz.'),
(41, 14, 'section3_heading', 'Elite QuizBest Part'),
(42, 14, 'section3_title1', 'Regular Udpates'),
(43, 14, 'section3_title2', 'Competitive Fun'),
(44, 14, 'section3_title3', 'Global Community'),
(45, 14, 'section3_title4', 'All-age Inclusivity'),
(46, 14, 'section3_image1', 'section3_image1.svg'),
(47, 14, 'section3_image2', 'section3_image2.svg'),
(48, 14, 'section3_image3', 'section3_image3.svg'),
(49, 14, 'section3_image4', 'section3_image4.svg'),
(50, 14, 'section3_desc1', 'Regularly Updated Quizzes for a Fresh and Exciting Learning Experience.'),
(51, 14, 'section3_desc2', 'Test Your Knowledge and Challenge Others. Compete, Test, Challenge!'),
(52, 14, 'section3_desc3', 'Join the Elite Quiz Global Community and Expand Your Knowledge Together!'),
(53, 14, 'section3_desc4', 'Elite Quiz for Kids, Teens, & Adults - Fun Learning for Everyone!'),
(54, 14, 'section_1_mode', '1'),
(55, 14, 'section_2_mode', '1'),
(56, 14, 'section_3_mode', '1'),
(57, 14, 'notification_title', 'Congratulations !'),
(58, 14, 'notification_body', 'You have unlocked new badge.'),
(59, 14, 'primary_color', '#EF5388FF'),
(60, 14, 'footer_color', '#090029FF'),
(61, 14, 'firebase_api_key', ''),
(62, 14, 'firebase_auth_domain', ''),
(63, 14, 'firebase_database_url', ''),
(64, 14, 'firebase_project_id', ''),
(65, 14, 'firebase_storage_bucket', ''),
(66, 14, 'firebase_messager_sender_id', ''),
(67, 14, 'firebase_app_id', ''),
(68, 14, 'firebase_measurement_id', ''),
(69, 14, 'rtl_support', '0'),
(70, 14, 'company_name_footer', ''),
(71, 14, 'email_footer', ''),
(72, 14, 'phone_number_footer', ''),
(73, 14, 'web_link_footer', ''),
(74, 14, 'company_text', ''),
(75, 14, 'address_text', ''),
(76, 14, 'social_media', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `link` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `sub_category` varchar(200) NOT NULL,
  `class` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `description` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `link`, `category`, `sub_category`, `class`, `subject`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Test', '1716552311.mp4', '9', '13', '20', '17', 1, 'ghggfhgfhghg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Test', '1716552391.mp4', '11', '12', '18', '14', 1, 'Test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Test', '1716552357.mp4', '9', '13', '20', '17', 1, 'bhhghghgh', '2024-05-17 03:10:13', '2024-05-17 03:10:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_revenue`
--
ALTER TABLE `admin_revenue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_metrial`
--
ALTER TABLE `study_metrial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_category`
--
ALTER TABLE `subject_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_audio_question`
--
ALTER TABLE `tbl_audio_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `subcategory` (`subcategory`) USING BTREE,
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_authenticate`
--
ALTER TABLE `tbl_authenticate`
  ADD PRIMARY KEY (`auth_id`),
  ADD UNIQUE KEY `auth_username` (`auth_username`);

--
-- Indexes for table `tbl_badges`
--
ALTER TABLE `tbl_badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_battle_questions`
--
ALTER TABLE `tbl_battle_questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `match_id` (`match_id`);

--
-- Indexes for table `tbl_battle_statistics`
--
ALTER TABLE `tbl_battle_statistics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id1` (`user_id1`),
  ADD KEY `user_id2` (`user_id2`);

--
-- Indexes for table `tbl_bookmark`
--
ALTER TABLE `tbl_bookmark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coin_store`
--
ALTER TABLE `tbl_coin_store`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_contest`
--
ALTER TABLE `tbl_contest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_contest_leaderboard`
--
ALTER TABLE `tbl_contest_leaderboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `score` (`score`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `contest_id` (`contest_id`);

--
-- Indexes for table `tbl_contest_prize`
--
ALTER TABLE `tbl_contest_prize`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contest_id` (`contest_id`);

--
-- Indexes for table `tbl_contest_question`
--
ALTER TABLE `tbl_contest_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contest_id` (`contest_id`) USING BTREE;

--
-- Indexes for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_daily_quiz`
--
ALTER TABLE `tbl_daily_quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_daily_quiz_user`
--
ALTER TABLE `tbl_daily_quiz_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exam_module`
--
ALTER TABLE `tbl_exam_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_exam_module_question`
--
ALTER TABLE `tbl_exam_module_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`exam_module_id`);

--
-- Indexes for table `tbl_exam_module_result`
--
ALTER TABLE `tbl_exam_module_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_module_id` (`exam_module_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_fun_n_learn`
--
ALTER TABLE `tbl_fun_n_learn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `subcategory` (`subcategory`);

--
-- Indexes for table `tbl_fun_n_learn_question`
--
ALTER TABLE `tbl_fun_n_learn_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contest_id` (`fun_n_learn_id`) USING BTREE;

--
-- Indexes for table `tbl_guess_the_word`
--
ALTER TABLE `tbl_guess_the_word`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `subcategory` (`subcategory`);

--
-- Indexes for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_leaderboard_daily`
--
ALTER TABLE `tbl_leaderboard_daily`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`date_created`);

--
-- Indexes for table `tbl_leaderboard_monthly`
--
ALTER TABLE `tbl_leaderboard_monthly`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`date_created`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category` (`category`),
  ADD KEY `subcategory` (`subcategory`);

--
-- Indexes for table `tbl_maths_question`
--
ALTER TABLE `tbl_maths_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `subcategory` (`subcategory`) USING BTREE,
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_month_week`
--
ALTER TABLE `tbl_month_week`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment_request`
--
ALTER TABLE `tbl_payment_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `subcategory` (`subcategory`) USING BTREE,
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_questioner_authinticate`
--
ALTER TABLE `tbl_questioner_authinticate`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `tbl_questioner_category`
--
ALTER TABLE `tbl_questioner_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_questioner_list`
--
ALTER TABLE `tbl_questioner_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_questioner_question`
--
ALTER TABLE `tbl_questioner_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_question_reports`
--
ALTER TABLE `tbl_question_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_quiz_categories`
--
ALTER TABLE `tbl_quiz_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `tbl_student_category`
--
ALTER TABLE `tbl_student_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_subcategory`
--
ALTER TABLE `tbl_student_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `maincat_id` (`maincat_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject_subcategory`
--
ALTER TABLE `tbl_subject_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tracker`
--
ALTER TABLE `tbl_tracker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_upload_languages`
--
ALTER TABLE `tbl_upload_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`,`mobile`),
  ADD KEY `firebase_id` (`firebase_id`(333));

--
-- Indexes for table `tbl_users_badges`
--
ALTER TABLE `tbl_users_badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_statistics`
--
ALTER TABLE `tbl_users_statistics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_user_category`
--
ALTER TABLE `tbl_user_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`category_id`);

--
-- Indexes for table `tbl_user_subcategory`
--
ALTER TABLE `tbl_user_subcategory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`subcategory_id`);

--
-- Indexes for table `tbl_web_settings`
--
ALTER TABLE `tbl_web_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_revenue`
--
ALTER TABLE `admin_revenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `study_metrial`
--
ALTER TABLE `study_metrial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject_category`
--
ALTER TABLE `subject_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_audio_question`
--
ALTER TABLE `tbl_audio_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_authenticate`
--
ALTER TABLE `tbl_authenticate`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_badges`
--
ALTER TABLE `tbl_badges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_battle_questions`
--
ALTER TABLE `tbl_battle_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_battle_statistics`
--
ALTER TABLE `tbl_battle_statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bookmark`
--
ALTER TABLE `tbl_bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_coin_store`
--
ALTER TABLE `tbl_coin_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_contest`
--
ALTER TABLE `tbl_contest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_contest_leaderboard`
--
ALTER TABLE `tbl_contest_leaderboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_contest_prize`
--
ALTER TABLE `tbl_contest_prize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_contest_question`
--
ALTER TABLE `tbl_contest_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_daily_quiz`
--
ALTER TABLE `tbl_daily_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_daily_quiz_user`
--
ALTER TABLE `tbl_daily_quiz_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_exam_module`
--
ALTER TABLE `tbl_exam_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_exam_module_question`
--
ALTER TABLE `tbl_exam_module_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_exam_module_result`
--
ALTER TABLE `tbl_exam_module_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_fun_n_learn`
--
ALTER TABLE `tbl_fun_n_learn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_fun_n_learn_question`
--
ALTER TABLE `tbl_fun_n_learn_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_guess_the_word`
--
ALTER TABLE `tbl_guess_the_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_leaderboard_daily`
--
ALTER TABLE `tbl_leaderboard_daily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_leaderboard_monthly`
--
ALTER TABLE `tbl_leaderboard_monthly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_maths_question`
--
ALTER TABLE `tbl_maths_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_month_week`
--
ALTER TABLE `tbl_month_week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_payment_request`
--
ALTER TABLE `tbl_payment_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_questioner_authinticate`
--
ALTER TABLE `tbl_questioner_authinticate`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_questioner_category`
--
ALTER TABLE `tbl_questioner_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_questioner_list`
--
ALTER TABLE `tbl_questioner_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_questioner_question`
--
ALTER TABLE `tbl_questioner_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_question_reports`
--
ALTER TABLE `tbl_question_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_quiz_categories`
--
ALTER TABLE `tbl_quiz_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_student_category`
--
ALTER TABLE `tbl_student_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_student_subcategory`
--
ALTER TABLE `tbl_student_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_subject_subcategory`
--
ALTER TABLE `tbl_subject_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_tracker`
--
ALTER TABLE `tbl_tracker`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_upload_languages`
--
ALTER TABLE `tbl_upload_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users_badges`
--
ALTER TABLE `tbl_users_badges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_users_statistics`
--
ALTER TABLE `tbl_users_statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user_category`
--
ALTER TABLE `tbl_user_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user_subcategory`
--
ALTER TABLE `tbl_user_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_web_settings`
--
ALTER TABLE `tbl_web_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
