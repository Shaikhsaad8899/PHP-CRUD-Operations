<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit User</title>
</head>

<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit User</h1>
            <div>
                <a href="admin.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="process.php" method="post">
            <?php

            if (isset($_GET['id'])) {
                include("databaseconnection.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM users WHERE id=$id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                ?>
                <div class="form-elemnt my-4">
                    <input type="text" class="form-control" name="id" placeholder="Id:"
                        value="<?php echo $row["id"]; ?>">
                </div>
                <div class="form-elemnt my-4">
                    <input type="text" class="form-control" name="full_name" placeholder="Full Name:"
                        value="<?php echo $row["full_name"]; ?>">
                </div>
                <div class="form-element my-4">
                    <textarea name="email" id="" class="form-control"
                        placeholder="User E-mail:"><?php echo $row["email"]; ?></textarea>
                </div>
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="form-element my-4">
                <input type="submit" name="edit" value="Edit User" class="btn btn-primary">
            </div>
                <?php
            } else {
                echo "<h3>User Does Not Exist</h3>";
            }
            ?>

        </form>

    </div>
</body>

</html>