<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: This page shows the user inventory 



		-->*/		
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

echo "<div>";
echo "<div style=\"position:absolute;top:200;left:300;\">";

echo "<font size = \"8\" face=\"arial\" color=\"#0080FF\"><b>INVENTORY</b><font>";


echo "<table border = \"0\" width=\"650 \"   cellspacing=\"50\">";
   $colrowindex++;
$rowcolindex++;
if(($colrowindex % 2) == 1)
{
	if(($rowcolindex % 2) == 0)
	{
		echo "</tr>";
		echo "<tr VALIGN=\"top\">";
	}
}
echo "<td VALIGN=\"top\" ALIGN=\"center\" > ";
echo "<div  class = \"else\" style = \"border-width:thin; border-style:solid; border-color:#BDBDBD;\">";
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
echo "<td VALIGN=\"top\" ALIGN=\"center\">";

  $itemid = $row['Item_id'];
  $title = $row['Title'];
  $status = $row['Status'];
 
  //echo "<br><br>".$itemid;
  echo "<div  class = \"else\"  style = \"border-width:thin; border-style:solid; border-color:#BDBDBD;\">";
  echo "<table  border = \"0\" width = \"300\"><tr><td ALIGN = \"center\" VALIGN=\"bottom\">";
  echo $title."</td></tr>";
  
echo "<tr><td VALIGN=\"top\" ALIGN = \"center\">";
  
  echo "<div style=\"border-style:solid;border-color:#6E6E6E;width:226px; height:206px\"><div style=\"border-style:solid;border-color: yellow;width:220px; height:200px\">";
  
  echo "<form action=\"item.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$itemid". " />";
  
  
  
  
  
  if(file_exists("image/upload/".$itemid."1.jpg"))
{
  echo "<input type=\"image\" src=\"image/upload/"."$itemid". "1.jpg\" alt=\"Submit\" height=\"200\" width=\"220\"    /></form></div></div></td></tr>";
}
else
{
  echo "<input type=\"image\" src=\"default.png\" alt=\"Submit\" height=\"200\" width=\"220\"    /></form></div></div></td></tr>";
}
  
  //echo "<img src=\"image/upload/"."$itemid". "1.jpg\" alt=\"Smiley face\" height=\"200\" width=\"220\" /></div></div></td></tr>";
  
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
  
  if($status == "FREE TO USE")
  {
  	echo "<div style=\"position:relative;top:-20;left:-100;\">";
  	echo "<form action=\"removeitem.php\" method=\"post\"><input type= \"hidden\" name=\"iid\" value="."$itemid". " />";
  	echo "<input type=\"image\" src=\"removeitem.png\" alt=\"Submit\"/>";
  	echo "</form>";
  	echo "</div>";
  }
  
  }
  
  echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

echo "</div>";

mysql_close($con);

include("categories.php"); 
?>


<?php include("footer.php"); 

}
?>