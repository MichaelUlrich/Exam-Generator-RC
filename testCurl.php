<?php
	// TODO: PHP file to send student input for grading
	$testData = array('question' => $_POST['question'], 'username' => $_POST['usrname']);
				/*	'loopType' => $_POST['loopType'], 'difficulty' => $_POST['diff'],
					'points' => $_POST['points'], 'testCases' => $_POST['testCases'],
					'functionName' => $_POST['functionName'], 'variableNames' => $_POST['variableNames'],
					'returnPrint' => $_POST['returnPrint'], 'studentInput' => $_POST['studentInput']);*/
	$ch = curl_init("https://web.njit.edu/~bkw2/grader.php");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $testData);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);

	echo $result;
?>
