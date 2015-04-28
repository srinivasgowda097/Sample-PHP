<?php
    if (filter_input (INPUT_COOKIE, 'auth') == "1") 
    {
        $submitblock = "<div id='contentnav'>Submit New Property</div>
            <div id='contentblock'>
                <p>
                    <form method='post' action='submit.php'>
                        <p>ID: <br/>
                        <input type='number' name='sub_ID' id='formstyle'/></p>
                        <p>Address: <br/>
                        <input type='text' name='sub_add' id='formstyle'/> </p>
                        <p>Square Footage: <br/>
                        <input type='text' name='sub_sqr' id='formstyle'/> </p>
                        <p>District: <br/>
                        <select name='sub_dist' id='formstyle'>
                            <option value='TEST'>Test District</option>
                        </select></p>
                        <p><input type='submit' name='submit_prop' value='Submit' id='formstyle'/></p>
                    </form>
                </p>
            </div>";
        $searchblock = "<div id='contentnav'>Preview Tour</div>
            <div id='contentblock'> 
                <p>
                    <form method='post' action='tour.php'>
                        <select name='search_tour' id='formstyle'>
                            <option value='1'>Sample Tour 1</option>
                            <option value='2'>Sample Tour 2</option>
                        </select>
                        <p><input type='submit' name='search_dist' value='Search' id='formstyle'/></p>
                    </form>
                </p>
            </div>";
    }
    else
    {
        $contentblock = " ";
    }
?>
<?php include 'header.php'; ?>

<?php echo "$loginblock"; ?>
<?php echo "$submitblock"; ?>
<?php echo "$searchblock"; ?>

<?php include 'footer.php'; ?>