<?php
if (isset($_POST["submit"])) {
    $adminemail = $_POST["admin_email"];
    $adminpass = $_POST["admin_password"];

    $conn = mysqli_connect('localhost', 'root', '', 'db_recipe');
    $sql = "SELECT FULLNAME FROM ADMIN WHERE EMAIL = '$adminemail' and PASSWORD = '$adminpass'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        session_start();
        $_SESSION["adminname"] =  $row['FULLNAME'];


        header("refresh: 1; url = admin.php");
        exit();
    } else {
        echo "Admin not found";
        header("refresh: 3; url = adminlogin.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form method="POST" onsubmit="return validate()">
            <input type="email" id="admin_email" name="admin_email" placeholder="Admin Email"><br>
            <input type="password" id="admin_password" name="admin_password" placeholder="Password"><br>
            <button type="submit" name="submit">Submit</button>
        </form>

        <form action="index.php" class="back-form">
            <button name="back">Back</button>
        </form>
    </div>

    <script>
        function validate() {
            const email = document.getElementById("admin_email").value.trim();
            const password = document.getElementById("admin_password").value;

            if (!email || !password) {
                alert("Please fill up your email and password");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>