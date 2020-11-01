<?php
session_start();

include_once("classes/DB.php");

use classes\DB;

?>

<!DOCTYPE html>
<html>
<head>
    <?php include_once("header.php");?>

</head>

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
    else
        header( "refresh:0;url=http://localhost/portalove2/index.php" );
    ?>
    <div class="menu-icon">
        <span></span>

    </div>

</nav>





    <div class="grid-portfolio" id="portfolio">
        <br><br>
        <div class="container">
            <center><h1 style="color: white;font-size: large;align-content: center">Vaše Príspevky.</h1></center>
            <div class="row" id="prispevky">
                <?php
                $db = new DB("localhost", "root", "", "portalove", 3306);
                $prispevky = $db->getMojePrispevky($_SESSION['id']);

                foreach ($prispevky as $key => $prispevok) {
                ?>

                    <div class="col-md-4 col-sm-6">
                        <div class="portfolio-item">
                            <div class="thumb" id="<?php echo $prispevok['id'] ;?>">
                                <button type="submit" id="edit" style="position: absolute;top:0;left: 0;background-color: antiquewhite;width: 40px;height: 40px;"><img src="img/edit.png" alt=""></button>
                                <button type="submit" onclick=location=URL id="delete" style="position: absolute;top:0;right: 0;background-color: antiquewhite;width: 40px;height: 40px;"><img src="img/delete.png" alt=""></button>
                                <a href="img/<?php echo $prispevok['img_path'] ;?>" data-lightbox="image-1"><div class="hover-effect">
                                        <div class="hover-content">
                                            <h1><?php echo $prispevok['nazov'] ;?></h1>
                                            <h1>   <em><?php echo $prispevok['mesto'] ;?> - <?php echo $prispevok['adresa'] ;?></em></h1>

                                            <p> <?php echo $prispevok['popis'] ;?>
                                                <br>
                                                <b>Dátum:</b> <?php echo date('Y-m-d',strtotime($prispevok['datum'])) ;?>
                                                <br>
                                                <b>Kontakt:</b> <?php echo $prispevok['kontakt'] ;?>

                                            </p>
                                        </div>
                                    </div></a>
                                <div class="image">
                                    <img src="img/<?php echo $prispevok['img_path'] ;?>">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>





            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="load-more-button">
                        <a href="#">Load More</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>




    <?php  include_once("footer.php");?>

</body>
</html>