SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `leads` (
  `name` varchar(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` int(11) NOT NULL,
  `company` varchar(64) NOT NULL,
  `position` text NOT NULL,
  `truck_quantity` int(11) NOT NULL,
  `state` varchar(2) NOT NULL,
  `city` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `leads` (`name`, `email`, `phone`, `company`, `position`, `truck_quantity`, `state`, `city`, `id`) VALUES
('VINICIUS SOUZA FERRI', 'vinicius.souza.ferri@gmail.com', 0, 'aaa', 'driver', 1, 'SC', 'Joinville', 120);

ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
