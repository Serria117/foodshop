CREATE TABLE `products` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `price` float,
  `category_id` int,
  `merchant_id` int,
  `primary_img` varchar(255),
  `slug` varchar(255),
  `status` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `categories` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) UNIQUE,
  `parent_id` int,
  `slug` varchar(255),
  `status` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `product_images` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `product_id` int NOT NULL,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `merchants` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) UNIQUE,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255),
  `email` varchar(255),
  `email_verified` int,
  `password` varchar(255),
  `district_id` int,
  `admin_id` int,
  `status` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `buyers` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `phone` varchar(255),
  `email` varchar(255),
  `address` varchar(255),
  `district_id` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `cities` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `city_code` varchar(255),
  `name` varchar(255)
);

CREATE TABLE `districts` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `district_code` varchar(255),
  `name` varchar(255),
  `city_id` int
);

CREATE TABLE `admins` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varhcar,
  `password` varchar(255),
  `status` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `orders` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `buyer_id` int,
  `merchant_id` int,
  `value` float,
  `status` int,
  `d_address` varchar(255),
  `d_phone` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `order_detail` (
  `order_id` int,
  `product_id` int,
  `quantity` float,
  `price` float,
  PRIMARY KEY (`order_id`, `product_id`)
);

CREATE TABLE `slides` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `link` varchar(255),
  `title` varchar(255),
  `content` varchar(255),
  `status` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

ALTER TABLE `products` ADD FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

ALTER TABLE `product_images` ADD FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

ALTER TABLE `products` ADD FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`id`);

ALTER TABLE `districts` ADD FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

ALTER TABLE `merchants` ADD FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

ALTER TABLE `buyers` ADD FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

ALTER TABLE `merchants` ADD FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

ALTER TABLE `orders` ADD FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`id`);

ALTER TABLE `orders` ADD FOREIGN KEY (`buyer_id`) REFERENCES `buyers` (`id`);

ALTER TABLE `orders` ADD FOREIGN KEY (`id`) REFERENCES `order_detail` (`order_id`);

ALTER TABLE `order_detail` ADD FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

