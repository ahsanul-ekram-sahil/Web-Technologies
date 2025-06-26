<?php
// Database connection would be established here
// Query to fetch posts: SELECT * FROM posts ORDER BY dateofpost DESC

session_start();


if (!isset($_SESSION['fullname'])) {
    echo "Please Login First";
    header("refresh: 3; url = login.php");
    exit();
}
$conn = new mysqli("localhost", "root", "", "db_recipe");
$sql = "SELECT * FROM RECIPE ORDER BY DATEOFPOST DESC";
$result = $conn->query($sql);
$posts = $result->fetch_all(MYSQLI_ASSOC);


if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    echo "Logging out...";
    header("refresh: 3; url = index.php");
    exit();
}

// Simulated database results - in real implementation, this would come from DB
// Real database implementation


?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- at top of body -->
    <div class="home-header">
        <?php echo "<h1>Welcome " . $_SESSION["fullname"] . "</h1>"; ?>
        <form method="post" class="btn-group">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>

    <div class="home-container">
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <h2><?= htmlspecialchars($post['TITLE']) ?></h2>
                <div class="post-body"><?= htmlspecialchars($post['FULLRECIPE']) ?></div>
            </div>
        <?php endforeach; ?>
    </div>



</body>

</html>