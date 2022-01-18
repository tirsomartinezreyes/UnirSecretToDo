
CREATE TABLE `accessToken` (
  `accessToken` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `toDo` int DEFAULT NULL,
  PRIMARY KEY (`accessToken`),
  KEY `toDo` (`toDo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `item` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `isDone` tinyint(1) NOT NULL DEFAULT '0',
  `label` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `toDo` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `todo` (`toDo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `log` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `time` int DEFAULT NULL,
  `target` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `toDo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userPassPhrase` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `systemPassPhrase` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userPassPhrase` (`userPassPhrase`,`systemPassPhrase`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
