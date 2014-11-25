<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: inserts a new swap into the system



		-->*/		
?>
<?php

session_start();


$username = $_SESSION['username'];
$itemid = $_POST['iid'];
$currentitemid = $_POST['ciid'];
$gid= $_POST['gid'];
$today = date('20y-m-j H:i:s');

//echo $username;
//echo $itemid;
//echo $currentitemid;


$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);



   mysql_query("INSERT INTO swapoffer
  VALUES ('','$username', '$currentitemid', '$itemid', '$today')");

header("location:game.php?gid=".$gid);



?>