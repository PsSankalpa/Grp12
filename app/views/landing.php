<!DOCTYPE html>
<html>
    <head>
        <title>
            Landing
        </title>
        <?php $this -> view ("header")?>
        <link rel="stylesheet" href="<?=ASSETS?>css/homeStyle.css">
    </head>

    <body class="bg">
        
       

        <main >
            <div class="body_container center">
                <hr class="h">
                <h1 class="h1_home">CEYLON NURTURE</h1>
                <h5 class="h5_home">Ayurvedha Under One Roof</h5>
                <hr class="h">

                <div class="home_buttons">
                <a href="<?=ROOT?>signup"><button class="button"> Sign Up </button>
                <a href="<?=ROOT?>login/login"><button class="button"> Sign In </button>
                </div>
            </div>
        </main>      
    </body>
</html>
