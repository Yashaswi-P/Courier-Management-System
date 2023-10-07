SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


use courierdb1;

CREATE TABLE `adlogin` (
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `a_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `adlogin` (`email`, `password`, `a_id`) VALUES
('admin1@gmail.com', '12345', 1),
('admin2@gmail.com', '12345', 2);


CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pnumber` int(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`a_id`, `email`, `name`, `pnumber`) VALUES
(1, 'admin1@gmail.com', 'Admin1', 12345),
(2, 'admin2@gmail.com', 'Admin2', 12345);



CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `msg` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `contacts` (`id`, `email`, `subject`, `msg`) VALUES
(1, 'hari@gmail.com', 'delay', 'I have courier 2 weeks ago but its not delivered yet..'),
(2, 'yashasvi@gmail.com', 'damage', 'the package received had damages');

CREATE TABLE `courier` (
  `c_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `semail` varchar(50) DEFAULT NULL,
  `remail` varchar(50) DEFAULT NULL,
  `sname` varchar(50) DEFAULT NULL,
  `rname` varchar(50) DEFAULT NULL,
  `sphone` varchar(20) DEFAULT NULL,
  `rphone` varchar(20) DEFAULT NULL,
  `saddress` varchar(50) DEFAULT NULL,
  `raddress` varchar(50) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `billno` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `courier` (`c_id`, `u_id`, `semail`, `remail`, `sname`, `rname`, `sphone`, `rphone`, `saddress`, `raddress`, `weight`, `billno`, `image`, `date`) VALUES
(7, 4, 'hari@gmail.com', 'vishnu@gmail.com', 'hari', 'vishnu', '06362786223', '6526652', 'nitte', 'mangalore city center', 2, 22, 'cddd.jpeg', '2021-12-06'),
(8, 4, 'yashasvi@gmail.com', 'hari@gmail.com', 'yashasvi', 'hari', '06362786223', '06362786223', 'nmamit boys hostel', 'nmit boys hostel', 2, 3263, 'fc.png', '2022-12-06');

CREATE TABLE `login` (
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `login` (`email`, `password`, `u_id`) VALUES
('hari@gmail.com', '12345', 1),
('yashasvi@gmail.com', '12345', 4);


CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pnumber` int(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`u_id`, `email`, `name`, `pnumber`) VALUES
(1, 'hari@gmail.com', 'hari', 56665),
(4, 'yashasvi@gmail.com', 'yashasvi', 2147483647);



ALTER TABLE `adlogin`  ADD KEY `a_id` (`a_id`);
ALTER TABLE `admin`  ADD PRIMARY KEY (`a_id`),  ADD UNIQUE KEY `email` (`email`);
ALTER TABLE `contacts`  ADD PRIMARY KEY (`id`);
ALTER TABLE `courier`  ADD PRIMARY KEY (`c_id`),  ADD UNIQUE KEY `billno` (`billno`),  ADD KEY `u_id` (`u_id`);
ALTER TABLE `login`  ADD KEY `u_id` (`u_id`);
ALTER TABLE `users` ADD PRIMARY KEY (`u_id`), ADD UNIQUE KEY `email` (`email`);
ALTER TABLE `admin`  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `contacts` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `courier`  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE `users`  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `adlogin`  ADD CONSTRAINT `adlogin_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`);
ALTER TABLE `courier`  ADD CONSTRAINT `courier_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE;
ALTER TABLE `login`  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`) ON DELETE CASCADE;

COMMIT;