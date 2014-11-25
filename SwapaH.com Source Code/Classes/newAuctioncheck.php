<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: validates the user input for new auction.



		-->*/		
?>
<?php
session_start();
$username = $_SESSION['username'];
$errormessage;

$itemid = $_POST['itemid'];
$length = $_POST['Length'];
$description = $_POST['description'];
$allowQ = $_POST['allowq'];



if($itemid == null)
{
	$errormessage = "*no item chosen<br>";
}





//$today = date('h-i-s, j-m-y');
//$month = date('m');
//$day = date('j');
//$day = ($day + 20);
$today = date('20y-m-j H:i:s', strtotime("+".$length." days"));


//echo $month."<br>";
//echo $day;

if($errormessage != null)
{
	Header("location:newauction.php?error=".$errormessage."");
}
else
{


$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

  mysql_query("INSERT INTO Auction 
  VALUES ('', '$today','$username','$itemid','','$allowQ', 'no')");
  
    mysql_query("UPDATE Item
				SET Status='UP FOR AUCTION'
				WHERE Item_id='$itemid'");
  
  mysql_close($con);

Header("location:yourauctions.php");

}
  ?>