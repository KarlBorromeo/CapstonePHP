-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema ecommerce
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ecommerce
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8mb3 ;
-- -----------------------------------------------------
-- Schema php_exam
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema php_exam
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `php_exam` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `ecommerce` ;

-- -----------------------------------------------------
-- Table `ecommerce`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `category` VARCHAR(255) NOT NULL,
  `price` INT NOT NULL,
  `stocks` INT NOT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `ecommerce`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(45) NOT NULL,
  `created_at` DATETIME NULL DEFAULT current_timestamp,
  `updated-at` DATETIME NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(255) NOT NULL,
  `lastname` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role_id` INT NOT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_users_role1_idx` (`role_id` ASC) VISIBLE,
  CONSTRAINT `fk_users_role1`
    FOREIGN KEY (`role_id`)
    REFERENCES `ecommerce`.`role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `ecommerce`.`cart_items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`cart_items` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `products_id` INT NOT NULL,
  `pieces` INT NOT NULL,
  `users_id` INT NOT NULL,
  `created_at` DATETIME NULL DEFAULT current_timestamp,
  `updated_at` DATETIME NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`),
  INDEX `fk_cart_items_products1_idx` (`products_id` ASC) VISIBLE,
  INDEX `fk_cart_items_users1_idx` (`users_id` ASC) VISIBLE,
  CONSTRAINT `fk_cart_items_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `ecommerce`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cart_items_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `ecommerce`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `status` VARCHAR(255) NOT NULL,
  `order_date` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `address` VARCHAR(255) NOT NULL,
  `address2` VARCHAR(255) NULL,
  `city` VARCHAR(255) NOT NULL,
  `state` VARCHAR(255) NOT NULL,
  `zip_code` VARCHAR(255) NOT NULL,
  `cart_items_id` INT NOT NULL,
  `updated_at` DATETIME NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`),
  INDEX `fk_orders_cart_items1_idx` (`cart_items_id` ASC) VISIBLE,
  CONSTRAINT `fk_orders_cart_items1`
    FOREIGN KEY (`cart_items_id`)
    REFERENCES `ecommerce`.`cart_items` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `ecommerce`.`images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`images` (
  `products_id` INT NOT NULL,
  `url` TEXT NULL,
  INDEX `fk_images_products1_idx` (`products_id` ASC) VISIBLE,
  CONSTRAINT `fk_images_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `ecommerce`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `php_exam` ;

-- -----------------------------------------------------
-- Table `php_exam`.`certificate_issuers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php_exam`.`certificate_issuers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `authorized_by_hero_id` INT NOT NULL DEFAULT '0',
  `certificate_id` INT NOT NULL DEFAULT '0',
  `hero_id` INT NOT NULL DEFAULT '0',
  `authorized_at` DATETIME NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 160
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `php_exam`.`certificates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php_exam`.`certificates` (
  `id` INT NOT NULL,
  `created_by_hero_id` INT NOT NULL DEFAULT '0',
  `certificate_subject_id` TINYINT(1) NOT NULL DEFAULT '1',
  `title` VARCHAR(100) NOT NULL,
  `description` VARCHAR(1000) NULL DEFAULT NULL,
  `cache_awarded_to_count` INT NULL DEFAULT '0',
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `php_exam`.`certified_heroes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php_exam`.`certified_heroes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `awarded_by_hero_id` INT NOT NULL DEFAULT '0',
  `awarded_to_hero_id` INT NOT NULL DEFAULT '0',
  `certificate_id` INT NOT NULL DEFAULT '0',
  `recommendation` VARCHAR(500) NULL DEFAULT NULL,
  `score` FLOAT NULL DEFAULT NULL,
  `awarded_at` DATETIME NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 66
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `php_exam`.`heroes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php_exam`.`heroes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email_address` VARCHAR(255) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `first_name` VARCHAR(255) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `last_name` VARCHAR(255) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `hero_name` VARCHAR(45) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `hero_level` TINYINT(1) NULL DEFAULT NULL,
  `last_played_at` DATETIME NULL DEFAULT NULL,
  `last_visited_url` VARCHAR(255) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `profile_picture_url` VARCHAR(255) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `cache_follower_count` INT NULL DEFAULT '0',
  `cache_following_count` INT NULL DEFAULT '0',
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1569
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
