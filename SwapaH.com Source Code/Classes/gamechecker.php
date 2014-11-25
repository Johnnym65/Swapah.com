<?php

session_start();
// store session data
$username = $_SESSION['username'];


$gameID = $_POST['gid'];
$itemID = $_POST['iid'];


//echo $gameID;
//echo $username;
//echo $itemID;



$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

mysql_query("INSERT INTO gameusers 
						VALUES ('$gameID', '$username', '$itemID', '$itemID')");
						
					
mysql_query("UPDATE Item
				SET Status='CURRENTLY IN GAME'
				WHERE Item_id='$itemID'");
						


Header("location:game.php?gid=".$gameID);
?>