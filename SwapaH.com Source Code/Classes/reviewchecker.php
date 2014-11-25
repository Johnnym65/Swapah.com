<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: validates a review



		-->*/		
?>
		<?php 
session_start();
include("header.php"); 


//echo $_POST['iid']; 
$ratetotal = $_GET['rating'];

$otheruser = $_SESSION['otheruser'];


echo "<div style=\"position:absolute;top:200;left:350;   \">";
echo "<font size = \"8\" face=\"arial\" color=\"#0080FF\"><b>Review for ".$_SESSION['otheruser']."</b></font>";


$ratetotal1 = $ratetotal +1 ;
//echo $result;

echo "<div style = \"position:absolute;top:100;left:0; width:700\" >";
for($i = 0; $i < 5; $i++)
{
		
		echo "<img src = \"emptystar.png\">";
}
echo "</div>";


echo "<div style = \"position:absolute;top:100;left:0; width:700\" >";
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
?>

<div style="position:absolute;top:250;left:00;   ">

<form enctype="multipart/form-data" action="submitreview.php" method="POST"> <input type= "hidden" name="rating" value=<?php echo $ratetotal; ?> />
Write a Review:<br>
<textarea cols="75" rows="10" name="review" style="font-family:arial; color:#0080FF; font-size:17"></textarea>

<input type = "image" src = "leave review.png"/>
</form>
</div>


