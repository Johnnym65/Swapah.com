<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: allows users to view a certain items details



		-->*/		
?>
<?php

session_start();
include("header.php"); 

$item = $_POST['iid'];


$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("SELECT * FROM Item WHERE Item_id = $item");





  echo "<div style=\"position:absolute;top:200;left:300; width:800\">";
while($row = mysql_fetch_array($result))
  {
  echo "<font size = \"8\" face=\"arial\" color=\"#0080FF\"><b>".$row['Title']."</b></font>";
  $status = $row['Status'];
  
/*  
  echo "<div style = \"position:relative;top:20;left:170; width:500\">";
echo "<a id=\"example1\" href=\"image/upload/"."$item". "1.jpg\"><img src=\"image/upload/"."$item". "1.jpg\" alt=\"Smiley face\" height=\"320\" width=\"352\" style = \"border:4px solid yellow;\" /></a><br>";
echo "<a id=\"example1\" href=\"image/upload/"."$item". "2.jpg\"><img src=\"image/upload/"."$item". "2.jpg\" alt=\"Smiley face\" height=\"78\" width=\"86\" style = \"border:2px solid yellow;\" /></a>";
echo "<a id=\"example1\" href=\"image/upload/"."$item". "3.jpg\"><img src=\"image/upload/"."$item". "3.jpg\" alt=\"Smiley face\" height=\"78\" width=\"86\" style = \"border:2px solid yellow;\" /></a>";
echo "<a id=\"example1\" href=\"image/upload/"."$item". "4.jpg\"><img src=\"image/upload/"."$item". "4.jpg\" alt=\"Smiley face\" height=\"78\" width=\"86\" style = \"border:2px solid yellow;\" /></a>";
echo "<a id=\"example1\" href=\"image/upload/"."$item". "5.jpg\"><img src=\"image/upload/"."$item". "5.jpg\" alt=\"Smiley face\" height=\"78\" width=\"86\" style = \"border:2px solid yellow;\" /></a>";


echo "</div>";*/


echo "<div style = \"position:relative;top:20;left:170; width:500\">";
if(file_exists("image/upload/".$item."1.jpg"))
{
	echo "<a id=\"example1\" href=\"image/upload/"."$item". "1.jpg\"><img src=\"image/upload/"."$item". "1.jpg\" alt=\"Smiley face\" height=\"320\" width=\"352\" style = \"border:4px solid yellow;\" /></a><br>";
}
else
{
	echo "<a id=\"example1\" href=\"image/upload/noimage.jpg\"><img src=\"image/upload/noimage.jpg\" alt=\"Smiley face\" height=\"320\" width=\"352\" style = \"border:4px solid yellow;\" /></a><br>";
}if(file_exists("image/upload/".$item."2.jpg"))
{
	echo "<a id=\"example1\" href=\"image/upload/"."$item". "2.jpg\"><img src=\"image/upload/"."$item". "2.jpg\" alt=\"Smiley face\" height=\"78\" width=\"86\" style = \"border:2px solid yellow;\" /></a>";
}
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



echo "<div style = \"position:relative;top:50;left:45; width:500\">";

echo "</div>";

echo "<div style = \"position:relative;top:30;left:43; width:500\">";


 echo "<font size = \"4\" face=\"arial\" color=\"#585858\"><b>";
echo "Owner: <font size = \"4\" face=\"arial\" color=\"#0080FF\"><b>".$row['Username']."</b></font></b></font>";



//<font size = \"4\" face=\"arial\" color=\"#0080FF\"><b>".$row['Condition']."</b></font>";
echo "</div>";  
  
echo "<div style = \"position:relative;top:60;left:15; width:500\">";


 echo "<font size = \"4\" face=\"arial\" color=\"#585858\"><b>";
echo "Condition: <font size = \"4\" face=\"arial\" color=\"#0080FF\"><b>".$row['Condition']."</b></font></b></font>";



//<font size = \"4\" face=\"arial\" color=\"#0080FF\"><b>".$row['Condition']."</b></font>";
echo "</div>";  
  
echo "<div style = \"position:relative;top:90;left:0; width:500\">";
 echo "<font size = \"4\" face=\"arial\" color=\"#585858\"><b>";
echo "Description: </b></font></div>";  

echo "<div style = \"position:relative;top:70;left:110; width:600\">";
echo" <font size = \"4\" face=\"arial\" color=\"#0080FF\"><b>";
echo $row['Description'];


echo "<div style = \"position:relative;top:100;left:-125; width:500\">";
 echo "<font size = \"4\" face=\"arial\" color=\"#585858\"><b>";
echo "Youtube Link: </b></font></div>"; 

/*
echo "<div style = \"position:relative;top:80;left:110; width:600\">";
echo "<a class = \"youtube\" href=\"".$row['youtubelink']."\">";
echo "<img src=\"http://img.youtube.com/vi/".$row['yid']."/1.jpg\" alt =\"error\"/></a></div>";
*/

if($row['youtubelink'] != Null)
{
echo "<div>";
echo "<div style = \"position:relative;top:50;left:5\">";
echo "<a class = \"youtube\" href=\"".$row['youtubelink']."\">";
echo "<img src=\"http://img.youtube.com/vi/".$row['yid']."/1.jpg\" alt =\"error\" style = \"border:4px solid yellow;\" /></a></div>";

echo "<div style = \"position:relative;top:-25;left:35\">";
echo "<a class = \"youtube\" href=\"".$row['youtubelink']."\">";
echo "<img src=\"playt.png\" alt =\"error\"/></a></div></div>";
}

else
{
	echo "<div style = \"position:relative;top:80;left:0\">";
	echo "</b><font color = \"red\">No Youtube Link Uploaded</font><b>";
	echo "</div>";
}






  
  
  }



//echo $itemid."</div>";





mysql_close($con);




include("categories.php"); 
?>


<?php include("footer.php"); 
?>


