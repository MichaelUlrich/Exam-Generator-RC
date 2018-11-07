<!DOCTYPE HTML>
<?php include 'studentHeader.php'; ?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	*{box-sizing: border-box;}
	.row{display: flex;}
	.column{flex: 5%; padding: 1%}
</style>
</head>
<script>
	var sample = [  {"id":"0", "question":"question1", "type":"loop", "diff":"hard", "points":"10"},
			{"id":"1", "question":"question2", "type":"method","diff":"easy","points":"15"}
/*			{"id":"2", "question":"question3", "type":"loop", "diff":"medium","points":"25"},
			{"id":"3", "question":"question4", "type":"method", "diff":"easy","points":"5"},
			{"id":"4", "question":"question5", "type":"loop", "diff":"medium","points":"35"},
			{"id":"5", "question":"question6", "type":"loop", "diff":"medium","points":"35"},
			{"id":"6", "question":"question7", "type":"loop", "diff":"medium","points":"35"}
*/
			];

	function drawExam() {
		for(var i in sample) {
			var textElement = document.createElement("textarea");
			var breakElement = document.createElement("br");
			//var submitElement = document.createElement("span");
			var displayElement = document.createElement("span");
			var x = document.getElementById("test");

			var intI = parseInt(i, 10);
			intI += 1; //Question 0 displayed as Question 1
			textElement.setAttribute("name", "question" + intI);
			textElement.setAttribute("placeholder", "Write code here for Question #"+intI+"...");
			textElement.setAttribute("cols", "120");
			textElement.setAttribute("rows", "10");
			//submitElement.innerHTML = '<button id="'+i+'" onclick="submit(this)">Submit Question #'+intI+'</button>';
			displayElement.innerHTML = '<p id=isSubmit'+i+'></p>';

			x.appendChild(textElement);
		//	x.appendChild(submitElement);
			x.appendChild(displayElement);
			x.appendChild(breakElement);
		}
	}
	function submit(/*calling*/) {
		var form = document.getElementById("test");
		var formText = "";
		var i;
		var returnDiv = document.getElementById("returnDiv");
		for(var i = 0; i < form.length; i++) {
			formText = form.elements[i].value; //Testing
			document.getElementById("testing").innerHTML = formText;
			ajaxRequest(formText, i);
		}
		document.getElementById("submitedText").innerHTML = "Your Test has been Submitted"; //Testing
		returnDiv.innerHTML = '<button onclick="goToHomepage()">Return to Homepage</button>';
	}
	function drawQuestions() {
		var questionDiv = document.getElementById("questions");
		//document.getElementById("questions").innerHTML = "QUESTIONS GO HERE";
		for(var i in sample) {
			var questionElement = document.createElement("p")
			var intI = parseInt(i, 10);
			intI+=1;
			//questionElement.setAttribute("data-content", "Question #"+i+": ");  //+sample[i].question);
			questionElement.textContent =  "Question #"+intI+": "+sample[i].question;
			questionDiv.appendChild(questionElement);
		}
	}
	function goToHomepage() {
		window.location.href="https://web.njit.edu/~meu3/CS490/Exam-Generator-RC/studentHomepage.php";
	}
	function ajaxRequest(studentInput, questionId) {
		// TODO: send AJAX to php file
		var xmhlObj = new XMLHttpRequest();
		var phpFile = 'testCurl.php';
	/*	var question = sample[questionId].question;
		var type = sample[questionId].type;
		var loopType = "TEMP_LOOP_TYPE";
		var diff = sample[questionId].diff;
		var points = sample[questionId].points;
		var testCases = "TEMP_TEST_CASE";
		var functionName = "TEMP_FUNC_NAME";
		var varNames = "TEMP_VAR_NAME";
		var returnPrint = "TEMP_PRINT_VAL";*/
		var url = "id="+questionId+"&studentInput="+studentInput;//+"&type="+type+"&loopType="+loopType+"&diff="+diff+"&points="+points+"&testCases="+testCases
						//	+"&functionName="+functionName+"&variableNames="+varNames+"&returnPrint="+returnPrint; //For AJAX POST
		xmhlObj.open("POST", phpFile, true);
		xmhlObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Sending URL encoded variables
		xmhlObj.onreadystatechange = function() {
		if(xmhlObj.readyState == 4 && xmhlObj.status == 200) {  //Conection is established and working
			var return_data = xmhlObj.responseText;
		//	document.getElementById("testing").innerHTML = return_data;
			}
		}
		xmhlObj.send(url); //Send request
		document.getElementById("testing").innerHTML = url;
	}
	window.onload = function() {
		drawExam();
		drawQuestions();
	}
</script>
<body>
	<button onClick="goToHomepage()">REMOVE-Return to Homepage</button>
	<h1> ONLY WANT ONE BUTTON </h1>
	<h2> Carefully read each question. Hit Submit for Each Question.  Good Luck. </h2>
	<p> Only click submit when you code is 100% finished </p>
	<p id="testing"></p>
	<div class="row">
		<div id="testDiv" class="column" style="background-color:#aaa;">
			<form id="test"></form>
			<button onclick="submit()">Submit Test</button>
			<h3 id="submitedText"></h3>
			<div id="returnDiv"></div>
		</div>
		<div class="column" style="background-color:#bbb;">
			<div id="questions">
				<p id="qText"></p>
			</div>
		</div>
	</div>
</body>
</html>
