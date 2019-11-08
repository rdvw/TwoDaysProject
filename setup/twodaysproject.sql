-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 07, 2019 at 03:36 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twodaysproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
CREATE TABLE IF NOT EXISTS `actors` (
  `actor_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`actor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `actors_movies`
--

DROP TABLE IF EXISTS `actors_movies`;
CREATE TABLE IF NOT EXISTS `actors_movies` (
  `actor_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  KEY `actor_id` (`actor_id`),
  KEY `movie_id` (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `title`, `description`) VALUES
(1, 'Science Fiction', 'Science Fiction is the best cat ever'),
(2, 'Humor', 'Humor'),
(3, 'Horror', 'Horror'),
(4, 'Western', 'Western'),
(5, 'Manga', 'Lorem manga ipsum mangas are for guurls'),
(6, 'Drama', 'Dramanga ipsum dramas are for guurls');

-- --------------------------------------------------------

--
-- Table structure for table `categories_copy`
--

DROP TABLE IF EXISTS `categories_copy`;
CREATE TABLE IF NOT EXISTS `categories_copy` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_copy`
--

INSERT INTO `categories_copy` (`category_id`, `title`, `description`) VALUES
(1, 'Mangaaaa', 'Lorem manga ipsum mangas are for guurls'),
(2, 'Mangaaaa', 'Lorem manga ipsum mangas are for guurls'),
(3, 'Mangaaaa', 'Lorem manga ipsum mangas are for guurls'),
(4, 'Mangaaaa', 'Lorem manga ipsum mangas are for guurls'),
(5, 'Mangaaaa', 'Lorem manga ipsum mangas are for guurls'),
(6, 'Mangaaaa', 'Lorem manga ipsum mangas are for guurls');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `movie_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `release_year` int(60) NOT NULL,
  `local_path` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`movie_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `description`, `picture`, `release_year`, `local_path`, `category_id`) VALUES
(3, 'final the bad and the good', 'bad bad bad bad bad bad bad bad bad Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero obcaecati incidunt repellendus ex, facilis.', 'https://i0.wp.com/media.boingboing.net/wp-content/uploads/2016/07/gbu.jpg?w=800&ssl=1', 2021, 'c:/mymovies/olaf1.mp4', 2),
(4, 'final monster madness', 'very scary stuffLorem ipsum dolor sit amet consectetur, adipisicing elit. Vero obcaecati incidunt repellendus ex, facilis.', 'https://cinemassacre.com/wp-content/uploads/2016/09/26-Rocky-Horror-190x140.jpg', 1979, 'c:/mymovies/olaf2.mov', 2),
(5, 'finald teletubbies', 'not only for kids but it is real shitLorem ipsum dolor sit amet consectetur, adipisicing elit. Vero obcaecati incidunt repellendus ex, facilis.', 'https://i.ytimg.com/vi/W7wQJyED91I/maxresdefault.jpg', 2011, 'c:/mymovies/olaf3.mov', 4),
(6, 'deep dive horizon 99 part 2', 'dive into it? really?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero obcaecati incidunt repellendus ex, facilis.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP-bb-STMcVVKBgMvs9pg4Hnjf4aGOuwGx4QyIOlDlZIWJXfP2wA&s', 1999, 'c:/mymovies/olaf4.mov', 4),
(7, 'break your neck badly to the bones part 3', 'it is not my fault!Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero obcaecati incidunt repellendus ex, facilis.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_SD4Fl4KSR9Oovr_soBpQZ8f1_rQ5Iapi2YwQHSSVUxDd6hy9mw&s', 2002, 'c:/mymovies/olaf5.mov', 4),
(8, 'swampy swamp break up world part 4', 'boaaaahhhhrrrrrrLorem ipsum dolor sit amet consectetur, adipisicing elit. Vero obcaecati incidunt repellendus ex, facilis.', 'https://2.bp.blogspot.com/-UdoWFFJfhLA/W2jhhoc8NtI/AAAAAAAAYK8/MWLGOGeWdB092Aw39ALIt6Azntm1TTSRQCLcBGAs/s1600/Skanklodge.JPG', 2011, 'c:\\mymovies\\olaf6.mov', 2),
(9, 'never thought that part 2', 'it is an empty mind', 'https://i.ytimg.com/vi/euknE24COWA/maxresdefault.jpg', 2015, 'c:\\mymovies\\olaf7.mov', 3),
(10, 'fun size part 2', 'yes, just having fun', 'https://m.media-amazon.com/images/M/MV5BMjI1NDgyMjI4OV5BMl5BanBnXkFtZTcwNTg3MzM0OA@@._V1_.jpg', 2019, 'c:/mymovies/olaf8.mov', 1),
(11, 'Passport part 2', 'very serious stuff', 'https://i.vimeocdn.com/video/765578324.jpg?mw=1920&mh=1080&q=70', 1995, 'c:/mymovies/olaf9.mov', 2),
(12, 'the bad and the good', 'bad bad bad bad bad bad bad bad bad', 'https://i0.wp.com/media.boingboing.net/wp-content/uploads/2016/07/gbu.jpg?w=800&ssl=1', 2020, 'c:\\mymovies\\olaf1.mp4', 2),
(13, 'monster madness', 'very scary stuff', 'https://cinemassacre.com/wp-content/uploads/2016/09/26-Rocky-Horror-190x140.jpg', 1977, 'c:\\mymovies\\olaf2.mov', 2),
(14, 'teletubbies', 'not only for kids but it is real shit', 'https://i.ytimg.com/vi/W7wQJyED91I/maxresdefault.jpg', 2010, 'c:\\mymovies\\olaf3.mov', 4),
(15, 'deep dive horizon 99', 'dive into it? really?', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP-bb-STMcVVKBgMvs9pg4Hnjf4aGOuwGx4QyIOlDlZIWJXfP2wA&s', 1999, 'c:\\mymovies\\olaf4.mov', 4),
(16, 'break your neck badly to the bones', 'it is not my fault!', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_SD4Fl4KSR9Oovr_soBpQZ8f1_rQ5Iapi2YwQHSSVUxDd6hy9mw&s', 2001, 'c:\\mymovies\\olaf5.mov', 4),
(17, 'swampy swamp break up world, Gonzo Turtle will eat you all', 'boaaaahhhhrrrrrr', 'https://2.bp.blogspot.com/-UdoWFFJfhLA/W2jhhoc8NtI/AAAAAAAAYK8/MWLGOGeWdB092Aw39ALIt6Azntm1TTSRQCLcBGAs/s1600/Skanklodge.JPG', 2009, 'c:\\mymovies\\olaf6.mov', 2),
(18, 'never thought that', 'it is an empty mind', 'https://i.ytimg.com/vi/euknE24COWA/maxresdefault.jpg', 2014, 'c:\\mymovies\\olaf7.mov', 3),
(19, 'fun size', 'yes, just having fun', 'https://m.media-amazon.com/images/M/MV5BMjI1NDgyMjI4OV5BMl5BanBnXkFtZTcwNTg3MzM0OA@@._V1_.jpg', 2018, 'c:\\mymovies\\olaf8.mov', 1),
(20, 'Passport', 'very serious stuff', 'https://i.vimeocdn.com/video/765578324.jpg?mw=1920&mh=1080&q=70', 1993, 'c:\\mymovies\\olaf9.mov', 2);

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

DROP TABLE IF EXISTS `playlists`;
CREATE TABLE IF NOT EXISTS `playlists` (
  `playlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `creation_date` date NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`playlist_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `playlists_movies`
--

DROP TABLE IF EXISTS `playlists_movies`;
CREATE TABLE IF NOT EXISTS `playlists_movies` (
  `movie_id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  PRIMARY KEY (`movie_id`,`playlist_id`),
  KEY `playlist_id` (`playlist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Reginald', 'Van', 'r@van.be', '$2y$10$q707YLx/FN0/ujfUPPaDteM4FME4/B1n06c1FLuJAbFPnbEzACAtW'),
(2, 'Reginald2', 'Van2', 'r2@van.be', '$2y$10$4O/JpisKTybfDatPqe8aYOpJw9RKyTbJQa8ZGOrKKgjmAbm4q4chO'),
(3, 'Reginald3', 'Van3', 'r3@van.be', '$2y$10$t40/p/R09j967WE4QqLpgu7EKi18afPsFHmRTLOc5..iniNe2PUDu'),
(4, 'Reginald3', 'Van3', 'r3@van.be', '$2y$10$mWRqruiLzOOWG1hcOn.Vc..Z2WfF7eqEojv.G0gVGOYUKh1kw4BSO'),
(5, 'Reginald3', 'Van3', 'r3@van.be', '$2y$10$7opurPrSvunLnezTwpcbx.EijOBjdZ7z/uelXqczWxExmeHT1rcSm'),
(6, 'Reginald3', 'Van3', 'r3@van.be', '$2y$10$GsSKNN/7/wVJwBiKjf22V.XyPDraDWU9M5sOO/oLgVSN1rokMEsJG'),
(7, 'Olaf', 'Olafname', 'olaf@amazon.com', '$2y$10$.ROFS6Ccu2iFHyt/TRHVoeegdnf8MBhMeosdrYY/rS6zbRnts2IQm'),
(8, 'Olaf', 'Olafname', 'olaf2@amazon.com', '$2y$10$u4f0J0nyEm2qD8vutRJoM..cETQbbBwEBc7UVFQtwvQPQEvTzLK66'),
(9, 'Olaf', 'Olafname', 'olaf2@oracle.com', '$2y$10$CYMejlK9uUtXhtUV/ooa9.9VZNPLRLLOgNcakvwVEuHFPSLJnnQaG'),
(10, 'Reginald4', 'Van4', 'r4@van.be', '$2y$10$HSDO2x7dpAaRMLS1DBPaU.qjvMQPcZD83DCeZI8wxWHDrGgzQR1RS');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actors_movies`
--
ALTER TABLE `actors_movies`
  ADD CONSTRAINT `actors_movies_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`actor_id`),
  ADD CONSTRAINT `actors_movies_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`);

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `playlists_movies`
--
ALTER TABLE `playlists_movies`
  ADD CONSTRAINT `playlists_movies_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`),
  ADD CONSTRAINT `playlists_movies_ibfk_2` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`playlist_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
