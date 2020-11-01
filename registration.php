<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'portalove';
// Try and connect using the info above.

if (isset($_SESSION['loggedin'])) // ak mam session tak nepotrebujem ist do registru
{
    header( "refresh:0;url=http://localhost/portalove2/index.php" );
}

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    function_alert("Failed to connect to MySQL: " . mysqli_connect_error());
    header( "refresh:3;url=http://localhost/portalove2/register.php" );
}
// Now we check if the data was submitted, isset() function will check if the data exists.
else if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    // Could not get the data that should have been sent.
    function_alert("Please complete the registration form!");
    header( "refresh:3;url=http://localhost/portalove2/register.php" );

}
// Make sure the submitted registration values are not empty.
else if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
    // One or more values are empty.
    function_alert("Please complete the registration form");
    header( "refresh:3;url=http://localhost/portalove2/register.php" );
}
else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    function_alert("Email is not valid!");
    header( "refresh:3;url=http://localhost/portalove2/register.php" );
}
else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    function_alert("Password must be between 5 and 20 characters long!");
    header( "refresh:3;url=http://localhost/portalove2/register.php" );
}

// We need to check if the account with that username exists.
else if ($stmt = $con->prepare('SELECT iduser, password FROM user WHERE username = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();
    // Store the result so we can check if the account exists in the database.
    if ($stmt->num_rows > 0) {
        // Username already exists
        function_alert("Username exists, please choose another!");
        header( "refresh:3;url=http://localhost/portalove2/register.php" );
    } else {
        // Username doesnt exists, insert new account
        if ($stmt = $con->prepare('INSERT INTO user (username, email, password) VALUES (?, ?, ?)')) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['username'],  $_POST['email'],$password);
            $stmt->execute();
            function_alert("You have successfully registered, you can now login!");
            header( "refresh:3;url=http://localhost/portalove2/login.php" );
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            function_alert("Could not prepare statement!");
            header( "refresh:3;url=http://localhost/portalove2/register.php" );
        }
    }
    $stmt->close();
} else {
    // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
    function_alert("Could not prepare statement!");
    header( "refresh:3;url=http://localhost/portalove2/register.php" );
}
$con->close();

function function_alert($message) {

    // Display the alert box
    echo "<script>alert('$message');</script>";
}


