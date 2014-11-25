<?php

session_start();
?>
<head>
	<meta http-equiv="refresh" content="15" >
</head>
<?php



$message = $_POST['chatbox'];
$username = $_SESSION['username'];

$swapid = $_SESSION['sid'];
	


$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);









  





$result = mysql_query("SELECT * FROM gameswapchat WHERE swapid = '$swapid'");
while($row = mysql_fetch_array($result))
{
	if( $row['sender'] == $username)
	{
		echo "<font size=\"2\" face=\"arial\" color=\"#585858\">";
		echo "You Said:";
	}
	
	else
	{
		echo "<font size=\"2\" face=\"arial\" color=\"red\">";
		echo $row['sender']." Said:";
	}
	
	echo "</font><br><font size=\"4\" face=\"arial\" color=\"#0080FF\">".$row['message']."</font><br><br>";
	
}



echo "<a id=\"bot\"></a>";


echo "<a id=\"stop\"></a>";




?>