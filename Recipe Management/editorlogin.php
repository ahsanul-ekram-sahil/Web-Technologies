<?php
if (isset($_POST["submit"])) {
    $editoremail = $_POST["editor_email"];
    $editorpass = $_POST["editor_password"];

    $conn = mysqli_connect('localhost', 'root', '', 'db_recipe');
    $sql = "SELECT FULLNAME FROM EDITOR WHERE EMAIL = '$editoremail' and PASSWORD = '$editorpass'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        session_start();
        $_SESSION["editorname"] =  $row['FULLNAME'];


        header("refresh: 2; url = editor.php");
        exit();
    } else {
        echo "Editor not found";
        header("refresh: 3; url = editorlogin.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Editor Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="login-container">
        <h1>Editor Login</h1>
        <form method="POST" onsubmit="return validate()">
            <input type="email" name="editor_email" id="editor_email" placeholder="Editor Email"><br>
            <input type="password" name="editor_password" id="editor_password" placeholder="Password"><br>
            <button type="submit" name="submit">Submit</button>
        </form>

        <form action="index.php" class="back-form">
            <button name="back">Back</button>
        </form>
    </div>

    <script>
        function validate() {
            const email = document.getElementById("editor_email").value.trim();
            const password = document.getElementById("editor_password").value;

            if (!email || !password) {
                alert("Please fill up your email and password");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>