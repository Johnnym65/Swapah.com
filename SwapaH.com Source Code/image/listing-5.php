<?php
    // the upload function
    function upload(){
 
    if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {
 
        // check the file is less than the maximum file size
        if($_FILES['userfile']['size'] < $maxsize)
            {
        // prepare the image for insertion
        $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
        // $imgData = addslashes($_FILES['userfile']);
 
        // get the image info..
          $size = getimagesize($_FILES['userfile']['tmp_name']);
 
        // put the image in the db...
          // database connection
          mysql_connect("localhost", "root", "root") OR DIE (mysql_error());
 
          // select the db
          mysql_select_db ("Users") OR DIE ("Unable to select db".mysql_error());
 
        // our sql query
        $sql = "INSERT INTO testblob
                ( image_id , image_type ,image, image_size, image_name)
                VALUES
                ('', '{$size['mime']}', '{$imgData}', '{$size[3]}', '{$_FILES['userfile']['name']}')";
 
        // insert the image
        if(!mysql_query($sql)) {
            echo 'Unable to upload file';
            }
        }
    }
    else {
         // if the file is not less than the maximum allowed, print an error
         echo
          '<div>File exceeds the Maximum File limit</div>
          <div>Maximum File limit is '.$maxsize.'</div>
          <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].' bytes</div>
          <hr />';
         }
    }
?>