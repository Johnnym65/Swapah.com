-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2012 at 03:55 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `johnnym6_Users`
--

-- --------------------------------------------------------

--
-- Table structure for table `Auction`
--

CREATE TABLE `Auction` (
  `AuctionID` int(10) NOT NULL AUTO_INCREMENT,
  `end_time` datetime NOT NULL,
  `username` varchar(20) NOT NULL,
  `Item_id` int(10) NOT NULL,
  `Bid_id` int(10) DEFAULT NULL,
  `allowQ` varchar(5) NOT NULL,
  `Finished` varchar(4) NOT NULL,
  PRIMARY KEY (`AuctionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `Auction`
--

INSERT INTO `Auction` VALUES(34, '2012-04-30 19:58:57', 'hsimpson', 17, 0, '', 'no');
INSERT INTO `Auction` VALUES(36, '2012-04-29 19:58:57', 'barryZ1990', 11, 0, 'on', 'no');
INSERT INTO `Auction` VALUES(37, '2012-04-27 19:59:20', 'jasond1956', 24, 10, 'on', 'no');
INSERT INTO `Auction` VALUES(38, '2012-05-04 19:58:04', 'johnnym65', 1, 5, 'on', 'no');
INSERT INTO `Auction` VALUES(40, '2012-03-07 10:12:13', 'phillis', 28, 1, 'on', 'yes');
INSERT INTO `Auction` VALUES(43, '2012-03-18 12:01:40', 'tommy66', 29, 4, 'on', 'yes');
INSERT INTO `Auction` VALUES(44, '2012-03-16 15:27:05', 'johnnym65', 3, 9, '', 'yes');
INSERT INTO `Auction` VALUES(47, '2012-03-22 19:16:57', 'dazmck100', 38, 0, '', 'yes');
INSERT INTO `Auction` VALUES(48, '2012-03-22 19:24:24', 'craig1', 41, 0, '', 'yes');
INSERT INTO `Auction` VALUES(49, '2012-04-03 16:19:33', 'davidn21', 42, 11, 'on', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `AuctionQuestion`
--

CREATE TABLE `AuctionQuestion` (
  `question_id` int(10) NOT NULL AUTO_INCREMENT,
  `Auction_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `AuctionQuestion`
--

INSERT INTO `AuctionQuestion` VALUES(1, 40, 'adam', 'Does this lad have red hair. Coz if he does i dont want it', 'red hair. pale irish skin');
INSERT INTO `AuctionQuestion` VALUES(2, 40, 'johnnym65', 'hey bro how it hangin', NULL);
INSERT INTO `AuctionQuestion` VALUES(3, 37, 'johnnym65', '', NULL);
INSERT INTO `AuctionQuestion` VALUES(4, 43, 'barryZ1990', 'hello', NULL);
INSERT INTO `AuctionQuestion` VALUES(5, 43, 'barryZ1990', 'hi', NULL);
INSERT INTO `AuctionQuestion` VALUES(6, 36, 'darren', 'hello, where abouts are the seats within the stadium?', 'They are standing, right up againts the stage');

-- --------------------------------------------------------

--
-- Table structure for table `Bid`
--

CREATE TABLE `Bid` (
  `Bid_id` int(10) NOT NULL AUTO_INCREMENT,
  `Auction_id` int(10) NOT NULL,
  `Item_id` int(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `bid_time` datetime NOT NULL,
  `usercomplete` varchar(1) NOT NULL,
  `biddercomplete` varchar(1) NOT NULL,
  PRIMARY KEY (`Bid_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `Bid`
--

INSERT INTO `Bid` VALUES(1, 40, 6, 'phillis', '2012-03-04 10:18:43', 'n', 'n');
INSERT INTO `Bid` VALUES(4, 43, 27, 'tommy66', '2012-03-04 12:20:53', 'n', 'n');
INSERT INTO `Bid` VALUES(5, 38, 18, 'johnnym65', '2012-03-15 12:42:54', 'n', 'n');
INSERT INTO `Bid` VALUES(9, 44, 14, 'johnnym65', '2012-03-17 15:46:01', 'y', 'y');
INSERT INTO `Bid` VALUES(10, 37, 26, 'jasond1956', '2012-03-17 15:53:08', 'n', 'n');
INSERT INTO `Bid` VALUES(11, 49, 12, 'davidn21', '2012-03-20 17:06:31', 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `Bidmessages`
--

CREATE TABLE `Bidmessages` (
  `messageid` int(10) NOT NULL AUTO_INCREMENT,
  `Offerid` int(10) NOT NULL,
  `beenRead` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`messageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `Bidmessages`
--

INSERT INTO `Bidmessages` VALUES(1, 1, 'Yes', 'jasond1956');
INSERT INTO `Bidmessages` VALUES(2, 2, 'Yes', '');
INSERT INTO `Bidmessages` VALUES(3, 3, 'Yes', 'phillis');
INSERT INTO `Bidmessages` VALUES(4, 4, 'Yes', 'adam');
INSERT INTO `Bidmessages` VALUES(5, 5, 'Yes', 'tommy66');
INSERT INTO `Bidmessages` VALUES(6, 6, 'Yes', 'tommy66');
INSERT INTO `Bidmessages` VALUES(7, 7, 'Yes', 'johnnym65');
INSERT INTO `Bidmessages` VALUES(8, 8, 'Yes', 'jasond1956');
INSERT INTO `Bidmessages` VALUES(9, 9, 'Yes', 'johnnym65');
INSERT INTO `Bidmessages` VALUES(10, 10, 'Yes', 'johnnym65');
INSERT INTO `Bidmessages` VALUES(11, 11, 'Yes', 'barryz1990');
INSERT INTO `Bidmessages` VALUES(12, 12, 'Yes', 'johnnym65');
INSERT INTO `Bidmessages` VALUES(13, 13, 'Yes', 'jasond1956');
INSERT INTO `Bidmessages` VALUES(14, 9, 'Yes', 'jasond1956');
INSERT INTO `Bidmessages` VALUES(15, 10, 'Yes', 'jasond1956');
INSERT INTO `Bidmessages` VALUES(16, 11, 'Yes', 'jasond1956');
INSERT INTO `Bidmessages` VALUES(17, 12, 'No', 'jasond1956');
INSERT INTO `Bidmessages` VALUES(18, 13, 'No', 'jasond1956');
INSERT INTO `Bidmessages` VALUES(19, 14, 'No', 'jasond1956');
INSERT INTO `Bidmessages` VALUES(20, 15, 'Yes', 'davidn21');

-- --------------------------------------------------------

--
-- Table structure for table `BidOfferResultMessage`
--

CREATE TABLE `BidOfferResultMessage` (
  `messageid` int(10) NOT NULL AUTO_INCREMENT,
  `AuctionID` int(10) NOT NULL,
  `beenRead` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Result` varchar(20) NOT NULL,
  PRIMARY KEY (`messageid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `BidOfferResultMessage`
--

INSERT INTO `BidOfferResultMessage` VALUES(1, 40, 'Yes', 'johnnym65', 'ACCEPTED');
INSERT INTO `BidOfferResultMessage` VALUES(2, 42, 'Yes', 'johnnym65', 'ACCEPTED');
INSERT INTO `BidOfferResultMessage` VALUES(3, 43, 'Yes', 'johnnym65', 'ACCEPTED');
INSERT INTO `BidOfferResultMessage` VALUES(4, 43, 'Yes', 'johnnym65', 'ACCEPTED');
INSERT INTO `BidOfferResultMessage` VALUES(5, 38, 'Yes', 'barryz1990', 'ACCEPTED');
INSERT INTO `BidOfferResultMessage` VALUES(6, 41, 'Yes', 'adam', 'ACCEPTED');
INSERT INTO `BidOfferResultMessage` VALUES(7, 41, 'Yes', 'adam', 'ACCEPTED');
INSERT INTO `BidOfferResultMessage` VALUES(8, 0, 'Yes', 'jasond1956', 'ACCEPTED');
INSERT INTO `BidOfferResultMessage` VALUES(9, 44, 'Yes', 'jasond1956', 'ACCEPTED');
INSERT INTO `BidOfferResultMessage` VALUES(10, 0, 'Yes', 'johnnym65', 'Rejected');
INSERT INTO `BidOfferResultMessage` VALUES(11, 37, 'No', 'adam', 'ACCEPTED');
INSERT INTO `BidOfferResultMessage` VALUES(12, 49, 'Yes', 'simond111', 'ACCEPTED');

-- --------------------------------------------------------

--
-- Table structure for table `BidOffers`
--

CREATE TABLE `BidOffers` (
  `Offerid` int(10) NOT NULL AUTO_INCREMENT,
  `Auction_id` int(10) NOT NULL,
  `Item_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `offertime` datetime NOT NULL,
  PRIMARY KEY (`Offerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `BidOffers`
--

INSERT INTO `BidOffers` VALUES(2, 39, 14, 'jasond1956', '2012-03-03 04:35:01');
INSERT INTO `BidOffers` VALUES(8, 37, 25, 'johnnym65', '2012-03-16 22:33:16');
INSERT INTO `BidOffers` VALUES(9, 37, 39, 'mickthebrick', '2012-03-19 18:21:07');
INSERT INTO `BidOffers` VALUES(10, 37, 39, 'keith', '2012-03-19 18:46:09');
INSERT INTO `BidOffers` VALUES(11, 37, 39, 'keith', '2012-03-19 18:47:02');
INSERT INTO `BidOffers` VALUES(12, 37, 39, 'dazmck100', '2012-03-19 19:17:42');
INSERT INTO `BidOffers` VALUES(13, 37, 40, 'craig1', '2012-03-19 19:24:08');
INSERT INTO `BidOffers` VALUES(14, 37, 43, 'davidn21', '2012-03-20 16:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `gameswapchat`
--

CREATE TABLE `gameswapchat` (
  `gameswapchatid` int(10) NOT NULL AUTO_INCREMENT,
  `swapid` int(10) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `message` varchar(300) NOT NULL,
  PRIMARY KEY (`gameswapchatid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `gameswapchat`
--

INSERT INTO `gameswapchat` VALUES(1, 2, 'darren', 'hello');
INSERT INTO `gameswapchat` VALUES(2, 2, 'barryz1990', 'hi');
INSERT INTO `gameswapchat` VALUES(3, 2, 'barryz1990', 'zzzzz');
INSERT INTO `gameswapchat` VALUES(4, 2, 'darren', 'xxxxxxx');
INSERT INTO `gameswapchat` VALUES(5, 2, 'barryz1990', 'nvhgh');
INSERT INTO `gameswapchat` VALUES(6, 3, 'jasond1956', 'hello ha\r\n');
INSERT INTO `gameswapchat` VALUES(7, 3, 'darren', 'howdy');
INSERT INTO `gameswapchat` VALUES(8, 3, 'jasond1956', 'kevin street tomoro at 1');
INSERT INTO `gameswapchat` VALUES(9, 3, 'darren', 'grand');
INSERT INTO `gameswapchat` VALUES(10, 4, 'johnnym65', 'hello');
INSERT INTO `gameswapchat` VALUES(11, 3, 'jasond1956', 'hows you');
INSERT INTO `gameswapchat` VALUES(12, 3, 'darren', 'im great');
INSERT INTO `gameswapchat` VALUES(13, 3, 'darren', 'howiya');
INSERT INTO `gameswapchat` VALUES(14, 3, 'jasond1956', 'story');
INSERT INTO `gameswapchat` VALUES(15, 5, 'jasond1956', 'hello');
INSERT INTO `gameswapchat` VALUES(16, 5, 'jasond1956', 'how are you');
INSERT INTO `gameswapchat` VALUES(17, 5, 'jasond1956', 'hello');
INSERT INTO `gameswapchat` VALUES(18, 6, 'mickthebrick', 'howdy');
INSERT INTO `gameswapchat` VALUES(19, 6, 'tester', 'hello');
INSERT INTO `gameswapchat` VALUES(20, 6, 'mickthebrick', '<h1>awesome sauce</h1>');
INSERT INTO `gameswapchat` VALUES(21, 6, 'tester', 'haha\r\n');
INSERT INTO `gameswapchat` VALUES(22, 9, 'tester', 'Hello Dickhead');
INSERT INTO `gameswapchat` VALUES(23, 9, 'keith', 'well\r\n');
INSERT INTO `gameswapchat` VALUES(24, 9, 'keith', 'thats not way to say hello');
INSERT INTO `gameswapchat` VALUES(25, 10, 'tester', 'Hello Dickhead');
INSERT INTO `gameswapchat` VALUES(26, 10, 'dazmck100', 'is there anybody derrrrrrrrrrrrrrrrrrrrrrrrrrrr?\r\n\r\n');
INSERT INTO `gameswapchat` VALUES(27, 11, 'johnnym65', 'hello');
INSERT INTO `gameswapchat` VALUES(28, 12, 'davidn21', 'hello');
INSERT INTO `gameswapchat` VALUES(29, 12, 'davidn21', 'Were would you like to meet up to swap our items');
INSERT INTO `gameswapchat` VALUES(30, 12, 'simond111', 'hi');
INSERT INTO `gameswapchat` VALUES(31, 12, 'simond111', 'how about at my address, 123 fakestreet, dublin. Tomoro at 2pm?');
INSERT INTO `gameswapchat` VALUES(32, 12, 'davidn21', 'ok sounds good, see you then');

-- --------------------------------------------------------

--
-- Table structure for table `gameusers`
--

CREATE TABLE `gameusers` (
  `gameid` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Item_id` int(10) NOT NULL,
  `currentitem_id` int(10) NOT NULL,
  PRIMARY KEY (`gameid`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gameusers`
--

INSERT INTO `gameusers` VALUES(1, 'barryz1990', 9, 32);
INSERT INTO `gameusers` VALUES(1, 'craig1', 41, 41);
INSERT INTO `gameusers` VALUES(1, 'darren', 32, 30);
INSERT INTO `gameusers` VALUES(1, 'davidn21', 43, 10);
INSERT INTO `gameusers` VALUES(1, 'dazmck100', 39, 34);
INSERT INTO `gameusers` VALUES(1, 'hsimpson', 17, 17);
INSERT INTO `gameusers` VALUES(1, 'jasond1956', 13, 16);
INSERT INTO `gameusers` VALUES(1, 'johnnym65', 16, 13);
INSERT INTO `gameusers` VALUES(1, 'simond111', 10, 43);
INSERT INTO `gameusers` VALUES(1, 'tester', 34, 39);
INSERT INTO `gameusers` VALUES(1, 'tommy66', 30, 9);

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE `Item` (
  `Item_id` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Condition` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'FREE TO USE',
  `youtubelink` varchar(80) DEFAULT NULL,
  `yid` varchar(20) DEFAULT NULL,
  `category` varchar(20) NOT NULL,
  PRIMARY KEY (`Item_id`),
  KEY `Username` (`Username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` VALUES(1, 'IPhone 4 16 GB New', 'johnnym65', 'Brand new 16 gigabyte iphone 4, black. Unwanted christmas gift. comes with everything that is in the box. charger, earphones, also with a rubber case', 'Brand New', 'UP FOR AUCTION', 'http://www.youtube.com/watch?v=P11trcD6ilE', 'P11trcD6ilE', 'Mobile/Home Phones');
INSERT INTO `Item` VALUES(2, 'Samsung 50" tv st0078', 'simond111', 'Brand new 50" samsung tv, black. Unwanted christmas gift. comes with everything that is in the box. charger, earphones, also with a rubber case, blah blah blah klhjfkjhfdecqw o  ueiwfh lshjgcd gdsy cdjgc d\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nfdsjkfnjdksfn', 'Brand New', 'FREE TO USE', 'http://www.youtube.com/watch?v=fRU5pDk_--4', 'fRU5pDk_--4', 'Electronics');
INSERT INTO `Item` VALUES(3, 'new GT Bike', 'johnnym65', 'new bike fjkdhgvfj fhkjdcv dvkhdskjchvsxc vdfhvcjkdfs vhjxkack cuhvdsk cv ', 'Brand New', 'UP FOR AUCTION', 'http://www.youtube.com/watch?v=2_VTfdddwz0', '2_VTfdddwz0', 'Sporting Goods');
INSERT INTO `Item` VALUES(5, 'Harry potter books all them', 'simond111', 'Every harry potter book, First edition. average condition', 'Average Condition', 'FREE TO USE', 'http://www.youtube.com/watch?v=C_8GQv1gjH0', 'C_8GQv1gjH0', 'Books, Comics and Ma');
INSERT INTO `Item` VALUES(6, 'simspons cards', 'johnnym65', 'top trumph cards, lots of fun', 'Brand New', 'TOP BID IN AUCTION', 'http://www.youtube.com/watch?v=TVD6FZcFaRo', 'TVD6FZcFaRo', 'Collectables');
INSERT INTO `Item` VALUES(7, '5 paintings', 'johnnym65', '5 random paintings', 'Like New', 'TOP BID IN AUCTION', 'http://www.youtube.com/watch?v=6yVhTyPaaLQ', '6yVhTyPaaLQ', 'Collectables');
INSERT INTO `Item` VALUES(9, 'Acer Aspire 5920 Used', 'barryz1990', 'This is a Used Acer Aspire 5920, comes with everything it came with, power adapter, case ect. i like computer games, xboxs etc', 'Like New', 'CURRENTLY IN GAME', 'http://www.youtube.com/watch?v=7H0K1k54t6A', '7H0K1k54t6A', 'Computer/Laptop');
INSERT INTO `Item` VALUES(10, 'Family guy Season 4 boxset', 'simond111', 'Unwanted christmas gift, family guy season 4 boxset. works fine. few scratches but makes no difference.', 'Brand New', 'CURRENTLY IN GAME', 'http://www.youtube.com/watch?v=KJCfUm21BsI', 'KJCfUm21BsI', 'DVD''s/Movies');
INSERT INTO `Item` VALUES(11, 'Snow Patrol Tickets O2 dublin 30-03-2012, unable to attend', 'barryz1990', '2 Snow patrol tickets for the O2 dublin on the 30-03-2012. unable to attend through time conflicts. the tickets are standing in front of the stage.', 'Brand New', 'UP FOR AUCTION', NULL, NULL, 'Event Tickets');
INSERT INTO `Item` VALUES(12, 'gold diamond earings', 'simond111', 'lovely gold diamong earings', 'Like New', 'TOP BID IN AUCTION', 'http://www.youtube.com/watch?v=POXBiZfhMjs', 'POXBiZfhMjs', 'jewellery');
INSERT INTO `Item` VALUES(13, 'sky plus remote comntrol', 'jasond1956', 'sky remote', 'Brand New', 'CURRENTLY IN GAME', 'http://www.youtube.com/watch?v=j8OQq7W_rew', 'j8OQq7W_rew', 'Home and Garden');
INSERT INTO `Item` VALUES(14, 'ninja turtles poster', 'jasond1956', 'this is a ninja turtles poster', 'Like New', 'TOP BID IN AUCTION', '', '', 'Collectables');
INSERT INTO `Item` VALUES(15, 'kluhlj', 'jasond1956', 'jkjh', 'Poor Condition', 'FREE TO USE', '', '', 'Other');
INSERT INTO `Item` VALUES(16, 'Guilt ticket', 'johnnym65', 'This is a ticket to guilt nightclub. free in', 'Brand New', 'CURRENTLY IN GAME', '', '', 'Event Tickets');
INSERT INTO `Item` VALUES(17, 'classic Alarm clock', 'Hsimpson', 'this is a classic alarm clock', 'Average Condition', 'CURRENTLY IN GAME', '', '', 'Other');
INSERT INTO `Item` VALUES(18, 'Collection Of old Vinals', 'barryz1990', 'This is a collection of old vinals', 'Brand New', 'TOP BID IN AUCTION', '', '', 'Music');
INSERT INTO `Item` VALUES(20, 'bob', 'bob', 'bob', 'Brand New', 'FREE TO USE', '', '', 'Other');
INSERT INTO `Item` VALUES(21, 'bob2', 'bob', 'bob2', 'Brand New', 'FREE TO USE', '', '', 'Other');
INSERT INTO `Item` VALUES(22, 'Sony Headphones, Blue like new.', 'barryz1990', 'These are Like new sony high def headphones. crystal clear sound and very comfortable', 'Like New', 'CURRENTLY IN GAME', '', '', 'Music');
INSERT INTO `Item` VALUES(24, '40 Euro Cash', 'jasond1956', '40 Euro cash', 'Brand New', 'UP FOR AUCTION', '', '', 'Cash');
INSERT INTO `Item` VALUES(26, 'Deep Riverrock', 'adam', 'Top quality bottle of water', 'Brand New', 'TOP BID IN AUCTION', 'http://www.youtube.com/watch?v=IDdvo7QvjvI', 'IDdvo7QvjvI', 'Other');
INSERT INTO `Item` VALUES(27, 'Broken Iphone, use for parts', 'johnnym65', 'hghg', 'Brand New', 'TOP BID IN AUCTION', '', '', 'Other');
INSERT INTO `Item` VALUES(28, 'your face', 'phillis', 'A face. \r\nMade in Ireland.', 'Brand New', 'UP FOR AUCTION', '', '', 'Other');
INSERT INTO `Item` VALUES(29, 'ipod dock speackers', 'tommy66', 'ipod dock speakers', 'Like New', 'UP FOR AUCTION', '', '', 'Music');
INSERT INTO `Item` VALUES(30, '10 euro cash', 'tommy66', '10 euro cash and 5 euro cash', 'Like New', 'CURRENTLY IN GAME', '', '', 'Cash');
INSERT INTO `Item` VALUES(32, 'laptop', 'darren', 'laptop', 'Like New', 'CURRENTLY IN GAME', '', '', 'Computer/Laptop');
INSERT INTO `Item` VALUES(33, 'Tea Cup', 'darren', 'This is a teacup', 'USED', 'FREE TO USE', '', '', 'Home and Garden');
INSERT INTO `Item` VALUES(34, 'test item', 'tester', 'test item', 'Brand New', 'CURRENTLY IN GAME', '', '', 'Antiques');
INSERT INTO `Item` VALUES(35, 'test item 2', 'tester', 'test item 2', 'Brand New', 'FREE TO USE', '', '', 'Antiques');
INSERT INTO `Item` VALUES(36, 'test item 3', 'tester', 'test item 3', 'Brand New', 'FREE TO USE', '', '', 'Antiques');
INSERT INTO `Item` VALUES(37, 'test item 4', 'tester', 'test item 4', 'Brand New', 'FREE TO USE', '', '', 'Antiques');
INSERT INTO `Item` VALUES(38, 'toast', 'dazmck100', 'yummy', 'USED', 'UP FOR AUCTION', '', '', 'Electronics');
INSERT INTO `Item` VALUES(39, 'jam', 'dazmck100', 'is also yummy', 'Brand New', 'CURRENTLY IN GAME', '', '', 'Collectables');
INSERT INTO `Item` VALUES(40, 'jlkh', 'craig1', 'lkjh', 'Brand New', 'FREE TO USE', '', '', 'Antiques');
INSERT INTO `Item` VALUES(41, 'jkhg', 'craig1', 'lkjh', 'Brand New', 'CURRENTLY IN GAME', '', '', 'Antiques');
INSERT INTO `Item` VALUES(42, 'Acer Laptop', 'davidn21', 'This is an acer laptop', 'USED', 'UP FOR AUCTION', '', '', 'Computer/Laptop');
INSERT INTO `Item` VALUES(43, 'Snow Patrol Tickets O2 dublin 30-03-2012, unable to attend', 'davidn21', 'Snow Patrol Tickets', 'Brand New', 'CURRENTLY IN GAME', '', '', 'Music');
INSERT INTO `Item` VALUES(44, 'Vinals', 'davidn21', 'Vinals', 'USED', 'FREE TO USE', '', '', 'Music');
INSERT INTO `Item` VALUES(45, 'Original Gameboy', 'darren', 'Origional Gameboy from 1996, come with 5 games', 'Average Condition', 'FREE TO USE', 'http://www.youtube.com/watch?v=BxVOMEwtVfI', 'BxVOMEwtVfI', 'Toys');

-- --------------------------------------------------------

--
-- Table structure for table `Swap`
--

CREATE TABLE `Swap` (
  `Swapid` int(10) NOT NULL AUTO_INCREMENT,
  `gameid` int(10) NOT NULL,
  `currentitem` int(10) NOT NULL,
  `swapitem` int(10) NOT NULL,
  `currentuser` varchar(20) NOT NULL,
  `swapuser` varchar(20) NOT NULL,
  `currentowners` varchar(2) NOT NULL,
  `swapowners` varchar(2) NOT NULL,
  PRIMARY KEY (`Swapid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Swap`
--

INSERT INTO `Swap` VALUES(1, 1, 32, 9, 'barryz1990', 'darren', 'y', 'y');
INSERT INTO `Swap` VALUES(2, 1, 32, 9, 'barryz1990', 'barryz1990', 'y', 'y');
INSERT INTO `Swap` VALUES(3, 1, 9, 13, 'jasond1956', 'darren', 'y', 'y');
INSERT INTO `Swap` VALUES(4, 1, 30, 16, 'johnnym65', 'tommy66', 'y', 'y');
INSERT INTO `Swap` VALUES(5, 1, 16, 9, 'jasond1956', 'tommy66', 'y', 'n');
INSERT INTO `Swap` VALUES(10, 1, 34, 39, 'dazmck100', 'tester', 'y', 'y');
INSERT INTO `Swap` VALUES(11, 1, 13, 30, 'johnnym65', 'darren', 'y', 'y');
INSERT INTO `Swap` VALUES(12, 1, 10, 43, 'davidn21', 'simond111', 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `Swapchat`
--

CREATE TABLE `Swapchat` (
  `swapchatid` int(10) NOT NULL AUTO_INCREMENT,
  `Auction_id` int(10) NOT NULL,
  `sender` varchar(20) NOT NULL,
  `message` varchar(300) NOT NULL,
  PRIMARY KEY (`swapchatid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `Swapchat`
--

INSERT INTO `Swapchat` VALUES(1, 42, 'adam', 'Howiya');
INSERT INTO `Swapchat` VALUES(2, 42, 'johnnym65', 'hello?');
INSERT INTO `Swapchat` VALUES(3, 42, 'adam', 'and there gone');
INSERT INTO `Swapchat` VALUES(4, 42, 'johnnym65', 'hello drake\r\n');
INSERT INTO `Swapchat` VALUES(5, 42, 'adam', 'there we go');
INSERT INTO `Swapchat` VALUES(6, 42, 'johnnym65', 'dffdf');
INSERT INTO `Swapchat` VALUES(7, 42, 'adam', 'send something');
INSERT INTO `Swapchat` VALUES(8, 42, 'johnnym65', 'kjbdkbfdkjbd');
INSERT INTO `Swapchat` VALUES(9, 42, 'johnnym65', '<h1> hello </h1>\r\n');
INSERT INTO `Swapchat` VALUES(10, 41, 'johnnym65', 'dcjfhjdkshfjshjdgsadfyasfdhasdJGFETYDFEGHWDV\r\n');
INSERT INTO `Swapchat` VALUES(11, 44, 'johnnym65', 'hello');
INSERT INTO `Swapchat` VALUES(12, 44, 'jasond1956', 'hi there');
INSERT INTO `Swapchat` VALUES(13, 44, 'johnnym65', 'were would you like to meet\r\n');
INSERT INTO `Swapchat` VALUES(14, 44, 'jasond1956', 'i dont mind, blah');
INSERT INTO `Swapchat` VALUES(15, 49, 'davidn21', 'hi\r\n');
INSERT INTO `Swapchat` VALUES(16, 49, 'davidn21', 'were would you like to meet up to swap?');
INSERT INTO `Swapchat` VALUES(17, 49, 'simond111', 'hi');
INSERT INTO `Swapchat` VALUES(18, 49, 'simond111', 'how about my address, 123 fakestreet');
INSERT INTO `Swapchat` VALUES(19, 49, 'davidn21', 'sounds good see you then');

-- --------------------------------------------------------

--
-- Table structure for table `swapoffer`
--

CREATE TABLE `swapoffer` (
  `swapid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `Item_id` int(10) NOT NULL,
  `swapItem_id` int(10) NOT NULL,
  `offertime` datetime NOT NULL,
  PRIMARY KEY (`swapid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `swapoffer`
--

INSERT INTO `swapoffer` VALUES(14, 'darren', 30, 34, '2012-03-21 23:22:49');
INSERT INTO `swapoffer` VALUES(15, 'darren', 30, 34, '2012-03-21 23:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `swappahgame`
--

CREATE TABLE `swappahgame` (
  `gameid` int(10) NOT NULL AUTO_INCREMENT,
  `gamename` varchar(20) NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `duration` varchar(20) NOT NULL,
  `Finished` varchar(3) NOT NULL,
  PRIMARY KEY (`gameid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `swappahgame`
--

INSERT INTO `swappahgame` VALUES(1, 'Alpha', '2012-03-08 04:07:28', '2012-03-31 20:27:28', '2 weeks', 'n');
INSERT INTO `swappahgame` VALUES(2, 'Beta', '2012-03-20 20:38:20', '2012-03-24 20:38:20', '1 week', 'n');
INSERT INTO `swappahgame` VALUES(3, 'Delta', '2012-03-29 20:31:48', '2012-04-08 20:31:54', '2 weeks', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `username` varchar(20) NOT NULL,
  `passWord` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` VALUES('adam', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'adamdrakeford@gmail.com', 'Brewers+Hill,+,+Dunlavin,+Wicklow,+');
INSERT INTO `User` VALUES('barryz1990', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'barryz1990@hotmail.com', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('bob', '48181acd22b3edaebc8a447868a7df7ce629920a', 'bob', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('craig', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'craigie90@hotmail.com', '2+Roseville+tce,+,+Dundrum,+Dublin,+IRELAND');
INSERT INTO `User` VALUES('craig1', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'craigie90@hotmail.com', '2+Roseville+tce,+,+Dundrum,+Dublin,+IRELAND');
INSERT INTO `User` VALUES('darren', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'darrenmck@gmail.com', '147+keeper+Road,+Crumlin,+Crumlin,+Dublin,+IRELAND');
INSERT INTO `User` VALUES('davidn21', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'JONNY_MURPHY65@HOTMAIL.COM', '65+Whitecliff,+whitechurch+road,+rahtfarham,+Dublin,+IRELAND');
INSERT INTO `User` VALUES('dazmck100', '0069b3a975226d8515688d3cb5ed7203c44495d1', 'darrenmckeever90@gmail.com', '147+keeper+road+crumlin+dublin+12,+,+dublin,+Dublin,+IRELAND');
INSERT INTO `User` VALUES('dr4ke616', '990c37a323daf1549bdd24197927625080ee16b8', 'adam.drakeford@mydit.ie', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('Hsimpson', '019db0bfd5f85951cb46e4452e9642858c004155', 'mark.english@hotmail.com', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('jasond1956', '6c93344eeb6343965c5f486de10cbe4cbef9c7ec', 'jasond@hotmail.com', '13+Ballymun+Road,+Glasnevin,+Dublin,+Ireland');
INSERT INTO `User` VALUES('johnnym65', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'j.m@hotmail.com', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('johnnym66', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'jonny_murphy65@hotmail.com', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('johnnym67', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'jonny_murphy65@hotmail.com', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('keith', '5c6d9edc3a951cda763f650235cfc41a3fc23fe8', 'keith.j.mcc@gmail.com', '41+warren+crecent,+castleknock,+dublin,+Dublin,+IRELAND');
INSERT INTO `User` VALUES('mickthebrick', '8cb2237d0679ca88db6464eac60da96345513964', 'michael@loughranenterprises.com', 'somewhere,+over+the,+rainbox,+Meath,+IRELAND');
INSERT INTO `User` VALUES('phillis', '86e4f5081a01ac31ac432f637136807b9516e6ba', 'keith-mcc@hotmail.com', '3+kevin+street,+dublin,+dublin,+Dublin,+IRELAND');
INSERT INTO `User` VALUES('simond111', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'sd@hotmail.com', 'galway+road,+Roscommon,+ireland');
INSERT INTO `User` VALUES('Tester', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'j', '65+Whitecliff,+,+rathfarnham,+Dublin,+IRELAND');
INSERT INTO `User` VALUES('tom', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'jhghjgjj', 'h,+,+kjh,+Armagh,+IRELAND');
INSERT INTO `User` VALUES('tommy65', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'tommy65@hotmail.com', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('tommy66', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'jonny_murphy65@hotmail.com', '181+whitecliff,+whitechurch+road,+rathfarnham,+dublin,+Ireland');

-- --------------------------------------------------------

--
-- Table structure for table `userreview`
--

CREATE TABLE `userreview` (
  `reviewid` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `reviewer` varchar(20) NOT NULL,
  `reviewtext` varchar(300) NOT NULL,
  `rating` int(1) NOT NULL,
  PRIMARY KEY (`reviewid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `userreview`
--

INSERT INTO `userreview` VALUES(1, 'johnnym65', 'simond111', 'Very Prompt and easy to contact', 4);
INSERT INTO `userreview` VALUES(2, 'johnnym65', 'barryZ1990', 'ye', 3);
INSERT INTO `userreview` VALUES(3, 'johnnym65', 'barryZ1990', 'class', 1);
INSERT INTO `userreview` VALUES(4, 'simond111', 'johnnym65', 'poor, hard to contact. item not as good as made out to be', 2);
INSERT INTO `userreview` VALUES(6, 'simond111', 'johnnym65', 'grand job', 5);
INSERT INTO `userreview` VALUES(7, 'simond111', 'johnnym65', 'excellent ', 5);
INSERT INTO `userreview` VALUES(8, 'barryZ1990', 'jasond1956', 'very quick to reply. item was in the exact condition specified', 5);
INSERT INTO `userreview` VALUES(9, 'johnnym65', 'simond111', 'hjhjh', 5);
INSERT INTO `userreview` VALUES(12, 'johnnym65', 'adam', 'shocking', 1);
INSERT INTO `userreview` VALUES(13, 'adam', 'johnnym65', 'very good', 5);
INSERT INTO `userreview` VALUES(14, 'jasond1956', 'johnnym65', 'great', 5);
INSERT INTO `userreview` VALUES(21, 'johnnym65', 'jasond1956', 'great', 5);
INSERT INTO `userreview` VALUES(22, 'simond111', 'davidn21', 'Very good and very quick, the item was in excellent condition', 5);
