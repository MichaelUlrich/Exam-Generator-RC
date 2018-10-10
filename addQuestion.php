<!DOCTYPE HTML>
<html>
<?php include 'teacherHeader.php'; ?>
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
	<h2> Choose Questions to Add to the Test </h2>
	<div class="row">
		<div class="column" style="background-color:#fff;">
			<h2> Enter Question and Correct Output </h2>
			<form>
				<p> Enter Question: </p>
				<input type="text" name="question"><br>
				<p> Enter Correct Answer </p>
				<input type="text" name="answer"><br>
				<p> Select Question Difficulty </p>
				<select name="difficulty">
					<option value="easy">Easy</option>
					<option value="medium">Medium</option>
					<option value="hard">Hard</option>
				</select>
				<p> Select Question Type </p>
				        <select name="type">
					<option value="loop">Loop</option>
					<option value="function">Function</option>
					<option value="variable">Variable</option>
				</select>

																											
			</form>
		</div>
		<div class="column" style="background-color:#bbb;">
			<h2> Added Questions </h2>
			<p> SAMPLE TEXT </p>
			<p> HAVE QUESTIONS APPEAR OVER HERE AFTER BEING ADDED </p>
		</div>
	</div>
</body>
</html>


