--
-- Database: `project_webtech_csslnw`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `id_subject_semester` int(11) NOT NULL,
  `time_created` varchar(5) NOT NULL,
  `qr_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `username_stu` varchar(10) NOT NULL,
  `username_tea` varchar(10) NOT NULL,
  `id_subject_semester` int(11) NOT NULL,
  `comment_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'Student'),
(2, 'Teacher'),
(3, 'Laboratory-Teacher'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `credit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `credit`) VALUES
(1418114, 'Introduction to Computer Science', 4),
(1418116, 'Computer Programming', 3),
(1418217, 'Object Oriented Programming', 3),
(1418221, 'Database System', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subject_semester`
--

CREATE TABLE `subject_semester` (
  `id` int(11) NOT NULL,
  `id_subject` int(8) NOT NULL,
  `semester` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `section` int(3) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_semester`
--

INSERT INTO `subject_semester` (`id`, `id_subject`, `semester`, `year`, `section`, `time`) VALUES
(1, 1418116, 2, 2016, 1, '09.30-11.30'),
(2, 1418114, 1, 2016, 1, '08.00-10.00'),
(3, 1418221, 2, 2016, 200, '08.00-12.00'),
(4, 1418217, 1, 2016, 200, '12.00-16.00');

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher`
--

CREATE TABLE `subject_teacher` (
  `username` varchar(10) NOT NULL,
  `id_subject_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_teacher`
--

INSERT INTO `subject_teacher` (`username`, `id_subject_semester`) VALUES
('5610400091', 1),
('5610400091', 2),
('5610400091', 3),
('5610400091', 4);

-- --------------------------------------------------------

--
-- Table structure for table `takes`
--

CREATE TABLE `takes` (
  `username` varchar(10) NOT NULL,
  `id_subject_semester` int(11) NOT NULL,
  `grade` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `takes`
--

INSERT INTO `takes` (`username`, `id_subject_semester`, `grade`) VALUES
('5610450080', 1, NULL),
('5610450080', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `take_class`
--

CREATE TABLE `take_class` (
  `id_class` int(11) NOT NULL,
  `username_stu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(64) NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `pic_path` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `role_id` int(1) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text,
  `tel` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fname`, `lname`, `pic_path`, `role_id`, `email`, `address`, `tel`) VALUES
('5610400091', '0ed02142ead58ab9da947e00fa0f416895478618', 'Nattharat', 'Jariyanuntanet', 'adasjdkajslkdjalsjdlk', 3, 'nattharat.j@ku.th', 'Lak si, Bangkok, Thailand', '084-444-4444'),
('5610404452', '78c84e6895448e0317aa1f06f807c4e22fba5113', 'Boonyaporn', 'Narkjumrussri', 'xxxxxxx_aaaxxxaaxx', 4, 'boonyaporn.n@ku.th', 'Bongkok, Thailand', '089-999-9999'),
('5610450063', 'c9dfb3338b461c8662ce7c52f4a28672a75b9fb5', 'Jompol', 'Sermsook', 'aaaaaaaxxxxxxx_Xx', 4, 'jompol.s@ku.th', 'Nonthaburi, Thailand', '085-088-1886'),
('5610450080', '817965431c04a46f3af2f982ceff704a9cd0890b', 'Chayamon', 'Kanjanapongsawet', 'xxxxxxxaas', 1, 'chayamon.ka@ku.th', 'Samyan, Bangkok, Thailand', '081-111-1111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `subject_semester`
--
ALTER TABLE `subject_semester`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD PRIMARY KEY (`username`,`id_subject_semester`);

--
-- Indexes for table `takes`
--
ALTER TABLE `takes`
  ADD PRIMARY KEY (`username`,`id_subject_semester`);

--
-- Indexes for table `take_class`
--
ALTER TABLE `take_class`
  ADD PRIMARY KEY (`id_class`,`username_stu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subject_semester`
--
ALTER TABLE `subject_semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
