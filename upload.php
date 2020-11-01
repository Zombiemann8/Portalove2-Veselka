<?php
session_start();

$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check="";

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'portalove';

if (!isset($_SESSION['loggedin'])) // nepovoleny pristup prepisom url
{
    header("refresh:0;url=http://localhost/portalove2/index.php");
}

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    function_alert('Failed to connect to MySQL: ' . mysqli_connect_error());
    header( "refresh:2;url=http://localhost/portalove2/index.php" );
}


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    $width = $check[0];
    $height = $check[1];

    if($check !== false) {
        function_alert("File is an image - " . $check["mime"] . ".");
        $uploadOk = 1;
    } else {
        function_alert("File is not an Image");
        $uploadOk = 0;
    }

    if ($width < 500 || $height < 500)
    {
        function_alert("Use picture with atleast W:500px H:500px");
        $uploadOk = 0;
    }
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    function_alert("Sorry, your file is too large.");
    $uploadOk = 0;

}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    function_alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
}
// Check if file already exists
if (file_exists($target_file)) {
    function_alert("Sorry, file already exists.");
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    function_alert("Sorry, your file was not uploaded.");
    header( "refresh:1;url=http://localhost/portalove2/index.php" );
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        function_alert("The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.");
    } else {
        function_alert("Sorry, there was an error uploading your file.");
    }
}
if ( !isset($_POST['nazov'], $_POST['popis'], $_POST['datum'], $_POST['mesto'], $_POST['kontakt'], $_POST['mesto'], $_POST['adresa']) ) {
    // Could not get the data that should have been sent.
    function_alert("Please fill all empty fields.");
    header( "refresh:1;url=http://localhost/portalove2/index.php" );

}

// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables

    $nazov = ($_POST['nazov']);
    $popis = ($_POST['popis']);
    $datum = ($_POST['datum']);
    $kontakt = ($_POST['kontakt']);
    $img_path = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
    $mesto = ($_POST['mesto']);
    $adresa = ($_POST['adresa']);

    //$created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');

    // Insert new record into the contacts table
    ;
    $stmt = $con->prepare('INSERT INTO prispevok (idprispevok, nazov, popis, datum, adresa, user_iduser, m, kontakt, img_path, mesto) VALUES (NULL, ?, ?, ?, ?, ?, \'1\', ?, ?, ?)');
    $stmt->bind_param("ssssisss", $nazov, $popis, $datum, $adresa, $_SESSION['id'], $kontakt,$img_path,$mesto);
    $stmt->execute();
    // Output message
    function_alert("Creation Succesfull.");
    header( "refresh:1;url=http://localhost/portalove2/index.php" );
}


function function_alert($message) {

    // Display the alert box
    echo "<script>alert('$message');</script>";
}