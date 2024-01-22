-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 01:25 AM
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
-- Database: `joblink`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `cover_letter` text NOT NULL,
  `linkedin_profile` varchar(255) DEFAULT NULL,
  `portfolio` varchar(255) DEFAULT NULL,
  `skills` varchar(255) NOT NULL,
  `languages` varchar(255) DEFAULT NULL,
  `application_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `job_id`, `resume`, `cover_letter`, `linkedin_profile`, `portfolio`, `skills`, `languages`, `application_date`) VALUES
(2, 1, 3, 'resumes/65ad992e45c6e_NDA_model_agreement_FAB.pdf', 'Writing a great computer technician cover letter is an important step in your job search journey. When writing a cover letter, be sure to reference the requirements listed in the job description. In your letter, reference your most relevant or exceptional qualifications to help employers see why you\'re a great fit for the role. In the same way that you might reference cover letter samples and resume samples, the following computer technician cover letter example will help you write a cover letter that best highlights your experience and qualifications. If the job description of a computer technician interests you, upload your resume to Indeed Resume to get started.', 'https://www.linkedin.com/in/mukunzi-fabrice/', 'https://fabmukunzi.github.io/my-brand/', 'C++, JavaScript, SQL,Typescript', 'English, French,Kinyarwanda', '2024-01-21 22:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `createdAt` varchar(20) NOT NULL,
  `flyer` text NOT NULL,
  `employer` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `xperience` varchar(255) NOT NULL,
  `deadline` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `createdAt`, `flyer`, `employer`, `salary`, `type`, `xperience`, `deadline`) VALUES
(2, 'Frontend developer', 'responsible for developing new user-facing features, determining the structure and design of web pages, building reusable codes, optimizing page loading times, and using a variety of markup languages to create the web pages.', '2024-01-15 11:19:57', 'uploads/65a506cd8f7b8_wallpaperflare.com_wallpaper (2).jpg', 1, 300000, 'Full Time', '3 years', '2024-01-15T12:19'),
(3, 'Flutter developer', 'A Flutter developer specializes in using the Flutter framework to create cross-platform applications with a single codebase. They design, test, and build applications for mobile, web, and desktop using Dart language, ensuring a seamless, natively compiled experience.', '2024-01-15 11:23:16', 'uploads/65a50e4a07f95_wallpaperflare.com_wallpaper (3).jpg', 1, 100000, 'Internrship', '3', '2024-01-25T12:23'),
(4, 'Software Engineer', 'Research, design and write new software programs (e.g. business applications or computer games) and computer operating systems. evaluate the software and systems that make computers and hardware work. develop existing programs by analysing and identifying areas for modification.', '2024-01-15 14:24:59', 'uploads/65a5322b281e9_wallpaperflare.com_wallpaper (10).jpg', 1, 600000, 'Full Time', '10', '2024-01-26T15:24');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `senderNames` varchar(255) NOT NULL,
  `senderEmail` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdAt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `senderNames`, `senderEmail`, `message`, `createdAt`) VALUES
(1, 'Fabrice Mukunzi', 'fabmukunzi@gmail.com', 'hello', '2024-01-15 14:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `names` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `createdAt` text NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `names`, `password`, `avatar`, `createdAt`, `role`) VALUES
(1, 'mukunzifabrice77@gmail.com', 'Fabrice Mukunzi', '$2y$10$4emduhCD5IjbvX8nMmHjhea7s1K6iPYvjR4A4XI9WkGHFHHM01LmO', './dashboard/uploads/83646585.jpg', '0000-00-00', 'admin'),
(2, 'fabmukunzi@gmail.com', 'Munyana Angel', '$2y$10$HrRvGa0VnicuNahkNtF96ezCcBUWoWEg5s8KU.E3wVus.Ourif23W', '', '2024-01-11 21:40:12', 'employer'),
(3, 'jmugisha@gmail.com', 'Mugisha joseph', '$2y$10$xg8.la6.ZfUDJy7Qk9HpKeYmGhR22e9DnIGMcSLhY7VEDh0s2Cdqy', '', '2024-01-11 21:42:47', 'seeker'),
(5, 'mukunzifabrice@gmail.com', 'mukunzi fabrice', '$2y$10$UezWjKp2TPq5VtbSU9XhvesgVbwHwuKzzjHTd0A9sFqsqEfpZ8KxC', '', '2024-01-11 21:43:42', 'seeker'),
(7, 'josephmugisha@gmail.com', 'Mugisha Joseph', '$2y$10$ZGW1V3sIxcmCRqLRvtYA1u0hEPSnRJl2FYEXeXY63DPCmEenj/B4.', '', '2024-01-12 00:05:48', 'seeker'),
(8, 'emp1@gmail.com', 'Test Employeer', '$2y$10$5dwrUqpRmVBWfe0mspI.u.dwrRKmKGqLYQihVv9BD2DWSzab/Blhe', '', '2024-01-15 12:01:31', 'employer'),
(9, 'test@gmail.com', 'Test user', '$2y$10$vCBazw/8PKIZ9KAMENTOVOtmhw.1bGMsjBpK8y.wZHEb2hh5.UoFC', '', '2024-01-15 14:39:11', 'seeker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employer` (`employer`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`employer`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
