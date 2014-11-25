<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: Validates the info entered by a user in registration



		-->*/		
?>
<?php



$username = $_POST['username'];
$pword = $_POST['pword'];
$spword = $_POST['spword'];
$email = $_POST['email'];

$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$town = $_POST['town'];
$county = $_POST['county'];
$country = $_POST['country'];


$address = $address1.",+".$address2.",+".$town.",+".$county.",+"."IRELAND";


$name = $_POST[name];
$address = str_replace(" ","+",$address);


$lat = $_POST['lat'];
$lon = $_POST['long'];

$errormessage;
//echo $username."<br>"; 
//echo $pword."<br>"; 
//echo $location."<br>"; 
//echo $email."<br>";






$hashpword = sha1($pword);

//echo $hashpword;



$con = mysql_connect("localhost","johnnym6_root","4945430");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("johnnym6_Users", $con);

$result = mysql_query("SELECT * FROM User WHERE username = '$username'");

if(mysql_num_rows($result) > 0)
{
	$errormessage = "Username already taken, please choose another<br>";
}

if($username == null)
{
	$errormessage = $errormessage."Username EMPTY<br>";
}

if($pword == null || $spword = null)
{
	$errormessage = $errormessage."Password EMPTY<br>";
}

//echo $pword;
echo $spword;

//if($pword != $spword)
//{
//	$errormessage = $errormessage."Passwords do not match<br>";
//}


if($errormessage != null)
{
	Header("location:register.php?error=".$errormessage."");
}

else
{



       //require_once "Mail.php";
/*
        $from = "<johnny.murphy212.gmail.com>";
        $to = "<jonny_murphy65@hotmail.com>";
        $subject = "Hi!";
        $body = "Hi,\n\nHow are you?";

        $host = "ssl://smtp.gmail.com";
        $port = "465";
        $username = "<johnny.murphy212.gmail.com>";
        $password = "eannas''";

        $headers = array ('From' => $from,
          'To' => $to,
          'Subject' => $subject);
        $smtp = Mail::factory('smtp',
          array ('host' => $host,
            'port' => $port,
            'auth' => true,
            'username' => $username,
            'password' => $password));

        $mail = $smtp->send($to, $headers, $body);

        if (PEAR::isError($mail)) {
          echo("<p>" . $mail->getMessage() . "</p>");
         } else {
          echo("<p>Message successfully sent!</p>");
         }






*/





  mysql_query("INSERT INTO User 
  VALUES ('$username', '$hashpword','$email', '$address')");
  
  }
    mysql_close($con);
    
    Header("location:index.php");

?>