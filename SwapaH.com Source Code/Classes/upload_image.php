<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: used by the android app to upload images to server



		-->*/		
?>
<?php
/*
$target_path  = "./item111.jpg";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
 echo "The file ".  basename( $_FILES['uploadedfile']['name']).
 " has been uploaded";
} else{
 echo "There was an error uploading the file, please try again!";
}*/


$iid = $_GET['iid'];
$image = $_GET['image'];

move_uploaded_file($_FILES['uploadedfile']['tmp_name'], "image/upload/".$iid.$image.".jpg");

?>
