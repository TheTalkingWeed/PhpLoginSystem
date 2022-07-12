
<?php
    include_once 'header.php';
?>
    <link rel = "stylesheet" href="css/login.css">

    <section class = "login-form">
        <h2>Login up</h2>
        <form action = "includes/login.inc.php" method = "post" class="inputs">
            <input type = "text" name = "username" placeholder = "Username/E-mail" >
            <input type = "password" name = "pwd" placeholder = "Password" >
            <button type = "submit" name = "submit" >Login</button>
        </form> 
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo"<p class = \"massage\">Fill everything</p>";
            }
            else if($_GET["error"] == "wrongusername"){
                echo"<p class = \"massage\">Wrong username</p>";
            }
            else if($_GET["error"] == "wrongpass"){
                echo"<p class = \"massage\">Wrong password</p>";
            }
        
            
        }   
    ?>
    </section>
</body>
</html>