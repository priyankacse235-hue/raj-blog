-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2024 at 06:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_alt` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT 0,
  `short_desc` longtext DEFAULT NULL,
  `defination` longtext DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` longtext DEFAULT NULL,
  `meta_desc` longtext DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `cat_id`, `slug`, `title`, `image`, `image_alt`, `active`, `short_desc`, `defination`, `meta_title`, `meta_keywords`, `meta_desc`, `position`, `view_count`, `created_by`, `created_at`, `updated_at`) VALUES
(8, 6, 'can-you-become-a-morning-person?-sleep-scientists-say-it-is-possible-with-these-key-tips', 'Can You Become a Morning Person? Sleep Scientists Say It Is Possible With These Key Tips', 'blog-images/1727006155img66e9ee35ce3009a0fac71032.webp', 'dddddd', 1, '<h2>What makes someone a morning person or a night owl?</h2>', '<p>The natural inclination to fall asleep and wake up at certain times is known as our <a href=\"https://www.sleepfoundation.org/how-sleep-works/chronotypes\">chronotype</a>, and it changes among individuals, <a href=\"https://profiles.stanford.edu/jamie-zeitzer?tab=bio\">Jamie Zeitzer, </a>an associate professor of psychiatry and behavioral health at Stanford University and a circadian psychologist, tells <i>Inverse</i>.</p><p>Our <a href=\"https://www.inverse.com/article/48901-circadian-rhythm-blood-test\">circadian rhythm</a> is the underlying mechanism that dictates when we start to feel sleepy at night and awake in the morning. Chronotype and circadian rhythm are closely related, though different. According to the Sleep Foundation, “while circadian rhythm can be ‘<a href=\"https://www.sleepfoundation.org/circadian-rhythm/can-you-change-your-circadian-rhythm\">trained</a>’ by adhering to a strict schedule, the underlying chronotype exists on a more permanent basis.”</p><p>Zeitzer says we don’t understand the biology behind chronotypes exactly, though “there’s obviously some genetic component to it.”</p><p>Our chronotype stays constant throughout our lifetimes, even if our natural sleep cycle shifts slightly <a href=\"https://www.inverse.com/mind-body/how-much-sleep-do-you-need\">as we age</a>. For example, Zeitzer says, all chronotypes will have a later sleep-wake cycle during the teenage years compared with later in adulthood.</p><p>“A 17-year-old who’s a morning type might be going to sleep at 11 or 12, whereas a 17-year-old who’s an evening type might be going to sleep at 3,” Zeitzer says. “When that same morning person is 30 or 40, they might be going to sleep at 10; the evening person may go closer to 12 as an adult.”</p><p>Those are natural shifts that occur as we age, regardless of when we have to be up in the morning. But for most people, external forces like work, school, and child-rearing may dictate when we wake up and fall asleep. And for that, we need to train our circadian rhythm.</p><p> </p><h2>How to make yourself a morning person</h2><p>If you’re a night owl whose life requires morning-person hours, don’t despair; you can alter your behavior to make working on a morning-person schedule a little easier.</p><p><a href=\"https://www.solveoursleep.com/\">Whitney Roban</a>, a clinical psychologist and sleep specialist, says it’s all about training your body’s circadian rhythm to get on an earlier schedule.</p><p>When the sun goes down, the lack of light and colder temperature signals the body to release melatonin, a hormone associated with sleep. However, artificial light and heat mean our circadian rhythms aren’t as strictly governed by the sun as they once were. Things like light, warmth, and exercise in the evening can all trick our circadian rhythm into operating in daytime mode. Instead of releasing melatonin, the body can release glucose, something sure to keep you awake. When you’re trying to get on a sleep-wake schedule more akin to a morning person’s, sleep hygiene and early morning activities matter.</p>', NULL, NULL, NULL, 0, 40, 1, '2024-09-22 06:25:55', '2024-10-13 06:25:56'),
(7, 1, 'blogs-to-show-publically', 'blogs to show publically', 'blog-images/17270062151_shutterstock_2282980519_20240921104811_930x584.webp', NULL, 1, '<h2>Is it a good idea to have breakfast for dinner?</h2>', '<h3>In Short</h3><ul><li>Breakfast foods like poha, upma, and omelettes can make for a nutritious dinner</li><li>Having breakfast for dinner simplifies meal planning and helps avoid junk or outside food</li><li>It is important to keep portion sizes in check and opt for balanced meals</li></ul><p>After a long day at work, do you often find yourself fretting over what to eat for dinner? Zomato and Swiggy can certainly help keep cooking woes at bay, but after a while, even scrolling through such platforms can become endless and mindless. The overwhelming options make it difficult to decide, or sometimes you\'re simply too exhausted to make yet another decision at that point.</p><p> </p><p>OpenAI CEO Sam Altman says that <a href=\"https://www.axios.com/2024/09/12/openai-strawberry-model-reasoning-o1\">the company\'s new o1 model</a> — or Strawberry, as the project was code-named — is nowhere near full ripeness.</p><p><strong>State of play:</strong> Speaking at a T-Mobile event Wednesday in San Francisco, Altman likened where o1 is today to where OpenAI\'s language models were when GPT-2 came out in 2019. He said to expect massive improvements in the coming years, similar to the path from GPT-2 to the current GPT-4.</p><ul><li>\"Even in the coming months, you\'ll see it get a lot better as we move from o1 preview to o1,\" Altman said at the event, where he was on hand to tout <a href=\"https://www.axios.com/2024/09/18/t-mobile-openai-partnership-customer-service\">a new partnership</a> with the wireless carrier.</li></ul><p><strong>Catch up quick:</strong> Unlike most generative AI models, OpenAI\'s o1 is capable of planning out its approach when it responds to a query — and can even explore multiple approaches before providing an answer. Other models, including OpenAI\'s current flagship <a href=\"https://www.axios.com/2024/05/13/openai-google-chatgpt-ai\">GPT-4o</a>, begin answering immediately, spinning out responses as they go along.</p><ul><li>OpenAI has rolled out a preview of o1 as well as a smaller model specifically for coding, o1 mini, with certain paid customers able to perform a limited number of o1 queries per week.</li><li>o1/Strawberry is most immediately valuable in solving problems in math, science and coding — and users are already creating <a href=\"https://x.com/minchoi/status/1836441778225877076?s=46&amp;t=lWeRdBU5epOoS27GJ8FHHg\">unusual and unexpected projects</a> with it.</li></ul><p><strong>The big picture: </strong>Even as society is still trying to make sense of chatbots, the tech industry is rapidly <a href=\"https://www.axios.com/2024/09/13/tech-industry-new-ai-models-reasoning\">increasing their capabilities</a>.</p><ul><li>OpenAI\'s advances in reasoning represent one path. Another is emerging in efforts by Salesforce and others to hand over more decision-making capability to AI agents.</li></ul><p><strong>Zoom in: </strong>OpenAI has <a href=\"https://www.axios.com/2024/07/15/openai-chatgpt-reasoning-ai-levels\">laid out a five-level approach</a> to describe the capability of its systems.</p><ul><li>ChatGPT achieved the first level — an AI chatbot capable of carrying on a conversation.</li><li>Level two AI can achieve human-level problem solving. Altman said Wednesday that the reasoning capabilities of o1 are taking OpenAI from the first stage to the beginning of the second one.</li><li>At level three, AI can act as an independent agent. Level four AI can help discover new information, and at level five, AI can do the work of an entire organization.</li><li>\"This move from one to two took a while, but I think the most exciting thing about two is that it enables level three relatively quickly,\" Altman said.</li></ul><p><strong>Yes, but:</strong> OpenAI itself rated o1 as a \"medium risk\" on its safety scorecard.</p><p> </p><ul><li>The company found problems in two categories: the AI\'s persuasive abilities, and risks related to developing nuclear, biological and other weapons.</li><li>OpenAI\'s assessment found that o1 wouldn\'t help novices create a weapon from scratch, but <a href=\"https://www.transformernews.ai/p/openai-o1-alignment-faking\">could make things easier</a> for those with knowledge of the subject.</li></ul><p><strong>OpenAI also observed</strong> o1 using novel methods to overcome obstacles — a capability that\'s both an asset and a potential risk.</p><ul><li>In one example, o1 was tasked with exploiting a vulnerability running software on a particular cloud container. When that container stopped running, though, the model found another way to solve the challenge by scanning the network and finding the information it needed on a separate virtual machine.</li><li>\"The model pursued the goal it was given, and when that goal proved impossible, it gathered more resources (access to the Docker host) and used them to achieve the goal in an unexpected way,\" OpenAI said in the o1 system card.</li></ul>', '', NULL, '', 4, 32, 1, '2024-09-22 03:40:38', '2024-10-13 05:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `delete_status` int(11) NOT NULL DEFAULT 0,
  `updated_by` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_by`, `status`, `delete_status`, `updated_by`, `updated_at`) VALUES
(1, 'rwrwerwe', '2024-07-22 17:20:50', 1, 0, NULL, NULL),
(2, 'cat 1', '2024-07-22 17:31:37', 1, 1, '2024-08-31 13:15:43', '2024-08-31 07:45:43'),
(3, 'Programming Tutorials', '2024-08-31 12:32:34', 1, 0, NULL, NULL),
(4, 'Software Development', '2024-08-31 12:32:47', 1, 0, NULL, NULL),
(5, 'Web Development', '2024-08-31 12:33:00', 1, 0, NULL, NULL),
(6, 'DevOps and Cloud Computing', '2024-08-31 12:33:13', 1, 0, NULL, NULL),
(7, 'AI and Machine Learning', '2024-08-31 12:33:24', 1, 0, NULL, NULL),
(8, 'Entrepreneurship', '2024-08-31 12:33:36', 1, 0, NULL, NULL),
(9, 'Small Business Tips', '2024-08-31 12:33:47', 1, 0, NULL, NULL),
(10, 'Marketing Strategies', '2024-08-31 12:33:58', 1, 0, NULL, NULL),
(11, 'Case Studies and Success Stories', '2024-08-31 12:34:09', 1, 0, NULL, NULL),
(12, 'Productivity Hacks', '2024-08-31 12:34:20', 1, 0, NULL, NULL),
(13, 'Time Management', '2024-08-31 12:34:30', 1, 0, NULL, NULL),
(14, 'Career Growth', '2024-08-31 12:34:39', 1, 0, NULL, NULL),
(15, 'Tech Industry News', '2024-08-31 12:35:12', 1, 0, NULL, NULL),
(16, 'Market Trends', '2024-08-31 12:35:20', 1, 0, NULL, NULL),
(17, 'Reviews of New Technologies', '2024-08-31 12:35:31', 1, 0, NULL, NULL),
(18, 'Video Editing', '2024-08-31 12:36:01', 1, 0, NULL, NULL),
(19, 'Personal Stories', '2024-08-31 12:36:16', 1, 0, NULL, NULL),
(20, 'Content Strategy', '2024-08-31 12:36:28', 1, 0, NULL, NULL),
(21, 'Tips for Growth', '2024-08-31 12:36:45', 1, 0, NULL, NULL),
(22, 'Freelancing Tip', '2024-08-31 12:40:06', 1, 0, '2024-09-15 13:03:46', '2024-09-15 07:33:46'),
(23, 'Tech Guides', '2024-08-31 12:40:50', 1, 1, '2024-08-31 13:09:34', '2024-08-31 07:39:34'),
(24, 'Technology', '2024-08-31 12:41:12', 1, 1, '2024-08-31 13:04:30', '2024-08-31 07:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `company_name` varchar(20) DEFAULT NULL,
  `intrest` varchar(100) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `designation`, `description`, `profile`, `created_at`, `updated_at`) VALUES
(1, 'ramkrishna', 'Ceo upscale corporation Ltd.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'customers/1722689099Picture11.jpg', '2024-08-03 07:14:59', '2024-08-04 01:56:17'),
(2, 'annie besent', 'Ceo upscale corporation Ltd.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'customers/1722756304Picture22.jpg', '2024-08-04 01:50:00', '2024-08-04 01:55:04'),
(3, 'rand burn', 'Ceo upscale corporation Ltd.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'customers/1722756186Picture14.jpg', '2024-08-04 01:53:06', '2024-08-04 01:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `genral_settings`
--

CREATE TABLE `genral_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genral_settings`
--

INSERT INTO `genral_settings` (`id`, `site_name`, `logo`, `favicon`, `footer_text`, `created_at`, `updated_at`) VALUES
(0, 'Raj blogs', 'sites/1726312132_mini_logo-black.png', 'sites/favicon', '© Copyright 2024. All Rights Reserved.', '2024-07-21 14:07:06', '2024-10-13 10:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `indeed` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `gmail` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `facebook`, `instagram`, `indeed`, `youtube`, `whatsapp`, `gmail`) VALUES
(1, 'jbj', 'jbjb', 'jbjb', 'jbjb', 'jbj', 'jb');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `referred_by` int(11) NOT NULL,
  `invitation_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `user_type` int(11) NOT NULL DEFAULT 0,
  `referral_code` varchar(20) NOT NULL,
  `referred_by` varchar(255) DEFAULT NULL,
  `wallet_amount` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1,
  `current_offer` varchar(20) DEFAULT NULL,
  `profile_photo_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_type`, `referral_code`, `referred_by`, `wallet_amount`, `active`, `current_offer`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'RK', 'rkcreation7987@gmail.com', NULL, '$2y$10$k3YCExY.RbTnF2IT8lF0H.ZWlA.Iw8vi0XTAgS6SM6CpFLJfC02EC', NULL, 1, '1ZTfhJ4t', '', 0, 1, NULL, 'profiles/1722687494man.png', NULL, '2024-08-03 06:48:14'),
(10, 'akshay', 'ram123123123@gmail.com', NULL, '$2y$10$DUUS9rZmX1eMJ9WWtAAcS.0OZsdPWXGZ9f9542wRg1kO.SbqAfJRu', NULL, 0, 'WoojYTIZ', NULL, 0, 1, NULL, NULL, '2024-07-28 00:53:06', '2024-09-15 07:00:18'),
(11, 'ramkrishna', 'ram@gmail.com', NULL, '$2y$10$Gv2myIb1r3szT5M3Sud3ZeOau.C8nvpZhpm1HEUJsowTBxfhiymXi', NULL, 0, 'SDwtkT1z', NULL, 0, 1, NULL, NULL, '2024-10-13 08:17:34', '2024-10-13 08:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `offer_amount` varchar(255) DEFAULT NULL,
  `offer_title` varchar(255) DEFAULT NULL,
  `terms` longtext DEFAULT NULL,
  `offer_status` int(11) NOT NULL DEFAULT 1,
  `active` int(11) NOT NULL DEFAULT 1,
  `position` varchar(255) DEFAULT NULL,
  `created_by` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `offer_amount`, `offer_title`, `terms`, `offer_status`, `active`, `position`, `created_by`, `updated_by`) VALUES
(13, '999', 'dirsy jswnd', 'terms & policies writing here', 1, 1, 'first_blog', '2024-08-03 11:22:31', NULL),
(12, '499', 'Invite your friend & get 49', 'terms & policies writing here', 1, 1, 'invite', '2024-08-03 11:22:31', NULL),
(11, '999', 'dirsy jswnd', 'terms & policies writing here', 0, 0, 'first_blog', '2024-08-03 11:14:59', '2024-08-03 11:22:31'),
(9, NULL, NULL, 'terms & policies writing here', 1, 0, 'first_blog', '2024-08-03 11:11:43', '2024-08-03 11:14:59'),
(10, '499', 'Invite your friend & get 49', 'terms & policies writing here', 1, 0, 'invite', '2024-08-03 11:14:59', '2024-08-03 11:22:31'),
(8, '499', 'Invite your friend & get 49', 'terms & policies writing here', 1, 0, 'invite', '2024-08-03 11:11:43', '2024-08-03 11:14:59');

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
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
