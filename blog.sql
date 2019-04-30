-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 20, 2019 at 07:46 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(89, 'ttt'),
(92, 'camille'),
(94, 'Doriane'),
(95, 'ffff'),
(96, 'tech'),
(97, '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `commentaire` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `post_id`, `name`) VALUES
(1, 122, 'Areopage.jpg'),
(2, 122, 'carte Athène.jpg'),
(3, 123, ''),
(4, 123, ''),
(5, 124, ''),
(6, 125, '');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `lu` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `mail`, `name`, `message`, `date`, `lu`) VALUES
(1, 'oo', 'Pierre', 'Je suis pas content!', '2019-02-14 16:17:43', 1),
(3, 'fefzefzf', 'Camille', 'hey!', '2019-02-18 16:43:48', 1),
(4, 'regre', 'grgeg', 'reg', '2019-02-18 16:52:02', 1),
(5, 'aaaaaaa', 'cccccc', 'xsxssxsxsxsxsxs', '2019-03-11 16:21:47', 0),
(6, 'aaaaaaa', 'cccccc', 'xsxssxsxsxsxsxs', '2019-03-11 16:22:07', 0),
(7, 'aaaaaaa@frfzrfef.com', 'cccccc', 'xsxssxsxsxsxsxs', '2019-03-11 16:22:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20181225202803'),
('20190101222537'),
('20190123143326'),
('20190125204108'),
('20190125230401'),
('20190126000955'),
('20190126002206'),
('20190126005616'),
('20190126005733'),
('20190126011840'),
('20190126232141'),
('20190128000316'),
('20190202153042'),
('20190203123709'),
('20190204103116'),
('20190204103318'),
('20190209104033'),
('20190210073012'),
('20190218163555'),
('20190219182618');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `mail`) VALUES
(3, 'a@a.A'),
(4, 'pp@kk.cp'),
(5, 'jfrf@kforf.cpom'),
(6, 'dqd@zefzef'),
(7, 'azeezae@efzef.f'),
(8, 'zffzf@fef'),
(9, 'camille@coucou.com'),
(10, 'limpressionnistedev@gmail.com'),
(11, 'ffezfzf@jief.com'),
(12, 'aaaaaa@aaaa'),
(28, 'ffff@ffff');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `date`, `author`, `views`) VALUES
(8, 'tres long text', 'Thalassius vero ea tempestate praefectus praetorio praesens ipse quoque adrogantis ingenii, considerans incitationem eius ad multorum augeri discrimina, non maturitate vel consiliis mitigabat, ut aliquotiens celsae potestates iras principum molliverunt, sed adversando iurgandoque cum parum congrueret, eum ad rabiem potius evibrabat, Augustum actus eius exaggerando creberrime docens, idque, incertum qua mente, ne lateret adfectans. quibus mox Caesar acrius efferatus, velut contumaciae quoddam vexillum altius erigens, sine respectu salutis alienae vel suae ad vertenda opposita instar rapidi fluminis irrevocabili impetu ferebatur.', '2019-01-01 22:27:18', 'Pierre', NULL),
(9, 'Retitre pour faire un super essai', 'alors e voulais écrire pour voir si ça marche toujours ? mais aussi pour essayer le formulaire', '2019-01-20 15:37:29', 'Pierre', NULL),
(34, 'Mon post', 'coucou', '2019-01-28 17:41:14', 'Pierre', 1),
(50, 'Vrai tire', 'C\'est quand même mieux comme ça', '2019-02-03 17:00:00', 'Pierre', NULL),
(51, 'coucou', 'ezfzfffzfef', '2019-02-16 17:09:19', 'Camille', NULL),
(52, 'zaaze', 'azzeae', '2019-02-18 16:22:28', 'Camille', NULL),
(53, 'ffffff', 'fffff', '2019-02-18 16:24:16', 'Camille', NULL),
(90, 'test1', 'images', '2019-04-09 17:00:04', 'pierre', NULL),
(91, 'test2', 'xx', '2019-04-09 17:09:02', 'pierre', NULL),
(92, 'test3', 'cc', '2019-04-09 17:09:32', 'pierre', NULL),
(93, 'test4', 'ccc', '2019-04-09 17:10:15', 'pierre', NULL),
(94, 'test5', 'dd', '2019-04-09 17:10:52', 'pierre', NULL),
(95, 'test6', 'fff', '2019-04-09 17:12:49', 'pierre', NULL),
(96, 'test7', 'ffff', '2019-04-09 17:14:46', 'pierre', NULL),
(108, 'test3', 'img', '2019-04-10 18:13:57', 'pierre', NULL),
(109, 'test4', 'img plusieurrs', '2019-04-10 18:30:31', 'pierre', NULL),
(110, 'test5', 'multiple', '2019-04-10 18:34:17', 'pierre', NULL),
(111, 'test7', 'multiple', '2019-04-10 18:35:30', 'pierre', NULL),
(112, 'test8', 'multiple', '2019-04-10 18:37:09', 'pierre', NULL),
(113, 'test9', 'alle', '2019-04-10 18:37:56', 'pierre', NULL),
(114, 'test', 'number', '2019-04-10 18:39:23', 'pierre', NULL),
(115, 'dd', 'dd', '2019-04-10 18:39:41', 'pierre', NULL),
(116, 'dddd', 'ddd', '2019-04-10 18:40:14', 'pierre', NULL),
(117, 'eee', 'eee', '2019-04-10 18:40:48', 'pierre', NULL),
(118, 'eee', 'eeee', '2019-04-10 18:44:11', 'pierre', NULL),
(119, 'test3', 'eee', '2019-04-10 18:46:19', 'pierre', NULL),
(120, 'test1', 'multiple', '2019-04-10 19:13:46', 'pierre', NULL),
(121, 'tes4', 'ezefr', '2019-04-10 19:14:55', 'pierre', NULL),
(122, 'test5', 'tttt', '2019-04-10 19:17:31', 'pierre', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`post_id`, `category_id`) VALUES
(8, 89),
(8, 94),
(50, 89),
(50, 94),
(52, 89),
(53, 89),
(118, 92),
(119, 92);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `profile_pic`, `name`) VALUES
(6, 'krhzkfh@knkver.com', '[\"ROLE_ADMIN\"]', '$2y$13$ZtLIKe8mPSZLbQGCJPTXGeuHv5Jn7BRsmK3DnrhjTt2kJoqQdnzNq', 'images/hey.jpeg', 'Camille'),
(7, 'zfrf@eferf', '[\"ROLE_ADMIN\"]', '$2y$13$BboDap91UVHKVd7rtTf0WO6DwndrW8Mhxak7TPnWdTpN.Duii3aES', NULL, 'haaaa'),
(8, 'coco@coco.co', '[]', 'coco', NULL, 'coco'),
(17, 'coco@coco.coco', 'hey', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'carte Athène.jpg', 'pierre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526C4B89032C` (`post_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`post_id`,`category_id`),
  ADD KEY `IDX_B9A190604B89032C` (`post_id`),
  ADD KEY `IDX_B9A1906012469DE2` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526C4B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `FK_B9A1906012469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B9A190604B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE;
