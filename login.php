<?php

	session_start();
//	$_SESSION['teacher'] = "true"; //Testing 
//	$_SESSION['student'] = "true"; //Testing

	$user = array('username' => $_POST['username'], 'password' =>$_POST['password']);
	$middle_url = "https://web.njit.edu/~bkw2/middle_beta.php";				//Receive if login is for student or teacher
	$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $middle_url);                             //Set URL
		curl_setopt($ch, CURLOPT_POST, true);                                   //Set to POST
		curl_setopt($ch, CURLOPT_POSTFIELDS, /*http_build_query*/ $user);       //Send array
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                         //Receive results of cURL and store in var instead of printing
	$result = curl_exec($ch);
	$result_decode=json_decode($result);
	if($result == "\0" || $result == null) {
		echo "Wrong login info.  Try again.";
	} else {
		$resultDecoded = json_decode($result);
		//Result will be JSON stating if login was successful and if Student/Teacher ex.{ teacher/student : true/false }
	}
	if($resultDecoded->{'student'} == "true") {
		$_SESSION['student'] = true;
	//	echo "Student Session <br>";
		header('Location: studentHomepage.php');
		exit;
	} else  if($resultDecoded->{'teacher'} == "true") {
		$_SESSION['teacher'] = true;
	//	echo "Teacher Session <br>";
		header('Locaiton: teacherHomepage.php');
		exit;
	} else {
		header('Location: login.html');
		exit;
	}	
	curl_close($ch);
?>
