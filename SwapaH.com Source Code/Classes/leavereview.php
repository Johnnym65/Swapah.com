<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: this page allows user to choose a start rating or another user



		-->*/		
?>
<?php

session_start();
// store session data
$otheruser = $_GET['user'];
$_SESSION['otheruser'] = $otheruser;

echo "Leave Review for ".$otheruser;














?>

<script type="text/javascript" language="javascript" src="ratingsys.js"></script>

<div width = "500">
<span id="rateStatus"></span>
<span id="ratingSaved">Rating Saved!</span>


<div id="rateMe" title="Leave a Rating">
    <a onclick="rateIt(this)" id="_1" title="1" onmouseover="rating(this)" onmouseout="off(this)"></a>
    <a onclick="rateIt(this)" id="_2" title="2" onmouseover="rating(this)" onmouseout="off(this)"></a>
    <a onclick="rateIt(this)" id="_3" title="3" onmouseover="rating(this)" onmouseout="off(this)"></a>
    <a onclick="rateIt(this)" id="_4" title="4" onmouseover="rating(this)" onmouseout="off(this)"></a>
    <a onclick="rateIt(this)" id="_5" title="5" onmouseover="rating(this)" onmouseout="off(this)"></a>
</div>

</div>


<style type="text/css">
    #rateStatus{float:left; clear:both; width:100%; height:20px;}
    #rateMe{float:left; clear:both; width:100%; height:auto; padding:0px; margin:0px;}
    #rateMe li{float:left;list-style:none;}
    #rateMe li a:hover,
    #rateMe .on{background:url(star.png) no-repeat;}
    #rateMe a{float:left;background:url(emptystar.png) no-repeat;width:112px; height:112px;}
    #ratingSaved{display:none;}
    .saved{color:red; }
</style>

<?php include("footer.php"); 
?>