<?php
include '../opendb.php';

if (isset($_POST['click']))
{
	$uname = $_POST['uname'];
	$psw = $_POST['psw'];

	$check=mysqli_query($link, 'SELECT * FROM user where username="'.$uname.'" and password="'.$psw.'"');
	$c=mysqli_fetch_array($check);
	if($c==NULL) header('Location: ../guest/guest_home.php');

	else{
		if($c['user_type_id']==1)
			header('Location: ../sponsor/sponsor_home1.php');
		else if($c['user_type_id']==2)
			header('Location: ../admin/admin_home.php');
		else if($c['user_type_id']==3)
			header('Location: ../master_admin/master_admin_home.php');
		exit();
	}

	//header('Location: ../admin/admin_home.php');

	/*$id = 'SELECT Sponsor_ID FROM sponsor WHERE Sponsor_FirstName="'. $fname . '", Sponsor_MiddleName="'. $mname . '", Sponsor_Surname="'. $lname . '"';
	$sql = 'INSERT INTO sponsorship SET Sponsor_ID='$id', ';*/
}
	

ob_end_flush();
?>