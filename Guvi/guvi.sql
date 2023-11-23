SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `contact` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`username`, `email`, `password`, `dob`, `age`, `contact`) VALUES
('madhu', 'madhu@gmail.com', '123456', '2001-10-26', 22, '1234567891'),
('pragadeeshwaran', 'pragadeesh@gmail.com', '123456', '2001-07-04', 22, '9150209025');

COMMIT;
