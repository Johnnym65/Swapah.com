<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: Displays a users current auctions that hey have created



		-->*/		
?>
<script type="text/javascript">
	var dateNow= new Date();
	
</script>


<?php
session_start();
include("header.php"); 

//echo $_SESSION['username'];

$username = $_SESSION['username'];
//$username = "johnnym65";
$firstindex = 0;
$colrowindex = 0;
$rowcolindex = 1;
$today = date('20y-m-j H:i:s');

$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("SELECT * FROM Auction WHERE username = '$username' AND Finished = 'no'"); //order by AuctionID desc limit 6


$numbers  = mysql_num_rows($result);
?>

<script type="text/javascript">
	var numberd= '<? print $numbers ?>';
	
</script>


<?php


echo "<div style=\"position:absolute;top:200;left:300;   \">";
echo "<font size = \"8\" face=\"arial\" color=\"#0080FF\"><b>Your Current Auctions</b></font>";
echo "<table border = \"0\" width=\"720\" cellspacing=\"30\">";

while($row = mysql_fetch_array($result))
  {
$colrowindex++;
$rowcolindex++;

$endtime = $row['end_time'];
$auctionid = $row['AuctionID'];
//echo $endtime;

if(strtotime($endtime) < strtotime($today))
{
	mysql_query("UPDATE Auction
				SET Finished='yes'
				WHERE AuctionID='$auctionid'");
}

		
		//if (strtotime($endtime) > strtotime($today))
		//{
		//	mysql_query("UPDATE Auction
		//				SET Finished='yes'
		//				WHERE AuctionID='$row['AuctionID]'");

		//}



if(($colrowindex % 2) == 1)
{
	if(($rowcolindex % 2) == 0)
	{
		echo "</tr>";
		echo "<tr>";
	}
}

if($row['Finished'] == "no")
{
echo "<td ALIGN=\"center\">";
  
  $auctionid = $row['AuctionID'];
 
  $item = $row['Item_id'];
  $endt = $row['end_time'];
  
  $tbid = $row['Bid_id'];

echo"<div class = \"else\" style=\"border-width:thin; border-style:solid; border-color:#BDBDBD\">";
echo "<table border = \"0\"  width = \"360\"><tr>";


// Delimiters may be slash, dot, or hyphen
$date = "04/30/1973";
list($year, $month, $day, $hour, $minute, $second) = split('[-: ]', $endt);
//echo "Month: $month; Day: $day; Year: $year; Hour: $hour; Minute: $minute; Second: $second<br />\n";
$month = ($month - 1);

//echo $item;

$result1 = mysql_query("SELECT * FROM Item WHERE Item_id = $item");

while($row1 = mysql_fetch_array($result1))
  {

  		echo "<td ALIGN=\"left\"  height = \"50\"><font size=\"4\" face=\"arial\" color=\"#585858\"><b>".$row1['Title']."</b></font></td></tr>";
  		$description = $row1['Description'];
  		$condition = $row1['Condition'];
  		
  }
//echo $endt;
echo "<form action=\"auction.php\" method=\"post\"><input type= \"hidden\" name=\"aid\" value="."$auctionid". " />";
																																										
echo "<tr><td ALIGN=\"center\"><div style=\"border-style:solid;border-color:#6E6E6E;width:256px\"><div style=\"border-style:solid;border-color: yellow;width:250px\"><input type=\"image\" src=\"image/upload/"."$item". "1.jpg\" alt=\"Smiley face\" height=\"200\" width=\"250\" /></form></div></div></td></tr>";

echo "<tr><td ALIGN=\"center\">";	
if($firstindex == 0)
{
	

	$firstindex = 1;
	$colrowindex++;
	//echo "<div id=\"first\"></div>";


?>

<table>
<tr><td><font size="2">Time Left:</font></td>
<td><font size="3" face="arial" color="#0080FF"><b><div id="countbox1"></div></b></font></td></tr>
</table>
<script type="text/javascript">


dateFuture1 = new Date(<?php echo $year; ?>,<?php echo $month; ?>,<?php echo $day; ?>,<?php echo $hour; ?>,<?php echo $minute; ?>,<?php echo $second; ?>);

function GetCount(ddate,iid){

	dateNow = new Date(dateNow);
	dateNow.setMilliseconds(dateNow.getMilliseconds() + (1000/numberd));//grab current date	amount = ddate.getTime() - dateNow.getTime();	//calc milliseconds between dates
	amount = ddate.getTime() - dateNow.getTime();	//calc milliseconds between dates
	delete dateNow;

	// if time is already past
	if(amount < 0){
		document.getElementById(iid).innerHTML="Finished!";
	}
	// else date is still good
	else{
		days=0;hours=0;mins=0;secs=0;out="";

		amount = Math.floor(amount/1000);//kill the "milliseconds" so just secs

		days=Math.floor(amount/86400);//days
		amount=amount%86400;

		hours=Math.floor(amount/3600);//hours
		amount=amount%3600;

		mins=Math.floor(amount/60);//minutes
		amount=amount%60;

		secs=Math.floor(amount);//seconds

		if(days != 0){out += days +" "+((days==1)?"day":"days")+", ";}
		if(hours != 0){out += hours +" "+((hours==1)?"hour":"hours")+", ";}
		out += mins +" "+((mins==1)?"min":"mins")+", ";
		out += secs +" "+((secs==1)?"sec":"secs")+", ";
		out = out.substr(0,out.length-2);
		document.getElementById(iid).innerHTML=out;

		setTimeout(function(){GetCount(ddate,iid)}, 1000);
	}
}


	GetCount(dateFuture1, 'countbox1');
	//you can add additional countdowns here (just make sure you create dateFuture2 and countbox2 etc for each)

</script>

	
	
	
	
	<?php 
	
}
else{

	
	
$colrowindex++;
echo "<table><tr><td><font size=\"2\">Time Left:</font></td><td>";
echo "<font size=\"3\" face=\"arial\" color=\"#0080FF\"><b><div id=\"container".$auctionid."\"></div></b></font>";
echo "</td></tr></table>";





?>











<script type="text/javascript">
dateFuture1 = new Date(<?php echo $year; ?>,<?php echo $month; ?>,<?php echo $day; ?>,<?php echo $hour; ?>,<?php echo $minute; ?>,<?php echo $second; ?>);

  GetCount(dateFuture1,"container<?=$auctionid?>");



</script>




<?php 


}


echo "</td></tr>";



echo "<tr><td height = \"180\" ALIGN=\"center\">";

echo "<div style=\"border-style:solid;border-color:#BDBDBD;width:300px;\">";
echo "<table cellspacing=\"0\" border = \"0\" width = \"300\">";


if($tbid != 0)
{

$result3 = mysql_query("SELECT * FROM Bid WHERE Bid_id = $tbid");

while($row3 = mysql_fetch_array($result3))
  {
  		
  		$topbiditem = $row3['Item_id'];
  		$bidtime = $row3['bid_time'];
  		//echo "<br>".$row3['Item_id'];
  		
  }
  
  
$result4 = mysql_query("SELECT * FROM Item WHERE Item_id = $topbiditem");

while($row4 = mysql_fetch_array($result4))
{
  		
  	$topbiditemtitle = $row4['Title'];
  		
  		
}



echo "<tr ><td bgcolor=#E6E6E6 colspan = \"2\" VALIGN=\"Bottom\">";
echo "<font size=\"3\" face=\"arial\" color=\"#585858\"><b>";
echo "Top bid";
echo "</b></font></td></tr>";



echo "<tr><td ALIGN=\"center\" height = \"100\" bgcolor=#E6E6E6 rowspan =\"2\">";
echo "<div style=\"border-style:solid;border-color:#6E6E6E;width:101px; height:81px\"><div style=\"border-style:solid;border-color: yellow;width:95px; height:75px\">";

echo "<form action=\"viewitem.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$topbiditem". " >";
echo "<input type=\"image\" src=\"image/upload/"."$topbiditem". "1.jpg\" alt=\"Smiley face\" height=\"75\" width=\"95\"  /></form>";

//echo "<img src=\"image/upload/"."$topbiditem". "1.jpg\" alt=\"Smiley face\" height=\"75\" width=\"95\" />";
echo "</div></div>";
echo "</td>";
echo "<td height = \"25\"  VALIGN=\"bottom\" bgcolor=#E6E6E6>";
echo "<font size=\"2\" face=\"arial\" color=\"#585858\"><b>";
echo $topbiditemtitle;
echo "</b></font><hr>";
echo "</td>";
echo "</tr>";
//echo "<br>".$bidtime;
$today = date('20y-m-j h:i:s');
//echo "<br>".$today;

$diff = abs(strtotime($bidtime) - strtotime($today));
$diff = ($diff/60)/60;
$diff2 = (int)$diff;
echo "<tr>";
echo "<td VALIGN=\"middle\" bgcolor=#E6E6E6>";
echo "<font size=\"3\" face=\"arial\" color=\"#585858\"><b>";
echo "Bid Accepted:</b></font><br>";
echo "<font size=\"3\" face=\"arial\" color=\"#0080FF\"><b>".$diff2." Hours Ago</b></font>";

echo "</td>";
echo "</tr>";
}
else
{
	echo "<tr><td ALIGN=\"center\" height = \"120\" bgcolor=#E6E6E6 > <font size = \"5\" face=\"arial\" color=\"red\"><b>No top bids yet!!</b></font></td></tr>";
}


echo "</table>";

echo "</div>";



echo "</td></tr>";



echo "<tr><td align = \"center\">";
/*
echo"<div style=\"border-width: 4px; border-style: solid; border-color:#0080FF; background-color:#58D3F7; width:200; height:20\">";
echo "<div style = \"position:relative;top:3;left:0;\">";
echo"<font size=\"3\" face=\"arial\" color=\"white\"><b>VIEW SWAP OFFERS</b></font>";
echo "</div>";
echo"</div>";
*/

echo "<form action=\"BidOffers.php\" method=\"post\"><input type= \"hidden\" name=\"aid\" value="."$auctionid". " />";
echo "<input type=\"image\" src=\"Viewoffers.png\" alt=\"Submit\" /></form>";

echo "</td></tr>";

echo "</table>";
echo "</div>";

}
}

echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

mysql_close($con);

include("categories.php"); 
?>




<?php include("footer.php"); 
?>



