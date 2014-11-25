<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: Allows users to create a new auction with one of their items



		-->*/		
?>
<?php 
session_start();
$username = $_SESSION['username'];
$error = $_GET['error'];
if($_SESSION['username'] == NULL)
{
	echo "<script type=\"text/javascript\">document.location.href=\"register.php\";</script>";

}
else
{
include("header.php"); 

echo "<a  href=\"index.php\"><img  class = \"shadow\" src=\"longnewAuction1.png\" style=\"position:absolute; left:185px;top:220px;\"  /></a>";
echo "<div style=\"position:absolute;top:235;left:400;\">";
echo "<font size = \"6\" face=\"arial\" color=\"white\"><b>Create New Auction</b></font>";
echo "</div>";

//echo "<div style=\"position:absolute;top:400;left:300; width:500\">";
//echo $_POST['iid']; 
$itemID = $_POST['iid'];


?>

<div style="position:absolute;top:225;left:400; width:400;">
<table border = "0">
<form action="newAuctioncheck.php" method="post" >
		
		<tr><td colspan = "2">
		<?php echo $error; ?>
		<tr><td Valign="middle" width = "130">
		<font size="3" face="arial" color="#585858"><b>
		Choose item:    
		</b></font>
		</td>
		
		<td Align = "center">
		<a id="example1" href="fancyinventory.php"> <div style="width:208px; height:158px; border-style:solid;  border:4px solid grey"><div style="width:200px; height:150px; border-style:solid;  border:4px solid yellow">
		
		
		
		<?php
		if($_POST['iid'] != NULL)
		{
			
			echo "<img src=\"image/upload/".$_POST['iid']. "1.jpg\" alt=\"Smiley face\" height=\"150\" width=\"200\" /></div></div></a>";
			
			
			$con = mysql_connect("localhost","johnnym6_root","4945430");
			if (!$con)
 			 {
			  die('Could not connect: ' . mysql_error());
  			}

			mysql_select_db("johnnym6_Users", $con);

			$result = mysql_query("SELECT * FROM Item WHERE item_id = '$itemID'");
			
			while($row = mysql_fetch_array($result))
  			{
  				echo "<font size=\"3\" face=\"arial\" color=\"green\"><b>";
  				echo $row['Title'];
  				echo"</b></font>";

  			}
			
			
			
		}
		echo "</div></div></a>";
		if($_POST['iid'] == NULL)
		{
			echo "<font size=\"3\" face=\"arial\" color=\"red\"><b>";
			echo "NO ITEM SELECTED";
			echo"</b></font>";
		}
		
		echo "</td></tr>";
		?>
		
		
		<br>
		<br>
		
		<?php 
		
		echo "<input type=\"hidden\" name= \"itemid\" value= \"".$itemID."\"/>"
		
		?>
		
		<tr><td height = "100" colspan = "2">
		<font size="3" face="arial" color="#585858"><b>
		Auction Length:<select name="Length" size="1">
  		<option value="3">3 days</option>
  		<option value="5">5 days</option>
  		<option value="7">1 week</option>
  		<option value="14">2 weeks</option>
		</select>
		</b></font>
		</td></tr>
		<br>
		<br>
		
		<tr><td height = "100" width = "300">
		<font size="3" face="arial" color="#585858"><b>
		Allow Questions? 
		<div style = "position:relative;top:-18;left:150">
		<input type="checkbox" name="allowq" /> 
		</div>
		</b></font>
		</td></tr>
		<br>
		<br>

		
<tr><td Align= "center" colspan = "2">
<input type="submit" name="submit" value="Create Auction" />
</td></tr></table>

</form>












</div>





</body>
</html>

<?php include("categories.php");  ?>
<?php include("footer.php"); 

}
?>
