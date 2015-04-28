<?php

$record = filter_input(INPUT_POST, 'recordType');
$display_block = " ".$record;
$mysqli = mysqli_connect("localhost", "cs213user", "letmein", "okcollege");

if($record == 'honor') {
    $sql = "select * from students where grade_average >= 85.00;";
    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    $display_block = "True";
    if (mysqli_num_rows($result) == 0) { 
        header("Location: queryStudentInfo.html");
        exit;
    }
    else {
        
        $display_block = "<h2>Dean's Honor List</h2>"
                . "<table border='1'><thead>"
                . "<tr><th>Student Name</th><th>Student ID</th><th>Grade Average</th><th>Credits Completed</th></tr>"
                . "</thead><tbody>";
        while($get = mysqli_fetch_assoc($result))
                {
                    $stu_name = $get[student_name];
                    $stu_id = $get[student_id];
                    $grade = $get[grade_average];
                    $credit = $get[credits_completed];
                    $display_block = $display_block."<tr><td> ".$stu_name." </td><td> ".$stu_id." </td><td> ".$grade." </td><td> ".$credit." </td></tr>";
                }
        $display_block = $display_block."</tbody></table>"; 
    }
}

if($record == 'degree') {
    $sql = "select * from students where grade_average >= 60.00 and credits_completed = 120;";
    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    $display_block = "True";
    if (mysqli_num_rows($result) == 0) { 
        header("Location: queryStudentInfo.html");
        exit;
    }
    else {
        
        $display_block = "<h2>Degree Completetion List</h2>"
                . "<table border='1'><thead>"
                . "<tr><th>Student Name</th><th>Student ID</th><th>Grade Average</th><th>Credits Completed</th></tr>"
                . "</thead><tbody>";
        while($get = mysqli_fetch_assoc($result))
                {
                    $stu_name = $get[student_name];
                    $stu_id = $get[student_id];
                    $grade = $get[grade_average];
                    $credit = $get[credits_completed];
                    $display_block = $display_block."<tr><td> ".$stu_name." </td><td> ".$stu_id." </td><td> ".$grade." </td><td> ".$credit." </td></tr>";
                }
        $display_block = $display_block."</tbody></table>"; 
    }
}
if($record == 'degreeHonor') {
    $sql = "select * from students where grade_average >= 85.00 and credits_completed = 120;";
    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    $display_block = "True";
    if (mysqli_num_rows($result) == 0) { 
        header("Location: queryStudentInfo.html");
        exit;
    }
    else {
        
        $display_block = "<h2>Degree Completion Honor List</h2>"
                . "<table border='1'><thead>"
                . "<tr><th>Student Name</th><th>Student ID</th><th>Grade Average</th><th>Credits Completed</th></tr>"
                . "</thead><tbody>";
        while($get = mysqli_fetch_assoc($result))
                {
                    $stu_name = $get[student_name];
                    $stu_id = $get[student_id];
                    $grade = $get[grade_average];
                    $credit = $get[credits_completed];
                    $display_block = $display_block."<tr><td> ".$stu_name." </td><td> ".$stu_id." </td><td> ".$grade." </td><td> ".$credit." </td></tr>";
                }
        $display_block = $display_block."</tbody></table>";   
    }
}
?>
<html>
    <head> 
        <title>Student Info</title>
        <style>
            table, th, td { border: 1px solid black; color: blue; } 
        </style>
    </head>
    <body>
        <?php 
        echo "$display_block"; ?>
    </body>
</html>
