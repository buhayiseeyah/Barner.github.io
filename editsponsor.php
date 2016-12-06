<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
<?php
	
	$go=mysqli_query($link, "SELECT * FROM sponsor where Sponsor_ID=".mysqli_real_escape_string($link, $_POST['sponsorid']));
	$row1 = mysqli_fetch_array($go);
	
	echo "<p class='edit_title'>Edit Sponsor:</p>";
	echo "<form action='?' method='post'>";
	
	echo "<label for='sponsorfirstname' class='edit'>First Name: </label>
	<input type='text' id='sponsorfirstname' name='sponsorfirstname' size='25' maxlength='25' value=".$row1['Sponsor_FirstName']."><br><br>";
	
	echo "<label for='sponsormidname' class='edit'>Middle Name: </label>
	<input type='text' id='sponsormidname' name='sponsormidname' size='15' maxlength='15' value=".$row1['Sponsor_MiddleName']."><br><br>";
	
	echo "<label for='sponsorlastname' class='edit'>Surname: </label>
	<input type='text' id='sponsorlastname' name='sponsorlastname' size='15' maxlength='15' value=".$row1['Sponsor_Surname']."><br><br><br>";
	
	echo "<label class='edit'>Birthday: </label><br><br>
	<label for='sponsorbdmonth' class='edit'>Month (MM): </label>
	<input type='text' id='sponsorbdmonth' name='sponsorbdmonth' size='2' maxlength='2' value=".substr($row1['Sponsor_Birthday'], 5, 2)."><br><br>
	<label for='sponsorbdday' class='edit'>Day (DD): </label>
	<input type='text' id='sponsorbdday' name='sponsorbdday' size='2' maxlength='2' value=".substr($row1['Sponsor_Birthday'], 8, 2)."><br><br>
	<label for='sponsorbdyear' class='edit'>Year (YYYY): </label>
	<input type='text' id='sponsorbdyear' name='sponsorbdyear' size='4' maxlength='4' value=".substr($row1['Sponsor_Birthday'], 0, 4)."><br><br><br>";
	
	echo "<label for='sponsorgender' class='edit'>Gender: </label>
	<input type='radio' id='sponsorgender' name='sponsorgender' value='Male'";
	if ($row1['Sponsor_Gender']=='Male') echo "checked='checked'";
	echo ">Male&nbsp&nbsp<input type='radio' id='sponsorgender' name='sponsorgender' value='Female'";
	if ($row1['Sponsor_Gender']=='Female') echo "checked='checked'";
	echo ">Female<br><br>";
	
	echo "<label for='sponsorcivil' class='edit'>Civil Status: </label>
	<input type='radio' id='sponsorcivil' name='sponsorcivil' value='Single' ";
	if ($row1['Sponsor_CivilStatus'] == 'Single') echo "checked='checked'";
	echo ">Single&nbsp&nbsp<input type='radio' id='sponsorcivil' name='sponsorcivil' value='Married'";
	if ($row1['Sponsor_CivilStatus'] == 'Married') echo "checked='checked'";
	echo ">Married&nbsp&nbsp<input type='radio' id='sponsorcivil' name='sponsorcivil' value='Deceased'";
	if ($row1['Sponsor_CivilStatus'] == 'Deceased') echo "checked='checked'";
	echo ">Deceased<br><br>";
	
	echo "<label for='sponsorpostal' class='edit'>Postal Address: </label>
	<input type='text' id='sponsorpostal' name='sponsorpostal' size='50' maxlength='50'  value=".$row1['Sponsor_AddressPostal']."><br><br>";
	
	echo "<label for='sponsorcity' class='edit'>City: </label>
	<input type='text' id='sponsorcity' name='sponsorcity' size='20' maxlength='20' value=".$row1['Sponsor_AddressCity']."><br><br>";
	
	echo "<label for='sponsorcountry' class='edit'>Country: </label>
	<input type='text' id='sponsorcountry' name='sponsorcountry' size='20' maxlength='20' value=".$row1['Sponsor_AddressCountry']."><br><br>";
	
	echo "<label for='sponsoremail' class='edit'>E-mail Address: </label>
	<input type='text' id='sponsoremail' name='sponsoremail' size='20' maxlength='20' value=".$row1['Sponsor_EmailAddress']."><br><br>";
	
	echo "<input type='hidden' id='sponsorid' name='sponsorid' value=".mysqli_real_escape_string($link, $_POST['sponsorid']).">";
	
	echo "<input type='submit' id='sponsorchange' name='sponsorchange' value='Update sponsor information' class='submit'>";
	
	echo "</form>";
?>
<?php include '../footer.php';?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/app.js"></script>

</body>
</html>