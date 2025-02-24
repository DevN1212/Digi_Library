<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Ebooks | LMS </title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }


        body {
            background: url("welcome images/library1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            backdrop-filter: blur(10px);
            overflow-y: auto;
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
        .active {
            border-bottom: 2px solid #fff;
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

        .category {
            border-bottom: 1px solid white;
            padding: 30px 30px;
            margin-bottom: 30px;
            /* Adjust spacing between categories */
            display: flex;
            flex-direction: column;
            /* Display category name and book images in a column */
        }

        .category h2 {
            font-size: 24px;
            color: #fff;
            margin-bottom: 20px;
        }

        .book-images {
            display: flex;
            flex-wrap: nowrap;
            gap: 50px;
            overflow-x: auto;
        }

        .book-images a {
            text-decoration: none;
            width: 200px;
        }

        .book-images img {
            width: 200px;
            height: 250px;
            border-left: 2px solid white;
        }

        .book-images::-webkit-scrollbar {
            display: none;
        }

        .heading {
            color: white;
            font-size: 20px;
            text-align: center;
        }

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
                <li><a href="welcome.php" class="link">Home</a></li>
                <li><a href="facility.php" class="link">Facilities</a></li>
                <li><a href="arrival.php" class="link active">Read Ebooks</a></li>
            </ul>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>
    <div class="wrapper">
        <div class="box">
            <div class="heading">
                <h1>Read Ebooks</h1>
            </div>
            <div class="category">
                <h2>Action & Adventure :</h2>
                <div class="book-images" >
                    <a href="book1.html" ><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/2023-02/51afeKdygtL.jpg?itok=9Ru8NpW3" alt="Book 1"></a>
                    <a href="https://manybooks.net/titles/vernejuletext942000010.html"><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-cust-7150.jpg?itok=8xXufwyU" alt="Book 2"></a>
                    <a href="https://manybooks.net/titles/twainmaretext93hfinn12.html"><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-orig-7032.jpg?itok=6p7CkPW5" alt="Book 1"></a>
                    <a href="https://manybooks.net/titles/vernejuletext98milnd11.html"><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-orig-7169.jpg?itok=n4iEMFQY" alt="Book 2"></a>
                    <a href="https://manybooks.net/titles/vernejuletext012000010a.html"><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-orig-7146.jpg?itok=Fp7gcHDs" alt="Book 1"></a>
                    <a href="https://manybooks.net/titles/knowledge-revealed"><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/2024-04/A1JBFNQThkL._SL1500_.jpg?itok=bElMMOZ2" alt="Book 2"></a>
                </div>
            </div>

            <div class="category">
                <h2>Computer :</h2>
                <div class="book-images">
                    <a href="https://manybooks.net/titles/sterlingetext94hack11a.html"><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-cust-6617.jpg?itok=E4jdx8i5" alt="Book 3"></a>
                    <a href="https://manybooks.net/titles/mungopother08approaching_zero.html"><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-orig-22524.jpg?itok=Ai7mjYpF" alt="Book 4"></a>
                    <a href="https://manybooks.net/titles/jarvisdother083D-Modelling.html"><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-auto-20811.jpg?itok=dnoYkbut" alt="Book 1"></a>
                    <a href="https://manybooks.net/titles/goerzenetext04dguid10.html"><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-auto-2909.jpg?itok=1pBauNJB" alt="Book 2"></a>
                    <a href="https://manybooks.net/titles/lebertm2703027030-8.html"><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-auto-22462.jpg?itok=sbZ9v1pu" alt="Book 1"></a>
                    <a href="https://manybooks.net/titles/richardsonbother084mb-Laptops.html"><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-auto-20812.jpg?itok=IAFNWm84" alt="Book 2"></a>
                </div>
            </div>

            <div class="category">
                <h2>Science Fiction :</h2>
                <div class="book-images">
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-cust-7349.jpg?itok=l1GWS3Q8" alt="Book 1"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-orig-7340.jpg?itok=43f030_B" alt="Book 2"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-orig-10748.jpg?itok=HMJe6pif" alt="Book 1"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/2018-06/48.jpg?itok=hGCIRnyY" alt="Book 2"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-orig-21245.jpg?itok=hDS0xBK7" alt="Book 1"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-orig-19571.jpg?itok=_Cr8_BNQ" alt="Book 2"></a>
                </div>
            </div>

            <div class="category">
                <h2>Mystery & Thriller :</h2>
                <div class="book-images">
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-cust-8030.jpg?itok=gL_KIQK6" alt="Book 3"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-orig-19469.jpg?itok=UtTC8Hod" alt="Book 4"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-orig-25814.jpg?itok=4vhulqsc" alt="Book 1"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-orig-5924.jpg?itok=gYBhZdcG" alt="Book 2"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-orig-24889.jpg?itok=suRPdfVW" alt="Book 1"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/old-covers/cover-orig-18597.jpg?itok=mztgT7KP" alt="Book 2"></a>
                </div>
            </div>

            <div class="category">
                <h2>Editor's Choice :</h2>
                <div class="book-images">
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/2024-04/81KTtaZUNbS._SL1500_.jpg?itok=nHt5S5hm" alt="Book 3"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/2024-04/81Ug4hbbK2L._SL1500_.jpg?itok=o1Gr8F9X" alt="Book 4"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/2023-10/8157SgW4qjL._SL1500_.jpg?itok=qm9xP-_i" alt="Book 1"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/2023-01/41inUaUyziL.jpg?itok=JVi84mfw" alt="Book 2"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/2022-10/51QR6kx0DrL.jpeg?itok=e1GnMlBa" alt="Book 1"></a>
                    <a href=""><img src="https://manybooks.net/sites/default/files/styles/220x330sc/public/2022-09/512sIyTDRYL.jpeg?itok=ydSZzumt" alt="Book 2"></a>
                </div>
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
    </script>
</body>

</html>