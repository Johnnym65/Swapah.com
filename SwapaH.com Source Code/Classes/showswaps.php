<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: shows a users past swaps in a game



		-->*/		
?>
<?php

session_start();
$username = $_SESSION['username'];
$gameID = $_GET['gid'];

$index = 0;

$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);


$result = mysql_query("SELECT * FROM swappahgame WHERE gameid = '$gameID'");
while($row = mysql_fetch_array($result))
  {
  	$gamename = $row['gamename']; 
  }
  
  
 	echo "<b><font size = \"4\" face=\"arial\" color=\"#585858\">";
	echo "You're Swaps in Game: </font>";
	echo "<font size=\"6\" face=\"arial\" color=\"#0080FF\">";
  	echo " ".$gamename."</b></font><br>";
  
  
  



$result = mysql_query("SELECT * FROM Swap WHERE currentuser = '$username' OR swapuser = '$username' AND gameid = '$gameID'");
$numofswaps = mysql_num_rows($result);

while($row = mysql_fetch_array($result))
  {
  	
  	$item1 = $row['currentitem'];
  	$item2 = $row['swapitem'];
  	$suser = $row['swapuser'];
  	
  	//echo  $suser." and ".$username;
  	echo "<table border = \"0\">";
  	
  	if($index != 0)
  	{
  		echo "<tr><td></td><td><img width = \"200\" src=\"line.png\" alt=\"Smiley face\"/></td><td></td></tr>";
  		
  	}
  	$index++;
  	if($suser == $username)
  	{
  		echo "<tr><td>";
  		$result1 = mysql_query("SELECT * FROM Item WHERE Item_id = '$item1'");
  		while($row1 = mysql_fetch_array($result1))
  		{
  			echo substr($row1['Title'], 0, 22)."<br>";
  			//echo $row1['Title']."<br>";
  			echo "<img src=\"image/upload/"."$item1". "1.jpg\" alt=\"Smiley face\" height=\"140\" width=\"180\" style = \"border:2px solid yellow;\" /></td>";
  		}
  	
  		echo "<td align = \"center\" width = \"200\"> <img src=\"swaparrow.png\" alt=\"Smiley face\"/></td>";
  	
  		$result2 = mysql_query("SELECT * FROM Item WHERE Item_id = '$item2'");
  		while($row2 = mysql_fetch_array($result2))
  		{
  			echo "<td>".substr($row2['Title'], 0, 22)."<br>";
  			echo "<img src=\"image/upload/"."$item2". "1.jpg\" alt=\"Smiley face\" height=\"140\" width=\"180\" style = \"border:2px solid yellow;\" /></td></tr>";
  		}
  	}
  	
  	
  	
  	else
  	{
  		echo "<tr><td>";
  		$result2 = mysql_query("SELECT * FROM Item WHERE Item_id = '$item2'");
  		while($row2 = mysql_fetch_array($result2))
  		{
  			substr($row2['Title'], 0, 22)."<br>";
  			echo "<img src=\"image/upload/"."$item2". "1.jpg\" alt=\"Smiley face\" height=\"140\" width=\"180\" style = \"border:2px solid yellow;\" />";
  			echo "</td>";
  		}
  		
  		echo "<td align = \"center\" width = \"200\"> <img src=\"swaparrow.png\" alt=\"Smiley face\"/> </td>";
  		
  		$result1 = mysql_query("SELECT * FROM Item WHERE Item_id = '$item1'");
  		while($row1 = mysql_fetch_array($result1))
  		{
  			echo "<td>";
  			substr($row1['Title'], 0, 22)."<br>";
  			echo "<img src=\"image/upload/"."$item1". "1.jpg\" alt=\"Smiley face\" height=\"140\" width=\"180\" style = \"border:2px solid yellow;\" />";
  			echo "</td></tr>";
  		}
  		
  	}
  	
  	
  		
  		
  	
  	
  	echo "</table>";
  	//echo $row['currentitem']." ";
  	//echo $row['swapitem']." ";
  }



?>