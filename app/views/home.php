<!DOCTYPE html>
<html>

<head>
    <title>
        Home
    </title>
    <link rel="stylesheet" href="<?= ASSETS ?>css/commonStyle.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/homeStyle.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/registrationform.css">

    <?php $this->view("header") ?>
</head>

<body id="body">
    <main>
        <div class="page_content">

            <!---------------------------------------------------------------------------------------------->
            <section id="showcase">
                <div class="contentA">

                    <div class="inner_content">
                        <h1 class="h1">Ayurvedha Under One Roof</h1><br>
                        <p>Online Ayurvedic Platform where you can,</p>

                        <ul>
                            <li>Consult Ayurvedic Doctors</li>
                            <li>Share Knowledge about Ayrvedic Doctors,Herbs and Products</li>
                            <li>Find Ayurvedic Products</li>
                            <li>Read articles about Medicinal Herbs</li>
                        </ul>
                        <?php if (!Auth::logged_in()) : ?>

                            <div class="inner_content_button">
                                <a href="<?= ROOT ?>signup"><button class="button">Sign Up</button></a>
                                <a href="<?= ROOT ?>login"> <button class="button_typeA">Log In </button></a>
                            </div>

                        <?php elseif (Auth::logged_in()) : ?>

                            <div class="inner_contentA">
                                <h2 class=welcome_h2> Hi <?= ucfirst(Auth::fname()) ?>,</h2>
                                <p class="welcome">Hope you would have an amazing experience with us </p>
                            </div>

                        <?php endif; ?>

                    </div>

                    <div class="inner_content_image">
                        <video class="top-video" playsinline autoplay muted loop>
                            <source src="<?= ASSETS ?>img/Slides-1.mp4" type="video/mp4">
                            Your browser does not support HTML5 video.
                        </video>
                    </div>
                </div>
            </section>

            <!---------------------------------------------------------------------------------------------->
            <?php if (Auth::logged_in()) : ?>
                <section id="registration">
                    <div class="contentB">
                        <?php if (!empty($data)) : ?>
                            <?php if ($data == "doctor") : ?>
                                <div class="inner_content_card">
                                    <h2 class="h2">Welcome Doctor</h2><br>
                                    <p>Check your Appointments</p><br>
                                    <a href="<?= ROOT ?>appointments"><button class="button_typeB">Appointments</button></a>
                                </div>

                            <?php elseif ($data == "patient") : ?>
                                <div class="inner_content_card">
                                    <h2 class="h2">Welcome Patient</h2><br>
                                    <p>Channel a Doctor with us</p><br>
                                    <a href="<?= ROOT ?>channeling"><button class="button_typeB">Channeling</button></a>
                                </div>

                            <?php elseif ($data == "seller") : ?>
                                <div class="inner_content_card">
                                    <h2 class="h2">Welcome Seller</h2><br>
                                    <p>You can add Products from here</p><br>
                                    <a href="<?= ROOT ?>seller/uploadProduct"><button class="button_typeB">Add Products</button></a>
                                </div>

                            <?php elseif ($data == "doctorAndPatient") : ?>
                                <div class="inner_content_card">
                                    <h2 class="h2">Welcome Doctor</h2><br>
                                    <p>Check your Appointments</p><br>
                                    <a href="<?= ROOT ?>appointments"><button class="button_typeB">Appointments</button></a>
                                </div>
                                <div class="inner_content_card">
                                    <h2 class="h2">Welcome Patient</h2><br>
                                    <p>Channel a Doctor with us</p><br>
                                    <a href="<?= ROOT ?>channeling"><button class="button_typeB">Channeling</button></a>
                                </div>


                            <?php elseif ($data == "doctorAndSeller") : ?>
                                <div class="inner_content_card">
                                    <h2 class="h2">Welcome Doctor</h2><br>
                                    <p>Check your Appointments</p><br>
                                    <a href="<?= ROOT ?>appointments"><button class="button_typeB">Appointments</button></a>
                                </div>
                                <div class="inner_content_card">
                                    <h2 class="h2">Welcome Seller</h2><br>
                                    <p>You can add Products from here</p><br>
                                    <a href="<?= ROOT ?>seller/uploadProduct"><button class="button_typeB">Add Products</button></a>
                                </div>


                            <?php elseif ($data == "sellerAndPatient") : ?>
                                <div class="inner_content_card">
                                    <h2 class="h2">Welcome Patient</h2><br>
                                    <p>Channel a Doctor with us</p><br>
                                    <a href="<?= ROOT ?>channeling"><button class="button_typeB">Channeling</button></a>
                                </div>
                                <div class="inner_content_card">
                                    <h2 class="h2">Welcome Seller</h2><br>
                                    <p>You can add Products from here</p><br>
                                    <a href="<?= ROOT ?>seller/uploadProduct"><button class="button_typeB">Add Products</button></a>
                                </div>

                            <?php elseif ($data == "allUser") : ?>
                                <div class="inner_content_card">
                                    <h2 class="h2">Welcome Doctor</h2><br>
                                    <p>Check your Appointments</p><br>
                                    <a href="<?= ROOT ?>appointments"><button class="button_typeB">Appointments</button></a>
                                </div>
                                <div class="inner_content_card">
                                    <h2 class="h2">Welcome Patient</h2><br>
                                    <p>Channel a Doctor with us</p><br>
                                    <a href="<?= ROOT ?>channeling"><button class="button_typeB">Channeling</button></a>
                                </div>
                                <div class="inner_content_card">
                                    <h2 class="h2">Welcome Seller</h2><br>
                                    <p>You can add Products from here</p><br>
                                    <a href="<?= ROOT ?>seller/uploadProduct"><button class="button_typeB">Add Products</button></a>
                                </div>

                            <?php elseif ($data == "none") : ?>
                                <div class="inner_content_card">
                                    <h2 class="h2">Are you a Doctor ?</h2><br>
                                    <p>Your Patients are here with us.</p><br>
                                    <a href="<?= ROOT ?>doctor/registration"><button class="button_typeB">Register as a Doctor</button></a>
                                </div>


                                <div class="inner_content_card">
                                    <h2 class="h2">Are you a Patient ?</h2><br>
                                    <p>Every doctor you see on the platform is highly qualified to provide the best care possible.</p><br>
                                    <a href="<?= ROOT ?>patient/registration"><button class="button_typeB">Register as a Patient</button></a>
                                </div>

                                <div class="inner_content_card">
                                    <h2 class="h2">Are you a Seller ?</h2><br>
                                    <p>Expand your customer base with us.</p><br>
                                    <a href="<?= ROOT ?>seller/registration"><button class="button_typeB">Register as a Seller</button></a>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>


                    </div>
                </section>
            <?php endif; ?>

            <!---------------------------------------------------------------------------------------------->
            <section id="articles">
                <div class="contentC">





                

                </div>
            </section>

            <!---------------------------------------------------------------------------------------------->
            <section id="aboutUs">
                <div class="contentD">

                    <h2>About Us</h2><br>
                    <p>We provide our service as an online platform to enhance the Sri Lankan Ayurvedic treatments among people.</p>

                </div>
            </section>

            <!---------------------------------------------------------------------------------------------->
        </div>
        <!---------------------------------------------------------------------------------------------->

        <div class="container">
            <div style="text-align:center">
                <h2>Contact Us</h2>
                <p>Swing by for a cup of coffee, or leave us a message:</p>
            </div>
            <div class="row">
                <div class="column">
                    <img class="cont-img" src="<?= ASSETS ?>/img/contactform-img.png" style="width:100%">
                </div>
                <div class="column">
                    <form action="/action_page.php">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="firstname" placeholder="Your name..">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                        <label for="country">Country</label>
                        <select id="country" name="country">
                            <option value="australia">Australia</option>
                            <option value="canada">Canada</option>
                            <option value="usa">USA</option>
                        </select>
                        <label for="subject">Subject</label>
                        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
        <!---------------------------------------------------------------------------------------------->
        <!--footer-->
        <?php $this->view("footer") ?>
        <!--end of footer-->
    </main>
</body>

</html>