<?php

session_start();
// store session data
$username = $_SESSION['username'];
$auctionid = $_SESSION['auctionid'];



$itemID = $_POST['iid'];


$offerID = $_POST['oid'];


$today = date('20y-m-j H:i:s');



$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

  $result1 = mysql_query("SELECT * FROM Bid WHERE Auction_id = '$auctionid'");
  while($row1 = mysql_fetch_array($result1))
  {
  		$topitem =  $row1['Item_id'];
  		//echo "auction:".$auctionid."<br> itemid:".$topitem;
  }

  mysql_query("INSERT INTO Bid 
  VALUES ('', '$auctionid','$itemID','$username', '$today', 'n', 'n')");
  
  
  
  
  $result = mysql_query("SELECT * FROM Bid order by Bid_id desc limit 1");
  
  while($row = mysql_fetch_array($result))
  {
  	$bidid = $row['Bid_id'];
  	
  }
  
  mysql_query("UPDATE Auction
				SET Bid_id='$bidid'
				WHERE AuctionID='$auctionid'");
				
   mysql_query(" DELETE FROM BidOffers
	WHERE Offerid ='$offerID' ");
	
	    mysql_query("UPDATE Item
				SET Status='TOP BID IN AUCTION'
				WHERE Item_id='$itemID'");
				
  mysql_query("UPDATE Item
				SET Status='FREE TO USE'
				WHERE Item_id='$topitem'");
   mysql_query(" DELETE FROM Bid
	WHERE Item_id ='$topitem' ");
 	  		
 	  		
 	  		$result3 = mysql_query("SELECT * FROM Item WHERE Item_id = '$itemID'  ");
  	  		while($row3 = mysql_fetch_array($result3))
 	  		{
 	  			$auctionuser = $row3['Username'];
 	  			//echo $auctionuser;
 	  		}
 	  	
 	  		
 	  		
		
				
				
				
				
				
				
				
				
				
				
				
				
				
				
     mysql_query("INSERT INTO BidOfferResultMessage
  VALUES ('','$auctionid', 'No', '$auctionuser', 'ACCEPTED')");

  

 
 
 
  header("location:yourauctions.php");

	mysql_close($con);

?>