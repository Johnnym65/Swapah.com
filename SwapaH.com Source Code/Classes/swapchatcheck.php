<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: enters a new chat message into the system



		-->*/		
?>
<?php

session_start();


$message = $_POST['chatbox'];
$username = $_SESSION['username'];
$auctionid = $_POST['aid'];



$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

if ($message != NULL)
{
	mysql_query("INSERT INTO Swapchat
  	VALUES ('','$auctionid', '$username', '$message')");
  
}

header("location:swapchat.php");

?>