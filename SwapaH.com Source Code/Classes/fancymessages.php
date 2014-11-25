<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: displays fancybox containing new messages



		-->*/		
?>
<?php

session_start();
$username = $_SESSION['username'];

$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);


  
  $result5 = mysql_query("SELECT * FROM Bidmessages WHERE username = '$username' AND beenRead = 'No' ");
  
  while($row = mysql_fetch_array($result5))
  {
  	  $offerid = $row['Offerid'];
  	  
  	 // echo $bidid;
  	  $result1 = mysql_query("SELECT * FROM BidOffers WHERE Offerid = '$offerid'  ");
  	  while($row1 = mysql_fetch_array($result1))
 	  {
 	  	$auctionid = $row1['Auction_id'];
 	  	$bidder = $row1['username'];
 	  	//echo $auctionid;
 	  	
 	  	$result2 = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$auctionid'  ");
  	  	while($row2 = mysql_fetch_array($result2))
 	  	{
 	  	
 	  		$itemid = $row2['Item_id'];
 	  		//echo $itemid;
 	  		
 	  		
 	  		$result3 = mysql_query("SELECT * FROM Item WHERE Item_id = '$itemid'  ");
  	  		while($row3 = mysql_fetch_array($result3))
 	  		{
 	  			echo $bidder." offered a swap on your Auction ".$row3['Title']."<br><br>";
 	  		}
 	  	
 	  		
 	  		
		}
		
	  }

  }

  
  
  
  $result6 = mysql_query("SELECT * FROM Bidmessages WHERE username = '$username' AND beenRead = 'Yes' ");
  
  while($row = mysql_fetch_array($result6))
  {
  	  $offerid = $row['Offerid'];
  	  
  	 // echo $bidid;
  	  $result1 = mysql_query("SELECT * FROM BidOffers WHERE Offerid = '$offerid'  ");
  	  while($row1 = mysql_fetch_array($result1))
 	  {
 	  	$auctionid = $row1['Auction_id'];
 	  	$bidder = $row1['username'];
 	  	//echo $auctionid;
 	  	
 	  	$result2 = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$auctionid'  ");
  	  	while($row2 = mysql_fetch_array($result2))
 	  	{
 	  	
 	  		$itemid = $row2['Item_id'];
 	  		//echo $itemid;
 	  		
 	  		
 	  		$result3 = mysql_query("SELECT * FROM Item WHERE Item_id = '$itemid'  ");
  	  		while($row3 = mysql_fetch_array($result3))
 	  		{
 	  			echo $bidder." offered a swap on your Auction ".$row3['Title']."<br><br>";
 	  		}
 	  	
 	  		
 	  		
		}
		
	  }

  }
  
  
  $result7 = mysql_query("SELECT * FROM BidOfferResultMessage WHERE username = '$username' AND beenRead = 'No' ");
  
  while($row = mysql_fetch_array($result7))
  {
  	  $auctionid = $row['AuctionID'];
  	  $offerresult = $row['Result'];
  	  
  	  //echo $auctionid;
  	  //echo $offerresult;
  	  
  	 // echo $bidid;

 	  	
 	  	$result2 = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$auctionid'  ");
  	  	while($row2 = mysql_fetch_array($result2))
 	  	{
 	  	
 	  		$itemid = $row2['Item_id'];
 	  		//echo $itemid;
 	  		$Auctioneer = $row2['username'];
 	  		
 	  		$result3 = mysql_query("SELECT * FROM Item WHERE Item_id = '$itemid'  ");
  	  		while($row3 = mysql_fetch_array($result3))
 	  		{
 	  			echo $Auctioneer." has ".$offerresult." your bid for the auction ".$row3['Title']."<br><br>";
 	  		}
		
		
	  	}

  }
  
  if(($result5 == NULL) && ($result6 == NULL) && ($result6 == NULL))
  {
  	echo "NO NEW MESSAGES";
  }
  else
  {
  	//echo "error";
  }


    mysql_query("UPDATE Bidmessages
				SET beenRead='Yes'
				WHERE beenRead='No' AND username = '$username'");
				
    mysql_query("UPDATE BidOfferResultMessage
				SET beenRead='Yes'
				WHERE beenRead='No' AND username = '$username'");



mysql_close($con);

?>