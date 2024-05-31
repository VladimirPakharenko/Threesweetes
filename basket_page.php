<?php
    require "server/data.php";
    require "component/html.php";
?>
        <title>Моя корзина</title>
    </head>
    <body>
<?php
    require "component/header.php";
?>
            <style>
            html,
            body{
                width: 100%;
                display:flex;
            }
            .container{
                padding: 10px;
                width:80%;
                height:100vh;
                margin:0 auto;
                display: flex;
                flex-direction:column;
            }
            .a1{
                text-align:center;
                font-family: 'adigiana', sans-serif;
                color: #aa650b;
                font-size:48px;
            }
            .a2{
                display:flex;
            }
            .a2 > * {
                margin: 10px;
            }
            .a2__b2{
                font-size:32px;
                font-family:deledda;
                color:#794809;
                font-weight:700;
            }
            .a2__b1{
                outline:4px solid #794809;
                border-radius:20px;
                width:450px;
                height:300px;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;  
            }
        </style>
<?php 
    $id = $_SESSION['User']['User_id'];
    $item = mysqli_query($link,"SELECT * FROM `Basket` INNER JOIN `Product` ON `Basket`.`Product_id` = `Product`.`Product_id` WHERE `User_id` = '$id'");
?>
        <div class="container">
            <?php foreach($item as $items) {?>
            <div class="a1">
                <span><?=$items['Product_name']?></span>
            </div> 
            <div class="a2">
                <div>
                    <div class="a2__b1" style= "background-image: url(img/<?=$items['Product_picture']?>);" class="image"></div>
                </div>
                <div>
                    <div class="a2__b2">
                        <span><?=$items['Product_description']?></span>
                    </div> 
                    <div class="a2__b2">
                        <span>Колличество:</span>
                        <?php switch($items['Basket_count']){
                            case $items['Basket_count'] == 1:
                        ?>
                            <span><?=$items['Basket_count']?> штука</span>
                        <?php
                            break;
                            case ($items['Basket_count'] > 1 && $items['Basket_count'] < 5):
                        ?>
                            <span><?=$items['Basket_count']?> штуки</span>
                        <?php
                            break;
                            case $items['Basket_count'] != 0:
                        ?>
                        <span><?=$items['Basket_count']?> штук</span>
                        <?php
                            break;
                        }?>
                    </div> 
                    <div class="a2__b2">
                        <span>Цена:</span>
                        <span><?=$items['Basket_price']?> рублей</span>
                    </div> 
                </div>
            </div>
            <?php } ?>
        </div>
    </body>
</html>