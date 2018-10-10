<!DOCTYPE HTML>
<title> CS Testing </title>
<head>
	<?php include 'studentHeader.php'; ?> <!-- Test if student is logged in -->
	<!-- Resize webpade dynamically -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<style>
		* { box-sizing: border-box:
		} .row { 	display: flex;
		} .column { 	flex: 50%; /*Split page in half*/
				padding: 1%;		
		}
	</style>
</head>
<html>
	<h2> Carefully read each question. Good Luck. </h2>
		<p> Only click submit when you code is 100% finished </p>
	<div class ="row">
		<div class ="column" style="background-color:#fff;">
			<form method="post" action="test.php" /*PHP file to submit student answer*/ >
				<textarea name="studentCode" id='studentCode' rows="25" cols="125" placeholder="Write Your Code Here" required></textarea> <!-- Large text box for students code -->
				<br>
				<input type="submit">
			</form>
		</div>
		<div class="column" style="background-color:#bbb;">
			<h2> Question # </h2>
			<!-- Need to load next question after submiting -->
			<p> SAMPLE TEXT </p>
		</div>
	</div>
	<?php
		$var = array('code' => $_POST['studentCode']);
		$ch = curl_init("https://web.njit.edu/~bkw2/grader.php");
		curl_setopt($ch, CURLOPT_POST, true);                                   //Set to POST
		curl_setopt($ch, CURLOPT_POSTFIELDS, $var);       //Send array
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                         //Receive results of cURL and store in var instead of printing
		$result = curl_exec($ch);

		echo 'result:' .  $result . "<br>"; //Testing echo 
	//	echo $_POST['studentCode']; //Testing
	//	echo $var;
	?>
</html>	
