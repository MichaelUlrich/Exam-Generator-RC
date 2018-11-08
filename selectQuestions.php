<!DOCTYPE HTML>
<?php include 'teacherHeader.php'; ?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Select Questions</title>
<head>
<style>
	*{box-sizing: border-box;}
	.row{display: flex;}
	.column{flex: 50%; padding: 10px}
	//table,td{border: 1px solid grey;}
	table{border-spacing: 0; border: 1px solid grey}
	td,th{text-align: left; padding: 16px;}
	tr:nth-child(even){background-color: #bbb;}
	//th{left; padding: 16px;background-color: #f2f2f2; border: 1px solid grey}
</style>
<script>
	//document.getElementById("test").innerHTML = sample;
	function ajaxRequest(questionId) {
		var xmhlObj = new XMLHttpRequest();
		var phpFile = 'selectQuestionsCurl.php';
		var question = sample[questionId].question;
		var type = sample[questionId].type;
		var loopType = "TEMP_LOOP_TYPE";
		var diff = sample[questionId].diff;
		var points = sample[questionId].points;
		var testCases = "TEMP_TEST_CASE";
		var functionName = "TEMP_FUNC_NAME";
		var varNames = "TEMP_VAR_NAME";
		var returnPrint = "TEMP_PRINT_VAL";
		var url = "question="+question+"&type="+type+"&loopType="+loopType+"&diff="+diff+"&points="+points+"&testCases="+testCases
							+"&functionName="+functionName+"&variableNames="+varNames+"&returnPrint="+returnPrint; //For AJAX POST
		xmhlObj.open("POST", phpFile, true);
		xmhlObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Sending URL encoded variables
		xmhlObj.onreadystatechange = function() {
		if(xmhlObj.readyState == 4 && xmhlObj.status == 200) {  //Conection is established and working
			var return_data = xmhlObj.responseText;
			}
		}
		xmhlObj.send(url); //Send request
	}
	function drawAvailableTable(sample) {
		var table = document.getElementById("questionTableBody");
		table.innerHTML="";
		document.getElementById("test").innerHTML = sample;
		var parseSample = JSON.parse(sample); //Need for response from AJAX cURL */
//		document.getElementById("test").innerHTML = parseSameple;
		for(var i in parseSample) {
			var iInt = parseInt(i, 10);
			iInt += 1;
		//	document.getElementById("test").innerHTML = "total questions: "+iInt;
			var tr = document.createElement("tr");

			var idTd = document.createElement("td");
			var idText = document.createTextNode(iInt);
			idTd.appendChild(idText);

			var questionTd = document.createElement("td");
			var questionText = document.createTextNode(parseSample[i].question);
			questionTd.appendChild(questionText);

			var typeTd = document.createElement("td");
			var typeText = document.createTextNode(parseSample[i].type);
			typeTd.appendChild(typeText);

			var diffTd = document.createElement("td");
			var diffText =  document.createTextNode(parseSample[i].difficulty);
			diffTd.appendChild(diffText);

			var pointsTd =  document.createElement("td");
			var pointsText = document.createTextNode(parseSample[i].points);
			pointsTd.appendChild(pointsText);

			var constrainTd = document.createElement("td");
			var constrainText = document.createTextNode(parseSample[i].loopType);
			constrainTd.appendChild(constrainText);

			var returnPrintTd = document.createElement("td");
			var returnPrintText = document.createTextNode(parseSample[i].returnPrint);
			returnPrintTd.appendChild(returnPrintText);

			var selectTd = document.createElement("td");
			selectTd.innerHTML = '<div class="text-center" ><input type="button" value="Select" onClick="addQuestion('+i+')" id="question_to_add_'+i+'"></div>';

			tr.appendChild(idTd);
			tr.appendChild(questionTd);
			tr.appendChild(typeTd);
			tr.appendChild(diffTd);
			tr.appendChild(pointsTd);
			tr.appendChild(constrainTd);
			tr.appendChild(returnPrintTd);
			tr.appendChild(selectTd);
			table.appendChild(tr);
		}
	}
	function sortTable(callingObj, column) {
		/* column = 0 -> ID
		   column = 1 -> Question
		   column = 2 -> Type
		   column = 3 -> LoopType
		   column = 4 -> Difficulty
		   column = 5 -> points
		   column = 8 -> return
		*/
		//document.getElementById("test").innerHTML =
		var input = document.getElementById(callingObj.id);
		//document.getElementById("test").innerHTML = callingObj.id;
		var inputCaps = input.value.toUpperCase();
		var table = document.getElementById("questionTable");
		var tr = table.getElementsByTagName("tr");
		var td;
		var i;

		document.getElementById("test").innerHTML = inputCaps;

		for(i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[column];
			if(td) {
				if(td.innerHTML.toUpperCase().indexOf(inputCaps) > -1) {
					tr[i].style.display="";
				} else {
					tr[i].style.display="none";
				}
			}
		}
	}
	function addQuestion(questionId) {
		//document.getElementById("test").innerHTML = questionId;
		ajaxRequest(questionId);
		var question = sample[questionId].question;
		var type = sample[questionId].type;
		var diff = sample[questionId].diff;
		var points =sample[questionId].points;
		var node = document.createElement("li");
		var textNode = document.createTextNode('[Question: '+ question+ ' ] | [Type: ' + type + '] | [Difficulty: ' + diff + '] | [Points: '+ points + ']');

	//	document.getElementById("test").innerHTML = textNode;

		node.appendChild(textNode);
		document.getElementById('selectedQuestions').appendChild(node);
		//ajaxRequest(questionId);
	}
	function getAjaxRequest() {
	//	document.getElementById("test").innerHTML = "func called";
		var xmhlObj = new XMLHttpRequest();
		var phpFile = "selectQuestionsGetCurl.php";
		var return_data;
		xmhlObj.open("POST", phpFile, true);
		xmhlObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Sending URL encoded variables
		xmhlObj.onreadystatechange = function() {
			if(xmhlObj.readyState == 4 && xmhlObj.status == 200) {  //Conection is established and working
				return_data = xmhlObj.responseText;
				drawAvailableTable(return_data);
			}
		}
		xmhlObj.send();
	}
	function goToHomepage() {
		window.location.href="https://web.njit.edu/~meu3/CS490/Exam-Generator-RC/teacherHomepage.php";
	}
	window.onload = getAjaxRequest;
</script>
</head>
<body>
	<button onClick="goToHomepage()">Return to Homepage</button>
	<h1> Chooose Questions to Add to the Test </h1>
	<div class="row">
		<div class="column" style="background-color:#bbb;">
			<h2> Selected Questions </h2>
			<p id="test2"></p>
			<ul id="selectedQuestions"></ul>
		</div>
		<div class="column" style="background-color:#fff;">
			<h2> Available Questions </h2>
			<p id="test"></p>
				<p>Sort Options:
				<input type="text" id="keywordSelect" onkeyup="sortTable(this, 1)"placeholder="Search by word...">
				<select id="typeSelect"  onChange="sortTable(this, 2)">
					<option value="" disabled selected>Type</option>
				        <option value="method">Method</option>
					<option value="loop">Loop</option>
					<option value="variable">Variable</option>
				</select>
				<select id="diffSelect"  onChange="sortTable(this, 3)">
					<option value"" disabled selected>Difficulty</option>
					<option value="easy">Easy </option>
					<option value="medium">Medium</option>
					<option value="hard">Hard</option>
				</select>
				<select id="ConstraintSelect"  onChange="sortTable(this, 5)">
					<option value"" disabled selected>Constraint</option>
					<option value="none">None</option>
					<option value="for">For-Loop</option>
					<option value="while">While-Loop</option>
					<option value="recursion">Recursion</option>
				</select>
				<select id="returnPrintSelect"  onChange="sortTable(this, 6)">
					<option value"" disabled selected>Return/Print</option>
					<option value="return">Return</option>
					<option value="print">Print</option>
				</select>
				</p>
			<table id="questionTable">
				<thead>
				<tr>
					<th>ID</th>
					<th>Question</th>
					<th>Type</th>
					<th>Difficulty</th>
					<th>Points</th>
					<th>Constraint</th>
					<th>Return/Print</th>
				</tr>
				</thead>
				<tbody id="questionTableBody">
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
