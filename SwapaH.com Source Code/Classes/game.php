<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: displays the details of a certain game



		-->*/		
?>
<?php

session_start();
include("header.php"); 
// store session data
$username = $_SESSION['username'];
//echo $username;
$colrowindex = 0;
$today = date('20y-m-0j h:i:s');


if($username == null)
{
	header("location:register.php");
}

//$gameID = $_POST['gid'];

$gameID = $_GET['gid'];
$_SESSION['gameid'] =  $gameID;

//echo $gameID;
echo "<div style=\"position:relative;top:180;left:320; width:750;\">";

$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result1 = mysql_query("SELECT * FROM swappahgame WHERE gameid = '$gameID'");

while($row1 = mysql_fetch_array($result1))
{
	echo "<div style=\"position:relative;top:0;left:10;\">";
	echo "<b><font size = \"4\" face=\"arial\" color=\"#585858\">";
	echo "Game: </font>";
	echo "<font size=\"6\" face=\"arial\" color=\"#0080FF\">";
	echo $row1['gamename']."</font></div>";
	$endtime = $row1['endtime'];

}

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
echo "Current Item: </font><br>";
echo "</b><font size=\"3\" face=\"arial\" color=\"#A4A4A4\">";
echo "<br>".$currenttitle."</font><b><br>";

echo "<form action=\"viewitem.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$ciid". ">";
echo "<div style=\"border-style:solid;border-color:#6E6E6E; width:236\"><div style=\"border-style:solid;border-color: yellow; width:230\">";
echo "<input type = \"image\" src=\"image/upload/"."$ciid". "1.jpg\" alt=\"Smiley face\" height=\"175\" width=\"230\"  /></div></div></form></td><td VALIGN = \"top\" style=\"padding: 4px 1px 4px 4px;\"  width = \"420\">";




list($year, $month, $day, $hour, $minute, $second) = split('[-: ]', $endtime);
//echo "Month: $month; Day: $day; Year: $year; Hour: $hour; Minute: $minute; Second: $second<br />\n";
$month = ($month - 1);



echo "<font size = \"4\" face=\"arial\" color=\"#585858\">";
echo "Time Left:";
echo "<font size=\"4\" face=\"arial\" color=\"#0080FF\">";
echo "<div style = \"position:relative; top:-20; left:85\" id=\"countbox1\"></div></font><br><br>";





$numofswaps = 0;


$result5 = mysql_query("SELECT * FROM Swap WHERE currentuser = '$username' OR swapuser = '$username'");
$numofswaps = mysql_num_rows($result5);



echo "<div style = \"position:relative; top:-50; left:0\">";
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


if(($currentostatus == 'y' && $swapostatus == 'y') || ($currentostatus == null && $swapostatus == null))
{
echo "<div style = \"position:relative; top:-40; left:0\">";


echo "<form action=\"viewswapoffers.php\" method=\"post\"><input type= \"hidden\" name=\"ciid\" value="."$ciid". " >";
echo "<input type=\"image\"  src=\"viewbidoffers.png\" alt=\"some_text\"/>";
echo "<div style = \"position:relative; top:-29; left:240\">";
echo "<font size=\"4\" face=\"arial\" color=\"white\">";
echo "( ".$numofoffers." )</font>";
echo "</div>";
echo "</form>";

echo "</div>";

}

else
{
	echo "<div style = \"position:relative; top:-40; left:0\">";
	echo "<form  name = \"$title\" action=\"ygamechatbetween.php\" method=\"post\" target=\"ygamechatbetween\"  onsubmit=\"window.open('about:blank','ygamechatbetween','width=980,height=600')\"><input type= \"hidden\" name=\"sid\" value="."$swapid". " />";
echo "<input  type=\"image\" src=\"swapchat.png\" alt=\"Submit\" />";
echo "</form>";
	echo "</div>";

}

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







echo"</td></table>";





}
echo "<hr>";



echo "</div>";

echo "<div style=\"position:relative;top:200;left:320; width:780; \"> ";
echo "<font size=\"5\" face=\"arial\" color=\"#0080FF\">";
echo "Game Items";
echo "</div>";
echo "</div>";



echo "<div style=\"position:relative;top:200;left:295; width:780; \">";

$result4 = mysql_query("SELECT * FROM gameusers WHERE gameid = $gameID");


echo "<table border = \"0\" width=\"780\" cellspacing=\"30\"><tr>";

while($row4 = mysql_fetch_array($result4))
{
	
	echo "<b><font size = \"4\" face=\"arial\" color=\"#585858\">";
	
	$iid = $row4['currentitem_id'];
	
	$result5 = mysql_query("SELECT * FROM Item WHERE Item_id = '$iid'");

	while($row5 = mysql_fetch_array($result5))
	{
		$startingtitle = $row5['Title'];
	}
	echo "<td VALIGN=\"bottom\">";
	echo "<b><font size = \"4\" face=\"arial\" color=\"#585858\">";
	echo $startingtitle."<br>";
	echo "</font></b>";
	echo "<div style=\"border-style:solid;border-color:#6E6E6E; width:308; height:258\">";
	echo "<form action=\"viewitem.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$iid". " >";
	echo "<input type = \"image\" src=\"image/upload/"."$iid". "1.jpg\" alt=\"Smiley face\" height=\"250\" width=\"300\" style = \"border:4px solid yellow;\" /></form></div>";
	
	
	if($isaplayer != 0)
	{
	if (($currentostatus == "y" && $swapostatus == "y") || ($currentostatus == null && $swapostatus == null))
	{
		
	 	$todaytime = date('20y-m-j H:i:s');
		
//echo $endtime;

		if(strtotime($endtime) < strtotime($todaytime))
		{
			mysql_query("UPDATE swappahgame
					SET Finished='y'
					WHERE gameid='$gid'");
		}
		else
		{
			
				echo "<form action=\"swapchecker.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$iid". " ><input type= \"hidden\" name=\"ciid\" value="."$ciid". " ><input type= \"hidden\" name=\"gid\" value="."$gameID". " >";
				echo "<div  style = \"position:relative;top:0;left:195\">";
				echo "<input type=\"image\"  src=\"offerswap.png\" alt=\"some_text\"/> ";
				echo "</div></form>";
		}
	}
	}
	
	
	echo "</td>";
	
	
	$colrowindex++;
	if(($colrowindex % 2) == 0)
	{
		echo "</tr><tr>";
	}
	
	
}

echo "</tr></table>";

echo "</div>";


















include("categories.php"); 


?>












<script type="text/javascript">


dateFuture1 = new Date(<?php echo $year; ?>,<?php echo $month; ?>,<?php echo $day; ?>,<?php echo $hour; ?>,<?php echo $minute; ?>,<?php echo $second; ?>);

function GetCount(ddate,iid){

	dateNow = new Date();	//grab current date
	amount = ddate.getTime() - dateNow.getTime();	//calc milliseconds between dates
	delete dateNow;

	// if time is already past
	if(amount < 0){
		document.getElementById(iid).innerHTML="Finished!";
		//<?php echo "yes";  ?>
		
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





<?php include("footer.php"); 
?>