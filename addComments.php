<!DOCTYPE HTML>
<?php include 'teacherHeader.php'; ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	*{box-sizing: border-box;}
	.row{display: flex;}
	.column{flex: 50%; padding: 10px}
	.inline{display:inline-block;}
	//table,td{border: 1px solid grey;}
	table{border-spacing: 0; border: 1px solid grey}
	td,th{text-align: left; padding: 16px;}
	tr:nth-child(even){background-color: #bbb;}
	//th{left; padding: 16px;background-color: #f2f2f2; border: 1px solid grey}
</style>
<script>
var sample = [{"studentInput":"input", "autoComments":"Missing Function name, Wrong Return Type", "grade":"100", "maxGrade": "100"},
					{"studentInput":"input2", "autoComments":"autoComment2", "grade":"100", "maxGrade": "100"},
					{"studentInput":"input3", "autoComments":"autoComment3", "grade":"100", "maxGrade": "100"},
					{"studentInput":"input4", "autoComments":"autoComment4", "grade":"100", "maxGrade": "100"},
					{"studentInput":"input5", "autoComments":"autoComment5", "grade":"100", "maxGrade": "100"}];
var STUDENT_INPUT = ""
function drawAutoComments() {
		var inputTd, idTd, idText, inputText, commentTd, commentText,
					gradeTd, gradeText, tr, tableBody, intI, editTd, editText,
					confirmTd, confirmText, publishDiv, studentDiv;
		tableBody = document.getElementById("tableBody");
		tableBody.innerHTML =""
		for(var i in sample) {
			intI = parseInt(i, 10);
			//document.getElementById("test").innerHTML = i;
			tr = document.createElement("tr");
			idTd = document.createElement("td");
			idText = document.createTextNode(intI+1);
			idTd.appendChild(idText);
			inputTd = document.createElement("td");
			inputText = document.createTextNode(sample[i].studentInput);
			inputTd.appendChild(inputText);
			commentTd = document.createElement("td");
			commentText = document.createTextNode(sample[i].autoComments);
			commentTd.appendChild(commentText);
			gradeTd = document.createElement("td");
			gradeText = document.createTextNode(sample[i].grade+'/'+sample[i].maxGrade);
			gradeTd.appendChild(gradeText);
			editTd = document.createElement("td");
			editTd.innerHTML = '<div class="text-center" ><input type="button" value="Edit" onClick="drawTeacherInput('+i+')" id="'+i+'"></div>';
			confirmTd = document.createElement("td");
			confirmTd.innerHTML = '<div class="text-center" ><input type="button" value="Confirm" onClick="confirmChange('+i+')" id=""></div>';
			tr.appendChild(idTd);
			tr.appendChild(inputTd);
			tr.appendChild(commentTd);
			tr.appendChild(gradeTd);
			tr.appendChild(editTd);
			tr.appendChild(confirmTd);
			tableBody.appendChild(tr);
		}
		// Publish to public DB for student to view
		publishDiv = document.createElement("div");
		studentDiv = document.getElementById("studentInput");
		publishDiv.innerHTML = '<button>Publish Grades</button>';
		studentDiv.appendChild(publishDiv);
	}
function ajaxGetRequest(student) {
	/* TODO: Get grades from db
		Get UCID -> cURL graded DB w/UCID -> return&print
	*/
	//var studentId = document.getElementById(student.id);
	var phpFile = "addCommentsGetCurl.php";
	var xmhlObj = new XMLHttpRequest();
	//studentId = studentId.value; //ID to send to db, pull Answers w/ matching UCID
	var url = "username="+student;
	xmhlObj.open("POST", phpFile, true);
	xmhlObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Sending URL encoded variables
	xmhlObj.onreadystatechange = function() {
	if(xmhlObj.readyState == 4 && xmhlObj.status == 200) {  //Conection is established and working
		STUDENT_INPUT = xmhlObj.responseText; //Returns student input for specific UCID
		}
	}
	xmhlObj.send(url);
	drawAutoComments();
}
function drawTeacherInput(currQuestion) {
		var teacherDiv = document.getElementById("teacherInput");
		var commentDiv = document.getElementById("commentEdit");
		var gradeDiv = document.getElementById("gradeEdit");
		var buttonDiv = document.getElementById("buttonEdit");
		var codeDiv = document.getElementById("codeView");
		var comment = sample[currQuestion].autoComments;
		var	grade = sample[currQuestion].grade;
		var	code = sample[currQuestion].studentInput;


	//	var editComment = document.createElement("textarea"),
	//			editGrade = document.createElement("input");
	//	var commentText = document.createTextNode(comment);
	//	var buttonTd = document.createElement("button");
	//	var buttonText = document.createTextNode("Save Edit");

	//buttonTd.setAttribute("onClick", "edit("+currQuestion+")");
	commentDiv.innerHTML = '<h3>Edit Comment</h3><textarea id="commentEditText" maxlength="5000" cols="45" rows="10">'+comment+'</textarea><br>';
	codeDiv.innerHTML = '<h3>Student\'s Code</h3><textarea readonly id="codeText" maxlength="5000" cols="45" rows="10">'+code+'</textarea><br>';
	gradeDiv.innerHTML ='<h3>Edit Grade</h3><input type="text" id="gradeEditText" value="'+grade+'"></input><br><br>';
	buttonDiv.innerHTML='<button onClick="edit('+currQuestion+')">Submit Edit</button>';
	//buttonTd.appendChild(buttonText);
	//teacherDiv.appendChild(buttonTd);
}
function edit(currQuestion) {
	var teacherComment = document.getElementById("commentEditText").value;
	var teacherGrade = document.getElementById("gradeEditText").value;

	sample[currQuestion].autoComments = teacherComment;
	sample[currQuestion].grade = teacherGrade;
	drawAutoComments();
	//document.getElementById("test").innerHTML = "edited: " + teacherComment +'/' + teacherGrade;//sample[currQuestion].autoComments;
}
function confirmChange(callingId) {
	// TODO: Ajax send grades to db
	var comment = "", grade = "", maxGrade = "", studentInput = "", url = "",
			xmhlObj = new XMLHttpRequest(), phpFile = "";
		phpFile = "addCommentsCurl.php";
		comment = sample[callingId].autoComments;
		grade = sample[callingId].grade;
		maxGrade = sample[callingId].maxGrade;
		studentInput = sample[callingId].studentInput;
 		url = "comment="+comment+"&grade="+grade+"&maxGrade="+maxGrade+"&studentInput="+studentInput;
		xmhlObj.open("POST", phpFile, true);
		xmhlObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Sending URL encoded variables
		xmhlObj.onreadystatechange = function() {
		if(xmhlObj.readyState == 4 && xmhlObj.status == 200) {  //Conection is established and working
			var return_data = xmhlObj.responseText;
			document.getElementById("testing").innerHTML = return_data;
			}
		}
		xmhlObj.send(url); //Send request
		//document.getElementById("testing").innerHTML = url;
}
function goToHomepage() {
	window.location.href="https://web.njit.edu/~meu3/CS490/Exam-Generator-RC/teacherHomepage.php";
}
function getStudents() {
	// TODO: cURL to get student usernames -> return JSON of usernames
	var students = "";
	var phpFile = "addCommentsGetUsers.php";
	var xmhlObj = new XMLHttpRequest();
/*	xmhlObj.open("POST", phpFile, true);
	xmhlObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Sending URL encoded variables
	xmhlObj.onreadystatechange = function() {
	if(xmhlObj.readyState == 4 && xmhlObj.status == 200) {  //Conection is established and working
			return xmhlObj.responseText; //Returns UCIDs
		}
	}
	xmhlObj.send();	*/
	return [{"username":"meu3"}, {"username":"bk95"}]; //Testing variable
}
function drawStudentSelect() {
	var studentArr = getStudents();
	var optionText = '<option value="" disabled selected>Select Student\'s Test to Edit</option>';//= "<option value\"\" disabled selected>Select Student</option>";
	var selectDiv = document.getElementById("studentSelect");
	for(var i = 0; i < studentArr.length; i++) {
		optionText += '<option value="'+studentArr[i].username+'"onChange="ajaxGetRequest('+studentArr[i].username+')">'+studentArr[i].username+'</option>';
	}
	selectDiv.innerHTML = optionText;
}
window.onload = function() {
	drawStudentSelect();
}
</script>
</head>
<body>
	<button onclick="goToHomepage()">Return to Homepage</button>
	<h2> Edit Grades and Comments </h2>
	<div class="row">
		<div class="column" id="teacherInput" style="background-color:#bbb">
				<div class="inline" id="codeView"></div>
				<div class="inline" id="commentEdit"></div>
				<div id="gradeEdit"></div>
				<div id="buttonEdit"></div>
		</div>
		<div class="column" id="studentInput" style="background-color:#fff">
			<!--Dropdown to select student who's test to edit-->
			<select id="studentSelect" onChange="ajaxGetRequest(this)" required>
			</select>
			<p id="testing"></p>
			<table id="studentTable">
				<thead>
					<tr>
							<th>Question #</th>
							<th>Student's Code</th>
							<th>Auto Comments</th>
							<th>Grade</th>
					</tr>
				</thead>
				<tbody id="tableBody"></tbody>
			</table>
		</div>
	</div>

	<!--<p id="test">TEST</p>-->
</body>
</html>
