-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 03:00 AM
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
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(3) NOT NULL,
  `cat_id` int(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `tag` text NOT NULL,
  `admin` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `rate` tinyint(2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `cat_id`, `title`, `content`, `tag`, `admin`, `status`, `rate`, `image`, `date`) VALUES
(53, 23, 'A 20-year-experienced CTO’s Advice “Don’t Be a Humble Developer', 'I was scrolling reels on Instagram. Then a nice and funny video came to my feed. In that reel, An spiritual coach(guru) called Sadhguru made a funny but thoughtful joke. Before talking further, I need to say… I am not a follower or fan of his, but I like some of his philosophies.\r\n\r\nLet’s get back to the reel. Sadhguru and an Indian actor talking about God, depression, and why people get depressed. Sadhguru made a joke at the end of the reel that If anyone feels lonely, then they are bad company. 😆 (He meant if they were good company, they might not feel lonely in the first place. Rather, They would enjoy their “alone” time.)\r\n\r\nWhy am I telling you this? Because I realize one very important side of life. Life is never fair. But we make it harder and more complex by doing nothing about it. We somehow daydream and think that the fairness of life will give us what we really deserve.\r\n\r\nAnd The last line was exactly told by Mr. Andrew(a fake name, I ask every guest-interviewee if I can reveal their identity in my article, but as it’s their decision, I respect their decision). He has been in the software development industry for over 20 years. He is now a CTO in his company for 5 years.\r\n\r\nWe talked about many things. But I will focus only on one very important topic that most good developers suffer in their lifetime at least once. That is… Good developers are often so humble that they don’t even know how to take credit for their work. They think their work will talk for themselves.\r\n\r\nHe talked brutally about “this” ignorance of good developers.\r\n\r\nWhy some great devs don’t get what they deserve\r\nWe discussed why some great developers don’t get their deserved recognition or financial benefits, and sometimes, some mediocre devs achieve more than the good ones.\r\n\r\nHe first replied with just one line…\r\n\r\nLife is not fair.', 'softwaredevelopment', 'admin', 1, 0, '320444.png', '2023-11-23 18:47:34'),
(54, 26, 'Is Programming Language a New Kind of Mother Tongue?', 'A Journey Through Language Evolution\r\nLanguages, like rivers, are ever-flowing and ever-changing. They evolve, shaping and reshaping our world. Think about it — from the ancient paintings in caves to the emojis in our texts today, isn’t it fascinating? Just like these paintings told stories without words, our modern digital language, packed with emojis, GIFs, and abbreviations, does the same. But there’s more to this evolution.\r\n\r\nLong ago, our ancestors communicated with simple sounds and gestures. Gradually, these sounds became words, and the gestures turned into written symbols. Imagine a world where every tribe or group had its own way of talking. It was like having a secret code with your friends that only you understood. That’s how diverse and unique languages were!\r\n\r\nFast forward to today, and the digital age has brought a new player into the language game — the programming language. It’s not just another set of words; it’s a whole new way of thinking and communicating, but this time, it’s with machines. And just like learning French or Spanish, learning Python or JavaScript opens up a new world of opportunities and understanding.\r\n\r\nSo here we are, in a world where our ‘mother tongues’ have expanded beyond just the languages we speak. They now include the languages we code in. It’s a journey from cave paintings to coding, where every step has been about finding new ways to express, share, and connect. Isn’t it exciting to think about what’s next?', '#softwaredevelopment #programming', 'admin', 1, 0, '88375.png', '2023-11-24 00:27:41'),
(55, 26, '10 Functional Programming Tips Every C# Developer Should Know', 'I remember the first time I stumbled upon the term “functional programming” while coding in C#. It sounded intimidating, but then I gave it a shot, and let me tell you, it was something new.\r\n\r\nWe’re going to walk through 10 functional programming tips that have seriously helped me writing C# code. These aren’t just fancy tricks; they’re practical, hands-on tweaks that make code cleaner, more efficient, and honestly, more fun to write.\r\n\r\nLet’s dive in!\r\n\r\nImmutability\r\nImmutability is a core concept in functional programming (FP) and is crucial for writing robust and maintainable C# code. In FP, immutability is about creating new instances of data with the desired changes rather than updating data in place.\r\n\r\nThis approach ensures that functions are pure, meaning their output is determined solely by their input, without any side effects.', '#programming', 'admin', 1, 0, '590344.png', '2023-11-24 00:29:17'),
(56, 26, 'Exploring Rust: A Paradigm-Shifting Programming Language', 'Inthe ever-evolving realm of programming languages, one name has been steadily rising to the forefront, promising a new paradigm in system-level programming. Rust, with its focus on safety, performance, and a robust type system, has captured the attention of both seasoned developers and newcomers to the coding world. In this article, we embark on a journey to explore Rust and delve into a comparative analysis, juxtaposing it with other programming languages to understand what makes it stand out.\r\n\r\nThe Rise of Rust\r\nRust is a systems programming language that first saw the light of day in 2010, but it has been steadily gaining traction over the years. Developed by Mozilla, Rust was designed to tackle some of the most pressing challenges in the world of systems programming: memory safety and concurrency. Its primary goals were to provide a high level of control over system resources without compromising safety.\r\n\r\nRust is Actively Evolving Language\r\nRust is a living language with an active and responsive community. It continues to evolve through regular updates and contributions from developers worldwide. This dynamic environment ensures that Rust remains at the forefront of modern programming practices.\r\n\r\nRust’s unique combination of memory safety, performance, and modern language features positions it as a powerful tool for a wide range of application domains, from systems programming and embedded development to web services and game development. As the Rust ecosystem grows and matures, it becomes increasingly clear that Rust is here to stay, offering a compelling choice for those who value both safety and performance in their projects.\r\n\r\nComparing Rust with the Titans\r\nTo truly understand what makes Rust special, let’s compare it with two giants in the programming world: C++ and C.\r\n\r\nRust vs. C++\r\nC++ has long been the standard for system-level programming. It offers high performance and low-level control over…', '#programming', 'admin', 1, 0, '224134.jpeg', '2023-11-24 00:30:55'),
(57, 25, 'How Learning the Business Side of Writing Will Save You Time and Money', 'I recently wrote an article about how to do an affordable print run of your book project. Somebody asked, “Yeah, but how are you going to sell them? Are you going to set up a table at the grocery store?”\r\n\r\nThat’s a very good question, and it made me realize that too many writers don’t spend enough time thinking about how basic business principles apply to writing.\r\n\r\nI understand that it’s frustrating to have doors get slammed in your face over and over and over. I’m just as inclined as any other writer to complain about the publishing industry. That being said, the publishing industry behaves the way it does because they’re the ones who have lost hundreds of thousands of dollars on bad book projects.\r\n\r\nOne thing that all writers have to recognize is that the “big 5” model is just one business model for publishing. It only works for a certain kind of project. Other projects are equally valid and also have the potential for profit on a different scale. A “side-hustle” book project that makes you $5,000 to $10,000 is totally worth your time.\r\n\r\nIt’s vital for anyone with writing aspirations to acquire some experience in sales. I would contend that sales experience is just as important for writers as their understanding of grammar and their ability to tell a story. A sales pitch is storytelling! If you don’t have a clear plan for creating interest in your work, and for managing the associated costs, then your project is likely to fail.\r\n\r\nWriters need a business plan\r\nYou need to start thinking about writing in terms of production cost, sales price, and profit margin. The objective is to keep your production costs as low as possible, and sell your books for the maximum amount people are willing to pay.\r\n\r\nThe factor that new authors have to be realistic about is that consumers are unlikely to pay a premium price for a book by an unknown writer. Again, whenever you start a business, you expect to lose money in the first few years as you gain a reputation…', '#business', 'admin', 1, 0, '676603.png', '2023-11-24 00:32:13'),
(58, 27, 'Unlock Data Science Potential with Your Laptop', 'Asa data scientist, you know how important it is to have a reliable and efficient laptop that can handle all the tasks and tools you need for your projects.\r\n\r\nWhether you are working with large datasets, complex models, or BI visualizations, you want to avoid any technical issues or performance bottlenecks that could compromise your results. That is why I believe setting up your laptop for success is a crucial step in your data science journey.\r\n\r\nNote. This article is mostly for Windows users. Though, some of this article may be of interest to Linux and Mac users.\r\n\r\nBy following our steps and tips, you will be able to transform your laptop into a powerful and productive DS machine that can handle any task or challenge that you may face.\r\n\r\nNow, let’s get started and set you up for success!\r\n\r\nMost important — What you can’t live without\r\n1. Install Anaconda Prompt\r\n\r\nSurprisingly, not every Data Scientist is using Anaconda. Don’t be one of them.\r\n\r\nIt is essential to create virtual environments and not break your operating system when installing libraries. For every project, create a conda environment and install relevant libraries within this environment only.\r\n\r\nNote. Make sure you have pip installed in your conda environment. It often happens that when using pip install on a new conda environment, you are using your pip from the default conda environment, hence it is not using the new one.\r\n\r\nIf you cannot use conda from the terminal, and have the following issue, you essentially need to add Anaconda to your path by updating your environment variables.\r\n\r\nMore precisely, to add Anaconda to your environment variables, you can follow the steps given on stackoverflow. Below, we can see my edits based on where Anaconda was installed on my personal machine.', '#data Science', 'admin', 1, 0, '222330.png', '2023-11-24 00:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(2) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `create_time`, `admin_name`) VALUES
(23, 'Software Development', 1, '2023-11-23 18:34:09', 'admin'),
(24, 'linux', 1, '2023-11-23 18:42:42', 'admin'),
(25, 'Business', 1, '2023-11-23 19:35:24', 'admin'),
(26, 'Programming', 1, '2023-11-23 19:42:28', 'admin'),
(27, 'data science', 1, '2023-11-24 00:32:44', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(2) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `footer` varchar(255) NOT NULL,
  `postdisplay` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `logo`, `title`, `footer`, `postdisplay`) VALUES
(1, 'logo.png', 'Blog website using PHP OOP', '2020 © Developed by : ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `role` tinyint(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `image`, `bio`, `role`, `date`) VALUES
(5, 'Sabbir Hasan', ' Omor', 'sabbir', 'sabbir@gmail.com', '123456', '447574.jpg', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without                                                                                                                                                                                                                                                                                                                                                                                                                                        ', 2, '2020-08-12 09:15:51'),
(6, 'Anisur Rahman', 'Shahin', 'admin', 'admin@tech.com', '123456', 'shahin-formal.png', 'Hello.I\'m Shahin.I\'m a tech enthusiast guy. Personally I’m Optimistic and always in hurry kinda person.I\'m a freelance web devoloper. I study CSE in South-East university.', 1, '2020-08-14 14:36:53'),
(8, 'Asik Newaz', 'Sabbir', 'asik', 'asik@gmail.com', '123', '519127.jpg', 'The value of the cookie is automatically URLencoded when sending the cookie, and automatically decoded The value of the cookie is automatically URLencoded when sending the cookie, and automatically decoded                                                     ', 2, '2020-08-15 14:24:45'),
(9, 'Abdullah', 'Al Jisan', 'jisan', 'jisan@gmail.com', '123', '242956.jpg', '                                     hi i am jisan               ', 2, '2020-08-15 15:07:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
