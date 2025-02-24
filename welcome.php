<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>DigiLibrary Welcome</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }


        body {
            background: url("welcome images/library4.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            overflow-y: auto;
            animation: changebg 25s ease-in-out 0s infinite alternate-reverse forwards;
        }

        @keyframes changebg {

            0%,
            10% {
                background: url("welcome images/library4.jpg");
                background-size: cover;
            }

            20%,
            30%,
            40% {
                background: url("welcome images/library1.jpg");
                background-size: cover;
            }

            50%,
            60%,
            70% {
                background: url("welcome images/library2.jpg");
                background-size: cover;
            }

            80%,
            90%,
            100% {
                background: url("welcome images/library0.jpg");
                background-size: cover;
            }
        }

        @keyframes fade {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 100px);
        }

        .nav {
            top: 0;
            display: flex;
            justify-content: space-around;
            width: 100%;
            height: 100px;
            line-height: 90px;
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
            animation: fade 1s ease forwards;
        }

        .nav-menu ul {
            display: flex;
            justify-content: flex-end;
        }

        .nav-menu ul li {
            list-style-type: none;
            opacity: 0;
        }

        .nav-menu ul li:nth-child(1) {
            animation: fade 1s ease forwards;
            animation-delay: 0.2s;
        }

        .nav-menu ul li:nth-child(2) {
            animation: fade 1s ease forwards;
            animation-delay: 0.3s;
        }

        .nav-menu ul li:nth-child(3) {
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


        .welcome {
            font-size: 50px;
            display: flex;
            justify-content: center;
            color: white;
            font-weight: 400;
        }

        .zone {
            color: wheat;
        }


        .animate {
            text-align: center;
            font-size: 19px;
            font-weight: 500;
            padding: 5px 20px;
            color: white;
            text-shadow: 1px 1px 1px black;
        }

        .button-group {
            padding-top: 15px;
            display: flex;
            justify-content: center;
            gap: 25px;
        }

        .main-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            color: black;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            background-color: rgba(255, 255, 255, 0.5);
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
        }

        .main-btn:hover {
            background-color: #2c70b9;
            color: white;
        }

        .content {
            padding: 50px 70px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.75);
            border-radius: 30px;
            width: 95vw;
            opacity: 0;
            animation: fade-bottom 1s ease-in-out forwards;
            animation-delay: 0.5s;
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


        .contact-us {
            text-align: center;
            background-color: #333;
            color: white;
            padding: 20px 0;
            width: 100%;
        }

        .container {
            max-width: 1170px;
            margin: auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        ul {
            list-style: none;
        }

        .footer {
            background-color: #24262b;
            padding-top: 25px;
        }

        .footer-col {
            width: 50%;
            padding: 0 10px;
        }

        .footer-col h4 {
            font-size: 18px;
            color: #ffffff;
            text-transform: capitalize;
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;

        }

        .footer-col .social-links a {
            display: inline-block;
            height: 40px;
            width: 40px;
            background-color: rgba(255, 255, 255, 0.2);
            margin: 0 10px 10px 0;
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: #ffffff;
            transition: all 0.5s ease;
        }

        .footer-col p {
            text-align: left;
            padding-left: 10px;
            color: white;
        }

        .second h4 {
            text-align: end;
        }

        .footer-col .social-links {
            text-align: end;
        }

        .footer-col .social-links a:hover {
            color: #24262b;
            background-color: #ffffff;
        }

        .copy {
            background-color: gray;
            padding: 20px;
            text-align: center;
            color: white;
            margin-top: 20px;
        }

        /*responsive*/
        @media(max-width: 767px) {
            .footer-col {
                width: 50%;
                margin-bottom: 30px;
                text-align: center;
            }

        }

        @media(max-width: 574px) {
            .footer-col {
                width: 100%;
            }
        }

        @media only screen and (min-width: 769px) {
            .nav-menu-btn {
                display: none;
            }
        }

        @media only screen and (max-width: 1023px) {

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
                border-top: 1px solid white;
                backdrop-filter: blur(8px);
                z-index: 100;
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

        @media only screen and (max-width:612px) {
            .welcome {
                text-align: center;
            }
        }

        @media only screen and (max-width: 540px) {
            .wrapper {
                min-height: 100vh;
            }
        }
    </style>
</head>

<body>
    <nav class="nav">
        <div class="nav-logo">
            <span style="color: white; font-size: 25px;"><a href="welcome.php"><img src="welcome images/lib.png" alt="logo">Digi<span class="color">Library</a></span></span>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="welcome.php" class="link active">Home</a></li>
                <li><a href="facility.php" class="link">Facilities</a></li>
                <li><a href="ebooks.php" class="link">Read Ebooks</a></li>
            </ul>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>
    <div class="wrapper">
        <div class="content">
            <span class="welcome">Welcome To Digital Library</span>
            <p class="animate">A library is a miracle. A place where you can learn just about anything, for free. A place where your
                mind can come alive. One can never have too many librarian friends.</p>
            <p class="animate"> Libraries store the energy that fuels the imagination. They open up windows to the world and inspire us
                to explore and achieve, and contribute to improving our quality of life. Libraries change lives for the
                better.</p>
            <p class="animate">A User friendly portal designed for Student as well as Librarian for managing book issuance and returning of books for both Student and Librarian</p>
            <div class="button-group">
                <button class="main-btn" id="admin-login">Admin Login</button>
                <button class="main-btn" id="user-login">User Login</button>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>About Website</h4>
                    <p>
                        This is a library management system website made by team involving 4 people where admin can manage student 's book issuance and return, add new books
                        as well as student portal is also there where you can find all the information about library and manage books returns and issuance.
                    </p>
                </div>
                <div class="footer-col second">
                    <h4>Contact Us</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/harshkumar-rana-135583268?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_contact_details%3B5B5jNKSaTtGRXsVBos7ddw%3D%3D"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
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

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("admin-login").addEventListener("click", function() {
                window.location.href = "admin.php";
            });

            document.getElementById("user-login").addEventListener("click", function() {
                window.location.href = "user.php";
            });
        });
    </script>
</body>

</html>