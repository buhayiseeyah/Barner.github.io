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
			
						
			$check=mysqli_query($link, "SELECT * FROM administration_members ORDER BY Admin_DateAdded");

				?>

				<img src="../images/master.png" class="image" />

				<?php
				
			if (!$check){
				echo "Error acquiring list of administrators: " . mysqli_error($link);
				exit();
			}
			
			else if(($row = mysqli_fetch_array($check)) == NULL) echo "<br><p class='edit'>No administrators has been registered yet.</p><br>";
			else{
					echo "<table id='table'>
					<tr>
					<th class='th'>Admin ID#</th>
					<th class='th'>Administrator</th>
					<th class='th'>Username</th>
					<th class='th'>Date Added</th>
					<th class='th'>Last Active</th>
					<th class='th'>Is head of administrators?</th>
					</tr>";
				
				do{
					echo"<tr><td class='td'>".$row['Admin_ID']."</td>";
					echo"<td class='td'>".$row['Admin_Surname'].", ".$row['Admin_FirstName']."</td>";
					echo"<td class='td'>".$row['Admin_Username']."</td>";
					echo"<td class='td'>".$row['Admin_DateAdded']."</td>";
					echo"<td class='td'>".$row['Admin_LastAccess']."</td>";
					echo"<td class='td'>".$row['Admin_Master']."</td>";
					echo "<form action='?' method='post'><input type='hidden' id='adminid' name='adminid' value=".$row['Admin_ID']."><td><input type='submit' id='admindelete' name='admindelete' value='Delete' class='option'><input type='submit' id='adminedit' name='adminedit' value='Edit' class='option'></td></tr></form>";
				}while($row = mysqli_fetch_array($check));
				echo "</table>";
			}
			
			echo "<p><a href='?addadmin' class='add'>Add an administrator</a></p>";
			
			if(isset($_GET['addadmin'])){
				include 'newadmin.php';
				exit();

			}
			
			if(array_key_exists('admindelete', $_POST)){
				$user=mysqli_fetch_array(mysqli_query($link, 'select Admin_Username from administration_members where administration_members.Admin_ID="'.mysqli_real_escape_string($link, $_POST['sponsorid'].'"')));
				mysqli_query($link, "delete from user where username=".mysqli_real_escape_string($link, $user['Admin_Username']));

				mysqli_query($link, "delete from administration_members where Admin_ID=".mysqli_real_escape_string($link, $_POST['adminid']));
				
				header('Refresh:0');
			}
			
			if(array_key_exists('adminedit', $_POST)){
				include 'editadmin.php';
				exit();
			}
			
			if(array_key_exists('adminchange', $_POST)){
				if(!mysqli_query($link, 'update administration_members set Admin_Firstname="'.mysqli_real_escape_string($link, $_POST['adminfirstname']).'", Admin_Surname="'.mysqli_real_escape_string($link, $_POST['adminlastname']).'", Admin_Username="'.mysqli_real_escape_string($link, $_POST['adminuser']).'" where administration_members.Admin_ID='.mysqli_real_escape_string($link, $_POST['adminid']).'')) echo 'Error in updating administrator information: '.mysqli_error($link);
				else header('Refresh:0');
			}
			
			if(array_key_exists('adminadd', $_POST)){
				if($_POST['adminpass1']!=$_POST['adminpass2']) echo 'Error: Password Mismatch';
				else if(!mysqli_query($link, 'insert into administration_members values(NULL, "'.mysqli_real_escape_string($link, $_POST['adminfirstname']).'", "'.mysqli_real_escape_string($link, $_POST['adminlastname']).'", CURDATE(), CURDATE(), "'.mysqli_real_escape_string($link, $_POST['adminuser']).'", "'.mysqli_real_escape_string($link, $_POST['adminpass2']).'", "N")')) echo 'Error adding new administrator: '.mysqli_error($link);
				else {
					mysqli_query($link, 'insert into user values(2, "'.mysqli_real_escape_string($link, $_POST['adminuser']).'", "'.mysqli_real_escape_string($link, $_POST['adminpass2']).'")');
					header('Location: administrators.php');
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