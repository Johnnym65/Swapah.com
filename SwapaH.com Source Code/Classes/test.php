<html>
<body>

<?php include("header.php"); ?>
Username:<?php $uname = $_POST["uname"]; ?> 
Password:<?php $pword = $_POST["pword"]; 
			print $uname;
			print $pword;?> <br />
			
			
<?php
$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

mysql_query("INSERT INTO User (userName, passWord)
VALUES ('$uname', '$pword')");


mysql_close($con);
?>


</body>
</html>
