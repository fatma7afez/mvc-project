CREATE DATABASE `mvc`;


-- users table

CREATE Table `users` (
`id` INT(11) AUTO_INCREMENT PRIMARY KEY  NOT NULL,
`firstname` VARCHAR(100)  NOT NULL,
`lastname` VARCHAR(100)  NOT NULL,
`email` VARCHAR(150)  NOT NULL UNIQUE,
`password` VARCHAR(100)  NOT NULL
);


-- products table 
CREATE Table `products` (
`id` INT(11) AUTO_INCREMENT PRIMARY KEY  NOT NULL,
`productname` VARCHAR(100)  NOT NULL,
`productprice` Float  NOT NULL,
`productcategory` VARCHAR(150)  NOT NULL,
`productdesc` VARCHAR(150)  NOT NULL,
);

-- user_product table 
CREATE Table `user_product` (
`user_id` INT(11) NOT NULL,
`product_id`INT(11) NOT NULL,
 PRIMARY KEY (`user_id`,`product_id`),
);

-- relation between them
ALTER TABLE `user_product` ADD FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `user_product` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
