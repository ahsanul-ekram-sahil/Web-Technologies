<?php
session_start();

if (isset($_POST['submit'])) {
    $username =  $_POST['fullname'];
    $email =  $_POST['email'];
    $bdate =  $_POST['birthdate'];
    $password = $_POST['password'];

    $con = mysqli_connect("localhost", "root", "", "db_recipe");

    $sql = "INSERT INTO USERS (FULLNAME, EMAIL, DATEOFBIRTH, PASSWORD) 
            VALUES ('$username', '$email', '$bdate', '$password');";

    if (mysqli_query($con, $sql)) {
        header("refresh: 3; url = login.php");
        exit();
    } else {
        echo "Error while Signup : " . mysqli_error($con);
        header("refresh: 3; url = signup.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="signup-container">
        <h1>Sign Up</h1>
        <form method="POST" onsubmit="return validate();">
            <input type="text" name="fullname" id="fullname" placeholder="Full Name"><br>
            <input type="email" name="email" id="email" placeholder="Email"><br>
            <input type="date" name="birthdate" id="birthdate"><br>
            <input type="password" name="password" id="password" placeholder="Password"><br>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password"><br>
            <button type="submit" name="submit">Submit</button>
        </form>

        <form action="index.php" class="back-form">
            <button name="back">Back</button>
        </form>
    </div>

    <script>
        function validate() {
            const fullname = document.getElementById("fullname").value.trim();
            const email = document.getElementById("email").value.trim();
            const birthdate = document.getElementById("birthdate").value;
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("cpassword").value;

            if (!fullname || !email || !birthdate || !password || !confirmPassword) {
                alert("All fields are required!");
                return false;
            }

            const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address!");
                return false;
            }

            const today = new Date();
            const birthDate = new Date(birthdate);
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            if (age < 18) {
                alert("You must be at least 18 years old to register!");
                return false;
            }

            if (password.length < 8) {
                alert("Password must be at least 8 characters long!");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Confirm password does not match!");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>