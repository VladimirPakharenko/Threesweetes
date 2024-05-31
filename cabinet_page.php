<?php
    require "server/data.php";
    require "component/html.php";
    $id = $_SESSION['User']['User_id'];
    $user = mysqli_query($link, "SELECT * FROM `User` WHERE `User_id` = '$id' ");
    $fetch = mysqli_fetch_assoc($user);
    if(isset($_POST['password'])) {
        if(($_POST['password']) === $fetch['User_password']){
            $error = true;
        }
        else {
            $error = null;
        }
    }
    if(isset($_POST['newPassword'])){
        $newPassword = $_POST['newPassword'];
        $update = mysqli_query($link,"UPDATE `User` SET `User_password`='$newPassword' WHERE `User_id` = '$id'");
    }
?>
        <title>Личный кабинет</title>
    </head>
    <body>
<?php
    require "component/header.php";
?>      
        <style>
            .container{
                width: 85%;
                margin: 0 auto;
                display:flex;
                flex-direction:column;
            }
            .modal{
                position:absolute;
                top:50%;
                left:50%;
                transform:translate(-50%,-50%);
                border:3px solid #794809;
                border-radius:30px;
                background:none;
                width:450px;
                height:300px;
            }
            .modal form{
                position:absolute;
                top:50%;
                left:50%;
                transform:translate(-50%,-50%);
            }
            .container__text{
                color:#aa650b;
                font-family: 'adigiana', sans-serif;
                font-size:36px;
            }
            .btn{
                cursor: pointer;
                border:3px solid #794809;
                padding: 5px;
                border-radius:30px;
                background:none;
            }
            .txt{
                border:3px solid #794809;
                border-radius:30px;
                background:none;
                font-size:26px;
                width:250px;
                text-align:center;
            }
        </style>
        <div class="container">
            <?php foreach($user as $users) {?>
                <div><span class="container__text">Имя: <?=$users['User_name']?></span></div>
                <div><span class="container__text">Логин: <?=$users['User_login']?></span></div>
                <div>
                    <?php if(isset($error)) {?>
                        <form action="cabinet_page.php" method="post">
                            <span class="container__text">Пароль:</span>
                            <input class="container__text txt" type="password" id="passsword" value="" placeholder="Введите новый пароль" name="newPassword"><br>
                            <button class="container__text btn">Смена пароля</button><br>
                        </form>
                    <?php } else {?>
                        <span class="container__text">Пароль:</span>
                        <input class="container__text txt" type="password" id="passsword" value="********" disabled><br>
                        <button class="container__text btn" id="update">Сменить пароль</button>
                    <?php } ?>
                </div>     
            <?php } ?>
        </div>

        <div class="modal hidden">
            <form action="cabinet_page.php" method="post">
                <div><span class="container__text">Введите старый пароль:</span></div>
                <div><input class="container__text txt" type="password" name="password"></div>
                <div><button class="container__text btn">Сравнить пароли</button></div>
            </form>
        </div>

        <script>
            const updateButton = document.querySelector('#update')
            const moodal = document.querySelector('.modal')
            updateButton.addEventListener('click', ()=>{
                alerts();
            })
            function alerts()
            {
                if (confirm("Вы уверены что хотите сменить пароль"))
                {
                    moodal.classList.toggle('hidden')
                }
            }
        </script>
    </body>
</html>