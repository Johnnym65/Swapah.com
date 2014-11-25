
<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: This displays the current games and allows users to join them



		-->*/		
?>
<?php 
session_start();

function dateDiff($d1, $d2) {
// Return the number of days between the two dates:

  return round(abs(strtotime($d1)-strtotime($d2))/86400);

} 

if($_SESSION['username'] == NULL)
{
	echo "<script type=\"text/javascript\">document.location.href=\"register.php\";</script>";

}
else
{

$username = $_SESSION['username'];

$itemID = $_POST['iid'];

include("header.php"); 

echo "<a href=\"index.php\"><img class = \"shadow\" src=\"newgamelong.png\" style=\"position:absolute; left:185px;top:300px;\"  /></a>";

echo "<div style=\"position:absolute;top:313;left:400;\">";
echo "<font size = \"6\" face=\"arial\" color=\"#424242\"><b>Join a SwappaH Game</b></font>";
echo "</div>";



echo "<div style=\"position:absolute;top:400;left:400; width:400;\">";
$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("SELECT * FROM swappahgame Where Finished = 'n'");

while($row = mysql_fetch_array($result))
{
	$gid = $row['gameid'];
	 $name = $row['gamename'];
  	 $starttime = $row['starttime'];
  	 $endtime = $row['endtime'];
  	 $duration = $row['duration'];
  	 $today = date('20y-m-j H:i:s');

	$result1 = mysql_query("SELECT * from gameusers where gameid = '$gid' and username = '$username'");
	$rows =  mysql_num_rows($result1);
	
	
	
	 
	 echo "<div style=\" width:600; border-width:thin; border-style:solid; border-color:#BDBDBD\">";
	 echo "<table border = \"0\" width = \"500\"><tr><td>";
	 echo "<font size=\"4\" face=\"arial\" color=\"#585858\"><b>Game <font size=\"6\" face=\"arial\" color=\"#0080FF\"><b>".$name."</b></font></td><td align = \"right\">";
	 
	 $result1 = mysql_query("SELECT * FROM gameusers WHERE gameid = '$gid'");
	 $numofplayers = mysql_num_rows($result1);
	 echo "num of players: ".$numofplayers."</td></tr>";
	 
	 if( strtotime($starttime) > strtotime($today) ) 
  	 {
  	 	$days = dateDiff($starttime,$today);
	 	echo "<tr><td>Starting in: <font size=\"3\" face=\"arial\" color=\"#0080FF\"><b>".$days. " Days</td><td rowspan = \"2\" align = \"right\">";
	 }
	 else
	 {
	 	$days = dateDiff($today, $endtime);
	 	echo "<tr><td>Ending in: <font size=\"3\" face=\"arial\" color=\"#0080FF\"><b>".$days. " Days</td><td rowspan = \"2\" align = \"right\">";
	 }
	 
	 echo "<form action=\"gamechecker.php\" method=\"post\"><input type= \"hidden\" name=\"gid\" value="."$gid". " >";
	 
	 if($rows == 0)
	 {
	 
	 echo "<a id=\"example1\" href=\"fancygameitem.php\"> <div style=\"width:150px; height:105px; border-style:solid;  border:4px solid grey\"><div style=\"width:142px; height:97px; border-style:solid;  border:4px solid yellow\">";
	 if($itemID == Null)
	 {
	 echo "</div></div></a>";
	 //echo "<input type = \"submit\" value = \"Join Game\"></form>";
	 echo "</td></tr>";
	 }
	 else
	 {
	 
	 
	 echo "<img src=\"image/upload/".$_POST['iid']. "1.jpg\" alt=\"Smiley face\" height=\"97\" width=\"142\" /></div></div></a>";
	 echo "<input type = \"hidden\" value = \"".$itemID."\" name = \"iid\">";
	 echo "<input type = \"submit\" value = \"Join Game\"></form>";
	 echo "</td></tr>";
	 
	 }
	 }
	 else{
	 echo "<font size=\"3\" face=\"arial\" color=\"Green\"><b>Already in This Game</b></font>";
	 }
	 echo "<tr><td>Duration: ".$duration."</td></tr></table></div><br>";


}




echo "</div>";

?>



<?php include("footer.php"); 
}
?>