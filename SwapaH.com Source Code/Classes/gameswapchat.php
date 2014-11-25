<?php

session_start();


$message = $_POST['chatbox'];
$username = $_SESSION['username'];

if( $_GET['sid'] == NULL)
{
  $swapid = $_SESSION['sid'];
  //echo "heellooo";
}

else
{
	$swapid = $_GET['sid'];
	$_SESSION['sid'] = $swapid;
}

$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);



//echo $message.$username.$auctionid;









echo "<div style = \"border-width: 4px; border-style: solid; border-color:#BDBDBD;position:absolute;top:0;left:0; width:600px; height:454px; background-color:White\">";





echo "<iframe src=\"gameswapchatframe.php#bot\"  width = \"596\"  height = \"450\"></iframe>";

echo "</div>";


echo"<form enctype=\"multipart/form-data\" action=\"gameswapchatcheck.php\" method=\"POST\"><input type= \"hidden\" name=\"sid\" value="."$swapid". " />";
echo "<div style = \"position:absolute; top:462; left:2\">";
echo "<textarea cols=\"51\" rows=\"5\" name=\"chatbox\" style=\"font-family:arial; color:#0080FF; font-size:17\"/>".$default."</textarea>";
echo "</div>";

echo "<div style = \"position:absolute; top:464; left:450\">";

echo "<input type=\"image\" src=\"send.png\" alt=\"Smiley face\" /><form>";

//echo "<a id = \"example1\" HREF=\"swapchatcheck.php?aid="."$auctionid"."&chatbox = hello\"><img src=\"send.png\" alt=\"Submit\" /></a>";
echo "</div>";






?>