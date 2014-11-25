<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: used to verify a user when logging in on android device



		-->
		*/		
?>

<?php

	  $isuser = 0;
      $con = mysql_connect("localhost","johnnym6_root","4945430");
	if (!$con)
  	{
  			die('Could not connect: ' . mysql_error());
 	 }

mysql_select_db("johnnym6_Users", $con);
      

      $q=mysql_query("SELECT * FROM User WHERE username ='".$_REQUEST['year']."' AND passWord = '".$_REQUEST['pword']."'");
      
      $isuser = mysql_num_rows($q);
      
      if($isuser > 0)
      {
      		$q1=mysql_query("SELECT * FROM Item WHERE Username ='".$_REQUEST['year']."'");
      	
      		while($e=mysql_fetch_assoc($q1))

	  
              $output[]=$e;

           print(json_encode($output));
       }     
      
      

      
     
    mysql_close();
?>
