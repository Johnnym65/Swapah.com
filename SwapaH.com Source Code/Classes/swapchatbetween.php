<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: 



		-->*/		
?>
<?php

 session_start();

//echo $_SESSION['username'];

$username = $_SESSION['username'];
$auction = $_POST['aid'];

echo "<table border = \"0\"><tr><td>";


echo "<table border = \"0\"  cellspacing=\"0\"><tr>";
$username = $_SESSION['username'];
$colrowindex = 0;

$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);
 
$result = mysql_query("SELECT * FROM Bid WHERE Auction_id = '$auction' ORDER BY Bid_id DESC  ");
while($row = mysql_fetch_array($result))
{
	echo "<td>";
	$iid = $row['Item_id'];
	$bid = $row['Bid_id'];
	$userc = $row['usercomplete'];
  	$bidderc = $row['biddercomplete'];
	
	
	//echo $aid;
	
	$result1 = mysql_query("SELECT * FROM Item WHERE Username = '$username' AND Item_id = '$iid'");
	while($row1 = mysql_fetch_array($result1))
	{	
		
	$result2 = mysql_query("SELECT * FROM Bid WHERE Item_id = '$iid'");
	while($row2 = mysql_fetch_array($result2))
	{
	 	$aid = $row2['Auction_id'];
	}
	
	
	
	$result3 = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$auction'");
	while($row3 = mysql_fetch_array($result3))
	{
	 	$iid2 = $row3['Item_id'];
	 	$isfinished = $row3['Finished'];
	}
	
	if($isfinished == "yes")
	{
	
	$result4 = mysql_query("SELECT * FROM Item WHERE Item_id = '$iid2'");
	while($row4 = mysql_fetch_array($result4))
	{
		$otheruser = $row4['Username'];
		

	
	

		echo"<div class = \"else\" style=\"position:relative;top:10;left:0;border-width:thin; border-style:solid; border-color:#BDBDBD; background-color:White; \">";
		echo "<table border = \"0\" width = \"330\">";
		echo "<tr><td>";
		
		echo "<font size=\"4\" face=\"arial\" color=\"#585858\"><b>".$row4['Title']."</b></font>";
		echo "</td></tr>";
		
		
	 	echo "<form action=\"auction.php\" method=\"post\"><input type= \"hidden\" name=\"aid\" value="."$aid". " />";
																																										
		echo "<tr><td ALIGN = \"center\"><div style=\"border-style:solid;border-color:#6E6E6E;width:256px;height:206\"><div style=\"border-style:solid;border-color: yellow;width:250px;height:200\"><input type=\"image\" src=\"image/upload/"."$iid2". "1.jpg\" alt=\"Smiley face\" height=\"200\" width=\"250\" /></div></div></form></td></tr>";

		echo "<tr><td Align = \"center\">";
		echo "<img src = 'swapicon1.png' />";
		echo "</td></tr>";
		
		echo "<tr><td align = \"left\" style = \"padding-left:17\">";
		echo "<font size = \"3\" face=\"arial\" color=\"#0080FF\">";
		echo "<b><u>Your</u></b> Winning Bid";
		echo "</font>";
		echo "</td></tr>";
		
		
		
		echo "<font size=\"3\" face=\"arial\" color=\"#585858\"><b>";
	echo "</b></font>";

	echo "<tr><td align = \"center\">";

	echo "<table width = \"300\"><tr>";
	echo "<td><div style=\"border-style:solid;border-color:#6E6E6E;width:106px;height:86\"><div style=\"border-style:solid;border-color: yellow;width:100px; height:80\">";
	echo "<form action=\"viewitem.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$iid". " >";
	echo "<input type=\"image\" src=\"image/upload/"."$iid". "1.jpg\" alt=\"Smiley face\" height=\"80\" width=\"100\"  /></form></div></div></td>";
	echo "<td align = \"left\"VALIGN = \"top\">";
	echo "<font size=\"2\" face=\"arial\" color=\"#585858\"><b>";
	echo $row1['Title'];
	echo "</b></font></td></tr></table>";
	echo "</td></tr>";
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	
		
		
	
	

		
		echo "<font size=\"4\" face=\"arial\" color=\"#585858\"><b>";
		
	 	
	 
	
	
	echo "<form action=\"swapstatuschange1.php\" method=\"post\" >";
	echo "<input type= \"hidden\" name=\"bid\" value=\"$bid\" />";
	echo "<tr><td align = \"center\">";
	echo "<font size=\"2\" face=\"arial\" color=\"#585858\"><b>";
	echo "<br>Auctioneer status: ";
	echo "</b></font>";


if($userc == "n")
{
	echo "<font size=\"2\" face=\"arial\" color=\"Red\"><b>";
	echo "INCOMPLETE<br>";
	echo "</b></font>";
}
else
{
	echo "<font size=\"2\" face=\"arial\" color=\"Green\"><b>";
	echo "COMPLETE<br>";
	echo "</b></font>";
}
echo "</td></tr>";

echo "<tr><td align = \"center\">";
echo "<font size=\"2\" face=\"arial\" color=\"#585858\"><b>";
echo "<br>Your Status: ";
echo "</b></font>";


if($bidderc == "n")
{
	echo "<select name=\"complete\" size=\"1\"> <option value=\"n\">INCOMPLETE</option><option value=\"y\">COMPLETE</option></select>";
	
	echo "<input type = \"submit\" value = \"Confirm\"/>";
	

}
else
{
	echo "<font size=\"2\" face=\"arial\" color=\"Green\"><b>";
	echo "COMPLETE<br>";
	echo "</b></font>";
}



echo "</td></tr></table>";
//if($bidderc == "y" && $userc == "y")
//{
	

//}


echo "</td>";
	echo "</div>";
	}
	
	$colrowindex++;
	if(($colrowindex % 2) == 0)
	{
		echo "</tr><tr>";
	}
	
	
	}

	}
	
	
}

	echo "</table>";
	echo "</div>";






echo "</td><td>";












echo "<iframe src=\"swapchat.php?aid=".$auction."\" width = \"608\" height = \"572\" style = \"position:relative; top:10\"></iframe>";
echo "</td></tr></table>";
mysql_close($con);

 
?>