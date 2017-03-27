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
  `time_limit` varchar(5) NOT NULL,
  `qr_path` varchar(255) DEFAULT NULL
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
  `id` varchar(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `credit` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `credit`) VALUES
('01418114', 'Introduction to Computer Science', 4),
('01418116', 'Computer Programming', 3),
('01418131', 'DigitalComputerLogic', 3),
('01418132', 'FundamentalsofComputing', 4),
('01418217', 'Object Oriented Programming', 3),
('01418221', 'Database System', 3);

-- --------------------------------------------------------

--
-- Table structure for table `subject_semester`
--

CREATE TABLE `subject_semester` (
  `id` int(11) NOT NULL,
  `id_subject` varchar(8) NOT NULL,
  `semester` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `section` int(3) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject_semester`
--

INSERT INTO `subject_semester` (`id`, `id_subject`, `semester`, `year`, `section`, `time`) VALUES
(1, '01418116', 2, 2016, 1, '09.30-11.30'),
(2, '01418114', 1, 2016, 1, '08.00-10.00'),
(3, '01418221', 2, 2016, 200, '08.00-12.00'),
(4, '01418217', 1, 2016, 200, '12.00-16.00'),
(5, '01418131', 1, 2015, 1, '08:00');

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
('5010400201', 5),
('5010401204', 5),
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
('5510404205', 5, NULL),
('5510404206', 5, NULL),
('5510404209', 5, NULL),
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
  `pic_path` varchar(255) CHARACTER SET utf8mb4 DEFAULT 'files/img/profile/contact-default3.png',
  `role_id` int(1) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text,
  `tel` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `fname`, `lname`, `pic_path`, `role_id`, `email`, `address`, `tel`) VALUES
('5010400201', '024e4ef7f3c1a12db0b9cd914318c226644c9537', 'Chuleerat', 'Jaruskulchai', 'files/img/profile/contact-default3.png', 2, NULL, NULL, NULL),
('5010400202', '6d04a668ccc2166d714a086df60aca8082ed8667', 'Anongnart', 'Srivihok', 'files/img/profile/contact-default3.png', 2, NULL, NULL, NULL),
('5010400203', 'e67ea1c73229b4fec8aeb04ba02d8ba092e4569d', 'Sirikorn', 'Channual', 'files/img/profile/contact-default3.png', 2, NULL, NULL, NULL),
('5010401204', '78ae9f6e6a12a1af3c5a87f0f649f73aa2b4c7be', 'Sornchai', 'Laksanapeeti', 'files/img/profile/contact-default3.png', 3, NULL, NULL, NULL),
('5010405210', 'ecacae52b5fb785e1062b2db0471bdc945ba4c11', 'Ronnapat', 'Chatsanguthai', 'files/img/profile/contact-default3.png', 4, NULL, NULL, NULL),
('5510404205', '544a6ce776b846b62f200eedabf8f2d0d0c3558d', 'Ekachai', 'Srivanna', 'files/img/profile/contact-default3.png', 1, NULL, NULL, NULL),
('5510404206', 'd6b921ce93f6474cbbf71f0d9649500cd39e7e41', 'Suriyu', 'Chevasath', 'files/img/profile/contact-default3.png', 1, NULL, NULL, NULL),
('5510404207', '664b0ec2b6bd0af879f7b9f82205e8639159d7fd', 'Chota', 'Takemura', 'files/img/profile/contact-default3.png', 1, NULL, NULL, NULL),
('5510404208', 'e3645f32b13dbf35284ae794893a1b7dc71b0532', 'Tanatath', 'Likhittharakul', 'files/img/profile/contact-default3.png', 1, NULL, NULL, NULL),
('5510404209', 'bc9df7db16d7e5bdda4cc0b9d650014304c67dda', 'Kamonwut', 'Chittrarat', 'files/img/profile/contact-default3.png', 1, NULL, NULL, NULL),
('5610400091', '0ed02142ead58ab9da947e00fa0f416895478618', 'Nattharat', 'Jariyanuntanet', 'files/img/profile/azure_logo.png', 3, 'nattharat.j@ku.th', 'Nonthaburi Thailand', '085-123-4567'),
('5610404452', '78c84e6895448e0317aa1f06f807c4e22fba5113', 'Boonyaporn', 'Narkjumrussri', 'files/img/profile/contact-default3.png', 4, 'boonyaporn.n@ku.th', 'Bongkok, Thailand', '089-999-9999'),
('5610450063', 'c9dfb3338b461c8662ce7c52f4a28672a75b9fb5', 'Jompol', 'Sermsook', 'files/img/profile/contact-default3.png', 4, 'jompol.s@ku.th', 'Nonthaburi, Thailand', '085-088-1886'),
('5610450080', '817965431c04a46f3af2f982ceff704a9cd0890b', 'Chayamon', 'Kanjanapongsawet', 'files/img/profile/contact-default3.png', 1, 'chayamon.ka@ku.th', 'Samyan, Bangkok, Thailand', '081-555-1511');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
