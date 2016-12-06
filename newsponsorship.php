<?php
	
	$check1=mysqli_query($link, 'SELECT * FROM sponsor where sponsor.Sponsor_CivilStatus!="Deceased"');
	$check2=mysqli_query($link, 'SELECT * FROM kid WHERE kid.Kid_Sponsored="N" ORDER BY Kid_ID');
	
	if (!$check1) echo "Error acquiring list of sponsors: " . mysqli_error($link);
	
	else if (!$check2) echo "Error acquiring list of children: " . mysqli_error($link);
	
	else if(($row1 = mysqli_fetch_array($check1)) == NULL || ($row2 = mysqli_fetch_array($check2)) == NULL){
		if($row1 == NULL)echo "<br><p>Either no sponsors has been registered yet or all of the sponsors currently registered are deceased.</p><br>";
		if($row2 == NULL)echo "<br><p>Either no children has been registered yet or all of the children for this school year has already been sponsored.</p><br>";
	}
	
	else{
		echo "<p class='edit_title'>New Sponsorship Relation:</p>";
		echo "<form action='?' method='post'>";
		
		echo "<label for='sponsorid' class='edit'>Select sponsor: </label>";
		
		echo "<table id='table'>";
		echo "<tr>";
		echo "<th class='th'></th>";
		echo "<th class='th'>Sponsor ID#</th>";
		echo "<th class='th'>Full Name</th>";
		echo "<th class='th'>Birthday</th>";
		echo "<th class='th'>Gender</th>";
		echo "<th class='th'>Civil Status</th>";
		echo "<th class='th'>Email Address</th>";
		echo "<th class='th'>Address</th>";
		echo "</tr>";
		
		do{
			echo "<tr><td class='td'><input type='radio' id='sponsorid' name='sponsorid' value='".$row1['Sponsor_ID']."'>";
			echo "<td class='td'>".$row1['Sponsor_ID']."</td>";
			echo "<td class='td'>".$row1['Sponsor_Surname'].", ".$row1['Sponsor_FirstName']." ".$row1['Sponsor_MiddleName']."</td>";
			echo "<td class='td'>".$row1['Sponsor_Birthday']."</td>";
			echo "<td class='td'>".$row1['Sponsor_Gender']."</td>";
			echo "<td class='td'>".$row1['Sponsor_CivilStatus']."</td>";
			echo "<td class='td'>".$row1['Sponsor_EmailAddress']."</td>";
			echo "<td class='td'>".$row1['Sponsor_AddressPostal'].", ".$row1['Sponsor_AddressCity'].", ".$row1['Sponsor_AddressCountry']."</td></tr>";
		}while($row1 = mysqli_fetch_array($check1));
		echo "</table><br><br><br>";
		
		echo "<label for='kidid' class='add'>Select child to sponsor: </label><br><br>";
		
		echo "<table id='table'>";
		echo "<tr>";
		echo "<th class='th'></th>";
		echo "<th class='th'>Kid ID#</th>";
		echo "<th class='th'>Full Name</th>";
		echo "<th class='th'>Age</th>";
		echo "<th class='th'>Gender</th>";
		echo "<th class='th'>Grade Level</th>";
		echo "<th class='th'>Address</th>";
		echo "<th class='th'>Biography</th>";
		echo "</tr>";
		
		do{
			echo "<tr><td class='td'><input type='radio' id='kidid' name='kidid' value='".$row2['Kid_ID']."'>";
			echo "<td class='td'>".$row2['Kid_ID']."</td>";
			echo "<td class='td'>".$row2['Kid_Surname'].", ".$row2['Kid_FirstName']." ".$row2['Kid_MiddleName']."</td>";
			echo "<td class='td'>".$row2['Kid_Age']."</td>";
			echo "<td class='td'>".$row2['Kid_Gender']."</td>";
			echo "<td class='td'>".$row2['Kid_GradeLevel']."</td>";
			echo "<td class='td'>".$row2['Kid_AddressPostal'].", ".$row2['Kid_AddressCity'].", ".$row2['Kid_AddressCountry']."</td>";
			echo "<td class='td'>".$row2['Kid_Bio']."</td></tr>";
		}while($row2 = mysqli_fetch_array($check2));
		echo "</table><br><br><br>";
		
		echo "<label for='total' class='edit'>Enter initial deposited cash: </label>
		<input type='text' id='total' name='total' size='10' maxlength='10'><br><br><br>";
		
		echo "<input type='submit' id='sponsorshipadd' name='sponsorshipadd' value='Add new sponsorship relation'  class='submit'>";
		
		echo "</form>";
	}
?>
	<?php include 'footer.php';?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/app.js"></script>