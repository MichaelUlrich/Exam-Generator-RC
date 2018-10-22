<?php
	//$echo 'examDbCurl: ' . $_POST['question'];
	$question = array('question' => $_POST['question'], 'answer' =>$_POST['answer'], 'type' => $_POST['type'], 'difficulty' => $_POST['difficulty']);
	$ch = curl_init("https://web.njit.edu/~bkw2/addExam.php");
	curl_setopt($ch, CURLOPT_POST, true);	
	curl_setopt($ch, CURLOPT_POSTFIELDS, $question);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$result = curl_exec($ch);
	echo $result;
?>				
