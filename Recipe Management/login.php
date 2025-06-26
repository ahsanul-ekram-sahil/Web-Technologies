<?php


// Connect to database (renamed to db_recipe)
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $conn = mysqli_connect('localhost', 'root', '', 'db_recipe');
    $sql = "SELECT FULLNAME FROM USERS WHERE EMAIL = '$email' and PASSWORD = '$pass'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        session_start();
        $_SESSION["fullname"] =  $row['FULLNAME'];

        header("refresh: 2; url = home.php");
        exit();
    } else {
        echo "User not found";
        header("refresh: 2; url = login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Shared stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="signup-container">
        <h1>Welcome Back</h1>

        <?php if (!empty($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="post" action="login.php">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>

        <div class="back-form">
            <form action="signup.php">
                <button type="submit">Create Account</button>
            </form>
        </div>
    </div>
</body>

</html>