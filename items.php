<?php
    require "server/data.php";
    require "component/html.php";
    $id = $_GET['id'];
    $item = mysqli_query($link,"SELECT * FROM `Product` INNER JOIN `Category` ON `Product`.`Category_id` = `Category`.`Category_id` WHERE `Product_id` = '$id'");
    foreach($item as $rer){
        $ter1 = $rer['Category_name'];
        $ter2 = $rer['Product_name'];
        $ter = $ter1.' '.$ter2;
    }
?>
        <title><?=$ter?></title>
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
            }.count{
                height:100px;
                display:flex;
                align-items:center;
            }
            .count{
                margin-top:20px;
                display: flex;
                flex-direction: column;
                height:100px;
                width:100%;
                justify-content:space-around;
            }
            #plus, #minus, #count{
                width:45px;
                height:45px;
                background:none;
                border:none;
                font-size:18px;
                color:#aa650b;
                border: 4px solid #794809;
                border-radius:50%;
                overflow-y:hidden;
                text-align:center;
            }
            .count > div{
                width:50%;
                display:flex;
                justify-content:space-around;
            }
            .click{
                height:45px;
                width:200px;
                border:none;
                background:none;
                border:4px solid #794809;
                border-radius:45px;
                font-size:18px;
                color:#aa650b;
            }
            .click:hover{
                background:#FFFDD0 ;
                color: #794809;
            }
            #plus:hover, #minus:hover, #count:hover{
                background:#FFFDD0 ;
                color: #794809;
            }
        </style>
        <div class="container">
            <?php foreach($item as $items) {?>
            <div class="a1">
                <span><?=$items['Product_name']?></span>
            </div> 
            <div class="a2">
                <div>
                    <div class="a2__b1" style="width:450px;height:300px;background-size: cover;background-repeat: no-repeat;background-position: center;background-image: url(img/<?=$items['Product_picture']?>);" class="image"></div>
                    <?php if(isset($_SESSION['User']['User_id'])){?>
                    <form action="server/basket_action.php" method="post" class="count">
                        <div>
                            <input type="hidden" name="product" value="<?=$id?>">
                            <input type="hidden" name="price" value="<?=$items['Product_price']?>">
                            <button type="button" id="plus" name="plus">+</button>
                            <input type="text" value="1" id="count" name="count" readonly></input>
                            <button type="button" id="minus" name="minus">-</button>
                        </div>
                        <div>
                            <button type="" class="click">Добавить в корзину</button>
                        </div>
                    </form>
                    <?php }?>
                </div>
                <div>
                    <div class="a2__b2">
                        <span><?=$items['Product_description']?></span>
                    </div> 
                    <div class="a2__b2">
                        <span>Цена за штуку:</span>
                        <span><?=$items['Product_price']?> рублей</span>
                    </div> 
                </div>
            </div>
            <?php } ?>
        </div>
        <script>
            const allplus = Array.from(document.querySelectorAll('#plus'))
            const allminus = Array.from(document.querySelectorAll('#minus'))
            const allcount = Array.from(document.querySelectorAll('#count'))
            allplus.forEach((el,index) => el.addEventListener('click', () =>{
                allcount[index].value++
            }))
            allminus.forEach((el,index) => el.addEventListener('click', () =>{
            if(allcount[index].value > 1) allcount[index].value--
            }))
        </script>
    </body>
<html>