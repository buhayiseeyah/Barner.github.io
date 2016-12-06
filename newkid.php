<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		
	</div>
</body>
</html>
<?php
	echo "<p class='edit_title'>New Child:</p>";
	echo "<form action='?' method='post'>";
	
	echo "<label for='kidfirstname' class='edit'>First Name: </label>
	<input type='text' id='kidfirstname' name='kidfirstname' size='25' maxlength='25'><br><br>";
	
	echo "<label for='kidmidname' class='edit'>Middle Name: </label>
	<input type='text' id='kidmidname' name='kidmidname' size='15' maxlength='15'><br><br>";
	
	echo "<label for='kidlastname' class='edit'>Surname: </label>
	<input type='text' id='kidlastname' name='kidlastname' size='15' maxlength='15'><br><br>";
	
	echo "<label for='kidage' class='edit'>Age: </label>
	<input type='text' id='kidage' name='kidage' size='3' maxlength='3'><br><br>";
	
	echo "<label for='kidgender' class='edit'>Gender: </label>
	<input type='radio' id='kidgender' name='kidgender' value='Male' checked='checked'>Male&nbsp&nbsp<input type='radio' id='kidgender' name='kidgender' value='Female'>Female<br><br>";
	
	echo "<label for='kidgradelevel' class='edit'>Grade level: </label><br><br>
	<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Pre-school' checked='checked' class='edit'>Pre-school&nbsp&nbsp<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Grade 1'>Grade 1&nbsp&nbsp<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Grade 2'>Grade 2&nbsp&nbsp<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Grade 3'>Grade 3&nbsp&nbsp<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Grade 4'>Grade 4&nbsp&nbsp<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Grade 5'>Grade 5&nbsp&nbsp<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Grade 6'>Grade 6&nbsp&nbsp<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Graduated'>Graduated<br><br>";
	
	echo "<label for='kidpostal' class='edit'>Postal Address: </label>
	<input type='text' id='kidpostal' name='kidpostal' size='50' maxlength='50'><br><br>";
	
	echo "<label for='kidcity' class='edit'>City: </label>
	<input type='text' id='kidcity' name='kidcity' size='20' maxlength='20'><br><br>";
	
	echo "<label for='kidcountry' class='edit'>Country: </label>
	<input type='text' id='kidcountry' name='kidcountry' size='20' maxlength='20'><br><br>";
	
	echo "<label for='kidbio' class='edit'>Biography: </label><br><br>
	<textarea class='textarea' name='kidbio' rows='25' cols='40' maxlength='1000' style='resize:none'></textarea><br><br>";
	
	echo "<input type='submit' id='kidadd' name='kidadd' value='Add new child' class='submit'>";
	
	echo "</form>";
?>
<?php include '../footer.php';?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
