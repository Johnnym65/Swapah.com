<?php

/*

<!-- 
     Author: Jonathan Murphy
Description: displays the about swapah page



		-->
*/		
?>
<?php
session_start();

include("header.php"); 




echo "<div style=\"position:absolute;top:260;left:300; width:700  \">";
echo "<font size = \"6\" face=\"arial\" color=\"Grey\"><b> About SwapaH.com</b></font><br><br>";
echo "<font size = \"3\" face=\"arial\" color=\"#0080FF\"><b>";
echo "
The use of the internet for the buying and selling of goods and services has in recent years increased significantly. Companies such as eBay and Amazon have thrived. The idea of customer-to-customer transactions is being used more and more, but there still seems to be something missing.

The objective of this project is to design and implement a website that allows users to trade or swap unwanted items they may own with each other through the means of an online auction or through a new swapping game concept. This website is designed to give the user a more fun an interesting way of getting rid of unwanted items. These unwanted items could be of value to someone else. <br><br>Instead of the usual auction site were a bid of money is made for the item up for auction, users will bid with other items they own. The seller can accept or reject bids, depending on what they like. By the end of the auction, two users will end up getting rid of something they don’t in exchange for something they do! 
The game section of the site is based on the true story of a man who started off with a red paper clip, he swapped that paperclip for something a little better, he kept doing this until he eventually got a house. The site will give users a fun way swapping there items with other users. The users will start off with one of their items up for swap. They can swap that item with another users item. They can then swap their new item for another and so on. When the game ends whatever item you have you get to keep. 
";

echo "</div>";
include("footer.php"); 
?>