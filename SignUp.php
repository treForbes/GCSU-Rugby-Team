

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
     if(isset($_SESSION['admin'])) {
    // User is logged in as an admin
    $arr = array("Home","About Us","Scheduler","Logout","ConTact US","OverView");
} elseif(isset($_SESSION['player'])) {
    // User is logged in as a player
    $arr = array("Home","About Us","Scheduler","Logout","ConTact US","OverView");
} else {
    // User is not logged in
    $arr = array("Home","About Us","Scheduler","Login", "SignUp","ConTact US","OverView");
}
    $pageURI = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; // Determines which page the user is on
    $pageArr = explode("/", $pageURI); // At this point, '$pageURI' looks like this: "documents/code/Home.php"
    $currentPage = $pageArr[count($pageArr) - 1]; // this just selects the file name. E.g. "Home.php"
    pageHeader("Home", "./images/GCSURugbyClub.png", $arr, $currentPage);
    ?>
    <br>
    <div class="login-form">
        <h5 class="login-form-title">Signup</h5>
        <form action="./SignupHandler.php" method="POST" onsubmit="return validateForm()">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" onblur="validfName(this)" required>
            <p id="fNameMsg"></p>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" onblur="validlName(this)"required>
            <p id="lNameMsg"></p>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" onblur="validusername(blur)" required>
            <p id="usernameMsg"></p>

            <label for="pwd">Password:</label>
            <input type="password" id="pwd" name="pwd" onblur="validPassword(this)"required>
            <p id="pwdMsg"></p>

            <label for="cpwd">Confirm Password:</label>
            <input type="password" id="cpwd" name="cpwd" required>
            <p id="cpwdMsg"></p>

            <label for="position">Position:</label>
            <input type="text" id="position" name="position" required>
            <p id="posMsg"></p>

            <label for="weight">Weight:</label>
            <input type="number" id="weight" name="weight" required>
            <p id="weightMsg"></p>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
            <p id="emailMsg"></p>

            <label for="phone">Phone number:</label>
            <input type="tel" id="phone" name="phone" required>
            <p id="phoneMsg"></p>

            <label for="team">Team:</label>
            <select name="team" id="team">
              <option value="1">Boys Team</option>
              <option value="2">Girls Team</option>
            </select>

            <button type="submit">Signup</button>
        </form>
    </div>
</div>

        <script>
    // Function to validate the form inputs
    function validateForm() {
        var fname = document.getElementById("fname").value;
        var lname = document.getElementById("lname").value;
        var username = document.getElementById("username").value;
        var pwd = document.getElementById("pwd").value;
        var cpwd = document.getElementById("cpwd").value;
        var position = document.getElementById("position").value;
        var weight = document.getElementById("weight").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var team = document.getElementById("team").value;

        // Simple validation examples, you can expand as needed
        if (fname.trim() == ""||/[^a-zA-z]/.test(lname)) {
            alert("Please enter your first name");
            return false;
        }
        if (lname.trim() == "") {
            alert("Please enter your last name");
            return false;
        }
        if (username.trim() == "") {
            alert("Please enter a username");
            return false;
        }
        // Add more validation rules for other fields as needed

        // Example: Checking if passwords match
        if (pwd !== cpwd) {
            alert("Passwords do not match");
            return false;
        }

        // Example: Validating email format
        if (!isValidEmail(email)) {
            alert("Please enter a valid email address");
            return false;
        }

        // Example: Validating phone number format
        var phonePattern = /^\d{10}$/; // Assuming a 10-digit phone number
        if (!phonePattern.test(phone)) {
            alert("Please enter a valid 10-digit phone number");
            return false;
        }

       
        return true;
    }
     function isValidEmail(email) {
        var input = document.createElement('input');
        input.type = 'email';
        input.value = email;
        return input.validity.valid;
    }


    function validfName(id)
    {
        let name=id.value.trim()
        let fInfo = document.getElementById("fNameMsg")

        if(name=="")
        {
            
            fInfo.className="text-danger"
            fInfo.innerHTML="Field must not be empty"
            
        }
        else if(/[^a-zA-z]/.test(name))
        {
            
            fInfo.className="text-danger"
            fInfo.innerHTML="Field must only contain letters"
        }

    }


</script>
<script type="text/javascript" src="./js/validate.js"></script>

</body>
</html>
