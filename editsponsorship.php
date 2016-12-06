<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>
<?php
	
	$go=mysqli_query($link, "SELECT * FROM sponsorship where Sponsorship_ID=".mysqli_real_escape_string($link, $_POST['sponsorshipid']));
	$row1 = mysqli_fetch_array($go);
	
	$check1=mysqli_fetch_array(mysqli_query($link, 'SELECT * FROM sponsor where Sponsor_ID='.$row1['Sponsor_ID']));
	$check2=mysqli_fetch_array(mysqli_query($link, 'SELECT * FROM kid WHERE Kid_ID='.$row1['Kid_ID']));
		
	echo "<p class='edit_title'>Edit sponsorship relation:</p>";
	echo "<form action='?' method='post'>";
	
	echo "<p class='edit'>Sponsor: </p>";
	
	echo "<table id='table'>";
	echo "<tr>";
	echo "<th class='th'>Sponsor ID#</th>";
	echo "<th class='th'>Full Name</th>";
	echo "<th class='th'>Birthday</th>";
	echo "<th class='th'>Gender</th>";
	echo "<th class='th'>Civil Status</th>";
	echo "<th class='th'>Email Address</th>";
	echo "<th class='th'>Address</th>";
	echo "</tr>";
	
	echo "<tr><td class='td'>".$check1['Sponsor_ID']."</td>";
	echo "<td class='td'>".$check1['Sponsor_Surname'].", ".$check1['Sponsor_FirstName']." ".$check1['Sponsor_MiddleName']."</td>";
	echo "<td class='td'>".$check1['Sponsor_Birthday']."</td>";
	echo "<td class='td'>".$check1['Sponsor_Gender']."</td>";
	echo "<td class='td'>".$check1['Sponsor_CivilStatus']."</td>";
	echo "<td class='td'>".$check1['Sponsor_EmailAddress']."</td>";
	echo "<td class='td'>".$check1['Sponsor_AddressPostal'].", ".$check1['Sponsor_AddressCity'].", ".$check1['Sponsor_AddressCountry']."</td></tr>";
	echo "</table>";
	
	echo "<p class='edit'>Sponsored child: </p>";
	
	echo "<table id='table'>";
	echo "<tr>";
	echo "<th class='th'>Kid ID#</th>";
	echo "<th class='th'>Full Name</th>";
	echo "<th class='th'>Age</th>";
	echo "<th class='th'>Gender</th>";
	echo "<th class='th'>Grade Level</th>";
	echo "<th class='th'>Address</th>";
	echo "<th class='th'>Biography</th>";
	echo "</tr>";
	
	echo "<tr><td class='td'>".$check2['Kid_ID']."</td>";
	echo "<td class='td'>".$check2['Kid_Surname'].", ".$check2['Kid_FirstName']." ".$check2['Kid_MiddleName']."</td>";
	echo "<td class='td'>".$check2['Kid_Age']."</td>";
	echo "<td class='td'>".$check2['Kid_Gender']."</td>";
	echo "<td class='td'>".$check2['Kid_GradeLevel']."</td>";
	echo "<td class='td'>".$check2['Kid_AddressPostal'].", ".$check2['Kid_AddressCity'].", ".$check2['Kid_AddressCountry']."</td>";
	echo "<td class='td'>".$check2['Kid_Bio']."</td></tr>";
	echo "</table><br>";
	
	echo "<label for='gradelevel' class='edit'>Grade level: </label><br><br>
	<input type='radio' id='gradelevel' name='gradelevel' value='Pre-school' class='edit'";
	if($row1['GradeLevel']=='Pre-school') echo "checked='checked'";
	echo ">Pre-school&nbsp&nbsp<input type='radio' id='gradelevel' name='gradelevel' value='Grade 1'";
	if($row1['GradeLevel']=='Grade 1') echo "checked='checked'";
	echo ">Grade 1&nbsp&nbsp<input type='radio' id='gradelevel' name='gradelevel' value='Grade 2'";
	if($row1['GradeLevel']=='Grade 2') echo "checked='checked'";
	echo ">Grade 2&nbsp&nbsp<input type='radio' id='gradelevel' name='gradelevel' value='Grade 3'";
	if($row1['GradeLevel']=='Grade 3') echo "checked='checked'";
	echo ">Grade 3&nbsp&nbsp<input type='radio' id='gradelevel' name='gradelevel' value='Grade 4'";
	if($row1['GradeLevel']=='Grade 4') echo "checked='checked'";
	echo ">Grade 4&nbsp&nbsp<input type='radio' id='gradelevel' name='gradelevel' value='Grade 5'";
	if($row1['GradeLevel']=='Grade 5') echo "checked='checked'";
	echo ">Grade 5&nbsp&nbsp<input type='radio' id='gradelevel' name='gradelevel' value='Grade 6'";
	if($row1['GradeLevel']=='Grade 6') echo "checked='checked'";
	echo ">Grade 6&nbsp&nbsp<input type='radio' id='gradelevel' name='gradelevel' value='Graduated'";
	if($row1['GradeLevel']=='Graduated') echo "checked='checked'";
	echo ">Graduated<br><br>";
	
	echo "<label for='schoolyear' class='edit'>School Year: </label>
	<input type='text' id='schoolyear' name='schoolyear' size='6' maxlength='6' value=".$row1['SchoolYear']."><br><br>";
	
	echo "<label for='total' class='edit'>Enter deposited cash: </label>
	<input type='text' id='total' name='total' size='10' maxlength='10' value=".$row1['CurrentTotal']."><br><br>";
	
	echo "<input type='hidden' id='kidid' name='kidid' value=".$row1['Kid_ID'].">";
	
	echo "<input type='hidden' id='sponsorshipid' name='sponsorshipid' value=".mysqli_real_escape_string($link, $_POST['sponsorshipid'])."><br><br>";
	
	echo "<input type='submit' id='sponsorshipchange' name='sponsorshipchange' value='Update sponsorship relation information' class='submit'>";
	
	echo "</form>";
	
?>
	<?php include '../footer.php';?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>