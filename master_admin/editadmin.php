<?php
	
	$go=mysqli_query($link, "SELECT * FROM administration_members where Admin_ID=".mysqli_real_escape_string($link, $_POST['adminid']));
	$row1 = mysqli_fetch_array($go);
	
	echo "<p class='edit_title'>Edit administrator:</p>";
	echo "<form action='?' method='post'>";
	
	echo "<label for='adminfirstname' class='edit'>First Name: </label>
	<input type='text' id='adminfirstname' name='adminfirstname' size='25' maxlength='25' value=".$row1['Admin_FirstName']."><br><br>";
	
	echo "<label for='adminlastname' class='edit'>Surname: </label>
	<input type='text' id='adminlastname' name='adminlastname' size='15' maxlength='15' value=".$row1['Admin_Surname']."><br><br>";
	
	echo "<label for='adminuser' class='edit'>Username: </label>
	<input type='text' id='adminuser' name='adminuser' size='20' maxlength='20' value=".$row1['Admin_Username']."><br><br>";
	
	echo "<input type='hidden' id='adminid' name='adminid' value=".mysqli_real_escape_string($link, $_POST['adminid']).">";
	
	echo "<input type='submit' id='adminchange' name='adminchange' value='Update administrator information' class='submit'>";
	
	echo "</form>";
?>
	<?php include '../footer.php';?>