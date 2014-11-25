<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: Updates the item with new info



		-->*/		
?>
<?php
session_start();
 

$username = $_SESSION['username'];


$itemid = $_POST['iid'];
$description = $_POST['description'];
$condition = $_POST['Condition'];
$condition1 = "hello";
$ylink = $_POST['ylink'];


//echo $condition1;
//echo $titles;
//echo $itemid."<br>";
//echo $description."<br>";
//echo $condition."<br>";
//echo $ylink."<br><br>";

$pieces = explode("=", $ylink);
$pieces2 = explode("&",$pieces[1]);

//echo $pieces2[0];



$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

mysql_query("UPDATE Item
SET Description='$description', youtubelink = '$ylink', yid = '$pieces2[0]'
WHERE Item_id = '$itemid'");

mysql_close($con);

  header("location:inventory.php");

?>