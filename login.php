<!DOCTYPE html>
<html>
<head>

    <?php include_once("header.php");?>


</head>
<body>
<?php
if (isset($_SESSION['loggedin'])) // ak mam session, tj.som logged in nepotrebujem login
{
    header( "refresh:0;url=http://localhost/portalove2/index.php" );
}
?>

<nav>
    <div class="logo">
        <a href="index.php">BEACH<em>SITE</em></a>
    </div>
    <div class="menu-icon">
        <span></span>
    </div>


</nav>

<div id="video-container">
    <div class="video-overlay"></div>
    <div class="video-content">
        <div class="inner">
            <div class="scroll-icon">

                <div class="login">
                    <h3>Login</h3>
                    <form action="authenticate.php" method="post">
                        <label for="username">
                        </label>
                        <input type="text" name="username" placeholder="Username" id="username" required>
                        <label for="password">
                        </label>
                        <input type="password" name="password" placeholder="Password" id="password" required>
                        <input type="submit" value="Login">
                    </form>
                </div>


            </div>
        </div>
    </div>
    <video autoplay="" loop="" muted>
        <source src="teaser.mp4" type="video/mp4" />
    </video>
</div>

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
                </ul>
                <p>We create awesome templates for you.</p>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<script src="js/vendor/bootstrap.min.js"></script>

<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

</body>
</html>