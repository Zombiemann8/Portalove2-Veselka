
<footer>
    <div class="container-fluid">
        <div class="col-md-12">
            <p>Copyright &copy; 2018 Company Name

                | Designed by TemplateMo</p>
        </div>
    </div>
</footer>

<?php

if (isset($_SESSION['loggedin'])) // ak mam session, tj.som logged in
{
?>
<!-- Modal button -->
<div class="popup-icon">
    <button id="modBtn" class="modal-btn"><img src="img/plus.png" alt=""></button>
</div>


<!-- Modal -->
<div id="modal" class="modal">
    <!-- Modal Content -->
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h3 class="header-title">Váš <em>Príspevok</em></h3>
            <div class="close-btn"><img src="img/close_contact.png" alt=""></div>
        </div>
        <!-- Modal Body -->

        <div class="modal-body">
            <div class="col-md-6 col-md-offset-3" id = "variables">
                <form id="createDetails" action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12"> <!--nazov-->
                            <fieldset>
                                <input name="nazov" type="text" class="form-control" id="nazov" placeholder="Nazov turnaju..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12"> <!--kontakt-->
                            <fieldset>
                                <input name="kontakt" type="email" class="form-control" id="kontakt" placeholder="Kontaktný mail..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12"> <!--datum-->
                            <fieldset>
                                <form action="" method="POST">
                                    <input name="datum"  type="date"  id="datum" placeholder="Vyber dátum..." required="">
                                </form>
                            </fieldset>
                        </div>
                        <div class="col-md-12"> <!--adresa-->
                            <fieldset>
                                <input name="adresa" type="text" class="form-control" id="adresa" placeholder="Adresa konania..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12"> <!--mesto-->
                            <fieldset>
                                <input name="mesto" type="text" class="form-control" id="mesto" placeholder="Mesto konania..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12"> <!--obrazok-->
                            <fieldset>
                                Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload"required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12"> <!--popis-->
                            <fieldset>
                                <textarea name="popis" rows="6" class="form-control" id="popis" placeholder="Popis sem..." required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <button type="submit" id="create" class="btn">Vytvor Prispevok</button>
                            </fieldset>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <!--   toto je horne overlay menu-->

        <section class="overlay-menu">
            <div class="container">
                <div class="row">
                    <div class="main-menu">
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="my_posts.php">My Posts</a>
                            </li>
                            <li>
                                <a href="logout.php">Logout</a>
                            </li>
                        </ul>
                        <p>We create awesome templates for you.</p>
                    </div>
                </div>
            </div>
        </section>

        <?php
        }
else {
    ?>
    <section class="overlay-menu">
        <div class="container">
            <div class="row">
                <div class="main-menu">
                    <ul>
                        <li>
                            <a href="index.php">HOME</a>
                        </li>
                        <li>
                            <a href="register.php">REGISTER</a>
                        </li>
                        <li>
                            <a href="login.php">LOGIN</a>
                        </li>
                    </ul>
                    <p>We create awesome templates for you.</p>
                </div>
            </div>
        </div>
    </section>


        <?php
}
        ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="js/vendor/bootstrap.min.js"></script>

<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

function preview() {
thumb.src=URL.createObjectURL(event.target.files[0]);
}