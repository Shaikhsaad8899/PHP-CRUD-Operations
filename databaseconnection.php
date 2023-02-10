<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "login_register";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection to Database Failed, Try Again.");
} else {
    echo "<b>Connection to DB was successful</b>";
}
?>