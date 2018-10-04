<?php
	/* Header to include in all Student HTML&PHP files to ensure a valid student is logged in to access tests and grades */
	session_start();
	if(!isset($_SESSION['student'])) {
		header("Location: https://web.njit.edu/~meu3/CS490/Exam-Generator/login.html");
		die();
	} else { 
		echo "[Student mode is always enabled for testing]" . "<br>";	
	}

?>
