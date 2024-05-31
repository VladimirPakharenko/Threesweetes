<?php
    require "server/data.php";
    require "component/html.php";
    $products_vs = mysqli_query($link, "SELECT * FROM  `Product` INNER JOIN `Category` ON `Product`.`Category_id` = `Category`.`Category_id` WHERE 1");
    $category = mysqli_query($link,"SELECT * FROM `Category` WHERE 1");
?>
        <link rel="stylesheet" href="catalog_style.css">
        <title>Каталог</title>
    </head>
    <body>
<?php
    require "component/header.php";
?>
        <div class="container">
            <?php foreach($category as $value){ $value1 = $value['Category_id'];?>
            <div class="wrapper1">
                <div class="category">
                    <span style="font-size:58px;font-weight:900;"><?=$value['Category_name']?></span>
                </div>
                <?php $product = mysqli_query($link,"SELECT * FROM `Product` WHERE `Category_id` = '$value1'");?>
                <div class="catalog">
                    <?php foreach($product as $prod){?>
                    <a href="items.php?id=<?=$prod['Product_id']?>">
                        <div class="cat" style="text-align:center;background-image: url(img/<?=$prod['Product_picture']?>);background-size: cover;background-repeat: no-repeat;background-position: center;height:200px;width:300px;margin:10px;">
                            <p style="background-color:rgba(187, 91, 12, 0.5);;font-weight:800;font-size:32px"><?=$prod['Product_name']?></p>       
                        </div>
                    </a>
                    <?php }?>
                </div>
            </div>
            <?php }?>
        </div>
    </body>
</html>