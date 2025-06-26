<?php
session_start();

if (!isset($_SESSION['editorname'])) {
    echo "Please Login First";
    header("refresh: 3; url = editorlogin.php");
    exit();
}
$conn = new mysqli("localhost", "root", "", "db_recipe");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("refresh: 2; url = index.php");
    exit();
}

$grab = [];
$table = 'POSTS';
$error = '';
$message = '';

// Always load POSTS table
$result = $conn->query("SELECT TITLE, FULLRECIPE FROM RECIPE");
if ($result) $grab = $result->fetch_all(MYSQLI_ASSOC);





if (isset($_POST['submit'])) {


    $username =  $_SESSION['editorname'];
    $currdate = date("Y-m-d");
    $title =  $_POST['title'];
    $body = $_POST['body'];

    $con = mysqli_connect("localhost", "root", "", "db_recipe");


    $sql = "INSERT INTO RECIPE (FULLNAME, DATEOFPOST ,TITLE, FULLRECIPE) 
            VALUES ('$username', '$currdate', '$title', '$body');";

    if (mysqli_query($con, $sql)) {
        echo "The Recipe Is Inserted";

        header("refresh: 2; url = editor.php");
        exit();
    } else {
        echo "Error while Inserting : " . mysqli_error($con);
        header("refresh: 3; url = editor.php");
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Editor Panel</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding: 40px;
            background: linear-gradient(135deg, #e0f7ff, #ffffff);
            color: #004a99;
        }

        h1 {
            font-size: 36px;
            color: #004a99;
        }

        .top-right {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        button {
            padding: 8px 20px;
            margin: 5px 10px 5px 0;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            background-color: #007bff;
            /* keep constant */
        }

        button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5);
        }

        form {
            margin: 20px 0;
        }

        .data-section,
        .crud-form {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
            color: #004a99;
        }

        th {
            background-color: #007bff;
            color: #ffffff;
        }

        .form-control {
            width: 800px;
            padding: 10px;
            margin: 10px 0;
            font-size: 14px;
            border: 1px solid #999;
            border-radius: 5px;
            background-color: #f3f3f3;
        }

        .alert,
        .alert-success {
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .btn-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 20px;
            color: #004a99;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 15px;
            margin-top: 5px;
            font-size: 16px;
            border: 1px solid #999;
            border-radius: 5px;
            background-color: #f3f3f3;
            color: #333;
        }

        input::placeholder,
        textarea::placeholder {
            color: #aaa;
            font-weight: bold;
        }

        .button-row {
            margin-top: 20px;
        }
    </style>

</head>

<body>

    <form method="post" class="top-right">
        <button type="submit" name="logout">Logout</button>
    </form>

    <h1>Welcome Editor</h1>

    <div class="data-section">
        <h2>RECIPIES</h2>

        <?php if (!empty($error)): ?>
            <div class="alert"><?php echo $error; ?></div>
        <?php elseif (!empty($message)): ?>
            <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif; ?>

        <?php if (!empty($grab)): ?>
            <table>
                <thead>
                    <tr>
                        <?php foreach (array_keys($grab[0]) as $column): ?>
                            <th><?php echo htmlspecialchars($column); ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($grab as $row): ?>
                        <tr>
                            <?php foreach ($row as $value): ?>
                                <td><?php echo htmlspecialchars($value); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No data found in Recipe Table.</p>
        <?php endif; ?>
    </div>


    </form>
    </div>
    <br> <br>
    <h2>Add New Recipe</h2>
    <form method="POST" onsubmit="return validate();">
        <label for="title">Recipe Title</label>
        <input type="text" name="title" id="title" placeholder="Write Your Title Here">

        <label for="body">Description</label>
        <textarea name="body" rows="10" id="body" placeholder="Write Your Recipe Here"></textarea>

        <div class="button-row">
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>

    <script>
        function validate() {
            const title = document.getElementById("title").value;
            const body = document.getElementById("body").value;

            if (!title || !body) {
                alert("Your recipe title or description is empty!");
                return false;
            } else if (title.length > 255) {
                alert("Title character limit is 255");
                return false;
            } else if (body.length > 10000) {
                alert("Description character limit is 10000");
                return false;
            }

            return true;
        }
    </script>




</body>

</html>