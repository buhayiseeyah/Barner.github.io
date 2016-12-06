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
			
			$check=mysqli_query($link, "SELECT * FROM kid ORDER BY Kid_ID");

				?>

				<img src="../images/master.png" class="image" />

				<?php

			if (!$check){
				echo "Error acquiring list of children: " . mysqli_error($link);
				exit();
			}
			
			else if(($row = mysqli_fetch_array($check)) == NULL) echo "<br><p>No children has been registered yet.</p><br>";
			
			else{
				echo "<table id='table'>";
				echo "<tr>";
				echo "<th class='th'>Kid ID#</th>";
				echo "<th class='th'>Full Name</th>";
				echo "<th class='th'>Age</th>";
				echo "<th class='th'>Gender</th>";
				echo "<th class='th'>Grade Level</th>";
				echo "<th class='th'>Address</th>";
				echo "<th class='th'>Currently being sponsored?</th>";
				echo "<th class='th'>Biography</th>";
				echo "</tr>";
				
				do{
					echo "<tr><td class='td'>".$row['Kid_ID']."</td>";
					echo "<td class='td'>".$row['Kid_Surname'].", ".$row['Kid_FirstName']." ".$row['Kid_MiddleName']."</td>";
					echo "<td class='td'>".$row['Kid_Age']."</td>";
					echo "<td class='td'>".$row['Kid_Gender']."</td>";
					echo "<td class='td'>".$row['Kid_GradeLevel']."</td>";
					echo "<td class='td'>".$row['Kid_AddressPostal'].", ".$row['Kid_AddressCity'].", ".$row['Kid_AddressCountry']."</td>";
					echo "<td class='td'>".$row['Kid_Sponsored']."</td>";
					echo "<td class='td'>".$row['Kid_Bio']."</td>";
					echo "<form action='?' method='post'><input type='hidden' id='kidid' name='kidid' value=".$row['Kid_ID']."><td><input type='submit' id='kiddelete' name='kiddelete' value='Delete' class='option'><input type='submit' id='kidedit' name='kidedit' value='Edit' class='option'></td></tr></form>";
				}while($row = mysqli_fetch_array($check));
				echo "</table>";
			}
			
			
			echo "<p><a href='?addkid' class='add'>Add a child</a></p>";
			
			if(isset($_GET['addkid'])){
				include '../newkid.php';
				exit();
			}
			
			if(array_key_exists('kiddelete', $_POST)){
				mysqli_query($link, "delete from kid where Kid_ID=".mysqli_real_escape_string($link, $_POST['kidid']));
				
				mysqli_query($link, "delete from sponsorship where Kid_ID=".mysqli_real_escape_string($link, $_POST['kidid']));
				
				header('Refresh:0');
			}
			
			if(array_key_exists('kidedit', $_POST)){
				include '../editkid.php';
				exit();
			}
			
			if(array_key_exists('kidchange', $_POST)){
				if(!mysqli_query($link, 'update kid set Kid_Firstname="'.mysqli_real_escape_string($link, $_POST['kidfirstname']).'", Kid_Surname="'.mysqli_real_escape_string($link, $_POST['kidlastname']).'", Kid_Age='.mysqli_real_escape_string($link, $_POST['kidage']).', Kid_Gender="'.mysqli_real_escape_string($link, $_POST['kidgender']).'", Kid_GradeLevel="'.mysqli_real_escape_string($link, $_POST['kidgradelevel']).'", Kid_AddressCountry="'.mysqli_real_escape_string($link, $_POST['kidcountry']).'", Kid_AddressCity="'.mysqli_real_escape_string($link, $_POST['kidcity']).'", Kid_AddressPostal="'.mysqli_real_escape_string($link, $_POST['kidpostal']).'", Kid_Bio="'.mysqli_real_escape_string($link, $_POST['kidbio']).'" where kid.Kid_ID='.mysqli_real_escape_string($link, $_POST['kidid']).'')) echo 'Error in updating child information: '.mysqli_error($link);
				else header('Refresh:0');
			}
			
			if(array_key_exists('kidadd', $_POST)){
				if(!mysqli_query($link, 'insert into kid values(NULL, "'.mysqli_real_escape_string($link, $_POST['kidfirstname']).'", "'.mysqli_real_escape_string($link, $_POST['kidmidname']).'", "'.mysqli_real_escape_string($link, $_POST['kidlastname']).'", '.mysqli_real_escape_string($link, $_POST['kidage']).', "'.mysqli_real_escape_string($link, $_POST['kidgender']).'", "'.mysqli_real_escape_string($link, $_POST['kidgradelevel']).'", "'.mysqli_real_escape_string($link, $_POST['kidcountry']).'", "'.mysqli_real_escape_string($link, $_POST['kidcity']).'", "'.mysqli_real_escape_string($link, $_POST['kidpostal']).'", "N", "'.mysqli_real_escape_string($link, $_POST['kidbio']).'")')) echo 'Error adding new child: '.mysqli_error($link);
				else header('Location: master_admin_kids.php');
				
				exit();
			}
			
		?>		
	</div>

	<?php include '../footer.php';?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>