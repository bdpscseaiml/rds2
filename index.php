<?php
include('database.php');

// Create a new mysqli object
$mysqli = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_errno) {
    die('Failed to connect to MySQL: ' . $mysqli->connect_error);
}

// Perform a query to retrieve the posts
$query = 'SELECT * FROM posts'; // Replace with your table name
$result = $mysqli->query($query);

// Check if the query was successful
if (!$result) {
    die('Error executing the query: ' . $mysqli->error);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">


        <nav class="navbar navbar-expand-lg navbar-light bg-light border border-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">AWS Course</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="index.php">All pages</a>
                        </li>
                        <div class="form-inline my-2 my-lg-0 float-right">
                            <a href="form.php" class="btn btn-outline-success my-2 my-sm-0 float-right r-0" type="submit">Create post</a>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>

        <div>


            <h2>All Pages</h2>

            <?php while ($row = $result->fetch_assoc()) : ?>
                <div>
                    <h3><a href="page.php?id=<?= $row['id'] ?>">
                            <?php echo $row['title']; ?>
                        </a>
                    </h3>
                    <p><?php echo $row['body']; ?></p>
                    <!-- <img src="<?php echo $row['image']; ?>" alt="Post Image" width="300px"> -->
                </div>
                <hr>
            <?php endwhile; ?>

            <?php
            // Close the connection
            $mysqli->close();
            ?>
        </div>

    </div>
</body>

</html>