<!DOCTYPE HTML>
<?php
	$ch = curl_init("https://web.njit.edu/~bkw2/getExam.php");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);

	//echo $result;
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		* { box-sizing: border-box:
		} .row { display: flex;
		} .column { 
			flex: 50%
			padding: 1%;
		}
	</style>
<script>
	function submitQuestion(textAreaId, buttonId, printSubmitId) {
		var arr = <?php echo json_encode($result); ?>;
		var buttonValue = document.getElementById(buttonId.id).value;
		var varValueInt = parseInt(buttonValue, 10);
		var jsonData = JSON.parse(arr);
		
		var xmlhObj = new XMLHttpRequest();

		var phpFile = "graderCurl.php";
		var studentCode = document.getElementById(textAreaId).value;

//		document.getElementById("questionNumber4").innerHTML


		var url = "studentCode="+studentCode+"&answer="+jsonData[varValueInt].answer;
		


		xmlhObj.open("POST", phpFile, true);
		xmlhObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhObj.onreadystatechange = function() {
			if(xmlhObj.readyState == 4 && xmlhObj.status == 200) {
				var return_data = xmlhObj.responseText;
				document.getElementById(printSubmitId).innerHTML = return_data;
			}
		}
		xmlhObj.send(url);
		document.getElementById(printSubmitId).innerHTML = "Awaiting Submit...";
	}
	function displayQuestions() {
			var arr = <?php echo json_encode($result); ?>;
			var jsonData = JSON.parse(arr);
			document.getElementById("questionNumber1").innerHTML = "#1 " + jsonData[0].question;
			document.getElementById("questionNumber2").innerHTML = "#2 " +jsonData[1].question;
			document.getElementById("questionNumber3").innerHTML = "#3 " +jsonData[2].question;
			document.getElementById("questionNumber4").innerHTML = "#4 " +jsonData[3].question;

	}
	/*function enableTab(id) {
		var textArea = document.getElementById(id);
		textArea.onkeydown=function(e) {
			if(e.keycode === 9) { //Tab pressed
				var textValue = this.value, textStart = this.selectionStart, textEnd = this.selectionEnd;

				this.value = textValue.substring(0, textStart) + '\t' +	textValue.substring(textEnd);
				this.selectionStart = this.selectionEnd = textStart + 1;

				return false;
			}
		};
	}*/
	//window.onload.enableTab('studentCode'); //Calls function
	window.onload = displayQuestions;
</script>
</head>
<body>
	<h2> Carefully read each question. Hit Submit for Each Question.  Good Luck. </h2>
		<p> Only click submit when you code is 100% finished </p>
	<div class="row">
		<div class="column" style="background-color:#fff;">
			<textarea id="studentCode1" rows="25" cols="125" placeholder="Write your code here - Question 1" required></textarea><br>
				<p id="isSubmit1"></p>
				<button id="button1" value="0" onclick="submitQuestion('studentCode1', this, 'isSubmit1')"> Submit# 1</button><br>
			<textarea id="studentCode2" rows="25" cols="125" placeholder="Write your code here - Question 2" required></textarea><br>
				<p id="isSubmit2"></p>
				<button id="button2" value="1" onclick="submitQuestion('studentCode2', this, 'isSubmit2')"> Submit #2</button><br>
			<textarea id="studentCode3" rows="25" cols="125" placeholder="Write your code here - Question 3" required></textarea><br>
			        <p id="isSubmit3"></p>
				<button id="button3" value="2" onclick="submitQuestion('studentCode3', this ,'isSubmit3')"> Submit #3</button><br>
		</div>
		<div class="column" style="background-color:#bbb;">
			<p id="questionNumber1">#1</p>
			<p id="questionNumber2">#2</p>
			<p id="questionNumber3">#3</p>
			<p id="questionNumber4">#4</p>
		</div>
	</div>
	
</body>
</html>
