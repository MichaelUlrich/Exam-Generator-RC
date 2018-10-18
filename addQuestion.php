<!DOCTYPE HTML>
<html>
<?php 
	$var = array('question' => $_POST['question'], 'answer' => $_POST['answer'], 'type' => $_POST['type'], 'difficulty' => $_POST['difficulty']);
	$ch = curl_init("https://web.njit.edu/~bkw2/addQuestions.php");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $var);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$result = curl_exec($ch);
	echo $result;	

?>
<!--<script>
	var = curlResult = "<?php echo $result; ?>" ;
	document.getElementById('result').innerHTML = "HELLO";

</script> -->
<title> Add Question to Database </title>
<head>
<!-- Resize to fit screen dynamically -->
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<style>
	* { box-sizing: border-box; }
	.row { display: flex; }
	.column {
		flex: 50%;
		padding: 10px;
	}
</style>
</head>
<body>
<script>
       // var = curlResult = "<?php echo $result; ?>" ;
	function moveText() {
		//document.getElementById("result").innerHTML = "HELLO";
	}
	function goToHomepage() {
		window.location.href="teacherHomepage.php";
	}
</script>
	<button onclick="goToHomepage()">Go To Homepage</button>
	<h2> Choose Questions to Add to the Test </h2>
	<div class="row">
		<div class="column" style="background-color:#fff;">
			<h2> Enter Question and Correct Output </h2>
			<form method="post">
				<p> Enter Question: </p>
					<input type="text" name="question" id="question" required><br>
				<p> Enter Correct Answer </p>
					<input type="text" name="answer" id="answer" required><br>
				<p> Select Question Difficulty </p>
				<select name="difficulty" id="difficulty">
					<option value="easy">Easy</option>
					<option value="medium">Medium</option>
					<option value="hard">Hard</option>
				</select>
				<p> Select Question Type </p>
				<select name="type" id="type">
					<option value="loop">Loop</option>
					<option value="function">Function</option>
					<option value="variable">Variable</option>
				</select>
				<input type="submit" name="submit" onclick="moveText()">
			</form>
		</div>
		<div class="column" style="background-color:#bbb;">
			<h2> Added Questions </h2>
			<p> SAMPLE TEXT </p>
			<p> HAVE QUESTIONS APPEAR OVER HERE AFTER BEING ADDED </p>
			<p id="result"></p>
		</div>
	</div>

</body>
</html>


