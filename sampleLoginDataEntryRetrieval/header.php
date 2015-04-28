<?php
    if (filter_input (INPUT_COOKIE, 'auth') == "0") 
    {
        $loginblock = "<div id='contentnav'>Login</div>
            <div id='contentblock'>
                <form method='post' action='login.php'>
                    <div id='loginbox'>
                        user: <br/>
                        <input type='text' name='ID' id='formstyle'/>
                    </div>
                    <div id='loginbox'>
                        pass: <br/>
                        <input type='password' name='PASSWORD' id='formstyle'/>
                    </div>
                    <div id='loginbox'>
                        <br/><input type='submit' name='submit' value='login' id='formstyle'/>
                    </div>
                </form>
            </div>"; 
    }
    else
    {        
        $loginblock = " ";
    }
    
    if (filter_input (INPUT_COOKIE, 'auth') == "1") 
    {
        $naviblock = "<a href='help.php'>Help</a> <a href='logout.php'>Logout</a>";
    }
    else
    {
        $naviblock = "<a href='help.php'>Help</a>";
    }  
?>

<html>
    <head>
        <title>RE/MAX Tour App</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="webstyle.css">
    </head>
    <body>
        <div id="block">
            <div id="logo"><img src="http://i.imgur.com/FJWo8rZ.png" alt="REMAX"/></div>
            <div id="nav">
                <?php echo "$naviblock"; ?> 
            </div>