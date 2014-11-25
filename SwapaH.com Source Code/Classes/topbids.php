<?php
session_start();


//echo $_SESSION['username'];
echo "<font size = \"8\" face=\"arial\" color=\"#0080FF\"><b>Your Winning Bids</b></font>";
$username = $_SESSION['username'];

$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("SELECT * FROM Bid");
while($row = mysql_fetch_array($result))
{
	$iid = $row['Item_id'];
	$bid = $row['Bid_id'];
	
	
	//echo $aid;
	
	$result1 = mysql_query("SELECT * FROM Item WHERE Username = '$username' AND Item_id = '$iid'");
	while($row1 = mysql_fetch_array($result1))
	{	
		echo "<table border = \"0\"  width = \"700\"><tr>";
	
		echo "<td ALIGN=\"left\" VALIGN=\"bottom\"  height = \"300\"><font size=\"4\" face=\"arial\" color=\"#585858\"><b>";
		echo "<br><br>Your Top Bid<br>";
		echo $row1['Title']."<br></b></font>";
		echo "<form action=\"viewitem.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$iid". " />";
																																										
		echo "<div style=\"border-style:solid;border-color:#6E6E6E;width:256px\"><div style=\"border-style:solid;border-color: yellow;width:250px\"><input type=\"image\" src=\"image/upload/"."$iid". "1.jpg\" alt=\"Smiley face\" height=\"200\" width=\"250\" /></form></div></div></td>";
	
	
		echo "<td width = \"320\" VALIGN = \"middle\" ALIGN = \"center\">";
		echo "<img src = 'swapicon.png' />";
		echo "</td>";
	
	
	echo "<td height = \"180\" ALIGN=\"left\" >";
	$result2 = mysql_query("SELECT * FROM Bid WHERE Item_id = '$iid'");
	while($row2 = mysql_fetch_array($result2))
	{
	 	$aid = $row2['Auction_id'];
	}
	
	$result3 = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$aid'");
	while($row3 = mysql_fetch_array($result3))
	{
	 	$iid2 = $row3['Item_id'];
	}
	
	$result4 = mysql_query("SELECT * FROM Item WHERE Item_id = '$iid2'");
	while($row4 = mysql_fetch_array($result4))
	{
		echo "<font size=\"4\" face=\"arial\" color=\"#585858\"><b>";
		echo "Auction<br>";
	 	echo $row4['Title'];
	 	
	 	echo "<form action=\"Auction.php\" method=\"post\"><input type= \"hidden\" name=\"aid\" value="."$aid". " />";
																																										
		echo "<div style=\"border-style:solid;border-color:#6E6E6E;width:256px\"><div style=\"border-style:solid;border-color: yellow;width:250px\"><input type=\"image\" src=\"image/upload/"."$iid2". "1.jpg\" alt=\"Smiley face\" height=\"200\" width=\"250\" /></form></div></div></td></tr>";
	}
	
	echo "<tr><td align = \"center\">";


	echo "<form action=\"swapchat.php\" method=\"post\"><input type= \"hidden\" name=\"aid\" value="."$aid". " />";
	echo "<input type=\"image\" src=\"swapchat.png\" alt=\"Submit\" /></form>";

	echo "</td><td></td><td>";
	echo "status: ";


	echo "</td></tr></b></font></table>";
	
	}
}
	
	
	




?>