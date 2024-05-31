<?php
    require "server/data.php";
    require "component/html.php";
    if(!($_SESSION['User']['User_admin'] == '1')){
        header('location: index.php');
        exit;
    }
    $category = mysqli_query($link,"SELECT * FROM `Category` WHERE 1");
    $product = mysqli_query($link,"SELECT * FROM `Product` WHERE 1");
?>
        <link rel="stylesheet" href="admin_style.css">
        <title>Панель Администратора</title>
    </head>
    <body>
<?php
    require "component/header.php";
?>
        <div class="container">
            <div class="add_products">
                <form action="server/product_action.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="product" id="product" placeholder="Product" required><br>
                    <input type="text" name="price" id="price" placeholder="Price" required><br>
                    <textarea type="text" name="description" id="description" placeholder="Description" required></textarea><br>
                    <input class="file" type="file" name="file" id="file" placeholder="File"  required style="border:none"><br>
                    <select name="category" required>
                        <option value="" selected></option>
                        <?php foreach($category as $value) {?>
                            <option  value="<?=$value['Category_id']?>"><?=$value['Category_name']?></option>
                        <?php }?>
                    </select><br>
                    <button>Добавить</button>
                </form>
            </div>
        </div>
    </body>
</html>