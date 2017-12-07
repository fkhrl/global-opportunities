-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2017 at 09:40 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `global_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE IF NOT EXISTS `about_us` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `photo` text,
  `details` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `photo`, `details`, `date`, `status`) VALUES
(1, 'photo_upload__1507485331_1507485331.png', '<p style="font-family: Roboto, sans-serif; line-height: 24px;"><strong style=""><span lang="EN-GB" style="font-size: 14pt; line-height: 19.9733px; font-family: Verdana, sans-serif;">Citi International Trade Finance</span></strong></p><p style="line-height: 24px;"><strong style=""><span lang="EN-GB" style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><font face="Verdana, sans-serif">We are a specialized finance company based in United Kingdom, providing purchase order financing, letters of credit, receivable financing and creative short-term transaction&nbsp;financing for importers, exporters, and other short-term borrowers.</font></span></strong></p><p style="font-family: Roboto, sans-serif; line-height: 24px;"><strong><span lang="EN-GB" style="font-family: Verdana, sans-serif;">Citi International Trade Finance&nbsp;<span style="background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;">is managed by trade finance and merchant banking professionals with extensive backgrounds from major U.S financial institutions including Citigroup and GE Capital as well as from major UK financial institutions including professionals from manufacturing and trading. Together we bring our combined expertise to address the funding needs of our clients.</span></span></strong></p><p style="margin: 5pt 0in; font-family: Roboto, sans-serif; line-height: normal;"><strong><span lang="EN-GB" style="font-family: Verdana, sans-serif;">We have offices in the following counties</span></strong></p><p style="margin: 14pt 0in; font-family: Roboto, sans-serif; line-height: normal;"><strong><span lang="EN-GB" style="font-family: Verdana, sans-serif;">Europe</span></strong></p><ul style=""><li><span lang="EN-GB" style="font-size: 10pt; font-family: Arial, sans-serif;"><span style="font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang="EN-GB"><strong style=""><span style="font-family: Verdana, sans-serif;">United Kingdom Head Office and Marketing Office</span></strong></span><strong></strong></li></ul><p style="margin-bottom: 14pt; font-family: Roboto, sans-serif; line-height: normal;"><strong><span lang="EN-GB" style="font-family: Verdana, sans-serif;">Americas</span></strong></p><ul style=""><li><span lang="EN-GB" style="font-size: 10pt; font-family: Arial, sans-serif;"><span style="font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang="EN-GB"><strong style=""><span style="font-family: Verdana, sans-serif;">Brazil</span></strong></span><strong></strong></li><li><span lang="EN-GB" style="font-size: 10pt; font-family: Arial, sans-serif;"><span style="font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang="EN-GB"><strong style=""><span style="font-family: Verdana, sans-serif;">USA</span></strong></span><strong></strong></li></ul><p style="margin-bottom: 14pt; font-family: Roboto, sans-serif; line-height: normal;"><strong><span lang="EN-GB" style="font-family: Verdana, sans-serif;"><br>Asia</span></strong></p><ul style=""><li style=""><span lang="EN-GB" style="font-size: 10pt; font-family: Arial, sans-serif;">&nbsp;&nbsp;&nbsp;</span><strong style=""><span lang="EN-GB" style="font-family: Verdana, sans-serif;">Bangladesh</span></strong></li></ul>', '2017-10-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `authorize_user`
--

CREATE TABLE IF NOT EXISTS `authorize_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `pc_name` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `authorize_user`
--

INSERT INTO `authorize_user` (`id`, `pc_name`, `date`, `status`) VALUES
(1, 'SUL-LABPC-11', '2015-09-15', 1),
(2, 'fahad-PC', NULL, NULL),
(4, 'Khairul-PC', NULL, NULL),
(5, 'SUL-Soft-PC', '2015-11-25', 1),
(7, 'USER-PC-Monira', '2015-12-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `date`, `status`) VALUES
(1, 'About Us', '2017-10-08', 1),
(2, 'Services', '2017-10-08', 1),
(3, 'Faq', '2017-10-08', 1),
(4, 'Contact', '2017-10-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cover_photo`
--

CREATE TABLE IF NOT EXISTS `cover_photo` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `category_id` int(20) DEFAULT NULL,
  `subcategory_id` int(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `photo` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cover_photo`
--

INSERT INTO `cover_photo` (`id`, `category_id`, `subcategory_id`, `title`, `photo`, `date`, `status`) VALUES
(1, 1, 0, 'About Us', 'photo_upload__1507661610_1507661610.jpg', '2017-10-10', 1),
(2, 3, 0, 'Faq', 'photo_upload__1507661635_1507661635.jpg', '2017-10-10', 1),
(3, 4, 0, 'Contact Us', 'photo_upload__1507661650_1507661650.jpg', '2017-10-10', 1),
(4, 2, 1, 'Applications & Tenors', 'photo_upload__1507661735_1507661735.jpg', '2017-10-10', 1),
(5, 2, 2, 'What is Discountable?', 'photo_upload__1507661770_1507661770.jpg', '2017-10-10', 1),
(6, 2, 3, 'When To Contact Us', 'photo_upload__1507661792_1507661792.jpg', '2017-10-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `custom_table_field`
--

CREATE TABLE IF NOT EXISTS `custom_table_field` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `table_id` int(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `custom_table_field`
--

INSERT INTO `custom_table_field` (`id`, `table_id`, `name`, `date`, `status`) VALUES
(1, 1, 'site_name', '2017-10-08', 1),
(2, 1, 'photo', '2017-10-08', 1),
(3, 1, 'address', '2017-10-08', 1),
(4, 1, 'phone_number', '2017-10-08', 1),
(5, 1, 'email', '2017-10-08', 1),
(6, 1, 'facebook_link', '2017-10-08', 1),
(7, 1, 'twitter_link', '2017-10-08', 1),
(8, 1, 'google_plus_link', '2017-10-08', 1),
(9, 1, 'youtube_link', '2017-10-08', 1),
(10, 2, 'photo', '2017-10-08', 1),
(11, 3, 'name', '2017-10-08', 1),
(12, 4, 'category_name', '2017-10-08', 1),
(13, 4, 'name', '2017-10-08', 1),
(14, 5, 'title', '2017-10-08', 1),
(15, 5, 'sub_title', '2017-10-08', 1),
(16, 5, 'short_details', '2017-10-08', 1),
(17, 6, 'name', '2017-10-08', 1),
(18, 7, 'name', '2017-10-08', 1),
(19, 7, 'icon_id', '2017-10-08', 1),
(20, 7, 'details', '2017-10-08', 1),
(21, 8, 'name', '2017-10-08', 1),
(22, 9, 'name', '2017-10-08', 1),
(23, 9, 'details', '2017-10-08', 1),
(24, 10, 'photo', '2017-10-08', 1),
(25, 10, 'details', '2017-10-08', 1),
(29, 12, 'name', '2017-10-08', 1),
(30, 12, 'email', '2017-10-08', 1),
(31, 12, 'phone', '2017-10-08', 1),
(32, 12, 'requirements', '2017-10-08', 1),
(35, 14, 'footer_logo', '2017-10-08', 1),
(36, 14, 'details', '2017-10-08', 1),
(37, 14, 'barcode', '2017-10-08', 1),
(38, 15, 'category_id', '2017-10-08', 1),
(39, 15, 'subcategory_id', '2017-10-08', 1),
(40, 15, 'title', '2017-10-08', 1),
(41, 15, 'photo', '2017-10-08', 1),
(45, 17, 'category_id', '2017-10-10', 1),
(46, 17, 'subcategory_id', '2017-10-10', 1),
(47, 17, 'photo', '2017-10-10', 1),
(48, 17, 'details', '2017-10-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `blood_group` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `contactnumber` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `gender`, `blood_group`, `dob`, `contactnumber`, `address`, `username`, `password`, `date`, `status`) VALUES
(3, 'CMS Admin', '1', '1', '2015-12-09', '01927608261', 'asdS', 'cms', '7e8a32176a113a7ba3d2b1f85834e828', '2015-09-13', 1),
(4, 'Shanto', '1', '1', '1988-08-16', '13231312', 'wesaqweqw', 'shanto', '7e8a32176a113a7ba3d2b1f85834e828', '2015-11-25', 1),
(5, 'Sirajum Munira', '1', '1', '1986-08-29', '01923318408', 'adasdsad', 'munira', '7e8a32176a113a7ba3d2b1f85834e828', '2015-12-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `requirements` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `email`, `phone`, `requirements`, `date`, `status`) VALUES
(1, 'Our CEO', 'shaiful1408@gmail.com', '+8801860748020', 'sadasd', '2017-10-10', 1),
(2, 'CHEF RECOMMENDED', 'shaiful1408@gmail.com', '0175563005', 's,daskjndf', '2017-10-10', 1),
(3, 'Free Home Delivery', 'shaiful1408@gmail.com', '0175563005', 'sdsadsa', '2017-10-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `details` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `name`, `details`, `date`, `status`) VALUES
(1, 'Q1. How can we be certain that financing is in place before we sign the contract?', '<p><span style="font-family: monospace; font-size: medium; white-space: pre-wrap;">A1. If you are reasonably confident of being awarded the contract, and you want to fix the discounting costs, Citi International Trade Finance may be in a position to grant you an option. The option is a commitment given for a determined period of time. It fixes all the discounting conditions and allows you to sign the commercial contract with the certainty that you will be able to sell the debt instruments, without recourse, to Citi International Trade Finance , after you have completed delivery of the goods or service. If the contract is awarded to you before the expiration of the option, the option automatically turns into a firm forfaiting commitment.</span><br></p>', '2017-10-08', 1),
(2, 'Q2. Why does my client need to obtain a bank guarantee, why don''t they just borrow the money    locally?', '<p><span style="font-family: monospace; font-size: medium; white-space: pre-wrap;">A2. In many emerging markets, companies and banks alike may have significant difficulty in borrowing medium term fixed rate money. As a result, even if the Importer could obtain a fixed rate medium term loan, the interest rate is likely to be prohibitively high. The local bank, because of its relationship with the Importer plays a key role by issuing a guarantee, thereby allowing its customer to access foreign sources of funding.</span><br></p>', '2017-10-08', 1),
(3, 'Q4. Our type of business is such that we cannot afford to wait two or three months for a quotation on a specific transaction! How long does it generally take Citi International Trade Finance to indicate interest in a transaction?', '<p><span style="font-family: monospace; font-size: medium; white-space: pre-wrap;">A4. Citi International Trade Finance understands that your commercial negotiations are often very fast moving, and as such, we can usually provide an immediate indication for markets where we are active.</span><span style="font-family: monospace; font-size: medium; white-space: pre-wrap;">Currently, Citi International Trade Finance has the ability to provide financing in over 100 countries world-wide. However, because market conditions can be highly volatile, the list of countries where we are active will change in accordance with economic and political developments world-wide. </span><span style="font-family: monospace; font-size: medium; white-space: pre-wrap;">To keep our clients aware of changes in market conditions, regularly issues an up to date country list a latest copy of which can be found by clicking here.</span><br></p>', '2017-10-08', 1),
(4, 'Q5. How much down payment does the Importer need to make for Citi International Trade Finance to finance the contract?', 'No down payment is needed as Citi International Trade Finance can refinance up to 100% of the value of the commercial contract<br>', '2017-10-08', 1),
(5, 'Q6. A significant portion of our finished product is manufactured in other countries. Does this affect the ability of Citi International Trade Finance to finance the transaction?', '<p>No. As long as the transaction does not violate any government export or import regulations, 100% of the transaction could qualify for financing. In most countries, local costs may also be financed.<br></p>', '2017-10-08', 1),
(6, 'Q7. What happens if the Importer does not pay its debt to Citi International Trade Finance at maturity?', '<p>Citi International Trade Finance purchases the debt without recourse, and as such, you are not responsible for repayment at maturity.<br></p>', '2017-10-08', 1),
(7, 'Q8. Our company has a relatively long manufacturing period. How long prior to the availability of the documents can Citi International Trade Finance commit to purchase the receivables? Is our company covered for fluctuations in interest rates during this', '<p><span style="font-family: monospace; font-size: medium; white-space: pre-wrap;">A8. Depending on the specific transaction, Citi International Trade Finance may be in a position to commit to purchase receivables up to 18 months prior to delivery. If interest rate risk is of concern to your company, Citi International Trade Finance may be able to commit to discount the debt at a fixed rate, which will protect you from adverse movements in interest rates during the manufacturing and delivery periods.</span><br></p>', '2017-10-08', 1),
(8, 'Q9. When do we get paid?', '<p>It is in everyone''s interest to accelerate the payment as much as possible. Clearly Citi International Trade Finance has to go through a checking process, but with your assistance and the cooperation of your client and their bank, in most cases payments are made within a couple of weeks of presentation of complete documentation.<br></p>', '2017-10-08', 1),
(9, 'Q10. Our sales force has informed us that our competitors are offering medium term financing at below market rates. How is this possible?', '<p>They are probably using forfaiting already. Unlike most government supported credits, forfaiting allows suppliers to subsidize the interest rate charged to their Buyers and therefore it is highly likely that your competitor is already using forfaiting to support the supplier credit they are offering the Buyer.<br></p>', '2017-10-08', 1),
(10, 'Q11. What are the origins of Forfaiting?', '<p>A11. The origins of forfaiting date back to the middle-ages, but the technique evolved into its modern state in the 1960''s, as the centrally planned economies of Eastern Europe needed to finance their imports of capital equipment from Western Europe. In those days, forfaiting was seen as a highly specialized technique whose main purpose was fixed rate medium term financing of cross border sales of capital equipment without recourse to the Exporter<br></p>', '2017-10-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq_title`
--

CREATE TABLE IF NOT EXISTS `faq_title` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `faq_title`
--

INSERT INTO `faq_title` (`id`, `name`, `date`, `status`) VALUES
(1, 'Frequently Asked Questions:', '2017-10-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `footer_info`
--

CREATE TABLE IF NOT EXISTS `footer_info` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `footer_logo` text,
  `details` text,
  `barcode` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `footer_info`
--

INSERT INTO `footer_info` (`id`, `footer_logo`, `details`, `barcode`, `date`, `status`) VALUES
(1, 'footer_logo_upload__1507483471_1507483471.jpg', '<p><font face="Roboto, sans-serif">Citi International Trade Finance main activities are the purchasing of bills of exchange, promissory notes, deferred payment letters of credit and transferable financial loans from exporters or their banks.</font><br></p>', 'barcode_upload__1507483471_1507483471.png', '2017-10-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `icon_library`
--

CREATE TABLE IF NOT EXISTS `icon_library` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `icon_library`
--

INSERT INTO `icon_library` (`id`, `name`, `date`, `status`) VALUES
(1, 'fa fa-graduation-cap', '2017-10-08', 1),
(2, 'fa fa-globe', '2017-10-08', 1),
(3, 'fa fa-clock-o', '2017-10-08', 1),
(4, 'fa fa-book', '2017-10-08', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `login`
--
CREATE TABLE IF NOT EXISTS `login` (
`id` int(20)
,`name` varchar(255)
,`username` varchar(255)
,`password` varchar(255)
,`status` int(2)
);
-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `icon_id` int(20) DEFAULT NULL,
  `details` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `icon_id`, `details`, `date`, `status`) VALUES
(1, 'Faqs', 4, '<p><span style="color: rgb(119, 119, 119); font-family: Roboto, sans-serif;">a list of questions and answers relating to a particular subject</span><br></p>', '2017-10-08', 1),
(2, 'WHEN TO CONTACT US:', 3, '<p><span style="color: rgb(119, 119, 119); font-family: Roboto, sans-serif;">Ideally, Exporters should involve Citi International</span><br></p>', '2017-10-08', 1),
(3, 'DOCUMENTATION', 2, '<p><span style="color: rgb(35, 51, 78); font-family: Verdana, sans-serif; font-size: 14.6667px;">This is the&nbsp;most vital part of the documentary package</span><br></p>', '2017-10-08', 1),
(4, 'HOW WE WORK?', 1, '<p><span class="st" style="color: rgb(119, 119, 119); font-family: Roboto, sans-serif;">We</span><span style="color: rgb(119, 119, 119); font-family: Roboto, sans-serif;">&nbsp;focus on key areas to remain competitive</span><br></p>', '2017-10-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_data`
--

CREATE TABLE IF NOT EXISTS `page_data` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `category_id` int(20) DEFAULT NULL,
  `subcategory_id` int(20) DEFAULT NULL,
  `photo` text,
  `details` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `page_data`
--

INSERT INTO `page_data` (`id`, `category_id`, `subcategory_id`, `photo`, `details`, `date`, `status`) VALUES
(1, 2, 1, 'photo_upload__1507662247_1507662247.jpeg', '<h2 style="font-family: Montserrat, sans-serif; color: rgb(51, 51, 51); margin-top: 15px; margin-bottom: 20px; font-size: 20px; text-transform: uppercase; letter-spacing: 0.5px; padding-top: 25px;">IELTS COACHING</h2><p align="justify" style="font-family: Roboto, sans-serif; line-height: 24px; color: rgb(119, 119, 119);">IELTS (International English Language Testing System)measures the language ability of people who wish to study or work in an environment where English is the language of conversation. Those who desire university entrance, take the Academic Version and those who are looking to immigrate to an English-speaking country, typically sit the General Training module or SELT (Secure English Language Test) for the UK.</p><h4 style="font-family: Montserrat, sans-serif; color: rgb(51, 51, 51); margin-top: 15px; margin-bottom: 20px; font-size: 20px; text-transform: uppercase; letter-spacing: 0.5px;">TYPES OF IELTS</h4><ol style="color: rgb(51, 51, 51);"><li><p style="font-family: Roboto, sans-serif; line-height: 24px; color: rgb(119, 119, 119);">IELTS Academic</p></li></ol><p style="font-family: Roboto, sans-serif; line-height: 24px; color: rgb(119, 119, 119);"></p><li style="color: rgb(51, 51, 51);"><p style="font-family: Roboto, sans-serif; line-height: 24px; color: rgb(119, 119, 119);">IELTS General Training</p></li><p style="font-family: Roboto, sans-serif; line-height: 24px; color: rgb(119, 119, 119);"></p><li style="color: rgb(51, 51, 51);"><p style="font-family: Roboto, sans-serif; line-height: 24px; color: rgb(119, 119, 119);">IELTS – SELT (Secure English Language Test)</p></li><p style="font-family: Roboto, sans-serif; line-height: 24px; color: rgb(119, 119, 119);"></p><table style="background-color: rgb(255, 255, 255); color: rgb(51, 51, 51);"><tbody><tr><td><strong>Format</strong></td><td><strong>Task</strong></td><td><strong>Duration</strong></td></tr><tr><td>Listening</td><td>You will listen to four recordings of native English speakers and then write your answers to a series of questions.</td><td>30 minutes</td></tr><tr><td>Reading</td><td>The Reading component consists of 40 questions, designed to test a wide range of reading skills.</td><td>60 minutes</td></tr><tr><td>Academic Writing</td><td>Two tasks each in Academic Test and General Training</td><td>60 minutes</td></tr><tr><td>Speaking</td><td>The speaking component assesses your use of spoken English. Every test is recorded</td><td>14 minutes</td></tr></tbody></table>', '2017-10-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_info`
--

CREATE TABLE IF NOT EXISTS `page_info` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `page_name_view` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `status` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `page_info`
--

INSERT INTO `page_info` (`id`, `name`, `page_name`, `page_name_view`, `menu_name`, `date`, `status`) VALUES
(1, 'site_basic_info', 'site_basic_info.php', '', 'Site Basic Info', '2017-10-08', 1),
(2, 'slider', 'slider.php', '', 'Slider', '2017-10-08', 1),
(3, 'category', 'category.php', '', 'Category', '2017-10-08', 1),
(4, 'sub_category', 'sub_category.php', '', 'Sub Category', '2017-10-08', 1),
(5, 'welcome_content', 'welcome_content.php', '', 'Welcome Content', '2017-10-08', 1),
(6, 'icon_library', 'icon_library.php', '', 'Icon Library', '2017-10-08', 1),
(7, 'package', 'package.php', '', 'Package', '2017-10-08', 1),
(8, 'faq_title', 'faq_title.php', '', 'Faq Title', '2017-10-08', 1),
(9, 'faq', 'faq.php', '', 'Faq', '2017-10-08', 1),
(10, 'about_us', 'about_us.php', '', 'About Us', '2017-10-08', 1),
(12, 'enquiry', 'enquiry.php', '', 'Enquiry', '2017-10-08', 1),
(14, 'footer_info', 'footer_info.php', '', 'Footer Info', '2017-10-08', 1),
(15, 'cover_photo', 'cover_photo.php', '', 'Cover Photo', '2017-10-08', 1),
(17, 'page_data', 'page_data.php', '', 'Page Data', '2017-10-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_basic_info`
--

CREATE TABLE IF NOT EXISTS `site_basic_info` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) DEFAULT NULL,
  `photo` text,
  `address` text,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `google_plus_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `site_basic_info`
--

INSERT INTO `site_basic_info` (`id`, `site_name`, `photo`, `address`, `phone_number`, `email`, `facebook_link`, `twitter_link`, `google_plus_link`, `youtube_link`, `date`, `status`) VALUES
(1, 'Citi', 'photo_upload__1507483081_1507483081.png', '<p><span style="color: rgb(119, 119, 119); font-family: Roboto, sans-serif; text-align: center; background-color: rgb(242, 245, 246);">Sandbach, UK- 110048</span><br></p>', '01123456789', 'info@citiforfaiting.com', '#', '#', '#', '#', '2017-10-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `photo` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `photo`, `date`, `status`) VALUES
(1, 'photo_upload__1507559226_1507559226.jpeg', '2017-10-09', 1),
(2, 'photo_upload__1507559232_1507559232.jpg', '2017-10-09', 1),
(3, 'photo_upload__1507559237_1507559237.jpeg', '2017-10-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `category_name` int(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_name`, `name`, `date`, `status`) VALUES
(1, 2, 'Applications & Tenors', '2017-10-08', 1),
(2, 2, 'What is discountable?', '2017-10-08', 1),
(3, 2, 'When to contact us?', '2017-10-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `welcome_content`
--

CREATE TABLE IF NOT EXISTS `welcome_content` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `short_details` text,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `welcome_content`
--

INSERT INTO `welcome_content` (`id`, `title`, `sub_title`, `short_details`, `date`, `status`) VALUES
(1, 'WELCOME to CITI International Trade Finance UK LTD.', 'International Trade Finance is your reliable partner with expertise.', '<p><strong style="color: rgb(119, 119, 119); font-family: Roboto, sans-serif;">We provide solutions in trade finance. Citi International Trade Finance is your reliable partner with expertise.</strong><br style="color: rgb(119, 119, 119); font-family: Roboto, sans-serif;"><span style="color: rgb(119, 119, 119); font-family: Roboto, sans-serif;">Our long standing know-how and our professional skills enables us to provide a variety of financial services.</span><br style="color: rgb(119, 119, 119); font-family: Roboto, sans-serif;"><span style="color: rgb(119, 119, 119); font-family: Roboto, sans-serif;">Citi International Trade Finance main activities are the purchasing of bills of exchange, promissory notes, deferred payment letters of credit and transferable financial loans from exporters or their bank.</span><br></p>', '2017-10-10', 1);

-- --------------------------------------------------------

--
-- Structure for view `login`
--
DROP TABLE IF EXISTS `login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login` AS select `employee`.`id` AS `id`,`employee`.`name` AS `name`,`employee`.`username` AS `username`,`employee`.`password` AS `password`,`employee`.`status` AS `status` from `employee`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
