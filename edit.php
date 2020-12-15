<?php
session_start();

/*
include_once("classes/DB.php");

use classes\DB;

$db = new DB("localhost", "root", "", "portalove2", 3306);
*/

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check="";
$img_path="";



$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'portalove2';


if (!isset($_SESSION['loggedin'])) // nepovoleny pristup prepisom url
{
    header("refresh:0;url=http://localhost/portalove2/index.php");
}

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    function_alert('Failed to connect to MySQL: ' . mysqli_connect_error());
    header( "refresh:1;url=http://localhost/portalove2/index.php" );
}

$img_path = ($_POST['img_path']);

$uploadedFile = $_FILES['fileToUpload']['name'];

if (!$uploadedFile==""){

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    $width = $check[0];
    $height = $check[1];

    if ($check !== false) {
        function_alert("File is an image - " . $check["mime"] . ".");
        $uploadOk = 1;
    } else {
        function_alert("File is not an Image");
        $uploadOk = 0;
        header("refresh:1;url=http://localhost/portalove2/index.php");
        return;
    }

    if ($width < 160 || $height < 160) {
        function_alert("Use picture with atleast W:500px H:500px");
        $uploadOk = 0;
        header("refresh:1;url=http://localhost/portalove2/index.php");
        return;
    }


// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        function_alert("Sorry, your file is too large.");
        $uploadOk = 0;
        header("refresh:1;url=http://localhost/portalove2/index.php");
        return;

    } // Allow certain file formats
    else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        function_alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        $uploadOk = 0;
        header("refresh:1;url=http://localhost/portalove2/index.php");
        return;
    } // Check if file already exists
    else if (file_exists($target_file)) {
        function_alert("Sorry, file already exists.");
        $uploadOk = 0;
        header("refresh:1;url=http://localhost/portalove2/index.php");
        return;
    } // Check if $uploadOk is set to 0 by an error
    else if ($uploadOk == 0) {
        function_alert("Sorry, your file was not uploaded.");
        header("refresh:1;url=http://localhost/portalove2/index.php");
        return;
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            $img_path = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));

            function_alert("The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.");
        } else {
            function_alert("Sorry, there was an error uploading your file.");
            header("refresh:1;url=http://localhost/portalove2/index.php");

        }
    }
}

// Check if POST data is not empty
if (!empty($_POST)) {

    // Post data not empty insert a new record
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables

    $nazov = ($_POST['nazov']);
    $popis = ($_POST['popis']);
    $datum = ($_POST['datum']);
    $kontakt = ($_POST['kontakt']);
    $mesto = ($_POST['mesto']);
    $adresa = ($_POST['adresa']);
    $id = ($_POST['submit']);


    //$db->editPrispevok($nazov,$popis,$datum,$adresa,$_SESSION['id'],$kontakt,$img_path,$mesto);

    $stmt = $con->prepare('UPDATE prispevok SET nazov = ?, popis = ?, datum = ?, adresa = ?, kontakt = ?, img_path = ?, mesto = ? WHERE idprispevok = ?');
    $stmt->bind_param("sssssssi", $nazov, $popis, $datum, $adresa, $kontakt,$img_path,$mesto,$id);
    $stmt->execute();


    function_alert("Edit Succesfull.");
    header( "refresh:0;url=http://localhost/portalove2/my_posts.php" );
}


function function_alert($message) {

    // Display the alert box
    echo "<script>alert('$message');</script>";
}