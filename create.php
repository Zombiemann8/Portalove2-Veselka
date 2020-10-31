<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include_once("header.php");?>

    </head>
<body bgcolor="black">
<font color="white">

    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <?php  include_once("footer.php");?>
    <body>
    </html>

