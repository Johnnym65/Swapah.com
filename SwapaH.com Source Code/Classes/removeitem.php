<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: allows users to delete a free to use item from their inventory



		-->*/		
?>
<?php

 session_start();

//echo $_SESSION['username'];

$username = $_SESSION['username'];
$iid = $_POST['iid'];





$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);


				
   mysql_query(" DELETE FROM Item
	WHERE Item_id ='$iid' ");
   mysql_query(" DELETE FROM BidOffer
	WHERE Item_id ='$iid' ");



header("location:inventory.php");

?>