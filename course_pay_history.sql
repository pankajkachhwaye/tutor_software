-- --------------------------------------------------------

--
-- Table structure for table `student_course_pay_history`
--

CREATE TABLE IF NOT EXISTS `student_course_pay_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paid_amount` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student_course_pay_history`
--

INSERT INTO `student_course_pay_history` (`id`, `paid_amount`, `student_name`, `name`, `phone_no`, `created_at`, `updated_at`) VALUES
(1, '10', 'test', NULL, NULL, '2018-02-02 08:41:16', '2018-02-02 08:41:16'),
(2, '100', 'Chanalelo', NULL, NULL, '2018-02-03 22:21:26', '2018-02-03 16:51:26'),
(3, '250', 'primer', 'IndrasenC', '8770611735', '2018-02-09 04:56:57', '2018-02-08 23:26:57');

-- --------------------------------------------------------
