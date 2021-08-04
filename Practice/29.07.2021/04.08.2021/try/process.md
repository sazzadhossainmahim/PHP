Database: `practice`

CREATE DATABASE practice;


CREATE TABLE `validation` (
  `id` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `education` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `validation` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);