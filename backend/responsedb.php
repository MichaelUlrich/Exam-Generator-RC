<?php

include("laare.php");
 //    echo '1 '.$_POST['studentcode'];
//      echo '2 '.$_POST['studentoutput'];
   //  echo '3 '.$_POST['grade'];
if(!isset($_POST['studentcode']) || !isset($_POST['studentoutput']) || !isset($_POST['grade'])){
       echo 'not set';
       return false;
//} else if((empty($_POST['question']) || empty($_POST['answer']) || empty($_POST['type']) || empty($_POST['difficulty']))
//      echo 'blank';
//      return false;
       } else {
       global $conn;

       $studentcode = $_POST['studentcode'];
       $codeoutput = $_POST['studentoutput'];
       $rawgrade = $_POST['grade'];


//      echo $question . ' ';
//      echo $answer . ' ';
//      echo $type . ' ';
//      echo $difficulty . ' ';


       $sql = 'INSERT INTO Response(studentcode,codeoutput,rawgrade) VALUES (?,?,?)';
       if (!$stmt = mysqli_prepare($conn, $sql)){
               echo 'failure';
               return false;
       }

       mysqli_stmt_bind_param($stmt,"sss", $studentcode,$codeoutput,$rawgrade);
       mysqli_stmt_execute($stmt);
       mysqli_stmt_close($stmt);
       echo 'Graded';
       return true;
}
?>
~
