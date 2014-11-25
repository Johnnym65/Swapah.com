<?php

session_start();
//include("header.php"); 

$itemid = $_POST['iid'];
/*

$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("Users", $con);

$result = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$auctionid'");






while($row = mysql_fetch_array($result))
  {
  }
*/
  echo "<div style=\"position:absolute;top:500;left:500; width:500\">";

echo $itemid."</div>";











?>