-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 07:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'uploads/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`, `mobile`, `image`) VALUES
(23, 'Harshkumar', 'Rana', 'rana22@adminpdpu.com', '$2y$10$btdJTNRxXyplVjf0.pKdq.4QAidke0vByZPbzPzFAr7.mfAZ7BsBC', 9727347935, 'uploads/the-lords-of-the-fallen-2024-4k-hn.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `aut_firstname` varchar(250) NOT NULL,
  `aut_lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `aut_firstname`, `aut_lastname`) VALUES
(102, 'William ', 'Shakespeare'),
(103, 'Chetan ', 'Bhagat'),
(104, 'Munshi ', 'Prem Chand'),
(106, 'Annie ', 'frank');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(250) NOT NULL,
  `author_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `rack_id` int(11) NOT NULL,
  `pub_id` int(11) NOT NULL,
  `book_no` int(11) NOT NULL,
  `book_image` varchar(2000) NOT NULL,
  `book_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `author_id`, `cat_id`, `rack_id`, `pub_id`, `book_no`, `book_image`, `book_desc`) VALUES
(7, 'Let us c', 103, 26, 3, 2, 10, 'uploads/661f5351165822.84368523_download (1).jpeg', 'hi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book\r\nhi this is let us c book'),
(8, 'Annie frank', 106, 26, 4, 2, 9, 'uploads/661f52116e2a07.61906655_download.jpeg', 'hi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book\r\nhi this is annie frank book');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(26, 'Nature'),
(27, 'technology'),
(28, 'CSE'),
(29, 'novel');

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `issuebook_id` int(11) NOT NULL,
  `rollno` varchar(10) NOT NULL,
  `book_image` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pub_id` int(11) NOT NULL,
  `issue_date` longtext NOT NULL,
  `return_date` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issued_books`
--

INSERT INTO `issued_books` (`issuebook_id`, `rollno`, `book_image`, `book_id`, `author_id`, `cat_id`, `pub_id`, `issue_date`, `return_date`) VALUES
(39, '22BCP091', 'uploads/661f52116e2a07.61906655_download.jpeg', 8, 106, 28, 3, '18-04-2024', '24-04-2024'),
(40, '22BCP096', 'uploads/661f52116e2a07.61906655_download.jpeg', 8, 106, 26, 2, '23-04-2024', '23-05-2024');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `pub_id` int(11) NOT NULL,
  `pub_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`pub_id`, `pub_name`) VALUES
(2, 's chand'),
(3, 'arihant');

-- --------------------------------------------------------

--
-- Table structure for table `rack`
--

CREATE TABLE `rack` (
  `rack_id` int(11) NOT NULL,
  `rack_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rack`
--

INSERT INTO `rack` (`rack_id`, `rack_name`) VALUES
(3, 'E003'),
(4, 'E002');

-- --------------------------------------------------------

--
-- Table structure for table `requestbooks`
--

CREATE TABLE `requestbooks` (
  `requestid` int(11) NOT NULL,
  `rollno` varchar(10) NOT NULL,
  `book_link` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `rollno` varchar(10) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'uploads/default.jpg',
  `fine` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`rollno`, `firstname`, `lastname`, `email`, `password`, `mobile`, `image`, `fine`) VALUES
('22BCP091', 'Harsh', 'Rana', 'harsh22@pdpu.com', '$2y$10$o30tZTtGDEFHvFuKMYrJAOC89rIIVNnAzsulxhlDnAH8aQkpXIlhq', 9727347935, 'uploads/embracing-solitude-a-journey-within-7n-1920x1080.jpg', 50),
('22BCP096', 'Nikunj', 'Vaghela', 'nikunjvaghela22@pdpu.com', '$2y$10$pPQRsFPHdWoRRThjs4Lxp.MCD13Bge1TRyhBq9JAb1LZ7yVYUrEYO', 7016327339, 'uploads/default.jpg', 0),
('22BCP101', 'Haard', 'Patel', 'haardpatel22@pdpu.com', '$2y$10$6XlWqZjtSwZWZ65RsYqjoOAxU2h/9bmJdAC84aR3ZRZiBqgZoYDP.', 7016161226, 'uploads/default.jpg', 0),
('22BCP104', 'Arjun', 'Patel', 'arjunpatel22@pdpu.com', '$2y$10$UTJRAlGtvy3Azl0FwUVJcO3w9FnW4ArC5AcS5eJLcE03WjArOE/de', 9106355730, 'uploads/default.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `author relation` (`author_id`),
  ADD KEY `category relation` (`cat_id`),
  ADD KEY `rack relation` (`rack_id`),
  ADD KEY `publisher relation` (`pub_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`issuebook_id`),
  ADD KEY `book` (`book_id`),
  ADD KEY `author` (`author_id`),
  ADD KEY `category` (`cat_id`),
  ADD KEY `publisher` (`pub_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`pub_id`);

--
-- Indexes for table `rack`
--
ALTER TABLE `rack`
  ADD PRIMARY KEY (`rack_id`);

--
-- Indexes for table `requestbooks`
--
ALTER TABLE `requestbooks`
  ADD PRIMARY KEY (`requestid`),
  ADD KEY `integrity` (`rollno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`rollno`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `issued_books`
--
ALTER TABLE `issued_books`
  MODIFY `issuebook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `pub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rack`
--
ALTER TABLE `rack`
  MODIFY `rack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requestbooks`
--
ALTER TABLE `requestbooks`
  MODIFY `requestid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `author relation` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`),
  ADD CONSTRAINT `category relation` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`),
  ADD CONSTRAINT `publisher relation` FOREIGN KEY (`pub_id`) REFERENCES `publishers` (`pub_id`),
  ADD CONSTRAINT `rack relation` FOREIGN KEY (`rack_id`) REFERENCES `rack` (`rack_id`);

--
-- Constraints for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD CONSTRAINT `author` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`),
  ADD CONSTRAINT `book` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `category` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`),
  ADD CONSTRAINT `publisher` FOREIGN KEY (`pub_id`) REFERENCES `publishers` (`pub_id`);

--
-- Constraints for table `requestbooks`
--
ALTER TABLE `requestbooks`
  ADD CONSTRAINT `integrity` FOREIGN KEY (`rollno`) REFERENCES `users` (`rollno`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
