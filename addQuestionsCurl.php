<?php
	//$echo 'examDbCurl: ' . $_POST['question'];
	$question = array('question' => $_POST['question'], 'type' =>$_POST['type'], 'loopType' => $_POST['loopType'], 'difficulty' => $_POST['diff'], 'points' => $_POST['points'], 'testCases' => $_POST['testCases'], 'functionName' => $_POST['functionName'], 'variableNames' => $_POST['variableNames'], 'returnPrint' => $_POST['returnPrint']);

  echo $question;
	/*$ch = curl_init("");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $question);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$result = curl_exec($ch);
	echo $result;*/
?>
