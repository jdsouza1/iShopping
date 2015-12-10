Drop table customers;
Drop table inventory;
Drop table orders;
Drop table tags;
Drop table credit_cards;

-- -----------------------------------------------------
-- Table `eorndahl1`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eorndahl1`.`customers` (
  `pass` VARCHAR(45) NOT NULL COMMENT '',
  `email` VARCHAR(45) NOT NULL COMMENT '',
  `fName` VARCHAR(45) NOT NULL COMMENT '',
  `lName` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`email`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eorndahl1`.`inventory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eorndahl1`.`inventory` (
  `item_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `description` VARCHAR(45) NULL COMMENT '',
  `price` FLOAT(10) NULL COMMENT '',
  PRIMARY KEY (`item_id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eorndahl1`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eorndahl1`.`orders` (
  `item_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `delivered` TINYINT(1) NOT NULL COMMENT '',
  `cust_email` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`item_id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eorndahl1`.`tags`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eorndahl1`.`tags` (
  `tag_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `item_id` INT NOT NULL COMMENT '',
  `tag` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`tag_id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `eorndahl1`.`credit_cards`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eorndahl1`.`credit_cards` (
  `credit_num` INT NOT NULL COMMENT '',
  `cust_email` VARCHAR(45) NOT NULL COMMENT '',
  `address` VARCHAR(100) NOT NULL COMMENT '',
  `city` VARCHAR(45) NOT NULL COMMENT '',
  `state` VARCHAR(45) NOT NULL COMMENT '',
  `exp_date` DATE NOT NULL COMMENT '',
  `secret_num` INT NULL COMMENT '',
  PRIMARY KEY (`credit_num`)  COMMENT '')
ENGINE = InnoDB;
