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

	/*	
		Loop for number of questions -> create matchign number of buttons -> assign value to buttons -> text displayed on button
		3 question ->3 buttions ->  button[0], button[1], button[2]

	*/
	function drawText() {
		var arr = <?php echo json_encode($result); ?>;
		var jsonData = JSON.parse(arr);
		document.getElementById("question1").innerHTML = jsonData[0].question;
		document.getElementById("question2").innerHTML = jsonData[1].question;
		document.getElementById("question3").innerHTML = jsonData[2].question;	
		document.getElementById("question4").innerHTML = jsonData[3].question;

	//	for(var i = 0; i < jsonData.length; i++) {
	//		var buttonElement = document.createElement("BUTTON");
	//		var text = document.createTextNode("new button"+i);
	//		buttonElement.appendChild(text);
	//		document.body.appendChild(buttonElement);
	//	}
	//
	//	for(var i = 0; i < jsonData.length; i++) 
	//		var text = document.creatElement("P");
	//		var jsonQuestion = document.createTextNode(jsonData[i].question);
	//		text.appendChild(jsonQuestion);
	//		document.getElementById("test").innerHTML = jsonData[0].question;//.appendChild(text);
	//	}
	}
	function moveText(myVar) {
		//Empty TODO
	}
	function AjaxRequest(myVar) {
		var x = document.getElementById(myVar.id).value;	
		var arr = <?php echo json_encode($result); ?>;
		var varValueInt = parseInt(x, 10);
		var jsonData = JSON.parse(arr);
		
		document.getElementById("test").innerHTML = jsonData[varValueInt].question;
		//document.getElementById("question1").innerHTML = jsonData[varValueInt].question;

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
				document.getElementById("test2").innerHTML = return_data;
			}
		}
		xmlhObj.send(url);
		document.getElementById("test2").innerHTML = "waiting for confirmation";
	}	
	function createButtons() {
		//Empty TODO
		for(var i = 0; i < 4; i++) {
			var buttonElement = document.createElement("BUTTON");
			var text = document.createTextNode("new button"+i);
			buttonElement.appendChild(text);
			document.body.appendChild(buttonElement);
		}
	}
	function goToHomepage() {
		window.location.href="https://web.njit.edu/~meu3/CS490/Exam-Generator/teacherHomepage.php";
	}
	function test() {
		document.getElementById("test2").innerHTML = "2-testing function starting";
	}
	window.onload = drawText;
	//window.onload = createButtons;
	//window.onload = drawText;
	//window.onload = test;
</script>
</head>
<body>
	
	<h1> Choose Questions to Add to the Test </h1>
	<div class = "row">
		<div class="column" style="background-color:#fff;">
			<h2> Selected Questions</h2>
			<p id="test"></p>
			<p id="test2"></p>
		</div>
		<div class="column" style="background-color:#bbb;">
			<h2> Available Questions </h2>
				<button id="button1" value="0" onclick="AjaxRequest(this)"><p id="question1"></button>		
				<button id="button2" value="1" onclick="AjaxRequest(this)"><p id="question2"></button>
				<button id="button3" value="2" onclick="AjaxRequest(this)"><p id="question3"></button>
				<button id="button4" value="3" onclick="AjaxRequest(this)"><p id="question4"></button>
				
		</div>
	</div>
	<button id="homepage" onclick="goToHomepage()">Return to Homepage</button>
</body>
</html>
