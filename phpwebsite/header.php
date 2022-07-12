
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" dir= "ltr">
<head>
    <meta charset="UTF-8">
    <title>PHP projekt</title>
    <link rel = "stylesheet" href="css/first.css">
    
</head>
<body>
<nav class = "nav">
        <div class="wrapper" >  
            <ul>
                <li><a href="helloworld.php" >Home</a></li>
                <?php
                    if (isset($_SESSION["useruid"])) {
                        echo "<li><a href='profile.php' >Profile page</a></li>";
                        echo "<li><a href='includes/logout.inc.php' >Log out</a></li>"; 
                    } else{
                        echo "<li><a href='signup.php' >Sign up</a></li>";
                        echo "<li><a href='login.php' >Login</a></li>";
                    }
                ?>  
            </ul>
        </div>
    </nav>