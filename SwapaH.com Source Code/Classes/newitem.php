<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: allows users to add a new item to their inventory



		-->*/		
?>
<html>
<body>
<?php
session_start();

$error = $_GET['error'];
if($_SESSION['username'] == NULL)
{
	echo "<script type=\"text/javascript\">document.location.href=\"register.php\";</script>";

}
else
{
include("header.php"); 


echo "<a  href=\"index.php\"><img  class = \"shadow\" src=\"longnewitem.png\" style=\"position:absolute; left:185px;top:380px;\"  /></a>";
echo "<div style=\"position:absolute;top:390;left:450;\">";
echo "<font size = \"6\" face=\"arial\" color=\"yellow\"><b>Add New Item</b></font>";
echo "</div>";
?>

<STYLE TYPE="text/css">
<!--
TD{font-family: Arial; font-size: 14pt; color:#585858}
--->
</STYLE>

<div style="position:absolute;top:330;left:350 ">

<?php echo $error; ?>
<form enctype="multipart/form-data" action="newitemcheck.php" method="POST">

<table cellpadding="13">

		<font size="3" face="arial" color="#585858"><b>
		<tr><td align = "right">
		*Title: </td><td><input type="text" name="title" size = "78"  maxlength="60"/></td></tr>
		
		
		<tr><td align = "right" valign = "top">
		*Description: </td><td><textarea cols="50" rows="10" name="description"></textarea></td></tr>
		<br>
		<br>
		<tr><td align = "right">
		*Category:</td><td><select name="Category" size="1">
		
  			<option value="Antiques">Antiques</option>
 		 	<option value="Books, Comics and Magazines">Books, Comics and Magazines</option>
  			<option value="Clothes">Clothes</option>
  			<option value="Collectables">Collectables</option>
  			<option value="Computer/Laptop">Computer/Laptop</option>
  			
  			<option value="instruments">instruments</option>
 		 	<option value="DVD's/Movies">DVD's/Movies</option>
  			<option value="Electronics">Electronics</option>
  			<option value="Home and Garden">Home and Garden</option>
  			<option value="jewellery">jewellery</option>
  			
  			
  			<option value="Mobile/Home Phones">Mobile/Home Phones</option>
 		 	<option value="Cars, Motorbikes and Vehicles">Cars, Motorbikes and Vehicles</option>
  			<option value="Music">Music</option>
  			<option value="Cash">Cash</option>
  			<option value="Sporting Goods">Sporting Goods</option>
  			<option value="Toys">Toys</option>
  			<option value="Other..">Other..</option>
  			
  			
		</select>
 
                </td></tr>


		<br>
		<br>
		<tr><td align = "right">
		*Condition:</td><td><select name="Condition" size="1">
  <option value="Brand New">Brand New</option>
  <option value="USED">USED</option>
  <option value="Like New">Like New</option>
  <option value="Average Condition">Average Condition</option>
  <option value="Poor Condition">Poor Condition</option>
</select>

</td></tr>

<br>
<br>

<tr><td align = "right">
Youtube Link: </td><td><input type="text" name="ylink" size = "78"  maxlength="60"/>
</td></tr>


<br>
<br>


<input type="hidden" name="MAX_FILE_SIZE" value="400000" />
<tr><td align = "right">
pic1: </td><td><input name="uploadedfile" type="file" /><br /></td></tr>
<tr><td align = "right">
pic2: </td><td><input name="uploadedfile2" type="file" /><br /></td></tr>
<tr><td align = "right">
pic3: </td><td><input name="uploadedfile3" type="file" /><br /></td></tr>
<tr><td align = "right">
pic4: </td><td><input name="uploadedfile4" type="file" /><br /></td></tr>
<tr><td align = "right">
pic5: </td><td><input name="uploadedfile5" type="file" /><br /></td></tr>


</b></font>

<tr><td align = "right" colspan = "2">
<input type="submit" value="Create Item" />
</td></tr>

</table>


</div>


</form>

<?php include("footer.php"); 
}
?>

</body>
</html>