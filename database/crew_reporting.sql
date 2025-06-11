-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table crew_reporting.cache: ~0 rows (approximately)

-- Dumping data for table crew_reporting.cache_locks: ~0 rows (approximately)

-- Dumping data for table crew_reporting.crews: ~7 rows (approximately)
INSERT INTO `crews` (`id`, `full_name`, `staff_number`, `rank`, `nric`, `passport_number`, `issue_date`, `expired_date`, `issue_country`, `gender`, `flight_id`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin', 'Admin', 'N/A', 'N/A', '2025-06-03', '2025-06-03', 'N/A', 'N/A', NULL, '2025-06-02 18:29:53', '2025-06-02 18:29:53'),
	(2, 'james', 'STF001', 'FLIGHT STEWARD', '880101-14-5678', 'A1234567', '2020-01-01', '2030-01-01', 'Malaysia', 'Male', 1, '2025-06-02 18:44:25', '2025-06-02 20:51:04'),
	(3, 'Zulu', 'STF002', 'CAPTAIN', '901212-14-5678', 'A7654321', '2020-01-01', '2030-01-01', 'Africa', 'Male', 1, '2025-06-02 19:14:52', '2025-06-02 21:25:42'),
	(4, 'Max', 'STF03', 'LEADING STEWARD', '021021-14-5678', 'A1234765', '2025-06-01', '2025-06-30', 'Malaysia', 'Male', NULL, '2025-06-02 20:05:17', '2025-06-02 23:04:27'),
	(5, 'Kira', 'STF003', 'FLIGHT STEWARDESS', '031293-14-1280', 'A1234568', '2025-06-02', '2025-06-30', 'Singapore', 'Male', 1, '2025-06-02 22:27:41', '2025-06-02 22:28:02'),
	(6, 'HAKAM', 'STF005', 'FIRST OFFICER', '021020-03-1289', 'A54356345', '2025-06-01', '2025-06-30', 'India', 'Male', 1, '2025-06-02 23:02:09', '2025-06-02 23:04:45'),
	(7, 'MUHAMMAD HAKAM MUSAWI', 'STF006', 'LEADING STEWARD', '021020-03-1289', 'A5432562', '2025-06-09', '2026-06-09', 'Malaysia', 'Male', 3, '2025-06-08 23:20:03', '2025-06-08 23:20:21');

-- Dumping data for table crew_reporting.failed_jobs: ~0 rows (approximately)

-- Dumping data for table crew_reporting.flights: ~3 rows (approximately)
INSERT INTO `flights` (`id`, `flight_number`, `destination`, `departure`, `arrival`, `flight_time`, `aircraft_type`, `created_at`, `updated_at`) VALUES
	(1, 'MH1', 'KUL-LHR', '2025-06-30 09:00:00', '2025-06-30 13:30:00', '1230', 'A350', '2025-06-03 03:01:14', '2025-06-02 20:50:55'),
	(2, 'MH711', 'KUL-CGK', '2025-06-30 15:00:00', '2025-06-30 17:00:00', '0200', 'A350', '2025-06-02 20:03:34', '2025-06-02 20:03:34'),
	(3, 'MH2637', 'KUL-BKL', '2025-10-20 10:00:00', '2025-10-20 12:30:00', '0230', 'B738', '2025-06-08 23:16:58', '2025-06-08 23:16:58');

-- Dumping data for table crew_reporting.jobs: ~0 rows (approximately)

-- Dumping data for table crew_reporting.job_batches: ~0 rows (approximately)

-- Dumping data for table crew_reporting.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_06_03_021632_create_flights_table', 1),
	(5, '2025_06_03_021705_create_crews_table', 1);

-- Dumping data for table crew_reporting.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table crew_reporting.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('GjGyjEXLkCEDHZ8EI0CyJTlU3GN5i36nLOvGhf3e', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTozOntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IjhDa1hidXdUcklZcWxYQ1A4Y213bUJmQzNYYkhSOFc4UkxmQ1ZLNFciO30=', 1748937003),
	('o7hbmaDaT9TiSIcUdNQSuc4iHtPb1e4QCwn9BBf8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo2OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6ImNlNlo4U211TWR1M2FhdGFPdDVhUkFGSE1seVpmTXNsQUNab3dpanUiO3M6ODoiaXNfYWRtaW4iO2I6MTtzOjEyOiJzdGFmZl9udW1iZXIiO3M6NToiYWRtaW4iO3M6OToiZnVsbF9uYW1lIjtzOjU6IkFkbWluIjt9', 1749457749);

-- Dumping data for table crew_reporting.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Test User', 'test@example.com', '2025-06-09 19:05:06', '$2y$12$w/a3E8a5EAU.33SRvVTjUuh0fTxbHir/jGvfuJeiPKhTflER2UU/u', 'Z7g7gwblgB', '2025-06-09 19:05:07', '2025-06-09 19:05:07');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
