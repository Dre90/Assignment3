<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = '';

	// connect with mysqli API
	$db_server = new mysqli($host, $user, $pass, $db);

	// see if it is succesfull
	if ($db_server -> connect_error)
		die('Connection failed with mysqli API:' . $db_server -> connect_error);

	// create the database
	$query = 'CREATE DATABASE IF NOT EXISTS assignment3_db';
	$db_server->query($query) or die('Query failed:' . $db_server->error);

	// create the user and grant creditentials
	$query = "GRANT ALL ON assignment3_db.* TO 'assignment3_admin'@'localhost' IDENTIFIED BY 'assignment3_admin'";
	$db_server->query($query) or die('Query failed:' . $db_server->error);

	// close the connection
	$db_server->close();
 ?>
