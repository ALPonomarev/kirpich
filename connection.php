<?php
	$HOST="localhost";
	$USER="root";
	$PASSWORD="";
	$DB="brick";
	
	$connection = mysqli_connect($HOST, $USER, $PASSWORD, $DB) or die(mysqli_error());
	mysqli_query($connection, "SET NAMES utf8");
?>