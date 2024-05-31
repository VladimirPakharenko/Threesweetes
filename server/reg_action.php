<?php
    require "data.php";
    $name = $_POST['name'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = mysqli_query($link,"SELECT * FROM `User` WHERE `User_login` = '$login'");
    $user = mysqli_fetch_assoc($query);
    if(empty($user)){
        $user_query = mysqli_query($link,"INSERT INTO `User`(`User_name`, `User_login`, `User_password`) VALUES ('$name','$login','$password')");
        require "auth_action.php";
    }
    header('location:../index.php');
?>