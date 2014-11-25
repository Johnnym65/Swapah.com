<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: deals with an answer to a question given by a user



		-->*/		
?>
<?php

session_start();

//$username = $_SESSION['username'];
$questionid = $_POST['qid'];
$answer = $_POST['answer'];


//echo $username."".$auctionid."".$question;


$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);


  
mysql_query("UPDATE AuctionQuestion
				SET answer='$answer'
				WHERE question_id='$questionid'");
				
  header("location:auction.php");
?>