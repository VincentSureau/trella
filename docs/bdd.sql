CREATE TABLE `Project` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `description` varchar(255),
  `title` varchar(255),
  `user_id` int
);

CREATE TABLE `User` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255) UNIQUE NOT NULL,
  `username` varchar(255) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL
);

CREATE TABLE `Card` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `list_id` int,
  `title` varchar(255),
  `description` text
);

CREATE TABLE `List` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `project_id` int
);

CREATE TABLE `Comment` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `card_id` int,
  `content` text
);

ALTER TABLE `Project` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `Card` ADD FOREIGN KEY (`list_id`) REFERENCES `List` (`id`);

ALTER TABLE `List` ADD FOREIGN KEY (`project_id`) REFERENCES `Project` (`id`);

ALTER TABLE `Comment` ADD FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

ALTER TABLE `Comment` ADD FOREIGN KEY (`card_id`) REFERENCES `Card` (`id`);
