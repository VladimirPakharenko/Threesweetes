<?php
    require "data.php";
    $login = $_POST['login'];
    $password  = $_POST['password'];
    $auto_querry = mysqli_query($link, "SELECT * FROM `User` WHERE `User_login` = '$login' AND `User_password` = '$password'");
    if($auto_querry->num_rows>0){
        foreach($auto_querry as $key => $value) {
        $_SESSION['User']['User_id'] = $value['User_id'];
        $_SESSION['User']['User_admin'] = $value['User_admin'];
        header('location:../index.php'); 
    }}
?>