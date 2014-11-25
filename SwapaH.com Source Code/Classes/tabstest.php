<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: this page displays tabs, these tabs are finihsed auctions, current top bids
			 , Auctions won and finshed games



		-->*/		
?>

<?php
session_start();
include("header.php"); 

echo "<div style=\"position:absolute;top:200;left:300;   \">";
echo "<font size = \"8\" face=\"arial\" color=\"#0080FF\"><b>YOUR SWAPS</b></font>";
echo "</div>";
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Best Html Tab Panel using CSS and Javascript</title>
  <link rel="stylesheet" href="/common.css" type="text/css" />
  <link rel="stylesheet" href="tab-panel.css" type="text/css" />
  <script language="JavaScript" type="text/javascript" src="tab-panel.js">
  </script>

</head>

<body onload="bodyOnLoad()" onResize="raisePanel(currentMenuIndex)">


<div style = "position:absolute; left:300; top:270">
<div id="tabFrame">

<div id="tabMenuDiv">
<span class="tabMenu" id="tabMenu0" onClick="return raisePanel(0)" onMouseOver="mouseOver(0)" onMouseOut="mouseOut(0)" >
   Finished Auctions</span>
<span class="tabMenu" id="tabMenu1" onClick="return raisePanel(1)" onMouseOver="mouseOver(1)" onMouseOut="mouseOut(1)">
   Current Top Bids</span>
<span class="tabMenu" id="tabMenu2" onClick="return raisePanel(2)" onMouseOver="mouseOver(2)" onMouseOut="mouseOut(2)">
   Auctions Won</span>
<span class="tabMenu" id="tabMenu3" onClick="return raisePanel(3)" onMouseOver="mouseOver(3)" onMouseOut="mouseOut(3)">
   Finished Games</span>
<!--<span class="tabMenu" id="tabMenu3" onClick="return raisePanel(3)" onMouseOver="mouseOver(3)" onMouseOut="mouseOut(3)">
   Finished Games</span>-->
</div>

<script type="text/javascript">
function Popup( url, height, width )
{
    var windowProperties = "toolbar = 0, scrollbars = 0, location = 0, statusbar = 0, menubar = 0, resizable = 0, width = " + width + ", height = " + height + ", left = 50, top = 50";
 
    return window.open( url, "", windowProperties );
}

</script>

<div class="tabPane" id="tabPane0">



<?php

 

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

$result = mysql_query("SELECT * FROM Auction WHERE username = '$username' ORDER BY AuctionID DESC"); //order by AuctionID desc limit 6


echo "<div style=\"position:relative;top:10;left:5; width:730\">";
echo "<font size = \"6\" face=\"arial\" color=\"#0080FF\"><b>Your Finished Auctions </b></font>";
echo "<table border = \"0\"  cellspacing=\"30\"><tr>";


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
echo "<table border = \"0\" width = \"330\">";

 $endtime = $row['end_time'];
$auctionid = $row['AuctionID'];
//echo $endtime;

if(strtotime($endtime) < strtotime($today))
{
	mysql_query("UPDATE Auction
				SET Finished='yes'
				WHERE AuctionID='$auctionid'");
}


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
echo "<form action=\"auction.php\" method=\"post\"><input type= \"hidden\" name=\"aid\" value="."$auctionid". " />";
																																										
echo "<tr><td ALIGN = \"center\"><div style=\"border-style:solid;border-color:#6E6E6E;width:256px;height:206\"><div style=\"border-style:solid;border-color: yellow;width:250px;height:200\"><input type=\"image\" src=\"image/upload/"."$item". "1.jpg\" alt=\"Smiley face\" height=\"200\" width=\"250\" /></div></div></form></td></tr>";






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
  	$otheruser = $row4['Username'];
  		
  		
}




echo "<font size=\"3\" face=\"arial\" color=\"#585858\"><b>";

echo "</b></font>";





echo "<tr><td align = \"center\">";

echo "<table width = \"300\"><tr>";
echo "<td><div style=\"border-style:solid;border-color:#6E6E6E;width:106px;height:86\"><div style=\"border-style:solid;border-color: yellow;width:100px; height:80\">";
echo "<form action=\"viewitem.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$topbiditem". " >";
echo "<input type=\"image\" src=\"image/upload/"."$topbiditem". "1.jpg\" alt=\"Smiley face\" height=\"80\" width=\"100\"  /></form></div></div></td>";

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
if($tbid != 0)
{
echo "<form id = \"example1\" name = \"$title\" action=\"yauctionchatbetween.php\" method=\"post\" target=\"yauctionchatbetween\"  onsubmit=\"window.open('about:blank','yauctionchatbetween','width=980,height=600')\"><input type= \"hidden\" name=\"aid\" value="."$auctionid". " />";
echo "<input  type=\"image\" src=\"swapchat.png\" alt=\"Submit\" />";
echo "</form>";
}

else{
echo "<form  name = \"$title\" action=\"removeauction.php\" method=\"post\" ><input type= \"hidden\" name=\"aid\" value="."$auctionid". " />";
echo "<input  type=\"image\" src=\"remove.png\" alt=\"Submit\" />";
echo "</form>";

}

echo "</td></tr>";

echo "<tr><td align = \"center\" height = \"50\">";
echo "<table><tr><td>";
echo "<font size=\"2\" face=\"arial\" color=\"#585858\"><b>";
echo "Your Status: ";
echo "</b></font></td>";



if($userc == "n")
{
	echo "<td><form action=\"swapstatuschange.php\" method=\"post\" >";

echo "<input type= \"hidden\" name=\"bid\" value="."$tbid". " />";
	echo "<select name=\"complete\" size=\"1\"> <option value=\"n\">INCOMPLETE</option><option value=\"y\">COMPLETE</option></select>";
	
	echo "<input type = \"submit\" value = \"Change\"/>";
	echo "</form></td></tr></table>";
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
	echo "INCOMPLETE";
	echo "</b></font>";
}
else
{
	echo "<font size=\"2\" face=\"arial\" color=\"Green\"><b>";
	echo "COMPLETE";
	echo "</b></font>";
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
echo "</div>";


	

echo"<div style=\"position:relative;top:-190;left:200; \">";
	if($bidderc == "y" && $userc == "y")
	{
	
	echo"<a id = \"example1\" href = \"leavereview.php?user=$otheruser\">";
	echo "<img src = \"review.png\"/>";
	echo "</a>";
	}
	else
	{
		
		echo "<img src = \"reviewdisabled.png\"/>";
	
	}
	echo "</div>";

mysql_close($con);

 
?>














</div>

<div class="tabPane" id="tabPane1">


<?php

session_start();


//echo $_SESSION['username'];
echo "<div style=\"position:relative;top:10;left:5; width:750  \">";
echo "<font size = \"6\" face=\"arial\" color=\"#0080FF\"><b>Your Current Top Bids</b></font>";
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
		
	$result2 = mysql_query("SELECT * FROM Bid WHERE Item_id = '$iid'");
	while($row2 = mysql_fetch_array($result2))
	{
	 	$aid = $row2['Auction_id'];
	}
	
	
	
	$result3 = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$aid'");
	while($row3 = mysql_fetch_array($result3))
	{
	 	$iid2 = $row3['Item_id'];
	 	$isfinished = $row3['Finished'];
	}
	
	if($isfinished == "no")
	{
	
	$result4 = mysql_query("SELECT * FROM Item WHERE Item_id = '$iid2'");
	while($row4 = mysql_fetch_array($result4))
	{
		
		echo "<table border = \"0\"  width = \"700\"><tr>";
	
		echo "<td ALIGN=\"left\" VALIGN=\"bottom\"  height = \"300\"><font size=\"4\" face=\"arial\" color=\"#585858\"><b>";
		echo "<br><br>Your Top Bid<br>";
		echo $row1['Title']."<br></b></font>";
		echo "<form action=\"item.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$iid". " />";
																																										
		echo "<div style=\"border-style:solid;border-color:#6E6E6E;width:256px\"><div style=\"border-style:solid;border-color: yellow;width:250px\"><input type=\"image\" src=\"image/upload/"."$iid". "1.jpg\" alt=\"Smiley face\" height=\"200\" width=\"250\" /></form></div></div></td>";
	
	
		echo "<td width = \"320\" VALIGN = \"middle\" ALIGN = \"center\">";
		echo "<img src = 'topbidicon.png' />";		
		echo "</td>";
	
	
		echo "<td height = \"180\" ALIGN=\"left\" >";
		
		echo "<font size=\"4\" face=\"arial\" color=\"#585858\"><b>";
		echo "Auction<br>";
	 	echo $row4['Title'];
	 	
	 	echo "<form action=\"auction.php\" method=\"post\"><input type= \"hidden\" name=\"aid\" value="."$aid". " />";
																																										
		echo "<div style=\"border-style:solid;border-color:#6E6E6E;width:256px\"><div style=\"border-style:solid;border-color: yellow;width:250px\"><input type=\"image\" src=\"image/upload/"."$iid2". "1.jpg\" alt=\"Smiley face\" height=\"200\" width=\"250\" /></form></div></div></td></tr>";
	}
	
	echo "</b></font></table>";
	}
	
	}
}

echo "</div>";
?>







</div>

<!--
<div class="tabPane" id="tabPane2">









<?php

session_start();


//echo $_SESSION['username'];
echo "<div style=\"position:relative;top:10;left:5; width:750  \">";
echo "<font size = \"6\" face=\"arial\" color=\"#0080FF\"><b>Your Finished Winning Bids</b></font>";
$username = $_SESSION['username'];

$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("SELECT * FROM Bid ORDER BY Bid_id DESC");
while($row = mysql_fetch_array($result))
{
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
	
	
	
	$result3 = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$aid'");
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
		
		echo"<div style=\"border-width:thin; border-style:solid; border-color:#BDBDBD; background-color:White; width:700 \">";
		echo "<table border = \"0\"  width = \"650\"><tr>";
	
		echo "<td><font size=\"4\" face=\"arial\" color=\"#585858\">";
		echo "Your Top Bid</td><td></td><td>Auction</td></tr><tr><td>";
		echo $row1['Title']."</b></font>";
		echo "</td><td></td><td>";
		echo $row4['Title'];
		echo "</td></tr><tr><td>";
		echo "<form action=\"viewitem.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$iid". " />";
																																										
		echo "<div style=\"border-style:solid;border-color:#6E6E6E;width:156px\"><div style=\"border-style:solid;border-color: yellow;width:150px\"><input type=\"image\" src=\"image/upload/"."$iid". "1.jpg\" alt=\"Smiley face\" height=\"100\" width=\"150\" /></form></div></div></td>";
	
	
		echo "<td width = \"320\" VALIGN = \"middle\" ALIGN = \"center\">";
		echo "<img src = 'swapicon.png' />";
		echo "</td>";
	
	
		echo "<td height = \"180\" ALIGN=\"left\" >";
		
		echo "<font size=\"4\" face=\"arial\" color=\"#585858\"><b>";
		
	 	
	 	
	 	echo "<form action=\"auction.php\" method=\"post\"><input type= \"hidden\" name=\"aid\" value="."$aid". " />";
																																										
		echo "<div style=\"border-style:solid;border-color:#6E6E6E;width:156px\"><div style=\"border-style:solid;border-color: yellow;width:150px\"><input type=\"image\" src=\"image/upload/"."$iid2". "1.jpg\" alt=\"Smiley face\" height=\"100\" width=\"150\" /></form></div></div></td></tr>";
	}
	
	echo "<tr><td align = \"center\">";


	echo "<form id = \"example1\" name = \"$title\" action=\"swapchatbetween.php\" method=\"post\" target=\"swapchatbetween\"  onsubmit=\"window.open('about:blank','swapchatbetween','width=770,height=695')\"><input type= \"hidden\" name=\"aid\" value="."$aid". " />";
	echo "<input  type=\"image\" src=\"swapchat.png\" alt=\"Submit\" /></form>";

	echo "</td><td style=\"padding-left:0; border-width:thin; border-style:solid; border-color:#BDBDBD\" colspan = \"2\">Auctioneer status: ";

echo "<form action=\"swapstatuschange1.php\" method=\"post\" >";

echo "<input type= \"hidden\" name=\"bid\" value=\"$bid\" />";

if($userc == "n")
{
	echo "INCOMPLETE";
}
else
{
	echo "COMPLETE";
}



echo "&nbsp&nbsp&nbsp&nbspYour status: ";


if($bidderc == "n")
{
	echo "<select name=\"complete\" size=\"1\"> <option value=\"n\">INCOMPLETE</option><option value=\"y\">COMPLETE</option></select>";
	
	echo "<input type = \"submit\" value = \"Confirm\"/>";
	

}
else
{
	echo "COMPLETE";
}



echo "</td></tr></table>";

	echo "</div>";
	
	
	
	}
	}
}




echo "</div>";

?>










</div> -->










<div class="tabPane" id="tabPane2">









<?php

session_start();


//echo $_SESSION['username'];
echo "<div style=\"position:relative;top:10;left:5; width:730;  \">";
echo "<font size = \"6\" face=\"arial\" color=\"#0080FF\"><b>Auctions Won </b></font>";
echo "<table border = \"0\"  cellspacing=\"10\"><tr>";
$username = $_SESSION['username'];
$colrowindex = 0;

$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("SELECT * FROM Bid ORDER BY Bid_id DESC");
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
	
	
	
	$result3 = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$aid'");
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
		
	 	
	 echo "<tr><td Align = \"center\">";	
	echo "<form id = \"example1\" name = \"$title\" action=\"swapchatbetween.php\" method=\"post\" target=\"swapchatbetween\"  onsubmit=\"window.open('about:blank','swapchatbetween','width=970,height=600')\"><input type= \"hidden\" name=\"aid\" value="."$aid". " />";
	echo "<input  type=\"image\" src=\"swapchat.png\" alt=\"Submit\" /></form>";
	echo "</td></tr>";
	
	
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


	echo"<div style=\"position:relative;top:-190;left:200; \">";
	if($bidderc == "y" && $userc == "y")
	{
	
	echo"<a id = \"example1\" href = \"leavereview.php?user=$otheruser\">";
	echo "<img src = \"review.png\"/>";
	echo "</a>";
	}
	else
	{
		
		echo "<img src = \"reviewdisabled.png\"/>";
	
	}
	echo "</div>";




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




?>










</div>

<div class="tabPane" id="tabPane3">








<?php


session_start();
// store session data
$username = $_SESSION['username'];
//echo $username;
$colrowindex = 0;
$today = date('20y-m-0j h:i:s');


//$gameID = $_POST['gid'];



//echo $gameID;

$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);


$result = mysql_query("SELECT * FROM gameusers WHERE username = '$username'");

while($row = mysql_fetch_array($result))
{

	$gameID = $row['gameid'];

echo "<table><tr><td>";
$result1 = mysql_query("SELECT * FROM swappahgame WHERE gameid = '$gameID' AND Finished = 'y'");

while($row1 = mysql_fetch_array($result1))
{
	echo "<div style=\"position:relative;top:0;left:10;\">";
	echo "<b><font size = \"4\" face=\"arial\" color=\"#585858\">";
	echo "Game: </font>";
	echo "<font size=\"6\" face=\"arial\" color=\"#0080FF\">";
	echo $row1['gamename']."</font></div>";
	$endtime = $row1['endtime'];



$result2 = mysql_query("SELECT * FROM gameusers WHERE gameid = '$gameID'");
$numofplayers = mysql_num_rows($result2);


$result2 = mysql_query("SELECT * FROM gameusers WHERE gameid = '$gameID' AND username = '$username'");
while($row2 = mysql_fetch_array($result2))
{

	
	 $iid = $row2['Item_id'];
	 $ciid = $row2['currentitem_id'];

}
$isaplayer = mysql_num_rows($result2);


echo "<div style=\"position:absolute;top:0;left:500;\">";
echo "<font size = \"4\" face=\"arial\" color=\"#585858\">";
echo "Players: </font>";
echo "<font size=\"6\" face=\"arial\" color=\"#0080FF\">";
echo $numofplayers;
echo "</font></div><hr>";


if($isaplayer != 0)
{
$result3 = mysql_query("SELECT * FROM Item WHERE Item_id = '$ciid'");
while($row3 = mysql_fetch_array($result3))
{
	$currenttitle = $row3['Title'];
}


echo "<table height = \"200\" border = \"0\"><tr><td VALIGN = \"top\" style=\"padding: 4px 1px 4px 4px;\"  width = \"300\">";
echo "<font size = \"4\" face=\"arial\" color=\"#585858\">";
echo "Finishing Item: </font><br>";
echo "</b><font size=\"3\" face=\"arial\" color=\"#A4A4A4\">";
echo "<br>".$currenttitle."</font><b><br>";

echo "<form action=\"viewitem.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$ciid". ">";
echo "<div style=\"border-style:solid;border-color:#6E6E6E; width:236\"><div style=\"border-style:solid;border-color: yellow; width:230\">";
echo "<input type = \"image\" src=\"image/upload/"."$ciid". "1.jpg\" alt=\"Smiley face\" height=\"175\" width=\"230\"  /></div></div></form></td><td VALIGN = \"top\" style=\"padding: 4px 1px 4px 4px;\"  width = \"420\">";




list($year, $month, $day, $hour, $minute, $second) = split('[-: ]', $endtime);
//echo "Month: $month; Day: $day; Year: $year; Hour: $hour; Minute: $minute; Second: $second<br />\n";
$month = ($month - 1);










$numofswaps = 0;


$result5 = mysql_query("SELECT * FROM Swap WHERE currentuser = '$username' OR swapuser = '$username'");
$numofswaps = mysql_num_rows($result5);



echo "<div style = \"position:relative; top:0; left:0\">";
echo "Number of Swaps: ";
echo "<a id = \"example1\" href = \"showswaps.php?gid=".$gameID."\"><font size=\"4\" face=\"arial\" color=\"#0080FF\">";
echo $numofswaps;

echo "</font></a></div>";

$result7 = mysql_query("SELECT * FROM swapoffer WHERE swapitem_id = '$ciid'");
$numofoffers = mysql_num_rows($result7);





$result2 = mysql_query("SELECT * FROM Item WHERE Item_id = '$iid'");

while($row2 = mysql_fetch_array($result2))
{
	$startingtitle = $row2['Title'];
}


$result9 = mysql_query("SELECT * FROM Swap WHERE currentitem = '$ciid' || swapitem = '$ciid'");

while($row9 = mysql_fetch_array($result9))
{
     $swapid = $row9['Swapid'];
	 $currentostatus = $row9['currentowners'];
	 $swapostatus = $row9['swapowners'];
	 $currentitem = $row9['currentitem'];
	 $swapitem = $row9['swapitem'];
}



	echo "<div style = \"position:relative; top:20; left:0\">";
	echo "<form  name = \"$title\" action=\"ygamechatbetween.php\" method=\"post\" target=\"ygamechatbetween\"  onsubmit=\"window.open('about:blank','ygamechatbetween','width=980,height=600')\"><input type= \"hidden\" name=\"sid\" value="."$swapid". " />";
echo "<input  type=\"image\" src=\"swapchat.png\" alt=\"Submit\" />";
echo "</form>";
	echo "</div>";



echo "<div style=\"position:absolute;top:160;left:313;\">";
echo "Starting Item<br>";
	 
	 
echo "<form action=\"viewitem.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$iid". ">";
echo "<div style=\"border-style:solid;border-color:#6E6E6E; width:136\"><div style=\"border-style:solid;border-color: yellow; width:130\">";
echo "<input type = \"image\" src=\"image/upload/"."$iid". "1.jpg\" alt=\"Smiley face\" height=\"100\" width=\"130\"  /></div></div></form></div><div style=\"position:absolute;top:190;left:460;\">";
echo "<font size=\"2\" face=\"arial\" color=\"#A4A4A4\">".$startingtitle."</font>";

if($numofswaps != 0)
{


echo "<br>Current Swap Status:<br>";
echo "<table width = \"300\" border = \"0\"><tr height = \"30\">";
if ($currentostatus == "n")
{
	if($currentitem == $ciid)
	{
		echo "<td valign = \"top\"> Your Status: </td>";
		echo "<td><form  action=\"swapitemchange.php\" method=\"post\"><input type= \"hidden\" name=\"item\" value="."Current". " /><input type= \"hidden\" name=\"sid\" value="."$swapid". " /><input type= \"hidden\" name=\"gid\" value="."$gameID". " />";
		echo "<select name=\"complete\" size=\"1\"> <option value=\"n\">INCOMPLETE</option><option value=\"y\">COMPLETE</option></select>";
	
	echo "<input type = \"submit\" value = \"Confirm\"/></form></td>";
	}
	else{
	echo "<td> Other Swapper:</td>";
	echo "<td><font size = \"4\" face=\"arial\" color=\"red\"> INCOMPLETE</font></td>";
	}
}
else
{
	if($currentitem == $ciid)
	{
	
		
		echo "<td>Your Status: </td><td><font size = \"4\" face=\"arial\" color=\"Green\">COMPLETE</font></td>";
	}
	else
	{
		echo "<td>Other Swapper: </td><td> <font size = \"4\" face=\"arial\" color=\"Green\">COMPLETE</font></td>";

	}

}

echo"</tr><tr>";
if ($swapostatus == "n")
{
	if($swapitem == $ciid)
	{	
		echo "<td valign = \"top\">Your Status: </td>";	
		echo "<td><form action=\"swapitemchange.php\" method=\"post\"><input type= \"hidden\" name=\"item\" value="."Swap". "  /><input type= \"hidden\" name=\"sid\" value="."$swapid". " /><input type= \"hidden\" name=\"gid\" value="."$gameID". " />";
		echo "<select name=\"complete\" size=\"1\"> <option value=\"n\">INCOMPLETE</option><option value=\"y\">COMPLETE</option></select>";
	
	echo "<input type = \"submit\" value = \"Confirm\"/></form></td>";
	}
	else{
	echo "<td>Other Swapper: </td>";
	echo "<td><font size = \"4\" face=\"arial\" color=\"Red\">INCOMPLETE</font></td>";
	}
}
else
{
	if($swapitem == $ciid)
	{
		echo "<td>Your Status: </td><td><font size = \"4\" face=\"arial\" color=\"Green\">COMPLETE</font></td>";

		

	}
	else
	{
		echo "<td>Other Swapper: </td><td><font size = \"4\" face=\"arial\" color=\"Green\">COMPLETE</font></td>";
		
	}
}

echo "</tr></table>";

}


echo "</div>";








}

}

echo "<hr>";
echo"</td></table>";


echo "</div>";

}


?>
















</div>

<div id="tabFiller" ></div>

</div>
</div>


<?php include("footer.php"); 
	  
?>

</body>

</html>