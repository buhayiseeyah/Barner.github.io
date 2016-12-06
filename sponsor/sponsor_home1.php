<?php
ob_start();
include '../opendb.php';

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


$result = mysqli_query($link, 'SELECT * FROM kid');
if (!$result)
{
 $error = 'Error fetching kids from database!';
 include 'error.html.php';
 exit();
}
while ($row = mysqli_fetch_array($result))
{
 $kids[] = array('fname' => $row['Kid_FirstName'], 'mname' => $row['Kid_MiddleName'],  'lname' => $row['Kid_Surname'],  'k_age' => $row['Kid_Age'], 'k_gender' => $row['Kid_Gender'], 'g_lvl' => $row['Kid_GradeLevel'], 'k_country' => $row['Kid_AddressCountry'],  'k_city' => $row['Kid_AddressCity'],  'k_postal' => $row['Kid_AddressPostal'],  'isSponsored' => $row['Kid_Sponsored'],  'bio' => $row['Kid_Bio']);
}

include 'sponsor_home.php';
exit();
ob_end_flush();
?>