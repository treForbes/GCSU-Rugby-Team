<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .login-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .login-form-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-form input[type="text"],
        .login-form input[type="password"],
        .login-form input[type="email"],
        .login-form input[type="tel"],
        .login-form input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }
        .login-form input[type="text"]:focus,
        .login-form input[type="password"]:focus,
        .login-form input[type="email"]:focus,
        .login-form input[type="tel"]:focus,
        .login-form input[type="number"]:focus {
            border-color: #007bff;
            outline: none;
        }
        .login-form button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-form button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div style="height:auto; width:auto;">
    <?php
    session_start();
    require_once 'RugbyTeamPageFormat.php';
    if (isset($_SESSION['player'])) {
        $arr = array("Home", "About Us", "Scheduler", "Logout", "Sign Up", "Contact Us", "Overview");
    } else {
        $arr = array("Home", "About Us", "Scheduler", "Login", "Sign Up", "Contact Us", "Overview");
    }
    if (isset($_GET['errMsg'])) {
        $m = $_GET['errMsg'];
        echo "<h3 class=\"alert alert-warning\"> $m </h3>";
    }
    $pageURI = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Determines which page the user is on
    $pageArr = explode("/", $pageURI); // At this point, '$pageURI' looks like this: "documents/code/Home.php"
    $currentPage = $pageArr[count($pageArr) - 1]; // this just selects the file name. E.g. "Home.php"
    pageHeader("Home", "./images/GCSURugbyClub.png", $arr, $currentPage);
    ?>
    <br>
    <div class="login-form">
        <h5 class="login-form-title">Signup</h5>
        <form action="./SignupHandler.php" method="POST">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" required>
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="pwd">Password:</label>
            <input type="password" id="pwd" name="pwd" required>
            <label for="cpwd">Confirm Password:</label>
            <input type="password" id="cpwd" name="cpwd" required>
            <label for="position">Position:</label>
            <input type="text" id="position" name="position" required>
            <label for="weight">Weight:</label>
            <input type="number" id="weight" name="weight" required>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <label for="phone">Phone number:</label>
            <input type="tel" id="phone" name="phone" required>
            <label for="team">Team:</label>
            <select name="team" id="team">
              <option value="1">Boys Team</option>
              <option value="2">Girls Team</option>
            </select>

            <button type="submit">Signup</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
