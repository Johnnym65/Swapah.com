<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: changes auction swap status to complete



		-->*/		
?>
<?php

session_start();
// store session data
$username = $_SESSION['username'];
$auctionid = $_SESSION['auctionid'];

$bidid = $_POST['bid'];

$complete = $_POST['complete'];



$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

mysql_query("UPDATE Bid
				SET biddercomplete='$complete'
				WHERE Bid_id='$bidid'");

header("location:tabstest.php");

?>