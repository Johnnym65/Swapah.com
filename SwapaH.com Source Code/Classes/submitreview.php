<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: submits a review into the system



		-->*/		
?>
<?php
session_start();
$username = $_SESSION['username'];


$rating = $_POST['rating'];
$review = $_POST['review'];
$otheruser = $_SESSION['otheruser'];

//echo $rating;
//echo $review;
//echo $username;
//echo $_SESSION['otheruser'];




$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

  mysql_query("DELETE FROM userreview
		WHERE username='$otheruser' AND reviewer = '$username'");



  mysql_query("INSERT INTO userreview 
  VALUES ('', '$otheruser','$username','$review','$rating')");
  

  
  mysql_close($con);

Header("location:account.php?other=$otheruser");
  ?>