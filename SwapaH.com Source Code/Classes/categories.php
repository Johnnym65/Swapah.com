<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: creates the categories button



		-->*/		
?>
<style>
/*http://net.tutsplus.com/tutorials/html-css-techniques/how-to-build-a-kick-butt-css3-mega-drop-down-menu/ */

body, ul, li {  
    font-size:14px;  
    font-family:Arial, Helvetica, sans-serif;  
    line-height:21px;  
    text-align:left;  
}  
  
/* Navigation Bar */  
  
#menu {  
    list-style:none;  
    width:180px;  
    margin:30px auto 0px auto;  
    height:35px;  
    padding:0px 0px 0px 00px; 
    text-align:center;
    vertical-align:text-top;

  
    /* Rounded Corners */  
  
    -moz-border-radius: 10px;  
    -webkit-border-radius: 10px;  
    border-radius: 10px;  
  
    /* Background color and gradients */  
  
    background: #014464;  
    background: -moz-linear-gradient(top, #BDBDBD, #1C1C1C);  
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#BDBDBD), to(#1C1C1C));  
  
    /* Borders */  
  
    border: 1px solid #002232;  
  
    -moz-box-shadow:inset 0px 0px 1px #edf9ff;  
    -webkit-box-shadow:inset 0px 0px 1px #edf9ff;  
    box-shadow:inset 0px 0px 1px #edf9ff;  
}  
  
#menu li {  
    float:left;  
    text-align:center;  
    vertical-align:text-top;
    position:relative;  
    padding: 0px 0px 0px 20px;  
    margin-right:30px;  
    margin-top:7px;  
    border:none;  
}  
  
#menu li:hover {  
    border: 1px solid #777777;  
    padding: 4px 9px 4px 9px; 
    
  
    /* Background color and gradients */  
  
    background: #F4F4F4;  
    background: -moz-linear-gradient(top, #F4F4F4, #EEEEEE);  
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#F4F4F4), to(#EEEEEE));  
  
    /* Rounded corners */  
  
    -moz-border-radius: 5px 5px 0px 0px;  
    -webkit-border-radius: 5px 5px 0px 0px;  
    border-radius: 5px 5px 0px 0px;  
}  
  
#menu li a {  
    font-family:Arial, Helvetica, sans-serif;  
    font-size:20px;  
    color: White;  
    display:block;  
    outline:0;  
    text-decoration:none;  
    text-shadow: 1px 1px 1px #000;  
}  
  
#menu li:hover a {  
    color:#161616;  
    text-shadow: 1px 1px 1px #FFFFFF; 
    padding: 0px 0px 0px 10px; 
}  
#menu li .drop {  
    padding-right:21px;  
    background:url("img/drop.png") no-repeat rightright 8px;  
}  
#menu li:hover .drop {  
    background:url("img/drop.png") no-repeat rightright 7px;  
}  
  
/* Drop Down */  
  
.dropdown_1column,  
.dropdown_2columns,  
.dropdown_3columns,  
.dropdown_4columns,  
.dropdown_5columns {  
    margin:4px auto;  
    float:left;  
    position:absolute;  
    left:-999em; /* Hides the drop down */  
    text-align:left;  
    padding:10px 5px 10px 5px;  
    border:1px solid #777777;  
    border-top:none;  
    position:absolute;
    right:-1;
  
    /* Gradient background */  
    background:#F4F4F4;  
    background: -moz-linear-gradient(top, #EEEEEE, #BBBBBB);  
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#EEEEEE), to(#BBBBBB));  
  
    /* Rounded Corners */  
    -moz-border-radius: 0px 5px 5px 5px;  
    -webkit-border-radius: 0px 5px 5px 5px;  
    border-radius: 0px 5px 5px 5px;  
}  
  
.dropdown_1column {width: 140px;}  
.dropdown_2columns {width: 280px;}  
.dropdown_3columns {width: 420px;}  
.dropdown_4columns {width: 560px;}  
.dropdown_5columns {width: 700px;}  
  
#menu li:hover .dropdown_1column,  
#menu li:hover .dropdown_2columns,  
#menu li:hover .dropdown_3columns,  
#menu li:hover .dropdown_4columns,  
#menu li:hover .dropdown_5columns {  
    left:-1px;  
    top:auto;  
}  
  
/* Columns */  
  
.col_1,  
.col_2,  
.col_3,  
.col_4,  
.col_5 {  
    display:inline;  
    float: left;  
    position: relative;  
    margin-left: 5px;  
    margin-right: 5px;  
}  
.col_1 {width:130px;}  
.col_2 {width:270px;}  
.col_3 {width:410px;}  
.col_4 {width:550px;}  
.col_5 {width:690px;}  
  
/* Right alignment */  
  
#menu .menu_right {  
    float:rightright;  
    margin-right:0px;  
}  
#menu li .align_right {  
    /* Rounded Corners */  
    -moz-border-radius: 5px 0px 5px 5px;  
    -webkit-border-radius: 5px 0px 5px 5px;  
    border-radius: 5px 0px 5px 5px;  
}  
#menu li:hover .align_right {  
    left:auto;  
    rightright:-1px;  
    top:auto;  
}  
  
/* Drop Down Content Stylings */  
  
#menu p, #menu h2, #menu h3, #menu ul li {  
    font-family:Arial, Helvetica, sans-serif;  
    line-height:21px;  
    font-size:12px;  
    text-align:left;  
    text-shadow: 1px 1px 1px #FFFFFF;  
}  
#menu h2 {  
    font-size:21px;  
    font-weight:400;  
    letter-spacing:-1px;  
    margin:7px 0 14px 0;  
    padding-bottom:14px;  
    border-bottom:1px solid #666666;  
}  
#menu h3 {  
    font-size:14px;  
    margin:7px 0 14px 0;  
    padding-bottom:7px;  
    border-bottom:1px solid #888888;  
}  
#menu p {  
    line-height:18px;  
    margin:0 0 10px 0;  
}  
  
#menu li:hover div a {  
    font-size:12px;  
    color:#015b86;  
}  
#menu li:hover div a:hover {  
    color:#029feb;  
}  
.strong {  
    font-weight:bold;  
}  
.italic {  
    font-style:italic;  
}  
.imgshadow {  
    background:#FFFFFF;  
    padding:4px;  
    border:1px solid #777777;  
    margin-top:5px;  
    -moz-box-shadow:0px 0px 5px #666666;  
    -webkit-box-shadow:0px 0px 5px #666666;  
    box-shadow:0px 0px 5px #666666;  
}  
.img_left { /* Image sticks to the left */  
    width:auto;  
    float:left;  
    margin:5px 15px 5px 5px;  
}  
#menu li .black_box {  
    background-color:#333333;  
    color: #eeeeee;  
    text-shadow: 1px 1px 1px #000;  
    padding:4px 6px 4px 6px;  
  
    /* Rounded Corners */  
    -moz-border-radius: 5px;  
    -webkit-border-radius: 5px;  
    border-radius: 5px;  
  
    /* Shadow */  
    -webkit-box-shadow:inset 0 0 3px #000000;  
    -moz-box-shadow:inset 0 0 3px #000000;  
    box-shadow:inset 0 0 3px #000000;  
}  
#menu li ul {  
    list-style:none;  
    padding:0;  
    margin:0 0 12px 0;  
}  
#menu li ul li {  
    font-size:12px;  
    line-height:24px;  
    position:relative;  
    text-shadow: 1px 1px 1px #ffffff;  
    padding:0;  
    margin:0;  
    float:none;  
    text-align:left;  
    width:130px;  
}  
#menu li ul li:hover {  
    background:none;  
    border:none;  
    padding:0;  
    margin:0;  
}  
#menu li .greybox li {  
    background:#F4F4F4;  
    border:1px solid #bbbbbb;  
    margin:0px 0px 4px 0px;  
    padding:4px 6px 4px 6px;  
    width:116px;  
  
    /* Rounded Corners */  
    -moz-border-radius: 5px;  
    -webkit-border-radius: 5px;  
    border-radius: 5px;  
}  
#menu li .greybox li:hover {  
    background:#ffffff;  
    border:1px solid #aaaaaa;  
    padding:4px 6px 4px 6px;  
    margin:0px 0px 4px 0px;  
}

</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
  
<link rel="stylesheet" href="menu.css" type="text/css" media="screen" />  
  
<title>Mega Drop Down Menu</title>  
<!--[if IE 6]>  
<style>  
body {behavior: url("csshover3.htc");}  
#menu li .drop {background:url("img/drop.gif") no-repeat right 8px;  
</style>  
<![endif]-->  
  
</head>  
  
<body>  

<div style="position:absolute; z-index: 1000; left:900; top:105" >
<ul id="menu">  
  	<b>
    <li class="menu_right"><a href="#" class="drop">Categories  &nbsp&nbsp<img src = "down.png"/></a>
    <!-- Begin 3 columns Item -->  
  
        <div class="dropdown_3columns align_right"><!-- Begin 3 columns container -->  
  			
            <div class="col_3">  
            	<font color = "#585858">
                <h2>Auction Item Categories</h2>  
                </font>
            </div>  
  
            <div class="col_1">  
  
                <ul class="greybox">  
                    <li><a href="catsearch.php?cat=Antiques">Antiques</a></li>  
                    <li><a href="catsearch.php?cat=Books, Comics and Magazines">Books, Comics and Magazines</a></li>  
                    <li><a href="catsearch.php?cat=Clothes">Clothes</a></li>  
                    <li><a href="catsearch.php?cat=Collectables">Collectables</a></li>  
                    <li><a href="catsearch.php?cat=Computer/Laptop">Computer/Laptop</a></li> 
                    <li><a href="catsearch.php?cat=instruments">instruments</a></li> 
                </ul>     
  
            </div>  
  
            <div class="col_1">  
  
                <ul class="greybox">  
                    <li><a href="catsearch.php?cat=DVD's/Movies">DVD's/Movies</a></li>  
                    <li><a href="catsearch.php?cat=Electronics">Electronics</a></li>  
                    <li><a href="catsearch.php?cat=Event Tickets">Event Tickets</a></li>  
                    <li><a href="catsearch.php?cat=Home and Garden">Home and Garden</a></li>  
                    <li><a href="catsearch.php?cat=jewellery">jewellery</a></li> 
                    <li><a href="catsearch.php?cat=Mobile/Home Phones">Mobile/Home Phones</a></li> 
                </ul>     
  
            </div>  
  
            <div class="col_1">  
  
                <ul class="greybox">  
                	<li><a href="catsearch.php?cat=Cars, Motorbikes and Vehicles">Cars, Motorbikes and Vehicles</a></li>  
                    <li><a href="catsearch.php?cat=Music">Music</a></li>  
                     
                    <li><a href="catsearch.php?cat=Cash">Cash</a></li>  
                    <li><a href="catsearch.php?cat=Sporting Goods">Sporting Goods</a></li>  
                    <li><a href="catsearch.php?cat=Toys">Toys</a></li> 
                    <li><a href="catsearch.php?cat=Other">Other..</a></li> 
                </ul>     
  
            </div>  
  			
        </div><!-- End 3 columns container -->  
  
    </li><!-- End 3 columns Item -->  
  </b>
</ul> 

</div>
</body>  
  
</html>