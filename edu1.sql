SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `students_info` (
  `student_id` int(10) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `id` varchar(20) NOT NULL,
  `batch_no` varchar(10) NOT NULL,
  `cell` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `students_info` (`student_id`, `s_name`, `id`, `batch_no`, `cell`, `address`, `photo`, `status`) VALUES
(1, 'Proshanto Chondro  mollick ', 'CTG-01', '268', '323232323', 'Uttara', '56261d941bdc38329118be4ae76ad2b1.jpeg', 'active'),
(5, '  Arafat Raton ', '9966685', '558', '019194305000', 'Mirpur 6', '39a47772ea975d07ed8870850ccd6cd7.jpg', 'active');



CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cell` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `users` (`user_id`, `fname`, `uname`, `email`, `cell`, `pass`, `photo`, `status`) VALUES
(9, 'Md. redowan ', 'redo11', 'redowan@gamil.com', '0145487450', '$2y$10$ix6apdBaWl6G30ZIey/KfeoUPfM24GYQv2uCvqI3z8u5YYwPqwX6C', '065662c8d78ea9e893c15c65ea730d42.jpg', 'active');


ALTER TABLE `students_info`
  ADD PRIMARY KEY (`student_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `students_info`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

