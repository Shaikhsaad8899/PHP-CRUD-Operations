<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>User Details</title>
    <style>
        .user-details {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>User Details</h1>
            <div>
                <a href="admin.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <div class="user-details p-5 my-4">
            <?php
            include("databaseconnection.php");
            $id = $_GET['id'];
            if ($id) {
                $sql = "SELECT * FROM users WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <h3>id:</h3>
                    <p>
                        <?php echo $row["id"]; ?>
                    </p>
                    <h3>Profile Image:</h3>
                    <?php
                    if (empty($row['filename'])) {
                        echo 'No image available';
                    } else {
                        echo '<img src="Image/' . $row['filename'] . '" alt="image" style="width:10rem"/>';
                    } ?>
                    <h3>Full name:</h3>
                    <p>
                        <?php echo $row["fullname"]; ?>
                    </p>
                    <h3>Email:</h3>
                    <p>
                        <?php echo $row["email"]; ?>
                    </p>
                    
                    <h3>Updated:</h3>
                    <p>
                        <?php echo $row["updated on"]; ?>
                    </p>
                    <?php
                }
            } else {
                echo "<h3>No Users found</h3>";
            }
            ?>

        </div>
    </div>
</body>