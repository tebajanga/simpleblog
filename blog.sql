-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 02, 2018 at 02:21 PM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.1.15-1+ubuntu16.04.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `image`, `created_at`) VALUES
(1, 'How to start a cattle farm.', 'There are various reasons why a person might want to raise cattle. Some raise large herds to sell, others, in the case of dairy, raise them to sell their milk. Many raise cattle to show in fairs and other local events. In today\'s economy, many families are deciding to raise cattle for their personal use. Whether you want to have a few head for your family\'s needs or raise a herd to sell, there are a few basics about how to raise cattle; from purchasing land to selecting the cattle you want to raise.\r\n<br /><br />\r\nMake a business plan. Do a SWOT analysis of yourself and the cattle industry you will be entering. Plan what kind of cows you want without looking at any breeds, and what kind of farm you wish to operate.\r\n<br /><br />\r\nKeep in mind to start small. Don\'t spend your money in the first 2 years after buying or inheriting the farm or ranch. If things need repairs, repair only the fencing or facilities that are top priority over other things, such as renovating the barn or the house, or redoing the handling facilities to what you plan on doing. Buy machinery at an auction, not brand new. Buy the equipment and other items that you need right now, not what you want. You will get what you want over the next 5 to 10 years as you grow your new operation.\r\n<br /><br />\r\nTry to aim for being a low-cost producer, as that is the surest way to make money, and the best way to start if you don\'t have much to begin with! Research then purchase the type of facilities, equipment and machinery necessary for the type of cattle you have chosen to raise. Analyze your operation and your financial situation to see what you need (not what you want) for current facilities, equipment and machinery. Fencing, watering facilities, feed bunks/troughs or bale feeders is priority above all other assets needed. A tractor, haying equipment, trailer, handling facilities and other buildings are also important.\r\n<br /><br />\r\nIf you have chosen a dairy operation, you will need multiple buildings and a milking parlour with stanchions to be able to run your operation, in addition to calving facilities, a calf barn, and a barn to hold cows when they\'re not being milked.\r\n<br /><br />\r\nWhen deciding upon the type of stanchion to use for milking, there are several items to consider: first, have the cows been milked before and what are they used to? It is best to keep the same type of stanchion. If you will be raising them yourself, research the different types to determine what would work best in your situation.\r\n<br /><br />\r\n With beef cattle, quite often fencing, some sheds and water sources are all you need, especially if you are wanting to raise a grass-based beef operation, be it finishing beefers on grass or a cow-calf operation. The exceptions are if you are willing to spend extra money on winter feeding costs and supplementing your cows with grain, or if you are wanting to run a feedlot.', 'image1.jpg', '2018-05-01 12:16:33'),
(2, 'Maize planting in Tabora Region.', 'Good farmers are getting over 40 bags per acre by practising good husbandry, using hybrid seed and fertilizers. You can do this also if you follow these recommendations carefully. This hybrid maize is specially bred to give higher yields than ordinary maize, but money spent on hybrid seed, and fertilizers will be wasted unless you grow the maize properly.\r\n<br /><br />\r\nLand reduced in fertility by continuous maize growing, and land choked with grass and other weeds will not produces good maize crops. Plough early, give two or three ploughing if necessary to get good clean seedbed, and remove couch - grass with folk jembes.\r\n<br /><br />\r\nYou should always plant extra seed to allow for losses due to insect pests, ground squirrels, erratic rainfall at planting etc. You can plant either 2 seeds per hole or 1 and 2 seeds alternately per hole, and then single to 1 plant per hole when the maize is 6-9 inches tall, leave 2 plants at one side of a gap.\r\n<br /><br />\r\nThe seed should not be planted directly in contact with fertilizers, as this can cause poor germination due to seed scorching. When hand-planting, put fertilizer in the hole, stir with a stick to mix the fertilizer with the soil, then put the seed. Cover the seed with loose soil, not big clods, then press down the soil.\r\n<br ><br />\r\nYou own District Agricultural Officer can tell you the correct fertilizer rates for your soil. Our general recommendation, which you can follow unless your D.A.O. advises otherwise, are 120 Kgs. double supers (or 240 Kgs. single supers) at planting time, followed by 240 Kgs. nitrogenous fertilizer A.S.N., C.A.N, or Sulphate or Ammonia) at knee-height, per hectare. Apply the nitrogen between rows, not over the leaves.', 'image2.jpg', '2018-05-02 12:08:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
