<?php








$uname= "johnnym65"; 
$pword= "howiya";
$hashpword = sha1($pword);



$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);
$result = mysql_query("SELECT * FROM User WHERE userName='$uname' and passWord='$hashpword'");

// Mysql_num_row is counting table row
echo "howiya";
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
//while($row = mysql_fetch_array($result))
//{
//	$address = $row['address'];
	
	
	echo "hello World";

//}

//$geocode=file_get_contents("http://maps.google.com/maps/api/geocode/json?address=".$address."&sensor=false");
																					
//$output= json_decode($geocode);

//$lat = $output->results[0]->geometry->location->lat;
//$long = $output->results[0]->geometry->location->lng;

//session_start();
// store session data
//$_SESSION['username']=$uname;
//$_SESSION['lat']=$lat;
//$_SESSION['long']=$long;

//echo $_SESSION['lat']." ";
//echo$_SESSION['long'];




//session_register("uname");
//session_register("$pword"); 

//header("location:index.php");/
//}

//else {
//header("location:index.php");
}
?>