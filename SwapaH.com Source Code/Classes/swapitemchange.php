<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: changes the swap status to complete



		-->*/		
?>
<?php

session_start();
// store session data
$username = $_SESSION['username'];
$auctionid = $_SESSION['auctionid'];

$swapid = $_POST['sid'];

$item = $_POST['item'];

$complete = $_POST['complete'];
$gid = $_POST['gid'];

//echo $swapid." ".$item." ".$complete;



$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

if($item == "Current" && $complete == 'y')
{
mysql_query("UPDATE Swap
				SET currentowners='y'
				WHERE Swapid='$swapid'");
				
}
elseif($item == "Swap" && $complete == 'y')
{
	mysql_query("UPDATE Swap
				SET swapowners='y'
				WHERE Swapid='$swapid'");
				
}

header("location:game.php?gid=".$gid);



?>