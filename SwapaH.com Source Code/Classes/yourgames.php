<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: This page displays the current game the user has signed up for



		-->*/		
?>
<style type="text/css">

a {text-decoration:none;}


.game:hover {
	
	background-color:#EFF8FB;
	box-shadow: 7px 7px 8px #818181;
	-webkit-box-shadow: 7px 7px 8px #818181;
	-moz-box-shadow: 7px 7px 8px #818181;
	filter: progid:DXImageTransform.Microsoft.dropShadow(color=#818181, offX=7, offY=7, positive=true);
	
	}
</style>



<?php
session_start();
include("header.php"); 

$username = $_SESSION['username'];


function dateDiff($d1, $d2) {
// Return the number of days between the two dates:

  return round(abs(strtotime($d1)-strtotime($d2))/86400);

} 

echo "<div style=\"position:relative;top:200;left:300;width:500;\">";

echo "<font size = \"8\" face=\"arial\" color=\"#0080FF\"><b>Your Current Games</b></font></div>";








$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("SELECT * FROM gameusers WHERE username = '$username'");

while($row = mysql_fetch_array($result))
{
	 $gid = $row['gameid'];
	 $iid = $row['Item_id'];
	 $ciid = $row['currentitem_id'];
	
	 

	
	 
	 //echo $gid." ".$iid."<br>";
	 
	 
	 $result1 = mysql_query("SELECT * FROM swappahgame WHERE gameid = '$gid' AND Finished ='n'");

	 while($row1 = mysql_fetch_array($result1))
	 {
	 
	 	/*
	 	$endtime = $row['endtime'];
	 	$todaytime = date('20y-m-j H:i:s');
		
//echo $endtime;

		if(strtotime($endtime) < strtotime($todaytime))
		{
			mysql_query("UPDATE swappahgame
					SET Finished='y'
					WHERE gameid='$gid'");
		}*/
	 	
	 	$name = $row1['gamename'];
  	 	$endtime = $row1['endtime'];
  	 	$starttime = $row1['starttime'];
  	 	$duration = $row1['duration'];
  	 	$today = date('20y-m-j H:i:s');
  	 	
  	 	//echo "<form action=\"game.php\" method=\"post\" name = \"$name\"><input type= \"hidden\" name=\"gid\" value="."$gid". " />";
		echo "<a  href=\"game.php?gid=$gid\" >";
	 	//echo "<a href = \"game.php\">";
	 	echo "<div class = \"game\" style=\"position:relative;top:257;left:320; width:700; height:250; padding:5; border-width:thin; border-style:solid; border-color:#BDBDBD\">";
	 	//echo"<table border = \"1\"><tr><td width = \"300\">";
  	 	
  	 	//echo "<table border = \"1\" width = \"300\"><tr><td>";
  	 	if( strtotime($starttime) > strtotime($today) ) 
  	 	{
     		
     		
     		$days = dateDiff($starttime,$today);
     		echo "<div style=\"position:relative;top:2;left:10;\">";
     		echo "<font size=\"4\" face=\"arial\" color=\"#585858\"><b>Game <font size=\"6\" face=\"arial\" color=\"#0080FF\"><b>".$name."</b></font>";
     		echo "<br><br>not started yet starting in ".$days." days</div>";
		}
		else
		{
			/*
			if($duration == "1 week"){
				$endtime = date("20y-m-j H:i:s", strtotime($starttime ."+7 days" ));
				$diff = abs(strtotime($endtime) - strtotime($starttime));
     			$days = floor($diff / (60*60*24));
				
			}
			if($duration == "2 weeks"){
				$endtime = date("20y-m-j H:i:s", strtotime($starttime ."+14 days" ));	
				$diff = abs(strtotime($endtime) - strtotime($starttime));
     			$days = floor($diff / (60*60*24));
				
			}
			if($duration == "3 weeks"){
				$endtime = date("20y-m-j H:i:s", strtotime($starttime ."+21 days" ));
				$diff = abs(strtotime($endtime) - strtotime($starttime));
     			$days = floor($diff / (60*60*24));
			}
			if($duration == "4 weeks"){
				$endtime = date("20y-m-j H:i:s", strtotime($starttime ."+28 days" ));	
				$diff = abs(strtotime($endtime) - strtotime($starttime));
     			$days = floor($diff / (60*60*24));
			
			}*/
			//$days = date_diff(date("20y-m-j H:i:s"), $endtime);
			
			$days = dateDiff($today, $endtime);
			
			echo "<div style=\"position:relative;top:2;left:10; \">";
			echo "<font size=\"4\" face=\"arial\" color=\"#585858\"><b>Game <font size=\"6\" face=\"arial\" color=\"#0080FF\"><b>".$name."</b></font>";
     		echo "<br><br>finishing in <font size=\"3\" face=\"arial\" color=\"#0080FF\"><b>".$days." days</b></font></div>";
		}
  	 	
  	 	
  	 	
  	 	
  	 	
  	 	//echo $name." ".$starttime." ".$duration."<br><br>";
  	 	
	 
	 
	 
	 
	 $result2 = mysql_query("SELECT * FROM Item WHERE Item_id = '$iid'");

	 while($row2 = mysql_fetch_array($result2))
	 {
	 	$startingtitle = $row2['Title'];
	 }
	 
	 $result3 = mysql_query("SELECT * FROM Item WHERE Item_id = '$ciid'");
	 while($row3 = mysql_fetch_array($result3))
	 {
	 	$currenttitle = $row3['Title'];
	 }
	 
	 
	 //echo "<tr><td>";
	 
	 echo "<div style=\"position:relative;top:25;left:10; \">";
	 echo "Starting Item<br>";
	 
	 	echo "<div style=\"border-style:solid;border-color:#6E6E6E; width:136\"><div style=\"border-style:solid;border-color: yellow; width:130\">";
	 	echo "<img src=\"image/upload/"."$iid". "1.jpg\" alt=\"img\" height=\"100\" width=\"130\"    /></div></div></div><div style=\"position:relative;top:-75;left:153;\">";
	 	echo "<font size=\"2\" face=\"arial\" color=\"#A4A4A4\">".$startingtitle."</font></div>";
	 	
	 	
	 	//echo "<div style=\"border-style:solid;border-color:#grey; width:1px; height:20px\"></div>";
	 	
	 	echo "<div style=\"position:relative;top:-218;left:400; width:300\">";
	 	echo "Current Item: </b></div>";
	 	//echo "<tr><td>";
	 	
	 	
	 	echo "<div style=\"position:relative;top:-238;left:400; width:300\">";
	 	echo "<font size=\"2\" face=\"arial\" color=\"#A4A4A4\">";
	 	echo "<br>".$currenttitle."</font><b><br>";
	 	echo "<div style=\"border-style:solid;border-color:#6E6E6E; width:236\"><div style=\"border-style:solid;border-color: yellow; width:230\">";
	 	echo "<img src=\"image/upload/"."$ciid". "1.jpg\" alt=\"img\" height=\"175\" width=\"230\"    /></div></div></a></div>";
	 	echo "</div></a><br><br></b></font>";
	 }
}

include("categories.php"); 
?>

<?php include("footer.php"); 
?>