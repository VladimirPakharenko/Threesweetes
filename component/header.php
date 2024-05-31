    <style>
        @font-face{
            font-family:'adigiana';
            src: url(fonts/Adigiana\ Ultra.ttf);
        }
        @font-face{
            font-family:'deledda';
            src: url(fonts/Deledda\ Closed\ Light.ttf);
        }
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .hidden{
            display: none;
        }
        html,body{
            width: 100%;
            display: flex;
        }
        body::before
        {
            content: '';
            position:fixed;
            left: 0; right: 0;
            top: 0; bottom: 0;
            z-index: -1;
            background: url(img/back-image.jpg);
            filter: blur(5px);
            filter: alpha(Opacity=6);
            opacity: 0.25;
        }
        .menu{
            position: fixed;
            top:50px;
            left:-80px;
            width: 250px;
            height: 250px;
            display:flex;
            justify-content:center;
            align-items:center;
            z-index: 2;
        }
        .toggle{
            position: relative;
            width: 60px;
            height: 60px;
            border-radius:50%;
            display:flex;
            justify-content:center;
            align-items:center;
            transition:0.7s;
            background-color:#FFFDD0;
        }
        .menu.active .toggle{
            transform:rotate(360deg);
        }
        .menu li{
            left:0px;
            position:absolute;
            list-style: none;
            transition:0.5s;
            transform: rotate(calc(360deg/8 * var(--i)));
            transform-origin:120px;
            scale:0;
            transition-delay:calc(0.05s * var(--i));
            background-color:#FFFDD0;
            border-radius:50%;
        }
        .menu li a{
            position: relative;
            display:flex;
            transform: rotate(calc(360deg/-8 * var(--i)));
            width: 60px;
            height: 60px;
            border-radius:50%;
            font-size:1em;
            justify-content:center;
            align-items:center;
            box-shadow:0px 0px 10px rgba(0,0,0,0.4);
        }
        .menu li a i{
            color:black;
        }
        .menu.active li{
            scale:1;
        }
        .menu li:hover a{
            font-size:2em;
        }
        i{
            font-size:28px;
            color:black;
        }
        a{
            text-decoration:none;
        }
    </style>
    <div class="menu">

        <div class="toggle">
            <a href="#" class="">
                <svg fill="#000000" height="30px" width="30px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 58      58"    xml:space="preserve">
                    <g>
                        <path d="M54.319,37.839C54.762,35.918,55,33.96,55,32c0-9.095-4.631-17.377-12.389-22.153c-0.473-0.29-1.087-0.143-1.376,0.327c-0.29,0.471-0.143,1.086,0.327,1.376C48.724,15.96,53,23.604,53,32c0,1.726-0.2,3.451-0.573,5.147C51.966,37.051,51.489,37,51,37c-3.86,0-7,3.141-7,7s3.14,7,7,7s7-3.141,7-7C58,41.341,56.509,39.024,54.319,37.839z"/>
                        <path d="M38.171,54.182C35.256,55.388,32.171,56,29,56c-6.385,0-12.527-2.575-17.017-7.092C13.229,47.643,14,45.911,14,44c0-3.859-3.14-7-7-7s-7,3.141-7,7s3.14,7,7,7c1.226,0,2.378-0.319,3.381-0.875C15.26,55.136,21.994,58,29,58c3.435,0,6.778-0.663,9.936-1.971c0.51-0.211,0.753-0.796,0.542-1.307C39.267,54.213,38.681,53.971,38.171,54.182z"/>
                        <path d="M4,31.213c0.024,0.002,0.048,0.003,0.071,0.003c0.521,0,0.959-0.402,0.997-0.93c0.712-10.089,7.586-18.52,17.22-21.314C23.142,11.874,25.825,14,29,14c3.86,0,7-3.141,7-7s-3.14-7-7-7c-3.851,0-6.985,3.127-6.999,6.975C11.42,9.922,3.851,19.12,3.073,30.146C3.034,30.696,3.449,31.175,4,31.213z"/>
                    </g>
                </svg>
            </a>
        </div>

        <li style="display:none;" style="--i:0;--clr:bisque"></li>
        <li style="display:none;" style="--i:1;--clr:bisque"></li>

        <li style="--i:2;--clr:bisque">
            <?php if(!isset($_SESSION['User']['User_id'])){ ?>
            <a href="reg_page.php"><i class="fa-regular fa-user"></i></a>
            <?php }?>
            <?php if(isset($_SESSION['User']['User_id'])){ ?>
            <a href="server/exit.php"><i class="fa-solid fa-door-open"></i></a>
            <?php }?>
        </li>
        <li style="--i:3;--clr:bisque">
            <a href="catalog_page.php"><i class="fa-solid fa-list"></i></a>
        </li>
        <li style="--i:4;--clr:bisque">
            <a href="index.php"><i class="fa-regular fa-address-card"></i></a>
        </li>
        <li style="--i:5;--clr:bisque">
            <?php if(!isset($_SESSION['User']['User_id'])){?>
            <a href="reg_page.php"><i class="fa-solid fa-basket-shopping"></i></a>
            <?php }?>
            <?php if(isset($_SESSION['User']['User_id'])){?>
            <a href="basket_page.php"><i class="fa-solid fa-basket-shopping"></i></a>
            <?php }?>
        </li>
        <li style="--i:6;--clr:bisque">
            <?php if(isset($_SESSION['User']['User_admin'])){?>
            <a href="admin_page.php"><i class="fa-solid fa-user-secret"></i></a>
            <?php }?>
            <?php if(!isset($_SESSION['User']['User_id'])){?>
            <a href="reg_page.php"><i class="fa-solid fa-laptop"></i></a>
            <?php }?>
            <?php if(isset($_SESSION['User']['User_id'])&&!isset($_SESSION['User']['User_admin'])){?>
            <a href="cabinet_page.php"><i class="fa-solid fa-laptop"></i></a>
            <?php }?>
        </li>

        <li style="display:none;" style="--i:7;--clr:bisque"></li>

    </div>
    <script>
        let rotate = document.querySelector('.toggle');
        let menu = document.querySelector('.menu');
        rotate.onclick = function(){
            menu.classList.toggle("active");
        }
    </script>