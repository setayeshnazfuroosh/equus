CREATE DATABASE IF NOT EXISTS horse_site CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE horse_site;

CREATE TABLE IF NOT EXISTS horses (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL UNIQUE,
  age INT UNSIGNED NOT NULL DEFAULT 0,
  color VARCHAR(50) NOT NULL DEFAULT 'Various',
  description TEXT NULL,
  origin_country VARCHAR(100) NULL,
  height_cm SMALLINT UNSIGNED NULL,
  weight_kg SMALLINT UNSIGNED NULL,
  temperament VARCHAR(160) NULL,
  uses VARCHAR(255) NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS selections (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  color VARCHAR(50) NOT NULL,
  age INT UNSIGNED NOT NULL,
  number_of_horses TINYINT UNSIGNED NOT NULL,
  equipment TEXT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS contacts (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(190) NOT NULL,
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO horses (name, age, color, description, origin_country, height_cm, weight_kg, temperament, uses)
SELECT 'Caspian', 0, 'Bay, chestnut, black or gray', 'A small, refined horse breed with an ancient history in northern Iran. Individual height and weight vary; figures should be verified against a specialist breed source before publication.', 'Iran', NULL, NULL, 'Alert, intelligent and generally willing', 'Driving, riding and youth equestrian activities'
WHERE NOT EXISTS (SELECT 1 FROM horses WHERE name = 'Caspian');

INSERT INTO horses (name, age, color, description, origin_country, height_cm, weight_kg, temperament, uses)
SELECT 'Hanoverian', 0, 'Commonly bay, chestnut, black or gray', 'A German warmblood breed widely associated with modern sport-horse disciplines. Height and weight vary by individual and registry.', 'Germany', NULL, NULL, 'Athletic, trainable and focused', 'Dressage, show jumping and eventing'
WHERE NOT EXISTS (SELECT 1 FROM horses WHERE name = 'Hanoverian');
