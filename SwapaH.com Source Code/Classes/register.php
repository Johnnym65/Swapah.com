<?php

/*
<!-- 
     Author: Jonathan Murphy
Description: allows a new user to register for the system



		-->*/		
?>
<script type="text/javascript">
	
	var latatude;
	var longatude;
	
	
navigator.geolocation.getCurrentPosition(googleMapIt);



function googleMapIt(p)
{ 

  
  
	var lat1 = p.coords.latitude;
  
  	var lon1 = p.coords.longitude;
  	
  	latatude = lat1;
  	longatude = lon1;
  
  	document.getElementById('lat').value=latatude;
	document.getElementById('long').value=longatude;

}
	
</script>





<?php 

include("header.php"); 

$error = $_GET['error'];


	echo "<div style=\"position:absolute;top:300;left:300;   \">";
	echo $error;
	echo "</div>";






?>

<div style="position:relative;top:250;left:400;   ">
<font size = "8" face="arial" color="#0080FF"><b>Register</b></font>
</div>
<div style="position:absolute;top:300;left:400; vertical-align:top; border-width:thin; border-style:solid; border-color:#BDBDBD; ">
<form action="registerchecker.php" method="post" >
<table border = "0"  cellpadding="13">

		
		<tr><td align = "right">
		<font size="3" face="arial" color="#585858"><b>
		*Username  
		</b></font>
		</td>
		
		<td>
		<input type= "text" size= "30" name= "username"/>
		</td></tr>
		
		
		
		<br>
		<br>
		
		
		
		<tr><td align = "right">
		<font size="3" face="arial" color="#585858"><b>
		*Password
		</b></font>
		</td><td>
		<input type= "password" size= "30" name= "pword"/>
		</td</tr>
		
		<tr><td align = "right">
		<font size="3" face="arial" color="#585858"><b>
		*Re-enter Password
		</b></font>
		</td><td>
		<input type= "password" size= "30" name= "spword"/>
		</td</tr>
		
		
		
		<br>
		<br>
		
		
		<tr><td align = "right">
		<font size="3" face="arial" color="#585858"><b>
		*Address line1
		</td><td>
		<input type="text" size = "40" name="address1" /> 
		</b></font>
		</td></tr>
		<tr><td align = "right">
		<font size="3" face="arial" color="#585858"><b>
		Address line2
		</td><td>
		<input type="text" size = "40" name="address2" /> 
		</b></font>
		</td></tr>
		<tr><td align = "right">
		<font size="3" face="arial" color="#585858"><b>
		*Town/City
		</td><td>
		<input type="text" size = "40" name="town" /> 
		</b></font>
		</td></tr>
		<tr><td align = "right">
		<font size="3" face="arial" color="#585858"><b>
		*County
		</td><td>
		<select name="county">
<option value="Armagh">Armagh</option>
<option value="Antrim">Antrim</option>
<option value="Carlow">Carlow</option>
<option value="Cavan">Cavan</option>
<option value="Clare">Clare</option>
<option value="Cork">Cork</option>
<option value="Derry">Derry</option>
<option value="Donegal">Donegal</option>
<option value="Donegal">Down</option>
<option value="Dublin">Dublin</option>
<option value="Fermanagh">Fermanagh</option>
<option value="Galway">Galway</option>
<option value="Kerry">Kerry</option>
<option value="Kildare">Kildare</option>
<option value="Kilkenny">Kilkenny</option>
<option value="Laois">Laois</option>
<option value="Leitrim">Leitrim</option>
<option value="Limerick">Limerick</option>
<option value="Longford">Longford</option>
<option value="Louth">Louth</option>
<option value="Mayo">Mayo</option>
<option value="Meath">Meath</option>
<option value="Monaghan">Monaghan</option>
<option value="Offaly">Offaly</option>
<option value="Roscommon">Roscommon</option>
<option value="Sligo">Sligo</option>
<option value="Tipperary">Tipperary</option>
<option value="Tyrone">Tyrons</option>
<option value="Waterford">Waterford</option>
<option value="Westmeath">Westmeath</option>
<option value="Wexford">Wexford</option>
<option value="Wicklow">Wicklow</option>
</select>
		</b></font>
		</td></tr>
		<tr><td align = "right">
		<font size="3" face="arial" color="#585858"><b>
		*Country
		</td><td>
		IRELAND
		</b></font>
		</td></tr>
		
		
		
		
		
		<tr><td align = "right">
		<font size="3" face="arial" color="#585858"><b>
		*Email Address
		</td><td>
		<input type="text" size = "40" name="email" /> 
		</b></font>
		</td></tr>
		<br>
		<br>

		
<tr><td Align= "center" colspan = "2">


<input type="submit" name="submit" value="Register" />
</td></tr></table>

</form>








</div>







<?php include("footer.php"); 
?>

</body>
</html>