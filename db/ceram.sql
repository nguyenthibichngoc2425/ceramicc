-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2025 lúc 05:19 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ceramic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(1, 9, 1, 4),
(3, 9, 4, 6),
(4, 9, 12, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'Terracotta Cup', 'Terracotta Cup'),
(2, 'Bone Porcelain Cup', 'Bone Porcelain Cup'),
(3, 'Iridescent Glass Mug', 'Iridescent Glass Mug');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(14, 9, 11, 2),
(15, 9, 13, 5),
(16, 9, 3, 2),
(17, 9, 1, 3),
(18, 10, 13, 3),
(19, 10, 2, 4),
(20, 10, 19, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`) VALUES
(1, 1, 'Cloudy cup', '<p>Youthful, suitable for people who like cuteness and love the sky\r\n</p>', 'Cup with cloud pattern surrounding the cup', 1412, 'coc 1.jpg', '2025-05-30', 5),
(2, 1, 'Tulip Morning Cup', '<p>Ceramic cup and matching plate with embossed tulip design in pastel colors.</p>\r\n<p>Feminine, vintage – perfect for afternoon tea or desk decor.</p>', 'Tulip Morning Cup', 799, 'coc1thnt.jpg', '2025-05-28', 2),
(3, 1, 'Tranquil Dragonfly Cup', '<p>White ceramic cup with lid, decorated with elegant dragonflies.</p>\r\n\r\n<p>raditional, serene – great for tea lovers or zen-inspired spaces.</p>\r\n', 'Tranquil Dragonfly Cup', 599, 'coc2loai5.jpg', '2025-05-30', 2),
(4, 1, 'Blossom Ice Cream Glass', '<p>Glass cup shaped like a blooming flower, soft cream pink tone.</p>\r\n\r\n<p>Dreamy &ndash; ideal for desserts or decorating a sweet cafe.</p>\r\n', 'blossom-ice-cream-glass', 2425, 'coc3loai2.jpg', '2018-05-10', 3),
(5, 3, 'Cloudy Sky Classic Cup', '<p>Round cup with deep blue background and white cloud patterns in Japanese style.</p>\r\n\r\n<p> Asian, artistic – perfect for tranquil, cozy settings.</p>\r\n', 'Cloudy Sky Classic Cup', 339, 'coc4loai7.jpg', '2018-05-10', 3),
(6, 1, 'Minimalist Gray Ceramic Cup', '<p>Sleek modern shape, plain gray color with no patterns.</p>\r\n<p>Minimalist – ideal for office use or Scandinavian-style interiors.\r\n\r\n</p>\r\n', 'Minimalist Gray Ceramic Cup', 449.99, 'coc5loai8.jpg', '0000-00-00', 0),
(7, 3, 'Black Abstract Pattern Cup', '<p>White cup with abstract black dots resembling falling rain.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Artistic &ndash; adds character to your space with a creative flair.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'black-abstract-pattern-cup', 619, 'coc6loai8.jpg', '0000-00-00', 0),
(8, 1, 'Marble Cat Cup', '<p>Small round cup with subtle marble texture and soft pastel cat illustration.</p>\r\n\r\n<p>Cute and elegant – great for gifts or cozy corners.</p>\r\n', 'Marble Cat Cup', 549.99, 'coc7loai4.png', '0000-00-00', 0),
(9, 2, 'Pizza Party Fun Cups', '<p>Pair of fun cups with colorful cartoon pizza designs.\r\n\r\n</p>\r\n\r\n<p> Playful – perfect for cafes or people who love quirky tableware.\r\n\r\n</p>\r\n\r\n', 'Pizza Party Fun Cups', 599.99, 'coc9loai6.jpg', '0000-00-00', 0),
(10, 2, 'Royal Floral Teacup Set', '<p>Classic European teacup with matching saucer and floral pastel design.</p>\r\n\r\n<p> Vintage – great for tea parties or retro photoshoots.\r\n\r\n</p>\r\n', 'Royal Floral Teacup Set', 599.99, 'coc10loai3.jpg', '2018-05-10', 1),
(11, 2, 'Snow Bear Holiday Cup', '<p>White and blue ceramic cup with a Christmas bear and cookie illustration.</p>\r\n\r\n<p>Festive – cute and cheerful, perfect as a winter gift.\r\n\r\n</p>\r\n', 'Snow Bear Holiday Cup', 489.98, 'coc11loai1.jpg', '2025-05-30', 4),
(12, 2, 'Bold Tulip Handmade Cup', '<p>Colorful handmade cup with raised tulip design and included spoon.</p>\r\n\r\n<p>Artistic &ndash; trendy and great for TikTok or creative displays.</p>\r\n', 'bold-tulip-handmade-cup', 749.99, 'coc12loai2.jpg', '2025-05-28', 3),
(13, 2, 'Happy Octopus Mug', '<p><b>Material:</b> Glazed Ceramic<p>A charming octopus-shaped ceramic cup with tentacles as legs and a cheerful expression. Ideal for lovers of marine-themed or novelty mugs.</p>\r\n', 'Happy Octopus Mug', 799.99, 'coc22.jpg', '2025-05-29', 1),
(14, 2, 'Dual Bunny Handle Mugs', '<p><b>Material:</b>Matte Ceramic</p>\r\n<p>These pastel-hued mugs feature long, twisted bunny ears for handles—one pink, one green—making them a symbolic pair. The cups are hand-painted with adorable expressions, making them perfect for couples or close friends. Their unique handle design not only makes a cute statement but also provides a surprisingly comfortable grip.\r\n\r\n</p>\r\n', 'Dual Bunny Handle Mugs', 899.99, 'coc 21.jpg', '2018-05-10', 13),
(15, 2, 'Spring Blossom Pair', '<p>This matching set of mugs showcases embossed cherry blossoms and delicate vines across soft beige and blush pink backgrounds</p><br>\r\n<p>The tactile floral textures bring a springtime feel to any moment, ideal for enjoying green tea, floral infusions, or a quiet afternoon latte. Perfect for gifting or self-indulgence.\r\n\r\n</p>\r\n', 'Spring Blossom Pair', 999.99, 'coc 20.jpg', '2018-05-10', 1),
(16, 2, 'Ocean Breeze Mug', '<p>Featuring seashell accents and subtle wave motifs, this soft blue mug captures the serenity of the coast. The curving handle mimics a gentle tide, and the cup’s wide mouth makes it ideal for tea or milk-based drinks. It evokes the feeling of standing by the ocean, breathing in salt-kissed air.</p>\r\n', 'Ocean Breeze Mug', 649.99, 'coc19.jpg', '2018-05-10', 2),
(17, 3, 'Curious Mouse Cup', '<p>This navy blue mug features a tiny ceramic mouse peeking over the edge—subtle and endearing. The thick, textured body retains heat well, and its deep tone complements cozy beverages like spiced tea or coffee. It\'s perfect for those who enjoy little surprises with their daily rituals.</p>\r\n', 'Curious Mouse Cup', 49.99, 'coc18.jpg', '2018-05-12', 1),
(18, 3, 'Starry Garden Mug', '<p>A richly colored mug that looks like a painted night garden. Featuring a speckled interior, golden starburst motifs, and hand-painted floral patterns, this mug feels both artistic and warm. The organic shape gives it a handcrafted quality, ideal for art lovers and slow mornings.</p>\r\n', 'Starry Garden Mug', 79.99, 'coc16.jpg', '2018-05-12', 2),
(19, 3, 'SpongeBob Playtime Cup', '<p>Playful and brightly colored, this cup is adorned with scenes from SpongeBob SquarePants. The sturdy handle and lighthearted design make it perfect for children or cartoon enthusiasts.</p>\r\n\r\n<p> A nostalgic pick-me-up, great for cereal milk, juice, or your morning brew with a smile.</p>\r\n', 'SpongeBob Playtime Cup', 99.99, 'coc15.jpg', '2025-05-28', 1),
(20, 3, 'Penguin Ice Mug', '<p>A winter-themed design with a matte icy finish, complemented by miniature penguins perched along the rim. </p>\r\n\r\n<p>Comes with a geometric coaster resembling cracked ice. It\'s great for holiday seasons or anyone who adores arctic animals. </p>\r\n\r\n<p>Excellent for serving creamy lattes or peppermint hot chocolate.</p>\r\n', 'Penguin Ice Mug', 339, 'coc14.jpg', '2018-05-12', 1),
(27, 1, 'cup coffee', '', 'cup-coffee', 0, 'cup-coffee.jpg', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(9, 9, 'PAY-1RT494832H294925RLLZ7TZA', '2018-05-10'),
(10, 9, 'PAY-21700797GV667562HLLZ7ZVY', '2018-05-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`) VALUES
(1, 'admin@admin.com', '$2y$10$8wY63GX/y9Bq780GBMpxCesV9n1H6WyCqcA2hNy2uhC59hEnOpNaS', 1, 'cuniu', 'sarrang', '', '', 'boxed-bg.jpg', 1, '', ''),
(9, 'hilai@gmail.com', '$2y$10$XiUgDLFboEIKbPvV4IXZ8.l8x7FEaN5wWeZzKA06ygK2uCvIn2T4q', 0, 'hai', 'ly', 'hohoho', '0123987345', 'profile.jpg', 1, 'k8FBpynQfqsv', 'wzPGkX5IODlTYHg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
