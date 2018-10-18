<!DOCTYPE HTML>
<//?php include 'teacherHeader.php' ?>
<?php
	$ch = curl_init("")
	

?>
<head>
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
	function ajaxRequest(buttonId, textArea, grade) {
	}

</script>
<html>
	<h2> Edit Grades and Comments </h2>
	<div class = "row">
		<div class="column" style="background-color:#fff">
			<h2> Comments/Grade Edits </h2>
			<form>
				<textarea name="comment1" id="comment1" rows="2" cols="30" placeholder="Add comment here"></textarea> <br>
					<input type="text" name="newGrade1" id="newGrade1" placeholder="Add new grade here"> <br> <br>
					<button onlclick="ajaxRequest(this, 'comment1', 'newGrade1')">Submit Comment and Grade</button><br><br>

				<textarea name="comment2" id ="comment1" rows="2" cols="30" placeholder="Add comment here"></textarea><br>
				                <input type="text" name="newGrade2" id="newGrade2" placeholder="Add new grade here"><br><br>
						<button onlclick="ajaxRequest(this, 'comment2', 'newGrade2')">Submit Comment and Grade</button><br<br>>				
			</form>
		</div>
		<div class="column" style="background-color:#bbb">
			<h2> Student Answer </h2>
			<h3> Student Output </h3>
			<h3> Correct Output </h3>
			<h4> Student Grade  </h4>
		</div>
	</div>
</html>
