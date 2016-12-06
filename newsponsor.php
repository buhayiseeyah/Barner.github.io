<?php
	echo "<p class='edit_title'>New Sponsor:</p>";
	echo "<form action='?' method='post'>";
	
	echo "<label for='sponsorfirstname' class='edit'>First Name: </label>
	<input type='text' id='sponsorfirstname' name='sponsorfirstname' size='25' maxlength='25'><br><br>";
	
	echo "<label for='sponsormidname' class='edit'>Middle Name: </label>
	<input type='text' id='sponsormidname' name='sponsormidname' size='15' maxlength='15'><br><br>";
	
	echo "<label for='sponsorlastname' class='edit'>Surname: </label>
	<input type='text' id='sponsorlastname' name='sponsorlastname' size='15' maxlength='15'><br><br><br>";
	
	echo "<label class='edit'>Birthday: </label><br><br>
	<label for='sponsorbdmonth' class='edit'>Month (MM): </label>
	<input type='text' id='sponsorbdmonth' name='sponsorbdmonth' size='2' maxlength='2'><br><br>
	<label for='sponsorbdday' class='edit'>Day (DD): </label>
	<input type='text' id='sponsorbdday' name='sponsorbdday' size='2' maxlength='2'><br><br>
	<label for='sponsorbdyear' class='edit'>Year (YYYY): </label>
	<input type='text' id='sponsorbdyear' name='sponsorbdyear' size='4' maxlength='4'><br><br><br>";
	
	echo "<label for='sponsorgender' class='edit'>Gender: </label>
	<input type='radio' id='sponsorgender' name='sponsorgender' value='Male' checked='checked'>Male&nbsp&nbsp<input type='radio' id='sponsorgender' name='sponsorgender' value='Female'>Female<br><br>";
	
	echo "<label for='sponsorcivil' class='edit'>Civil Status: </label>
	<input type='radio' id='sponsorcivil' name='sponsorcivil' value='Single' checked='checked'>Single&nbsp&nbsp<input type='radio' id='sponsorcivil' name='sponsorcivil' value='Married'>Married<br><br>";
	
	echo "<label for='sponsorpostal' class='edit'>Postal Address: </label>
	<input type='text' id='sponsorpostal' name='sponsorpostal' size='50' maxlength='50'><br><br>";
	
	echo "<label for='sponsorcity' class='edit'>City: </label>
	<input type='text' id='sponsorcity' name='sponsorcity' size='20' maxlength='20'><br><br>";
	
	echo "<label for='sponsorcountry' class='edit'>Country: </label>
	<input type='text' id='sponsorcountry' name='sponsorcountry' size='20' maxlength='20'><br><br>";
	
	echo "<label for='sponsoremail' class='edit'>E-mail Address: </label>
	<input type='text' id='sponsoremail' name='sponsoremail' size='20' maxlength='20'><br><br>";
	
	echo "<label for='sponsorpass1' class='edit'>Enter own password: </label>
	<input type='password' id='sponsorpass1' name='sponsorpass1' size='20' maxlength='20'><br><br>";
	
	echo "<label for='sponsorpass2' class='edit'>Confirm entered password: </label>
	<input type='password' id='sponsorpass2' name='sponsorpass2' size='20' maxlength='20'><br><br>";
	
	echo "<input type='submit' id='sponsoradd' name='sponsoradd' value='Add new sponsor' class='submit'>";
	
	echo "</form>";
?>
<?php include '../footer.php';?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/app.js"></script>