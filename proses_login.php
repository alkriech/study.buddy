<?php
    session_start();
    $username=$_POST["username"];
    $password=$_POST["password"];

    if($username=="alya" AND $password=="11111"){
        #code
        $_SESSION["username"]=$username;
        header("location:index.php");
    }else{
        header("location:login.php?login_error");
    }
?>