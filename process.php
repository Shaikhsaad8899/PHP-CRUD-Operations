 
<?php 
if (isset($_POST["edit"])) {
    include('databaseconnection.php');
    $fullName = mysqli_real_escape_string($conn, $_POST["fullname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE users SET fullname = '$fullName', email = '$email' WHERE id='$id'";
    if (mysqli_query($conn, $sqlUpdate)) {
        session_start();
        $_SESSION["update"] = "User Updated Successfully!";
        header("Location: admin.php");
    } else {
        die("Something went wrong");
    }
}
?>