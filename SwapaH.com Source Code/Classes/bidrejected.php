<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: deletes a bid when its rejected



		-->*/		
?>
<?php

session_start();
// store session data
$username = $_SESSION['username'];
$auctionid = $_SESSION['auctionid'];


$itemID = $_POST['iid'];



$offerID = $_POST['oid'];








$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

  
  

				
   mysql_query(" DELETE FROM BidOffers
	WHERE Offerid ='$offerID' ");
  
  
  
   	  		$result3 = mysql_query("SELECT * FROM Item WHERE Item_id = '$itemID'  ");
  	  		while($row3 = mysql_fetch_array($result3))
 	  		{
 	  			$auctionuser = $row3['Username'];
 	  			//echo $auctionuser;
 	  		}
  
  
  
  
       mysql_query("INSERT INTO BidOfferResultMessage
  VALUES ('','$auctionid', 'No', '$auctionuser', 'Rejected')");
  
  
  
  
  
  

 	mysql_close($con);
 
 
header("location:yourauctions.php");



?>