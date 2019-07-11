-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2019 at 08:25 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `name` varchar(20) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`name`, `surname`, `email`, `age`, `profession`, `username`, `password`) VALUES
('Kostas', 'Chikimtzis', 'kostaschikis@gmail.com', 20, 'Student', 'kostasxikis', '$2y$10$E5YfwOmHD3AJP/Zk39UxNuDx//FS8Mo.7bgYgMK2r/VtSGP59Hyoq'),
('kapoios', 'kati', 'kapoios@gmail.com', 29, 'Web Developer', 'user2', '$2y$10$K.Bn7zrhUxTn36TzUeOVJeIJTZ92Xi9XuUHvLhzIXMgk6ftSpLZb2');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `title` varchar(50) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `description` varchar(350) NOT NULL,
  `year` int(4) NOT NULL,
  `director` varchar(30) NOT NULL,
  `actors` varchar(100) NOT NULL,
  `runtime` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`title`, `genre`, `description`, `year`, `director`, `actors`, `runtime`) VALUES
('enemy', 'Mystery', 'A man seeks out his exact look-alike after spotting him in a movie. ', 2013, 'Denis Villeneuve', 'Jake Gyllenhaal, Mélanie Laurent, Sarah Gadon', 91),
('hobbit', 'Fantasy ', 'The dwarves, along with Bilbo Baggins and Gandalf the Grey, continue their quest to reclaim Erebor, their homeland, from Smaug. Bilbo Baggins is in possession of a mysterious and magical ring. ', 2013, 'Peter Jackson', 'Ian McKellen, Martin Freeman, Richard Armitage', 161),
('inception', 'Sci-Fi ', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O. ', 2010, 'Christopher Nolan', 'Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page ', 148),
('interstellar', 'Sci-Fi ', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival. ', 2014, 'Christopher Nolan', 'Matthew McConaughey, Anne Hathaway, Jessica Chastain', 169),
('it chapter two', 'Horror', 'Twenty-seven years after their first encounter with the terrifying Pennywise, the Losers Club have grown up and moved away, until a devastating phone call brings them back.', 2019, 'Andy Muschietti', 'James McAvoy, Jessica Chastain, Bill Skarsgård', 135),
('john wick ', 'Action', 'An ex-hit-man comes out of retirement to track down the gangsters that killed his dog and took everything from him.', 2014, 'Chad Stahelski, David Leitch', 'Keanu Reeves, Michael Nyqvist, Alfie Allen', 101),
('lotr', 'Fantasy', 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring. ', 2003, 'Peter Jackson', 'Elijah Wood, Viggo Mortensen, Ian McKellen', 201),
('the conjuring', 'Horror', 'Paranormal investigators Ed and Lorraine Warren work to help a family terrorized by a dark presence in their farmhouse. ', 2013, 'James Wan', 'Patrick Wilson, Vera Farmiga, Ron Livingston', 112),
('the frame', 'Mystery', 'Two strangers find their lives colliding in an impossible way. Alex is a methodical cargo thief working for a dangerous cartel. Sam is a determined paramedic trying to save the world while running from her past. ', 2014, 'Jamin Winans', 'David Carranza, Tiffany Mualem, Cal Bartlett', 127),
('unacknownledged', 'Documentary ', '\"Unacknowledged\" focuses on the historic files of the Disclosure Project and how UFO secrecy has been ruthlessly enforced-and why.', 2017, 'Michael Mazzola', 'Richard Doty, Giancarlo Esposito, Steven M. Greer', 100);

-- --------------------------------------------------------

--
-- Table structure for table `ratings_comments`
--

CREATE TABLE `ratings_comments` (
  `movie_title` varchar(40) NOT NULL,
  `user` varchar(50) NOT NULL,
  `rating` int(1) NOT NULL,
  `comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings_comments`
--

INSERT INTO `ratings_comments` (`movie_title`, `user`, `rating`, `comment`) VALUES
('lotr', 'kostasxikis', 7, 'Amazing Movie!'),
('john wick', 'kostasxikis', 0, 'Very fun to watch with friends!'),
('inception', 'kostasxikis', 8, ''),
('lotr', 'user2', 4, ''),
('inception', 'user2', 0, 'Mindblowing'),
('john wick', 'user2', 6, 'Very Nice ðŸ”¥'),
('the frame', 'kostasxikis', 8, 'Amazing ðŸ‘'),
('interstellar', 'kostasxikis', 7, ''),
('hobbit', 'kostasxikis', 7, 'Stunning'),
('enemy', 'user2', 6, 'Crazy Action âš '),
('the frame', 'user2', 7, 'Very nice story');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`title`) USING BTREE;

--
-- Indexes for table `ratings_comments`
--
ALTER TABLE `ratings_comments`
  ADD KEY `rating_movie_fk` (`movie_title`),
  ADD KEY `username_fk` (`user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings_comments`
--
ALTER TABLE `ratings_comments`
  ADD CONSTRAINT `rating_movie_fk` FOREIGN KEY (`movie_title`) REFERENCES `movies` (`title`),
  ADD CONSTRAINT `username_fk` FOREIGN KEY (`user`) REFERENCES `accounts` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
