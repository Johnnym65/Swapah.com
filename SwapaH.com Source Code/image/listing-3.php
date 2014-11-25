<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html>
    <head><title>File Upload To Database</title></head>
    <body>
        <h3>Please Choose a File and click Submit</h3>
 
        <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000000000000000000" />
            <input name="userfile[]" type="file" />
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>


<?php
    // check if a file was submitted
    if(!isset($_FILES['userfile'])) {
        echo '<p>Please select a file</p>';
    }
    else
        {
        try {
            upload();
            // give praise and thanks to the php gods
            echo '<p>Thank you for submitting</p>';
        }
        catch(Exception $e) {
            echo $e->getMessage();
            echo 'Sorry, could not upload file';
        }
    }
?>

<?php
    // the upload function
    function upload(){
 
    //if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {
 
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
    //}
    //else {
         // if the file is not less than the maximum allowed, print an error
   //      echo
   //       '<div>File exceeds the Maximum File limit</div>
  //        <div>Maximum File limit is '.$maxsize.'</div>
   //       <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].' bytes</div>
  //        <hr />';
  //       }
    }
?>