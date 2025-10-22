-- Is My Cifeaux? Database Schema
-- Create this database and table in your cPanel MySQL

-- Create database (if using cPanel, create via phpMyAdmin or MySQL Databases tool)
CREATE DATABASE IF NOT EXISTS ccff00_cifeaux
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE ccff00_cifeaux;

-- Results table
CREATE TABLE IF NOT EXISTS cifeaux_results (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  verdict VARCHAR(50) NOT NULL COMMENT 'Verdict type: skeptic, purist, connoisseur, etc.',
  accepted_count INT(11) NOT NULL COMMENT 'Number of shades accepted as cifeaux',
  bias VARCHAR(50) NOT NULL COMMENT 'Perception bias: yellow, green, or balanced',
  answers TEXT NOT NULL COMMENT 'JSON array of all answers',
  timestamp DATETIME NOT NULL COMMENT 'When test was completed',
  user_ip VARCHAR(45) DEFAULT NULL COMMENT 'User IP address',
  user_agent TEXT DEFAULT NULL COMMENT 'User browser/device info',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'When record was inserted',
  INDEX idx_verdict (verdict),
  INDEX idx_created_at (created_at),
  INDEX idx_timestamp (timestamp)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Statistics view (optional - for easy querying)
CREATE OR REPLACE VIEW cifeaux_stats AS
SELECT
  verdict,
  COUNT(*) as count,
  AVG(accepted_count) as avg_accepted,
  MIN(accepted_count) as min_accepted,
  MAX(accepted_count) as max_accepted
FROM cifeaux_results
GROUP BY verdict;

-- Daily stats view (optional)
CREATE OR REPLACE VIEW cifeaux_daily_stats AS
SELECT
  DATE(created_at) as date,
  COUNT(*) as total_tests,
  COUNT(DISTINCT user_ip) as unique_users,
  verdict,
  COUNT(*) as verdict_count
FROM cifeaux_results
GROUP BY DATE(created_at), verdict
ORDER BY date DESC, verdict_count DESC;
