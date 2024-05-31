<?php
    require "data.php";
    $user = $_SESSION['User']['User_id'];
    $product = $_POST['product'];
    $count = $_POST['count'];
    $price = $_POST['price'];
    $add_busket_query = mysqli_query($link,"SELECT * FROM `Basket` WHERE `User_id` = '$user' AND `Product_id` = '$product'");
    if(mysqli_num_rows($add_busket_query) > 0) {
    $update = mysqli_query($link,"UPDATE `Basket` SET `Basket_count`='$count' + `Basket_count`,`Basket_price`='$price' * `Basket_count` WHERE `User_id` = '$user' AND `Product_id` = '$product'");
    header('location: ../catalog_page.php');
    } else{
    $insert = mysqli_query($link,"INSERT INTO `Basket`(`User_id`,`Product_id`,`Basket_count`,`Basket_price`) VALUES ('$user','$product','$count','$price'*'$count')");
    header('location: ../catalog_page.php');
    }
?>