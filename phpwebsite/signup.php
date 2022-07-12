<?php
    include_once 'header.php';
?>
    <link rel = "stylesheet" href="css/signup.css">

    <section class = "signup-form">
        <h2>Sign up</h2>
        <form action = "includes/signup.inc.php" method = "post" class="inputs">
            <input type = "text" name = "fullname" placeholder = "Full name" >
            <input type = "text" name = "email" placeholder = "Email" >
            <input type = "text" name = "username" placeholder = "Username" >
            <input type = "password" name = "password" placeholder = "Password" >
            <input type = "password" name = "passwordagain" placeholder = "Repeat password" >
            <button type = "submit" name = "submit"  >Sign up</button>
        </form> 
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo"<p class = \"massage\">Fill everything</p>";
            }
            else if($_GET["error"] == "invalidusername"){
                echo"<p class = \"massage\">Wrong username</p>";
            }
            else if($_GET["error"] == "invalidemail"){
                echo"<p class = \"massage\">Wrong email</p>";
            }
            else if($_GET["error"] == "passdontmatch"){
                echo"<p class = \"massage\">Passwords doesn't match</p>";
            }
            else if($_GET["error"] == "usernametaken"){
                echo"<p class = \"massage\">Username is already taken</p>";
            }
            else if($_GET["error"] == "stmtfailed"){
                echo"<p class = \"massage\">Something went wrong</p>";
            }
            else if($_GET["error"] == "none"){
                echo"<p class = \"massage\">You have signed up</p>";
            } 
        }   
    ?>
    </section>

   
</body>
</html>