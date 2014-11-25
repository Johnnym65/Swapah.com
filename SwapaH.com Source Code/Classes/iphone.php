<?php
session_start();

$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);


$u = $_GET[‘username’];
$pw = $_GET[‘assword’];



$check = "SELECT username, password FROM iphoneusers WHERE username='$u' AND password= '$pw'";



$login = mysql_query($check) or die(mysql_error());


if (mysql_num_rows($login) == 1) {
$row = mysql_fetch_assoc($login);
echo 'Yes';exit;


} else {


echo 'No';exit;

}

mysql_close($connect);


?>