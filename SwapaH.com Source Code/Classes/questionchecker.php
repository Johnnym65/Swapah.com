<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: validates the question enetered by the user



		-->*/		
?>
<?php

session_start();

$username = $_SESSION['username'];
$auctionid = $_POST['aid'];
$question = $_POST['question'];


//echo $username."".$auctionid."".$question;


$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

  mysql_query("INSERT INTO AuctionQuestion 
  VALUES ('', '$auctionid','$username','$question', NULL)");
  
    header("location:auction.php");
?>