-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2024 at 12:46 PM
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
-- Database: `social_media_campaign`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `message`, `email`, `created_at`) VALUES
(12, 'I’ve been trying to access the resources section on your website, but it keeps giving me an error message. I’ve tried multiple browsers and even cleared my cache, but nothing seems to work. Can you please look into this issue?\r\nThanks,', 'aungaung@gmail.com', '2024-07-31 17:06:48'),
(13, 'I found your website extremely helpful for teaching my teenagers about online safety. However, I think it would be beneficial to have more detailed information on how to adjust privacy settings on various social media platforms. Is there any chance you could add that?', 'susu@gmail.com', '2024-07-31 17:07:18'),
(14, 'I was reading the article on cyberbullying, and I noticed that the link to the external support resource is broken. It’s important information for us, and I’d appreciate it if you could fix it as soon as possible.\r\nThank you,', 'zawzaw@gmail.com', '2024-07-31 17:08:06'),
(15, 'I wanted to say thank you for the family agreement template provided on your site. It really helped our family set clear guidelines for internet use. It’s a fantastic resource!', 'khantsithu@gmail.com', '2024-07-31 17:09:02'),
(17, 'I love the content on your website, but I’ve been experiencing very slow loading times, especially on the ‘Tips for Parents’ page. This makes it difficult to navigate and read the information. Could you please address this issue?', 'yati@gmail.com', '2024-08-01 09:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `how_parent_helps`
--

CREATE TABLE `how_parent_helps` (
  `id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image_1` varchar(300) NOT NULL,
  `image_2` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `how_parent_helps`
--

INSERT INTO `how_parent_helps` (`id`, `description`, `image_1`, `image_2`, `created_at`) VALUES
(3, 'Parents play a crucial role in helping their teenagers stay safe online. Start by fostering open communication. Encourage your child to talk about their online experiences and any concerns they may have. Set clear guidelines for internet use, including time limits and appropriate content. Educate yourself about the social media platforms and apps your teenager uses. Discuss the importance of privacy settings and the potential risks of sharing personal information online. Be aware of the signs of cyberbullying and know how to respond if your child is a victim. Regularly review your child\'s online activity and maintain a supportive environment where they feel comfortable seeking your help.', 'how_parent_help_66a670c0d301d3.52298473_OIG1 (2).jpg', 'how_parent_help_66a670c0d34ef8.61599199_OIG1 (1).jpg', '2024-07-07 14:06:21'),
(6, 'Creating a family agreement on internet usage can help set clear expectations for online behavior. This agreement should cover acceptable websites, social media use, and online interactions. Encourage your teenager to think critically about the information they encounter online and to verify sources before sharing. Teach them about the dangers of online scams and how to recognize phishing attempts. Make use of parental controls and monitoring tools to track your child\'s online activity without invading their privacy. Emphasize the importance of taking breaks from screens to engage in offline activities. By working together, you can help your teenager develop healthy and safe online habits.', 'how_parent_help_66a6712e715795.42245347_OIG3 (1).jpg', 'how_parent_help_66a6712e71a127.97177991_OIG3 (2).jpg', '2024-07-28 16:20:47'),
(7, 'Educating your teenager about digital footprints is essential. Explain that everything they post online can be permanent and may impact their future opportunities, such as college admissions or job prospects. Encourage them to think before they post and to avoid sharing anything they wouldn\'t want a future employer or college admissions officer to see. Discuss the importance of respecting others\' privacy and intellectual property online. Model good online behavior by demonstrating respect and responsibility in your own digital interactions. Reinforce the idea that being a good digital citizen means contributing positively to the online community.', 'how_parent_help_66a6719c19cdc3.45628392_OIG3 (4).jpg', 'how_parent_help_66a6719c1a11f8.41473393_OIG3 (3).jpg', '2024-07-28 16:21:11'),
(8, 'Stay informed about the latest online trends and challenges that teenagers face. Join online parenting groups or forums to share experiences and gain insights into current issues. Keep the lines of communication open and encourage your teenager to come to you with any concerns or questions. Help them develop critical thinking skills to evaluate the credibility of online sources and recognize misinformation. Support their interests in technology by learning together about new apps or online platforms. By staying engaged and informed, you can better guide your teenager through the complexities of the digital world and help them stay safe.', 'how_parent_help_66a672234c2c53.43942740_OIG2 (1).jpg', 'how_parent_help_66a672234cd5b2.30019358_OIG2.jpg', '2024-07-28 16:21:31'),
(9, 'Encouraging offline activities and hobbies can help balance your teenager\'s online life. Promote interests that do not involve screens, such as sports, arts, or community service. Organize family activities that encourage face-to-face interaction and strengthen family bonds. Discuss the importance of maintaining a healthy balance between online and offline life. Set an example by managing your own screen time and demonstrating the value of unplugging. Support your teenager in finding and pursuing offline passions that can provide a fulfilling alternative to excessive online engagement. A balanced approach can help mitigate the risks associated with excessive internet use.', 'how_parent_help_66a67285bd6f07.90794949_OIG4.jpg', 'how_parent_help_66a67285bda9b1.51218930_OIG4.tH6PdXTtARlIEP.jpg', '2024-07-28 16:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profile` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `city` varchar(200) NOT NULL,
  `subscription` int(11) NOT NULL DEFAULT 0,
  `role` int(11) NOT NULL DEFAULT 0,
  `owner` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `profile`, `email`, `password`, `city`, `subscription`, `role`, `owner`, `created_at`) VALUES
('smc00001', 'meow ', 'profile_66ab6519c12047.91427018_admin-home.jpg', 'admin@gmail.com', '$2y$10$kU8EMjWdFd9mW4ATf6PDJuQGLfEvhjkeIHl7soBB9kYWxpvKzB0ii', 'Yangon', 1, 1, 1, '2024-07-25 16:11:00'),
('smc00007', 'Aye Chan Moe', '', 'audrey@gmail.com', '$2y$10$7EcEttDDAHmJQ38efOOgg.ZjHILvTYi8OtVrCmYTAf1K6Xyhp4Ptm', 'Yangon', 0, 0, 0, '2024-07-31 18:22:19'),
('smc00008', 'Aung Aung', '', 'aungaung@gmail.com', '$2y$10$EZ7KZXItF5qJ4eBxG0cXsu.ijG.JmgtEGig0eSZvHKgKCnAHkG1hW', 'Yangon', 0, 0, 0, '2024-08-01 10:37:38'),
('smc00005', 'Khant Si Thu', '', 'khantsithu@gmail.com', '$2y$10$Q4Xiwloqq7NMr.MRs2eGVulDHw.WVofLCXtoSUIvMb3FPmF7URAg.', 'Yangon', 0, 0, 0, '2024-07-31 17:08:49'),
('smc00003', 'Su Su', '', 'susu@gmail.com', '$2y$10$egJds6l3jzR/nmm3chCeAuFo16r.npWl3m1krCj4CnZKda7SmiSju', 'Yangon', 0, 0, 0, '2024-07-31 17:07:07'),
('smc00006', 'Yati', '', 'yati@gmail.com', '$2y$10$NWcZ7sReii.BnZiIXLF5xujOovAdUxixHKKH3z4Vbukq90w0M.YLG', 'Yangon', 0, 0, 0, '2024-07-31 17:09:31'),
('smc00004', 'Zaw Zaw', '', 'zawzaw@gmail.com', '$2y$10$jIFnQDIY5kdU/2t28wJz3.9r1fO1WUc4LICjyEeP/rP8Te88VLDTO', 'Yangon', 0, 0, 0, '2024-07-31 17:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `title`, `content`, `image`, `created_at`) VALUES
(12, 'Understanding Cyberbullying', 'Cyberbullying is a serious issue that affects many teenagers. It involves using digital platforms to harass, threaten, or humiliate someone. Unlike traditional bullying, cyberbullying can happen 24/7 and reach a vast audience. The anonymity of the internet often emboldens bullies, making it harder for victims to escape.\r\n\r\nIt\'s crucial to recognize the signs of cyberbullying. Victims may become withdrawn, anxious, or exhibit changes in behavior and academic performance. They might avoid social situations or show reluctance to use digital devices.\r\n\r\nAddressing cyberbullying requires a multi-faceted approach. Education is key—teenagers need to understand the impact of their actions and the importance of empathy online. Encourage open communication so that victims feel safe sharing their experiences. Schools and parents should collaborate to create a supportive environment where bullying is not tolerated.\r\n\r\nThere are steps teens can take to protect themselves. They should know how to block and report abusive users, keep personal information private, and think before sharing anything online. It\'s also important to support peers who might be experiencing cyberbullying and to stand against it collectively.\r\n\r\nTogether, we can create a safer online space where everyone feels respected and valued.', 'newsletter_66a66b40c5e551.39953911_OIG3.jpg', '2024-07-28 15:52:01'),
(13, 'Protecting Your Privacy Online', 'In today\'s digital age, protecting your privacy online is more important than ever. Teenagers, in particular, are at risk due to their frequent use of social media and other online platforms. Personal information such as full names, addresses, phone numbers, and even school details can be misused if not properly safeguarded.\r\n\r\nOne of the first steps to protecting your privacy is creating strong, unique passwords for all your accounts. Avoid using easily guessable information like birthdays or simple sequences. Use a mix of letters, numbers, and special characters to enhance security.\r\n\r\nPhishing attempts are another significant threat. These are fraudulent messages designed to trick you into revealing personal information. They often appear as emails or messages from seemingly legitimate sources. Always verify the sender\'s authenticity before clicking on links or providing any details.\r\n\r\nSocial media privacy settings are also crucial. Regularly review and adjust these settings to control who can see your posts and personal information. Be cautious about sharing location details and consider using private accounts to limit exposure to unknown individuals.\r\n\r\nMoreover, it\'s essential to be mindful of your digital footprint. Everything you post online can potentially be accessed and used against you. Think twice before sharing sensitive information or engaging in activities that could harm your reputation.\r\n\r\nBy following these guidelines, you can significantly reduce the risk of privacy breaches and enjoy a safer online experience.', 'newsletter_66a66bd40d26f6.48476744_OIG4.zJoUAk.Qvc.7Z.jpg', '2024-07-28 15:52:30'),
(14, 'Navigating Social Media Responsibly', 'Social media is a powerful tool for connection, but it also comes with responsibilities. For teenagers, it\'s crucial to understand the implications of their online behavior and how to navigate social media platforms responsibly.\r\n\r\nFirstly, always think before you post. Once something is online, it can be challenging to remove it entirely. Consider the potential impact of your words and images. Will they hurt someone? Could they be misinterpreted? Maintaining a positive digital footprint is essential, as future employers, colleges, and others may review your online presence.\r\n\r\nRespect and kindness should guide your interactions. Avoid engaging in negative behaviors such as trolling, spreading rumors, or participating in cyberbullying. Promote a positive environment by supporting others and standing against online harassment.\r\n\r\nUnderstanding privacy settings is another critical aspect. Adjust these settings to control who can view your posts and personal information. Be selective about accepting friend requests and followers, ensuring they are people you know and trust.\r\n\r\nAdditionally, be aware of the potential for misinformation. Social media platforms are rife with false information that can easily spread. Verify sources before sharing news or facts, and rely on reputable outlets to stay informed.\r\n\r\nLastly, take breaks when needed. Constant social media use can lead to stress, anxiety, and other mental health issues. It\'s okay to disconnect and focus on real-world activities and relationships.\r\n\r\nBy practicing these guidelines, teenagers can enjoy the benefits of social media while minimizing its risks.', 'newsletter_66a66c9aa57207.43151188_OIG3.Ur.jpg', '2024-07-28 15:57:51'),
(15, 'Recognizing and Avoiding Online Scams', 'Online scams are becoming increasingly sophisticated, and teenagers are often prime targets. Understanding the various types of scams and knowing how to avoid them is essential for maintaining online safety.\r\n\r\nPhishing scams are one of the most common types. These scams typically involve emails or messages that appear to be from legitimate sources, asking for personal information such as passwords or credit card numbers. Always verify the sender\'s authenticity and never click on suspicious links.\r\n\r\nAnother prevalent scam is the fake giveaway or contest. Scammers lure victims with promises of free products or prizes in exchange for personal details or payment. Be wary of any offer that seems too good to be true, and always verify the legitimacy of the source.\r\n\r\nSocial media scams are also rampant. Fraudsters create fake profiles or hack existing ones to send friend requests or messages. These scams often involve requests for money or personal information. Only accept friend requests from people you know and trust, and be cautious about sharing any details online.\r\n\r\nMoreover, online shopping scams are on the rise. Fake websites or sellers on legitimate platforms can deceive buyers into purchasing non-existent products. Always research the seller, read reviews, and use secure payment methods.\r\n\r\nTo protect yourself, follow these tips: never share personal information with unknown sources, verify the legitimacy of offers and requests, and educate yourself about common scam tactics. By staying informed and vigilant, you can avoid falling victim to online scams.', 'newsletter_66a66cfbf08cf5.54117992_OIG2.2Ih0XSqcqYq04zSAV.jpg', '2024-07-28 15:58:20'),
(16, ' Becoming a Responsible Digital Citizen', 'Being a responsible digital citizen means understanding your rights and responsibilities online. It involves using digital tools ethically and legally, respecting others, and contributing positively to the online community.\r\n\r\nStart by respecting intellectual property. This means not copying or sharing someone else\'s work without permission. Always give credit where it\'s due and avoid engaging in piracy or illegal downloads.\r\n\r\nUnderstanding the concept of a digital footprint is also crucial. Everything you post online leaves a trace, which can impact your future opportunities. Be mindful of the content you share and ensure it reflects positively on you.\r\n\r\nPrivacy is another important aspect of digital citizenship. Protect your personal information and respect the privacy of others. Avoid sharing details about yourself or others that could be used maliciously.\r\n\r\nEngage positively with others online. This includes refraining from cyberbullying, spreading rumors, or engaging in negative behavior. Instead, support your peers, share helpful information, and contribute to a constructive online environment.\r\n\r\nAdditionally, be aware of the legal implications of your online actions. Understand the terms of service of the platforms you use and comply with them. Avoid activities that could lead to legal consequences, such as hacking or unauthorized access to information.\r\n\r\nFinally, promote digital literacy. Stay informed about the latest online trends, security measures, and best practices. Share your knowledge with others and help create a community of responsible digital citizens.\r\n\r\nBy embracing these principles, teenagers can navigate the digital world safely and responsibly, making positive contributions to the online community.', 'newsletter_66a66da32c4010.33737078_OIG1.jpg', '2024-07-28 15:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `info`, `created_at`) VALUES
(2, 'Cyberbullying Awareness', 'This service educates teenagers about the dangers of cyberbullying and how to handle it. We provide interactive workshops and real-life scenarios to help students understand the impact of their actions online. Our goal is to foster a supportive and respectful online environment, encouraging teens to stand up against cyberbullying and support their peers.', 'Learn about the impact of cyberbullying and how to handle it through workshops and real-life scenarios.', '2024-07-06 16:14:16'),
(4, 'Privacy Protection Tips', 'Our Privacy Protection Tips service teaches teenagers how to safeguard their personal information online. Through engaging tutorials and easy-to-follow guides, we explain the importance of strong passwords, recognizing phishing attempts, and managing privacy settings on social media platforms. We aim to empower teens to take control of their digital footprint and stay safe from identity theft and online predators.', 'Empower yourself with tips on safeguarding personal information and managing privacy settings online.', '2024-07-06 16:41:55'),
(6, 'Social Media Etiquette', 'Social Media Etiquette helps teenagers navigate the complexities of online interactions. We provide guidelines on respectful communication, the importance of thinking before posting, and the potential long-term consequences of online behavior. Our resources include videos, quizzes, and interactive discussions to ensure teens understand how to maintain a positive online presence.', 'Learn the do\'s and don\'ts of online interactions to maintain a positive and respectful social media presence.', '2024-07-28 15:46:22'),
(7, 'Online Scam Awareness', 'This service educates teenagers about the various types of online scams and how to identify and avoid them. We cover topics such as phishing emails, fake websites, and fraudulent social media accounts. Through real-world examples and interactive modules, teens will learn to recognize red flags and protect themselves from falling victim to scams.', 'Stay informed about online scams and learn how to identify and avoid them to protect yourself from fraud.', '2024-07-28 15:46:44'),
(8, 'Digital Citizenship', 'Digital Citizenship promotes responsible and ethical behavior online. We focus on teaching teenagers the rights and responsibilities of being a digital citizen, including respecting intellectual property, understanding digital footprints, and fostering a positive online community. Our program includes workshops, interactive games, and resource materials to help teens become informed and conscientious digital citizens.', 'Understand your rights and responsibilities online and learn to be a responsible digital citizen through workshops and interactive games.', '2024-07-28 15:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `social_media_apps`
--

CREATE TABLE `social_media_apps` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `link` varchar(500) NOT NULL,
  `privacy_link` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_media_apps`
--

INSERT INTO `social_media_apps` (`id`, `name`, `logo`, `link`, `privacy_link`, `created_at`) VALUES
(27, 'Facebook', 'social_media_apps_66a673549ffde4.11385393_Facebook_Logo_(2019).png', 'https://www.facebook.com/', 'https://www.facebook.com/privacy/center/?entry_point=facebook_bookmarks', '2024-07-06 16:25:22'),
(28, 'Instagram', 'social_media_apps_66a6752f24de67.45557074_Untitled.jpg', 'https://www.instagram.com', 'https://www.instagram.com/accounts/privacy_setting/', '2024-07-06 16:52:00'),
(29, 'Youtube', 'social_media_apps_66a6757568e283.87004305_images.png', 'https://www.youtube.com', 'https://www.youtube.com/account_privacy', '2024-07-07 16:43:35'),
(30, 'Pinterest', 'social_media_apps_66a675c74d8f14.47868084_pinterest-icon-2048x2048-d7p0u7c5.png', 'https://www.pinterest.com/', 'https://policy.pinterest.com/en-gb/privacy-policy', '2024-07-23 18:36:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_parent_helps`
--
ALTER TABLE `how_parent_helps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media_apps`
--
ALTER TABLE `social_media_apps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `how_parent_helps`
--
ALTER TABLE `how_parent_helps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `social_media_apps`
--
ALTER TABLE `social_media_apps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
