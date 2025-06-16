-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2025 pada 10.32
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courses`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `level` enum('Beginner','Intermediate','Advance') NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `language`, `level`, `price`) VALUES
('111', 'English Class', 'English', 'Beginner', '300000.00'),
('112', 'English Class', 'English', 'Intermediate', '500000.00'),
('113', 'English Class', 'English', 'Advance', '700000.00'),
('121', 'Japan Class', 'Japan', 'Beginner', '350000.00'),
('122', 'Japan Class', 'Japan', 'Intermediate', '550000.00'),
('123', 'Japan Class', 'Japan', 'Advance', '750000.00'),
('131', 'Mandarin Class', 'Mandarin', 'Beginner', '400000.00'),
('132', 'Mandarin Class', 'Mandarin', 'Intermediate', '600000.00'),
('133', 'Mandarin Class', 'Mandarin', 'Advance', '800000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `instructor_id` varchar(255) NOT NULL,
  `status` enum('Ongoing','Completed','Dropped') NOT NULL,
  `enrollment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `enrollments`
--

INSERT INTO `enrollments` (`enrollment_id`, `student_id`, `course_id`, `instructor_id`, `status`, `enrollment_date`) VALUES
('151', '001', '132', '142', 'Ongoing', '2025-06-02'),
('152', '002', '121', '141', 'Completed', '2025-02-19'),
('153', '003', '113', '143', 'Completed', '2024-07-27'),
('154', '004', '123', '141', 'Ongoing', '2025-06-01'),
('155', '005', '132', '142', 'Dropped', '2024-02-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` varchar(255) NOT NULL,
  `instructor_name` varchar(255) NOT NULL,
  `expertise` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `instructor_name`, `expertise`, `email`, `phone_number`) VALUES
('141', 'Yuki Andriani', 'Japan Teacher', 'yukiJapan@gmail.com', '0812334'),
('142', 'Chen Li Mei', 'Mandarin Teacher', 'ChenMandarin@gmail.com', '08234134'),
('143', 'Rahmat Hidayat', 'English Teacher', 'rahmatEnglish@gmail.com', '081783247817');

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `student_id` varchar(15) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `registration_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `email`, `phone_number`, `registration_date`) VALUES
('001', 'Berlindi', 'berlindi24ti@gmail.com', '08123456789', '2025-06-02'),
('002', 'Syafika', 'Syafika24ti@gmail.com', '08219486376', '2025-02-19'),
('003', 'Nadini', 'Nadini24ti@gmail.com', '0834213434', '2024-07-27'),
('004', 'Ghania', 'ghnaia24ti@gmail.com', '08344134', '2025-06-01'),
('005', 'Clara', 'clara22ti@gmail.com', '081243535', '2024-02-14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indeks untuk tabel `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `instructor_id` (`instructor_id`),
  ADD KEY `enrollment_date` (`enrollment_date`);

--
-- Indeks untuk tabel `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
