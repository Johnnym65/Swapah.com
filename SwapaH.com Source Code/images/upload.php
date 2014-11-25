<html>
<body>
<form enctype="multipart/form-data" action="uchecker.php" method="POST">

<form action="newitemcheck.php" method="post" >
		Title: <input type="text" name="title" size = "100"/>
		<br>
		<br>
		Description: <textarea cols="50" rows="10" name="description"></textarea>
		<br>
		<br>
		
		Condition:<select name="Condition" size="1">
  <option value="new">Brand New</option>
  <option value="like">Like New</option>
  <option value="avrg">Average</option>
  <option value="poor">Poor</option>
</select>

<br>
<br>






<input type="hidden" name="MAX_FILE_SIZE" value="400000" />
pic1: <input name="uploadedfile" type="file" /><br />
pic2: <input name="uploadedfile2" type="file" /><br />
pic3: <input name="uploadedfile3" type="file" /><br />
pic4: <input name="uploadedfile4" type="file" /><br />
pic5: <input name="uploadedfile5" type="file" /><br />





<input type="submit" value="Upload File" />







</form>
</body>
</html>