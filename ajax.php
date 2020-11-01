<?php
include_once("classes/DB.php");

use classes\DB;

$db = new DB("localhost", "root", "", "portalove", 3306);


if (isset($_SESSION['loggedin'])) // ak mam session, tj.som logged in nepotrebujem login
{
    header("refresh:0;url=http://localhost/portalove2/index.php");
}
if(!isset($_GET['show']))
    header("refresh:0;url=http://localhost/portalove2/index.php");


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
                                    <b>Dátum:</b> <?php echo date('Y-m-d',strtotime($prispevok['datum'])) ;?>
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
} //zobrazenie prispevkov na hlavnej stranke
else if($_POST['show'] == 2) {   // delete prispevku
    function_alert("Vymazávam príspevok.");
    $db->deletePrispevok($_POST['idPrispevok']);
} // delete prispevku
else if($_POST['show'] == 3) {   // nacitanie editu prispevku
    $prispevok = $db->getEditovanyPrispevok($_POST['idPrispevok']);
    ?>
    <form id="editDetails" action="edit.php" method="post" enctype="multipart/form-data">
        <div class="row">
                <div class="col-md-12"> <!--nazov-->
                    <fieldset>
                        <input name="nazov" type="text" class="form-control" id="nazov" placeholder="Nazov turnaju..."value="<?php echo $prispevok['nazov'] ;?>" required="">
                    </fieldset>
                </div>
                <div class="col-md-12"> <!--kontakt-->
                    <fieldset>
                        <input name="kontakt" type="email" class="form-control" id="kontakt" placeholder="Kontaktný mail..." value="<?php echo $prispevok['kontakt'] ;?>"required="">
                    </fieldset>
                </div>
                <div class="col-md-12"> <!--datum-->
                    <fieldset>
                        <form action="" method="POST">
                            <input name="datum"  type="date"  id="datum" placeholder="Vyber dátum..."value="<?php echo date('Y-m-d',strtotime($prispevok['datum'])) ;?>" required="">
                        </form>
                    </fieldset>
                </div>
                <div class="col-md-12"> <!--adresa-->
                    <fieldset>
                        <input name="adresa" type="text" class="form-control" id="adresa" placeholder="Adresa konania..."value="<?php echo $prispevok['adresa'] ;?>" required="">
                    </fieldset>
                </div>
                <div class="col-md-12"> <!--mesto-->
                    <fieldset>
                        <input name="mesto" type="text" class="form-control" id="mesto" placeholder="Mesto konania..."value="<?php echo $prispevok['mesto'] ;?>" required="">
                    </fieldset>
                </div>
                <div class="col-md-12"> <!--obrazok-->
                    <fieldset>
                        Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload"style="color: transparent">
                    </fieldset>
                </div>
            <img src="img/<?php echo $prispevok['img_path'] ;?>"width="60px" height="60px">
                                <br>
                            YOUR UPLOADED FILE

                <div class="col-md-12"> <!--popis-->
                    <fieldset>
                        <textarea name="popis" rows="6" class="form-control" id="popis" placeholder="Popis sem..." required=""><?php echo $prispevok['popis'] ;?></textarea>
                    </fieldset>
                </div>
                <div class="col-md-12">
                    <fieldset>
                        <button type="submit" id="uprav" class="btn">Uprav príspevok</button>
                    </fieldset>
                </div>
        </div>
    </form>

    <?php

}

else {
    echo "No data found";
}

die();

function function_alert($message) {

    // Display the alert box
    echo "<script>alert('$message');</script>";
}