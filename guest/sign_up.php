<?php
$flag = 0;
ob_start();
$link = mysqli_connect('localhost', 'root', '');
if (!$link)
{
    echo "Unable to connect to the database server.";
    exit();
}
if (!mysqli_set_charset($link, 'utf8'))
{
    echo "Unable to set database connection encoding.";
    exit();
}
if (!mysqli_select_db($link, 'barner'))
{
    echo "Unable to locate the sponsor and kid database.";
    exit();
}
$result = mysqli_query($link, 'SELECT Sponsor_ID, Sponsor_FirstName, Sponsor_MiddleName, Sponsor_Surname, Sponsor_Birthday, Sponsor_Gender, Sponsor_EmailAddress, Sponsor_AddressCountry, Sponsor_AddressCity, Sponsor_AddressPostal, Sponsor_CivilStatus, Sponsor_Password FROM sponsor');
if (!$result)
{
    echo "Error fetching sponsors: " . mysqli_error($link);
    exit();
}
while ($row = mysqli_fetch_array($result))
{
	$sponsors[] = array('id' => $row['Sponsor_ID'], 'fname' => $row['Sponsor_FirstName'], 'mname' => $row['Sponsor_MiddleName'], 'lname' => $row['Sponsor_Surname'], 'bday' => $row['Sponsor_Birthday'], 'gender' => $row['Sponsor_Gender'], 'email' => $row['Sponsor_EmailAddress'], 'country' => $row['Sponsor_AddressCountry'], 'city' => $row['Sponsor_AddressCity'], 'p_address' => $row['Sponsor_AddressPostal'], 'status' => $row['Sponsor_CivilStatus'], 'pw' => $row['Sponsor_Password']);
}

$result = mysqli_query($link, 'SELECT Sponsorship_ID, Sponsor_ID, Kid_ID, GradeLevel, SchoolYear, CurrentTotal FROM sponsorship');
if (!$result)
{
 $error = 'Error fetching kids from database!';
 include 'error.html.php';
 exit();
}
while ($row = mysqli_fetch_array($result))
{
 $kids[] = array('id' => $row['Sponsorship_ID'], 'name' => $row['Sponsor_ID'], 'name' => $row['Kid_ID'], 'g_lvl' => $row['GradeLevel'], 's_year' => $row['SchoolYear'], 'tot' => $row['CurrentTotal']);
}

include 'sign_up.html.php';

if (isset($_POST['submit']))
{
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$fname = $_POST['fname'];
	$day = $_POST['day'];
	$mon = $_POST['mon'];
	$yr = $_POST['yr'];
	$gender = $_POST['gender'];
	$status = $_POST['status'];
	$email = $_POST['email'];
	$country = $_POST['country'];
	$city = $_POST['city'];
	$p_address = $_POST['p_address'];
	$pw1 = $_POST['pw1'];
	$pw2 = $_POST['pw2'];
	$num = $_POST['numOfChild'];
	$pref_gen = $_POST['pref_gender'];
	if($pw1===$pw2){
		$sql = 'INSERT INTO sponsor SET Sponsor_FirstName="'. $fname . '", Sponsor_MiddleName="'. $mname . '", Sponsor_Surname="'. $lname . '", Sponsor_Birthday="'. $yr . '-'.$mon.'-'.$day.'", Sponsor_Gender="'. $gender . '", Sponsor_EmailAddress="'. $email . '",  Sponsor_AddressCountry="'. $country . '", Sponsor_AddressCity="'. $city . '", Sponsor_AddressPostal="'. $p_address.'", Sponsor_CivilStatus="'. $status . '", Sponsor_Password="'. $pw1 . '"';
		if (!mysqli_query($link, $sql))
		{
		echo "Error adding submitted form for sponsor: " . mysqli_error($link);
		exit();
		}
		$sql = 'INSERT INTO user SET user_type_id=1, username = "'. $email . '", password = "'. $pw1 . '"';
		if (!mysqli_query($link, $sql))
		{
		echo "Error adding submitted form for sponsorship: " . mysqli_error($link);
		exit();
		}
		header('Location: .');
		exit();
	}
	header('Location: .');
		exit();


	/*$id = 'SELECT Sponsor_ID FROM sponsor WHERE Sponsor_FirstName="'. $fname . '", Sponsor_MiddleName="'. $mname . '", Sponsor_Surname="'. $lname . '"';
	$sql = 'INSERT INTO sponsorship SET Sponsor_ID='$id', ';*/
}
	

ob_end_flush();
?>