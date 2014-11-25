<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: puts a bid offer into the system



		-->*/		
?>
<?php 
session_start();
include("header.php"); 

$AuctionID = $_POST['aid'];

$_SESSION['auctionid']=$AuctionID;
//echo $AuctionID;



$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result3 = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$AuctionID'");

while($row3 = mysql_fetch_array($result3))
{
 	  
 	  $item = $row3['Item_id'];
 	  
 	  
 	  
 	  	$result4 = mysql_query("SELECT * FROM Item WHERE Item_id = '$item'  ");
		while($row4 = mysql_fetch_array($result4))
 	  	{
 	  		$title = $row4['Title'];
 	  	}
 	  	
 	  	
}
	







echo "<div style=\"position:absolute;top:200;left:300;\">";

echo "<font size = \"5\" face=\"arial\" color=\"#0080FF\"><b>Bid Offers For ".$title." </b></font>";
$result = mysql_query("SELECT * FROM BidOffers WHERE Auction_id = '$AuctionID'  ");

while($row = mysql_fetch_array($result))
 	  {
 	  	$itemID = $row['Item_id'];
 	  	//echo $itemID;
 	  	$offerid = $row['Offerid'];
 	  	
 	  	
 	  	$result1 = mysql_query("SELECT * FROM Item WHERE Item_id = '$itemID'  ");
 	  	while($row1 = mysql_fetch_array($result1))
 	 	{
 	 	
 	 		echo "<div style=\"position:relative; top:50px; left:100px; width:500px; border-color:grey; border-style:solid\">";
 	 		echo "<table border = \"0\" width = \"500\"  bgcolor=\"#E6E6E6\">";
 	 	
 	 		echo "<tr><td colspan = \"2\">";
 	 		echo "<font size=\"4\" face=\"arial\" color=\"#585858\"><b>";
 	 		echo $row1['Title'];
 	 		echo $offerid;
 	 		echo "</b></font>";
 	 		echo "</tr></td>";
 	 		echo "<tr><td rowspan = \"2\">";
 	 		
 	 		
 	 		echo "<form action=\"viewitem.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$itemID". " >";
 	 		
 	 		echo "<input type=\"image\" src=\"image/upload/"."$itemID". "1.jpg\" alt=\"Smiley face\" height=\"110\" width=\"150\" style = \"border:4px solid yellow;\" /></form>";
 	 		
 	 		
 	 		
 	 		echo "</td>";
 	 		echo "<td colspan = \"2\">";
 	 		echo "<font size=\"3\" face=\"arial\" color=\"#585858\"><b><br>offered by: </b></font><a href = \"account.php?userid=".$row1['Username']." \"><font size=\"3\" face=\"arial\" color=\"#0080FF\"><b>".$row1['Username']."</b></font></a><br>";
 	 		$offertime = $row['offertime'];
 	 		
 	 		$today = date('20y-m-0j h:i:s');


			//$diff = abs( - );
			//$diff = ($diff/60)/60;
			//$diff2 = (int)$diff;
			
			$diffs = floor(($today-$offertime)/3600);
			
			echo "<font size=\"3\" face=\"arial\" color=\"#585858\"><b><br>Offer Time: </b></font><font size=\"3\" face=\"arial\" color=\"#0080FF\"><b>".$diffs." Hours Ago</b></font>";
			echo "</td></tr>";
			echo "<tr><td Align = \"center\">";
			
			echo "<form action=\"bidaccept.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$itemID". " /><input type= \"hidden\" name=\"oid\" value="."$offerid". " >";
			echo "<input type=\"image\"  src=\"Accept.png\" alt=\"some_text\"/></form> ";
			
			echo "</td><td>";
			
			echo "<form action=\"bidrejected.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$itemID". " /><input type= \"hidden\" name=\"oid\" value="."$offerid". " >";
			echo "<input type=\"image\"  src=\"Reject.png\" alt=\"some_text\"/></form>";
			
			echo "</td></tr>";
			echo "</table></div><br><br>";
 	 	}

 	  	
 	  	
 	  }

if(mysql_num_rows($result) == 0)
{
	echo "<div align=\"center\" style=\"position:relative; top:100px; left:100px;height:100; border-color:grey; border-style:solid\">";
	echo "<table height = \"100\" border = \"0\"><tr><td valign=\"middle\">";
	echo "<font size=\"5\" face=\"arial\" color=\"red\"><b>";
	echo "NO BID OFFERS ON THIS ITEM</b></font></td></tr></table>";
	echo "</div>";
}



echo "</div>";
include("categories.php"); 
include("footer.php"); 

?>