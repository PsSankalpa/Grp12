<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>
        Home
    </title>

    <link rel="icon" href="<?= ASSETS ?>img/logo.png" type="image/x-icon" />
    <!--favicon-->
    <link rel="stylesheet" href="<?= ASSETS ?>css/header.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/commonStyle.css">


    <!--adding user logo-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!--adding google fonts in navbar-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


    <header>
        <?php
        if (Auth::logged_in()) {
            $Auth = new Auth;
            $data = $Auth->finduser();
        }
        ?>
        <nav class="top_nav" id="myTopnav">


            <a class="a_navitem2" href="<?= ROOT ?>home"><img class="logo" src="<?= ASSETS ?>img/logo.png"></a>
            <a class="a_navitem2 items" href="<?= ROOT ?>home">HOME</a>
            <div class="v"></div>

            <a class="a_navitem2 items" href="<?= ROOT ?>about">ABOUT</a>
            <div class="v"></div>
            <a class="a_navitem2 items" href="<?= ROOT ?>channeling">CHANNELING</a>
            <div class="v"></div>
            <a class="a_navitem2 items" href="<?= ROOT ?>header/viewProducts">PRODUCTS</a>
            <?php if (($data == "seller") || ($data == "doctorAndSeller") || ($data == "sellerAndPatient") || ($data == "allUser")) : ?>
                <div class="v"></div>
                <a class="a_navitem2 items" href="<?= ROOT ?>seller">SELLING</a>
            <?php endif; ?>
            <div class="v"></div>
            <a class="a_navitem2 items" href="<?= ROOT ?>header/viewArticles">ARTICLES</a>
            <?php if (($data == "doctor") || ($data == "doctorAndSeller") || ($data == "doctorAndPatient") || ($data == "allUser")) : ?>
                <div class="v"></div>
                <a class="a_navitem2 items" href="<?= ROOT ?>doctor/docDashboard">APPOINTMENTS</a>
            <?php endif; ?>
            <div class="v"></div>
            <a class="a_navitem2 items" href="<?= ROOT ?>forum">FORUMS</a>
            <?php if (Auth::logged_in()) : ?>
                <div class="v"></div>


                <a class="a_navitem2 items" href="<?= ROOT ?>header/makeDonations">DONATIONS</a>
            <?php endif; ?>


            <?php if (Auth::logged_in_admin()) : ?>

                <div class="v"></div>
                <div class="nav_item3 items last">
                    <a class="a_navitem3" href="<?= ROOT ?>admin"> Admin</a>
                </div>

            <?php else : ?>

                <?php if (!Auth::logged_in()) : ?>
                    <div class="nav_item3 items last">
                        <i class="fas fa-user-circle fa-10x" id="login_logo"></i>
                        <a class="a_navitem3" href="<?= ROOT ?>login"> Log In</a>
                    </div>
                <?php endif; ?>

                <?php if (Auth::logged_in()) : ?>
                    <div class="dropdown items last">
                        <button class="dropbtn"><?= Auth::username() ?>
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="<?= ROOT ?>myAccount">My Account</a>
                            <a href="<?= ROOT ?>logout">Log Out</a>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endif; ?>

            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </nav>
    </header>
    <script type="text/javascript" src="<?= ASSETS ?>js/header.js"></script>

</body>

</html>