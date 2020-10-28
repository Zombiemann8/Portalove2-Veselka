<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include_once("header.php");?>

    </head>

<body>


    <nav>
        <div class="logo">
            <a href="index.php">BEACH<em>SITE</em></a>
        </div>
        <?php
        if (isset($_SESSION['loggedin'])) // ak mam session, tj.som logged in
        {
        ?>
        <div class ="logo">
            <a>Prihlásený ako: <em><?=$_SESSION['name']?></em></a>
        </div>
        <?php
        }
        ?>
        <div class="menu-icon">
        <span></span>

      </div>

    </nav>



    <div id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
              <h1>VITAJ NA <em>Beach VolleySITE</em></h1>
              <p>VŠETKY PLÁŽOVÉ TURNAJE NA JEDNOM MIESTE</p>
              <p>Veľa štastia všetkým hráčom</p>
                <div class="scroll-icon">
                    <a class="scrollTo" data-scrollTo="portfolio" href="#"><img src="img/scroll-icon.png" alt=""></a>
                </div>    
            </div>
        </div>
        <video autoplay="" loop="" muted>
        	<source src="teaser.mp4" type="video/mp4" />
        </video>
    </div>




    <div class="full-screen-portfolio" id="portfolio">
        <div class="container-fluid" id="test">



        </div>

        <div class="scroll-icon">
            <center> <button type="submit" id="show"  ><img src="img/loadmore-icon.png" alt=""></button></center>
        </div>

    </div>



    <?php  include_once("footer.php");?>
    
</body>
</html>