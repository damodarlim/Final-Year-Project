-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 04:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todu`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_table`
--

CREATE TABLE `about_table` (
  `about_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activities_table`
--

CREATE TABLE `activities_table` (
  `activity_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `activity_img` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities_table`
--

INSERT INTO `activities_table` (`activity_id`, `title`, `description`, `activity_img`, `added_by`) VALUES
(4, 'Food For Life', '                    Food for Life is a global humanitarian initiative founded by the International Society for Krishna Consciousness (ISKCON), also known as the Hare Krishna movement. This program aims to address the pressing issue of hunger and malnutrit', 'photo_22_2023-11-26_09-42-03.jpg.6563770b61bce.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `album_table`
--

CREATE TABLE `album_table` (
  `album_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `creation_date` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album_table`
--

INSERT INTO `album_table` (`album_id`, `title`, `thumbnail`, `creation_date`, `created_by`) VALUES
(23, 'Food For Life x Segi', '1700962970-photo_37_2023-11-26_09-42-03.jpg', '26 Nov, 2023', 9),
(24, 'Janmastami ', '1700963388-380430542_708225778016270_6305255665361588004_n.jpg', '26 Nov, 2023', 9),
(25, 'Test', '1701047090-photo_2_2023-11-26_09-42-03.jpg', '27 Nov, 2023', 9);

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`category_id`, `category_name`, `post`) VALUES
(2, 'Spiritual', 4),
(3, 'Temple', 0),
(4, 'Funds', 0),
(5, 'Food For Life', 1),
(9, 'Yes', 1),
(15, 'tester', 0);

-- --------------------------------------------------------

--
-- Table structure for table `content_table`
--

CREATE TABLE `content_table` (
  `content_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `content_table`
--

INSERT INTO `content_table` (`content_id`, `title`, `content`, `image`) VALUES
(3, 'THis is the title', 'alot of words', 'img/Screenshot 2023-03-19 171832.png'),
(4, 'THis is the title', 'alot of words', 'img/Screenshot 2023-03-19 171832.png'),
(5, 'The BBT 2023 Bhadra Purnima Marathon and the TOVP', 'We are approaching the end of this year’s BBT Bhadra Purnima Marathon to distribute 55,000 sets of Srimad Bhagavatams by September 29. Book distribution rages worldwide to reach the goal and surpass last year’s accomplishment of distributing 45,000 Bhagav', 'img/Nitro_Wallpaper_5000x2813.jpg'),
(6, 'Srila Bhaktivinoda Thakur and the TOVP, 2023', 'This article is being presented in honor of the divine appearance day of the original pioneer of the Krishna consciousness movement, His Divine Grace Sri Srimad Bhaktivinoda Thakur, Sept. 27 (U.S.)/ Sept. 28 (India), 2023. namo bhaktivinodaya sac-cid-anan', 'img/planet9_Wallpaper_5000x2813.jpg'),
(7, 'Kartik and the TOVP 2023', 'A Message from Ambarisa and Braja Vilasa Prabhus   Dear Worldwide ISKCON Devotees and Congregation, Please accept our obeisances. All glories to Srila Prabhupada. We would like to wish you a happy Kartik month full of divine service to Lord Damodar, and h', 'img/mass effect.jpg'),
(9, 'THis is to be uploaded', 'This conetnt will be uplaoded', 'img/naruto sasuke.jpg'),
(10, 'THis is to be uploaded', 'This conetnt will be uplaoded', 'img/naruto sasuke.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donation_received`
--

CREATE TABLE `donation_received` (
  `donation_received_id` int(11) NOT NULL,
  `donation_id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `donation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_received`
--

INSERT INTO `donation_received` (`donation_received_id`, `donation_id`, `amount`, `transaction_id`, `payer_name`, `payer_email`, `donation_date`) VALUES
(2, 3, '501', '', 'dk', 'dk.why6@gmail.com', '2023-11-27 11:32:52'),
(3, 3, '501', '', 'dk', 'dk.why6@gmail.com', '2023-11-27 11:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `donation_table`
--

CREATE TABLE `donation_table` (
  `donation_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `donation_img` varchar(255) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_table`
--

INSERT INTO `donation_table` (`donation_id`, `title`, `description`, `donation_img`, `amount`, `added_by`) VALUES
(3, 'Sunday Feast', 'Feel free to donate to our Sunday Love Feast and feed hundreds', 'photo_9_2023-11-26_09-42-03.jpg.656456460213b.jpg', '501', 9);

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `message`) VALUES
(1, 'dk dk', 'dk.why7@gmail.com', 'yo i want to see if it works'),
(2, 'dk dk', 'dk.why7@gmail.com', 'uglguglgu'),
(3, 'dk dk', 'dk.why7@gmail.com', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `festival_table`
--

CREATE TABLE `festival_table` (
  `festival_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `fest_img` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `festival_table`
--

INSERT INTO `festival_table` (`festival_id`, `title`, `description`, `fest_img`, `added_by`) VALUES
(1, 'Janmastami ', '                    Write Up on Janmastami can be done here if needed lor!                ', '380339904_708224001349781_1087173441020687922_n.jpg.6567198ea1e3c.jpg', '10'),
(2, 'Balaram Purnima', 'Write Up can be placed here if needed', '380486661_708223134683201_4631409456578724775_n.jpg.65671a1565066.jpg', '10'),
(3, 'Ratha Yatra ', 'Write Up can be placed Here!', '380198894_708221811350000_1172347259517857953_n.jpg.65671a2d4d528.jpg', '10');

-- --------------------------------------------------------

--
-- Table structure for table `images_table`
--

CREATE TABLE `images_table` (
  `image_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images_table`
--

INSERT INTO `images_table` (`image_id`, `album_id`, `file_path`, `upload_date`) VALUES
(55, 23, 'photo_1_2023-11-26_09-42-03.jpg.6562a356133ca.jpg', '2023-11-26 01:45:58'),
(56, 23, 'photo_2_2023-11-26_09-42-03.jpg.6562a35613906.jpg', '2023-11-26 01:45:58'),
(57, 23, 'photo_3_2023-11-26_09-42-03.jpg.6562a35613bf2.jpg', '2023-11-26 01:45:58'),
(58, 23, 'photo_4_2023-11-26_09-42-03.jpg.6562a35613f2f.jpg', '2023-11-26 01:45:58'),
(59, 23, 'photo_5_2023-11-26_09-42-03.jpg.6562a35614241.jpg', '2023-11-26 01:45:58'),
(60, 23, 'photo_6_2023-11-26_09-42-03.jpg.6562a35614532.jpg', '2023-11-26 01:45:58'),
(61, 23, 'photo_7_2023-11-26_09-42-03.jpg.6562a3561481a.jpg', '2023-11-26 01:45:58'),
(62, 23, 'photo_8_2023-11-26_09-42-03.jpg.6562a35614a8d.jpg', '2023-11-26 01:45:58'),
(63, 23, 'photo_9_2023-11-26_09-42-03.jpg.6562a35614d3d.jpg', '2023-11-26 01:45:58'),
(64, 23, 'photo_10_2023-11-26_09-42-03.jpg.6562a35615029.jpg', '2023-11-26 01:45:58'),
(65, 23, 'photo_11_2023-11-26_09-42-03.jpg.6562a356152ef.jpg', '2023-11-26 01:45:58'),
(66, 23, 'photo_12_2023-11-26_09-42-03.jpg.6562a35615531.jpg', '2023-11-26 01:45:58'),
(67, 23, 'photo_13_2023-11-26_09-42-03.jpg.6562a356157ee.jpg', '2023-11-26 01:45:58'),
(68, 23, 'photo_14_2023-11-26_09-42-03.jpg.6562a35615aac.jpg', '2023-11-26 01:45:58'),
(69, 23, 'photo_15_2023-11-26_09-42-03.jpg.6562a35615dc4.jpg', '2023-11-26 01:45:58'),
(70, 23, 'photo_16_2023-11-26_09-42-03.jpg.6562a35616099.jpg', '2023-11-26 01:45:58'),
(71, 23, 'photo_17_2023-11-26_09-42-03.jpg.6562a35616330.jpg', '2023-11-26 01:45:58'),
(72, 23, 'photo_18_2023-11-26_09-42-03.jpg.6562a35616599.jpg', '2023-11-26 01:45:58'),
(73, 23, 'photo_19_2023-11-26_09-42-03.jpg.6562a35616846.jpg', '2023-11-26 01:45:58'),
(74, 23, 'photo_26_2023-11-26_09-42-03.jpg.6562a364a6ad7.jpg', '2023-11-26 01:46:12'),
(75, 23, 'photo_27_2023-11-26_09-42-03.jpg.6562a364a6fdb.jpg', '2023-11-26 01:46:12'),
(76, 23, 'photo_28_2023-11-26_09-42-03.jpg.6562a364a735e.jpg', '2023-11-26 01:46:12'),
(77, 23, 'photo_29_2023-11-26_09-42-03.jpg.6562a364a768e.jpg', '2023-11-26 01:46:12'),
(78, 23, 'photo_30_2023-11-26_09-42-03.jpg.6562a364a7a4d.jpg', '2023-11-26 01:46:12'),
(79, 23, 'photo_31_2023-11-26_09-42-03.jpg.6562a364a7d8f.jpg', '2023-11-26 01:46:12'),
(80, 23, 'photo_32_2023-11-26_09-42-03.jpg.6562a364a808d.jpg', '2023-11-26 01:46:12'),
(81, 23, 'photo_33_2023-11-26_09-42-03.jpg.6562a364a835f.jpg', '2023-11-26 01:46:12'),
(82, 24, '379678597_708222121349969_5527570019332988657_n.jpg.6562a44680ab0.jpg', '2023-11-26 01:49:58'),
(83, 24, '379914944_708223961349785_4833020194102025089_n.jpg.6562a446812d9.jpg', '2023-11-26 01:49:58'),
(84, 24, '379979287_708224378016410_6146549800400882157_n.jpg.6562a44681776.jpg', '2023-11-26 01:49:58'),
(85, 24, '380179000_708225184682996_9145707875020411573_n.jpg.6562a44681bb4.jpg', '2023-11-26 01:49:58'),
(86, 24, '380198894_708221811350000_1172347259517857953_n.jpg.6562a44681f95.jpg', '2023-11-26 01:49:58'),
(87, 24, '380339904_708224001349781_1087173441020687922_n.jpg.6562a4468244a.jpg', '2023-11-26 01:49:58'),
(88, 24, '380430542_708225778016270_6305255665361588004_n.jpg.6562a44682805.jpg', '2023-11-26 01:49:58'),
(89, 24, '380433940_708222624683252_8926371392328230730_n.jpg.6562a44682b93.jpg', '2023-11-26 01:49:58'),
(90, 24, '380486661_708223134683201_4631409456578724775_n.jpg.6562a44682f32.jpg', '2023-11-26 01:49:58'),
(91, 24, '380491086_708225021349679_6445794902490879440_n.jpg.6562a44683295.jpg', '2023-11-26 01:49:58'),
(92, 24, '380598500_708224424683072_8193172257916782033_n.jpg.6562a44683638.jpg', '2023-11-26 01:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `member_table`
--

CREATE TABLE `member_table` (
  `member_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member_table`
--

INSERT INTO `member_table` (`member_id`, `first_name`, `last_name`, `username`, `email`, `contact`, `password`, `role`) VALUES
(9, 'dk', 'chat', 'chat', 'chat@gmail.com', '123-4561341', '$2y$10$sj.1BMh2Kn6ol84cWmqKR.zRG0VRpVSX/YfcKX0LJ0G', '1'),
(10, 'Prema', 'Devi', 'prema', 'prema@gmail.com', '123-3123123', 'c4ca4238a0b923820dcc509a6f75849b', '1'),
(11, 'Norm', 'Mal', 'normal', 'normal@user.com', '312-1232131', 'c4ca4238a0b923820dcc509a6f75849b', '0'),
(12, 'Krsna', 'Prasad', 'Krz', 'dk.why7@gmail.com', '123-1231231', 'c4ca4238a0b923820dcc509a6f75849b', '1'),
(13, 'Chat', 'Lim', 'Lim', 'Lim@gmail.com', '123-1312313', '$2y$10$RaimXy/2fwgch/34UJiyCO4fesuZVzXfOo/62rkW7bL', '1'),
(32, 'ahhhh', 'ahhh', 'ah', 'ahh@ah.com', '123-1231313', 'c4ca4238a0b923820dcc509a6f75849b', '0');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_subbed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `date_subbed`) VALUES
(1, 'damodar.lim25@gmail.com', '2023-11-29 13:15:07'),
(2, 'dk.why7@gmail.com', '2023-11-29 13:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `news_table`
--

CREATE TABLE `news_table` (
  `news_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `publish_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `news_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_table`
--

INSERT INTO `news_table` (`news_id`, `title`, `description`, `category`, `publish_date`, `author`, `news_img`) VALUES
(2, 'Balaram', 'Balarama, a prominent figure in Hindu mythology, is revered as the elder brother of Lord Krishna and is often depicted as the embodiment of strength, loyalty, and agricultural fertility. This essay explores the significance of Balarama in Hindu tradition, examining his divine attributes, notable exploits, and enduring cultural importance.\r\n\r\nBalarama, also known as Baladeva or Balabhadra, is considered an avatar of the serpent Shesha, who serves as the cosmic bed of Lord Vishnu. In Hindu art, Balarama is typically depicted as a fair-skinned, robust deity holding a plough, a mace, or a ploughshare, symbolizing his connection to agriculture and his role as a protector of dharma.\r\n\r\nOne of the most well-known narratives involving Balarama is his participation in the life of Lord Krishna. As Krishna\'s elder brother, Balarama played a crucial role in many episodes, including their shared childhood in Vrindavan, where they engaged in playful antics and legendary adventures. Balarama\'s unwavering support and protective nature towards Krishna underline the theme of familial bonds and loyalty.\r\n\r\nBalarama is also renowned for his extraordinary feats, such as the subjugation of the serpent demon Dhenuka and the demon Pralamba. His immense strength and martial prowess make him a symbol of power and valor in Hindu mythology. Additionally, Balarama is associated with the plough, reflecting his role in agriculture and the cultivation of the land. His connection to the rural landscape highlights the importance of sustaining life and fertility.\r\n\r\nIn some traditions, Balarama is worshipped as the presiding deity of certain festivals, emphasizing his agricultural significance. The festival of Balarama Jayanti, celebrating his divine appearance, draws devotees who seek his blessings for a bountiful harvest and agricultural prosperity.\r\n\r\nBalarama\'s influence extends beyond religious contexts into cultural expressions such as dance, art, and literature. In classical dance forms like Bharatanatyam and Odissi, his stories are enacted, paying tribute to his valor and virtues. Temples dedicated to Balarama, especially in regions like Maharashtra and Odisha, attract pilgrims who venerate him for his protective and nurturing qualities.\r\n\r\nIn conclusion, Balarama occupies a significant place in Hindu mythology, embodying strength, loyalty, and agricultural fertility. His association with Lord Krishna and his distinct attributes make him a revered figure, celebrated for his contributions to familial bonds, protection, and the cultivation of the land. The enduring cultural and religious importance of Balarama underscores his timeless significance in the diverse tapestry of Hindu tradition.', '2', '10 Nov, 2023', 10, 'Lord-Balarama.jpg'),
(3, 'radha', '                    Radha, a central figure in Hindu mythology, is celebrated as the divine consort and eternal companion of Lord Krishna. This essay delves into the significance of Radha in Hindu tradition, exploring her divine love, symbolism, and her enduring place in the hearts of devotees.\r\n\r\nRadha is often hailed as the embodiment of selfless and transcendental love, symbolizing the highest form of devotion to the divine. Her relationship with Lord Krishna, as narrated in various Hindu scriptures, particularly the Bhagavata Purana and the Gita Govinda, is a sublime tale of spiritual union and divine love. Radha\'s love for Krishna is often depicted as the quintessence of devotion, representing the soul\'s longing for union with the divine.\r\n\r\nWhile Radha is not explicitly mentioned in the ancient Vedas, her prominence grew with the development of the Bhakti movement, where the focus shifted from ritualistic practices to intense devotion and love for the divine. Radha\'s story became a symbol of the soul\'s yearning for a profound connection with the divine, transcending the boundaries of earthly attachments.\r\n\r\nThe love between Radha and Krishna is celebrated in various devotional compositions, poetry, and performing arts. The Gita Govinda, a lyrical composition by the 12th-century poet Jayadeva, vividly describes the love play between Radha and Krishna, portraying Radha as the epitome of devotion and the divine lover\'s longing.\r\n\r\nSymbolically, Radha represents the devotee\'s journey towards spiritual realization. Her love for Krishna is considered selfless and unconditional, illustrating the ideal relationship between the human soul and the divine. Radha\'s unwavering devotion and her ability to merge her identity with Krishna showcase the pinnacle of spiritual realization and union.\r\n\r\nDespite Radha\'s prominence in devotional literature and the hearts of countless devotees, her temples are relatively rare compared to those dedicated to other deities. The reason behind this is rooted in the mystical nature of Radha and her role as the personification of divine love, making her presence felt more intimately through devotion rather than physical manifestations.\r\n\r\nRadha\'s enduring influence extends beyond religious contexts into the realms of art, literature, and culture. Classical dance forms such as Bharatanatyam and Kathak often depict Radha\'s tales, capturing the essence of her divine love through expressive movements and storytelling. Her presence in devotional music and the vibrant celebrations of festivals like Radhashtami further solidify her cultural and spiritual importance.\r\n\r\nIn conclusion, Radha\'s significance in Hindu tradition lies in her role as the symbol of divine love and the epitome of devotion. Her timeless love story with Lord Krishna transcends earthly boundaries, capturing the essence of the soul\'s yearning for spiritual union. Radha\'s presence, though often subtle and mystically profound, continues to inspire devotion and artistic expressions, making her a revered and beloved figure in the tapestry of Hindu mythology.                ', '5', '10 Nov, 2023', 10, 'radha.jpeg'),
(5, 'Krsna!', '                    Krishna, often referred to as Krsna, occupies a central and revered position in Hindu mythology and philosophy. As the eighth incarnation of Lord Vishnu, Krishna is a divine figure known for his multifaceted characteristics and profound teachings. This essay delves into the significance of Krsna in Hinduism, exploring his divine attributes, captivating legends, and enduring impact.\r\n\r\nKrsna, the Supreme Personality of Godhead, is portrayed in Hindu scriptures, particularly in the epic poem \"Mahabharata\" and the sacred text \"Bhagavad Gita.\" Described as the epitome of charm, beauty, and wisdom, Krsna embodies the concept of divine love and compassion. His blue complexion, peacock feather-adorned crown, and enchanting flute-playing are iconic representations that resonate with devotees.\r\n\r\nOne of the most celebrated episodes featuring Krsna is the \"Mahabharata,\" where he serves as the charioteer and spiritual guide to Prince Arjuna in the battle of Kurukshetra. The \"Bhagavad Gita,\" a dialogue between Krsna and Arjuna, unfolds profound philosophical teachings on duty, righteousness, and the path to spiritual enlightenment. Krsna\'s emphasis on performing one\'s duty (dharma) without attachment to the results has left an indelible mark on Hindu philosophy.\r\n\r\nThe childhood tales of Krishna, such as his playful escapades and endearing interactions with the Gopis (cowherd girls), exemplify the divine\'s ability to balance the cosmic and the personal. His miracles, including the lifting of Mount Govardhan to protect the villagers from a torrential downpour, showcase his divine potency and omnipotence.\r\n\r\nKrsna is also revered for his role as the charioteer in the grand epic, symbolizing the guiding force in one\'s life journey. Devotees see Krsna as the ultimate source of love and wisdom, and his teachings continue to inspire millions around the world. The celebration of festivals like Janmashtami, marking Krishna\'s birth, reflects the enduring devotion and cultural significance associated with this divine figure.\r\n\r\nIn conclusion, Krsna stands as a symbol of divine love, wisdom, and guidance in Hinduism. His teachings in the Bhagavad Gita transcend time, providing profound insights into the human experience and the pursuit of spiritual enlightenment. As a deity who embodies both the cosmic and the personal, Krsna remains a source of inspiration for countless devotees, exemplifying the timeless nature of his impact on Hindu philosophy and culture.                ', '2', '10 Nov, 2023', 9, 'krsna.jpeg'),
(10, 'God', 'Krishna, a central figure in Hinduism, is revered as a deity of immense significance, embodying divinity, love, and cosmic balance. Often referred to as the eighth incarnation of Lord Vishnu, Krishna\'s life and teachings are chronicled in the sacred texts of the Bhagavad Gita and the Mahabharata.\r\n\r\nKrishna is portrayed as a divine being, born in the town of Mathura to Devaki and Vasudeva. His childhood is marked by enchanting stories, including his playful exploits as a mischievous butter thief in the village of Vrindavan. The divine child\'s miracles and endearing escapades, especially with the Gopis (cowherd maidens), symbolize the boundless love and devotion that can exist between the divine and the human.\r\n\r\nThe Bhagavad Gita, a revered scripture within the Indian spiritual tradition, presents a profound dialogue between Krishna and the warrior Arjuna on the battlefield of Kurukshetra. Here, Krishna imparts timeless wisdom, emphasizing the principles of duty, righteousness, and devotion. The Gita\'s teachings revolve around the concept of dharma, the righteous path, and the importance of selfless action.\r\n\r\nKrishna is also worshipped in the form of Radha-Krishna, symbolizing the divine union of the masculine and feminine aspects of the divine. This divine love is considered the highest expression of devotion and is celebrated through various artistic and devotional traditions.\r\n\r\nIn popular culture, Krishna\'s vibrant personality and teachings continue to inspire millions. His image as a flutist surrounded by adoring devotees or as the charioteer guiding Arjuna on the battlefield has become iconic. The multifaceted nature of Krishna reflects the diverse ways in which devotees perceive and connect with the divine, whether as a friend, philosopher, guide, or the ultimate source of cosmic energy and love.', '2', '20 Nov, 2023', 9, 'Lord-Balarama.jpg.655b809bc52b5.jpg'),
(11, 'Lord Chaitanya', '                            Lord Chaitanya, also known as Gauranga or Gaurachandra, was a 15th-century saint and the central figure in the Bhakti movement, particularly within the Gaudiya Vaishnavism tradition. Born in Nabadwip, Bengal, in 1486, Lord Chaitanya is revered as a combined incarnation of Radha and Krishna, embodying the divine union of lover and beloved.\r\n\r\nLord Chaitanya\'s life is primarily characterized by his intense devotion to the chanting of the holy names of God, especially the Hare Krishna mantra. He popularized the practice of congregational chanting (sankirtan), emphasizing the transformative power of chanting the names of God for spiritual realization. His teachings centered on the essence of love and devotion (bhakti) as the most direct path to God realization.\r\n\r\nIn his early years, Lord Chaitanya exhibited remarkable intellectual prowess, and he later took on the life of a renunciant. His teachings emphasized the universality of the path of devotion, proclaiming that anyone, regardless of their social or spiritual background, could attain spiritual perfection through sincere devotion to God.\r\n\r\nOne of Lord Chaitanya\'s significant contributions was his dissemination of the philosophy of acintya-bhedabheda-tattva, which describes the simultaneous oneness and difference between the individual soul and the Supreme. He propagated the understanding that while the soul is eternally connected with the divine, it maintains its unique identity.\r\n\r\nLord Chaitanya\'s mission extended beyond philosophy; he aimed to flood the world with love of God through the congregational chanting of the holy names. His followers, known as Gaudiya Vaishnavas, continue to uphold his teachings, engaging in devotional practices and spreading the message of divine love. The Chaitanya Charitamrita, a biographical work, details the life and teachings of Lord Chaitanya, offering a profound insight into the spiritual legacy he left behind. Today, Lord Chaitanya is worshipped and revered as a divine incarnation who exemplified the path of devotion and the transformative power of the holy names of God.                        ', '2', '20 Nov, 2023', 9, 'Lord-Chaitanya-1.jpg.655b811f930a4.jpg'),
(20, 'test by normal', 'dasdasdasdasdas', '9', '26 Nov, 2023', 11, 'photo_12_2023-11-26_09-42-03.jpg.6563c91496ecf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patron_table`
--

CREATE TABLE `patron_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patron_table`
--

INSERT INTO `patron_table` (`id`, `name`, `email`, `phone`, `amount`, `date`) VALUES
(1, 'Krsna Prasad', 'dk.why7@gmail.com', '123', '1231', '2023-11-28 16:08:50'),
(3, 'Guy', 'guy@gmail.com', '1234567891', '123', '2023-11-28 16:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `verification_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `mobile`, `is_verified`, `verification_token`, `created_at`) VALUES
(3, 'Krsna', 'Prasad', 'guy', 'dk.why7@gmail.com', '$2y$10$Kc8TBUlkwnjWB7FbkOwCSOprrCkmkR.j.N0WhjU2zMH/ioePqmTbG', '123', 0, '', '2023-11-28 20:53:36'),
(4, 'Norm', 'Lim', 'Norm', 'norm@gmail.com', '$2y$10$BqVGFf1xoCTMLn8k85nWGum5W0szOaH/4UB5EO1GzQavLcXyVGiPG', '213-3131231', 0, '', '2023-11-29 13:49:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_table`
--
ALTER TABLE `about_table`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `activities_table`
--
ALTER TABLE `activities_table`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `album_table`
--
ALTER TABLE `album_table`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `content_table`
--
ALTER TABLE `content_table`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `donation_received`
--
ALTER TABLE `donation_received`
  ADD PRIMARY KEY (`donation_received_id`);

--
-- Indexes for table `donation_table`
--
ALTER TABLE `donation_table`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `festival_table`
--
ALTER TABLE `festival_table`
  ADD PRIMARY KEY (`festival_id`);

--
-- Indexes for table `images_table`
--
ALTER TABLE `images_table`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `member_table`
--
ALTER TABLE `member_table`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_table`
--
ALTER TABLE `news_table`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `patron_table`
--
ALTER TABLE `patron_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_table`
--
ALTER TABLE `about_table`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activities_table`
--
ALTER TABLE `activities_table`
  MODIFY `activity_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `album_table`
--
ALTER TABLE `album_table`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `content_table`
--
ALTER TABLE `content_table`
  MODIFY `content_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `donation_received`
--
ALTER TABLE `donation_received`
  MODIFY `donation_received_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donation_table`
--
ALTER TABLE `donation_table`
  MODIFY `donation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `festival_table`
--
ALTER TABLE `festival_table`
  MODIFY `festival_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images_table`
--
ALTER TABLE `images_table`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `member_table`
--
ALTER TABLE `member_table`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news_table`
--
ALTER TABLE `news_table`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `patron_table`
--
ALTER TABLE `patron_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
