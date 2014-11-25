<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: displays a users inventory in a fancybox



		-->*/		
?>
<?php
session_start();
//include("header.php"); 

$colrowindex = 0;
$rowcolindex = 1;

$username = $_SESSION['username'];

$newitemi = 0;


$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("SELECT * FROM Item WHERE Username = '$username'");



echo "<font size = \"6\" face=\"arial\" color=\"#0080FF\"><b>INVENTORY</b><font>";


echo "<table border = \"0\" width=\"650 \"   cellspacing=\"50\">";
   $colrowindex++;
$rowcolindex++;
if(($colrowindex % 2) == 1)
{
	if(($rowcolindex % 2) == 0)
	{
		echo "</tr>";
		echo "<tr>";
	}
}
echo "<td VALIGN=\"top\" ALIGN=\"center\" > ";
echo "<div  style = \"border-width: 1px; border-style: solid; border-color:grey;\">";
echo "<table  border = \"0\"><tr><td ALIGN = \"center\">";
echo "ADD NEW ITEM</td></tr>";
echo "<tr><td VALIGN = \"top\" ALIGN = \"center\" height = \"224\">";
echo "<div style=\"border-style:solid;border-color:#6E6E6E;\"><div style=\"border-style:solid;border-color: yellow;\">";
echo "<a href=\"newitem.php\"><img src=\"additem.png\" alt=\"Smiley face\" height=\"200\" width=\"220\" /></a></div></div></td</tr></table></div>";



while($row = mysql_fetch_array($result))
  {
  
  //echo "<div style=\"border-width:thin; border-style:solid; border-color:#BDBDBD\">";
   $colrowindex++;
$rowcolindex++;

if(($colrowindex % 2) == 1)
{
	if(($rowcolindex % 2) == 0)
	{
		echo "</tr>";
		echo "<tr>";
	}
}
echo "<td VALIGN=\"middle\" ALIGN=\"center\">";

  $itemid = $row['Item_id'];
  $title = $row['Title'];
  $status = $row['Status'];
 
  //echo "<br><br>".$itemid;
  echo "<div  style = \"border-width: 1px; border-style: solid; border-color:grey;\">";
  echo "<table  border = \"0\" width = \"300\"><tr><td ALIGN = \"center\" VALIGN=\"bottom\">";
  echo $title."</td></tr>";
  
  echo "<tr><td VALIGN=\"top\" ALIGN = \"center\">";
  
  echo "<div style=\"border-style:solid;border-color:#6E6E6E;height:206px;width:226px\"><div style=\"border-style:solid;border-color: yellow;height:200px;width:220px\">";
  
  if($status == "FREE TO USE")
  {
  echo "<form action=\"newauction.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$itemid". " />";
  echo "<input type=\"image\" src=\"image/upload/"."$itemid". "1.jpg\" alt=\"Submit\" height=\"200\" width=\"220\"    /></form></div></div></td></tr>";
  }
  
  else
  {
  	echo "<img src=\"image/upload/"."$itemid". "1.jpg\" alt=\"Submit\" height=\"200\" width=\"220\"    />";
  }
  
  if($status == "UP FOR AUCTION")
  {
  	echo "<tr><td ALIGN = \"center\">status :<font size = \"3\" face=\"arial\" color=\"red\"><b>".$status."</b></font></td></tr>";
  }
  elseif($status == "FREE TO USE")
  {
  	echo "<tr><td ALIGN = \"center\">status :<font size = \"3\" face=\"arial\" color=\"green\"><b>".$status."</b></font></td></tr>";
  }
  elseif($status == "TOP BID IN AUCTION")
  {
  	echo "<tr><td ALIGN = \"center\">status :<font size = \"3\" face=\"arial\" color=\"red\"><b>".$status."</b></font></td></tr>";
  }
    elseif($status == "CURRENTLY IN GAME")
  {
  	echo "<tr><td ALIGN = \"center\">status :<font size = \"3\" face=\"arial\" color=\"red\"><b>".$status."</b></font></td></tr>";
  }
  echo "</table>";
  echo "</div>";
  echo "</div>";
  }
  
  echo "</td>";
echo "</tr>";
echo "</table>";


mysql_close($con);
?>









