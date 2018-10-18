<!DOCTYPE HTML>
<?php
	$ch = curl_init("https://web.njit.edu/~bkw2/fetchQuestions.php");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
?>
<html>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<style>
	* {box-sizing: border-box;}
	.row {display: flex;}
	.column {
		flex: 50%;
		padding: 10px;
	}
</style>
<script>
	function moveText(myVar) {
		//Empty TODO
	}
	function AjaxRequest(myVar) {
		var x = document.getElementById(myVar.id).value;	
		var arr = <?php echo json_encode($result); ?>;
		var varValueInt = parseInt(x, 10);
		var jsonData = JSON.parse(arr);

		document.getElementById("test").innerHTML = jsonData[varValueInt].question;

		var xmlhObj = new XMLHttpRequest();
		var phpFile = "examDbCurl.php";
		var question = jsonData[varValueInt].question;
		var answer = jsonData[varValueInt].answer;
		var type = jsonData[varValueInt].type;
		var difficulty = jsonData[varValueInt].difficulty;
		var url = "question="+question+"&answer="+answer+"&type="+type+"&difficulty="+difficulty;
		
		xmlhObj.open("POST", phpFile, true);
		xmlhObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhObj.onreadystatechange = function() {
			if(xmlhObj.readyState == 4 && xmlhObj.status == 200) {
				var return_data = xmlhObj.responseText;
				document.getElementById("f").innerHTML = return_data;
			}
		}
		xmlhObj.send(url);
		document.getElementById("f").innerHTML = "waiting for confirmation";
	}	
	function createButtons() {
		
	}
</script>
</head>
<body>
	<h1> Choose Questions to Add to the Test </h1>
	<div class = "row">
		<div class="column" style="background-color:#fff;">
			<h2> Selected Questions</h2>
			<p id="test">test1</p>
			<p id="f">test2</p>
		</div>
		<div class="column" style="background-color:#bbb;">
			<h2> Available Questions </h2>
				<button id="button1" value="0" onclick="AjaxRequest(this)">Select1</button><br>
				<button id="button2" value="1" onclick="AjaxRequest(this)">Select2</button><br>
		</div>
	</div>
</body>
</html>
