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
	/***********************************************************************/

	var sample = getAjaxRequest();/*
	 [  {"id":"0", "question":"question1", "type":"loop", "diff":"hard", "points":"10", "loopType":"for"},
			{"id":"1", "question":"question2", "type":"method","diff":"easy","points":"15", "loopType":""},
			{"id":"2", "question":"question3", "type":"loop", "diff":"medium","points":"25", "loopType":"while"},
			{"id":"3", "question":"question4", "type":"method", "diff":"easy","points":"5", "loopType":"for"},
			{"id":"5", "question":"question5", "type":"variable", "diff":"medium","points":"35", "loopType":"for"},
			{"id":"6", "question":"question6", "type":"loop", "diff":"medium","points":"45", "loopType":"for"},
			{"id":"7", "question":"question7", "type":"loop", "diff":"hard","points":"5","loopType":"for"},
			{"id":"8", "question":"question8", "type":"method", "diff":"easy","points":"75", "loopType":"for"},
			{"id":"9", "question":"question9", "type":"method", "diff":"hard","points":"65","loopType":"for"},
			{"id":"10", "question":"question10", "type":"variable", "diff":"medium","points":"25","loopType":"for"},
			{"id":"11", "question":"question11", "type":"variable", "diff":"hard","points":"35", "loopType":"for"},
			{"id":"12", "question":"question12", "type":"loop", "diff":"medium","points":"15", "loopType":"for"},
			{"id":"14", "question":"question13", "type":"loop", "diff":"hard","points":"15", "loopType":"for"},
			{"id":"13", "question":"question14", "type":"method", "diff":"easy","points":"35", "loopType":"for"}
	];
	/***********************************************************************/
	document.get
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
			document.getElementById("test2").innerHTML = return_data;
			}
		}
		xmhlObj.send(url); //Send request

	document.getElementById("test2").innerHTML = url;

	}
	function drawAvailableTable() {
		var table = document.getElementById("questionTableBody");
		table.innerHTML="";
/*		var parseSample = JSON.parse(sample); //Need for response from AJAX cURL */
		for(var i in sample) {
			var iInt = parseInt(i, 10);
			iInt += 1;
			document.getElementById("test").innerHTML = "total questions: "+iInt;
			var tr = document.createElement("tr");

			var idTd = document.createElement("td");
			var idText = document.createTextNode(sample[i].id);
			idTd.appendChild(idText);

			var questionTd = document.createElement("td");
			var questionText = document.createTextNode(sample[i].question);
			questionTd.appendChild(questionText);

			var typeTd = document.createElement("td");
			var typeText = document.createTextNode(sample[i].type);
			typeTd.appendChild(typeText);

			var diffTd = document.createElement("td");
			var diffText =  document.createTextNode(sample[i].diff);
			diffTd.appendChild(diffText);

			var pointsTd =  document.createElement("td");
			var pointsText = document.createTextNode(sample[i].points);
			pointsTd.appendChild(pointsText);

			var constrainTd = document.createElement("td");
			var constrainText = document.createTextNode(sample[i].loopType);
			constrainTd.appendChild(constrainText);

			var selectTd = document.createElement("td");
			selectTd.innerHTML = '<div class="text-center" ><input type="button" value="Select" onClick="addQuestion('+i+')" id="question_to_add_'+i+'"></div>';

			tr.appendChild(idTd);
			tr.appendChild(questionTd);
			tr.appendChild(typeTd);
			tr.appendChild(diffTd);
			tr.appendChild(pointsTd);
			tr.appendChild(constrainTd);
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
		var xmhlObj = new XMLHttpRequest();
		var phpFile = 'selectQuestionsGetCurl.php';
		xmhlObj.open("POST", phpFile, true);
		xmhlObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Sending URL encoded variables
		xmhlObj.onreadystatechange = function() {
		if(xmhlObj.readyState == 4 && xmhlObj.status == 200) {  //Conection is established and working
			var return_data = xmhlObj.responseText;
		}
		xmhlObj.send();
		return return_data;
	/*	var test = [  {"id":"0", "question":"question1", "type":"loop", "diff":"hard", "points":"10", "loopType":"for"},
				{"id":"1", "question":"question2", "type":"method","diff":"easy","points":"15", "loopType":""},
				{"id":"2", "question":"question3", "type":"loop", "diff":"medium","points":"25", "loopType":"while"},
				{"id":"3", "question":"question4", "type":"method", "diff":"easy","points":"5", "loopType":"for"},
				{"id":"5", "question":"question5", "type":"variable", "diff":"medium","points":"35", "loopType":"for"},
				{"id":"6", "question":"question6", "type":"loop", "diff":"medium","points":"45", "loopType":"for"},
				{"id":"7", "question":"question7", "type":"loop", "diff":"hard","points":"5","loopType":"for"},
				{"id":"8", "question":"question8", "type":"method", "diff":"easy","points":"75", "loopType":"for"},
				{"id":"9", "question":"question9", "type":"method", "diff":"hard","points":"65","loopType":"for"},
				{"id":"10", "question":"question10", "type":"variable", "diff":"medium","points":"25","loopType":"for"},
				{"id":"11", "question":"question11", "type":"variable", "diff":"hard","points":"35", "loopType":"for"},
				{"id":"12", "question":"question12", "type":"loop", "diff":"medium","points":"15", "loopType":"for"},
				{"id":"14", "question":"question13", "type":"loop", "diff":"hard","points":"15", "loopType":"for"},
				{"id":"13", "question":"question14", "type":"method", "diff":"easy","points":"35", "loopType":"for"}

			];
			return test;

		*/
	}
}
	function goToHomepage() {
		window.location.href="https://web.njit.edu/~meu3/CS490/Exam-Generator-RC/teacherHomepage.php";
	}
	window.onload = drawAvailableTable;
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
					<option value="for">For-Loop</option>
					<option value="medium">Medium</option>
					<option value="hard">Hard</option>
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
				</tr>
				</thead>
				<tbody id="questionTableBody">
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
