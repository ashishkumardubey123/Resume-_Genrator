-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2024 at 07:42 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resumegenerator`
--

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

DROP TABLE IF EXISTS `resumes`;
CREATE TABLE IF NOT EXISTS `resumes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `experience` text,
  `dob` date DEFAULT NULL,
  `address` text,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `about_me` text,
  `institute_course` varchar(100) DEFAULT NULL,
  `institute_name` varchar(100) DEFAULT NULL,
  `passing_year` int DEFAULT NULL,
  `institute_marks` decimal(5,2) DEFAULT NULL,
  `institute_address` text,
  `school_name_12th` varchar(100) DEFAULT NULL,
  `passing_year_12th` int DEFAULT NULL,
  `board_12th` varchar(100) DEFAULT NULL,
  `marks_12th` decimal(5,2) DEFAULT NULL,
  `school_address_12th` text,
  `school_name_10th` varchar(100) DEFAULT NULL,
  `passing_year_10th` int DEFAULT NULL,
  `board_10th` varchar(100) DEFAULT NULL,
  `marks_10th` decimal(5,2) DEFAULT NULL,
  `school_address_10th` text,
  `skills` text,
  `languages` text,
  `interests` text,
  `fathers_name` varchar(100) DEFAULT NULL,
  `martial_status` varchar(20) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `user_id`, `name`, `photo`, `experience`, `dob`, `address`, `phone`, `email`, `job_title`, `about_me`, `institute_course`, `institute_name`, `passing_year`, `institute_marks`, `institute_address`, `school_name_12th`, `passing_year_12th`, `board_12th`, `marks_12th`, `school_address_12th`, `school_name_10th`, `passing_year_10th`, `board_10th`, `marks_10th`, `school_address_10th`, `skills`, `languages`, `interests`, `fathers_name`, `martial_status`, `nationality`, `gender`, `status`) VALUES
(1, 3, 'John Does', 'ai-generated-7809880_1280.jpg', 'Software Engineer | ABC Tech Solutions | 2018 - Present/\r\n- Developed and maintained scalable web applications using technologies like React, Node.js, and MongoDB./\r\n- Collaborated with cross-functional teams to deliver high-quality software solutions that meet client requirements./\r\n- Led a team of developers in the successful completion of a major project, resulting in a 20% increase in client satisfaction/\r\n- Conducted code reviews and provided constructive feedback to team members to ensure code quality and adherence to best practices.', '1990-01-01', '123 Main St, City, Country', '1234567890', 'john@example.com', 'Senior Developer', 'I am a passionate and dedicated professional with a strong background in software engineering. My journey in the field of technology started with a deep curiosity about how things work, which eventually led me to pursue a degree in Computer Science. Throughout my career, I have worked on various projects ranging from web development to machine learning, honing my skills and expertise along the way.', 'Computer Science', 'ABC Institute', 2015, 80.50, 'ABC Institute Address', 'XYZ School', 2012, 'CBSE', 85.60, 'XYZ School Address', 'PQR School', 2010, 'ICSE', 92.30, 'PQR School Address', 'PHP, MySQL, HTML, CSS', 'English, Hindi', '', 'Jany Doe', 'Married', 'Indian', 'Male', 1),
(2, 3, 'Jane Doe', 'ai-generated-7809880_1280.jpg', '3 years of experience in...', '1992-05-15', '456 Oak St, Town, Country', '0987654321', 'jane@example.com', 'Software Engineer', 'I am dedicated to delivering...', 'Information Technology', 'XYZ College', 2017, 87.50, 'XYZ College Address', 'ABC High School', 2014, 'CBSE', 88.20, 'ABC High School Address', 'PQR School', 2012, 'ICSE', 94.70, 'PQR School Address', 'Java, Python, JavaScript', 'English, French', 'Traveling, Photography', 'Joe Doe', 'Single', 'Indian', 'Female', 0),
(3, 3, 'Alice Smith', 'ai-generated-7809880_1280.jpg', '2 years of experience in...', '1995-09-20', '789 Elm St, Village, Country', '5551234567', 'alice@example.com', 'Web Developer', 'I have a strong passion for...', 'Computer Engineering', 'LMN University', 2019, 91.30, 'LMN University Address', 'DEF High School', 2016, 'CBSE', 90.50, 'DEF High School Address', 'MNO School', 2014, 'ICSE', 96.80, 'MNO School Address', 'HTML, CSS, JavaScript, React', 'English, Spanish', 'Hiking, Painting', 'Jhonson Smith', 'Single', 'American', 'Female', 1),
(4, 3, 'Robert Johnson', 'ai-generated-7809880_1280.jpg', '4 years of experience in...', '1988-12-10', '321 Pine St, Village, Country', '9876543210', 'robert@example.com', 'Project Manager', 'I excel at managing...', 'Business Administration', 'GHI College', 2013, 85.00, 'GHI College Address', 'JKL High School', 2010, 'CBSE', 89.20, 'JKL High School Address', 'QRS School', 2008, 'ICSE', 93.40, 'QRS School Address', 'Project Management, Leadership', 'English', 'Golfing, Cooking', 'Haward Jhonson', 'Married', 'British', 'Male', 1),
(22, 3, 'Manjesh Kumar', 'ai-generated-7809880_1280.jpg', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. /Eius similique quae dolorum adipisci nostrum esse necessitatibus consectetur libero culpa praesentium incidunt expedita laudantium animi, quisquam quis quam obcaecati? /Accusantium repellat perferendis ea, non corporis eligendi laudantium libero voluptate odio exercitationem. /Possimus nulla rerum laborum consequatur omnis accusamus facilis, est porro numquam, delectus voluptatem expedita. /Officia fugit blanditiis aperiam excepturi veniam dicta delectus nisi, neque, laboriosam ducimus quisquam porro eius. /Voluptas nam a beatae ullam praesentium explicabo consequuntur ab laborum adipisci inventore numquam optio consequatur quae incidunt eveniet quasi sequi ex, accusantium amet reprehenderit magni illo nobis. Neque, dignissimos! Iusto, alias.', '2001-03-22', 'Qtr no RB-2, 386/4 Nehru Railway Colony howbag Jabalpur', '09691652071', 'diego@gmail.com', 'web devloper', 'dfdsfsdfsf', NULL, NULL, NULL, NULL, NULL, 'test', 2022, 'cbse', 98.00, 'Qtr no RB-2, 386/4 Nehru Railway Colony howbag Jabalpur', 'test', 2018, 'cbse', 57.00, 'Qtr no RB-2, 386/4 Nehru Railway Colony howbag Jabalpur', 'html,css,java,php,sql,bootstrap', 'test1,test2', '', 'jio', 'test', 'test', 'Male', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(4, 'abc@gmail.com', '$2y$10$suJ3b1Uhx3Z/AV/bZCMgbuMhMXUyftXXAHxMZCRE7rzr1nH29Nkwq'),
(3, 'admin@gmail.com', '$2y$10$Iabuy1Wv7JBuPa0u/DkBte4mD/pkW6lfPSO9eyII3Yv6XOSIiAhsi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
