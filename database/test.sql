--
-- Database: `test`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `grade` int(11) DEFAULT NULL
);

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `date_of_birth`, `grade`) VALUES
(1, 'Aarav', 'Sharma', '2002-01-01', 85),
(2, 'Aditi', 'Gupta', '2002-02-02', 90),
(3, 'Vivaan', 'Kumar', '2002-03-03', 95),
(4, 'Aanya', 'Singh', '2002-04-04', 80),
(5, 'Ishaan', 'Agarwal', '2003-05-05', 88),
(6, 'Ananya', 'Malhotra', '2003-06-06', 92),
(7, 'Krish', 'Patel', '2003-07-07', 89),
(8, 'Diya', 'Jain', '2004-08-08', 91),
(9, 'Arjun', 'Srivastava', '2004-09-09', 87),
(10, 'Saanvi', 'Verma', '2004-10-10', 93);

ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;
