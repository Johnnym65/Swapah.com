<?php

session_start();
// store session data
$username = $_SESSION['username'];
$auctionid = $_SESSION['auctionid'];

$itemID = $_POST['iid'];

$today = date('20y-m-j H:i:s');



$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result1 = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$auctionid'");
while($row1 = mysql_fetch_array($result1))
  {
  	$endtime =  $row1['end_time'];
  	
  
  
  }
  
  if(strtotime($endtime) > strtotime($today))
  {

  mysql_query("INSERT INTO BidOffers 
  VALUES ('', '$auctionid','$itemID','$username', '$today')");
  
  
  $result = mysql_query("SELECT * FROM BidOffers order by Offerid desc limit 1");
  
  while($row = mysql_fetch_array($result))
  {
  	$offerid = $row['Offerid'];
  	
  }
  
  /*
  mysql_query("UPDATE Auction
				SET Bid_id='$bidid'
				WHERE AuctionID='$auctionid'");
  
   */
 

 $result2 = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$auctionid'  ");
  	  	while($row2 = mysql_fetch_array($result2))
 	  	{
 	  		
 	  		$itemid = $row2['Item_id'];
 	  		//echo $itemid;
 	  		
 	  		
 	  		$result3 = mysql_query("SELECT * FROM Item WHERE Item_id = '$itemid'  ");
  	  		while($row3 = mysql_fetch_array($result3))
 	  		{
 	  			$auctionuser = $row3['Username'];
 	  			//echo $auctionuser;
 	  		}
 	  	
 	  		
 	  		
		}
 
 

  
   mysql_query("INSERT INTO Bidmessages
  VALUES ('','$offerid', 'No', '$auctionuser')");
  }
  header("location:auction.php");

	mysql_close($con);
?>