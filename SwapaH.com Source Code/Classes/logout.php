<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: logs a user out and ends the current user session



		-->*/		
?>
<?php
session_start();
session_destroy();

Header("location:index.php");
?>