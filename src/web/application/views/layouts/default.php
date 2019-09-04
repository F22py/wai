<!DOCTYPE html>
<html lang="pl">
<head>
    <base href="../" />
    <title><?php echo $title; ?></title>
    <meta charset="utf-8" />
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    <link href="../public/css/style.css" rel="stylesheet">
    <link href="../public/css/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/js/jquery-ui.min.js"></script>
</head>

<body>
<div class="wrapper">
    <header class="header">
        <strong>F1 FAN SITE</strong>
        <nav>
            <ul class="menu">
                <li><a href="/">Głowna</a></li>
                <li><a href="/teams_ranking/">Ranking</a>
                    <ul class="submenu">
                        <li><a href="/teams_ranking/">Zespołow</a></li>
                        <li><a href="/drivers_ranking/">Kierowcow</a></li>
                    </ul>
                </li>
                <li><a href="/photos/">Zdjęcia</a></li>
                <li><a href="/gallery/">Galeria</a></li>
                <li><a href="/account/login">Account</a></li>
                <li><a href="/contact/">Kontakt</a></li>
            </ul>
        </nav>

        <form name="search" action="search" method="get" id="search_form">
            <input type="text" name="q" placeholder="Szukaj" id="search_field"><input type="button" value="GO" onclick="Search()" />
        </form>

    </header>

    <div class="middle">
        <div class="container">
            <div class="content">
                <?php echo $content; ?>
            </div>
        </div>

        <aside class="left-sidebar">
            Najbliższe wyścigi
            <ul class="left_sidebar_ul">
                <li>11.11.2018 - Brazilya</li>
                <li>25.11.2018 - Zjednoczone Emiraty Arabskie</li>
                <li>17.03.2019 - Australia</li>
                <li>31.03.2019 - Bahrajn</li>
                <li>14.04.2019 - Chiny</li>
            </ul>
            Сytat dnia:<br>
            <blockquote>“I feel like people are expecting me to fail, therefore, I expect myself to win.”<br><br>
                Lewis Hamilton</blockquote>
            <img src="../public/photos/quote/lw.png" alt="Lewis Hamilton" class="img_left_sidebar">
        </aside>

    </div>

</div>

<footer class="footer">
    <div class="left_col_footer">
        <strong>F1 FAN SITE</strong> - to jest strona, która została złażona w 2012 roku.
        Z tej pory jeśteśmy najpopularniejszą stroną internetową, ktorą opowiada o nowościach ze świata F1.
    </div>

    <div class="right_col_footer">
        Napisz do nas!<br>
        <a href="mailto:alexkeysel@gmail.com">alexkeysel@gmail.com</a><br>
        <a href="contact">Kontakt</a><br><br>
        <div id="social">
            <a href="https://www.facebook.com/Formula1/" class="fa fa-facebook"></a>
            <a href="https://www.youtube.com/channel/UCB_qr75-ydFVKSF9Dmo6izg" class="fa fa-youtube"></a>
            <a href="https://www.instagram.com/f1/?hl=ru" class="fa fa-instagram"></a>
        </div>
    </div>

    <div class="center_col_footer">
        <form action="subscribe" method="POST" name="footer_sub">
            Subskrybuj na nasze nowości:<br><br>
            <input type="text" name="email" placeholder="E-mail" id="email_sub">
            <input type="submit" value="Wyslac">
        </form>
    </div>
</footer>
<script src="../public/js/search.js"></script>
<script src="../public/js/contact.js"></script>
</body>