-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 08:14 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizz`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Part I', NULL, NULL),
(2, 'Part II', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_27_034730_create_levels_table', 1),
(5, '2020_11_27_034742_create_subjects_table', 1),
(6, '2020_11_27_043508_create_quizzes_table', 1),
(7, '2020_11_27_044636_create_questions_table', 1),
(8, '2020_11_30_055257_create_results_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `quizId` int(10) UNSIGNED NOT NULL,
  `statement` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optionA` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optionB` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optionC` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `optionD` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quizId`, `statement`, `optionA`, `optionB`, `optionC`, `optionD`, `ans`) VALUES
(1, 1, 'Pakistan k nzriay ki asaas ______ hy', 'kalma', 'deen e islam', 'quaid e azam', 'saqafat ka frq', 'B'),
(2, 1, 'Nazria e Islam hi _____ hy', '2 qaumi nazria', 'Qrar dad e mqasid', 'Nazria e Pakistan', 'Asal Nazria', 'C'),
(3, 1, 'Pakistan to usi roz wajood me aa gia tha jb _____ hindu muslman hua', 'Pehla', 'Doosra', 'Teesra', 'Akhri', 'A'),
(4, 1, 'Nazria e Pakistan k ajza e trkeebi me shamil ni hy', 'Aqaaid o Ibadaat ', 'Muaashrti Insaf', 'Akhuwwat', 'Infradiat', 'D'),
(5, 1, '\"Muslman hona jurm qrar paya\", ye kis writer ka alfaz hain? ', 'Robert', 'William Hunter', 'Shakespere', 'Smith', 'B'),
(6, 1, 'Ghazi pur me madrassa kb qaim hua?', '1859', '1860', '1861', '1862', 'D'),
(7, 1, 'Muhammadan Educational Conference kb qaim hui?', '1885', '1886', '1890', '1900', 'B'),
(8, 1, 'Sir Syed Ahmad Khan ki tasneef hy', 'Miraat Ul Urros', 'Ibn ul Waqt', 'Al Ghazali', 'Aaeen e Akbari', 'D'),
(9, 1, 'Urdu Hindi tnaza kb start hua?', '1865', '1866', '1867', '1868', 'C'),
(10, 1, '\"Kasr e Pakistan ki buniad me pehli eent isi mrd peer ne rkhi thi\", kis k alfaz hain? ', 'Maulvi Abdul Haq', 'Sir Syed Ahmad Khan', 'Quaid e Azam', 'Allama Iqbal', 'A'),
(11, 2, 'Standard version of C language is _____', 'ANCII', 'ANSI', 'ASCII', 'Turbo C', 'B'),
(12, 2, '____________ is an example of low level language', 'Pascal', 'Java', 'C', 'Machine Languauge', 'D'),
(13, 2, 'One who develops program is called _______', 'Developer', 'Programmer', 'Coder', 'All of above', 'D'),
(14, 2, 'Which program does not need compilation', 'Assembly program', 'Machine Langauge', 'Both  A & B', 'None', 'C'),
(15, 2, 'Which language does not require compilation?', 'C', 'Java', 'C #', 'Assembly', 'D'),
(16, 2, 'scanF(\"%d\", &variable); contains', 'logical error', 'run time error', 'syntax error', 'no error', 'C'),
(17, 2, '.exe is finally produced by ___________', 'loader', 'linker', 'assembler', 'compiler', 'D'),
(18, 2, 'The symbol of preprocessor directive is _________', '$', '%', '&', '#', 'D'),
(19, 2, 'scanf() is an examples of ', 'input function', 'output function', 'printing function', 'storage function', 'A'),
(20, 2, 'what is true about an interpreter?', 'does not produce any .exe file', 'translates statements one by one', 'is slower than compiler', 'All of above', 'D'),
(21, 3, 'scanner is an example of _______', 'input device', 'output device', 'processing device', 'storage device', 'A'),
(22, 3, 'what is not true about information?', 'it is always in organized form', 'it is always meaningless', 'it is a processed form of data', 'None of above', 'B'),
(23, 3, 'It is not a storage device', 'CD', 'CPU', 'Hard Disk', 'USB', 'B'),
(24, 3, 'Window 7 is an example of ________', 'Utility software', 'Operating system', 'Application software', 'Customized software', 'B'),
(25, 3, 'Inverted mouse is just like ______', 'trackpad', 'trackball', 'touch pad', 'scanner', 'B'),
(26, 3, 'Hard copy is produced by _________', 'Speaker', 'CPU', 'Printer', 'Barcode reader', 'C'),
(27, 3, 'Corel draw is an example of ', 'application software ', 'driver', 'operating system', 'game', 'A'),
(28, 3, 'Hyper media may consist of ', 'text', 'image', 'audio', 'All of above', 'D'),
(29, 3, 'CPU is a _______________', 'Software', 'Hardware', 'Processing device', 'Storage device', 'C'),
(30, 3, '___________ is the part of CPU where actual execution takes place.', 'Memory', 'Hard disk', 'Control Unit', 'Arithmetic Logic Unit', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(10) UNSIGNED NOT NULL,
  `levelId` int(10) UNSIGNED NOT NULL,
  `subjectId` int(10) UNSIGNED NOT NULL,
  `weekNo` int(10) UNSIGNED NOT NULL,
  `teacherId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `levelId`, `subjectId`, `weekNo`, `teacherId`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 1, NULL, NULL),
(2, 2, 3, 1, 1, NULL, NULL),
(3, 1, 3, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `quizId` int(10) UNSIGNED NOT NULL,
  `rollNo` int(10) UNSIGNED NOT NULL,
  `sname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(1, 'Islamiat'),
(2, 'Pak Studies'),
(3, 'Computer Sc.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(1, 'abbas', '03424930066', '123', '2020-12-06 13:57:48', '2020-12-06 13:57:48'),
(2, 'umair', '03464428505', '123', '2020-12-06 13:57:48', '2020-12-06 13:57:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quizid_foreign` (`quizId`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_levelid_foreign` (`levelId`),
  ADD KEY `quizzes_subjectid_foreign` (`subjectId`),
  ADD KEY `quizzes_teacherid_foreign` (`teacherId`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_quizid_foreign` (`quizId`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quizid_foreign` FOREIGN KEY (`quizId`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_levelid_foreign` FOREIGN KEY (`levelId`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quizzes_subjectid_foreign` FOREIGN KEY (`subjectId`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quizzes_teacherid_foreign` FOREIGN KEY (`teacherId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_quizid_foreign` FOREIGN KEY (`quizId`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
