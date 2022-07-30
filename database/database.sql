CREATE DATABASE IF NOT EXISTS `movie_db_backup`;

USE `movie_db_backup`;

CREATE TABLE `comments` (
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  `user_id` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_avatar` varchar(50) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `movie_id` varchar(20) NOT NULL,
  `movie_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `users` (
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(30) DEFAULT NULL,
  `user_avatar` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
  `role` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;  