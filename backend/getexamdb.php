<?php
include("laare.php");

$return_arr = array();

$fetch = mysqli_query($conn,"SELECT * FROM Test");

while ($row = mysqli_fetch_array($fetch)) {
        $row_array['question'] = $row['question'];
        $row_array['answer'] = $row['answer'];
        $row_array['type'] = $row['type'];
        $row_array['difficulty'] = $row['difficulty'];
        array_push($return_arr,$row_array);
}
echo json_encode($return_arr);
?>
~      
