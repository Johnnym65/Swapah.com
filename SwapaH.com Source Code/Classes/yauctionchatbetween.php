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
$auctionid = $_POST['aid'];

echo "<table border = \"0\"><tr><td>";


//echo $_SESSION['username'];


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

$result = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$auctionid'"); //order by AuctionID desc limit 6


echo "<table border = \"0\"  cellspacing=\"0\"><tr>";


while($row = mysql_fetch_array($result))
  {
  



if($row['Finished'] == "yes")
{


		

echo "<td>";
  
  $auctionid = $row['AuctionID'];
 
  $item = $row['Item_id'];
  $endt = $row['end_time'];
  
  $tbid = $row['Bid_id'];
 

echo"<div class = \"else\" style=\"border-width:thin; border-style:solid; border-color:#BDBDBD; background-color:White;\">";
echo "<table border = \"0\" width = \"330\" height = \"571\">";




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
		
		echo "<tr><td>";
  		echo "<font size=\"4\" face=\"arial\" color=\"#585858\"><b>".$row1['Title']."</b></font></td></tr>";
  		$description = $row1['Description'];
  		$condition = $row1['Condition'];
  		
  }
//echo $endt;
																																										
echo "<tr><td ALIGN = \"center\"><div style=\"border-style:solid;border-color:#6E6E6E;width:256px;height:206\"><div style=\"border-style:solid;border-color: yellow;width:250px;height:200\"><img src=\"image/upload/"."$item". "1.jpg\" alt=\"Smiley face\" height=\"200\" width=\"250\" /></div></div></td></tr>";






echo "<tr><td align = \"center\">";
echo "<img src = 'swapicon1.png' /><br>";
echo "</td></tr>";


echo"<div style=\"border-width:thin; border-style:solid; border-color:#BDBDBD;\">";
echo "<tr><td align = \"left\" style = \"padding-left:17\">";
echo "<font size = \"3\" face=\"arial\" color=\"#0080FF\">";
echo "Winning Bid";
echo "</font>";
echo "</td></tr>";













if($tbid != 0)
{

$result3 = mysql_query("SELECT * FROM Bid WHERE Bid_id = $tbid");

while($row3 = mysql_fetch_array($result3))
  {
  		
  		$topbiditem = $row3['Item_id'];
  		$userc = $row3['usercomplete'];
  		$bidderc = $row3['biddercomplete'];
  		
  }
  
  
$result4 = mysql_query("SELECT * FROM Item WHERE Item_id = $topbiditem");

while($row4 = mysql_fetch_array($result4))
{
  		
  	$topbiditemtitle = $row4['Title'];
  		
  		
}




echo "<font size=\"3\" face=\"arial\" color=\"#585858\"><b>";

echo "</b></font>";





echo "<tr><td align = \"center\">";

echo "<table width = \"300\"><tr>";
echo "<td><div style=\"border-style:solid;border-color:#6E6E6E;width:106px;height:86\"><div style=\"border-style:solid;border-color: yellow;width:100px; height:80\">";
echo "<img src=\"image/upload/"."$topbiditem". "1.jpg\" alt=\"Smiley face\" height=\"80\" width=\"100\"  /></div></div></td>";

echo "<td align = \"left\"VALIGN = \"top\">";
echo "<font size=\"2\" face=\"arial\" color=\"#585858\"><b>";
echo $topbiditemtitle;
echo "</b></font></td></tr></table>";
}
else
{
	echo "<tr><td ALIGN=\"center\" height = \"100\" bgcolor=#E6E6E6 > <font size = \"5\" face=\"arial\" color=\"red\"><b>No Winning Bid</b></font></td></tr>";
}
echo "</td></tr>";

echo "</div>";








/*
echo"<div style=\"border-width: 4px; border-style: solid; border-color:#0080FF; background-color:#58D3F7; width:200; height:20\">";
echo "<div style = \"position:relative;top:3;left:0;\">";
echo"<font size=\"3\" face=\"arial\" color=\"white\"><b>VIEW SWAP OFFERS</b></font>";
echo "</div>";
echo"</div>";
*/


echo "<tr><td align = \"center\"  VALIGN = \"middle\">";


echo "</td></tr>";

echo "<tr><td align = \"center\" height = \"50\">";
echo "<table><tr><td>";
echo "<font size=\"2\" face=\"arial\" color=\"#585858\"><b>";
echo "Your Status: ";
echo "</b></font></td>";



if($userc == "n")
{
	echo "<td><font size=\"2\" face=\"arial\" color=\"Red\"><b>";
	echo "INCOMPLETE<br>";
	echo "</b></font><br></td></tr></table>";
}
else
{
	echo "<td><font size=\"2\" face=\"arial\" color=\"Green\"><b>";
	echo "COMPLETE";
	echo "<br><br></b></font></td></tr></table>";
}
echo "</td></tr>";



echo "<tr><td align = \"center\">";
echo "<font size=\"2\" face=\"arial\" color=\"#585858\"><b>";

echo "Bidder Status: ";
echo "</b</font>";


if($bidderc == "n")
{
	echo "<font size=\"2\" face=\"arial\" color=\"Red\"><b>";
	echo "INCOMPLETE<br>";
	echo "</b></font><br>";
}
else
{
	echo "<font size=\"2\" face=\"arial\" color=\"Green\"><b>";
	echo "COMPLETE<br>";
	echo "</b></font><br>";
}

echo "</td></tr>";

echo "</table>";

echo "</div>";

echo "</td>";

$colrowindex++;
	if(($colrowindex % 2) == 0)
	{
		echo "</tr><tr>";
	}

}




}


echo "</table>";






echo "</td><td>";












echo "<iframe src=\"swapchat.php?aid=".$auctionid."\" width = \"608\" height = \"572\" style = \"position:relative; top:0\"></iframe>";
echo "</td></tr></table>";
mysql_close($con);

 
?>