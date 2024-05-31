<?php
    require 'server/data.php';
    require 'component/html.php';
?>
        <link rel="stylesheet" href="reg_style.css">
        <title>Вход</title>
    </head>
    <body>
        <div class="exit">
            <a href="index.php">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>
        <div class="container">
            <div class="reg">
                <form action="server/reg_action.php" method="post">
                    <h2>Registration</h2>
                    <input class="empty" type="text" name="name" placeholder="Имя" required>
                    <input class="empty" type="text" name="login" placeholder="Логин" required>
                    <input class="empty" type="password" name="password" placeholder="Пароль" required>
                    <button>Sign up</button>
                </form>
            </div>
            <div class="auth">
                <form action="server/auth_action.php" method="post">
                    <h2>Authorization</h2>
                    <input class="empty" type="text" name="login" placeholder="Логин" required>
                    <input class="empty" type="password" name="password" placeholder="Пароль" required>
                    <button>Sign in</button>
                </form>
            </div>
            <div class="pole right">
                <div class="include">
                    <h1 class="a1">Добро Пожаловать</h1>
                    <span class="bb1"><button class="b1">Sign in</button></span>
                    <span class="bb1"><button class="b2 hidden">Sign up</button></span>
                </div>
            </div>
        </div>
        <script src="js/main.js"></script> 
    </body>
</html>