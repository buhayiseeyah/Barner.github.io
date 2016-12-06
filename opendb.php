<?php
	
//set-up linking to mysql
$link = mysqli_connect('localhost', 'root', '');

//if null linking, output linking failure
if (!$link)
{
	echo 'Unable to connect to the database server.';
	exit();
}

//Check if same encoding with utf8 (unicode transformation format)
if (!mysqli_set_charset($link, 'utf8'))//all possible characters
{
	echo 'Unable to set database connection encoding.';
	exit();
}

//Check if database exists
if (!mysqli_select_db($link, 'barner'))
{
	echo 'Unable to locate the database.';
	exit();
}

?>
