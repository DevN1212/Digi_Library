<?php
// Start the session
session_start();

// Check if the form is submitted
if (isset($_POST['login'])) {
    // Define your database connection parameters
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'lms';

    // Establish database connection
    $conn = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Define your variables to store user input
    $email = $_POST['email'];

    $password = $_POST['password'];

    // Perform SQL query to retrieve the hashed password and first name for the given email
    $query = "SELECT password FROM admin WHERE email = '$email'";
    $name = "SELECT firstname FROM admin WHERE email = '$email'";
    $result2 = mysqli_query($conn, $name);
    $row2 = mysqli_fetch_assoc($result2);
    $result1 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result1) == 1) { 
        // Fetch the hashed password and first name from the result
        $row1 = mysqli_fetch_assoc($result1);
        $hashed_password = $row1['password'];
        // Verify the entered password with the hashed password
        if (password_verify($password, $hashed_password)) {
            // Passwords match, set session variables and redirect to the dashboard page
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $row2['firstname'];
            header("Location:adminportal/admindashboard.php");
            exit();
        } else {
            // Passwords don't match
            echo '<script>alert("Invalid password. Please try again.");</script>';
        }
    } else {
        // User does not exist
        echo '<script>alert("Invalid email. Please try again.");</script>';
    }

    // Close database connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>ADMIN | Login & Registration | LMS</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        @keyframes fade {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .submit-btn:hover {
            color: white;
        }

        .submit-btn button {
            padding: 0px 45px 0px 45px;
            height: 50px;
            width: 100%;
            border-radius: 30px;
            border: none;
            cursor: pointer;
            font-size: 15px;
            transition: 0.5s;
        }

        body {
            background: url("admin images/library7.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            overflow-y: auto;
            animation: changebg 25s ease-in-out 0s infinite alternate-reverse forwards;
        }

        @keyframes changebg {

            0%,
            10%,
            20% {
                background: url("admin images/library7.jpg");
                background-size: cover;
            }

            30%,
            40%,
            50% {
                background: url("admin images/library8.jpg");
                background-size: cover;
            }

            60%,
            70%,
            80% {
                background: url("admin images/library9.jpg");
                background-size: cover;
            }

        }

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 110vh;
            background: rgba(39, 39, 39, 0.4);
        }

        .nav {
            position: fixed;
            top: 0;
            display: flex;
            justify-content: space-around;
            width: 100%;
            height: 100px;
            line-height: 100px;
            background: linear-gradient(rgba(39, 39, 39, 0.6), transparent);
            z-index: 100;
        }

        img {
            display: flex;
            width: 70px;
            cursor: pointer;
            padding-right: 10px;
        }

        a {
            display: flex;
            text-decoration: none;
            color: white;
            align-items: center;
        }

        .color {
            color: aqua;
        }

        .nav-logo {
            opacity: 0;
            animation: fade 1s ease forwards;
        }

        .nav-logo p {
            color: white;
            font-size: 25px;
            font-weight: 600;
        }

        .nav-menu ul {
            display: flex;
        }

        .nav-menu ul li {
            list-style-type: none;
            opacity: 0;
        }

        .nav-menu ul li:nth-child(1) {
            animation: fade 1s ease forwards;
            animation-delay: 0.1s;
        }

        .nav-menu ul li:nth-child(2) {
            animation: fade 1s ease forwards;
            animation-delay: 0.2s;
        }

        .nav-menu ul li:nth-child(3) {
            animation: fade 1s ease forwards;
            animation-delay: 0.3s;
        }

        .nav-menu ul li:nth-child(4) {
            animation: fade 1s ease forwards;
            animation-delay: 0.4s;
        }

        .nav-menu ul li .link {
            text-decoration: none;
            font-weight: 500;
            color: #fff;
            margin: 0 25px;
        }

        .link:hover,
        .active {
            border-bottom: 2px solid #fff;
        }

        .nav-button .btn {
            width: 130px;
            height: 40px;
            font-weight: 500;
            background: rgba(255, 255, 255, 0.4);
            border: none;
            border-radius: 30px;
            cursor: pointer;
            opacity: 0;
            animation: fade 1s ease forwards;
            animation-delay: 0.5s;
        }

        .btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        #registerBtn {
            margin-left: 15px;
        }

        .btn.white-btn {
            background: rgba(255, 255, 255, 0.7);
        }

        .btn.btn.white-btn:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        .nav-menu-btn {
            display: none;
        }

        .form-box {
            backdrop-filter: blur(8px);
            background: transparent;
            border-radius: 30px;
            border: 1px solid white;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 512px;
            height: 550px;
            overflow: hidden;
            opacity: 0;
            z-index: 2;
            animation: fade-bottom 1s ease-in-out forwards;
            animation-delay: 0.1s;
        }

        @keyframes fade-bottom {
            0% {
                opacity: 0;
                transform: translateY(100px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-container {
            position: absolute;
            padding: 10px 10px;
            left: 4px;
            top: 80px;
            width: 500px;
            display: flex;
            flex-direction: column;
            transition: .5s ease-in-out;
        }

        .register-container {
            position: absolute;
            padding: 10px 10px;
            right: -520px;
            top: 10px;
            width: 500px;
            display: flex;
            flex-direction: column;
            transition: .5s ease-in-out;
        }

        .top span {
            display: none;
        }

        header {
            color: #fff;
            font-size: 30px;
            text-align: center;
            padding: 10px 0 30px 0;
        }

        .two-forms {
            display: flex;
            gap: 10px;
        }

        .input-field {
            font-size: 15px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            height: 50px;
            width: 100%;
            padding: 0 10px 0 45px;
            border: none;
            border-radius: 30px;
            outline: none;
            transition: .2s ease;
        }

        .input-field::placeholder {
            color: white;
        }

        .input-field:hover,
        .input-field:focus {
            background: rgba(255, 255, 255, 0.25);
        }

        .input-box i {
            position: relative;
            top: -35px;
            left: 17px;
            color: black;
        }

        .submit {
            font-size: 15px;
            font-weight: 500;
            color: black;
            height: 45px;
            width: 100%;
            border: none;
            border-radius: 30px;
            outline: none;
            background: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            transition: .3s ease-in-out;
        }

        .submit:hover {
            background: rgba(255, 255, 255, 0.5);
            box-shadow: 1px 5px 7px 1px rgba(0, 0, 0, 0.2);
        }

        .two-col {
            display: flex;
            justify-content: space-between;
            color: #fff;
            font-size: small;
            margin-top: 10px;
        }

        .two-col .one {
            display: flex;
            gap: 5px;
        }

        .two label a {
            text-decoration: none;
            color: #fff;
        }

        .two label a:hover {
            text-decoration: underline;
        }

        .copy {
            background-color: gray;
            padding: 15px;
            text-align: center;
            color: white;
        }

        @media only screen and (max-width: 1023px) {
            .nav-button {
                display: none;
            }

            .nav-menu.responsive {
                top: -800px;
            }

            .nav-menu {
                position: absolute;
                top: 100px;
                display: flex;
                justify-content: center;
                width: 100%;
                height: 73vh;
                transition: .3s;
                backdrop-filter: blur(8px);
            }

            .nav-menu ul {
                flex-direction: column;
                text-align: center;
            }

            .nav-menu-btn {
                display: block;
            }

            .nav-menu-btn i {
                font-size: 25px;
                color: #fff;
                padding: 10px;
                background: rgba(255, 255, 255, 0.2);
                border-radius: 50%;
                cursor: pointer;
                transition: .3s;
            }

            .nav-menu-btn i:hover {
                background: rgba(255, 255, 255, 0.15);
            }

            .top span {
                color: #fff;
                font-size: small;
                padding: 10px 0;
                display: flex;
                justify-content: center;
            }

            .top span a {
                font-weight: 500;
                color: #fff;
                margin-left: 5px;
            }

            .top span a:hover {
                text-decoration-line: underline;
                font-weight: 500;
                color: #fff;
                margin-left: 5px;
            }
        }

        @media only screen and (max-width: 540px) {
            .wrapper {
                min-height: 100vh;
            }

            .form-box {
                width: 100%;
                height: 500px;
            }

            .register-container,
            .login-container {
                width: 100%;
                padding: 0 20px;
            }

            .register-container .two-forms {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <span style="color: white; font-size: 25px;"><a href="welcome.php
                "><img src="welcome images/lib.png" alt="logo">Digi<span class="color">Library</a></span></span>
            </div>
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="welcome.php" class="link ">Home</a></li>
                    <li><a href="facility.php" class="link">Facilities</a></li>
                    <li><a href="ebooks.php" class="link">Read Ebooks</a></li>
                </ul>
            </div>
            <div class="nav-button">
                <button class="btn white-btn" id="loginBtn" onclick="login()">Login</button>
                <button class="btn" id="registerBtn" onclick="register()">Register</button>
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>

        <div class="form-box">
            <form action="" method="post">
                <div class="login-container" id="login">
                    <div class="top">
                        <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                        <header>Welcome, Admin</header>
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" class="input-field" placeholder="Email">
                        <i class="bx bxs-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" class="input-field" placeholder="Password">
                        <i class="bx bxs-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" name="login" class="submit" value="Sign In">
                    </div>
                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="login-check">
                            <label for="login-check"> Remember Me</label>
                        </div>
                        <div class="two">
                            <label><a href="#">Forgot password?</a></label>
                        </div>
                    </div>
                </div>
            </form>

            <form action="adminregister.php" method="post">
                <div class="register-container" id="register">
                    <div class="top">
                        <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                        <header>Admin Registration</header>
                    </div>
                    <div class="two-forms">
                        <div class="input-box">
                            <input type="text" name="first" class="input-field" placeholder="Firstname" required>
                            <i class="bx bxs-user"></i>
                        </div>
                        <div class="input-box">
                            <input type="text" name="last" class="input-field" placeholder="Lastname" required>
                            <i class="bx bxs-user"></i>
                        </div>
                    </div>
                    <div class="input-box">
                        <input type="text" name="mobile" class="input-field" placeholder="Contact No" maxlength="10" required pattern="[0-9]{10,11}">
                        <i class="bx bxs-contact"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" name="email" class="input-field" placeholder="Email" required pattern="^[A-Za-z]+\s*\d{2}@adminpdpu\.com$">
                        <i class="bx bxs-envelope"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" class="input-field" placeholder="Password(max 10 characters)" maxlength="10" required pattern="[a-zA-Z@$0-9]{10}">
                        <i class="bx bxs-lock-alt"></i>
                    </div>
                    <div class="input-box">
                        <input type="submit" class="submit" value="Register">
                    </div>
                    <div class="two-col">
                        <div class="one">
                            <input type="checkbox" id="register-check">
                            <label for="register-check"> Remember Me</label>
                        </div>
                        <div class="two">
                            <label><a href="#">Terms & conditions</a></label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <div class="copy">&copy Copyright & Reserved 2024 | LMS</div>
    </footer>

    <script>
        function myMenuFunction() {
            var i = document.getElementById("navMenu");

            if (i.className === "nav-menu") {
                i.className += " responsive";
            } else {
                i.className = "nav-menu";
            }
        }
    </script>

    <script>
        var a = document.getElementById("loginBtn");
        var b = document.getElementById("registerBtn");
        var x = document.getElementById("login");
        var y = document.getElementById("register");

        function login() {
            x.style.left = "4px";
            y.style.right = "-520px";
            a.className += " white-btn";
            b.className = "btn";
            x.style.opacity = 1;
            y.style.opacity = 0;
        }

        function register() {
            x.style.left = "-520px";
            y.style.right = "4px";
            a.className = "btn";
            b.className += " white-btn";
            x.style.opacity = 0;
            y.style.opacity = 1;
        }
    </script>

</body>

</html>