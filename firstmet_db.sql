-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2022 at 06:44 PM
-- Server version: 5.7.39-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firstmet_db_hrdtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_url` varchar(100) NOT NULL,
  `date` text NOT NULL,
  `type` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `admin_url`, `date`, `type`, `role`) VALUES
(37, 'Ritik Dwivedi', 'dwivediritik7@gmail.com', '$2y$10$XrH/J.0aC4J/KYnE3mCljOtqbgKDOPrTkpqXyu.3to5Cdftb20zs2', 'S1N3b2sZSO', '15-10-2021 12:24:44', 'Admin', 'All'),
(43, 'FirstMeta CEO', 'flashsodiq@gmail.com', '$2y$10$hbhR03H/6XRleIY2ySpExO1QklXJv5OpudKOUMxKIR2gIgmwx7WsW', 'a5d17d520a9be49ec2929d3e533f87', '26-08-2022 00:11:54', 'Admin', 'All'),
(45, 'Ibrahim Haruna ', 'shareibrahem8899@gmail.com', '$2y$10$LOeLnQ8kKYMUtEZe0jDt5O5QWAJv95FLUaLt.EqJQWDGq3DtqxHdO', '4229c55fc2cba919f823a681b7dbb8', '30-08-2022 02:44:20', 'Sub admin', 'Career,Team,Services');

-- --------------------------------------------------------

--
-- Table structure for table `advertisment`
--

CREATE TABLE `advertisment` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisment`
--

INSERT INTO `advertisment` (`id`, `image`, `link`) VALUES
(6, 'img/ads/20220517asianviews210630.jpg', 'https://hrdtech.in/'),
(7, 'img/ads/20220517asianviews210702.jpg', 'https://hrdtech.in/');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `title` varchar(220) NOT NULL,
  `name` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `resume` varchar(220) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `title`, `name`, `email`, `phone`, `message`, `resume`, `date`) VALUES
(2, 'Php Developer', 'Adamu Musa', 'amusadrz4you@gmail.com081', '08142910055', 'I', 'resumes/20220826resume172117.jpg', '26/08/22'),
(6, 'Php Developer', 'Ritik Dwivedi', 'dwivediritik7@gmail.com', '7985014574', 'Hello , I am interested in this profile.', 'resumes/20220829resume194202.pdf', '30/08/22');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(3, 'Web Development', 'web-development'),
(4, 'App Development', 'app-development'),
(5, 'Digital Marketting', 'digital-marketting'),
(6, 'Programming', 'programming'),
(7, 'Technology', 'technology'),
(8, 'Innovations', 'innovations');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `comment` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `subject`, `message`, `date`) VALUES
(1, 'Ahmed Lawal', 'jetcoin.fx@gmail.com', '09072947233', 'Enquiry ', 'Kindly let me know your quotation ', '2022-08-28 05:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(210) DEFAULT NULL,
  `site_title` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `facebook_url` varchar(300) DEFAULT NULL,
  `instagram_url` varchar(300) DEFAULT NULL,
  `twitter_url` varchar(300) DEFAULT NULL,
  `linkedin_url` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `logo`, `site_title`, `email`, `phone`, `facebook_url`, `instagram_url`, `twitter_url`, `linkedin_url`) VALUES
(1, 'img/20220827logo063831.png', 'FirstMeta | Web Development | Ecommerce Development | Web Designing | Software Development | Digital Marketting | SEO | MLM SOFTWARE DEVELOPMENT', 'info@firstmeta.ng', '+234 704 503 1717', 'https://www.facebook.com/', 'https://www.instagram.com/?hl=en', 'https://twitter.com/firstmeta', 'https://www.linkedin.com/company/firstmeta/');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `title` varchar(220) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `date` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `benefits` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `icon`, `title`, `description`, `date`, `slug`, `benefits`) VALUES
(1, 'img/20220823icon070821.png', 'Php Developer', '<h4 style=\"box-sizing: inherit; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: inherit; font-stretch: inherit; font-size: 22px; line-height: var(--heading-line-height, 1.2) ; font-family: Roboto; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; border: 0px;\"><span style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: bolder; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; margin: 0px; padding: 0px; border: 0px;\">Responsibilities:</span></h4><ul style=\"font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Roboto; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; list-style: none; color: rgb(51, 51, 51);\"><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Understanding the fully synchronous behavior of PHP</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Basic understanding of front-end technologies, such as JavaScript, HTML5, and CSS3 - Knowledge of object-oriented PHP programming</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Understanding accessibility and security compliance (Depending on the specific project)</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Strong knowledge of the common PHP or web server exploits and their solutions</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Understanding fundamental design principles behind a scalable application</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">User authentication and authorization between multiple systems, servers, and environments</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Experience in common third-party APIs (Google, Facebook, eBay, etc)</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Integration of multiple data sources and databases into one system</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Familiarity with limitations of PHP as a platform and its workarounds</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Creating database schemas that represent and support business processes</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Familiarity with SQL/MySQL databases and their declarative query languages</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Proficient understanding of code versioning tools, such as GIT</li></ul>', '23/08/22', 'php-developer', NULL),
(2, 'img/20220823icon070719.png', 'Wordpress Developer', '<h4 style=\"box-sizing: inherit; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: inherit; font-stretch: inherit; font-size: 22px; line-height: var(--heading-line-height, 1.2) ; font-family: Roboto; margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; border: 0px;\"><span style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: bolder; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; margin: 0px; padding: 0px; border: 0px;\">Responsibilities:</span></h4><ul style=\"font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: Roboto; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; border: 0px; list-style: none; color: rgb(51, 51, 51);\"><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Experience in WooCommerce Development and payment gateway integration</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Experience in WordPress Theme Customization &amp; Development</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Experience in WordPress Plugin Customization &amp; Development</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Must have hands-on experience with Elementor Theme</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Good understanding of front-end technologies, including HTML5, CSS3, JavaScript, jQuery</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Experience building user interfaces for websites and/or web applications</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Experience designing and developing responsive design websites</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Comfortable working with debugging tools like Firebug, Chrome inspector, etc.</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Ability to understand CSS changes and their ramifications to ensure consistent style across platforms and browsers</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Strong understanding of PHP back-end development.</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Troubleshooting and error solving attitude.</li><li style=\"box-sizing: inherit; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: inherit; margin: 0px 0px 10px 17px; padding: 0px; border: 0px; list-style-type: disc;\">Excellent written and verbal communication skills.</li></ul>', '23/08/22', 'wordpress-developer', NULL),
(3, 'img/20220904icon141200.png', 'Junior Python Developer (Intern)', '<ul class=\"elementor-icon-list-items\" style=\"border: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 20px; outline: 0px; padding: 0px; vertical-align: baseline; list-style: none; color: rgb(17, 20, 22); font-family: Gellix-Medium, Helvetica, Arial, sans-serif;\"><li class=\"elementor-icon-list-item\" style=\"border: 0px; font-size: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px 0px calc(5px); vertical-align: baseline; position: relative; display: flex; -webkit-box-align: center; align-items: center; -webkit-box-pack: start; justify-content: flex-start; text-align: left;\"><span class=\"elementor-icon-list-text\" style=\"align-self: center; padding-left: 16px; color: var( --e-global-color-90de219 ); font-family: var( --e-global-typography-9974bba-font-family ), Helvetica, Arial, sans-serif; font-size: var( --e-global-typography-9974bba-font-size ); line-height: var( --e-global-typography-9974bba-line-height ); letter-spacing: var( --e-global-typography-9974bba-letter-spacing ); word-spacing: var( --e-global-typography-9974bba-word-spacing );\">Work with other developers.</span></li><li class=\"elementor-icon-list-item\" style=\"border: 0px; font-size: inherit; font-style: inherit; font-weight: inherit; margin: calc(5px) 0px 0px; outline: 0px; padding: 0px 0px calc(5px); vertical-align: baseline; position: relative; display: flex; -webkit-box-align: center; align-items: center; -webkit-box-pack: start; justify-content: flex-start; text-align: left;\"><span class=\"elementor-icon-list-icon\" style=\"display: flex; text-align: var(--e-icon-list-icon-align);\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"26\" height=\"26\" viewBox=\"0 0 26 26\" fill=\"none\"><circle cx=\"13\" cy=\"13\" r=\"8.75\" stroke=\"#0C58B6\" stroke-width=\"2\"></circle><path d=\"M8.66667 14.5438L10.5 16.25L16.6111 9.75\" stroke=\"#0C58B6\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path></svg></span><span class=\"elementor-icon-list-text\" style=\"align-self: center; padding-left: 16px; color: var( --e-global-color-90de219 ); font-family: var( --e-global-typography-9974bba-font-family ), Helvetica, Arial, sans-serif; font-size: var( --e-global-typography-9974bba-font-size ); line-height: var( --e-global-typography-9974bba-line-height ); letter-spacing: var( --e-global-typography-9974bba-letter-spacing ); word-spacing: var( --e-global-typography-9974bba-word-spacing );\">Implement Python code with assistance from senior developers.</span></li><li class=\"elementor-icon-list-item\" style=\"border: 0px; font-size: inherit; font-style: inherit; font-weight: inherit; margin: calc(5px) 0px 0px; outline: 0px; padding: 0px 0px calc(5px); vertical-align: baseline; position: relative; display: flex; -webkit-box-align: center; align-items: center; -webkit-box-pack: start; justify-content: flex-start; text-align: left;\"><span class=\"elementor-icon-list-icon\" style=\"display: flex; text-align: var(--e-icon-list-icon-align);\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"26\" height=\"26\" viewBox=\"0 0 26 26\" fill=\"none\"><circle cx=\"13\" cy=\"13\" r=\"8.75\" stroke=\"#0C58B6\" stroke-width=\"2\"></circle><path d=\"M8.66667 14.5438L10.5 16.25L16.6111 9.75\" stroke=\"#0C58B6\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path></svg></span><span class=\"elementor-icon-list-text\" style=\"align-self: center; padding-left: 16px; color: var( --e-global-color-90de219 ); font-family: var( --e-global-typography-9974bba-font-family ), Helvetica, Arial, sans-serif; font-size: var( --e-global-typography-9974bba-font-size ); line-height: var( --e-global-typography-9974bba-line-height ); letter-spacing: var( --e-global-typography-9974bba-letter-spacing ); word-spacing: var( --e-global-typography-9974bba-word-spacing );\">Write effective test cases such as unit tests to ensure it is meeting the software design requirements.</span></li><li class=\"elementor-icon-list-item\" style=\"border: 0px; font-size: inherit; font-style: inherit; font-weight: inherit; margin: calc(5px) 0px 0px; outline: 0px; padding: 0px 0px calc(5px); vertical-align: baseline; position: relative; display: flex; -webkit-box-align: center; align-items: center; -webkit-box-pack: start; justify-content: flex-start; text-align: left;\"><span class=\"elementor-icon-list-icon\" style=\"display: flex; text-align: var(--e-icon-list-icon-align);\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"26\" height=\"26\" viewBox=\"0 0 26 26\" fill=\"none\"><circle cx=\"13\" cy=\"13\" r=\"8.75\" stroke=\"#0C58B6\" stroke-width=\"2\"></circle><path d=\"M8.66667 14.5438L10.5 16.25L16.6111 9.75\" stroke=\"#0C58B6\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path></svg></span><span class=\"elementor-icon-list-text\" style=\"align-self: center; padding-left: 16px; color: var( --e-global-color-90de219 ); font-family: var( --e-global-typography-9974bba-font-family ), Helvetica, Arial, sans-serif; font-size: var( --e-global-typography-9974bba-font-size ); line-height: var( --e-global-typography-9974bba-line-height ); letter-spacing: var( --e-global-typography-9974bba-letter-spacing ); word-spacing: var( --e-global-typography-9974bba-word-spacing );\">Ensure Python code when executed is efficient and well written.</span></li><li class=\"elementor-icon-list-item\" style=\"border: 0px; font-size: inherit; font-style: inherit; font-weight: inherit; margin: calc(5px) 0px 0px; outline: 0px; padding: 0px 0px calc(5px); vertical-align: baseline; position: relative; display: flex; -webkit-box-align: center; align-items: center; -webkit-box-pack: start; justify-content: flex-start; text-align: left;\"><span class=\"elementor-icon-list-icon\" style=\"display: flex; text-align: var(--e-icon-list-icon-align);\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"26\" height=\"26\" viewBox=\"0 0 26 26\" fill=\"none\"><circle cx=\"13\" cy=\"13\" r=\"8.75\" stroke=\"#0C58B6\" stroke-width=\"2\"></circle><path d=\"M8.66667 14.5438L10.5 16.25L16.6111 9.75\" stroke=\"#0C58B6\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path></svg></span><span class=\"elementor-icon-list-text\" style=\"align-self: center; padding-left: 16px; color: var( --e-global-color-90de219 ); font-family: var( --e-global-typography-9974bba-font-family ), Helvetica, Arial, sans-serif; font-size: var( --e-global-typography-9974bba-font-size ); line-height: var( --e-global-typography-9974bba-line-height ); letter-spacing: var( --e-global-typography-9974bba-letter-spacing ); word-spacing: var( --e-global-typography-9974bba-word-spacing );\">Refactor old Python code to ensure it follows modern principles.</span></li><li class=\"elementor-icon-list-item\" style=\"border: 0px; font-size: inherit; font-style: inherit; font-weight: inherit; margin: calc(5px) 0px 0px; outline: 0px; padding: 0px 0px calc(5px); vertical-align: baseline; position: relative; display: flex; -webkit-box-align: center; align-items: center; -webkit-box-pack: start; justify-content: flex-start; text-align: left;\"><span class=\"elementor-icon-list-icon\" style=\"display: flex; text-align: var(--e-icon-list-icon-align);\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"26\" height=\"26\" viewBox=\"0 0 26 26\" fill=\"none\"><circle cx=\"13\" cy=\"13\" r=\"8.75\" stroke=\"#0C58B6\" stroke-width=\"2\"></circle><path d=\"M8.66667 14.5438L10.5 16.25L16.6111 9.75\" stroke=\"#0C58B6\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path></svg></span><span class=\"elementor-icon-list-text\" style=\"align-self: center; padding-left: 16px; color: var( --e-global-color-90de219 ); font-family: var( --e-global-typography-9974bba-font-family ), Helvetica, Arial, sans-serif; font-size: var( --e-global-typography-9974bba-font-size ); line-height: var( --e-global-typography-9974bba-line-height ); letter-spacing: var( --e-global-typography-9974bba-letter-spacing ); word-spacing: var( --e-global-typography-9974bba-word-spacing );\">Liaise with stakeholders to understand the requirements.</span></li><li class=\"elementor-icon-list-item\" style=\"border: 0px; font-size: inherit; font-style: inherit; font-weight: inherit; margin: calc(5px) 0px 0px; outline: 0px; padding: 0px 0px calc(5px); vertical-align: baseline; position: relative; display: flex; -webkit-box-align: center; align-items: center; -webkit-box-pack: start; justify-content: flex-start; text-align: left;\"><span class=\"elementor-icon-list-icon\" style=\"display: flex; text-align: var(--e-icon-list-icon-align);\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"26\" height=\"26\" viewBox=\"0 0 26 26\" fill=\"none\"><circle cx=\"13\" cy=\"13\" r=\"8.75\" stroke=\"#0C58B6\" stroke-width=\"2\"></circle><path d=\"M8.66667 14.5438L10.5 16.25L16.6111 9.75\" stroke=\"#0C58B6\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"></path></svg></span><span class=\"elementor-icon-list-text\" style=\"align-self: center; padding-left: 16px; color: var( --e-global-color-90de219 ); font-family: var( --e-global-typography-9974bba-font-family ), Helvetica, Arial, sans-serif; font-size: var( --e-global-typography-9974bba-font-size ); line-height: var( --e-global-typography-9974bba-line-height ); letter-spacing: var( --e-global-typography-9974bba-letter-spacing ); word-spacing: var( --e-global-typography-9974bba-word-spacing );\">Ensure integration can take place with front end systems.</span></li><li class=\"elementor-icon-list-item\" style=\"border: 0px; font-size: inherit; font-style: inherit; font-weight: inherit; margin: calc(5px) 0px 0px; outline: 0px; padding: 0px 0px calc(5px); vertical-align: baseline; position: relative; display: flex; -webkit-box-align: center; align-items: center; -webkit-box-pack: start; justify-content: flex-start; text-align: left;\"><span class=\"elementor-icon-list-icon\" style=\"display: flex; text-align: var(--e-icon-list-icon-align);\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"26\" height=\"26\" viewBox=\"0 0 26 26\" fill=\"none\"><circle cx=\"13\" cy=\"13\" r=\"8.75\" stroke=\"#0C58B6\" stroke-width=\"2\"></circle><path d=\"M8.66667 14.5438L10.5 16.25L16.6111 9.75\" stroke=\"#0C58B6\" stroke-width=\"2\"', '04/09/22', 'junior-python-developer-intern-', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_id` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` varchar(500) NOT NULL,
  `description` varchar(14600) NOT NULL,
  `image` varchar(50) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `meta_keywords` varchar(200) NOT NULL,
  `meta_description` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `views` int(10) DEFAULT '0',
  `post_for` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_id`, `title`, `short_desc`, `description`, `image`, `tags`, `meta_keywords`, `meta_description`, `date`, `status`, `slug`, `views`, `post_for`) VALUES
(1, '3421406', 'What Is a Blockchain?', 'A blockchain is a distributed database or ledger that is shared among the nodes of a computer network. As a database, a blockchain stores information electronically in digital format. ', '<p>A blockchain is a distributed database or ledger that is shared among the nodes of a computer network. As a database, a blockchain stores information electronically in digital format. Blockchains are best known for their crucial role in cryptocurrency systems, such as Bitcoin, for maintaining a secure and decentralized record of transactions.Â </p><p id=\"mntl-sc-block_1-0-3\" class=\"comp mntl-sc-block finance-sc-block-html mntl-sc-block-html\" style=\"margin-bottom: 1.75rem; counter-reset: section 0; font-family: SourceSansPro, sans-serif; font-size: 18px; letter-spacing: 0.05px;\"><font color=\"#111111\">One key difference between a typical database and a blockchain is how the data is structured. A blockchain collects information together in groups, known asÂ </font><font style=\"\" color=\"#000000\"><u style=\"background-color: rgb(255, 255, 0);\">blocks</u></font><font color=\"#111111\">, that hold sets of information. Blocks have certain storage capacities and, when filled, are closed and linked to the previously filled block, forming a chain of data known as the blockchain. All new information that follows that freshly added block is compiled into a newly formed block that will then also be added to the chain once filled.</font></p><div id=\"mntl-sc-block_1-0-4\" class=\"comp mntl-sc-block mntl-sc-block-adslot mntl-block\" style=\"color: rgb(17, 17, 17); font-family: SourceSansPro, sans-serif; font-size: 18px; letter-spacing: 0.05px;\"></div><p><div id=\"mntl-sc-block_1-0-6\" class=\"comp mntl-sc-block mntl-sc-block-adslot mntl-block\" style=\"color: rgb(17, 17, 17); font-family: SourceSansPro, sans-serif; font-size: 18px; letter-spacing: 0.05px;\"></div><div id=\"mntl-sc-block_1-0-7\" class=\"comp mntl-sc-block finance-sc-block-callout mntl-block\" style=\"color: rgb(17, 17, 17); font-family: SourceSansPro, sans-serif; font-size: 18px; letter-spacing: 0.05px;\"><div id=\"mntl-sc-block_1-0-8\" class=\"comp theme-whatyouneedtoknow mntl-sc-block mntl-sc-block-callout mntl-block\" data-tracking-id=\"mntl-sc-block-callout\" data-tracking-container=\"true\" style=\"position: relative; margin: 1rem 0px 2rem;\"></div></div></p><p id=\"mntl-sc-block_1-0-5\" class=\"comp mntl-sc-block finance-sc-block-html mntl-sc-block-html\" style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1.75rem; counter-reset: section 0; color: rgb(17, 17, 17); font-family: SourceSansPro, sans-serif; font-size: 18px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: 0.05px; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">A database usually structures its data into tables, whereas a blockchain, as its name implies, structures its data into chunks (blocks) that are strung together. This data structure inherently makes an irreversible timeline of data when implemented in a decentralized nature. When a block is filled, it is set in stone and becomes a part of this timeline. Each block in the chain is given an exact timestamp when it is added to the chain.</p>', 'img/posts/20220825asiantimes085144.jpeg', 'demo', 'demo', 'demo', '22-08-23 13:05:45', 'Active', 'what-is-a-blockchain-3421406', 13, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(220) NOT NULL,
  `short_desc` varchar(500) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `image` varchar(220) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `short_desc`, `description`, `image`, `slug`) VALUES
(1, 'metaSchoolâ„¢', 'metaSchool is all-in-one School Management Software for schools and colleges. Our best-in-class School Management Software specifically designed and developed to simplify the process of educational institutions to meet all their emerging technological and administrative requirements. metaSchool, the fully compatible Android and iOS Mobile App is designed to address the modern challenging environment of the management, parents, teachers.', 'metaSchool is all-in-one School Management Software for schools and colleges. Our best-in-class School Management Software specifically designed and developed to simplify the process of educational institutions to meet all their emerging technological and administrative requirements. metaSchool, the fully compatible Android and iOS Mobile App is designed to address the modern challenging environment of the management, parents, teachers.', 'img/20220827product181910.webp', 'metaschool-'),
(2, 'metaClinicâ„¢', 'metaClinic is a hospital management software. Our cutting edge technology helps you to manage patients, appointments, doctorsâ€™ schedules, prescriptions, inventories and hospital administration.', '<p>metaClinic is a hospital management software. Our cutting edge technology helps you to manage patients, appointments, doctorsâ€™ schedules, prescriptions, inventories and hospital administration.<br></p>', 'img/20220827product182048.webp', 'metaclinic-'),
(3, 'metaAuditâ„¢', 'metaAudit is a decentralized Computer Aided Audit Techniques (dCAAT).', '<p>metaAudit is a decentralized Computer Aided Audit Techniques (dCAAT).<br></p>', 'img/20220827product182130.webp', 'metaaudit-'),
(4, 'Meta360â„¢', 'Meta360 is an ERP software seamlessly cater the need SME and corporate businesses. ', 'Meta360 is an ERP software seamlessly cater the need SME and corporate businesses.Â ', 'img/20220827product182215.webp', 'meta360-');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `short_desc` varchar(500) NOT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `image` varchar(220) DEFAULT NULL,
  `slug` varchar(232) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `short_desc`, `description`, `image`, `slug`) VALUES
(1, 'Blockchain Audit', 'With blockchain, the underlying foundations of auditing and internal control can be embedded into each transaction. This means that the internal audit design itself can be shifted from a retroactive, point-in-time examination to an ongoing, real-time monitoring process that is informed by previous transactions.', '<div>Our auditing blockchain series</div><div>While blockchain may be the next step in the digital evolution, specific implementations of the technology are still susceptible to risk. This will call for internal audit to play a pivotal role, not only in providing traditional assurance but also acting as a trusted business advisor in anticipating and evaluating these new and emerging risks. Our three-part series is designed to help internal auditors fulfill this role.</div><div><br></div><div>Part 1: An introduction to blockchain</div><div>To launch our three-part series, we introduce internal auditors to the fundamentals of distributed ledger technology, how blockchains work, key features, and types of blockchains. We also examine new concepts, such as smart contracts, tokens, initial coin offerings (ICOs), and cryptocurrencies.</div>', 'img/20220823service071052.jpeg', 'blockchain-audit'),
(2, 'Software Development', 'What is software development? Software development refers to a set of computer science activities dedicated to the process of creating, designing, deploying and supporting software. Software itself is the set of instructions or programs that tell a computer what to do.', '<p>What is software development? Software development refers to a set of computer science activities dedicated to the process of creating, designing, deploying and supporting software. Software itself is the set of instructions or programs that tell a computer what to do.<br></p>', '', 'software-development'),
(3, 'Web and Mobile App Dev', 'Essentially, mobile web app developers create mobile web apps that are just like a regular mobile website but behave and are used like native applications. The web app\'s user interface looks like that of a native app but the technologies employed are those of the web.\r\n', '<p>Essentially, mobile web app developers create mobile web apps that are just like a regular mobile website but behave and are used like native applications. The web app\'s user interface looks like that of a native app but the technologies employed are those of the web.</p><div><br></div>', '', 'web-and-mobile-app-dev'),
(4, 'IT Outsourcing and Consulting', 'Consulting is about providing complex services and advising on how to do something, while outsourcing is about providing specific services and actually doing the work.', '<p>Consulting is about providing complex services and advising on how to do something, while outsourcing is about providing specific services and actually doing the work.<br></p>', '', 'it-outsourcing-and-consulting'),
(5, 'Fintech Development', 'What is FinTech development? The term “FinTech” is a short form of “financial technology”. It refers to digital technologies that are helping to introduce key innovations in the banking and financial services sector. FinTech innovations went a long way to improve financial inclusion.\r\n', 'FinTech (financial technology) is a catch-all term referring to software, mobile applications, and other technologies created to improve and automate traditional forms of finance for businesses and consumers alike.', 'img/20220823service071837.jpeg', 'fintech-development'),
(6, 'Training Services', 'Training Services means instruction or other training provided by PTC in the use of the Licensed Products. “Training Services” does not include PTC\'s e-Learning training products (e.g., “PTCU”), which are considered Licensed Products for purposes of this Agreement.\r\n', '<p>Training Services means instruction or other training provided by PTC in the use of the Licensed Products. “Training Services” does not include PTC\'s e-Learning training products (e.g., “PTCU”), which are considered Licensed Products for purposes of this Agreement.</p><div><br></div>', 'img/20220823service071723.png', 'training-services');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `image` varchar(210) NOT NULL,
  `exp` varchar(100) DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `designation`, `image`, `exp`, `qualification`) VALUES
(2, 'Yisa Muhydeen Damilola', 'Head of Business', 'img/20220821teammember164735.jpeg', NULL, NULL),
(3, 'Ibrahim Haruna', 'Head of Quality Assurance', 'img/20220826teammember180820.jpg', NULL, NULL),
(4, 'Saidu AbdulAziz', 'Head of Research & Development', 'img/20220821teammember164849.jpeg', NULL, NULL),
(5, 'Yahya Mohammed Kabir', 'Chief Operating Officer', 'img/20220821teammember164958.jpeg', NULL, NULL),
(6, 'Ibrahim Uyo Joy', 'Secretary to the Company', 'img/20220821teammember165041.jpeg', NULL, NULL),
(7, 'Saidu Faisal', 'Chief Technology Officer', 'img/20220829teammember190946.jpg', 'A python developer and experience in computer networking management ', 'Faisal holds B.Tech in Management Information Technology '),
(9, 'Devine Peace Amarachi', 'Head of Human Resources ', 'img/20220825teammember110729.jpg', 'Peace is mission driven individual with strong communication skills. She hold a B.Tech in Accounting', '\"with God nothing is impossible\"');

-- --------------------------------------------------------

--
-- Table structure for table `technology`
--

CREATE TABLE `technology` (
  `id` int(11) NOT NULL,
  `image` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technology`
--

INSERT INTO `technology` (`id`, `image`) VALUES
(3, 'img/202208220054631.png,img/202208221054631.png,img/202208222054631.png,img/202208223054631.jpeg,img/202208224054631.png,img/202208225054631.jpeg,img/202208226054631.png,img/202208227054631.png,img/202208228054631.png,img/202208229054631.png,img/2022082210054631.webp,img/2022082211054631.png,img/2022082212054631.png,img/2022082213054631.png,');

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `post_id` varchar(200) NOT NULL,
  `ip_add` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `post_id`, `ip_add`) VALUES
(1, '8893573', '2405:204:a0a1:5372:4970:48f1:2d6a:f304'),
(2, '8893573', '2405:204:a0a1:5372::1d7e:58a0'),
(3, '3224266', '2405:204:a0a1:5372:4970:48f1:2d6a:f304'),
(4, '3224266', '2405:204:a0a1:5372::1d7e:58a0'),
(5, '3224266', '2a03:2880:ff:7::face:b00c'),
(6, '3224266', '2a03:2880:ff:5::face:b00c'),
(7, '3224266', '2a03:2880:ff:2::face:b00c'),
(8, '3224266', '2a03:2880:ff:70::face:b00c'),
(9, '3224266', '2a03:2880:ff:1::face:b00c'),
(10, '3224266', '2a03:2880:ff:11::face:b00c'),
(11, '3224266', '103.112.55.153'),
(12, '3224266', '154.121.42.222'),
(13, '3224266', '2409:4063:4d94:6077:56fe:50eb:a67b:1d43'),
(14, '8893573', '2a03:2880:ff:1::face:b00c'),
(15, '8893573', '2a03:2880:ff:11::face:b00c'),
(16, '8893573', '2a03:2880:ff:9::face:b00c'),
(17, '8893573', '2a03:2880:ff:1b::face:b00c'),
(18, '8893573', '2a03:2880:ff:75::face:b00c'),
(19, '8893573', '2a03:2880:ff:d::face:b00c'),
(20, '8893573', '2a03:2880:11ff:a::face:b00c'),
(21, '8893573', '2a03:2880:24ff:3::face:b00c'),
(22, '3224266', '2a03:2880:21ff:77::face:b00c'),
(23, '3224266', '2a03:2880:24ff:78::face:b00c'),
(24, '8893573', '2a03:2880:11ff:5::face:b00c'),
(25, '8893573', '2a03:2880:31ff:f::face:b00c'),
(26, '8893573', '54.36.148.147'),
(27, '3224266', '54.36.149.0'),
(28, '3224266', '154.160.17.189'),
(29, '3224266', '2409:4063:4b94:9fb1:2d19:4c3e:82cd:256a'),
(30, '3224266', '2a03:2880:13ff:c::face:b00c'),
(31, '3224266', '2a03:2880:13ff:10::face:b00c'),
(32, '8893573', '110.235.238.139'),
(33, '4333761', '110.235.238.139'),
(34, '4333761', '2409:4063:4b94:9fb1:c55f:db69:5d9d:fa98'),
(35, '4333761', '2409:4063:4b94:9fb1::2c0b:cc14'),
(36, '4333761', '2a03:2880:ff::face:b00c'),
(37, '4333761', '2a03:2880:ff:2::face:b00c'),
(38, '4333761', '2a03:2880:ff:4::face:b00c'),
(39, '4333761', '2a03:2880:ff:17::face:b00c'),
(40, '4333761', '2a03:2880:25ff:2::face:b00c'),
(41, '4333761', '2a03:2880:ff:1::face:b00c'),
(42, '4333761', '2a03:2880:24ff:75::face:b00c'),
(43, '4333761', '2a03:2880:10ff:76::face:b00c'),
(44, '4333761', '185.210.159.4'),
(45, '4333761', '2a03:2880:22ff:f::face:b00c'),
(46, '4333761', '2a03:2880:21ff:12::face:b00c'),
(47, '4333761', '2a03:2880:21ff:11::face:b00c'),
(48, '4333761', '2a03:2880:ff:9::face:b00c'),
(49, '4333761', '2a03:2880:21ff:77::face:b00c'),
(50, '8893573', '66.102.7.48'),
(51, '8893573', '66.102.7.46'),
(52, '4333761', '2a03:2880:20ff:76::face:b00c'),
(53, '4333761', '2a03:2880:25ff:1::face:b00c'),
(54, '8893573', '2a03:2880:27ff:5::face:b00c'),
(55, '8893573', '2a03:2880:27ff:12::face:b00c'),
(56, '8893573', '2a03:2880:27ff:8::face:b00c'),
(57, '4333761', '2409:4063:6d15:b0f7::2c8b:af0f'),
(58, '3224266', '2409:4063:6d15:b0f7::2c8b:af0f'),
(59, '8893573', '2409:4063:6d15:b0f7::2c8b:af0f'),
(60, '4333761', '2a03:2880:22ff:5::face:b00c'),
(61, '1233406', '2405:204:a18a:3bde:c977:ee4:684e:2d6'),
(62, '1233406', '2405:204:a18a:3bde::1a0f:f8ad'),
(63, '1233406', '2a03:2880:ff:f::face:b00c'),
(64, '1233406', '2a03:2880:ff:77::face:b00c'),
(65, '1233406', '2a03:2880:ff:76::face:b00c'),
(66, '1233406', '2a03:2880:ff:75::face:b00c'),
(67, '1233406', '2a03:2880:ff:d::face:b00c'),
(68, '1233406', '2a03:2880:10ff:8::face:b00c'),
(69, '1233406', '2a03:2880:20ff:c::face:b00c'),
(70, '4333761', '2405:204:a18a:3bde::1a0f:f8ad'),
(71, '4333761', '2a03:2880:ff:a::face:b00c'),
(72, '4333761', '2a03:2880:ff:7::face:b00c'),
(73, '1233406', '2a03:2880:31ff:c::face:b00c'),
(74, '1233406', '2a03:2880:32ff:7::face:b00c'),
(75, '8893573', '2405:204:a18a:3bde::1a0f:f8ad'),
(76, '1233406', '2401:4900:eb9:2986::825:66c5'),
(77, '1233406', '2a03:2880:ff:7::face:b00c'),
(78, '1233406', '2a03:2880:24ff:2::face:b00c'),
(79, '1233406', '2a03:2880:32ff:f::face:b00c'),
(80, '1233406', '2409:4063:4289:28cb:4ce3:f6b9:46f0:367a'),
(81, '8439673', '2409:4063:4289:28cb:b454:a098:7236:d6e3'),
(82, '4333761', '2a03:2880:22ff:b::face:b00c'),
(83, '8439673', '2409:4063:4204:f4b8::d32:40b0'),
(84, '8439673', '2a03:2880:ff:e::face:b00c'),
(85, '8439673', '2a03:2880:ff:17::face:b00c'),
(86, '8439673', '2a03:2880:ff:1::face:b00c'),
(87, '8439673', '2a03:2880:ff:76::face:b00c'),
(88, '8439673', '2a03:2880:13ff:b::face:b00c'),
(89, '1233406', '54.36.148.233'),
(90, '8439673', '54.36.148.73'),
(91, '4333761', '54.36.148.179'),
(92, '8439673', '2a03:2880:21ff:e::face:b00c'),
(93, '1233406', '39.41.227.20'),
(94, '1233406', '192.151.157.210'),
(95, '8893573', '192.151.157.210'),
(96, '8439673', '192.151.157.210'),
(97, '3224266', '192.151.157.210'),
(98, '4333761', '192.151.157.210'),
(99, '8439673', '149.56.150.226'),
(100, '1233406', '149.56.150.226'),
(101, '4333761', '149.56.150.226'),
(102, '4333761', '2a03:2880:12ff:a::face:b00c'),
(103, '4333761', '2a03:2880:12ff:a::face:b00c'),
(104, '4333761', '2a03:2880:12ff:10::face:b00c'),
(105, '1233406', '2a03:2880:ff:15::face:b00c'),
(106, '1233406', '2a03:2880:ff:15::face:b00c'),
(107, '1233406', '2a03:2880:10ff:1::face:b00c'),
(108, '1233406', '2a03:2880:27ff:8::face:b00c'),
(109, '4333761', '2a03:2880:23ff:3::face:b00c'),
(110, '4333761', '2a03:2880:23ff:d::face:b00c'),
(111, '4333761', '2a03:2880:23ff:15::face:b00c'),
(112, '4333761', '2a03:2880:23ff:15::face:b00c'),
(113, '4333761', '2a03:2880:23ff:75::face:b00c'),
(114, '4333761', '2a03:2880:11ff:74::face:b00c'),
(115, '4333761', '2a03:2880:27ff:12::face:b00c'),
(116, '4333761', '2409:4063:4eaf:dd12::2c8b:8001'),
(117, '8439673', '34.226.191.189'),
(118, '1233406', '34.226.191.189'),
(119, '4333761', '34.226.191.189'),
(120, '3224266', '34.226.191.189'),
(121, '8893573', '34.226.191.189'),
(122, '8439673', '3.89.218.30'),
(123, '1233406', '3.89.218.30'),
(124, '4333761', '3.89.218.30'),
(125, '3224266', '3.89.218.30'),
(126, '8893573', '3.89.218.30'),
(127, '4333761', '2a03:2880:23ff:a::face:b00c'),
(128, '1233406', '2405:201:6013:4df7:396f:d27e:591e:9329'),
(129, '4333761', '2405:201:6013:4df7:396f:d27e:591e:9329'),
(130, '3224266', '2405:201:6013:4df7:396f:d27e:591e:9329'),
(131, '8893573', '2405:201:6013:4df7:396f:d27e:591e:9329'),
(132, '8439673', '2405:201:6013:4df7:396f:d27e:591e:9329'),
(133, '4333761', '66.249.70.252'),
(134, '8893573', '66.249.70.226'),
(135, '3224266', '2a03:2880:13ff:8::face:b00c'),
(136, '1233406', '66.249.70.226'),
(137, '3224266', '66.249.70.249'),
(138, '4333761', '66.249.73.80'),
(139, '4333761', '66.249.69.84'),
(140, '4333761', '66.249.69.78'),
(141, '8893573', '66.249.69.78'),
(142, '1233406', '66.249.69.82'),
(143, '3224266', '66.249.69.74'),
(144, '4333761', '66.249.69.82'),
(145, '8893573', '66.249.66.204'),
(146, '1233406', '66.249.66.14'),
(147, '8439673', '2a03:2880:27ff:6::face:b00c'),
(148, '8439673', '66.249.66.14'),
(149, '3224266', '::1'),
(150, '8893573', '::1'),
(151, '8439673', '::1'),
(152, '3421406', '110.235.238.67'),
(153, '3421406', '102.91.30.233'),
(154, '3421406', '::1'),
(155, '3421406', '110.235.238.188'),
(156, '3421406', '197.210.75.15'),
(157, '3421406', '197.210.74.28'),
(158, '3421406', '47.9.89.60'),
(159, '3421406', '197.210.74.81'),
(160, '3421406', '102.91.29.205'),
(161, '3421406', '102.91.30.193'),
(162, '3421406', '102.91.29.59'),
(163, '3421406', '197.210.78.114'),
(164, '3421406', '102.91.30.67');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisment`
--
ALTER TABLE `advertisment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `advertisment`
--
ALTER TABLE `advertisment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `technology`
--
ALTER TABLE `technology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
