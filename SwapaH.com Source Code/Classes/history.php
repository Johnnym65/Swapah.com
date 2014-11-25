<?php
session_start();
include("header.php"); 

//echo $_SESSION['username'];

$username = $_SESSION['username'];
//$username = "johnnym65";
$firstindex = 0;
$colrowindex = 0;
$rowcolindex = 1;

$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("SELECT * FROM Auction WHERE username = '$username'"); //order by AuctionID desc limit 6


echo "<div style=\"position:absolute;top:200;left:300;   \">";
echo "<font size = \"8\" face=\"arial\" color=\"#0080FF\"><b>History</b></font>";
echo "<table border = \"0\" width=\"750\" cellspacing=\"30\">";

while($row = mysql_fetch_array($result))
  {
$colrowindex++;
$rowcolindex++;

if($row['Finished'] == "yes")
{


		
		echo "<tr>";

echo "<td ALIGN=\"center\">";
  
  $auctionid = $row['AuctionID'];
 
  $item = $row['Item_id'];
  $endt = $row['end_time'];
  
  $tbid = $row['Bid_id'];

echo"<div style=\"border-width:thin; border-style:solid; border-color:#BDBDBD\">";
echo "<table border = \"1\"  width = \"700\"><tr>";

echo "<font size=\"6\" face=\"arial\" color=\"#585858\"><b>";
echo "<tr><td> Your Auction</td><td></td><td>Winning Bid</td></tr>";
echo "</b></font>";





// Delimiters may be slash, dot, or hyphen
$date = "04/30/1973";
list($year, $month, $day, $hour, $minute, $second) = split('[-: ]', $endt);
//echo "Month: $month; Day: $day; Year: $year; Hour: $hour; Minute: $minute; Second: $second<br />\n";
$month = ($month - 1);

//echo $item;

$result1 = mysql_query("SELECT * FROM Item WHERE Item_id = $item");

while($row1 = mysql_fetch_array($result1))
  {

		$title = $row1['Title'];
  		echo "<td ALIGN=\"left\" VALIGN=\"bottom\"  height = \"300\"><font size=\"4\" face=\"arial\" color=\"#585858\"><b>".$row1['Title']."</b></font>";
  		$description = $row1['Description'];
  		$condition = $row1['Condition'];
  		
  }
//echo $endt;
echo "<form action=\"auction.php\" method=\"post\"><input type= \"hidden\" name=\"aid\" value="."$auctionid". " />";
																																										
echo "<div style=\"border-style:solid;border-color:#6E6E6E;width:256px;height:206\"><div style=\"border-style:solid;border-color: yellow;width:250px;height:200\"><input type=\"image\" src=\"image/upload/"."$item". "1.jpg\" alt=\"Smiley face\" height=\"200\" width=\"250\" /></div></div></form></td>";






echo "<td width = \"320\" VALIGN = \"middle\" ALIGN = \"center\">";

echo "<img src = 'swapicon.png' />";
echo "</td>";













echo "<td height = \"180\" ALIGN=\"left\" >";




if($tbid != 0)
{

$result3 = mysql_query("SELECT * FROM Bid WHERE Bid_id = $tbid");

while($row3 = mysql_fetch_array($result3))
  {
  		
  		$topbiditem = $row3['Item_id'];
  		
  		
  }
  
  
$result4 = mysql_query("SELECT * FROM Item WHERE Item_id = $topbiditem");

while($row4 = mysql_fetch_array($result4))
{
  		
  	$topbiditemtitle = $row4['Title'];
  		
  		
}




echo "<font size=\"3\" face=\"arial\" color=\"#585858\"><b>";

echo "</b></font>";



echo "<font size=\"2\" face=\"arial\" color=\"#585858\"><b>";
echo $topbiditemtitle;
echo "</b></font>";
echo "<div style=\"border-style:solid;border-color:#6E6E6E;width:256px;height:206\"><div style=\"border-style:solid;border-color: yellow;width:250px; height:200\">";
echo "<form action=\"viewitem.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$topbiditem". " >";
echo "<input type=\"image\" src=\"image/upload/"."$topbiditem". "1.jpg\" alt=\"Smiley face\" height=\"200\" width=\"250\"  /></form></div>";

}
else
{
	echo "No Winning Bid";
}








echo "</td></tr>";



echo "<tr><td align = \"center\">";
/*
echo"<div style=\"border-width: 4px; border-style: solid; border-color:#0080FF; background-color:#58D3F7; width:200; height:20\">";
echo "<div style = \"position:relative;top:3;left:0;\">";
echo"<font size=\"3\" face=\"arial\" color=\"white\"><b>VIEW SWAP OFFERS</b></font>";
echo "</div>";
echo"</div>";
*/

echo "<form name = \"$title\" action=\"swapchat.php\" method=\"post\"><input type= \"hidden\" name=\"aid\" value="."$auctionid". " />";
echo "<input type=\"image\" src=\"swapchat.png\" alt=\"Submit\" />";
echo "</form>";

//echo "<a HREF=\"JAVASCRIPT:document.$title.submit()\"><img src=\"swapchat.png\" alt=\"Submit\" /></a>";

echo "</td><td></td><td>";
echo "status: ";


echo "</td></tr></table>";
echo "</div>";

}

echo "</td>";
echo "</tr>";
}


echo "</table>";
echo "</div>";

mysql_close($con);

include("categories.php"); 
?>