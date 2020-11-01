<?php
session_start();
echo ("edit.php");
$nazov = ($_POST['nazov']);
$popis = ($_POST['popis']);
$datum = ($_POST['datum']);
$mesto = ($_POST['mesto']);
$kontakt = ($_POST['kontakt']);
//img_path = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
$adresa = ($_POST['adresa']);

if (!isset($_SESSION['loggedin'])) // ak nemam session nemam tu co robit , redirect
{
    header("refresh:0;url=http://localhost/portalove2/index.php");
}

echo ($nazov.$popis.$datum.$mesto.$kontakt.$adresa);
to iste co upload iba ak nebude nic v obrazku tak ho necham tak a ulozim to iste ak bude niečo iné tak urobim kod z uploadu