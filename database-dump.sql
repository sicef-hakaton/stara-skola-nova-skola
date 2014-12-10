-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2014 at 03:08 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `steps`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(1024) NOT NULL,
  `element_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `element_id`, `type_id`, `timestamp`, `created_at`, `updated_at`, `deleted_at`, `user_id`) VALUES
(1, 'd', 9999, 0, '2014-11-22 21:18:18', '2014-11-22 20:18:18', '2014-11-22 20:18:18', NULL, 0),
(2, 'dd', 9999, 0, '2014-11-22 21:21:04', '2014-11-22 20:21:04', '2014-11-22 20:21:04', NULL, 0),
(3, 'asd', 9999, 0, '2014-11-22 21:55:35', '2014-11-22 20:55:35', '2014-11-22 20:55:35', NULL, 0),
(4, 'Comment', 9999, 0, '2014-11-22 22:26:40', '2014-11-22 21:26:43', '2014-11-22 21:26:43', NULL, 0),
(5, 'cao', 9999, 0, '2014-11-23 00:31:51', '2014-11-22 23:31:55', '2014-11-22 23:31:55', NULL, 0),
(6, 'asdasdad', 9999, 0, '2014-11-23 03:38:59', '2014-11-23 02:38:59', '2014-11-23 02:38:59', NULL, 1),
(7, 'testtest', 8, 5, '2014-11-23 03:41:13', '2014-11-23 02:41:13', '2014-11-23 02:41:13', NULL, 1),
(8, 'asdasd', 8, 5, '2014-11-23 04:09:31', '2014-11-23 03:09:31', '2014-11-23 03:09:31', NULL, 1),
(9, 'asdasd', 8, 5, '2014-11-23 04:09:58', '2014-11-23 03:09:58', '2014-11-23 03:09:58', NULL, 1),
(10, 'asdasd', 8, 5, '2014-11-23 04:11:01', '2014-11-23 03:11:01', '2014-11-23 03:11:01', NULL, 1),
(11, 'asdasd', 8, 5, '2014-11-23 04:12:22', '2014-11-23 03:12:22', '2014-11-23 03:12:22', NULL, 1),
(12, 'adasd', 8, 5, '2014-11-23 04:12:45', '2014-11-23 03:12:45', '2014-11-23 03:12:45', NULL, 1),
(13, '', 8, 5, '2014-11-23 05:13:20', '2014-11-23 04:13:22', '2014-11-23 04:13:22', NULL, 6),
(14, 'John', 8, 1, '2014-11-23 10:43:26', '2014-11-23 09:43:26', '2014-11-23 09:43:26', NULL, 7),
(15, 'some comment hehe', 8, 1, '2014-11-23 10:44:11', '2014-11-23 09:44:11', '2014-11-23 09:44:11', NULL, 7),
(16, 'cao duxe hehe :)', 8, 1, '2014-11-23 10:44:56', '2014-11-23 09:44:56', '2014-11-23 09:44:56', NULL, 7),
(17, 'random comment :)', 8, 1, '2014-11-23 10:45:57', '2014-11-23 09:45:57', '2014-11-23 09:45:57', NULL, 7),
(18, 'asdasdadasdads', 8, 1, '2014-11-23 10:46:14', '2014-11-23 09:46:14', '2014-11-23 09:46:14', NULL, 7),
(19, 'cao dimitrije', 8, 1, '2014-11-23 10:46:24', '2014-11-23 09:46:24', '2014-11-23 09:46:24', NULL, 7),
(20, 'jos jedan komentar od dimitrija :D\n', 8, 1, '2014-11-23 10:50:48', '2014-11-23 09:50:48', '2014-11-23 09:50:48', NULL, 7),
(21, 'prvi! :)', 14, 1, '2014-11-23 10:55:07', '2014-11-23 09:55:07', '2014-11-23 09:55:07', NULL, 7),
(22, 'Novi', 17, 1, '2014-11-23 11:05:53', '2014-11-23 10:05:56', '2014-11-23 10:05:56', NULL, 9),
(23, 'Bravo smiljko', 17, 1, '2014-11-23 11:06:00', '2014-11-23 10:06:03', '2014-11-23 10:06:03', NULL, 9),
(24, 'Lepi su\n\n\n\n\n', 17, 1, '2014-11-23 11:07:18', '2014-11-23 10:07:21', '2014-11-23 10:07:21', NULL, 9),
(25, 'pozz svima', 13, 1, '2014-11-23 11:13:56', '2014-11-23 10:13:59', '2014-11-23 10:13:59', NULL, 7),
(26, '?ao svima', 13, 1, '2014-11-23 11:14:05', '2014-11-23 10:14:08', '2014-11-23 10:14:08', NULL, 7),
(27, 'gde ste', 13, 1, '2014-11-23 11:14:13', '2014-11-23 10:14:16', '2014-11-23 10:14:16', NULL, 7),
(28, 'gde ste carevi', 13, 1, '2014-11-23 11:21:38', '2014-11-23 10:21:41', '2014-11-23 10:21:41', NULL, 7),
(29, 'cao svima', 15, 1, '2014-11-23 12:06:44', '2014-11-23 11:06:47', '2014-11-23 11:06:47', NULL, 7),
(30, 'Novi komentar :)', 28, 1, '2014-11-23 13:42:48', '2014-11-23 12:42:49', '2014-11-23 12:42:49', NULL, 11),
(31, 'svidja mi se ovaj kurs :)', 1, 1, '2014-11-23 13:45:36', '2014-11-23 12:45:36', '2014-11-23 12:45:36', NULL, 0),
(32, 'preporucujem ovaj kurs svima koji zele da poloze genetske algoritme', 30, 1, '2014-11-23 13:47:57', '2014-11-23 12:47:57', '2014-11-23 12:47:57', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `description`, `parent_id`, `type_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fakulteti', 'Grupa koja predstavlja fakultete u Srbiji', -1, 0, NULL, NULL, NULL),
(2, 'Racunarski fakultet', 'Racunarski fakultet, Univerzitet UNION, Beograd', 1, 0, NULL, NULL, NULL),
(3, 'Elektronski fakultet', 'Elektronski fakultet u Nisu', 1, 0, NULL, NULL, NULL),
(4, 'Racunarske nauke', 'Racunarske nauke Racunarskog fakulteta', 2, 0, NULL, NULL, NULL),
(5, 'Racunarske mreze', 'Racunarske mreze Racunarskog fakulteta', 2, 1, NULL, NULL, NULL),
(7, 'Prirodno-matematicki fakultet', 'Prirodno-matematicki fakultet u Nisu.', 1, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_path`
--

CREATE TABLE IF NOT EXISTS `group_path` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `group_path`
--

INSERT INTO `group_path` (`id`, `path_id`, `group_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, NULL, NULL, NULL),
(14, 24, 1, NULL, NULL, NULL),
(15, 24, 3, NULL, NULL, NULL),
(16, 26, 1, NULL, NULL, NULL),
(17, 26, 7, NULL, NULL, NULL),
(18, 27, 1, NULL, NULL, NULL),
(19, 27, 7, NULL, NULL, NULL),
(20, 28, 1, NULL, NULL, NULL),
(21, 28, 7, NULL, NULL, NULL),
(22, 29, 1, NULL, NULL, NULL),
(23, 29, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `url` varchar(1024) NOT NULL,
  `description` text NOT NULL,
  `title` varchar(30) NOT NULL,
  `step_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `type_id`, `url`, `description`, `title`, `step_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'http://en.wikipedia.org/wiki/Analysis_of_algorithms', 'Link ka Wikipediji o analizi algoritama', 'Analiza algoritama', 1, '2014-11-23 00:37:18', '2014-11-23 00:37:18', NULL),
(2, 0, 'http://en.wikipedia.org/wiki/Time_complexity', 'Link ka Wikipediji o vremenskoj slozenosti', 'Vremenska slozenost algoritama', 1, '2014-11-23 00:37:18', '2014-11-23 00:37:18', NULL),
(3, 0, 'http://en.wikipedia.org/wiki/Breadth-first_search', 'BFS obilazak grafa', 'BFS', 2, '2014-11-23 00:37:18', '2014-11-23 00:37:18', NULL),
(4, 0, 'http://en.wikipedia.org/wiki/Depth-first_search', 'DFS obilazak grafa', 'DFS', 3, '2014-11-23 00:40:39', '2014-11-23 00:40:39', NULL),
(5, 0, 'http://en.wikipedia.org/wiki/Graph_(abstract_data_type)', 'Link ka Wikipediji o grafovima', 'Grafovi', 4, '2014-11-23 00:40:39', '2014-11-23 00:40:39', NULL),
(23, 0, 'www.elfak.ni.ac.rs', 'Sajt Elektronskog fakulteta u Nisu', 'Materijali', 23, '2014-11-23 12:25:47', '2014-11-23 12:25:47', NULL),
(24, 0, 'www.sicef.rs', 'Sajt Studentskog inovacionog centra Elektronskog fakulteta', 'Sajt SICEFA', 24, '2014-11-23 12:25:47', '2014-11-23 12:25:47', NULL),
(25, 0, 'https://www.youtube.com/watch?v=DG5-UyRBQD4', 'Treci link koji sluzi samo za reprezentativne svrhe', 'Link 3', 25, '2014-11-23 12:25:47', '2014-11-23 12:25:47', NULL),
(26, 0, 'dsa', 'sdaas', 'asdas', 26, '2014-11-23 12:29:09', '2014-11-23 12:29:09', NULL),
(27, 0, 'http://culttt.com/2013/05/20/getting-started-with-testing-laravel-4-models/', 'Sjajan link', 'Dobar link', 27, '2014-11-23 12:32:55', '2014-11-23 12:32:55', NULL),
(28, 0, 'http://culttt.com/2013/05/20/getting-started-with-testing-laravel-4-models/', 'Sjajan link', 'Dobar link', 28, '2014-11-23 12:33:31', '2014-11-23 12:33:31', NULL),
(29, 0, 'http://culttt.com/2013/05/20/getting-started-with-testing-laravel-4-models/', 'Sjajan link', 'Dobar link', 29, '2014-11-23 12:34:29', '2014-11-23 12:34:29', NULL),
(30, 0, 'Nvi link.html', 'Oopis linka', 'LInk', 30, '2014-11-23 12:41:55', '2014-11-23 12:41:55', NULL),
(31, 0, 'en.wikipedia.org/wiki/Genetic_algorithm', 'asdasda', 'Link ka Wiki', 31, '2014-11-23 12:47:31', '2014-11-23 12:47:31', NULL),
(32, 0, 'asdasd', 'sasdasd', 'asdasd', 32, '2014-11-23 12:47:32', '2014-11-23 12:47:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paths`
--

CREATE TABLE IF NOT EXISTS `paths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `step_ord` varchar(2048) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `paths`
--

INSERT INTO `paths` (`id`, `title`, `description`, `step_ord`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Algoritmi', 'Smernica za ucenje dizajna i analize algoritama', '1;2;3;4;5', '2014-11-23 00:33:52', '2014-11-23 00:33:52', NULL),
(24, 'SI', 'Smernica za ucenje gradiva sa smera Softversko inzenjerstvo', '23;24;25', '2014-11-23 12:25:47', '2014-11-23 12:25:47', NULL),
(25, 'Asdf', 'asd', '26', '2014-11-23 12:29:09', '2014-11-23 12:29:09', NULL),
(26, 'Matematika', 'IOpsaksdj matematike', '27', '2014-11-23 12:32:54', '2014-11-23 12:32:55', NULL),
(27, 'Matematika', 'IOpsaksdj matematike', '28', '2014-11-23 12:33:30', '2014-11-23 12:33:31', NULL),
(28, 'Matematika', 'IOpsaksdj matematike', '29', '2014-11-23 12:34:29', '2014-11-23 12:34:29', NULL),
(29, 'SI', 'Opis', '30', '2014-11-23 12:41:54', '2014-11-23 12:41:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `path_tag`
--

CREATE TABLE IF NOT EXISTS `path_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `path_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `path_tag`
--

INSERT INTO `path_tag` (`id`, `tag_id`, `path_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(26, 14, 19, NULL, NULL, NULL),
(27, 15, 20, NULL, NULL, NULL),
(28, 16, 20, NULL, NULL, NULL),
(29, 15, 21, NULL, NULL, NULL),
(30, 16, 21, NULL, NULL, NULL),
(31, 17, 22, NULL, NULL, NULL),
(32, 18, 23, NULL, NULL, NULL),
(33, 19, 24, NULL, NULL, NULL),
(34, 20, 24, NULL, NULL, NULL),
(35, 21, 24, NULL, NULL, NULL),
(36, 22, 24, NULL, NULL, NULL),
(37, 23, 25, NULL, NULL, NULL),
(38, 24, 26, NULL, NULL, NULL),
(39, 25, 26, NULL, NULL, NULL),
(40, 24, 27, NULL, NULL, NULL),
(41, 25, 27, NULL, NULL, NULL),
(42, 24, 28, NULL, NULL, NULL),
(43, 25, 28, NULL, NULL, NULL),
(44, 26, 29, NULL, NULL, NULL),
(45, 27, 30, NULL, NULL, NULL),
(46, 28, 30, NULL, NULL, NULL),
(47, 29, 30, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `path_user`
--

CREATE TABLE IF NOT EXISTS `path_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `completed` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `path_user`
--

INSERT INTO `path_user` (`id`, `user_id`, `path_id`, `created_at`, `updated_at`, `deleted_at`, `completed`) VALUES
(19, 11, 1, NULL, NULL, NULL, 0),
(29, 0, 1, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `path_user_ratings`
--

CREATE TABLE IF NOT EXISTS `path_user_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `steps`
--

CREATE TABLE IF NOT EXISTS `steps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `path_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `steps`
--

INSERT INTO `steps` (`id`, `title`, `description`, `path_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Slozenost', 'Elementarna saznanja o slozenosti algoritama', 1, '2014-11-23 00:37:18', '2014-11-23 00:37:18', NULL),
(2, 'BFS', 'Ucenje BFS algoritma', 1, '2014-11-23 00:40:39', '2014-11-23 00:40:39', NULL),
(3, 'DFS', 'Ucenje DFS algoritma', 1, '2014-11-23 00:37:18', '2014-11-23 00:37:18', NULL),
(4, 'Grafovi', 'Uvod u osnove teorije grafova', 1, '2014-11-23 00:40:40', '2014-11-23 00:40:40', NULL),
(5, 'Dinamicko programiranje', 'Osnove dinamickog programiranja', 1, '2014-11-23 00:57:56', '2014-11-23 00:57:56', NULL),
(23, 'Prvi korak', 'Kolokvijum 1', 24, '2014-11-23 12:25:47', '2014-11-23 12:25:47', NULL),
(24, 'Drugi korak', 'Kolokvijum 2', 24, '2014-11-23 12:25:47', '2014-11-23 12:25:47', NULL),
(25, 'Zavrsni korak', 'Ispit', 24, '2014-11-23 12:25:47', '2014-11-23 12:25:47', NULL),
(26, 'asdasd', 'asdasdasd', 25, '2014-11-23 12:29:09', '2014-11-23 12:29:09', NULL),
(27, 'Kolokvijum 1', 'Uraditi ga', 26, '2014-11-23 12:32:55', '2014-11-23 12:32:55', NULL),
(28, 'Kolokvijum 1', 'Uraditi ga', 27, '2014-11-23 12:33:31', '2014-11-23 12:33:31', NULL),
(29, 'Kolokvijum 1', 'Uraditi ga', 28, '2014-11-23 12:34:29', '2014-11-23 12:34:29', NULL),
(30, 'Step 1', 'Opis stepa', 29, '2014-11-23 12:41:55', '2014-11-23 12:41:55', NULL),
(31, 'Osnovi GA', 'desc', 30, '2014-11-23 12:47:31', '2014-11-23 12:47:31', NULL),
(32, 'Binarni GA', 'asdasd', 30, '2014-11-23 12:47:32', '2014-11-23 12:47:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `step_user`
--

CREATE TABLE IF NOT EXISTS `step_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `step_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `step_user`
--

INSERT INTO `step_user` (`id`, `user_id`, `step_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(71, 11, 1, NULL, NULL, NULL),
(74, 0, 1, NULL, NULL, NULL),
(75, 0, 2, NULL, NULL, NULL),
(76, 0, 3, NULL, NULL, NULL),
(77, 0, 3, NULL, NULL, NULL),
(78, 0, 4, NULL, NULL, NULL),
(79, 0, 5, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 'elektronski', '2014-11-23 12:25:47', '2014-11-23 12:25:47', NULL),
(20, 'fakultet', '2014-11-23 12:25:47', '2014-11-23 12:25:47', NULL),
(21, 'softver', '2014-11-23 12:25:47', '2014-11-23 12:25:47', NULL),
(22, 'inzenjering', '2014-11-23 12:25:47', '2014-11-23 12:25:47', NULL),
(23, 'asd', '2014-11-23 12:29:09', '2014-11-23 12:29:09', NULL),
(24, 'math', '2014-11-23 12:32:54', '2014-11-23 12:32:54', NULL),
(25, 'struja', '2014-11-23 12:32:55', '2014-11-23 12:32:55', NULL),
(26, 'programiranje', '2014-11-23 12:41:55', '2014-11-23 12:41:55', NULL),
(27, 'ga', '2014-11-23 12:47:31', '2014-11-23 12:47:31', NULL),
(28, 'neuralne', '2014-11-23 12:47:31', '2014-11-23 12:47:31', NULL),
(29, 'mreze', '2014-11-23 12:47:31', '2014-11-23 12:47:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `type_id`, `created_at`, `updated_at`, `deleted_at`, `remember_token`) VALUES
(0, 'admin', '$2y$10$1As9DE20YSFaNEZooOIELuz0h40NLPuWfztOza7hVgJHZRVYslmyS', 'admin', 'admin', 'admin@smernice.rs', 0, '2014-11-22 21:32:20', '2014-11-23 12:27:59', NULL, '5YrCS483ZqX8gHZ08wo03hjt3f2aL2aUl1fraVCsuOEHBCJBvrJ4UIgCGvhy'),
(11, 'freezing', '$2y$10$dx0KJuXRd9h.2aOKkGAkZ.dNKtwkdISE/gth7zSuv7W4eu8ZIVeii', 'Nikola', 'Stojiljkovic', 'nikolavla@gmail.com', 1, '2014-11-23 11:52:50', '2014-11-23 12:14:57', NULL, 'Sa3K2e3KJIbI1vcy75xdOrqKRoQHdKCRjA71VlK7yBydEsmWsDcG6eLZTvcT'),
(12, 'nikola', '$2y$10$qIzo39HT8okF8xY/NtmfjO2ce4wuPLDLgOFo1SmKbOtZh8ygpgqH.', 'Nikola', 'Smiljkovic', 'nikola@gmail.com', 1, '2014-11-23 11:53:09', '2014-11-23 11:55:01', NULL, 'tAmUqGIZop2CConxazbxQ0tZ7NgEZ90Tr5WtBBSkvN98my2ouMTnmkRVCToM');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
