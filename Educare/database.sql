-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 09:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
    time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `educare`
--
-- --------------------------------------------------------
--
-- Table structure for table `activities`
--
CREATE TABLE `activities` (
    `id` int(11) NOT NULL,
    `name` varchar(250) NOT NULL,
    `image` varchar(250) NOT NULL,
    `sdf` int(33) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--
INSERT INTO
    `activities` (`id`, `name`, `image`, `sdf`)
VALUES
    (9, 'Team-Work', '../uploads/activity2.jpg', 0),
    (10, 'Cooding', '../uploads/activity1.jpg', 0),
    (11, 'Drawing', '../uploads/activity3.avif', 0),
    (12, 'Sports', '../uploads/activity4.jpeg', 0);

-- --------------------------------------------------------
--
-- Table structure for table `teachers`
--
CREATE TABLE `teachers` (
    `ID` int(11) NOT NULL,
    `name` varchar(250) NOT NULL,
    `subject` varchar(250) NOT NULL,
    `image` varchar(250) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--
INSERT INTO
    `teachers` (`ID`, `name`, `subject`, `image`)
VALUES
    (78, 'Susan ', 'Math', '../uploads/teacher1.jpg'),
    (
        79,
        'Jacob',
        'History',
        '../uploads/teacher2.jpg'
    ),
    (
        80,
        'Nicole',
        'English',
        '../uploads/teacher3.jpg'
    ),
    (
        81,
        'John',
        'Programming',
        '../uploads/teacher4.jpg'
    );

-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE `users` (
    `ID` int(11) NOT NULL,
    `name` varchar(250) NOT NULL,
    `email` varchar(250) NOT NULL,
    `password` varchar(250) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--
-- Dumping data for table `users`
--
INSERT INTO
    `users` (`ID`, `name`, `email`, `password`)
VALUES
    (
        3,
        'admin',
        'admin@gmail.com',
        '$2y$10$HBxdTaZU8AxwXyJr7iIbjetoUljVssHwoHOBkoRet5xcZB5a.Hboe'
    ),
    (
        4,
        'Jessica',
        'demes@mailinator.com',
        '$2y$10$pfzJNkz88fMjp8JHFKBG5OAJ4pPlfOeOLtNmRpR6KSS0gxZfGcyYK'
    ),
    (
        5,
        'Clementine',
        'lanyjabyla@mailinator.com',
        '$2y$10$19DuuGzA62Q9pTZr5x1qJuaKyOuEzZwfa6nrjx5KBMBBfWUrn7hPm'
    );

--
-- Indexes for dumped tables
--
--
-- Indexes for table `activities`
--
ALTER TABLE
    `activities`
ADD
    PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE
    `teachers`
ADD
    PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE
    `users`
ADD
    PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE
    `activities`
MODIFY
    `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 17;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE
    `teachers`
MODIFY
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE
    `users`
MODIFY
    `ID` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;