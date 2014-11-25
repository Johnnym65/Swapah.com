<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: validates the info entered by the user for new item



		-->*/		
?>
<?php
session_start();
 

$username = $_SESSION['username'];
$target_path = "upload/";
$errormessage;

$titles = $_POST['title'];
$description = $_POST['description'];
$category = $_POST['Category'];
$condition = $_POST['Condition'];
$link = $_POST['ylink'];

//echo $titles;
//echo $description;
//echo $condition;



if($titles == null)
{
	$errormessage = "*Please enter title<br>";
}
if($description == null)
{
	$errormessage = $errormessage."*Please enter a Description<br>";
}

if($category == null)
{
	$errormessage = $errormessage."*Please choose a category<br>";
}


if($_FILES['uploadedfile']['tmp_name'] != null || $_FILES['uploadedfile2']['tmp_name'] != null ||
$_FILES['uploadedfile3']['tmp_name'] != null || $_FILES['uploadedfile4']['tmp_name'] != null ||
$_FILES['uploadedfile5']['tmp_name'] != null)
{


while($_FILES['uploadedfile']['tmp_name'] == null)
{
	$_FILES['uploadedfile']['tmp_name'] = $_FILES['uploadedfile2']['tmp_name'];
	$_FILES['uploadedfile2']['tmp_name'] = $_FILES['uploadedfile3']['tmp_name'];
	$_FILES['uploadedfile3']['tmp_name'] = $_FILES['uploadedfile4']['tmp_name'];
	$_FILES['uploadedfile4']['tmp_name'] = $_FILES['uploadedfile5']['tmp_name'];
	$_FILES['uploadedfile5']['tmp_name'] = null;
	
	
}

}
if($errormessage != null)
{
	Header("location:newitem.php?error=".$errormessage."");
}



else
{
$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("select * from Item order by Item_id desc limit 1;");

while($row = mysql_fetch_array($result))
  {
  	$item = $row['Item_id'];
  	//echo "<br><br>".$item;
  	
  	$item = ($item+1);
  	//echo "<br><br>".$item;
  }






move_uploaded_file($_FILES['uploadedfile']['tmp_name'], "image/upload/".$item."1.jpg");

  
  
  


move_uploaded_file($_FILES['uploadedfile2']['tmp_name'], "image/upload/".$item."2.jpg");




move_uploaded_file($_FILES['uploadedfile3']['tmp_name'], "image/upload/".$item."3.jpg");






move_uploaded_file($_FILES['uploadedfile4']['tmp_name'], "image/upload/".$item."4.jpg");







move_uploaded_file($_FILES['uploadedfile5']['tmp_name'], "image/upload/".$item."5.jpg");


$pieces = explode("=", $link);
$pieces2 = explode("&",$pieces[1]);
//echo $pieces2[0];

//echo "<img src = \"http://img.youtube.com/vi/".$pieces2[0]."/1.jpg\" alt = \"error\" />";


 mysql_query("INSERT INTO Item 
VALUES ('$item', '$titles','$username','$description','$condition','FREE TO USE', '$link', '$pieces2[0]', '$category')");





mysql_close($con);
Header("location:inventory.php");

}

  ?>