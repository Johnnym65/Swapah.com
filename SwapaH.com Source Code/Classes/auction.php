<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: displays all of an auctions details



		-->*/		
?>
<?php
session_start();
if($_SESSION['username'] != null)
{
	$lata = $_SESSION['lat'];
	$longa = $_SESSION['long'];
}
?>



<script type="text/javascript">
	var dateNow= new Date();
	var latatude;
	var longatude;
</script>

<?php

session_start();
include("header.php"); 

//echo "<script>var tim='" + DateTime.Now.TimeOfDay.ToString() + "';</script>";
$today = date('20y-m-j H:i:s');



//$usern = "johnnym65";
$firstindex = 0;
$colrowindex = 0;
$rowcolindex = 1;
$isfinished = "no";
$username = $_SESSION['username'];
$todaytime = date('20y-m-j H:i:s');

if($_POST['aid'] == NULL)
{
	$auctionid = $_SESSION['auctionid'];
}

else
{
$auctionid = $_POST['aid'];
$_SESSION['auctionid']=$auctionid;

}
$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("SELECT * FROM Auction WHERE AuctionID = '$auctionid'");






while($row = mysql_fetch_array($result))
  {
$colrowindex++;
$rowcolindex++;

$ausername = $row['username'];


$result10 = mysql_query("SELECT * FROM User WHERE username = '$ausername'"); 
while($row10 = mysql_fetch_array($result10))
{
$address = $row10['address'];


$geocode=file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".$address."&sensor=false");
																					
$output= json_decode($geocode);

$blah = $output->results[0]->geometry->location->lat;
$blah1 = $output->results[0]->geometry->location->lng;
}

?>

<script type="text/javascript">
	
	 latatude = <?= $lat ?>;
	 longatude = <?= $long ?>;
	
</script>

<?php


$endtime = $row['end_time'];
$auctionid = $row['AuctionID'];
//echo $endtime;

if(strtotime($endtime) < strtotime($todaytime))
{
	mysql_query("UPDATE Auction
				SET Finished='yes'
				WHERE AuctionID='$auctionid'");
}


  
  $auctionid = $row['AuctionID'];
 
  $item = $row['Item_id'];
  $endt = $row['end_time'];
  $today = date('20y-m-j H:i:s');
  
  $tbid = $row['Bid_id'];
  $auctionuser = $row['username'];
  $allowquestions = $row['allowQ'];
  
  if( strtotime($endt) < strtotime($today) ) {
     $isfinished = "yes";
}


  
}

// Delimiters may be slash, dot, or hyphen
$date = "04/30/1973";
list($year, $month, $day, $hour, $minute, $second) = split('[-: ]', $endt);

list($year1, $month1, $day1, $hour1, $minute1, $second1) = split('[-: ]', $todaytime);
//echo "Month: $month; Day: $day; Year: $year; Hour: $hour; Minute: $minute; Second: $second<br />\n";
$month = ($month - 1);
$month1 = ($month1 - 1);

//echo $item;

$result1 = mysql_query("SELECT * FROM Item WHERE Item_id = $item");

while($row1 = mysql_fetch_array($result1))
  {

  		$title =  $row1['Title'];
  		$description = $row1['Description'];
  		$condition = $row1['Condition'];
  		$usern = $row1['Username'];
  		$youtubelink = $row1['youtubelink'];
  		$yid = $row1['yid'];
  		
  }
  
  echo "<div style=\"position:absolute;top:200;left:300; width:500\">";
//echo $endt;



////////////////////////////////
echo "<div style = \"position:absolute;top:22;left:10; width:500\">";

if(file_exists("image/upload/".$item."1.jpg"))
{
	echo "<a id=\"example1\" href=\"image/upload/"."$item". "1.jpg\"><img src=\"image/upload/"."$item". "1.jpg\" alt=\"Smiley face\" height=\"320\" width=\"352\" style = \"border:4px solid yellow;\" /></a><br>";
}
else
{
	echo "<a id=\"example1\" href=\"image/upload/noimage.jpg\"><img src=\"image/upload/noimage.jpg\" alt=\"Smiley face\" height=\"320\" width=\"352\" style = \"border:4px solid yellow;\" /></a><br>";
}
if(file_exists("image/upload/".$item."2.jpg"))
{
	echo "<a id=\"example1\" href=\"image/upload/"."$item". "2.jpg\"><img src=\"image/upload/"."$item". "2.jpg\" alt=\"Smiley face\" height=\"78\" width=\"86\" style = \"border:2px solid yellow;\" /></a>";
}
//else
//{
//	echo "<a id=\"example1\" href=\"default.png\"><img src=\"default.png\" alt=\"Smiley face\" height=\"78\" width=\"86\" style = \"border:2px solid yellow;\" /></a>";
//}

if(file_exists("image/upload/".$item."3.jpg"))
{
echo "<a id=\"example1\" href=\"image/upload/"."$item". "3.jpg\"><img src=\"image/upload/"."$item". "3.jpg\" alt=\"Smiley face\" height=\"78\" width=\"86\" style = \"border:2px solid yellow;\" /></a>";
}

if(file_exists("image/upload/".$item."4.jpg"))
{
echo "<a id=\"example1\" href=\"image/upload/"."$item". "4.jpg\"><img src=\"image/upload/"."$item". "4.jpg\" alt=\"Smiley face\" height=\"78\" width=\"86\" style = \"border:2px solid yellow;\" /></a>";
}
if(file_exists("image/upload/".$item."5.jpg"))
{
echo "<a id=\"example1\" href=\"image/upload/"."$item". "5.jpg\"><img src=\"image/upload/"."$item". "5.jpg\" alt=\"Smiley face\" height=\"78\" width=\"86\" style = \"border:2px solid yellow;\" /></a>";
}

echo "</div>";
//////////////////////////////////

echo "<div style = \"position:absolute;top:22;left:400; width:400\">";
echo "<font size=\"5\" face=\"arial\" color=\"#585858\"><b>";
echo $title;
echo "</b></font></div>";

	
?>

<div style = "position:absolute;top:100;left:400; width:500">
<font size="3" face="arial" color="#585858"><b>
Time Left:<br>
</b></font>

<font size="4" face="arial" color="#0080FF"><b>
<div id="countbox1"></div></b></font>
</div>



<div style = "position:absolute;top:142;left:400; width:500">
	
<font size="3" face="arial" color="#585858"><b>
<br>Item Location:<br>
</b></font>
	
<font size="4" face="arial" color="#0080FF"><b>
<div id="distance1"></div>
</b></font>
</div>








<script type="text/javascript">


dateFuture1 = new Date(<?php echo $year; ?>,<?php echo $month; ?>,<?php echo $day; ?>,<?php echo $hour; ?>,<?php echo $minute; ?>,<?php echo $second; ?>);

function GetCount(ddate,iid){

	

	dateNow = new Date(dateNow);
	
	dateNow.setSeconds(dateNow.getSeconds() + 1);
	
	
	
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

	
	
	
<script type="text/javascript">


function getDistance(di, alat, along, lat2, long2)
{ 
	
	var lat1 = lat2;
  	var lat2 = alat;
  	var lon1 = long2;
  	var lon2 = along;
  
 	var R = 6371; // Radius of the earth in km
	var dLat = (lat2-lat1).toRad();  // Javascript functions in radians
	var dLon = (lon2-lon1).toRad(); 
	var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) * Math.sin(dLon/2) * Math.sin(dLon/2); 
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
	
	
	var d = R * c; // Distance in km
	d = d.toFixed(1);
	d = d+"KM away";
	document.getElementById(di).innerHTML = d;
	
	
}

if (typeof(Number.prototype.toRad) === "undefined") {
  Number.prototype.toRad = function() {
    return this * Math.PI / 180;
  }
}

getDistance("distance1", <?=$lata?>, <?=$longa?>,<?=$blah?>, <?=$blah1?>);

</script>
	
	


	
	


























<?php 



$result2 = mysql_query("SELECT * FROM User WHERE username = '$usern'");

while($row2 = mysql_fetch_array($result2))
  {
  		

  		
  		
  }




echo "<div style = \"position:absolute;top:217;left:400; width:500\">";

echo"<font size=\"3\" face=\"arial\" color=\"#585858\"><b>";
echo "Top bid:";
echo"</b></font>";
echo "</div>";








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
  	$topbidder = $row4['Username'];
  		
  		
}



if($tbid != 0)
{


echo "<div class = \"shadow\" style = \"border-width: 4px; border-style: solid; border-color:#BDBDBD;position:absolute;top:244;left:400; width:375px; height:120px; background-color:#E6E6E6\">";

echo "<div style=\"border-style:solid;border-color:#6E6E6E;width:101px; height:81px; position:relative;top:7;left:7;\"><div style=\"border-style:solid;border-color: yellow;width:95px; height:75px\">";
echo "<form action=\"viewitem.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$topbiditem". " >";
echo "<input type=\"image\" src=\"image/upload/"."$topbiditem". "1.jpg\" alt=\"Smiley face\" height=\"75\" width=\"95\"  /></form></div></div>";
//echo "<img src=\"image/upload/"."$topbiditem". "1.jpg\" alt=\"Smiley face\" height=\"75\" width=\"95\" style = \"border:2px solid yellow;position:relative;top:7;left:7;\" />";



echo "<div style = \"position:relative;top:-80;left:125; width:250\">";
echo "<font size=\"1.5\" face=\"arial\" color=\"#585858\"><b>";
echo $topbiditemtitle;
echo "</b></font>";
echo "</div>";


echo "<div style = \"position:relative;top:-80;left:125; width:230\">";
echo "<hr>";

echo "</div>";


//echo "<br>".$bidtime;
$today = date('20y-m-j h:i:s');
//echo "<br>".$today;

$diff = abs(strtotime($bidtime) - strtotime($today));
$diff = ($diff/60)/60;
$diff2 = (int)$diff;

echo "<div style = \"position:relative;top:-85;left:125\">";
echo "<font size=\"2\" face=\"arial\" color=\"#0080FF\"><b>";
echo $diff2." Hours Ago";
echo "</b></font>";
echo "</div>";


if($_SESSION['username'] != NULL)
{

if(strtotime($endtime) > strtotime($today))
{
if($isfinished != 'yes')
{
if($auctionuser != $_SESSION['username'])
{
if($topbidder != $_SESSION['username'])
{
 	
		echo "<a id = \"example1\" href = \"fancybidinventory.php\"><div  style = \"border-width: 4px; border-style: solid; border-color:#04B404;position:relative;top:-80;left:125; width:170px; height:35px; background-color:#3ADF00; vertical-align:middle\">";
		echo "<div style = \"position:relative;top:8;left:32;\">";
		echo"<font size=\"3\" face=\"arial\" color=\"white\"><b>OFFER SWAP</b></font>";
		echo "</div>";
		echo "</div></a>";
	
}

else
{
		echo "<div style = \"position:relative;top:-80;left:230;\">";
		echo"<font size=\"3\" face=\"arial\" color=\"Grey\"><b>Your Top Bid</b></font>";
		echo "</div>";
		

}

}
}
}
}
echo "</div>";
}

else
{

	echo "<div style = \"position:absolute;top:238;left:400; width:500\">";
	echo"<font size=\"4\" face=\"arial\" color=\"red\"><b>";
	echo"NO BIDS YET";
	echo"</b></font></div>";
	

if($_SESSION['username'] != NULL)
{

if(strtotime($endtime) > strtotime($today))
{
if($is != 'yes')
{
if($auctionuser != $_SESSION['username'])
{
if($topbidder != $_SESSION['username'])
{
	echo "<a id = \"example1\" href = \"fancybidinventory.php\"><div  style = \"border-width: 4px; border-style: solid; border-color:#04B404;position:absolute;top:270;left:550; width:170px; height:35px; background-color:#3ADF00; vertical-align:middle\">";
	echo "<div style = \"position:relative;top:8;left:32;\">";
	echo"<font size=\"3\" face=\"arial\" color=\"white\"><b>OFFER SWAP</b></font>";
	echo "</div>";
	echo "</div></a>";
	
	echo "<div style = \"position:absolute;top:280;left:400; width:500\">";
	echo"<font size=\"4\" face=\"arial\" color=\"red\"><b>";
	echo"Be First to Bid!";
	echo"</b></font></div>";
}
}
}
}
}
}



echo "<div style = \"position:absolute;top:390;left:400; width:500\">";
echo"<font size=\"3\" face=\"arial\" color=\"#585858\"><b>";
echo "Swapper: ";
echo "<b></font>";

echo"<font size=\"4\" face=\"arial\" color=\"#0080FF\"><b>";
echo $usern; 
echo "<b></font>";

echo "</div>";




echo "<div  style = \"border-width: 4px; border-style: solid; border-color:#BDBDBD;position:absolute;top:500;left:10; width:765px; background-color:#E6E6E6; \">";




echo "<div style = \"position:relative;top:15;left:25\">";
echo"<font size=\"4\" face=\"arial\" color=\"#585858\"><b>";
echo "Description:";
echo "<b></font>";
echo "</div>";

echo "<div  style = \"border-width: 2px; border-style: solid; border-color:#BDBDBD;position:relative;top:15;left:100; width:580px; height:200px; background-color:#F2F2F2; \">";
echo"<font size=\"3\" face=\"arial\" color=\"#585858\">";
echo $description;
echo "</font>";
echo "</div>";


echo "<div style = \"position:relative;top:80;left:25; height:50px\">";
echo"<font size=\"4\" face=\"arial\" color=\"#585858\"><b>";
echo "Condition:  <font size=\"4\" face=\"arial\" color=\"#0080FF\"><b>".$condition."</b></font>";
echo "<b></font>";
echo "</div>";
///////////////////


echo "<div style = \"position:relative;top:30;left:320\">";
echo"<font size=\"4\" face=\"arial\" color=\"#585858\"><b>";
echo "Youtube Video:";
echo "<b></font>";
echo "</div>";



echo "<div>";
echo "<div style = \"position:relative;top:-20;left:470\">";
echo "<a class = \"youtube\" href=\"".$youtubelink."\">";
echo "<img src=\"http://img.youtube.com/vi/".$yid."/1.jpg\" alt =\"error\" style = \"border:4px solid yellow;\" /></a></div>";

echo "<div style = \"position:relative;top:-92;left:500\">";
echo "<a class = \"youtube\" href=\"".$youtubelink."\">";
echo "<img src=\"playt.png\" alt =\"error\"/></a></div></div>";
///////////////////

echo "<div style = \"position:relative;top:150;left:25\">";
echo"<font size=\"4\" face=\"arial\" color=\"#585858\"><b>";
echo "Questions And Answers:  ";
echo "<b></font>";
echo "</div>";


echo "<div  style = \"border-width: 2px; border-style: solid; border-color:#BDBDBD;position:relative;top:170;left:50; width:665px; background-color:#F2F2F2; \">";



if($allowquestions == 'on')
{
$result5 = mysql_query("SELECT * FROM AuctionQuestion WHERE Auction_id = $auctionid");

while($row5 = mysql_fetch_array($result5))
  {
  		$questionid = $row5['question_id'];
  		echo "<font size=\"3\" face=\"arial\" color=\"#0080FF\">".$row5['username']." Asked: <br>";
  		echo "<font size=\"5\" face=\"arial\" color=\"#FF0040\">          Q.  </font><font size=\"3\" face=\"arial\" color=\"#585858\">".$row5['question']."</font><br><br>";
  		if($row5['answer'] != Null)
  		{
  		echo "<font size=\"5\" face=\"arial\" color=\"#01DF01\">          A.  </font><font size=\"3\" face=\"arial\" color=\"#585858\">".$row5['answer']."</font><br><br><br>";
  		}
  		else 
  		{
  			if($auctionuser != $_SESSION['username'])
			{
  				echo "<font size=\"5\" face=\"arial\" color=\"#01DF01\">          A.  </font><font size=\"3\" face=\"arial\" color=\"#585858\">no Answer Yet!</font><br><br><br>";
  			}
  			else
  			{
  			
  				echo "<div style = \"position:relative;top:0;left:0\">";
				echo"<font size=\"4\" face=\"arial\" color=\"#585858\"><b>";
				echo "Answer This Question";
				echo "<b></font>";
				echo "</div>";


				echo "<form action=\"answerchecker.php\" method=\"post\"><input type= \"hidden\" name=\"qid\" value="."$questionid". " />";
				echo "<textarea cols=\"70\" rows=\"3\" name=\"answer\" value = \"hello\"></textarea>";

				echo "<div style = \"position:relative;top:-40;left:520\">";
				echo "<input type=\"image\"  src=\"answer.png\" alt=\"some_text\"/></form> ";
				echo "</div>";
  			
  			}
  		}
  		
  		//$topbiditem = $row5['Item_id'];
  		//$bidtime = $row3['bid_time'];
  		//echo "<br>".$row3['Item_id'];
  		
  }
  
if($_SESSION['username'] != NULL)
{

if($auctionuser != $_SESSION['username'])
{
echo "<div style = \"position:relative;top:0;left:0\">";
echo"<font size=\"4\" face=\"arial\" color=\"#585858\"><b>";
echo "Ask A Question";
echo "<b></font>";
echo "</div>";



echo "<form action=\"questionchecker.php\" method=\"post\"><input type= \"hidden\" name=\"aid\" value="."$auctionid". " />";
echo "<textarea cols=\"70\" rows=\"3\" name=\"question\" value = \"hello\"></textarea>";

echo "<div style = \"position:relative;top:-40;left:520\">";
echo "<input type=\"image\"  src=\"Ask.png\" alt=\"some_text\"/></form> ";
echo "</div>";
}
}
}
else
{
	echo"<font size=\"3\" face=\"arial\" color=\"#585858\">Questions Disabled</font>";
}

echo "</div>";
echo "</div>";
echo "</div>";




mysql_close($con);

//include("footer.php"); 
include("categories.php"); 
include("footer.php"); 

?>