<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
	
	<div>
<?php
	
	$go=mysqli_query($link, "SELECT * FROM kid where Kid_ID=".mysqli_real_escape_string($link, $_POST['kidid']));
	$row1 = mysqli_fetch_array($go);
	
	echo "<p class='edit_title'>Edit Child:</p>";
	echo "<form action='?' method='post'>";
	
	echo "<label for='kidfirstname' class='edit'>First Name: </label>
	<input type='text' id='kidfirstname' name='kidfirstname' size='25' maxlength='25' value=".$row1['Kid_FirstName']."><br><br>";
	
	echo "<label for='kidmidname' class='edit'>Middle Name: </label>
	<input type='text' id='kidmidname' name='kidmidname' size='15' maxlength='15' value=".$row1['Kid_MiddleName']."><br><br>";
	
	echo "<label for='kidlastname' class='edit'>Surname: </label>
	<input type='text' id='kidlastname' name='kidlastname' size='15' maxlength='15' value=".$row1['Kid_Surname']."><br><br>";
	
	echo "<label for='kidage' class='edit'>Age: </label>
	<input type='text' id='kidage' name='kidage' size='3' maxlength='3' value=".$row1['Kid_Age']."><br><br>";
	
	echo "<label for='kidgender' class='edit'>Gender: </label>
	<input type='radio' id='kidgender' name='kidgender' value='Male'";
	if($row1['Kid_Gender']=='Male') echo "checked='checked'";
	echo ">Male&nbsp&nbsp<input type='radio' id='kidgender' name='kidgender' value='Female'";
	if($row1['Kid_Gender']=='Female') echo "checked='checked'";
	echo ">Female<br><br>";
	
	echo "<label for='kidgradelevel' class='edit'>Grade level: </label><br>
	<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Pre-school' class='edit'";
	if($row1['Kid_GradeLevel']=='Pre-school') echo "checked='checked'";
	echo ">Pre-school&nbsp&nbsp<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Grade 1'";
	if($row1['Kid_GradeLevel']=='Grade 1') echo "checked='checked'";
	echo ">Grade 1&nbsp&nbsp<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Grade 2'";
	if($row1['Kid_GradeLevel']=='Grade 2') echo "checked='checked'";
	echo ">Grade 2&nbsp&nbsp<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Grade 3'";
	if($row1['Kid_GradeLevel']=='Grade 3') echo "checked='checked'";
	echo ">Grade 3&nbsp&nbsp<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Grade 4'";
	if($row1['Kid_GradeLevel']=='Grade 4') echo "checked='checked'";
	echo ">Grade 4&nbsp&nbsp<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Grade 5'";
	if($row1['Kid_GradeLevel']=='Grade 5') echo "checked='checked'";
	echo ">Grade 5&nbsp&nbsp<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Grade 6'";
	if($row1['Kid_GradeLevel']=='Grade 6') echo "checked='checked'";
	echo ">Grade 6&nbsp&nbsp<input type='radio' id='kidgradelevel' name='kidgradelevel' value='Graduated'";
	if($row1['Kid_GradeLevel']=='Graduated') echo "checked='checked'";
	echo ">Graduated<br><br>";
	
	echo "<label for='kidpostal' class='edit'>Postal Address: </label>
	<input type='text' id='kidpostal' name='kidpostal' size='50' maxlength='50' value=".$row1['Kid_AddressPostal']."><br><br>";
	
	echo "<label for='kidcity' class='edit'>City: </label>
	<input type='text' id='kidcity' name='kidcity' size='20' maxlength='20' value=".$row1['Kid_AddressCity']."><br><br>";
	
	echo "<label for='kidcountry' class='edit'>Country: </label>
	<input type='text' id='kidcountry' name='kidcountry' size='20' maxlength='20' value=".$row1['Kid_AddressCountry']."><br><br>";
	
	echo "<label for='kidbio' class='edit'>Biography: </label><br><br>
	<textarea class='textarea' name='kidbio' rows='10' cols='40' maxlength='1000' style='resize:none'>".$row1['Kid_Bio']."</textarea><br><br>";
	
	echo "<input type='hidden' id='kidid' name='kidid' value=".mysqli_real_escape_string($link, $_POST['kidid']).">";
	
	echo "<input type='submit' id='kidchange' name='kidchange' value='Update child information' class='submit'>";
	
	echo "</form>";
?>		
	</div>
	<?php include '../footer.php';?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/app.js"></script>

</body>
</html>