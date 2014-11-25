<?php
session_start();
 

$username = $_SESSION['username'];
$target_path = "upload/";

$titles = $_POST['title'];
$description = $_POST['description'];
$condition = $_POST['Condition'];

echo $titles;
echo $description;
echo $condition;



$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("Users", $con);

$result = mysql_query("select * from Item order by Item_id desc limit 1;");

while($row = mysql_fetch_array($result))
  {
  	$item = $row['Item_id'];
  	echo "<br><br>".$item;
  	
  	$item = ($item+1);
  	echo "<br><br>".$item;
  }






$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], "upload/".$item."1.jpg")) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}
  
  
  
  $target_path = $target_path . basename( $_FILES['uploadedfile2']['name']); 

if(move_uploaded_file($_FILES['uploadedfile2']['tmp_name'], "upload/".$item."2.jpg")) {
    echo "The file ".  basename( $_FILES['uploadedfile2']['name']). 
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}





$target_path = $target_path . basename( $_FILES['uploadedfile3']['name']); 

if(move_uploaded_file($_FILES['uploadedfile3']['tmp_name'], "upload/".$item."3.jpg")) {
    echo "The file ".  basename( $_FILES['uploadedfile3']['name']). 
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}




$target_path = $target_path . basename( $_FILES['uploadedfile4']['name']); 

if(move_uploaded_file($_FILES['uploadedfile4']['tmp_name'], "upload/".$item."4.jpg")) {
    echo "The file ".  basename( $_FILES['uploadedfile4']['name']). 
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}




$target_path = $target_path . basename( $_FILES['uploadedfile5']['name']); 

if(move_uploaded_file($_FILES['uploadedfile5']['tmp_name'], "upload/".$item."5.jpg")) {
    echo "The file ".  basename( $_FILES['uploadedfile5']['name']). 
    " has been uploaded";
} else{
    echo "There was an error uploading the file, please try again!";
}




 mysql_query("INSERT INTO Item 
VALUES ('$item', '$titles','$username','$description','$condition','FREE TO USE')");








  ?>