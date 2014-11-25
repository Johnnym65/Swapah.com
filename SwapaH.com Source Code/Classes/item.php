<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: This shows the details of an individual item and allows the owner to edit it if they wish



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
  
  
echo "<div style = \"position:relative;top:20;left:170; width:500\">";
if(file_exists("image/upload/".$item."1.jpg"))
{
	echo "<a id=\"example1\" href=\"image/upload/"."$item". "1.jpg\"><img src=\"image/upload/"."$item". "1.jpg\" alt=\"Smiley face\" height=\"320\" width=\"352\" style = \"border:4px solid yellow;\" /></a><br>";
}
else
{
	echo "<a id=\"example1\" href=\"default.png\"><img src=\"default.png\" alt=\"Smiley face\" height=\"320\" width=\"352\" style = \"border:4px solid yellow;\" /></a><br>";
}

if(file_exists("image/upload/".$item."2.jpg"))
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
if($status == "UP FOR AUCTION")
  {
  	 echo "<font size = \"4\" face=\"arial\" color=\"#585858\"><b>";
  	echo "status: </b></font> <font size = \"3\" face=\"arial\" color=\"red\"><b>".$status."</b></font>";
  }
  elseif($status == "FREE TO USE")
  {
  	 echo "<font size = \"4\" face=\"arial\" color=\"#585858\"><b>";
  	echo "status: </b></font><font size = \"3\" face=\"arial\" color=\"green\"><b>".$status."</b></font>";
  }
echo "</div>";
  
echo "<div style = \"position:relative;top:70;left:15; width:500\">";

echo"<form enctype=\"multipart/form-data\" action=\"updateitemcheck.php\" method=\"POST\"> <input type= \"hidden\" name=\"iid\" value="."$item". " />";

 echo "<font size = \"4\" face=\"arial\" color=\"#585858\"><b>";
echo "Condition: </b></font>";

echo "<select name=\"Condition\" size=\"1\">";
  echo "<option value=\"".$row['Condition']."\">".$row['Condition']."</option>";
  
  if($row['Condition'] != "Brand New"){
  echo "<option value=\"Brand New\">Brand New</option>";
  }
  
  if($row['Condition'] != "USED"){
  echo "<option value=\"USED\">USED</option>";
  }
  
  if($row['Condition'] != "Like New"){
  echo "<option value=\"Like New\">Like New</option>";
  }
  
  if($row['Condition'] != "Average Condition"){
  echo "<option value=\"Average Condition\">Average Condition</option>";
  }
  
  if($row['Condition'] != "Poor Condition"){
  echo "<option value=\"Poor Condition\">Poor Condition</option>";
  }
echo "</select>";

//<font size = \"4\" face=\"arial\" color=\"#0080FF\"><b>".$row['Condition']."</b></font>";
echo "</div>";  
  
echo "<div style = \"position:relative;top:70;left:0; width:500\">";
 echo "<font size = \"4\" face=\"arial\" color=\"#585858\"><b>";
echo "Description: </b></font></div>";  

echo "<div style = \"position:relative;top:50;left:110; width:600\">";
echo" <font size = \"4\" face=\"arial\" color=\"#0080FF\"><b>";
echo "<textarea cols=\"75\" rows=\"10\" name=\"description\" style=\"font-family:arial; color:#0080FF; font-size:17\">".$row['Description']."</textarea></div>";
//echo $row['Description']."</b></font></div>";


  
  
echo "<div style = \"position:relative;top:100;left:-15; width:500\">";
 echo "<font size = \"4\" face=\"arial\" color=\"#585858\"><b>";
echo "Youtube Link: </b></font></div>"; 

echo "<div style = \"position:relative;top:80;left:110; width:600\">";
echo "<input type \"text\" size = \"50\" name = \"ylink\" value = \"".$row['youtubelink']."\" /></div>";

echo "<div>";
echo "<div style = \"position:relative;top:20;left:420; width:600\">";
echo "<a class = \"youtube\" href=\"".$row['youtubelink']."\">";
echo "<img src=\"http://img.youtube.com/vi/".$row['yid']."/1.jpg\" alt =\"error\" style = \"border:4px solid yellow;\"/></a></div>";

echo "<div style = \"position:relative;top:-52;left:450\">";
echo "<a class = \"youtube\" href=\"".$row['youtubelink']."\">";
echo "<img src=\"playt.png\" alt =\"error\"/></a></div></div>";



echo "<div style = \"position:relative;top:0;left:350; width:600\">";
echo "<input type=\"submit\" value=\"Update Item\" />";
echo "</div>";  

echo "</form>";
  
  }



//echo $itemid."</div>";





mysql_close($con);





?>
<?php include("footer.php"); 
?>