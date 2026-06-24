-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 05, 2026 at 03:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_alt` varchar(255) NOT NULL,
  `show` int(11) DEFAULT 1,
  `short_desc` longtext NOT NULL,
  `defination` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `activation_request` tinyint(1) DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_desc` text DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `cat_id`, `slug`, `title`, `image`, `image_alt`, `show`, `short_desc`, `defination`, `created_by`, `created_at`, `updated_at`, `is_blocked`, `active`, `activation_request`, `meta_title`, `meta_keywords`, `meta_desc`, `view_count`) VALUES
(1, 1, 'how-to-change-your-mindset-and-transform-your-life', 'How to Change Your Mindset and Transform Your Life', 'blog-images/1780303032Mindset.jpg', 'WhatsApp Image 2026-05-24 at 8.43.19 AM.jpeg', 1, '<p>\r\n	Your mindset plays a major role in shaping your life and success.<br data-end=\"218\" data-start=\"215\" />\r\n	This blog explains how you can shift from a negative to a positive mindset.<br data-end=\"296\" data-start=\"293\" />\r\n	Small daily habits can help you transform your thinking and lifestyle.<br data-end=\"369\" data-start=\"366\" />\r\n	It shares practical steps for building confidence and self-growth.<br data-end=\"438\" data-start=\"435\" />\r\n	A helpful guide to become a better and stronger version of yourself.</p>', '<p data-end=\"319\" data-start=\"83\">\r\n	This blog focuses on personal growth and self-improvement by explaining how mindset influences every area of life. It guides readers on how to identify negative thinking patterns and replace them with positive and productive thoughts.</p>\r\n<p data-end=\"574\" data-is-last-node=\"\" data-is-only-node=\"\" data-start=\"321\">\r\n	The blog provides practical steps, daily habits, and motivational strategies to build confidence, discipline, and clarity in life. It helps readers understand that changing their mindset can lead to better decisions, success, and a more meaningful life.</p>', 1, '2026-06-01 02:30:48', '2026-06-05 06:56:14', 0, 1, 0, '', NULL, '', 3),
(2, 2, 'how-manifestation-really-works', 'How Manifestation Really Works', 'blog-images/1780303007Manifestation.jpg', 'bPU03iG9Mz8oFtwt_xWX-FicwtHyv-Bt1_uW1PLAMRYe6-5jtBFBfMSLW6TltbYUuSHt0C9DuhuOtF1Yv6jVp8EypKPFeiS0_A7PHr9ksXht8EGL2mIyYk3NCoWVkphlQHHV7dk1nGinAHGDq76M2h4ns8n2zd49etgpBP9BTYT1DzoFHsDudkhQB78Iwodp.jpg', 1, '<p>\r\n	<span style=\"font-size:14px;\"><span style=\"color:#4b0082;\"><span style=\"background-color:#fff;\">The Law of Attraction is based on the idea that thoughts create reality.<br data-end=\"663\" data-start=\"660\" />\r\n	This blog explains the real concept of manifestation in a simple way.<br data-end=\"735\" data-start=\"732\" />\r\n	You will learn how positive thinking can attract better opportunities.<br data-end=\"808\" data-start=\"805\" />\r\n	Real-life examples are included to make the concept easy to understand.<br data-end=\"882\" data-start=\"879\" />\r\n	A guide for spiritual growth and developing a positive mindset.</span></span></span></p>', '<p data-end=\"444\" data-start=\"58\">\r\n	<em>This blog explains the concept of <strong data-end=\"109\" data-start=\"92\">manifestation</strong> and how it is believed to work in real life. It describes how a person&rsquo;s thoughts, beliefs, and focus can influence their actions and shape their outcomes. The blog highlights that when you consistently think positively and clearly visualize your goals, you become more motivated and start taking actions that align with your desires.</em></p>\r\n<p data-end=\"782\" data-is-last-node=\"\" data-is-only-node=\"\" data-start=\"446\">\r\n	<em>It also discusses practical ways to apply manifestation in daily life, such as maintaining a positive mindset, setting clear intentions, practicing gratitude, and staying consistent with efforts. Overall, the blog helps readers understand how mindset, belief, and action together can play a role in achieving personal goals and success.</em></p>', 1, '2026-06-01 02:50:27', '2026-06-05 06:54:00', 0, 1, 0, '', NULL, '', 3),
(3, 3, 'top-10-skills-to-learn-for-online-earning-in-2026', 'Top 10 Skills to Learn for Online Earning in 2026', 'blog-images/1780304660online earning.jpg', 'kNVgHKLE5IT0nmsoLuLcGHo-VAoKPOW7udft29cBBQm0ih17hnM5l0FdwBvGrWpXacPs2yWI-1GbWharZV5keH7VfKorpW8y9-GqX7Vs7mlyyWYVAcOfETVmO_1nYUfCrACs_pzUfHbkxI2S9Lu7oKstR92I-KKk6BbA40yW-UCHDj0DQhyZvbbj0cPsSowE.jpg', 1, '<p>\r\n	Online earning aaj ke time me ek strong career option ban chuka hai.<br data-end=\"1050\" data-start=\"1047\" />\r\n	Is blog me 10 important skills batayi gayi hain jo 2026 me demand me rahengi.<br data-end=\"1130\" data-start=\"1127\" />\r\n	Freelancing, digital marketing aur tech skills par focus kiya gaya hai.<br data-end=\"1204\" data-start=\"1201\" />\r\n	Har skill ke sath earning potential bhi explain kiya gaya hai.<br data-end=\"1269\" data-start=\"1266\" />\r\n	Ye guide beginners ke liye best starting point hai.</p>', '<p data-end=\"344\" data-start=\"82\">\r\n	This blog focuses on the most in-demand skills that can help individuals build a strong online earning career in 2026. It explains how digital skills like freelancing, programming, digital marketing, and content creation can open multiple income opportunities.</p>\r\n<p data-end=\"632\" data-start=\"346\">\r\n	The blog guides beginners on what skills to learn, why they are valuable, and how they can be used in real-world projects. It helps readers choose the right career path in the growing online market. This is a practical roadmap for anyone who wants to start earning online in the future.</p>', 1, '2026-06-01 02:56:10', '2026-06-01 06:00:55', 0, 1, 0, '', NULL, '', 0),
(4, 4, 'how-habits-shape-your-future', 'How Habits Shape Your Future', 'blog-images/1780386781ChatGPT Image Jun 2, 2026, 01_22_44 PM.png', 'ChatGPT Image Jun 2, 2026, 01_22_44 PM.png', 1, '<p>\r\n	How to get out of negative thinking and self-doubt.</p>', '<p>\r\n	Self-doubt and negative thinking are among the biggest enemies of success. This blog will teach you how to control your inner voice, build self-confidence, and overcome fear to start taking action. Mind training and self-belief are the core parts of this process.</p>', 1, '2026-06-02 02:23:01', '2026-06-05 06:54:18', 0, 1, 0, '', NULL, '', 1),
(5, 4, 'how-habits-shape-your-future', 'How Habits Shape Your Future', 'blog-images/1780387304ChatGPT PM.png', 'ChatGPT PM.png', 1, '<p>\r\n	Your daily habits shape your future.<br data-end=\"39\" data-start=\"36\" />\r\n	Small habits create big results over time.<br data-end=\"84\" data-start=\"81\" />\r\n	This blog explains how habits can transform your life.<br data-end=\"141\" data-start=\"138\" />\r\n	Positive habits build success and discipline.</p>', '<p>\r\n	What we repeat daily becomes our identity. Habits are not just actions, but a system that designs your future. If you learn to control your habits, you can also control the direction of your life. In this blog, you will learn how small positive habits like reading, exercise, discipline, and time management lead you toward long-term success. You will also understand how negative habits can silently damage your future.</p>', 1, '2026-06-02 02:31:44', '2026-06-02 02:50:49', 0, 1, 0, '', NULL, '', 0),
(6, 4, 'how-habits-build-success-in-life', 'How Habits Build Success in Life', 'blog-images/1780387441C 01_29_40 PM.png', 'C 01_29_40 PM.png', 1, '<p>\r\n	Success does not happen suddenly; it is built through habits.<br data-end=\"64\" data-start=\"61\" />\r\n	Daily discipline and consistency are very important.<br data-end=\"119\" data-start=\"116\" />\r\n	This blog explains the habits that lead to success.<br data-end=\"173\" data-start=\"170\" />\r\n	Small actions bring big results.</p>', '<p>\r\n	Every successful person has strong habits behind their success. Success is not luck, but the result of daily actions. In this blog, we will see how a morning routine, focused work, and consistency can lead you toward success. If you want to achieve your goals, improving your habits is the first and most important step.</p>', 1, '2026-06-02 02:34:01', '2026-06-05 01:26:28', 0, 1, 0, '', NULL, '', 1),
(7, 4, 'how-habits-decide-your-lifestyle', 'How Habits Decide Your Lifestyle', 'blog-images/1780387571ChatGPT Image Jun 2, 2026, 01_29_40 PM.pn.png', 'ChatGPT Image Jun 2, 2026, 01_29_40 PM.pn.png', 1, '<div data-is-intersecting=\"true\" data-turn-id-container=\"5319e9eb-baf9-4510-b3eb-0a3c045cc670\">\r\n	<section class=\"text-token-text-primary w-full focus:outline-none has-data-writing-block:pointer-events-none [&amp;:has([data-writing-block])&gt;*]:pointer-events-auto R6Vx5W_threadScrollVars scroll-mb-[calc(var(--scroll-root-safe-area-inset-bottom,0px)+var(--thread-response-height))] scroll-mt-(--header-height)\" data-scroll-anchor=\"false\" data-testid=\"conversation-turn-13\" data-turn=\"user\" data-turn-id=\"5319e9eb-baf9-4510-b3eb-0a3c045cc670\" data-turn-id-container=\"5319e9eb-baf9-4510-b3eb-0a3c045cc670\" dir=\"auto\"></section></div>\r\n<div data-is-intersecting=\"true\" data-turn-id-container=\"request-WEB:d1d9890d-112e-49de-a922-73ea5ffc218b-28\">\r\n	<section class=\"text-token-text-primary w-full focus:outline-none has-data-writing-block:pointer-events-none [&amp;:has([data-writing-block])&gt;*]:pointer-events-auto R6Vx5W_threadScrollVars scroll-mb-[calc(var(--scroll-root-safe-area-inset-bottom,0px)+var(--thread-response-height))] scroll-mt-[calc(var(--header-height)+min(200px,max(70px,20svh)))]\" data-scroll-anchor=\"false\" data-testid=\"conversation-turn-14\" data-turn=\"assistant\" data-turn-id=\"request-WEB:d1d9890d-112e-49de-a922-73ea5ffc218b-28\" data-turn-id-container=\"request-WEB:d1d9890d-112e-49de-a922-73ea5ffc218b-28\" dir=\"auto\">\r\n	<div class=\"text-base my-auto mx-auto pb-10 [--thread-content-margin:var(--thread-content-margin-xs,calc(var(--spacing)*4))] @w-sm/main:[--thread-content-margin:var(--thread-content-margin-sm,calc(var(--spacing)*6))] @w-lg/main:[--thread-content-margin:var(--thread-content-margin-lg,calc(var(--spacing)*16))] px-(--thread-content-margin)\">\r\n		<div class=\"[--thread-content-max-width:40rem] @w-lg/main:[--thread-content-max-width:48rem] mx-auto max-w-(--thread-content-max-width) flex-1 group/turn-messages focus-visible:outline-hidden relative flex w-full min-w-0 flex-col agent-turn\">\r\n			<div class=\"flex max-w-full flex-col gap-4 grow\">\r\n				<div class=\"min-h-8 text-message relative flex w-full flex-col items-end gap-2 text-start break-words whitespace-normal outline-none keyboard-focused:focus-ring [.text-message+&amp;]:mt-1\" data-message-author-role=\"assistant\" data-message-id=\"54cf0154-5a20-4d9c-b734-f45dacadd31d\" data-message-model-slug=\"gpt-5-3-mini\" data-turn-start-message=\"true\" dir=\"auto\" tabindex=\"0\">\r\n					<div class=\"flex w-full flex-col gap-1 empty:hidden\">\r\n						<div class=\"markdown prose dark:prose-invert wrap-break-word w-full light markdown-new-styling\">\r\n							<p data-end=\"193\" data-is-last-node=\"\" data-is-only-node=\"\" data-start=\"0\">\r\n								Your lifestyle is a reflection of your habits.<br data-end=\"49\" data-start=\"46\" />\r\n								Your daily routine shapes your future lifestyle.<br data-end=\"100\" data-start=\"97\" />\r\n								Good habits lead to a healthy and productive life.<br data-end=\"153\" data-start=\"150\" />\r\n								Bad habits slow down your life progress.</p>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	</section></div>', '<p>\r\n	What you do daily defines your lifestyle. If you follow disciplined and positive habits, your lifestyle becomes healthy and successful. In this blog, we will understand how habits shape your health, productivity, and mindset. Small improvements in your daily routine can completely transform your life.</p>', 1, '2026-06-02 02:36:11', '2026-06-02 02:53:08', 0, 1, 0, '', NULL, '', 0),
(8, 4, 'how-habits-lead-to-personal-transformation', 'How Habits Lead to Personal Transformation', 'blog-images/1780399067ChatGPT Image Jun 2, 2026, 01_29_38 PM.png', 'ChatGPT Image Jun 2, 2026, 01_29_38 PM.png', 1, '<p>\r\n	Personal transformation begins with the habits you practice every day. Small, consistent actions can create powerful changes over time. By developing positive habits, you can improve your mindset, productivity, and overall quality of life. Success&nbsp; is not about making one big change&mdash;it&#39;s about making better choices every day.</p>', '<p data-end=\"823\" data-start=\"463\">\r\n	Personal transformation is a journey that starts with the habits you build and maintain. Every action you repeat daily shapes your character, influences your mindset, and determines the direction of your future. While many people look for quick solutions to improve their lives, real and lasting change comes from small, consistent improvements made over time.</p>\r\n<p data-end=\"1237\" data-start=\"825\">\r\n	Positive habits such as reading, exercising, setting goals, managing time effectively, and maintaining a growth mindset can gradually transform every aspect of your life. These habits help build discipline, confidence, and resilience, allowing you to overcome challenges and stay focused on your goals. On the other hand, negative habits can hold you back, limiting your potential and preventing personal growth.</p>\r\n<p data-end=\"1613\" data-start=\"1239\">\r\n	The key to personal transformation is co</p>', 2, '2026-06-02 05:47:47', '2026-06-03 00:57:44', 0, 0, 0, '', NULL, '', 1),
(9, 3, 'how-to-change-your-mindset-and-transform-your-life', 'How to Change Your Mindset and Transform Your Life', 'blog-images/1780400329ChatGPT Image Jun 2, 2026, 01_29_40 PM.png', 'ChatGPT Image Jun 2, 2026, 01_29_40 PM.png', 1, '<p>\r\n	mitgtnh</p>', '<p>\r\n	&nbsp;khmohjmhkomto</p>', 2, '2026-06-02 06:08:49', '2026-06-03 00:31:02', 0, 0, 0, '', NULL, '', 0),
(10, 3, 'how-to-change-your-mindset-and-transform-your-life', 'How to Change Your Mindset and Transform Your Life', 'blog-images/1780400728Mindset.jpg', 'Mindset.jpg', 1, '<p>\r\n	mhimhmjom</p>', '<p>\r\n	kmgkgkmk kooo</p>', 2, '2026-06-02 06:15:28', '2026-06-03 00:30:57', 0, 0, 0, '', NULL, '', 0),
(12, 1, 'njcbysy', 'njcbysy', 'blog-images/1780454873ChatGPT PM.png', 'ChatGPT PM.png', 1, '<p>\r\n	nciuahcyug</p>', '<p>\r\n	gfguh</p>', 1, '2026-06-02 21:17:53', '2026-06-05 06:57:05', 0, 1, 0, '', NULL, '', 20);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_status` tinyint(1) NOT NULL DEFAULT 0,
  `type` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `status`, `delete_status`, `type`) VALUES
(1, 'Mindset & Personal Growth', NULL, NULL, 1, 0, 0),
(2, 'Manifestation & Spiritual Growth', NULL, NULL, 1, 0, 0),
(3, 'Online Earning & Skills', NULL, NULL, 1, 0, 0),
(4, 'Personal Growth', NULL, NULL, 1, 0, 0),
(5, 'test', NULL, NULL, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `name`, `comment`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 1, NULL, 'fguunfmg', '2026-06-02 02:14:06', '2026-06-02 02:14:06', 0),
(2, 7, NULL, 'Your lifestyle is a reflection of your habits.', '2026-06-02 02:54:34', '2026-06-02 02:54:34', 1),
(3, 7, NULL, 'Your lifestyle is a reflection of your habits.', '2026-06-02 02:55:42', '2026-06-02 02:55:42', 0),
(4, 8, NULL, 'hii', '2026-06-02 06:38:35', '2026-06-02 06:38:35', 2),
(5, 12, NULL, 'hiiii', '2026-06-05 01:26:05', '2026-06-05 01:26:05', 1),
(6, 12, NULL, 'lkclfkcjolr', '2026-06-05 04:17:05', '2026-06-05 04:17:05', 0),
(7, 12, NULL, 'hd', '2026-06-05 06:56:31', '2026-06-05 06:56:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `intrest` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genral_settings`
--

CREATE TABLE `genral_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `fav_icon` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_21_123906_create_blogs_table', 1),
(6, '2024_07_21_124252_create_categories_table', 1),
(7, '2024_07_21_124430_create_contacts_table', 1),
(8, '2024_07_21_124623_create_genral_settings_table', 1),
(9, '2026_05_28_112119_add_is_blocked_to_blogs_table', 1),
(10, '2026_05_28_113022_add_active_to_blogs_table', 1),
(11, '2026_05_28_113515_add_status_to_categories_table', 1),
(12, '2026_05_28_113849_add_delete_status_to_categories_table', 1),
(13, '2026_05_28_114208_add_fields_to_categories_table', 1),
(14, '2026_05_28_115020_add_type_to_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spam_reports`
--

CREATE TABLE `spam_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spam_reports`
--

INSERT INTO `spam_reports` (`id`, `blog_id`, `url`, `reason`, `created_at`, `updated_at`, `ip_id`) VALUES
(1, 7, 'how-habits-decide-your-lifestyle', 'Fake or misleading information', '2026-06-02 03:51:16', '2026-06-02 03:51:16', '1');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `html` longtext DEFAULT NULL,
  `css` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `title`, `cat_id`, `thumbnail`, `status`, `created_at`, `updated_at`, `slug`, `html`, `css`) VALUES
(1, 'hbhtgtg', 5, NULL, 0, '2026-06-05 07:16:42', '2026-06-05 07:17:09', 'hbhtgtg', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n<title>Mini Page</title>\r\n<link rel=\"stylesheet\" href=\"style.css\">\r\n</head>\r\n<body>\r\n<h2 id=\"text\">Hello World</h2>\r\n<button onclick=\"changeText()\">Click Me</button>\r\n<script src=\"script.js\"></script>\r\n</body>\r\n</html>', 'function changeText() {\r\n  let text = document.getElementById(\"text\");\r\n  if (text.innerHTML === \"Hello World\") {\r\n    text.innerHTML = \"Text Changed!\";\r\n  } else {\r\n    text.innerHTML = \"Hello World\";\r\n  }\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `referred_by` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT 0.00,
  `type` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `referral_code` varchar(50) DEFAULT NULL,
  `user_type` tinyint(4) DEFAULT 0,
  `active` tinyint(1) DEFAULT 1,
  `profile_photo_path` varchar(255) DEFAULT NULL,
  `bio` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `referral_code`, `user_type`, `active`, `profile_photo_path`, `bio`) VALUES
(1, 'priyanka', 'priyanka.cse235@gmail.com', NULL, '$2y$10$DCpzQKNws5QrbfaPIr91YeW7TumFiywoZeJoJwVE6ahDFb0hWuMqm', NULL, '2026-06-01 00:20:06', '2026-06-05 05:36:57', '0VkxUERQ', 1, 1, NULL, '<p>\r\n	<strong><em><u>i&#39;m student</u></em></strong></p>'),
(2, 'priya', 'priya@gmail.com', NULL, '$2y$10$Hv/oz7W6XNYBF8fVQhkQNulkMeVEZExbLqH20oiXmX/zwiBW2A8/K', NULL, '2026-06-02 04:47:48', '2026-06-02 04:47:48', 'hgXz8zSW', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `balance` decimal(10,2) DEFAULT 0.00,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genral_settings`
--
ALTER TABLE `genral_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `spam_reports`
--
ALTER TABLE `spam_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `referral_code` (`referral_code`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genral_settings`
--
ALTER TABLE `genral_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spam_reports`
--
ALTER TABLE `spam_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
