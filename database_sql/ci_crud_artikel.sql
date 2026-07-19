-- =============================================================
-- Database: ci_crud_artikel
-- Alternatif import manual (phpMyAdmin / MySQL CLI) selain
-- menjalankan `php spark migrate`.
-- =============================================================

CREATE DATABASE IF NOT EXISTS `ci_crud_artikel`
  CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ci_crud_artikel`;

-- --------------------------------------------------------
-- Tabel: articles
-- --------------------------------------------------------
CREATE TABLE `articles` (
  `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title`      VARCHAR(255) NOT NULL,
  `slug`       VARCHAR(255) NOT NULL,
  `content`    TEXT NULL,
  `status`     VARCHAR(20) NOT NULL DEFAULT 'draft',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Tabel: feedback
-- --------------------------------------------------------
CREATE TABLE `feedback` (
  `id`         INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`       VARCHAR(255) NOT NULL,
  `email`      VARCHAR(255) NOT NULL,
  `message`    TEXT NOT NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Tabel: migrations (dibutuhkan CodeIgniter jika suatu saat
-- Anda juga menjalankan `php spark migrate`. Aman diabaikan
-- jika hanya memakai import SQL ini.)
-- --------------------------------------------------------
CREATE TABLE `migrations` (
  `id`        BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `version`   VARCHAR(255) NOT NULL,
  `class`     VARCHAR(255) NOT NULL,
  `group`     VARCHAR(255) NOT NULL,
  `namespace` VARCHAR(255) NOT NULL,
  `time`      INT NOT NULL,
  `batch`     INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Contoh data (opsional, boleh dihapus)
-- --------------------------------------------------------
INSERT INTO `articles` (`title`, `slug`, `content`, `status`, `created_at`, `updated_at`) VALUES
('Selamat Datang di Blog Kami', 'selamat-datang-di-blog-kami',
 'Ini adalah artikel contoh yang sudah dipublikasikan. Anda bisa mengedit atau menghapusnya lewat halaman admin.',
 'published', NOW(), NOW()),
('Draft Artikel Berikutnya', 'draft-artikel-berikutnya',
 'Artikel ini masih berstatus draft sehingga tidak tampil di halaman publik.',
 'draft', NOW(), NOW());
