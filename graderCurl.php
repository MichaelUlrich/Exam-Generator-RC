<?php
	$testData = array('studentCode' => $_POST['studentCode'], 'answer' => $_POST['answer']);
	//echo $_POST['studentCode'];
	//echo $_POST['answer'];
	$ch = curl_init("https://web.njit.edu/~bkw2/grader.php");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $testData);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$result = curl_exec($ch);

	echo $result;
?>
