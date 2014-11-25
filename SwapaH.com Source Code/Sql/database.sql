-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2012 at 10:03 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `Users`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `Auction`
--

INSERT INTO `Auction` VALUES(34, '2012-03-31 19:59:50', 'hsimpson', 17, 0, '', 'no');
INSERT INTO `Auction` VALUES(35, '2012-03-09 19:58:32', 'simond111', 2, 0, 'on', 'no');
INSERT INTO `Auction` VALUES(36, '2012-03-29 19:58:57', 'barryZ1990', 11, 0, 'on', 'no');
INSERT INTO `Auction` VALUES(37, '2012-03-27 19:59:20', 'jasond1956', 24, 0, 'on', 'no');
INSERT INTO `Auction` VALUES(38, '2012-04-04 19:58:04', 'johnnym65', 1, 0, 'on', 'no');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `AuctionQuestion`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Bid`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Bidmessages`
--

INSERT INTO `Bidmessages` VALUES(1, 1, 'Yes', 'jasond1956');
INSERT INTO `Bidmessages` VALUES(2, 2, 'Yes', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `BidOfferResultMessage`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `BidOffers`
--

INSERT INTO `BidOffers` VALUES(1, 37, 6, 'johnnym65', '2012-02-26 12:01:57');
INSERT INTO `BidOffers` VALUES(2, 39, 14, 'jasond1956', '2012-03-03 04:35:01');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gameswapchat`
--


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

INSERT INTO `gameusers` VALUES(1, 'barryZ1990', 22, 22);
INSERT INTO `gameusers` VALUES(1, 'Hsimpson', 27, 27);
INSERT INTO `gameusers` VALUES(1, 'jasond1956', 13, 13);
INSERT INTO `gameusers` VALUES(1, 'johnnym65', 4, 4);
INSERT INTO `gameusers` VALUES(1, 'simond111', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE `Item` (
  `Item_id` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Condition` varchar(20) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'FREE TO USE',
  `youtubelink` varchar(80) DEFAULT NULL,
  `yid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` VALUES(1, 'IPhone 4 16 GB New', 'johnnym65', 'Brand new 16 gigabyte iphone 4, black. Unwanted christmas gift. comes with everything that is in the box. charger, earphones, also with a rubber case', 'Brand New', 'UP FOR AUCTION', 'http://www.youtube.com/watch?v=P11trcD6ilE', 'P11trcD6ilE');
INSERT INTO `Item` VALUES(2, 'Samsung 50" tv st0078', 'simond111', 'Brand new 50" samsung tv, black. Unwanted christmas gift. comes with everything that is in the box. charger, earphones, also with a rubber case, blah blah blah klhjfkjhfdecqw o  ueiwfh lshjgcd gdsy cdjgc d\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nfdsjkfnjdksfn', 'Brand New', 'UP FOR AUCTION', 'http://www.youtube.com/watch?v=fRU5pDk_--4', 'fRU5pDk_--4');
INSERT INTO `Item` VALUES(3, 'new GT Bike', 'johnnym65', 'new bike fjkdhgvfj fhkjdcv dvkhdskjchvsxc vdfhvcjkdfs vhjxkack cuhvdsk cv ', 'Brand New', 'FREE TO USE', 'http://www.youtube.com/watch?v=2_VTfdddwz0', '2_VTfdddwz0');
INSERT INTO `Item` VALUES(5, 'Harry potter books all them', 'simond111', 'Every harry potter book, First edition. average condition', 'Average Condition', 'FREE TO USE', 'http://www.youtube.com/watch?v=C_8GQv1gjH0', 'C_8GQv1gjH0');
INSERT INTO `Item` VALUES(6, 'simspons cards', 'johnnym65', 'top trumph cards, lots of fun', 'Brand New', 'FREE TO USE', 'http://www.youtube.com/watch?v=TVD6FZcFaRo', 'TVD6FZcFaRo');
INSERT INTO `Item` VALUES(7, '5 paintings', 'johnnym65', '5 random paintings', 'Like New', 'FREE TO USE', NULL, NULL);
INSERT INTO `Item` VALUES(9, 'Acer Aspire 5920 Used', 'barryz1990', 'This is a Used Acer Aspire 5920, comes with everything it came with, power adapter, case ect. i like computer games, xboxs etc', 'Like New', 'FREE TO USE', 'http://www.youtube.com/watch?v=7H0K1k54t6A', '7H0K1k54t6A');
INSERT INTO `Item` VALUES(10, 'Family guy Season 4 boxset', 'simond111', 'Unwanted christmas gift, family guy season 4 boxset. works fine. few scratches but makes no difference.', 'Brand New', 'CURRENTLY IN GAME', 'http://www.youtube.com/watch?v=KJCfUm21BsI', 'KJCfUm21BsI');
INSERT INTO `Item` VALUES(11, 'Snow Patrol Tickets O2 dublin 30-03-2012, unable to attend', 'barryz1990', '2 Snow patrol tickets for the O2 dublin on the 30-03-2012. unable to attend through time conflicts. the tickets are standing in front of the stage.', 'Brand New', 'UP FOR AUCTION', NULL, NULL);
INSERT INTO `Item` VALUES(12, 'gold diamond earings', 'simond111', 'lovely gold diamong earings', 'Like New', 'FREE TO USE', 'http://www.youtube.com/watch?v=POXBiZfhMjs', 'POXBiZfhMjs');
INSERT INTO `Item` VALUES(13, 'sky plus remote comntrol', 'jasond1956', 'sky remote', 'Brand New', 'CURRENTLY IN GAME', 'http://www.youtube.com/watch?v=j8OQq7W_rew', 'j8OQq7W_rew');
INSERT INTO `Item` VALUES(14, 'ninja turtles poster', 'jasond1956', 'this is a ninja turtles poster', 'Like New', 'FREE TO USE', '', '');
INSERT INTO `Item` VALUES(15, 'kluhlj', 'jasond1956', 'jkjh', 'Poor Condition', 'FREE TO USE', '', '');
INSERT INTO `Item` VALUES(16, 'Guilt ticket', 'johnnym65', 'This is a ticket to guilt nightclub. free in', 'Brand New', 'FREE TO USE', '', '');
INSERT INTO `Item` VALUES(17, 'classic Alarm clock', 'Hsimpson', 'this is a classic alarm clock', 'Average Condition', 'UP FOR AUCTION', '', '');
INSERT INTO `Item` VALUES(18, 'Collection Of old Vinals', 'barryz1990', 'This is a collection of old vinals', 'Brand New', 'FREE TO USE', '', '');
INSERT INTO `Item` VALUES(19, 'blah', 'johnnym65', 'kjdsbf', 'Brand New', 'FREE TO USE', '', '');
INSERT INTO `Item` VALUES(20, 'bob', 'bob', 'bob', 'Brand New', 'FREE TO USE', '', '');
INSERT INTO `Item` VALUES(21, 'bob2', 'bob', 'bob2', 'Brand New', 'FREE TO USE', '', '');
INSERT INTO `Item` VALUES(22, 'Sony Headphones, Blue like new.', 'barryz1990', 'These are Like new sony high def headphones. crystal clear sound and very comfortable', 'Like New', 'CURRENTLY IN GAME', '', '');
INSERT INTO `Item` VALUES(24, '40 Euro Cash', 'jasond1956', '40 Euro cash', 'Brand New', 'UP FOR AUCTION', '', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Swap`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Swapchat`
--


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `swapoffer`
--

INSERT INTO `swapoffer` VALUES(1, 'jasond1956', 13, 13, '2012-02-26 19:26:28');
INSERT INTO `swapoffer` VALUES(2, 'jasond1956', 13, 13, '2012-02-26 19:26:35');

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

INSERT INTO `swappahgame` VALUES(1, 'Alpha', '2012-02-01 20:27:28', '2012-02-27 20:27:28', '2 weeks', 'n');
INSERT INTO `swappahgame` VALUES(2, 'Beta', '2012-01-28 20:38:20', '2012-02-24 20:38:20', '1 week', 'n');
INSERT INTO `swappahgame` VALUES(3, 'Delta', '2012-02-23 20:31:48', '2012-03-08 20:31:54', '2 weeks', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `username` varchar(20) NOT NULL,
  `passWord` varchar(100) NOT NULL,
  `location` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` VALUES('barryz1990', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'DIT Bolton Street', 'barryz1990@hotmail.com', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('bob', '48181acd22b3edaebc8a447868a7df7ce629920a', 'dit', 'bob', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('dr4ke616', '990c37a323daf1549bdd24197927625080ee16b8', 'DIT Kevin''s Street', 'adam.drakeford@mydit.ie', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('Hsimpson', '019db0bfd5f85951cb46e4452e9642858c004155', 'DIT Rathmines', 'mark.english@hotmail.com', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('jasond1956', '6c93344eeb6343965c5f486de10cbe4cbef9c7ec', 'DIT Bolton Street', 'jasond@hotmail.com', '13+Ballymun+Road,+Glasnevin,+Dublin,+Ireland');
INSERT INTO `User` VALUES('johnnym65', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'DIT Aungiers street	', 'j.m@hotmail.com', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('johnnym66', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'blah', 'jonny_murphy65@hotmail.com', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('johnnym67', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'blah', 'jonny_murphy65@hotmail.com', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('simond111', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'DIT Aungiers street	', 'sd@hotmail.com', 'galway+road,+Roscommon,+ireland');
INSERT INTO `User` VALUES('tommy65', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'Dit', 'tommy65@hotmail.com', '65+whitecliff,+whitechurch+road,+Rathfarnham,+dublin,+ireland');
INSERT INTO `User` VALUES('tommy66', 'ed7e67de233cbb2c18fb48a556598e1260aba52a', 'dit', 'jonny_murphy65@hotmail.com', '181+whitecliff,+whitechurch+road,+rathfarnham,+dublin,+Ireland');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `userreview`
--

INSERT INTO `userreview` VALUES(1, 'johnnym65', 'simond111', 'Very Prompt and easy to contact', 4);
INSERT INTO `userreview` VALUES(2, 'johnnym65', 'barryZ1990', 'ye', 3);
INSERT INTO `userreview` VALUES(3, 'johnnym65', 'barryZ1990', 'class', 1);
INSERT INTO `userreview` VALUES(4, 'simond111', 'johnnym65', 'poor, hard to contact. item not as good as made out to be', 2);
INSERT INTO `userreview` VALUES(5, 'jasond1956', 'johnnym65', 'Very good, good quality product', 4);
INSERT INTO `userreview` VALUES(6, 'simond111', 'johnnym65', 'grand job', 5);
INSERT INTO `userreview` VALUES(7, 'simond111', 'johnnym65', 'excellent ', 5);
INSERT INTO `userreview` VALUES(8, 'barryZ1990', 'jasond1956', 'very quick to reply. item was in the exact condition specified', 5);
INSERT INTO `userreview` VALUES(9, 'johnnym65', 'simond111', 'hjhjh', 5);