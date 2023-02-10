<?php
if (isset($_GET['id'])) {
include("databaseconnection.php");
$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id='$id'";
if(mysqli_query($conn,$sql)){
    session_start();
    $_SESSION["delete"] = "User Deleted Successfully!";
    header("Location:admin.php");
}else{
    die("Something went wrong");
}
}else{
    echo "User does not exist";
}
?>