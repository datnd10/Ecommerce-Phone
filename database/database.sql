CREATE TABLE `user` (
  `user_id` int PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255) UNIQUE  NOT NULL,
  `password` varchar(255)  NOT NULL,
  `username` varchar(255) UNIQUE NOT NULL,
  `fullname` varchar(255)  NOT NULL,
  `phone` varchar(10) UNIQUE NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role` int NOT NULL,
  `created_at` DATETIME DEFAULT (now()),
  `is_active` boolean DEFAULT true
);


CREATE TABLE `category` (
  `category_id` int PRIMARY KEY AUTO_INCREMENT,
  `category_name` varchar(255)  NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` DATETIME DEFAULT (now()),
  `is_active` boolean DEFAULT true
);

CREATE TABLE `product` (
  `product_id` int PRIMARY KEY AUTO_INCREMENT,
  `product_name` varchar(255)  NOT NULL,
  `description` varchar(255) NOT NULL,
  `rate` int NOT NULL DEFAULT 0,
  `created_at` DATETIME DEFAULT (now()),
  `is_active` boolean DEFAULT true,
  `category_id` int NOT NULL
);

ALTER TABLE `product` ADD FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

CREATE TABLE `product_color` (
  `product_color_id` int PRIMARY KEY AUTO_INCREMENT,
  `color` varchar(255)  NOT NULL,
  `quantity` INT NOT NULL DEFAULT 0,
  `price` Float NOT NULL DEFAULT 0,
  `sold_quantity` int NOT NULL DEFAULT 0,
  `created_at` DATETIME DEFAULT (now()),
  `is_active` boolean DEFAULT true,
  `product_id` int NOT NULL,
  FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`)
);

CREATE TABLE `product_image` (
  `product_image_id` int PRIMARY KEY AUTO_INCREMENT,
  `image` varchar(255)  NOT NULL,
  `product_color_id` int NOT NULL,
  FOREIGN KEY (`product_color_id`) REFERENCES `product_color` (`product_color_id`)
);

CREATE TABLE `order` (
  `order_id` int PRIMARY KEY AUTO_INCREMENT,
  `total_money` float NOT NULL,
  `name` varchar(255)  NOT NULL,
  `address` varchar(255)  NOT NULL,
  `phone` varchar(255)  NOT NULL,
  `name` varchar(255)  ,
  `created_at` DATETIME DEFAULT (now()),
  `status`varchar(255)  DEFAULT 'pending',
  `shipping` float NOT NULL,
  `is_active` boolean DEFAULT true,
  `user_id`  int NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
);


CREATE TABLE `order_detail` (
  `order_detail_id` int PRIMARY KEY AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_color_id` int NOT NULL,
  `quantity` int NOT NULL,
  FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  FOREIGN KEY (`product_color_id`) REFERENCES `product_color` (`product_color_id`),
);

CREATE TABLE `review` (
  `review_id` int PRIMARY KEY AUTO_INCREMENT,
  `content` varchar(999) NOT NULL,
  `star` int NOT NULL,
  `created_at` DATETIME DEFAULT (now()),
  `user_id` int NOT NULL,
  `product_color_id` int NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  FOREIGN KEY (`product_color_id`) REFERENCES `product_color` (`product_color_id`)
);

CREATE TABLE `review_image` (
  `review_image_id` int PRIMARY KEY AUTO_INCREMENT,
  `image` varchar(255)  NOT NULL,
  `review_id` int NOT NULL,
  FOREIGN KEY (`review_id`) REFERENCES `review` (`review_id`)
);


