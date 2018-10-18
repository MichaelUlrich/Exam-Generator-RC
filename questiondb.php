
<?php

include("laare.php");

if(!isset($_POST['question']) || !isset($_POST['answer']) || !isset($_POST['type']) ||!isset($_POST['difficulty'])){
       echo 'not set';
       return false;
//} else if((empty($_POST['question']) || empty($_POST['answer']) || empty($_POST['type']) || empty($_POST['difficulty']))
//      echo 'blank';
//      return false;
       } else {
       global $conn;

       $question = $_POST['question'];
       $answer = $_POST['answer'];
       $type = $_POST['type'];
       $difficulty = $_POST['difficulty'];

       echo $question . ' ';
       echo $answer . ' ';
       echo $type . ' ';
       echo $difficulty . ' ';


       $sql = 'INSERT INTO QuestionAnswer(question,answer,type,difficulty) VALUES (?,?,?,?)';
       if (!$stmt = mysqli_prepare($conn, $sql)){
               echo 'failure';
               return false;
       }

       mysqli_stmt_bind_param($stmt,"ssss", $question,$answer,$type,$difficulty);
       mysqli_stmt_execute($stmt);
       mysqli_stmt_close($stmt);
       return true;
}
?>
