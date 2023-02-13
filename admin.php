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
    <div class="    -group">
        <a href="registration.php" class="btn btn-primary">Go to Registration</a>
    </div><br>
    <?php
    session_start();
    if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["create"];
            ?>
        </div>
        <?php
        unset($_SESSION["create"]);
    }
    ?>
    <?php
    if (isset($_SESSION["update"])) {
        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["update"];
            ?>
        </div>
        <?php
        unset($_SESSION["update"]);
    }
    ?>
    <?php
    if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-success">
            <?php
            echo $_SESSION["delete"];
            ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
    }
    ?>

    <div class="main">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</td>
                    <th scope="col">Name</td>
                    <th scope="col">Email</td>
                    <th scope="col">Updated on</td>
                    <th scope="col">Buttons</td>
                </tr>
            </thead>
            <tbody>
                <?php
                include('databaseconnection.php');
                $sqlSelect = "SELECT * FROM users";
                $result = mysqli_query($conn, $sqlSelect);
                while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <th scope="row">
                            <?php echo $data['id']; ?>
                            </td>
                        <td>
                            <?php echo $data['fullname']; ?>
                        </td>
                        <td>
                            <?php echo $data['email']; ?>
                        </td>
                        <td>
                            <?php echo $data['updated on']; ?>
                        </td>
                        <td>
                            <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-info">View</a>
                            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>