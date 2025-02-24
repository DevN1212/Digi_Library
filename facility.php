<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Facilities | LMS </title>
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
            backdrop-filter: blur(9px);
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
            min-height: 115vh;
        }

        .nav {
            top: 0;
            display: flex;
            justify-content: space-around;
            width: 100%;
            height: 10vh;
            /* 10% of viewport height */
            line-height: 90px;
            z-index: 100;
            margin-bottom: 40px;
        }

        .lib {
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

        .nav-menu ul li:nth-child(4) {
            animation: fade 1s ease forwards;
            animation-delay: 0.5s;
        }

        .nav-menu ul li .link {
            text-decoration: none;
            font-weight: 500;
            color: #fff;
            margin: 0 25px;
        }

        .link:hover,
        .selected {
            border-bottom: 2px solid #fff;
        }

        .nav-menu-btn {
            display: none;
        }

        .mySlides {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
            transition: transform 1s ease;
        }

        .slide-in {
            transform: translateX(0);
        }

        .slide-out-left {
            transform: translateX(-100%);
        }

        .slide-out-right {
            transform: translateX(100%);
        }


        .slideshow-container {
            max-width: 80%;
            position: relative;
            margin: auto;
            height: calc(100vh - 40px);
            /* Adjust the gap here (40px in this example) */
            max-height: calc(90vh - 40px);
            /* Adjust the gap here (40px in this example) */
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
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


        .copy {
            background-color: gray;
            padding: 15px;
            text-align: center;
            color: white;
            /* position: fixed; */
            bottom: 0;
            width: 100%;
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
                backdrop-filter: blur(20px);
                z-index: 2;
                border-top: 0.6px solid #fff;
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
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {

            .prev,
            .next,
            .text {
                font-size: 11px
            }

            .dot {
                height: 10px;
                width: 10px;
            }

            @media only screen and (max-width: 500px) {

                .prev,
                .next,
                .text {
                    font-size: 14px
                }
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <span style="color: white; font-size: 25px;"><a href="welcome.php"><img class="lib" src="welcome images/lib.png" alt="logo">Digi<span class="color">Library</a></span></span>
            </div>
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="welcome.php" class="link ">Home</a></li>
                    <li><a href="facility.php" class="link selected">Facilities</a></li>
                    <li><a href="ebooks.php" class="link">Read Ebooks</a></li>
                </ul>
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu" onclick="myMenuFunction()"></i>
            </div>
        </nav>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                <img src="facility images/img1.jpg" style="width:100%">
                <div class="text">Caption Text</div>
            </div>
            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="facility images/img2.jpg" style="width:100%">
                <div class="text">Caption Two</div>
            </div>
            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="facility images/img3.jpg" style="width:100%">
                <div class="text">Caption Three</div>
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
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

        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }
    </script>
</body>

</html>