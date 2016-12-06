<html>
	<head>
		<title>News</title>
		<link rel="stylesheet" type="text/css" href="../css/index.css">
	</head>
<body>
	<?php include 'master_admin_header.php';?>

	<div>
		<?php
			if (get_magic_quotes_gpc()){
				function stripslashes_deep($value){
					$value = is_array($value) ?
					array_map('stripslashes_deep', $value) :
					stripslashes($value);
					return $value;
				}
				$_POST = array_map('stripslashes_deep', $_POST);
				$_GET = array_map('stripslashes_deep', $_GET);
				$_COOKIE = array_map('stripslashes_deep', $_COOKIE);
				$_REQUEST = array_map('stripslashes_deep', $_REQUEST);
			}
			
			include('../opendb.php');
						
			$check=mysqli_query($link, "SELECT * FROM sponsor order by Sponsor_ID");

				?>

				<img src="../images/master.png" class="image" />

				<?php
			
			if (!$check){
				echo "Error acquiring list of sponsors: " . mysqli_error($link);
				exit();
			}
			
			else if(($row = mysqli_fetch_array($check)) == NULL) echo "<br><p>No sponsors has been registered yet.</p><br>";
			
			else {
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
				
				do{
					echo "<tr><td class='td'>".$row['Sponsor_ID']."</td>";
					echo "<td class='td'>".$row['Sponsor_Surname'].", ".$row['Sponsor_FirstName']." ".$row['Sponsor_MiddleName']."</td>";
					echo "<td class='td'>".$row['Sponsor_Birthday']."</td>";
					echo "<td class='td'>".$row['Sponsor_Gender']."</td>";
					echo "<td class='td'>".$row['Sponsor_CivilStatus']."</td>";
					echo "<td class='td'>".$row['Sponsor_EmailAddress']."</td>";
					echo "<td class='td'>".$row['Sponsor_AddressPostal'].", ".$row['Sponsor_AddressCity'].", ".$row['Sponsor_AddressCountry']."</td>";
					echo "<form action='?' method='post'><input type='hidden' id='sponsorid' name='sponsorid' value=".$row['Sponsor_ID']."><td><input type='submit' id='sponsordelete' name='sponsordelete' value='Delete' class='option'><input type='submit' id='sponsoredit' name='sponsoredit' value='Edit' class='option'></td></tr></form>";
				}while($row = mysqli_fetch_array($check));
				echo "</table>";
			}
			
			echo "<p><a href='?addsponsor' class='add'>Add a sponsor</a></p>";
			
			if(isset($_GET['addsponsor'])){
				include '../newsponsor.php';
				exit();
			}
			
			if(array_key_exists('sponsordelete', $_POST)){
				$user=mysqli_fetch_array(mysqli_query($link, 'select Sponsor_EmailAddress from sponsor where sponsor.sponsorid="'.mysqli_real_escape_string($link, $_POST['sponsorid'].'"')));
				mysqli_query($link, "delete from user where username=".mysqli_real_escape_string($link, $user['Sponsor_EmailAddress']));
				
				mysqli_query($link, "delete from sponsor where Sponsor_ID=".mysqli_real_escape_string($link, $_POST['sponsorid']));
				
				while($rowa=mysqli_fetch_array(mysqli_query($link, "select Kid_ID, SchoolYear from sponsorship where Sponsor_ID=".mysqli_real_escape_string($link, $_POST['sponsorid'])))){
					if(idate('Y')==$rowa['SchoolYear'] || (idate('Y')==($rowa['SchoolYear']+1) && (idate('m')<6))) mysqli_query($link, 'update kid set Kid_Sponsored="N" where kid.Kid_ID='.$rowa['Kid_ID']);
					mysqli_query($link, "delete from sponsorship where Sponsor_ID=".mysqli_real_escape_string($link, $_POST['sponsorid']));
				}
				
				header('Refresh:0');
				exit();
			}
			
			if(array_key_exists('sponsoredit', $_POST)){
				include '../editsponsor.php';
				exit();
			}
			
			if(array_key_exists('sponsorchange', $_POST)){
				$raw=mysqli_fetch_array(mysqli_query($link, 'select Sponsor_EmailAddress from sponsor where sponsor.Sponsor_ID='.mysqli_real_escape_string($link, $_POST['sponsorid'])));
				
				if(!mysqli_query($link, 'update sponsor set Sponsor_FirstName="'.mysqli_real_escape_string($link, $_POST['sponsorfirstname']).'", Sponsor_MiddleName="'.mysqli_real_escape_string($link, $_POST['sponsormidname']).'", Sponsor_Surname="'.mysqli_real_escape_string($link, $_POST['sponsorlastname']).'", Sponsor_Birthday='.mysqli_real_escape_string($link, $_POST['sponsorbdyear']).mysqli_real_escape_string($link, $_POST['sponsorbdmonth']).mysqli_real_escape_string($link, $_POST['sponsorbdday']).', Sponsor_Gender="'.mysqli_real_escape_string($link, $_POST['sponsorgender']).'", Sponsor_EmailAddress="'.mysqli_real_escape_string($link, $_POST['sponsoremail']).'", Sponsor_AddressCountry="'.mysqli_real_escape_string($link, $_POST['sponsorcountry']).'", Sponsor_AddressCity="'.mysqli_real_escape_string($link, $_POST['sponsorcity']).'", Sponsor_AddressPostal="'.mysqli_real_escape_string($link, $_POST['sponsorpostal']).'", Sponsor_CivilStatus="'.mysqli_real_escape_string($link, $_POST['sponsorcivil']).'" where sponsor.Sponsor_ID='.mysqli_real_escape_string($link, $_POST['sponsorid']).'')) echo 'Error in updating sponsor information: '.mysqli_error($link);
				else {
					mysqli_query($link, 'update user set username="'.mysqli_real_escape_string($link, $raw['Sponsor_EmailAddress']).'" where user.username="'.mysqli_real_escape_string($link, $_POST['sponsoremail']).'")');
					header('Refresh:0');
				}
				
				exit();
			}
			
			if(array_key_exists('sponsoradd', $_POST)){
				if($_POST['sponsorpass1']!=$_POST['sponsorpass2']) echo 'Error: Password Mismatch';
				else if(!mysqli_query($link, 'insert into sponsor values(NULL, "'.mysqli_real_escape_string($link, $_POST['sponsorfirstname']).'", "'.mysqli_real_escape_string($link, $_POST['sponsormidname']).'", "'.mysqli_real_escape_string($link, $_POST['sponsorlastname']).'", '.mysqli_real_escape_string($link, $_POST['sponsorbdyear']).''.mysqli_real_escape_string($link, $_POST['sponsorbdmonth']).''.mysqli_real_escape_string($link, $_POST['sponsorbdday']).', "'.mysqli_real_escape_string($link, $_POST['sponsorgender']).'", "'.mysqli_real_escape_string($link, $_POST['sponsoremail']).'", "'.mysqli_real_escape_string($link, $_POST['sponsorcountry']).'", "'.mysqli_real_escape_string($link, $_POST['sponsorcity']).'", "'.mysqli_real_escape_string($link, $_POST['sponsorpostal']).'", "'.mysqli_real_escape_string($link, $_POST['sponsorcivil']).'", "'.mysqli_real_escape_string($link, $_POST['sponsorpass2']).'")')) echo 'Error adding new sponsor: '.mysqli_error($link);
				else {
					mysqli_query($link, 'insert into user values(1, "'.mysqli_real_escape_string($link, $_POST['sponsoremail']).'", "'.mysqli_real_escape_string($link, $_POST['sponsorpass2']).'")');
					header('Location: master_admin_sponsors.php');
				}
				
				exit();
			}
		?>
	</div>

	<?php include '../footer.php';?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>