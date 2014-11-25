<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: displays a users account.



		-->
		*/		
?>
<?php

session_start();
if($_SESSION['username'] == NULL)
{
	echo "<script type=\"text/javascript\">document.location.href=\"Register.php\";</script>";

}
else
{
include("header.php"); 


	if($_GET['userid'] == Null)
	{
		$uname = $_SESSION['username'];
	}

	else
	{
		$uname = $_GET['userid'];
	}
	
if($_GET['other'] != Null)
{
	$uname = $_GET['other'];
}

$ratetotal= 0;

//echo $username;
$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("SELECT * FROM userreview WHERE username = '$uname' ");
while($row = mysql_fetch_array($result))
{
	$ratetotal += $row['rating'];
}

//echo mysql_num_rows($result);
$ratetotal  /= mysql_num_rows($result);

echo "<div style=\"position:absolute;top:200;left:300;   \">";
echo "<font size = \"8\" face=\"arial\" color=\"#0080FF\"><b>account: ".$uname."</b></font>";


$ratetotal1 = $ratetotal +1 ;
//echo $result;

echo "<div style = \"position:absolute;top:100;left:0; width:700\" >";
echo "Star Rating<br>";
for($i = 0; $i < 5; $i++)
{
		
		echo "<img src = \"emptystar.png\">";
}
echo "</div>";


echo "<div style = \"position:absolute;top:100;left:0; width:700\" >";
echo "<br>";
for($i = 0; $i < $ratetotal; $i++)
{
	$ratetotal1 -= 1;
	if($ratetotal1 < 1)
	{
		echo "<img src = \"starhalf.png\">";
	}
	else
	{
		echo "<img src = \"star.png\">";
	}
	
}
echo "</div>";


echo "<div style = \"position:relative;top:260; left:50;\">";
echo "User Reviews<br>";
echo "</div>";
$result = mysql_query("SELECT * FROM userreview WHERE username = '$uname' ORDER BY reviewid DESC");
while($row = mysql_fetch_array($result))
{
	
	echo "<div style = \"position:relative;top:270; left:50; border-style:solid;border-color:#6E6E6E; width:600\" >";
	echo "<br>".$row['reviewer']." Said:<br>";
	echo $row['reviewtext'];
	
	echo "<div style = \"position:relative;left:450; bottom:0; \" >";
	for($i = 0; $i < $row['rating']; $i++)
	{
		echo "<img src = \"smallstar.png\">";
	}
	echo "</div>";
	
	echo "</div><br>";
	

}

echo "</div>";
include("footer.php"); 

}
?>