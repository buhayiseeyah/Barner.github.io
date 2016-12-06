<!DOCTYPE html>
<html>
<head>
	<title></title>
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
			
						
			$check=mysqli_query($link, "SELECT * FROM administration_members ORDER BY Admin_DateAdded");
			
			if (!$check){
				echo "Error acquiring list of administrators: " . mysqli_error($link);
				exit();
			}
			
			else if(($row = mysqli_fetch_array($check)) == NULL) echo "<br><p>No administrators has been registered yet.</p><br>";
			else{
				echo "<table><tr><th>Admin ID#</th><th>Administrator</th><th>Username</th><th>Date Added</th><th>Last Active</th><th>Is head of administrators?</th></tr>";
				
				do{
					echo"<tr><td>".$row['Admin_ID']."</td>";
					echo"<td>".$row['Admin_Surname'].", ".$row['Admin_FirstName']."</td>";
					echo"<td>".$row['Admin_Username']."</td>";
					echo"<td>".$row['Admin_DateAdded']."</td>";
					echo"<td>".$row['Admin_LastAccess']."</td>";
					echo"<td>".$row['Admin_Master']."</td>";
					echo "<form action='?' method='post'><input type='hidden' id='adminid' name='adminid' value=".$row['Admin_ID']."><td><input type='submit' id='admindelete' name='admindelete' value='Delete'></td><td><input type='submit' id='adminedit' name='adminedit' value='Edit'></td></tr></form>";
				}while($row = mysqli_fetch_array($check));
				echo "</table>";
			}
			
			echo "<p><a href='?addadmin'>Add an administrator</a></p>";
			
			if(isset($_GET['addadmin'])){
				include 'newadmin.php';
				exit();
			}
			
			if(array_key_exists('admindelete', $_POST)){
				mysqli_query($link, "delete from administration_members where Admin_ID=".mysqli_real_escape_string($link, $_POST['adminid']));
				
				header('Location: adminlist.php');
			}
			
			if(array_key_exists('adminedit', $_POST)){
				include 'editadmin.php';
				exit();
			}
			
			if(array_key_exists('adminchange', $_POST)){
				if(!mysqli_query($link, 'update administration_members set Admin_Firstname="'.mysqli_real_escape_string($link, $_POST['adminfirstname']).'", Admin_Surname="'.mysqli_real_escape_string($link, $_POST['adminlastname']).'", Admin_Username="'.mysqli_real_escape_string($link, $_POST['adminuser']).'" where administration_members.Admin_ID='.mysqli_real_escape_string($link, $_POST['adminid']).'')) echo 'Error in updating administrator information: '.mysqli_error($link);
				else header('Location: adminlist.php');
			}
			
			if(array_key_exists('adminadd', $_POST)){
				if($_POST['adminpass1']!=$_POST['adminpass2']) echo 'Error: Password Mismatch';
				else if(!mysqli_query($link, 'insert into administration_members values(NULL, "'.mysqli_real_escape_string($link, $_POST['adminfirstname']).'", "'.mysqli_real_escape_string($link, $_POST['adminlastname']).'", CURDATE(), CURDATE(), "'.mysqli_real_escape_string($link, $_POST['adminuser']).'", "'.mysqli_real_escape_string($link, $_POST['sponsorpass2']).'", "N")')) echo 'Error adding new administrator: '.mysqli_error($link);
				else header('Location: adminlist.php');
				
				exit();
			}
		?>
	</div>
	<?php include '../footer.php';?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/app.js"></script>

</body>
</html>
		