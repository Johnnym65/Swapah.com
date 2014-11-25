<?php

/*

<!-- 
     Author: Jonathan Murphy
Description: validates a user during log in



		-->
		
*/
?>
<?php








$host="localhost"; // Host name 
$username="johnnym6_root"; // Mysql username 
$password="4945430"; // Mysql password 
$db_name="johnnym6_Users"; // Database name 
$tbl_name="User"; // Table name


// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$uname=$_POST['uname']; 
$pword=$_POST['pword'];
$hashpword = sha1($pword);

// To protect MySQL injection (more detail about MySQL injection)
$uname = stripslashes($uname);
$pword = stripslashes($pword);
$uname = mysql_real_escape_string($uname);
$pword = mysql_real_escape_string($pword);

$sql="SELECT * FROM $tbl_name WHERE userName='$uname' and passWord='$hashpword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
while($row = mysql_fetch_array($result))
{
	$address = $row['address'];
	

}

$geocode=file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".$address."&sensor=false");
																					
$output= json_decode($geocode);

$lata = $output->results[0]->geometry->location->lat;
$longa = $output->results[0]->geometry->location->lng;

session_start();
// store session data
$_SESSION['username']=$uname;
$_SESSION['lat']=$lata;
$_SESSION['long']=$longa;

//echo $_SESSION['lat']." ";
//echo$_SESSION['long'];




//session_register("uname");
//session_register("$pword"); 

header("location:index.php");
}

else {
$error = "Wrong Username/Password";
header("location:index.php?error=".$error);
}
?>