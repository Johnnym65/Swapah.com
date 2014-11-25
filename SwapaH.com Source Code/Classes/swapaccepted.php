<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: puts a new swap into the system when its accepted



		-->*/		
?>
<?php

session_start();
// store session data
$username = $_SESSION['username'];


$itemID = $_POST['iid'];
$currentitem = $_POST['ciid'];
$swapid = $_POST['sid'];
$gameID = $_SESSION['gameid'];

//echo $itemID;
//echo $currentitem;

//echo $gameID;

//echo $username;

//echo $swapuser;

$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("SELECT * from gameusers where currentitem_id = '$itemID'");

while($row = mysql_fetch_array($result))
{
	$swapuser = $row['username'];
}


 mysql_query("UPDATE gameusers
				SET currentitem_id='$currentitem'
				WHERE currentitem_id='$itemID'");


 mysql_query("UPDATE gameusers
				SET currentitem_id='$itemID'
				WHERE currentitem_id='$currentitem' AND username = '$username'");
				
  mysql_query(" DELETE FROM swapoffer
	WHERE swapitem_id ='$currentitem' ");
  mysql_query(" DELETE FROM swapoffer
	WHERE Item_id ='$itemID' ");
  mysql_query(" DELETE FROM swapoffer
	WHERE swapitem_id ='$itemID' ");
	mysql_query(" DELETE FROM swapoffer
	WHERE Item_id ='$currentitem' ");
	
  mysql_query("INSERT INTO Swap 
  VALUES ('', '$gameID','$itemID','$currentitem','$username','$swapuser', 'n', 'n')");
  
Header("location:game.php?gid=".$gameID);
?>