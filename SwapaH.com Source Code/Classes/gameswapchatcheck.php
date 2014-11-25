<?php

session_start();


$message = $_POST['chatbox'];
$username = $_SESSION['username'];
$swapid = $_POST['sid'];



$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

if ($message != NULL)
{
	mysql_query("INSERT INTO gameswapchat
  	VALUES ('','$swapid', '$username', '$message')");
  
}

header("location:gameswapchat.php");

?>