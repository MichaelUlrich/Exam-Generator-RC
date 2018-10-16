<!DOCTYPE HTML>
<html>
<?php include 'teacherHeader.php'; ?>
<title> Edit Test </title>
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
<script>
	function moveText(myVar) {
	var checkBox = document.getElementById("quesCheck");
		if(checkBox.checked == true) {
			document.getElementById("text").innerHTML = myVar; //"hello world <br>";
		} else {
			document.getElementById("text").innerHTML = "";
		}
	}
</script>
<body>
	<h2> Choose Questions to Add to the Test </h2>
	<div class="row">
		<div class="column" style="background-color:#fff;">
			<h2> Selected Questions </h2>
			<p> Make selected Questions appear over here</p>
			<p id="text"> </p>
		</div>
		<div class="column" style="background-color:#bbb;">
			<h2> Availabe Questions </h2>
			<!-- Increase number dynamically -->
			<!-- https://stackoverflow.com/questions/13330202/how-to-create-list-of-checkboxes-dynamically-with-javascript-->
			<form method="get">
				<input type="checkbox" id="quesCheck" name="question1" value='var' onclick="moveText('temp text')">Question # 1<br><br>
				<input type="checkbox" id="quesCheck2" onclick="moveText()">Question # 2<br><br>
				<input type="submit">
			</form>
		<!--	<button type="button" onClick= > Submit Selected </button> -->
		</div>
	</div>
</body>
</html>
