<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Forms</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Registration Form</h1>
        <?php
        if (isset($_POST["submit"])) {
            $fullName = $_POST["fullname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();
            if (empty($fullName) or empty($email) or empty($password) or empty($passwordRepeat)) {
                array_push($errors, "All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Email is not valid");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Password must be at least 8 charactes long");
            }
            if ($password !== $passwordRepeat) {
                array_push($errors, "Password does not match");
            }
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {
                require_once "databaseconnection.php";
                $sql = "INSERT INTO users(full_name, email, password) VALUES(?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $password_hash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>You are registered successfully</div>";
                } else {
                    die("Something went wrong");
                }
            }

        }


        ?>
        <?php
        print_r($_POST)
            ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <input class="form-control" type="text" name="fullname" placeholder="Full Name:">
            </div><br>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email:">
            </div><br>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password:">
            </div><br>
            <div class="form-group">
                <input class="form-control" type="password" name="repeat_password" placeholder="Repeat Password:">
            </div><br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
            <div class="form-group">
                <a href="admin.php" class="btn btn-primary">Go to Admin</a>
            </div><br>
        </form>
    </div>
</body>

</html>