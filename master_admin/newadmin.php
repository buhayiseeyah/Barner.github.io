<?php
	echo "<p class='edit_title'>New administrator:</p>";
	echo "<form action='?' method='post'>";
	
	echo "<label for='adminfirstname' class='edit'>First Name: </label>
	<input type='text' id='adminfirstname' name='adminfirstname' size='25' maxlength='25'><br><br>";
	
	echo "<label for='adminlastname' class='edit'>Surname: </label>
	<input type='text' id='adminlastname' name='adminlastname' size='15' maxlength='15'><br><br><br>";
	
	echo "<label for='adminuser' class='edit'>Username: </label>
	<input type='text' id='adminuser' name='adminuser' size='20' maxlength='20'><br><br>";
	
	echo "<label for='adminpass1' class='edit'>Enter own password: </label>
	<input type='password' id='adminpass1' name='adminpass1' size='20' maxlength='20'><br><br>";
	
	echo "<label for='adminpass2' class='edit'>Confirm entered password: </label>
	<input type='password' id='adminpass2' name='adminpass2' size='20' maxlength='20'><br><br>";
	
	echo "<input type='submit' id='adminadd' name='adminadd' value='Add new administrator' class='submit'>";
	
	echo "</form>";
?>
	<?php include '../footer.php';?>