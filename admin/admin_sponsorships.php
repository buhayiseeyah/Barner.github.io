<html>
	<head>
		<title>News</title>
		<link rel="stylesheet" type="text/css" href="../css/index.css">
	</head>
<body>
	<?php include 'admin_header.php';?>

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
			
			mysqli_query($link, "update kid set Kid_Sponsored='N'");
			
			$check=mysqli_query($link, "SELECT sponsorship.Sponsorship_ID, sponsor.Sponsor_FirstName, sponsor.Sponsor_Surname, sponsorship.Kid_ID, kid.Kid_FirstName, kid.Kid_Surname, sponsorship.GradeLevel, sponsorship.SchoolYear, sponsorship.CurrentTotal FROM sponsorship NATURAL JOIN kid NATURAL JOIN sponsor ORDER BY Sponsor.Sponsor_Surname");

				?>

				<img src="../images/admin.png" class="image" />

				<?php
						
			if (!$check){
				echo "<p class='edit'>Error acquiring list of sponsorships: </p>" . mysqli_error($link);
				exit();
			}
			
			else if(($row = mysqli_fetch_array($check)) == NULL) echo "<br><p class='edit'>No sponsorships has been registered yet.</p><br>";
			else {
				echo "<table id='table'>";
				echo "<tr>";
				echo "<th class='ths'>Sponsorship ID#</th>";
				echo "<th class='ths'>Sponsor</th>";
				echo "<th class='ths'>Sponsored Kid</th>";
				echo "<th class='ths'>Grade Level Sponsored</th>";
				echo "<th class='ths'>School Year Sponsored</th>";
				echo "<th class='ths'>Current Total Sponsored</th>";
				echo "</tr>";
			
				do{
					echo "<tr><td class='td'>".$row['Sponsorship_ID']."</td>";
					echo "<td class='td'>".$row['Sponsor_Surname'].", ".$row['Sponsor_FirstName']."</td>";
					echo "<td class='td'>".$row['Kid_Surname'].", ".$row['Kid_FirstName']."</td>";
					echo "<td class='td'>".$row['GradeLevel']."</td>";
					echo "<td class='td'>".$row['SchoolYear']."</td>";
					echo "<td class='td'>".$row['CurrentTotal']."</td>";
					echo "<form action='?' method='post'><input type='hidden' id='sponsorshipid' name='sponsorshipid' value=".$row['Sponsorship_ID']."><td><input type='submit' id='sponsorshipdelete' name='sponsorshipdelete' value='Delete' class='option'><input type='submit' id='sponsorshipedit' name='sponsorshipedit' value='Edit' class='option'></td></tr></form>";
					
					if(idate('Y')==$row['SchoolYear'] || (idate('Y')==($row['SchoolYear']+1) && (idate('m')<6))){
						mysqli_query($link, 'update kid set Kid_Sponsored="Y" where kid.Kid_ID='.$row['Kid_ID']);
					}
				}while($row = mysqli_fetch_array($check));
				echo "</table>";
			}
			
			echo "<p><a href='?addsponsorship' class='add'>Add a sponsorship relation</a></p>";
			
			if(array_key_exists('sponsorshipdelete', $_POST)){
				$rowa=mysqli_fetch_array(mysqli_query($link, 'SELECT Kid_ID, SchoolYear from sponsorship where sponsorship.Sponsorship_ID='.mysqli_real_escape_string($link, $_POST["sponsorshipid"])));
				
				if(idate('Y')==$rowa['SchoolYear'] || (idate('Y')==($rowa['SchoolYear']+1) && (idate('m')<6))){
					mysqli_query($link, 'update kid set Kid_Sponsored="N" where kid.Kid_ID='.$rowa['Kid_ID']);
				}
				mysqli_query($link, "delete from sponsorship where Sponsorship_ID=".mysqli_real_escape_string($link, $_POST['sponsorshipid']));
				
				header('Location: admin_sponsorships.php');
			}
			
			if(isset($_GET['addsponsorship'])){
				include '../newsponsorship.php';
				exit();
			}
			
			if(array_key_exists('sponsorshipadd', $_POST)){
				$GL=mysqli_fetch_array(mysqli_query($link, 'SELECT Kid_GradeLevel FROM kid WHERE kid.Kid_ID='.mysqli_real_escape_string($link, $_POST['kidid'])));
				
				if(!mysqli_query($link, 'insert into sponsorship values(NULL, '.mysqli_real_escape_string($link, $_POST['sponsorid']).', '.mysqli_real_escape_string($link, $_POST['kidid']).', "'.mysqli_real_escape_string($link, $GL['Kid_GradeLevel']).'", '.idate('Y').', '.mysqli_real_escape_string($link, $_POST['total']).')')) echo 'Error adding new sponsorship: '.mysqli_error($link);
				else {
					mysqli_query($link, 'update kid set Kid_Sponsored="Y" where kid.Kid_ID='.mysqli_real_escape_string($link, $_POST['kidid']));
					header('Location: admin_sponsorships.php');
				}
				exit();
			}
			
			if(array_key_exists('sponsorshipedit', $_POST)){
				include '../editsponsorship.php';
				exit();
			}
			
			if(array_key_exists('sponsorshipchange', $_POST)){
				if(!mysqli_query($link, 'update sponsorship set GradeLevel="'.mysqli_real_escape_string($link, $_POST['gradelevel']).'", SchoolYear='.mysqli_real_escape_string($link, $_POST['schoolyear']).', CurrentTotal='.mysqli_real_escape_string($link, $_POST['total']).' where sponsorship.Sponsorship_ID='.mysqli_real_escape_string($link, $_POST['sponsorshipid']).'')) echo 'Error in updating sponsorship relation information: '.mysqli_error($link);
				else {
					if(idate('Y')==$_POST['schoolyear'] || (idate('Y')==($_POST['schoolyear']+1) && (idate('m')<6))) mysqli_query($link, 'update kid set Kid_Sponsored="Y" where kid.Kid_ID='.mysqli_real_escape_string($link, $_POST['kidid']));
					else mysqli_query($link, 'update kid set Kid_Sponsored="N" where kid.Kid_ID='.mysqli_real_escape_string($link, $_POST['kidid']));
					header('Location: admin_sponsorships.php');
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