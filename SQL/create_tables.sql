CREATE  TABLE `shipwire`.`products` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `product_key` VARCHAR(255) NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `description` VARCHAR(255) NOT NULL ,
  `width` VARCHAR(255) NOT NULL ,
  `height` VARCHAR(255) NOT NULL ,
  `length` VARCHAR(255) NOT NULL ,
  `weight` VARCHAR(255) NOT NULL ,
  `value` DECIMAL(9,2) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `product_key_UNIQUE` (`product_key` ASC) );




CREATE  TABLE `shipwire`.`orders` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `order_key` VARCHAR(255) NOT NULL ,
  `recipient` VARCHAR(255) NOT NULL ,
  `street1` VARCHAR(255) NOT NULL ,
  `street2` VARCHAR(255) NULL ,
  `city` VARCHAR(255) NOT NULL ,
  `state` VARCHAR(255) NOT NULL ,
  `zip_code` VARCHAR(255) NOT NULL ,
  `phone_number` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `order_key_UNIQUE` (`order_key` ASC) );
  
  
  
CREATE  TABLE `shipwire`.`order_product_records` (
  `id` BIGINT NOT NULL AUTO_INCREMENT ,
  `order_id` BIGINT NOT NULL ,
  `product_id` BIGINT NOT NULL ,
  `quantity` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `FK_order_id_idx` (`order_id` ASC) ,
  INDEX `FK_product_id_idx` (`product_id` ASC) ,
  CONSTRAINT `FK_order_id`
    FOREIGN KEY (`order_id` )
    REFERENCES `shipwire`.`orders` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_product_id`
    FOREIGN KEY (`product_id` )
    REFERENCES `shipwire`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
