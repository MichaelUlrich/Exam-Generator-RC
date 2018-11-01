<!DOCTYPE HTML>
<?php include 'studentHeader.php' ?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		* { box-sizing: border-box:}
		.row { display: flex; }
		.column { flex: 50%; padding: 10px}
		//table,td{border: 1px solid grey;}
		table{border-spacing: 0; border: 1px solid grey}
		td,th{text-align: left; padding: 16px;}
		tr:nth-child(even){background-color: #bbb;}
		//th{left; padding: 16px;background-color: #f2f2f2; border: 1px solid grey}
	</style>
	<script>
	var sample = [{"studentInput":"input", "autoComments":"Missing Function name, Wrong Return Type", "grade":"50", "maxGrade":"100"},
						{"studentInput":"input2", "autoComments":"autoComment2", "grade":"90", "maxGrade":"95"},
						{"studentInput":"input3", "autoComments":"autoComment3", "grade":"60", "maxGrade":"100"},
						{"studentInput":"input4", "autoComments":"autoComment4", "grade":"70", "maxGrade":"100"},
						{"studentInput":"input5", "autoComments":"autoComment5", "grade":"0", "maxGrade":"100"}];

	function getGrade() {
		var totalGrade = 0, maxGrade = 0, scaledGrade = 0;
		for(var i in sample) {
			totalGrade += parseInt(sample[i].grade,10);
			maxGrade += parseInt(sample[i].maxGrade,10);
		}
		scaledGrade = totalGrade/maxGrade;
		scaledGrade = scaledGrade * 100;
		scaledGrade = scaledGrade.toFixed(0);
		document.getElementById("studentGrade").innerHTML = scaledGrade + '%';
		//document.getElementById("maxGrade").innerHTML = maxGrade;
	}
	function drawComments() {
		var inputTd, codeIdTd,gradeIdTd, idText, inputText, commentTd, commentText,
					gradeTd, gradeText, commentTr,codeTr, intI; //editTd, editText,
					//confirmTd, confirmText;
		var gradeTableBody = document.getElementById("gradeTableBody");
		var codeTableBody = document.getElementById("codeTableBody");
		//tableBody.innerHTML ="";
		for(var i in sample) {
			//document.getElementById("codeTableBody").innerHTML = "test"
			intI = parseInt(i, 10);
			//document.getElementById("test").innerHTML = i;
			commentTr = document.createElement("tr");
			codeTr = document.createElement("tr");

			gradeIdTd = document.createElement("td");
			gradeIdText = document.createTextNode(intI+1);
			gradeIdTd.appendChild(gradeIdText);

			codeIdTd = document.createElement("td");
			codeIdText = document.createTextNode(intI+1);
			codeIdTd.appendChild(codeIdText);

			inputTd = document.createElement("td");
			inputText = document.createTextNode(sample[i].studentInput);
			inputTd.appendChild(inputText);
			commentTd = document.createElement("td");
			commentText = document.createTextNode(sample[i].autoComments);
			commentTd.appendChild(commentText);
			gradeTd = document.createElement("td");
			gradeText = document.createTextNode(sample[i].grade+'/'+sample[i].maxGrade);
			gradeTd.appendChild(gradeText);
		//	editTd = document.createElement("td");
		//	editTd.innerHTML = '<div class="text-center" ><input type="button" value="Edit" onClick="drawTeacherInput('+i+')" id="'+i+'"></div>';
		//	confirmTd = document.createElement("td");
		//	confirmTd.innerHTML = '<div class="text-center" ><input type="button" value="Confirm" onClick="confirmChange('+i+')" id=""></div>';
			commentTr.appendChild(gradeIdTd);
			commentTr.appendChild(commentTd);
			commentTr.appendChild(gradeTd);
			codeTr.appendChild(codeIdTd);
			codeTr.appendChild(inputTd);
		//	tr.appendChild(editTd);
		//	tr.appendChild(confirmTd);
			codeTableBody.appendChild(codeTr)
			gradeTableBody.appendChild(commentTr);
		}
	}
	function goToHomepage() {
		window.location.href="https://web.njit.edu/~meu3/CS490/Exam-Generator/studentHomepage.php";
	}
	window.onload = function() {
		getGrade();
		drawComments();
	}
	</script>
</head>
	<div id="banner">
		<button id="homepageButton" name="homepageButton" onclick="goToHomepage()">Return to Homepage</button>
	</div>
	<h2>Grades and Comments</h2>
	<div class="row">
		<div class="column" style="background-color:#fff">
			<h2>Student Input</h2>
			<table id="codeTable">
				<thead>
					<th>Question #</th>
					<th>Code</th>
				</thead>
				<tbody = id="codeTableBody"></tbody>
			</table>
		</div>
		<div class="column" style="background-color:#a1">
			<h2>Comments and Points</h2>
			<table id="gradeTable">
				<thead>
					<tr>
							<th>Question #</th>
							<th>Auto Comments</th>
							<th>Grade</th>
					</tr>
				</thead>
				<tbody id="gradeTableBody"></tbody>
			</table>
		</div>
	</div>
	<div>
		<h2>Grade:</h2>
		<h2 id="studentGrade"></h2>
	<div>
</html>
