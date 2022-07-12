<?php

function emptyInptSignup($name,$email,$username,$pass,$passagain){
    $result;

    if (empty($name) || empty($email) || empty($username) || empty($pass) || empty($passagain)) {
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function invalidUsername($username){
    $result;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function invalidEmail($email){
    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function pwdMatch($pass,$passagain){
    $result;

    if ($pass !== $passagain) {
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}



function userExist($conn,$username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData=mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {

        return $row;
        

    }else{
       
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);

}

function     createUser($conn,$name,$email,$username,$pass){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, userPwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    $hashedPwd = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();

}

function emptyInputLogin($username,$pass){
    $result;

    if (empty($username) || empty($pass)) {
        $result = true;
    }else{
        $result = false;
    }

    return $result;
}

function loginUser($conn,$username,$pass){
    $uidExists = userExist($conn,$username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wrongusername");
        exit();
    }

    $hash = $uidExists["userPwd"];
      

     if (password_verify($pass,$hash)){
        session_start();
        $_SESSION["userid"] = $uidExists["usersID"];
        $_SESSION["useruid"] = $uidExists["usersUid"];

        
        header("location: ../helloworld.php");
        
        exit();

        
    }else{
        

        header("location: ../login.php?error=wrongpass");
        
        exit();
    }
}       