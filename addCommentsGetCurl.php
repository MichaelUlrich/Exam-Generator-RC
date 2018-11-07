<?php
// TODO: PHP file to get auto-grader comments for review
  $ch = curl_init(/*"https://web.njit.edu/~bkw2/getExam.php"*/);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    echo json_encod($result);
?>
