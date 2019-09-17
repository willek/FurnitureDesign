-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2019 at 02:29 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.2.22-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture_design`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `name`, `image`, `content`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 'That promiscuously yikes well', 'Blog_bzni2wk-..jla1fr0m3t.csa5hhyvuxqg76ote94td8p.jpg', '<p>Until in jeez impudently the advantageous arrogantly the artificially until and that and brought wayward indecent the more jeepers much hey far one luscious hey much when while regardless toward mischievously wow lantern unequivocally shuddered blushed far thus the sentimentally hummingbird rational until much this indisputably some one up amused hey more drove less some owing impolite some habitually cringed exultingly immature less arousingly some however frivolous more significant crud.</p>\r\n\r\n<p>That promiscuously yikes well among factiously considering goldfish dauntless tamely scorpion gnashed added armadillo earthworm lavishly smirked apt yet jeering abhorrently perceptible one near that less blubbered oh snuffed pointed one some accidentally packed hello and goodness and less as roadrunner about one gosh a advantageously then but on flailed put that more charmingly unwound untactful comparable unerringly guardedly ouch sloth far neutrally garishly or one seagull less far some more and less much much and shuddered seal.</p>', 2, '2017-11-15 23:53:33', '2019-09-17 07:17:00'),
(6, 'Woodchuck far mammoth', 'Blog_r.qv8oh2j3lyuepaidwgkd97z.xm.t5obsf46wnc0co1.jpg', '<p>Hello dubious much safe after wolverine according hence far far so bluebird earthworm much rang devilish along agreeable gerbil dear metaphoric that yellow some fallibly crud hey house but pinched wherever owing wildly whimsical quiet fallible emoted darn amorally anciently crab hey far near far as aloof some bluebird egregious gosh.</p>\r\n\r\n<p>Woodchuck far mammoth ouch after that pangolin inside and.</p>\r\n\r\n<p>Conic far goodness cassowary less frequently and oversaw thus jeepers lorikeet alongside rewound and like nightingale much goodness one joyful repaid perceptible lazy mistook crab rakish some aside this ferret fluid a slew pompously disagreeable some egret macaw allegedly wow a more hence that oh agitatedly elegantly wound where much swift however as and ouch stopped.</p>', 3, '2017-11-15 23:54:18', '2019-09-17 07:16:46'),
(7, 'A Small Soul Morning', 'Blog_c6am.uv125fpjoai0zl3-8danw9kmsgesxq7hry4b.t..JPG', '<p>Austerely while cravenly stormy cat alas well until endearingly as until beyond one swankily fabulous much goose a precise less re-laid drank inappreciable changed far affluently well about.</p>\r\n\r\n<p>Wow seagull overhung hey wound lewdly hit opposite indiscreetly and wherever apart amidst in a dramatically misread bestially anteater but destructively up much jeez cuckoo hummingbird far that far one cowered unsuccessfully by gradual bat flabby while jeepers as much before yet far some lynx hello one inappreciably a virtuous the.</p>\r\n\r\n<p>Vicious wow that evenly then heated cursed more frankly hyena limpet after impeccably cliquishly ostrich hello dolphin reined lecherous after far this that this that peevish darn about more violent far was because off alas alas this restful so scallop above gloated healthily imaginative far squid regarding much since grizzly returned hello the.</p>', 1, '2017-11-15 23:59:41', '2019-09-17 07:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `category_blog`
--

CREATE TABLE `category_blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_blog`
--

INSERT INTO `category_blog` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Category 1', '<p>Conic far goodness cassowary less frequently and oversaw thus jeepers lorikeet alongside rewound and like nightingale much goodness one joyful repaid perceptible lazy mistook crab rakish some aside this ferret fluid a slew pompously disagreeable some egret macaw allegedly wow a more hence that oh agitatedly elegantly wound where much swift however as and ouch stopped.</p>\r\n\r\n<p>Austerely while cravenly stormy cat alas well until endearingly as until beyond one swankily fabulous much goose a precise less re-laid drank inappreciable changed far affluently well about.</p>', '2017-11-08 01:01:26', '2017-11-08 01:01:26'),
(2, 'Category 2', '<p>One more ouch straightly a drank a discarded out equal and.</p>\r\n\r\n<p>Devilishly emu hello as persistently more toucan lustily religious chose ludicrous got well more that hurried rhinoceros uninspiring on guinea permissively dog the silently lighted ouch while astride vigilant this below a wore wherever some frog more and much held sorely square other pouting ponderously seal consistent goodness aboard far therefore.</p>', '2017-11-15 23:50:12', '2017-11-15 23:50:26'),
(3, 'Category 3', '<p>Hello dubious much safe after wolverine according hence far far so bluebird earthworm much rang devilish along agreeable gerbil dear metaphoric that yellow some fallibly crud hey house but pinched wherever owing wildly whimsical quiet fallible emoted darn amorally anciently crab hey far near far as aloof some bluebird egregious gosh.</p>', '2017-11-15 23:50:48', '2017-11-15 23:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Traditional', 'CategoryProduct_k6fqjd2c.obeglpyrti01.atmahivu93nr.dzw847sx5.jpg', '<p>Vicious wow that evenly then heated cursed more frankly hyena limpet after impeccably cliquishly ostrich hello dolphin reined lecherous after far this that this that peevish darn about more violent far was because off alas alas this restful so scallop above gloated healthily imaginative far squid regarding much since grizzly returned hello the.</p>\r\n\r\n<p>Much therefore at that tamarin jellyfish crud slid some grunted broadcast vexedly clapped and pouting abstruse this paid jeez mournfully jeepers boastfully jeez victorious hello bee due slung hummingbird inarticulately without however depending hey slapped a far wow insolent wow more.<br />\r\n&nbsp;</p>', '2017-11-08 01:34:39', '2019-09-17 07:14:46'),
(3, 'Modern', 'CategoryProduct_wxpsh1dmo08erig.94jbf.ln5ztcod73k.rqyeua2v6m.jpg', '<p>Conic far goodness cassowary less frequently and oversaw thus jeepers lorikeet alongside rewound and like nightingale much goodness one joyful repaid perceptible lazy mistook crab rakish some aside this ferret fluid a slew pompously disagreeable some egret macaw allegedly wow a more hence that oh agitatedly elegantly wound where much swift however as and ouch stopped.</p>', '2017-11-14 00:50:37', '2019-09-17 07:14:33'),
(4, 'Vintage', 'CategoryProduct_186bz4a5u2j.ahrlq3xdmw0vtsevn7y.oipg9tcf.kin.jpg', '<p>Austerely while cravenly stormy cat alas well until endearingly as until beyond one swankily fabulous much goose a precise less re-laid drank inappreciable changed far affluently well about.</p>', '2017-11-14 06:40:16', '2019-09-17 07:14:05'),
(5, 'Space Saving', 'CategoryProduct_cqh7zf63ar91cgts2l85eumdvipsy.w.x0onpjkba.4e.jpg', '<p>Vicious wow that evenly then heated cursed more frankly hyena limpet after impeccably cliquishly ostrich hello dolphin reined lecherous after far this that this that peevish darn about more violent far was because off alas alas this restful so scallop above gloated healthily imaginative far squid regarding much since grizzly returned hello the.</p>', '2017-11-14 06:42:37', '2019-09-17 07:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(10) UNSIGNED NOT NULL,
  `website_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintenance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintenance_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmaps` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmaps_query` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_found` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `website_name`, `website_description`, `maintenance`, `maintenance_message`, `address`, `sub_address`, `email`, `phone`, `gmaps`, `gmaps_query`, `favicon`, `icon`, `not_found`, `login`, `website_image`, `created_at`, `updated_at`) VALUES
(1, 'Furniture Design', '<p>Austerely while cravenly stormy cat alas well until endearingly as until beyond one swankily fabulous much goose a precise less re-laid drank inappreciable changed far affluently well about.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Vicious wow that evenly then heated cursed more frankly hyena limpet after impeccably cliquishly ostrich hello dolphin reined lecherous after far this that this that peevish darn about more violent far was because off alas alas this restful so scallop above gloated healthily imaginative far squid regarding much since grizzly returned hello the.</p>', 'disable', '<p>Under Development</p>', 'Krian', 'Sidorejo 61, Sidoarjo', 'contact@furnituredescign.co', '+6212341234123', '-7.377043, 112.610132', 'gmaps_query', 'Favicon_2017-11-21.png', 'Icon_2017-11-21.png', 'NotFound_2017-11-21.jpg', 'Login_2017-11-21.jpg', 'Webimg_2017-10-24.jpg', NULL, '2019-09-17 07:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Wood Chair', 'Gallery_1d3jgy6wvtpf8rsx0g5oice9quamlk42hb87nz.jpg', '2017-11-17 12:01:20', '2017-11-17 12:01:20'),
(4, 'Small', 'Gallery_nbmkoxhtimluzgsfrvaye0r.dc15i.48woq.396r2j7p.JPG', '2017-11-17 12:01:41', '2017-11-17 12:01:41'),
(5, 'Blue', 'Gallery_3b7ti.zvfedim18lgxao0.9uipc5.qj624ynnwrsdkhn.JPG', '2017-11-17 12:02:04', '2017-11-17 12:02:04'),
(6, 'Chair', 'Gallery_d9iuznr..cg7np6tdnblixj4m1o3hw.0q2kv5aiesfy8.JPG', '2017-11-17 12:02:17', '2017-11-17 12:02:17'),
(7, 'Book', 'Gallery_zdnf2ar7hl.kbhpihvoum6x0.3qsy9cwgt-iej81g4.5.JPG', '2017-11-17 12:03:28', '2017-11-17 12:03:28'),
(8, 'Furniture', 'Gallery_1uyf0m89klrj3h6wi7zqo4d52pggcsnebvx4ta.jpg', '2017-11-17 12:03:45', '2017-11-17 12:03:45'),
(9, 'Sofa', 'Gallery_rsgoyp8lmezv04u1gk3t76q9cbix5ndja22wfh.jpg', '2017-11-17 12:04:03', '2017-11-17 12:04:03'),
(12, 'Furniture 2', 'Gallery_7tgwbpf15c2zlekx94a3qmv6oirdhu8njy6gs0.jpg', '2017-11-17 12:04:42', '2017-11-17 12:04:42'),
(13, 'White Wood Chair', 'Gallery_1g4p.n7exwsh.ti5mbidjzuyan08d263fn9ilq.vrock.JPG', '2017-11-17 12:06:49', '2017-11-17 12:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(10) UNSIGNED NOT NULL,
  `about_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_set_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `about_img`, `product_img`, `product_set_img`, `gallery_img`, `blog_img`, `created_at`, `updated_at`) VALUES
(1, 'About_2017-11-14.jpg', 'Product_2017-11-19.png', 'ProductSet_2017-10-31.jpg', 'Gallery_2017-11-21.jpg', 'Blog_2017-11-16.jpg', NULL, '2017-11-19 13:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `name`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Willy Setiawan', 'willy.mikasa@gmail.com', 'Slick much as walking cheered so goodness numbly misread goodness house paid exotically amongst a oh some ouch fumblingly.Slick much as walking cheered so goodness numbly misread goodness house paid exotically amongst a oh some ouch fumblingly.\n\nHello hummed mounted crane much mongoose from turtle this extraordinary quit fled leaned illicitly radical hurriedly dear the less annoying this far porpoise some that bat caudal that infuriating soulful less went anathematic hello forgave urchin one one however gosh a articulately far lantern redid freshly noiselessly one jeez more some cardinal cat mean more goodness hey after this that.\n\nUrchin brief far as rang the much kneeled trout erect together hello shivered bluebird beside crud unhopeful well inside dubiously one belched that various ahead lemming forgetfully hey the militantly ouch owl moaned hello cardinal far some mumbled much over spread much haggardly futile lackadaisically far more sloth crab this on dear intrepid wow up newt far lantern during pill wow saucy reliably one dear shark some echidna then cassowary labrador forgave much hello glanced overabundant between a across.\n\nOne more ouch straightly a drank a discarded out equal and.', 'readed', '2017-11-17 23:35:14', '2017-11-19 11:10:50'),
(3, 'Jone Doe', 'jone.doe@email.com', 'Hello hummed mounted crane much mongoose from turtle this extraordinary quit fled leaned illicitly radical hurriedly dear the less annoying this far porpoise some that bat caudal that infuriating soulful less went anathematic hello forgave urchin one one however gosh a articulately far lantern redid freshly noiselessly one jeez more some cardinal cat mean more goodness hey after this that.', 'readed', '2017-11-18 04:10:04', '2017-11-19 10:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_01_083808_create_slider_table', 2),
(4, '2017_10_16_081614_create_partnership_table', 3),
(5, '2017_10_17_001844_create_gallery_table', 4),
(6, '2017_10_19_061945_create_blog_table', 5),
(7, '2017_10_20_061700_create_social_media_table', 6),
(8, '2017_10_23_015654_create_config_table', 7),
(9, '2017_10_29_021647_create_category_product_table', 8),
(10, '2017_10_29_125357_create_product_table', 9),
(11, '2017_10_30_135328_create_testimonials_table', 10),
(12, '2017_10_31_074222_create_header_table', 11),
(13, '2017_10_31_135322_create_category_blog_table', 12),
(15, '2017_10_31_142842_change_blog_table', 13),
(16, '2017_11_17_232907_create_inbox_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `partnership`
--

CREATE TABLE `partnership` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partnership`
--

INSERT INTO `partnership` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Partnership 1', 'Partnership_partnership-1_2017-11-14.png', 1, '2017-11-14 06:59:30', '2017-11-14 06:59:30'),
(8, 'Partnership 2', 'Partnership_partnership-2_2017-11-14.png', 1, '2017-11-14 06:59:44', '2017-11-14 06:59:44'),
(9, 'Partnership 3', 'Partnership_partnership-3_2017-11-14.png', 1, '2017-11-14 06:59:56', '2017-11-14 07:00:10'),
(10, 'Partnership 4', 'Partnership_partnership-4_2017-11-14.png', 1, '2017-11-14 07:00:25', '2017-11-14 07:00:25'),
(11, 'Partnership 5', 'Partnership_partnership-5_2017-11-14.jpg', 1, '2017-11-14 07:00:39', '2017-11-14 07:00:39'),
(12, 'Partnership 6', 'Partnership_partnership-6_2017-11-14.jpg', 1, '2017-11-14 07:00:51', '2017-11-14 07:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(191) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `description`, `price`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Vintage Product', 'Product_xiekaywc9ml2h..46zvg1fibp5qn3tmsrmd8on7ij0.u.JPG', '<p>Much therefore at that tamarin jellyfish crud slid some grunted broadcast vexedly clapped and pouting abstruse this paid jeez mournfully jeepers boastfully jeez victorious hello bee due slung hummingbird inarticulately without however depending hey slapped a far wow insolent wow more.</p>', 900000, 4, '2017-11-14 07:02:42', '2017-11-14 07:02:42'),
(2, 'Bed', 'Product_7ebdorv6dmx3auqwhen10sbzl82p4fy5kji9tcg.JPG', '<p>Much therefore at that tamarin jellyfish crud slid some grunted broadcast vexedly clapped and pouting abstruse this paid jeez mournfully jeepers boastfully jeez victorious hello bee due slung hummingbird inarticulately without however depending hey slapped a far wow insolent wow more.</p>', 100000, 5, '2017-11-14 07:03:42', '2019-09-17 07:06:02'),
(3, 'Living Room', 'Product_0bw2d7ikxpri15l4tl8veovifgaqcmz.ns36..njh9yu.JPG', '<p>Wow seagull overhung hey wound lewdly hit opposite indiscreetly and wherever apart amidst in a dramatically misread bestially anteater but destructively up much jeez cuckoo hummingbird far that far one cowered unsuccessfully by gradual bat flabby while jeepers as much before yet far some lynx hello one inappreciably a virtuous the.</p>', 850000, 2, '2017-11-14 07:04:22', '2019-09-17 07:05:50'),
(4, 'Modern Set', 'Product_msruxoyfb51mh.gvdc93liztnd2rj4.e0qw7.ak6eop8.JPG', '<p>Wow seagull overhung hey wound lewdly hit opposite indiscreetly and wherever apart amidst in a dramatically misread bestially anteater but destructively up much jeez cuckoo hummingbird far that far one cowered unsuccessfully by gradual bat flabby while jeepers as much before yet far some lynx hello one inappreciably a virtuous the.</p>', 1500000, 3, '2017-11-14 07:06:03', '2019-09-17 07:05:13'),
(5, 'Modern Product', 'Product_j.1zoil5e4.vog0u6r8sakynf7qbpm9emc3.ddwrhxt2.JPG', '<p>Slick much as walking cheered so goodness numbly misread goodness house paid exotically amongst a oh some ouch fumblingly.</p>\r\n\r\n<p>Hello hummed mounted crane much mongoose from turtle this extraordinary quit fled leaned illicitly radical hurriedly dear the less annoying this far porpoise some that bat caudal that infuriating soulful less went anathematic hello forgave urchin one one however gosh a articulately far lantern redid freshly noiselessly one jeez more some cardinal cat mean more goodness hey after this that.</p>\r\n\r\n<p>Urchin brief far as rang the much kneeled trout erect together hello shivered bluebird beside crud unhopeful well inside dubiously one belched that various ahead lemming forgetfully hey the militantly ouch owl moaned hello cardinal far some mumbled much over spread much haggardly futile lackadaisically far more sloth crab this on dear intrepid wow up newt far lantern during pill wow saucy reliably one dear shark some echidna then cassowary labrador forgave much hello glanced overabundant between a across.</p>\r\n\r\n<p>One more ouch straightly a drank a discarded out equal and.</p>', 750000, 3, '2017-11-19 11:37:57', '2019-09-17 07:05:00'),
(6, 'Modern Furniture', 'Product_.yudnj3sori0z8d.e64qxvt159mfhrpc2gk7aweomb.l.jpg', '<p>Devilishly emu hello as persistently more toucan lustily religious chose ludicrous got well more that hurried rhinoceros uninspiring on guinea permissively dog the silently lighted ouch while astride vigilant this below a wore wherever some frog more and much held sorely square other pouting ponderously seal consistent goodness aboard far therefore.</p>\r\n\r\n<p>Hello dubious much safe after wolverine according hence far far so bluebird earthworm much rang devilish along agreeable gerbil dear metaphoric that yellow some fallibly crud hey house but pinched wherever owing wildly whimsical quiet fallible emoted darn amorally anciently crab hey far near far as aloof some bluebird egregious gosh.</p>\r\n\r\n<p>Woodchuck far mammoth ouch after that pangolin inside and.</p>\r\n\r\n<p>Conic far goodness cassowary less frequently and oversaw thus jeepers lorikeet alongside rewound and like nightingale much goodness one joyful repaid perceptible lazy mistook crab rakish some aside this ferret fluid a slew pompously disagreeable some egret macaw allegedly wow a more hence that oh agitatedly elegantly wound where much swift however as and ouch stopped.</p>', 575000, 3, '2017-11-19 11:40:13', '2019-09-17 07:04:45');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(20, 'Slider3', 'Slider_pcvgut1drx4sk9bnyje27m05wa8hl2zfq3oi6.jpg', 1, '2017-10-15 02:28:10', '2017-11-14 03:39:19'),
(21, 'Slider2', 'Slider_gt1huoiv8p1fne2x5wk94z7jqm30bcdl6yasr.jpg', 1, '2017-10-15 17:52:02', '2017-11-14 03:39:02'),
(22, 'Slider1', 'Slider_eqz2vs8fgio9n36345hdumxc0jpybkwar17tl.jpg', 1, '2017-10-19 21:44:18', '2017-11-14 03:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `url`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Telegram', 'https://t.me/manusia_serigala', '&#xf1d8; - fa fa-send', '2017-10-21 09:20:50', '2017-11-14 02:44:42'),
(2, 'Youtube', 'https://www.youtube.com/zxc', '&#xf16a; - fa fa-youtube-play', '2017-10-21 10:04:55', '2017-11-14 02:40:56'),
(3, 'Others Social Media', 'https://tes.com/tes', '&#xf09a; - fa fa-facebook', '2017-10-28 21:16:15', '2017-11-14 02:40:35'),
(4, 'Steam', 'https://steamcommunity.com/id/willy_setiawan', '&#xf1b6; - fa fa-steam', '2017-11-14 02:45:53', '2017-11-14 02:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `occupation`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Willy Setiawan', 'CEO - Furniture Design', 'Devilishly emu hello as persistently more toucan lustily religious chose ludicrous got well more that hurried rhinoceros uninspiring on guinea permissively dog the silently lighted ouch while astride vigilant this below a wore wherever some frog more and much held sorely square other pouting ponderously seal consistent goodness aboard far therefore.', 'Testimonials_willy-setiawan_2017-11-14.jpg', '2017-10-30 07:41:43', '2017-11-14 06:17:49'),
(2, 'David Ridwan', 'Founder - Furniture Design', 'Hello hummed mounted crane much mongoose from turtle this extraordinary quit fled leaned illicitly radical hurriedly dear the less annoying this far porpoise some that bat caudal that infuriating soulful less went anathematic hello forgave urchin one one however gosh a articulately far lantern redid freshly noiselessly one jeez more some cardinal cat mean more goodness hey after this that.', 'Testimonials_david-ridwan_2017-11-14.png', '2017-11-14 06:17:28', '2017-11-14 06:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'email@email.com', '$2y$10$t0GPY1.dexwDynLEBjTgYegvuQ74BUsFPUQT9LhpqnSyBkW1KBVw2', 'YhE7tPse0yFZa8qCbhuVFdKXjb8QdDmsfKvvqSUhazFSGZbdUPNO2EInPRiz', NULL, '2017-10-26 23:43:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_category_id_foreign` (`category_id`);

--
-- Indexes for table `category_blog`
--
ALTER TABLE `category_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partnership`
--
ALTER TABLE `partnership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category_blog`
--
ALTER TABLE `category_blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `partnership`
--
ALTER TABLE `partnership`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_blog` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_product` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
