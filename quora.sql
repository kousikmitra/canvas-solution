-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2019 at 11:27 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quora`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(255) NOT NULL,
  `question_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `answer` longtext NOT NULL,
  `upvote` int(20) NOT NULL,
  `answer_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `user_id`, `answer`, `upvote`, `answer_date`) VALUES
(1, 3, 1, 'There are tons and tons of programming (and CS) problems with multiple solutions that all get the same answer.\r\n\r\nRecursion v. loops is just a specific case.\r\n\r\nSometimes the recursive solution is simpler and easier to understand and the additional memory use doesn\'t matter in your environment (or for your data set size). Or it is all tail recursion and you know for a fact that your compiler or interpreter optimizes it away.\r\n\r\nSometimes those things don\'t apply so looping should be used.', 2, '2019-06-21 07:42:02'),
(2, 1, 2, 'I first learned Flask and then Django. If I had to do it again I would just go straight to Django. Having said that, you need to take the time to understand concepts in Django such as class based views and model forms. Django abstracts a lot of things away and if you don\'t I understand well what\'s happening in the background you\'ll struggle when your requirement doesn\'t fit the Django solution exactly.\r\nOnce you know Django well working with Flask will be quite easy. I don\'t think that holds the other way round.\r\nI haven\'t used pyramid yet.', 10, '2019-06-21 07:42:02'),
(3, 2, 2, 'Python is easy to read and write.\r\n\r\nMission critical software doesnâ€™t care about that. It cares only that the code is nearly impossible to break.\r\n\r\nThe mantra of research and development - â€œMove fast and break thingsâ€ - is no way to land the Mars Rover.', 1, '2019-06-21 07:42:02'),
(4, 2, 3, ' Because, they are ill-informed and not up to date. Python is suitable for all applications, except for the most intense numerical computing. Those developers have to compare a current version of Python 3.7. There are plenty of major websites running on Python: Dropbox, Google, more.', 4, '2019-06-21 07:42:02'),
(5, 1, 3, 'I have worked in all the three framework,\r\n\r\nFor smaller applications go for Flask\r\n\r\nFor larger applications go for Pyramid, its very flexible', 3, '2019-06-21 07:42:02'),
(6, 3, 3, 'You could always use loops instead of recursion.<br />\r\n<br />\r\nTry writing a binary tree traversal as a loop sometime. It\'s not difficult, although you may be surprised by some of the corner conditions you encounter. Then compare it to the recursive function implementation. Which one is clearer and easier to follow?<br />\r\n<br />\r\nWith the loop-based version, it turns out that you still have recursion. It\'s just data recursion. You have to build a stack manually. With code recursion, the compiler does it for you.', 11, '2019-06-21 07:42:02'),
(7, 2, 4, 'Python is a typeless programming language, which means that you are not going to find out about all kind of errors, problems, mistakes, bugs, until runtime. And then itâ€™s too late. You want to be able to scrutinize code as much as possible during coding, not at runtime when the customer is using it. This fundamentally makes Python unreliable. Plus, it doesnâ€™t do threading like other languages does, so thatâ€™s a big problem also. Python is at best, just a glue language. It is a bad idea to sit there and create large complex systems with. Pick something better. Now, people like personally â€œlikeâ€ / â€œloveâ€ Python might be up and arms protesting and having all the temper tantrums they want, but it is not going make any of these facts go away. Learning a *real* programming language, is far more constructive use of oneâ€™s time.', 2, '2019-06-21 07:42:02'),
(8, 1, 5, 'I don\'t think you should sweat over choosing a framework. Whatever you are trying to build can be made using any of them. I have used flask and django but not pyramid.<br />\r\n<br />\r\nFlask is very lightweight and leaves out tools like orm, data validation, security stuff, caching and other small/big stuff for the user to figure out. Django has a lot of functionality available out of the box and the community is strong and active.<br />\r\n<br />\r\nSometimes it totally depends on what you are building. For example, if I want to use mongodb I will prefer to use flask. I can use pymongo with flask to write functions for get, post etc. The same can be done with django too with ease but just that using mongodb with django does not let you use the majority of framework tools like model forms, orm etc. Django works best with postgres, mysql.<br />\r\n<br />\r\nAs a final note I would say you can learn any of the frameworks and first build something. After building one product you can learn another framework to get perspective. As you will build more products you will be able to judge which framework will help you more.', 3, '2019-06-21 07:42:02'),
(9, 4, 3, 'Your first programming language should be closer to the natural language. It should be quick to write, read and understand. JAVA is definitely NOT that language. I am a compute science graduate and my first contact with programming was via C++. Might be a good language, but I would not recommend it as a first language to anyone. Then I started learning JAVA. It is a mess. Most of the times, you won\'t get anywhere with it without using an IDE. It took me a while to understand the basics and I moved gradually and slowly. It does not come as intuitive at all. Half of the time you are left wondering why do I have to write all this code to get a small thing done. For a beginner it is confusing. Then I moved over to python. Life was just not the same after that.<br />\r\n<br />\r\nPython is almost like writing out your stream of thoughts. It is beautiful. It might not be as powerful and fast as Java but if you want to learn programming, it is perfect for you. Python makes programming fun. It is highly intuitive and you can easily understand and read code in Python. Which is a must for beginners. <br />\r\n<br />\r\nMoreover, it also teaches the incredibly useful art of indentation and making your code readable which you might find very useful when switching over to other languages. It is already being taught as the first language in many technical institutes including the MIT and for a very good reason. It helps people focus on the logic and just getting the things done rather than thinking of complex code for that.<br />\r\n<br />\r\nBelieve me, whenever I have a logical problem to be solved or a quick challenge to program, I almost always use Python,(unless the challenge is language specific).<br />\r\nBecause I would already be done with the challenge and moved on with my life by the time you define that main function/method/whatever in Java.<br />\r\n<br />\r\n A lot of people have already mentioned that Python requires no setup. Most of the times(if it is not a big project), you won\'t even need to use an IDE for development and a simple text editor like Notepad++ or Sublime Text would do. I myself started using Pycharm (Python IDE) only after I started using python at work. I had made numerous personal projects in Python using Sublime Text.<br />\r\n<br />\r\nAs a computer science graduate, I would never recommend anyone to start learn programming with JAVA. It is a useful and vast language, but it is definitely not a language which would make things a lot clearer for you. On the contrary, Python would make you understand a lot of things quickly and easily.<br />\r\nIt is weird that so many people with good technical backgrounds are writing that Java should be learnt first. I don\' t think many of those people had Python as their first language or their opinions would have been different.', 2, '2019-06-21 07:42:02'),
(10, 7, 12, 'As Evan You, Vue.js creator himself, says in the State of Vue.js report, the core team plan to explore and implement many new ideas in the coming years. They come from feature requests, inspirations from the broader web dev community, and real-life use cases.<br />\r\n<br />\r\nThere are new JavaScript language features (e.g. ES2015 Proxy, Promises) that may simplify or improve the current API. Vue.js will start taking advantage of these features in a parallel branch which requires latest evergreen browsers.<br />\r\n<br />\r\nThe core team is also keeping an eye on emerging standards such as ES class syntax improvements (class elds and decorators), Web Components (custom elements & HTML modules) and Web Assembly.', 2, '2019-06-21 07:42:02'),
(11, 7, 8, 'Donâ€™t try to guess what the next big fad is going to be. Rather, pick a technology you like and become really, really good at it. It doesnâ€™t matter if itâ€™s Vue.js, React, Angular or jQuery. If you are really, really good, you will easily land a job that you like.', 2, '2019-06-21 07:42:02'),
(12, 8, 10, 'Iâ€™ll tell you about something that exists right now that no group of the smartest people in the world can figure out.<br />\r\n<br />\r\nNeural network algorithms are a type of artificial intelligence used every day. Google uses advanced algorithms to give you top-notch search results. YouTube recommends videos to you using algorithms. Self-driving cars utilize insanely complex neural networks to recognize if a human is in their path or not, so they can stop in time. Quora even uses them to suggest the 10 most interesting questions to you in your daily Digest. Neural networks are all over, and theyâ€™re important.<br />\r\n<br />\r\nHowever, nobody knows how they work.<br />\r\n<br />\r\nImagine a complex neural network that a programmer feeds a billion pictures of humans into, then a billion pictures of different cars into it (with the programmer explaining whether each picture is an image of a human or a car).<br />\r\n<br />\r\nIf this example sounds familiar, it probably is. Has Google recently asked you to identify pictures of road signs, cars, or streets for its reCAPTCHA, to make sure youâ€™re not a bot? If so, youâ€™ve become the programmer telling the algorithm the answer to the image. Coincidentally, Google is developing its own self-driving car right now, and youâ€™ve become free labor for them to help train their algorithms. Fun, huh?<br />\r\n<br />\r\nAfter feeding it billions of pictures, the algorithm gets pretty good at predicting whether any additional image is a car or a human. But, we have no idea what happens to the data after it enters the â€œblack boxâ€.', 1, '2019-06-21 07:42:02'),
(13, 11, 9, 'I first studied CS during the bubble of the early 90s. Jobs were aplenty.<br />\r\n<br />\r\nThe .COM boom popped, and suddenly there were far more graduates than jobs. Demand for IT quickly recovered and jobs soon outstripped supply again.<br />\r\n<br />\r\nAs for nowâ€¦ I donâ€™t know, the world is a bit different. Most people entering the workforce now have grown up with ubiquitous computers their entire life. The marketers, sales guys, book-keepers and business executives have all had a computer at their desk from the moment they graduated.<br />\r\n<br />\r\nWill there still be a demand for advanced skills in a world where everyone knows the basics? I would have guessed that yes, there will. However the kinds of demands placed on an expert by someone familiar with technology are very different to the kinds of demands placed by someone who doesnâ€™t know what theyâ€™re doing. I think things are going to change quite a lot.', 0, '2019-06-21 07:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `user_id`, `question`, `category`, `post_date`) VALUES
(1, 1, 'Python Web Frameworks:Should I go for Django, Pyramid, or Flask for backend?', 'Computer Science', '2019-06-21 07:41:18'),
(2, 1, 'Why do most developers say that python should not be used to build mission-critical software systems?', 'Computer Science', '2019-06-21 07:41:18'),
(3, 2, 'Why should we use recursion in programming languages if we could just use for and while loops instead?', 'Computer Science', '2019-06-21 07:41:18'),
(4, 2, 'Between Java and Python, which one is better to learn first and why?', 'Computer Science', '2019-06-21 07:41:18'),
(5, 6, 'Where can I get the best travel deals online?\r\n', 'Others', '2019-06-21 07:41:18'),
(6, 3, 'What is the difference between Vue.js and Angular.js?', 'Computer Science', '2019-06-21 07:41:18'),
(7, 3, 'What\'s the future of Vue.js?', 'Computer Science', '2019-06-21 07:41:18'),
(8, 8, 'Can technology become too complex that the civilization that created it can no longer understand it? How can humans delay or prevent such an outcome?', 'Computer Science', '2019-06-21 07:41:18'),
(9, 12, 'What happens when you take the square root of any number an infinite number of times?', 'Mathematics', '2019-06-21 07:41:18'),
(10, 12, 'How was the mathematical constant e calculated? Why is it important?', 'Mathematics', '2019-06-21 07:41:18'),
(11, 11, 'With so much STEM awareness going on especially with technology, will there be a job market saturation for IT professionals?', 'Engineering And Technology', '2019-06-21 07:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `upvote`
--

CREATE TABLE `upvote` (
  `upvote_id` int(255) NOT NULL,
  `answer_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `upvote_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvote`
--

INSERT INTO `upvote` (`upvote_id`, `answer_id`, `user_id`, `upvote_date`) VALUES
(1, 5, 3, '2019-06-21 07:40:53'),
(2, 4, 3, '2019-06-21 07:40:53'),
(3, 6, 3, '2019-06-21 07:40:53'),
(4, 2, 4, '2019-06-21 07:40:53'),
(5, 4, 4, '2019-06-21 07:40:53'),
(6, 7, 4, '2019-06-21 07:40:53'),
(7, 6, 4, '2019-06-21 07:40:53'),
(8, 2, 5, '2019-06-21 07:40:53'),
(9, 8, 5, '2019-06-21 07:40:53'),
(10, 4, 5, '2019-06-21 07:40:53'),
(11, 6, 5, '2019-06-21 07:40:53'),
(12, 1, 1, '2019-06-21 07:40:53'),
(13, 6, 1, '2019-06-21 07:40:53'),
(14, 2, 1, '2019-06-21 07:40:53'),
(15, 8, 1, '2019-06-21 07:40:53'),
(16, 7, 1, '2019-06-21 07:40:53'),
(17, 2, 6, '2019-06-21 07:40:53'),
(18, 8, 6, '2019-06-21 07:40:53'),
(19, 5, 6, '2019-06-21 07:40:53'),
(20, 4, 6, '2019-06-21 07:40:53'),
(21, 3, 6, '2019-06-21 07:40:53'),
(22, 6, 6, '2019-06-21 07:40:53'),
(23, 2, 7, '2019-06-21 07:40:53'),
(24, 6, 7, '2019-06-21 07:40:53'),
(25, 2, 8, '2019-06-21 07:40:53'),
(26, 5, 8, '2019-06-21 07:40:53'),
(27, 6, 8, '2019-06-21 07:40:53'),
(28, 1, 8, '2019-06-21 07:40:53'),
(29, 2, 9, '2019-06-21 07:40:53'),
(30, 6, 9, '2019-06-21 07:40:53'),
(31, 2, 10, '2019-06-21 07:40:53'),
(32, 6, 10, '2019-06-21 07:40:53'),
(33, 2, 11, '2019-06-21 07:40:53'),
(34, 6, 11, '2019-06-21 07:40:53'),
(35, 2, 12, '2019-06-21 07:40:53'),
(36, 6, 12, '2019-06-21 07:40:53'),
(37, 9, 3, '2019-06-21 07:40:53'),
(38, 10, 12, '2019-06-21 07:40:53'),
(39, 10, 8, '2019-06-21 07:40:53'),
(40, 11, 8, '2019-06-21 07:40:53'),
(41, 11, 10, '2019-06-21 07:40:53'),
(42, 9, 10, '2019-06-21 07:40:53'),
(43, 12, 10, '2019-06-21 07:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `photo` text DEFAULT './profile_images/default.png',
  `date_reg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `contact`, `pincode`, `city`, `gender`, `photo`, `date_reg`) VALUES
(1, 'test1', 'test1@gmail.com', '604b6646b9d6a842cfe4375656ea53c4', '1111111111', '742101', 'Berhampore', 'Male', './profile_images/default.png', '2019-06-21 07:40:27'),
(2, 'test2', 'test2@gmail.com', '7dd185aaa61b3eef12bf5020cbe463e6', '2222222222', '742101', 'Berhampore', 'Male', './profile_images/default.png', '2019-06-21 07:40:27'),
(3, 'test3', 'test3@gmail.com', 'ce2d84d5b91afe29f27fd6773ad6a0cd', '3333333333', '742101', 'Berhampore', 'Female', './profile_images/default.png', '2019-06-21 07:40:27'),
(4, 'test4', 'test4@gmail.com', '78d19bf9135066a2ee9a9b594f0ed341', '4444444444', '742101', 'Berhampore', 'Male', './profile_images/default.png', '2019-06-21 07:40:27'),
(5, 'test5', 'test5@gmail.com', 'ca5f959fbcb67d2bcab96962508e58cc', '5555555555', '742101', 'Berhampore', 'Female', './profile_images/default.png', '2019-06-21 07:40:27'),
(6, 'test6', 'test6@gmail.com', '98736d219d8cf97ab8a74018bbbd590e', '6666666666', '742101', 'Berhampore', 'Male', './profile_images/default.png', '2019-06-21 07:40:27'),
(7, 'test7', 'test7@gmail.com', '6e9c7891fd188ad17a854efcd91b5d08', '7777777777', '742101', 'Berhampore', 'Female', './profile_images/default.png', '2019-06-21 07:40:27'),
(8, 'test8', 'test8@gmail.com', '82c5003abc5db79bd23e064b9914329a', '8888888888', '742101', 'Berhampore', 'Female', './profile_images/default.png', '2019-06-21 07:40:27'),
(9, 'test9', 'test9@gmail.com', '033abd5b72dbba6ce8ead4a06be170a0', '9999999999', '742101', 'Berhampore', 'Male', './profile_images/default.png', '2019-06-21 07:40:27'),
(10, 'test10', 'test10@gmail.com', '54d81c310e02f401dde3a5856de2e097', '1010101010', '742101', 'Berhampore', 'Male', './profile_images/default.png', '2019-06-21 07:40:27'),
(11, 'test11', 'test11@gmail.com', 'e55dd114dc5e2fcfda4bb7f971892c4f', '1100110011', '742101', 'Berhampore', 'Male', './profile_images/default.png', '2019-06-21 07:40:27'),
(12, 'test12', 'test12@gmail.com', '69bb196fd3c175465007a7fcee5a53ac', '1212121212', '742101', 'Berhampore', 'Male', './profile_images/default.png', '2019-06-21 07:40:27'),
(13, 'KOUSIK MITRA', 'kousikmitra12@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '8145169168', '711303', 'Bagnan', 'Male', './profile_images/default.png', '2019-06-21 07:40:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `upvote`
--
ALTER TABLE `upvote`
  ADD PRIMARY KEY (`upvote_id`),
  ADD KEY `answer_id` (`answer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `upvote`
--
ALTER TABLE `upvote`
  MODIFY `upvote_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`),
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `upvote`
--
ALTER TABLE `upvote`
  ADD CONSTRAINT `upvote_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`answer_id`),
  ADD CONSTRAINT `upvote_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
