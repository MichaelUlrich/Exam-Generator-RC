<?php
	/* Header to include in all Teacher HTML&PHP files to ensure only an instructor can access test creation*/
	session_start();
	if(!isset($_SESSION['teacher'])) {
		echo "You are not a teacher";
	} else {
		echo "Teacher, OK";
	}

?>
