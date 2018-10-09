<!DOCTYPE HTML>
<!-- Homepage for teachers to create tests and make comments on test -->
<HTML>
<?php include 'teacherHeader.php'; ?>  <!-- Header to prevent a non-logged in teacher from
accessing -->
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1"> <!--Dynamic Sizing-->
<style>
	.block {
		display: block;
		width: 25%;
		border: 2px solid #000;
		background-color: #00FFFF;
		color: black;
		padding: 10px 10px;
		font-size: 16px;
		cursor: pointer;
		text-align: center;
		margin: 0 auto;
        float:left;
	}
	.block:hover {
		background-color: #000;
		color: white;
	} 
</style>
</head>
<body>
	<h2> Temporary Teacher Homepage </h2>
	<button class="block" onclick="window.location.href='https://web.njit.edu/~meu3/CS490/Exam-Generator/questionSelect.php'"> Question Selection </button> 
	<button class="block" onclick="window.location.href='https://web.njit.edu/~meu3/CS490/Exam-Generator/addQuestion.php'"> Add Questions </button> 
	<button class="block" onclick="window.location.href='https://web.njit.edu/~meu3/CS490/Exam-Generator/test.php'"> View Test </button> 
	<button class="block" onclick="window.location.href='https://web.njit.edu/~meu3/CS490/Exam-Generator/makeComments.php'"> Review Grades and Comments </button> 
</body>
</HTML>
