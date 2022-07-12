<?php
 if (isset($_POST["submit"])) {
    $name = $_POST["fullname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pass = $_POST["password"];
    $passagain = $_POST["passwordagain"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInptSignup($name,$email,$username,$pass,$passagain) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    
    if (invalidUsername($username) !== false) {
        header("location: ../signup.php?error=invalidusername");
        exit();
    }
    
    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pass,$passagain) !== false) {
        header("location: ../signup.php?error=passdontmatch");
        exit();
    }

    if (userExist($conn,$username,$email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();  
    }

    createUser($conn,$name,$email,$username,$pass,$passagain);
    

 }else{
    header("location: ../signup.php");
    exit();
 }