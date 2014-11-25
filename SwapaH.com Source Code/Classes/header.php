<?php

/*
<!-- 
     Author: Jonathan Murphy
Description:	Header.php conatins all the elements of the page header. such as the the top bar,
				the search bar, the side buttons, the categories button, the notifaction button. it
				handles the log in form, and if logged in it handles the different buttons
		-->*/		
?>



<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="imagetoolbar" content="no" />
	<title>SwapaH</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 	<link rel="stylesheet" href="style.css" />
 	
 	<script type="text/javascript">
		$(document).ready(function() {
			/*
			*   Examples - images
			*/

			$("a#example1").fancybox();
			//$("form#example1").fancybox();
			//$("input#example2").fancybox();
			
		});
	</script>
	<script type="text/javascript"> 
			$(document).ready(function() { 
			$("a.youtube").click(function() { 
			$.fancybox({ 
			'padding'       : 0, //optional 
			'autoScale'     : false, 
			'transitionIn': 'none', 
			'transitionOut': 'none', 
			'title': this.title, 
			'width': 680, //or whatever 
			'height': 495, //or whatever 
			'href': this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'), 
			'type': 'swf', 
			'swf': { 
			'wmode': 'opaque', 
			'allowfullscreen'       : 'true' 
			} 
			}); 
			return false; 
			}); 
			}); //ready 

	</script>
	
	<style>

	.else:hover {
	background-color:#EFF8FB;
	box-shadow: 7px 7px 8px #818181;
	-webkit-box-shadow: 7px 7px 8px #818181;
	-moz-box-shadow: 7px 7px 8px #818181;
	filter: progid:DXImageTransform.Microsoft.dropShadow(color=#818181, offX=7, offY=7, positive=true);
	
	}
	
	
	
	.shadow{
	box-shadow: 7px 7px 8px #818181;
	-webkit-box-shadow: 7px 7px 8px #818181;
	-moz-box-shadow: 7px 7px 8px #818181;
	filter: progid:DXImageTransform.Microsoft.dropShadow(color=#818181, offX=7, offY=7, positive=true);
	}


</style>
	
	
	<link rel="icon" type="image/ico" href="logo1.png"></link> 
</head>
<body>

<center>





<div>
<img src="header2.png" alt="header" style="position:absolute; left:175;top:10px;"/>
<a href = "index.php"><div  style = "position:absolute;top:10;left:810; width:270px; height:100px; "></div></a>



<?php 
session_start();

$error = $_GET['error'];

if($_SESSION['username'] == NULL)
{
	//echo "noone";



?>
<div style="position:absolute;top:30;left:210;">
<form action="check_user.php" method="post">
<input type="text" name="uname" /></br>
</div>
<div style="position:absolute;top:30;left:370;">
<input type="password" name="pword" /></br>

</div>

<div style="position:absolute;top:30;left:535;">

<input type="submit" value="Log In" />
</div>

<div style="position:absolute;top:30;left:545;">
<font face="verdana" color="white" size = "2px">
<?php echo $error; ?>
</font>
</div>

<div style="position:absolute;top:70;left:212;">
<font face="verdana" color="white" size = "2px">NOT A MEMBER?	<a style="color: white; font-face:arial" href = "register.php">REGISTER</a></font>
</div>



</form>

<?php 

}
?>
</div>

<?php 
if($_SESSION['username'] != NULL)
{
	echo"<div style=\"position:absolute;top:30;left:210;\"><font size=\"4\" face=\"arial\" color=\"White\"><b>".$_SESSION['username']."</b></font>";
	echo "</div>";
	echo"<div style=\"position:absolute;top:60;left:210;\"><a style=\"color: white; font-face:arial\" href = \"account.php\">Account</a></div>";
	echo"<div style=\"position:absolute;top:60;left:280;\"><a style=\"color: white; font-face:arial\" href = \"logout.php\">logout</a></div>";
	
echo "<a href = \"yourauctions.php\"><img src=\"button.png\" style=\"position:absolute; left:350px;top:25px;\"  /></a>";

echo "<a href = \"yourgames.php\"><img src=\"button2.png\" style=\"position:absolute; left:500px;top:25px;\"  /></a>";
echo "<a href = \"tabstest.php\"><img src=\"button3.png\" style=\"position:absolute; left:350px;top:65px;\"  /></a>";
echo "<a href = \"inventory.php\"><img src=\"button4.png\" style=\"position:absolute; left:500;top:65px;\"  /></a>";


echo "<a href = \"connection.apk\"><img src=\"android.png\" style=\"position:absolute; left:670px;top:35px;\"  /></a>";
}

?>




</center>

<?php  
session_start();
$username = $_SESSION['username'];
$newmessages = 0;
$no = "NO";
$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);


  
  $result = mysql_query("SELECT * FROM Bidmessages WHERE username = '$username' AND beenRead = 'No' ");
  
  while($row = mysql_fetch_array($result))
  {
  	$newmessages = ($newmessages + 1);
  	//echo $newmessages;

 }
 
   $result = mysql_query("SELECT * FROM BidOfferResultMessage WHERE username = '$username' AND beenRead = 'No' ");
  
  while($row = mysql_fetch_array($result))
  {
  	$newmessages = ($newmessages + 1);
  	//echo $newmessages;

 }






mysql_close($con);





if($newmessages >0)
{
echo "<div style=\"position:absolute;top:128;left:183;\">";
echo "<a id = \"example1\" href = \"fancymessages.php\"><img src=\"messagerecieved.png\" alt=\"header\"/></a>";
echo "</div>";
echo "<div style=\"position:absolute;top:125;left:265;\">";
echo "<font size = \"4\" face=\"arial\" color=\"red\"><b>".$newmessages."</b></font>";
echo "</div>";
}
else{
echo "<div style=\"position:absolute;top:135;left:183;\">";
echo "<a id = \"example1\" href = \"fancymessages.php\"><img src=\"message.png\" alt=\"header\"/></a></a>";

echo "</div>";

  include("categories.php"); 
  include("footer.php"); 

}


?>

<div style="position:absolute;top:133;left:330;">
<img src="search.png" alt="header"/>
</div>

<div style="position:absolute;top:138;left:765;" >
<img src="mag.png" alt="header" width="27" height="27" />
</div>

<div style="position:absolute;top:139;left:341;" >
<form action="searchresults.php" method="post">
<input type="text" name="search" size="41" maxlength="35" style="font-family: Verdna; font-size: 17px; border: none;" />
</form>
</div>
<hr style="width:908" >

<div style="position:absolute;top:200;left:183;">

</div>

<div style="position:absolute;top:220;left:185;">
<a href="newauction.php">
<img  class = "shadow" src="newAuction1.png" alt="header"/>
</a>
</div>
<div style="position:absolute;top:300;left:185;">
<a href="joinGame.php">
<img class = "shadow" src="newgame.png" alt="header"/>
</a>
</div>
<div style="position:absolute;top:380;left:185;">
<a href="newitem.php">
<img class = "shadow" src="newitem.png" alt="header"/>
</a>
</div>


<img src="page_bg.jpg" style="position:absolute; left:0px;top:0px;" width = "163" />
<img src="page_bg.jpg" style="position:absolute; left:1102px;top:0px;" width = "163"  />
<img src="shadow.png" style="position:absolute; left:163px;top:0px;"  />
<img src="shadow1.png" style="position:absolute; left:1090px;top:0px;"  />














