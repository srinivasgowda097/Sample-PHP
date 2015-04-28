<?php
   if (filter_input (INPUT_COOKIE, 'auth') == "1") 
    { 
       $mysqli = mysqli_connect("localhost", "AGENT", "dangerzone", "REMAX");
       $src_tour = filter_input(INPUT_POST, search_tour);
       
       $sql = "SELECT L.PROPERTY_ID, P.ADDRESS FROM LISTINGS L, PROPERTIES P WHERE L.PROPERTY_ID = P.ID AND L.TOUR_ID = '".$src_tour."';";
       
       $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
       if (mysqli_num_rows($result) > 0) 
        {
           $contentblock = "<p>Properties on tour ".$src_tour."</p>"
                   . "<table id='tourTable'><thead><tr><th>Property ID</th><th>Address</th></tr></thead><tbody>";
           while($get = mysqli_fetch_assoc($result)) {
               $p_id = $get[PROPERTY_ID];
               $p_add = $get[ADDRESS];
               $contentblock = $contentblock."<tr><td>".$p_id."</td><td>".$p_add."</td></tr>";
            } 
             $contentblock = $contentblock."</tbody></table>";
        } 
       else
        {
            $contentblock = "<p>No data found for tour ".$src_tour."</p>";
        }
    }
   else
   {
       $contentblock = '<p>Error: please login.</p>';
   }
?>
<?php include 'header.php'; ?>
<?php echo "$contentblock"; ?>
<?php include 'footer.php'; ?>