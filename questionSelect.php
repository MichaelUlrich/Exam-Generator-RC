<!DOCTYPE HTML>
<html>
<?php 
include 'teacherHeader.php'; 
$name = "mike";
//$selectedQuestions = array('questions' => $_POST[


?>
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
			var add = document.getElementById("selected");
			//add.innerHTML = myVar;
			var node = document.createElement("P");
			var textnode = document.createTextNode(myVar);
			node.appendChild(textnode);
			add.appendChild(node);
			
		} else {
			//document.getElementById("text").innerHTML = "Removed Question";
			add.innerHTML = "";
		}
	}

/*	function moveText(recvVar) {
		var checkBox = document.getElementById("quesCheck");
		if(checkBox.checked == true) {
			var node = document.createElement("LI");
			var textNode = document.createTextNode("test");
			node.appendChild(textNode);
			document.getElemeentById("selected").appendChild(node);
		}
	}
*/
</script>
<body>
	<h2> Choose Questions to Add to the Test </h2>
	<div class="row">
		<div class="column" style="background-color:#fff;">
			<h2> Selected Questions </h2>
			<p id="selected"></p>
		</div>
		<div class="column" style="background-color:#bbb;">
			<h2> Availabe Questions </h2>
			<!-- Increase number dynamically -->
			<!-- https://stackoverflow.com/questions/13330202/how-to-create-list-of-checkboxes-dynamically-with-javascript-->
			<form method="get"> <!-- GET just for testing, will be POST in submitted project -->
				<input type="checkbox" id="quesCheck" name="question1"  value=<?php echo $name; ?> onclick="moveText('<?php echo $name; ?>');">Question #1: <?php echo $name; ?><br><br>
				<input type="checkbox" id="quesCheck2" name="question2" value=<?php echo $name; ?> onclick="moveText('test2')">Question #2: <?php echo $name; ?><br><br>
				<input type="submit">
			</form>
		<!--	<button type="button" onClick= > Submit Selected </button> -->
		</div>
	</div>
</body>
</html>
