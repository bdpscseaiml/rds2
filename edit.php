<?php
include('database.php');

// Create a new mysqli object
$mysqli = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_errno) {
    die('Failed to connect to MySQL: ' . $mysqli->connect_error);
}

$postId = $_GET['id'];
// Perform a query to retrieve the posts
$query = 'SELECT * FROM posts WHERE id = ' . $postId; // Replace with your table name
$result = $mysqli->query($query);

// Check if the query was successful
if (!$result) {
    die('Error executing the query: ' . $mysqli->error);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="container">
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

    <h2 class="mt-3">Create Post</h2>

    <div class="border border-primary mt-3 p-3">
        <form method="post" action="save_post.php">

            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="mb-3">
                    <label class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Body:</label>
                    <textarea name="body" class="form-control"><?php echo $row['body']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Image:</label>
                    <input name="image" type="text" class="form-control" value="<?php echo $row['image']; ?>">
                </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


</body>

</html>