<?php
    if ((!filter_input(INPUT_POST, 'ID')) || (!filter_input(INPUT_POST, 'PASSWORD')))
    {
        header("Location: index.php");
        exit;
    }
    $mysqli = mysqli_connect("localhost", "AGENT", "dangerzone", "REMAX");
    $uid = filter_input(INPUT_POST, 'ID');
    $passwd = filter_input(INPUT_POST, 'PASSWORD');
    $sql = "SELECT ID, F_NAME, L_NAME FROM AGENTS WHERE ID = '".$uid."' AND PASSWORD = '".$passwd."' ";
    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
    if (mysqli_num_rows($result) == 1) 
    {
        session_start();
        $info = mysqli_fetch_assoc($result);
        $uid = $info['ID'];
        $fname = $info['f_name'];
        $lname = $info['l_name'];
        $username = $fname." ".$lname;
        $_SESSION['id'] = $uid;
        setcookie("auth", "1", time()+60*30, "/", "", 0);
        header("Location: index.php");
    } 
    else 
    {
        header("Location: index.php");
        exit;
    }
?>
<html>
    <head></head>
    <body></body>
</html>