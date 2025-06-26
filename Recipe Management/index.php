<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Platform</title>
    <link rel="stylesheet" href="style.css">


</head>

<body>
    <div class="card">
        <h1>Recipe World</h1>
        <h2>What would you like to do today?</h2>
        <div class="container">
            <form action="login.php">
                <button type="submit" name="login">Login</button>
            </form>
            <form action="signup.php">
                <button type="submit" name="signup">Sign Up</button>
            </form>
            <form action="adminlogin.php">
                <button type="submit" name="adminlogin">Admin Login</button>
            </form>
            <form action="editorlogin.php">
                <button type="submit" name="editorlogin">Editor Login</button>
            </form>
        </div>
    </div>
</body>

</html>