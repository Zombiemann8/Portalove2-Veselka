<?php
include_once("classes/DB.php");

use classes\DB;

$db = new DB("localhost", "root", "", "portalove", 3306);

if($_GET['show'] == 1) {
    $prispevky = $db->getPrispevky();

    foreach ($prispevky as $key => $prispevok) {
        ?>

        <div class="col-md-4 col-sm-6">
            <div class="portfolio-item">
                <a href="img/<?php echo $prispevok['img_path'] ;?>" data-lightbox="image-1"><div class="thumb">
                        <div class="hover-effect">

                            <div class="hover-content">
                                <h1><?php echo $prispevok['nazov'] ;?></h1>
                                <h1>   <em><?php echo $prispevok['mesto'] ;?> - <?php echo $prispevok['adresa'] ;?></em></h1>

                                <p> <?php echo $prispevok['popis'] ;?>
                                    <br>
                                    <b>Dátum:</b> <?php echo $prispevok['datum'] ;?>
                                    <br>
                                <b>Kontakt:</b> <?php echo $prispevok['kontakt'] ;?>

                                </p>
                            </div>
                        </div>
                        <div class="image">
                            <img src="img/<?php echo $prispevok['img_path'] ;?>">
                        </div>
                    </div></a>
            </div>
        </div>

        <?php
    }
}
else {
    echo "No data found";
}
die();
