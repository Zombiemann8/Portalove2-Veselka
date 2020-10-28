
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
            <h3 class="header-title">Say hello to <em>Highway</em></h3>
            <div class="close-btn"><img src="img/close_contact.png" alt=""></div>
        </div>
        <!-- Modal Body -->

        <div class="modal-body">
            <div class="col-md-6 col-md-offset-3">
                <form id="contact" action="" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="btn">Send Message Now</button>
                            </fieldset>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


        <section class="overlay-menu">
            <div class="container">
                <div class="row">
                    <div class="main-menu">
                        <ul>
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="grid.html">My Posts</a>
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

