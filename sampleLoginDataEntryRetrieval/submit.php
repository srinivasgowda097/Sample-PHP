<?php
   if (filter_input (INPUT_COOKIE, 'auth') == "1") 
    { 
       $mysqli = mysqli_connect("localhost", "AGENT", "dangerzone", "REMAX");
       $prop_id = filter_input(INPUT_POST, 'sub_ID');
       $prop_add = filter_input(INPUT_POST, 'sub_add');
       $prop_sqr = filter_input(INPUT_POST, 'sub_sqr');
       $prop_dist = filter_input(INPUT_POST, 'sub_dist');
       
       $sql = "INSERT INTO PROPERTIES VALUES('".$prop_id."', '".$prop_add."', '".$prop_sqr."', '".$prop_dist."');";
       $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
       if (mysqli_num_rows($result) == 0) 
        {
            $contentblock = "Data submitted.";
        } 
       else
        {
            $contentblock = "An error has occured. Please enter a unique ID.";
        }
    }
   else
   {
       $contentblock = "An error has occured. Please login.";
   }
?>
<?php include 'header.php'; ?>
<?php echo "$contentblock"; ?>
<?php include 'footer.php'; ?>