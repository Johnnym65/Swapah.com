<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: Allows a user to delete an auction thats ended with no winner



		-->*/		
?>
<?php

 session_start();

//echo $_SESSION['username'];

$username = $_SESSION['username'];
$aid = $_POST['aid'];





$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$aid' ");
while($row = mysql_fetch_array($result))
{
	$item = $row['Item_id'];
	//echo $item;

  mysql_query("UPDATE Item
				SET Status='FREE TO USE'
				WHERE Item_id='$item'");
				
   mysql_query(" DELETE FROM Auction
	WHERE AuctionID ='$aid' ");

}

header("location:tabstest.php");

?>