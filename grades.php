<!DOCTYPE HTML>
<?php include 'studentHeader.php' ?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		* { box-sizing: border-box:}
		.row { display: flex; }
		.column { 
			flex: 50%;
			padding: 10px
		}
	</style>
	<script>	
		function goToHomepage() {
			window.location.href="https://web.njit.edu/~meu3/CS490/Exam-Generator/studentHomepage.php";
		}
	</script>
</head>
	<div id="banner">
		<button id="homepageButton" name="homepageButton" onclick="goToHomepage()">Return to Homepage</button>
	</div>
	<h2>Grades and Comments</h2>
	<div class="row">
		<div class="column" style="background-color:#98FB98">
			<h2>Student Answer</h2>
			<h3>Comment: </h3>
		</div>
		<div class="column" style="background-color:#bbb">
			<h2>Correct Answer</h2>
		</div>
	</div>
	<h2>Score: </h2>
</html>
