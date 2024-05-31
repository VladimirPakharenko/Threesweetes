<?php
    require "data.php";
    $product = $_POST['product'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $file = $_FILES['file'];
    $ext = substr(strrchr($file['name'],"."),1);
    $img = uniqid().'.'.$ext;
    var_dump($img);
    move_uploaded_file($file['tmp_name'], "../img/$img");
    $user_query = mysqli_query($link,"INSERT INTO `Product` (`Product_name`,`Category_id`,`Product_price`,`Product_description`,`Product_picture`) VALUES ('$product','$category','$price','$description','$img')");
    header('location:../admin_page.php');


?>