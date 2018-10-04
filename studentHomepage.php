<!DOCTYPE HTML>
<!-- Homepage for students to take tests and view grades -->
<HTML>
<?php include 'studentHeader.php'; ?>  <!-- Header to prevent a non-logged in teacher from
accessing -->
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1"> <!--Dynamic Sizing-->
<style>
	.block {
		display: block;
		width: 50%;
		border: 2px solid #000;
		background-color: #98FB98;
		color: black;
		padding: 10px 10px;
		font-size: 16px;
		cursor: pointer;
		text-align: center;
		margin: 0 auto;
	}
	.block:hover {
		background-color: #000;
		color: white;
	}
</style>
</head>
<body>
	<h2> Temporary Student  Homepage </h2>
	
	<button class="block" onclick="window.location.href='https://web.njit.edu/~meu3/CS490/Exam-Generator/test.php'"> Take Test </button> <br>
	<button class="block" onclick="window.location.href='https://web.njit.edu/~meu3/CS490/Exam-Generator/grades.php'"> View Grades and Comments </button> <br>
</body>
</HTML>
